<?php

/**
 * Created by PhpStorm.
 * User: guilherme
 * Date: 13/11/15
 * Time: 00:43
 */
class GC_Testimonials_Block_Testimonial_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('grid_id');
        // $this->setDefaultSort('COLUMN_ID');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('testimonials/testimonial')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {

        $this->addColumn('entity_id',
            array(
                'header' => $this->__('ID'),
                'width' => '50px',
                'index' => 'entity_id'
            )
        );


        $this->addColumn('customer_id',
            array(
                'header' => $this->__('Customer'),
                'width' => '50px',
                'index' => 'customer_id',
                'renderer' => 'GC_Testimonials_Block_Renderer_Customer'
            )
        );


        $this->addColumn('enabled',
            array(
                'header' => $this->__('Enabled'),
                'width' => '50px',
                'index' => 'enabled',
                'renderer' => 'GC_Testimonials_Block_Renderer_Enabled'
            )
        );


        $this->addExportType('*/*/exportCsv', $this->__('CSV'));

        $this->addExportType('*/*/exportExcel', $this->__('Excel XML'));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

}
