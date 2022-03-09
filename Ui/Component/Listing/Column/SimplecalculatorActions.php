<?php
/**
 * @Author: Gilang
 * @Date:   2022-03-10 01:18:39
 * @Last Modified by:   Gilang
 * @Last Modified time: 2022-03-10 03:31:16
 */
 
declare(strict_types=1);

namespace Addons\Simplecalculator\Ui\Component\Listing\Column;

class SimplecalculatorActions extends \Magento\Ui\Component\Listing\Columns\Column
{

    // const URL_PATH_EDIT = 'aoadminsimplecalculator/simplecalculator/edit';
    const URL_PATH_DELETE = 'aoadminsimplecalculator/simplecalculator/delete';
    protected $urlBuilder;
    // const URL_PATH_DETAILS = 'aoadminsimplecalculator/simplecalculator/details';

    /**
     * @param \Magento\Framework\View\Element\UiComponent\ContextInterface $context
     * @param \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory
     * @param \Magento\Framework\UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        \Magento\Framework\UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                if (isset($item['id'])) {
                    $item[$this->getData('name')] = [
                        'delete' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_PATH_DELETE,
                                [
                                    'id' => $item['id']
                                ]
                            ),
                            'label' => __('Delete'),
                            'confirm' => [
                                'title' => __('Delete %1',$item['id']),
                                'message' => __('Are you sure you wan\'t to delete a %1 record ?',$item['id'])
                            ]
                        ]
                    ];
                }
            }
        }
        
        return $dataSource;
    }
}

