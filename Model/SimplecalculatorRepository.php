<?php
/**
 * @Author: Gilang
 * @Date:   2022-03-10 01:18:39
 * @Last Modified by:   Gilang
 * @Last Modified time: 2022-03-10 03:31:09
 */
 
declare(strict_types=1);

namespace Addons\Simplecalculator\Model;

use Addons\Simplecalculator\Api\SimplecalculatorRepositoryInterface;
use Addons\Simplecalculator\Api\Data\SimplecalculatorInterfaceFactory;
use Addons\Simplecalculator\Api\Data\SimplecalculatorSearchResultsInterfaceFactory;
use Addons\Simplecalculator\Model\ResourceModel\Simplecalculator as ResourceSimplecalculator;
use Addons\Simplecalculator\Model\ResourceModel\Simplecalculator\CollectionFactory as SimplecalculatorCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;

class SimplecalculatorRepository implements SimplecalculatorRepositoryInterface
{

    private $collectionProcessor;

    protected $dataObjectHelper;

    protected $extensionAttributesJoinProcessor;

    protected $simplecalculatorCollectionFactory;

    protected $simplecalculatorFactory;

    protected $searchResultsFactory;

    protected $dataObjectProcessor;

    protected $extensibleDataObjectConverter;
    protected $resource;

    protected $dataSimplecalculatorFactory;

    private $storeManager;


    /**
     * @param ResourceSimplecalculator $resource
     * @param SimplecalculatorFactory $simplecalculatorFactory
     * @param SimplecalculatorInterfaceFactory $dataSimplecalculatorFactory
     * @param SimplecalculatorCollectionFactory $simplecalculatorCollectionFactory
     * @param SimplecalculatorSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceSimplecalculator $resource,
        SimplecalculatorFactory $simplecalculatorFactory,
        SimplecalculatorInterfaceFactory $dataSimplecalculatorFactory,
        SimplecalculatorCollectionFactory $simplecalculatorCollectionFactory,
        SimplecalculatorSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->simplecalculatorFactory = $simplecalculatorFactory;
        $this->simplecalculatorCollectionFactory = $simplecalculatorCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataSimplecalculatorFactory = $dataSimplecalculatorFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Addons\Simplecalculator\Api\Data\SimplecalculatorInterface $simplecalculator
    ) {
        /* if (empty($simplecalculator->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $simplecalculator->setStoreId($storeId);
        } */
        
        $simplecalculatorData = $this->extensibleDataObjectConverter->toNestedArray(
            $simplecalculator,
            [],
            \Addons\Simplecalculator\Api\Data\SimplecalculatorInterface::class
        );
        
        $simplecalculatorModel = $this->simplecalculatorFactory->create()->setData($simplecalculatorData);
        
        try {
            $this->resource->save($simplecalculatorModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the simplecalculator: %1',
                $exception->getMessage()
            ));
        }
        return $simplecalculatorModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($simplecalculatorId)
    {
        $simplecalculator = $this->simplecalculatorFactory->create();
        $this->resource->load($simplecalculator, $simplecalculatorId);
        if (!$simplecalculator->getId()) {
            throw new NoSuchEntityException(__('Simplecalculator with id "%1" does not exist.', $simplecalculatorId));
        }
        return $simplecalculator->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->simplecalculatorCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Addons\Simplecalculator\Api\Data\SimplecalculatorInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Addons\Simplecalculator\Api\Data\SimplecalculatorInterface $simplecalculator
    ) {
        try {
            $simplecalculatorModel = $this->simplecalculatorFactory->create();
            $this->resource->load($simplecalculatorModel, $simplecalculator->getSimplecalculatorId());
            $this->resource->delete($simplecalculatorModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Simplecalculator: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($simplecalculatorId)
    {
        return $this->delete($this->get($simplecalculatorId));
    }
}

