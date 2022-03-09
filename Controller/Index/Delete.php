<?php
/**
 * @Author: Gilang
 * @Date:   2022-03-10 01:18:39
 * @Last Modified by:   Gilang
 * @Last Modified time: 2022-03-10 03:29:02
 */

namespace Addons\Simplecalculator\Controller\Index;

use Magento\Framework\App\Action\Context;
use Addons\Simplecalculator\Model\SimplecalculatorFactory;
use Magento\Framework\Image\AdapterFactory;

class Delete extends \Magento\Framework\App\Action\Action
{
	/**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\Addons\Simplecalculator\Model\Simplecalculator::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Item.'));
                // go to customer simple calculator page
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('Unable to find Item to delete.'));
        // go to customer simple calculator page
        return $resultRedirect->setPath('*/*/');
    }
}
