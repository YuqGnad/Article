<?php
namespace Quydhd\Article\Controller\Index;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Quydhd\Article\Helper\Data;

/**
 * Class display
 * @package Quydhd\Article\Controller\Index
 */
class Display extends Action
{

    protected $_pageFactory;
    protected $_helperData;
    /**
     * notify constructor.
     *
     * @param Context $context
     */
    public function __construct(Context $context,  PageFactory $pageFactory, Data $helperData)
    {
        $this->_pageFactory = $pageFactory;
        $this->_helperData = $helperData;
        parent::__construct($context);
    }
    public function execute()
    {
        $enable = $this->_helperData->getGeneralConfig('enable');
        if ($enable === 0 )
        {
            $this->_redirect('/');
        }
        return $this->_pageFactory->create();
    }
}
