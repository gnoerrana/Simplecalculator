<?php
/**
 * @Author: Gilang
 * @Date:   2022-03-10 01:18:39
 * @Last Modified by:   Gilang
 * @Last Modified time: 2022-03-10 03:28:56
 */
 
declare(strict_types=1);

namespace Addons\Simplecalculator\Controller\Adminhtml;

abstract class Simplecalculator extends \Magento\Backend\App\Action
{

    const ADMIN_RESOURCE = 'Addons_Simplecalculator::menu';
    protected $_coreRegistry;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry
    ) {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
    }

    /**
     * Init page
     *
     * @param \Magento\Backend\Model\View\Result\Page $resultPage
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function initPage($resultPage)
    {
        $resultPage->setActiveMenu(self::ADMIN_RESOURCE)
            ->addBreadcrumb(__('Addons'), __('Addons'))
            ->addBreadcrumb(__('Simplecalculator'), __('Simplecalculator'));
        return $resultPage;
    }
}

