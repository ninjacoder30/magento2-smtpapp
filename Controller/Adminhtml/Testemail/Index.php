<?php
/**
 * Copyright © Allure LLC. All rights reserved.
 * See COPYING.txt for license details.
 * http://www.allureinc.co | support@allureinc.co
 */

namespace Allure\SmtpApp\Controller\Adminhtml\Testemail;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

class Index extends Action
{
    /**
     * Index action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_LAYOUT);
    }

    /**
     * Is the user allowed to view the blog post grid.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Allure_SmtpApp');
    }
}
