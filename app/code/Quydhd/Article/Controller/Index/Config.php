<?php

namespace Quydhd\Article\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Quydhd\Article\Helper\Data;

class Config extends Action
{

    protected $_helperData;

    public function __construct(
        Context $context,
        Data $helperData

    )
    {
        $this->_helperData = $helperData;
        return parent::__construct($context);
    }

    public function execute()
    {

        echo $this->_helperData->getGeneralConfig('enable');
        echo $this->_helperData->getGeneralConfig('limit_page');
        exit();

    }
}