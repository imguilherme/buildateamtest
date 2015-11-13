<?php
/**
 * Created by PhpStorm.
 * User: guilherme
 * Date: 13/11/15
 * Time: 00:25
 */ 
class GC_Testimonials_Model_Resource_Testimonial_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{

    protected function _construct()
    {
        $this->_init('testimonials/testimonial');
    }

}