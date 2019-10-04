<?php
namespace Quydhd\Article\Block;


use Magento\Framework\App\Request\Http;
use Magento\Framework\View\Element\Template;

use Quydhd\Article\Model\ResourceModel\Article\CollectionFactory;

class Detail extends Template
{

    protected $_articleFactory;
    protected $_request;

    public function __construct(
        Template\Context $context,
        CollectionFactory $articleFactory,
        Http $request,
        array $data = []
    )
    {
        $this->_articleFactory = $articleFactory;
        $this->_request = $request;
        return parent::__construct($context, $data);
    }
    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('Article Detail'));
        return parent::_prepareLayout();
    }

        public function getArticleID()
    {

        $article = $this->_articleFactory->create();
        $param = $this->_request->getParam('ID');
        return $article->getItemById($param)->getData();
    }
}
