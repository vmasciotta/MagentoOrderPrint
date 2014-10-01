<?php
require_once Mage::getModuleDir('controllers', 'Mage_Adminhtml').DS.'Sales'.DS.'OrderController.php';

class Vmasciotta_OrderPrint_Adminhtml_OrderprintController extends Mage_Adminhtml_Sales_OrderController
{

    public function printAction()
    {
        $order = $this->_initOrder();
        if (!empty($order)) {
            $order->setOrder($order);

            $pdf = Mage::getModel('vmasciotta_orderprint/sales_order_pdf_order')->getPdf(array($order));
            return $this->_prepareDownloadResponse('order'.Mage::getSingleton('core/date')->date('Y-m-d_H-i-s').'.pdf', $pdf->render(), 'application/pdf');
        }
        $this->_redirect('*/*/');
    }
}