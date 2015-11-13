<?php

/**
 * Created by PhpStorm.
 * User: guilherme
 * Date: 13/11/15
 * Time: 00:43
 */
class GC_Testimonials_Block_Testimonial extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    public function __construct()
    {
        $this->_blockGroup = 'testimonials';
        $this->_controller = 'testimonial';
        $this->_headerText = $this->__('Manage testimonials');
        parent::__construct();
    }

    public function getCreateUrl()
    {
        return $this->getUrl('*/*/new');
    }

}

