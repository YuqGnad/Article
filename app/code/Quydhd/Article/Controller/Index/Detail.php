<?php

namespace Quydhd\Article\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;



class Detail extends Action
{
    protected $_pageFactory;

    /**
     * notify constructor.
     *
     * @param Context $context
     */
    public function __construct(Context $context,  PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        return $this->_pageFactory->create();
    }
}