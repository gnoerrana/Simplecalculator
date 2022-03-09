<?php
/**
 * @Author: Gilang
 * @Date:   2022-03-10 01:18:39
 * @Last Modified by:   Gilang
 * @Last Modified time: 2022-03-10 03:28:29
 */

namespace Addons\Simplecalculator\Block;

use Magento\Framework\View\Element\Template\Context;
use Addons\Simplecalculator\Model\SimplecalculatorFactory;
/**
 * Simplecalculator List block
 */
class SimplecalculatorListData extends \Magento\Framework\View\Element\Template
{
    /**
     * @var Simplecalculator
     */
    protected $_simplecalculator;
    public function __construct(
        Context $context,
        SimplecalculatorFactory $simplecalculator
    ) {
        $this->_simplecalculator = $simplecalculator;
        parent::__construct($context);
    }

    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('Addons Simplecalculator Module List Page'));
        
        if ($this->getSimplecalculatorCollection()) {
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'addons.simplecalculator.pager'
            )->setAvailableLimit(array(5=>5,10=>10,15=>15))->setShowPerPage(true)->setCollection(
                $this->getSimplecalculatorCollection()
            );
            $this->setChild('pager', $pager);
            $this->getSimplecalculatorCollection()->load();
        }
        return parent::_prepareLayout();
    }

    public function getSimplecalculatorCollection()
    {
        $page = ($this->getRequest()->getParam('p'))? $this->getRequest()->getParam('p') : 1;
        $pageSize = ($this->getRequest()->getParam('limit'))? $this->getRequest()->getParam('limit') : 5;

        $simplecalculator = $this->_simplecalculator->create();
        $collection = $simplecalculator->getCollection();
        // $collection->addFieldToFilter('status','1');
        //$simplecalculator->setOrder('id','ASC');
        $collection->setPageSize($pageSize);
        $collection->setCurPage($page);

        return $collection;
    }

    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
}