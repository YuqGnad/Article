<?php
namespace Quydhd\Article\Model;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class Post extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'quydhd_article_post';

    protected $_cacheTag = 'quydhd_article_post';

    protected $_eventPrefix = 'quydhd_article_post';

    protected function _construct()
    {
        $this->_init('Quydhd\Article\Model\ResourceModel\Post');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}