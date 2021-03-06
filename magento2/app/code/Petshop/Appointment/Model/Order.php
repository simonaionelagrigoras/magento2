<?php
/**
 * Created by PhpStorm.
 * User: Simona
 * Date: 31/05/2019
 * Time: 00:07
 */

namespace Petshop\Appointment\Model;

class Order extends \Magento\Sales\Model\Order{

    public function getScheduledAppointment()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $schedule =  $objectManager->create('Petshop\Appointment\Model\AppointmentFactory')->create()->load($this->getId(), 'order_id');
        return $schedule;
    }
}