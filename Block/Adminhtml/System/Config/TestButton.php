<?php
/**
 * Copyright © Allure LLC. All rights reserved.
 * See COPYING.txt for license details.
 * http://www.allureinc.co | support@allureinc.co
 */

namespace Allure\SmtpApp\Block\Adminhtml\System\Config;

use Magento\Backend\Block\Template\Context;
use Magento\Backend\Block\Widget\Button;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\Exception\LocalizedException;

/**
 * "Reset to Defaults" button renderer
 *
 */
class TestButton extends Field
{
    /** @var UrlInterface */
    protected $_urlBuilder;

    /**
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        Context $context,
        array $data = []
    ) {
        $this->_urlBuilder = $context->getUrlBuilder();
        parent::__construct($context, $data);
    }

    /**
     * Set template
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('Allure_SmtpApp::system/config/testbutton.phtml');
    }

    /**
     * Generate button html
     *
     * @return string
     * @throws LocalizedException
     */
    public function getButtonHtml()
    {
        $button = $this->getLayout()->createBlock(
            Button::class
        )->setData(
            [
                'id' => 'gmailsmtpapp_debug_result_button',
                'label' => __('Send Test Email'),
                'onclick' => 'javascript:gmailSmtpAppDebugTest(); return false;',
            ]
        );

        return $button->toHtml();
    }

    public function getAdminUrl()
    {
        return $this->_urlBuilder->getUrl(
            'alluresmtp/testemail',
            ['store' => $this->_request->getParam('store')]
        );
    }

    /**
     * Render button
     *
     * @param  AbstractElement $element
     * @return string
     */
    public function render(AbstractElement $element)
    {
        // Remove scope label
        $element->unsScope()->unsCanUseWebsiteValue()->unsCanUseDefaultValue();
        return parent::render($element);
    }

    /**
     * Return element html
     *
     * @param  AbstractElement $element
     * @return string
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        return $this->_toHtml();
    }
}
