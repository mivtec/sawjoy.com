<?php
class Mivec_Ship_Block_Adminhtml_Express_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
	public function __construct()
	{
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'ship';
        $this->_controller = 'adminhtml_express';
        
        $this->_updateButton('save', 'label', 'Save');
        $this->_updateButton('delete', 'label', 'Delete');
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
	}
	
    public function getHeaderText()
    {
        if( Mage::registry('express_data') && Mage::registry('express_data')->getId() ) {
            return Mage::helper('ship')->__("Edit Express Shipping Quote '%s'" , "");
        } else {
            return "";
        }
    }
}