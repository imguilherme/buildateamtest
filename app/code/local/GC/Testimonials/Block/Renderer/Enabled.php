<?php


/**
 * Renderer
 * Class GC_Testimonials_Block_Renderer_Enabled
 */
class GC_Testimonials_Block_Renderer_Enabled extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{

    public function render(Varien_Object $row)
    {
        $value = $row->getData($this->getColumn()->getIndex());
        $values = array(
            0 => 'No',
            1 => 'Yes'
        );

        return $values[$value];
    }

}