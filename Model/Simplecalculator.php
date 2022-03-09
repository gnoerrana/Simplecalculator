<?php
/**
 * @Author: Gilang
 * @Date:   2022-03-10 01:18:39
 * @Last Modified by:   Gilang
 * @Last Modified time: 2022-03-10 03:31:03
 */
 
declare(strict_types=1);

namespace Addons\Simplecalculator\Model;

use Addons\Simplecalculator\Api\Data\SimplecalculatorInterface;
use Addons\Simplecalculator\Api\Data\SimplecalculatorInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;

class Simplecalculator extends \Magento\Framework\Model\AbstractModel
{

    protected $_eventPrefix = 'addons_simplecalculator';
    protected $dataObjectHelper;

    protected $simplecalculatorDataFactory;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param SimplecalculatorInterfaceFactory $simplecalculatorDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Addons\Simplecalculator\Model\ResourceModel\Simplecalculator $resource
     * @param \Addons\Simplecalculator\Model\ResourceModel\Simplecalculator\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        SimplecalculatorInterfaceFactory $simplecalculatorDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Addons\Simplecalculator\Model\ResourceModel\Simplecalculator $resource,
        \Addons\Simplecalculator\Model\ResourceModel\Simplecalculator\Collection $resourceCollection,
        array $data = []
    ) {
        $this->simplecalculatorDataFactory = $simplecalculatorDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve simplecalculator model with simplecalculator data
     * @return SimplecalculatorInterface
     */
    public function getDataModel()
    {
        $simplecalculatorData = $this->getData();
        
        $simplecalculatorDataObject = $this->simplecalculatorDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $simplecalculatorDataObject,
            $simplecalculatorData,
            SimplecalculatorInterface::class
        );
        
        return $simplecalculatorDataObject;
    }
}

