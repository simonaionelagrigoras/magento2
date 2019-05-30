<?php
/**
 * Created by PhpStorm.
 * User: Simona
 * Date: 31/05/2019
 * Time: 00:21
 */

namespace Petshop\Appointment\Block\Account;

use Magento\Customer\Model\Session as CustomerSession;
use Magento\Framework\App\DefaultPathInterface;
use Magento\Framework\View\Element\Html\Link\Current;
use Magento\Framework\View\Element\Template\Context;

class Show extends \Magento\Framework\View\Element\Template
{
    protected $_customerSession;

    protected $appointmentFactory;

    public function __construct(
        Context $context,
        \Petshop\Appointment\Model\ResourceModel\Appointment\CollectionFactory $appointmentFactory,
        CustomerSession $customerSession,
        array $data = []
    )
    {
        $this->_customerSession = $customerSession;
        $this->appointmentFactory = $appointmentFactory;
        parent::__construct($context, $data);
    }

    public function getScheduledOrders()
    {
        $customer  = $this->_customerSession->getCustomerId();
        if(!$customer){
            return [];
        }
        return $this->appointmentFactory->create()->addFieldToFilter('customer_id', $customer);
    }

}