<?php
namespace Quydhd\Article\Controller\Index;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

/**
 * Class Add
 * @package Quydhd\Article\Controller\Index
 */
class Add extends Action
{
    /**
     * Display constructor.
     *
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }
    public function execute()
    {
        echo 'Add';
        exit;
    }
}