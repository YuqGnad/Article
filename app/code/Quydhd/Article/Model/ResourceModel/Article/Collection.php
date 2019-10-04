<?php
namespace Quydhd\Article\Model\ResourceModel\Article;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'article_id';
    protected $_eventPrefix = 'quydhd_article_article_collection';
    protected $_eventObject = 'article_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {

        $this->_init(\Quydhd\Article\Model\Article::class,\Quydhd\Article\Model\ResourceModel\Article::class);
    }

}