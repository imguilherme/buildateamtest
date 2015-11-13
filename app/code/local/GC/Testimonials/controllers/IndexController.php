<?php

/**
 * Class GC_Testimonials_IndexController
 */

class GC_Testimonials_IndexController extends Mage_Core_Controller_Front_Action{

    /**
     * Send the testimonial to database
     */
    public function sendAction(){
        $data = $this->getRequest()->getParams();
        try {
            $testimonial = Mage::getModel('testimonials/testimonial');
            $testimonial->addData($data);
            $testimonial->save();
            $this->getSession()->addSuccess('The testimonial has been sent to be approved');
        }catch(Exception $e){
            $this->getSession()->addError('An error ocurred in your request: ' . $e->getMessage());
        }

        return $this->_redirect('*/*/index');
    }


    /**
     * Return the session
     * @return Mage_Core_Model_Session
     */
    public function getSession(){
        return Mage::getSingleton('core/session');
    }


    /**
     * Main front page
     * @return Mage_Core_Controller_Varien_Action
     */
    public function indexAction(){
        $customerSession = Mage::getSingleton('customer/session');
        if(!$customerSession->isLoggedIn()) {
            $customerSession->addError('You need to be logged in to send a testimonial');
            $customerSession->setAfterAuthUrl($this->getRequest()->getRequestUri());
            return $this->_redirectUrl(Mage::helper('customer')->getLoginUrl());
        }

        $this->loadLayout();
        $this->getLayout()->getBlock('head')->setTitle($this->__('Give your testimonial about us'));
        $this->renderLayout();
    }


}