<?php
/**
 * @Author: Gilang
 * @Date:   2022-03-10 01:18:39
 * @Last Modified by:   Gilang
 * @Last Modified time: 2022-03-10 03:28:52
 */
 
declare(strict_types=1);

namespace Addons\Simplecalculator\Controller\Adminhtml\Simplecalculator;

class Index extends \Magento\Backend\App\Action
{

    protected $resultPageFactory;

    /**
     * Constructor
     *
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Index action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
		$resultPage->setActiveMenu('Addons_Simplecalculator::menu');
		$resultPage->addBreadcrumb(__('Simplecalculator'), __('Simplecalculator'));
        $resultPage->addBreadcrumb(__('Simplecalculator'), __('Customers Simplecalculator'));
            $resultPage->getConfig()->getTitle()->prepend(__("Customers Simplecalculator"));
            return $resultPage;
    }
}

