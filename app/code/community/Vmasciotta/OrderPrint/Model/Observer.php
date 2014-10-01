<?php

class Vmasciotta_OrderPrint_Model_Observer{
    public function adminhtmlWidgetContainerHtmlBefore($event)
    {
        $block = $event->getBlock();

        if ($block instanceof Mage_Adminhtml_Block_Sales_Order_View) {
            $message = Mage::helper('core')->__('Are you sure you want to do this?');
            $block->addButton('do_something_crazy', array(
                    'label'     => Mage::helper('core')->__('Print Order'),
                    'onclick'   => "setLocation('{$block->getUrl('*/orderprint/print')}')",
                    'class'     => 'save'
                ));
        }
    }
}