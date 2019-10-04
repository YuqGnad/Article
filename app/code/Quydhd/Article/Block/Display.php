<?php
namespace Quydhd\Article\Block;



use Magento\Framework\View\Element\Template;
use Quydhd\Article\Model\Article;
use Quydhd\Article\Model\ResourceModel\Article\CollectionFactory;
use Quydhd\Article\Helper\Data;


class Display extends Template
{
    protected $_articleFactory;
    protected $_helperData;

    public function __construct(
        Template\Context $context,
        CollectionFactory $articleFactory,
        Data $helperData
    )
    {

        $this->_articleFactory = $articleFactory;
        $this->_helperData = $helperData;
        return parent::__construct($context);
    }
    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('Article Manager'));

        if ($this->getarticleCollection()) {
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'Quydhd.article.pager'
            )->setAvailableLimit(array(5=>5,10=>10,15=>15))->setShowPerPage(false)->setCollection(
                $this->getarticleCollection()
            );
            $this->setChild('pager', $pager);
            $this->getarticleCollection()->load();
        }
        return parent::_prepareLayout();
    }
    public function getArticleCollection()
    {
        $page = ($this->getRequest()->getParam('p'))? $this->getRequest()->getParam('p') : 1;
        $pageSize = $this->_helperData->getGeneralConfig('limit_page');

        $collection  = $this->_articleFactory->create();
        $collection->setPageSize($pageSize);
        $collection->setCurPage($page);

        return $collection;
    }
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }

}
