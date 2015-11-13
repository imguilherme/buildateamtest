<?php

/**
 * Class GC_Testimonials_ManageController
 */
class GC_Testimonials_ManageController extends Mage_Adminhtml_Controller_Action
{


    /**
     * Return the session
     * @return Mage_Core_Model_Session
     */
    public function getSession()
    {
        return Mage::getSingleton('core/session');
    }


    /**
     * Grid list
     * @return Mage_Core_Controller_Varien_Action
     */
    public function indexAction()
    {
        $this->loadLayout()->_addContent($this->getLayout()->createBlock('testimonials/testimonial_grid'));
        $this->renderLayout();
    }


    /**
     * Delete a testimonial
     * @return Mage_Core_Controller_Varien_Action
     */
    public function deleteAction()
    {
        try {
            $id = $this->getRequest()->getParam('id');
            $testimonial = Mage::getModel('testimonials/testimonial')->load($id);
            $testimonial->delete();
            $this->getSession()->addSuccess('The testimonial has been deleted');
        } catch (Exception $e) {
            $this->getSession()->addError('An error ocurred in your request: ' . $e->getMessage());
        }


        return $this->_redirect('*/*/index');

    }

    /**
     * Edit list
     * @return Mage_Core_Controller_Varien_Action
     */
    public function editAction()
    {
        $this->loadLayout()->_addContent($this->getLayout()->createBlock('testimonials/testimonial_edit'));
        $id = $this->getRequest()->getParam('id');
        $testimonial = Mage::getModel('testimonials/testimonial')->load($id);
        Mage::register('current_model', $testimonial);
        $this->renderLayout();
    }

    /**
     * Save a testimonial
     * @return $this|Mage_Core_Controller_Varien_Action
     */
    public function saveAction()
    {
        $data = $this->getRequest()->getParams();
        try {
            $testimonial = Mage::getModel('testimonials/testimonial')->load($data['entity_id']);
            $testimonial->addData($data);
            $testimonial->save();
            $this->getSession()->addSuccess('The testimonial has been saved');
        } catch (Exception $e) {
            $this->getSession()->addError('An error ocurred in your request: ' . $e->getMessage());
        }

        return $this->_redirect('*/*/index');
    }


}