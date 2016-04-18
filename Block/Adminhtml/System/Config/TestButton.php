<?php
/**
 * Copyright © 2016 MagePal. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace MagePal\GmailSmtpApp\Block\Adminhtml\System\Config;

/**
 * "Reset to Defaults" button renderer
 *
 */
class TestButton extends \Magento\Config\Block\System\Config\Form\Field
{
    /**
     * Set template
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('MagePal_GmailSmtpApp::system/config/testbutton.phtml');
    }

    /**
     * Generate button html
     *
     * @return string
     */
    public function getButtonHtml()
    {
        $button = $this->getLayout()->createBlock(
            'Magento\Backend\Block\Widget\Button'
        )->setData(
            [
                'id' => 'gmailsmtpapp_debug_result_button',
                'label' => __('Send Test Email'),
                'onclick' => 'javascript:gmailSmtpAppDebugTest(); return false;',
            ]
        );

        return $button->toHtml();
    }

    public function getAdminUrl(){
        return $this->_urlBuilder->getUrl('magepalGmailsmtpapp/test', ['store' => $this->_request->getParam('store')]);
    }

    /**
     * Render button
     *
     * @param  \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return string
     */
    public function render(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        // Remove scope label
        $element->unsScope()->unsCanUseWebsiteValue()->unsCanUseDefaultValue();
        return parent::render($element);
    }

    /**
     * Return element html
     *
     * @param  \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return string
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        return $this->_toHtml();
    }
}
