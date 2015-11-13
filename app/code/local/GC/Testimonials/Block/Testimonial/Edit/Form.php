<?php
/**
 * Created by PhpStorm.
 * User: guilherme
 * Date: 13/11/15
 * Time: 00:43
 */
class GC_Testimonials_Block_Testimonial_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _getModel(){
        return Mage::registry('current_model');
    }

    protected function _getHelper(){
        return Mage::helper('testimonials');
    }

    protected function _getModelTitle(){
        return 'Testimonial';
    }

    protected function _prepareForm()
    {
        $model  = $this->_getModel();
        $modelTitle = $this->_getModelTitle();
        $form   = new Varien_Data_Form(array(
            'id'        => 'edit_form',
            'action'    => $this->getUrl('*/*/save'),
            'method'    => 'post'
        ));

        $fieldset   = $form->addFieldset('base_fieldset', array(
            'legend'    => $this->_getHelper()->__("$modelTitle Information"),
            'class'     => 'fieldset-wide',
        ));

        if ($model && $model->getId()) {
            $modelPk = $model->getResource()->getIdFieldName();
            $fieldset->addField($modelPk, 'hidden', array(
                'name' => $modelPk,
            ));
        }

        $customer = Mage::getModel('customer/customer')->load($model->getData('customer_id'));

        $fieldset->addField('customer_id', 'hidden', array(
            'name'      => 'customer_id',
            'label'     => $this->_getHelper()->__('Customer ID'),
            'title'     => $this->_getHelper()->__('Customer ID'),
        ));

        $fieldset->addField('description', 'textarea', array(
            'name'      => 'description',
            'label'     => $this->_getHelper()->__('Description'),
            'title'     => $this->_getHelper()->__('Description'),
            'required'  => true,
        ));

        $fieldset->addField('enabled', 'select', array(
            'name'      => 'enabled',
            'label'     => $this->_getHelper()->__('Enabled'),
            'title'     => $this->_getHelper()->__('Enabled'),
            'options' => array(
                0 => 'No',
                1 => 'Yes'
            ),
            'required'  => true,
        ));


        if($model){
            $form->setValues($model->getData());
        }


        $fieldset->addField('customer', 'label', array(
            'name'      => 'customer',
            'label'     => $this->_getHelper()->__('Customer'),
            'title'     => $this->_getHelper()->__('Customer'),
            'value' => $customer->getName()
        ));

        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }

}
