<?php


/**
 * Renderer
 * Class GC_Testimonials_Block_Renderer_Customer
 */
class GC_Testimonials_Block_Renderer_Customer extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{

    public function render(Varien_Object $row)
    {
        $value = $row->getData($this->getColumn()->getIndex());
        $customer = Mage::getModel('customer/customer')->load($value);
        return $customer->getName();
    }

}