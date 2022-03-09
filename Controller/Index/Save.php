<?php
/**
 * @Author: Gilang
 * @Date:   2022-03-10 01:18:39
 * @Last Modified by:   Gilang
 * @Last Modified time: 2022-03-10 03:29:11
 */

namespace Addons\Simplecalculator\Controller\Index;

use Magento\Framework\App\Action\Context;
use Addons\Simplecalculator\Model\SimplecalculatorFactory;
use Magento\Framework\Image\AdapterFactory;

class Save extends \Magento\Framework\App\Action\Action
{   
    /**
     * @var Session
     */
    protected $customerSession;

	/**
     * @var Simplecalculator
     */
    protected $_simplecalculator;
    protected $adapterFactory;

    public function __construct(
        Context $context,
        SimplecalculatorFactory $simplecalculator,
        \Magento\Customer\Model\Session $customerSession,
        AdapterFactory $adapterFactory,
    ) {
        $this->_simplecalculator = $simplecalculator;
        $this->customerSession = $customerSession;
        $this->adapterFactory = $adapterFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        if (!$this->getRequest()->isPost()) {
            return $this->resultRedirectFactory->create()->setPath('*/*/');
        }

        $data = $this->validatedParams();
        $customerId = $this->customerSession->getCustomer()->getId();
        $firstName = $this->customerSession->getCustomer()->getFirstname();
        $lastName = $this->customerSession->getCustomer()->getLastname();
        
        if ($data['operation'] == 'subtraction') {
            $result = $data['first_num'] - $data['second_num'];
        } else {
            $result = $data['first_num'] + $data['second_num'];
        }

        $newData = Array
            (
                "customer_id" => $customerId,
                "first_name" => $firstName,
                "last_name" => $lastName,
                "result" => $result,
            );
        $calculationData = array_merge($data, $newData);

        $simplecalculator = $this->_simplecalculator->create();
        $simplecalculator->setData($calculationData);

        if($simplecalculator->save()){
            $this->messageManager->addSuccessMessage(__('Calculation submitted, the result is : '.$result));
        }else{
            $this->messageManager->addErrorMessage(__('Unable to calculate the data'));
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('simplecalculator');
        return $resultRedirect;
    }
/**
     * @return array
     * @throws \Exception
     */
    private function validatedParams()
    {
        $request = $this->getRequest();
        if (trim($request->getParam('first_num')) === '') {
            throw new LocalizedException(__('Enter the First Number to be calculated.'));
        }
        if (trim($request->getParam('second_num')) === '') {
            throw new LocalizedException(__('Enter the Second Number to be calculated.'));
        }
        if (trim($request->getParam('operation')) === '') {
            throw new LocalizedException(__('Please select the operation.'));
        }
        
        return $request->getParams();
    }
}
