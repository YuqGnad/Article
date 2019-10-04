<?php
namespace Quydhd\Article\Observer;



use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class CreatePostObserver implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $account = $observer->getEvent()->getData('account_controller');
        $customer = $observer->getEvent()->getData('customer');
        echo var_dump($customer[0]);die;
    }
}
