<?php
/**
 * Copyright © Allure LLC. All rights reserved.
 * See COPYING.txt for license details.
 * http://www.allureinc.co | support@allureinc.co
 */

namespace Allure\SmtpApp\Plugin\Mail\Template;

use Magento\Framework\Mail\Template\TransportBuilder;
use Allure\SmtpApp\Model\Store;

/**
 * Class TransportBuilderPlugin
 * @package Allure\SmtpApp\Plugin\Mail\Template
 */
class TransportBuilderPlugin
{

    /** @var Store */
    protected $storeModel;

    /**
     * @param Store $storeModel
     */
    public function __construct(
        Store $storeModel
    ) {
        $this->storeModel = $storeModel;
    }

    /**
     * @param TransportBuilder $subject
     * @param $templateOptions
     * @return array
     */
    public function beforeSetTemplateOptions(
        TransportBuilder $subject,
        $templateOptions
    ) {
        if (array_key_exists('store', $templateOptions)) {
            $this->storeModel->setStoreId($templateOptions['store']);
        } else {
            $this->storeModel->setStoreId(null);
        }

        return [$templateOptions];
    }
}
