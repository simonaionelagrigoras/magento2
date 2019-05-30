<?php
/**
 * Created by PhpStorm.
 * User: Simona
 * Date: 31/05/2019
 * Time: 00:23
 */

namespace Petshop\Appointment\Controller\Account;

class Display extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    protected $appointmentFactory;

    /**
     * Display constructor.
     * @param \Petshop\Appointment\Model\AppointmentFactory $appointmentFactory
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Petshop\Appointment\Model\AppointmentFactory $appointmentFactory,
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        $this->appointmentFactory = $appointmentFactory;
        $this->resultPageFactory  = $resultPageFactory;
        parent::__construct($context);
    }
    /**
     * Default customer account page
     *
     * @return void
     */
    public function execute()
    {
        $collection = $this->appointmentFactory->create()->getCollection();
        $this->_view->loadLayout();
        $this->_view->getLayout()->getBlock('scheduled.orders.list')->setSchedules($collection);
        $this->_view->renderLayout();
    }
}
?>
