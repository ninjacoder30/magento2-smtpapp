<?php
/**
 * Copyright © Allure LLC. All rights reserved.
 * See COPYING.txt for license details.
 * http://www.allureinc.co | support@allureinc.co
 */
namespace Allure\SmtpApp\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

/**
 * Class Authtype
 * @package Allure\SmtpApp\Model\Config\Source
 */
class Authtype implements ArrayInterface
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'none', 'label' => __('None')],
            ['value' => 'ssl', 'label' => 'SSL'],
            ['value' => 'tls', 'label' => 'TLS']
        ];
    }
}
