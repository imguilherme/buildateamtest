<?php
/**
 * Created by PhpStorm.
 * User: guilherme
 * Date: 13/11/15
 * Time: 00:37
 */ 
class GC_Testimonials_Block_Page_Template_Links extends Mage_Page_Block_Template_Links {

    protected function _construct()
    {
        $this->setTemplate('testimonials/page/template/links.phtml');
    }

}