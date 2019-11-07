<?php
/**
 * Copyright © Allure LLC. All rights reserved.
 * See COPYING.txt for license details.
 * http://www.allureinc.co | support@allureinc.co
 */
namespace Allure\SmtpApp\Plugin\Mail\Template;

use Magento\Framework\Exception\MailException;
use Magento\Framework\Mail\Template\SenderResolverInterface;
use Magento\Framework\Mail\Template\TransportBuilderByStore;
use Allure\SmtpApp\Model\Store;

/**
 * Class TransportBuilderByStorePlugin
 * @package Allure\SmtpApp\Plugin\Mail\Template
 */
class TransportBuilderByStorePlugin
{
    /**
     * @var Store
     */
    protected $storeModel;

    /**
     * Sender resolver.
     *
     * @var SenderResolverInterface
     */
    private $senderResolver;

    /**
     * @param Store $storeModel
     * @param SenderResolverInterface $senderResolver
     */
    public function __construct(
        Store $storeModel,
        SenderResolverInterface $senderResolver
    ) {
        $this->storeModel = $storeModel;
        $this->senderResolver = $senderResolver;
    }

    /**
     * @param TransportBuilderByStore $subject
     * @param $from
     * @param $store
     * @return array
     * @throws MailException
     */
    public function beforeSetFromByStore(
        TransportBuilderByStore $subject,
        $from,
        $store
    ) {
        if (!$this->storeModel->getStoreId()) {
            $this->storeModel->setStoreId($store);
        }

        $email = $this->senderResolver->resolve($from, $store);
        $this->storeModel->setFrom($email);

        return [$from, $store];
    }
}
