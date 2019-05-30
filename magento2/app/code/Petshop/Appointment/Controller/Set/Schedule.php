<?php
/**
 * Created by PhpStorm.
 * User: Simona
 * Date: 30/05/2019
 * Time: 23:03
 */

namespace Petshop\Appointment\Controller\Set;

use Magento\Framework\Controller\ResultFactory;
use Petshop\Appointment\Model\AppointmentFactory;
use Magento\Sales\Model\OrderFactory;
use Magento\Framework\App\Action\Context;
use Psr\Log\LoggerInterface;
use Magento\Customer\Model\Session;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;


class Schedule extends \Magento\Framework\App\Action\Action
{

    protected $appointmentFactory;
    protected $orderFactory;
    protected $controllerResultFactory;
    protected $logger;
    protected $customerSession;
    protected $timezone;

    /**
     * Schedule constructor.
     * @param Context $context
     * @param AppointmentFactory $appointmentFactory
     * @param OrderFactory $orderFactory
     * @param Session $customerSession
     * @param LoggerInterface $logger
     */
    public function __construct(
        Context $context,
        AppointmentFactory $appointmentFactory,
        OrderFactory $orderFactory,
        Session $customerSession,
        LoggerInterface $logger,
        TimezoneInterface $timezone
    ) {
        $this->appointmentFactory = $appointmentFactory;
        $this->orderFactory       = $orderFactory;
        $this->customerSession    = $customerSession;
        $this->logger             = $logger;
        $this->timezone           = $timezone;


        $this->controllerResultFactory = $context->getResultFactory();
        parent::__construct($context);
    }

    /**
     * Set schedule action
     *
     * @return void
     */
    public function execute()
    {
        $resultRedirect = $this->controllerResultFactory->create(ResultFactory::TYPE_REDIRECT);

        if(empty($orderId = $this->getRequest()->getParam('order_id'))) {
            $this->messageManager->addErrorMessage(__('Ther was a problem processing your request'));
            return $resultRedirect->setUrl('/sales/order/history');
        }

        $order  = $this->orderFactory->create()->load($orderId);
        $scheduleDate = $this->getRequest()->getParam('calendar_inputField');
        if(is_null($scheduleDate)){
            $this->messageManager->addErrorMessage(__('Invalid schedule date'));
            return $resultRedirect->setUrl('/sales/order/view/order_id/' . $orderId);
        }
        $scheduleAlreadyExists = $this->appointmentFactory->create()
            ->getCollection()
            ->addFieldToFilter('order_id', $orderId)
            ->count();

        if($scheduleAlreadyExists){
            $this->messageManager->addErrorMessage(__('You have already submitted your review for this order'));
            return $resultRedirect->setUrl('/sales/order/view/order_id/' . $orderId);
        }

        $scheduledAt = $this->timezone->date(strtotime($scheduleDate))->format('Y-m-d');
        $createdAt   = $this->timezone->date(time())->format('Y-m-d');
        $schedule    = $this->appointmentFactory->create();
        $data = [
            'customerId' => $order->getCustomerId(),
            'order_id'   => $orderId,
            'created_at' => $createdAt,
            'next_date'  => $scheduledAt,
            'email_sent' => 0
        ];
        $schedule->setData($data);

        try{
            $schedule->save();
        }catch (Exception $e){

            $this->logger->alert(__('Could not save the schedule for order %1', $orderId));
            $this->logger->alert(__($e->getMessage()));
            $this->messageManager->addErrorMessage(__('Could not save the next schedule for your order. Please try again later.'));
            return $resultRedirect->setUrl('/sales/order/view/order_id/' . $orderId);
        }

        $this->messageManager->addSuccessMessage(__('Your schedule was successfully submitted!'));
        return $resultRedirect->setUrl('/sales/order/view/order_id/' . $orderId);
    }

}
