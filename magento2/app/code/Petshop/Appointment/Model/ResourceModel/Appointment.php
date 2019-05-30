<?php
/**
 * Created by PhpStorm.
 * User: Simona
 * Date: 30/05/2019
 * Time: 16:25
 */

namespace Petshop\Appointment\Model\ResourceModel;

use Magento\FirstModule\Model\Model;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

class Appointment extends AbstractDb
{

    /**
     * Invoice table
     *
     * @var string
     */
    protected $appointmentTable;

    /**
     * Construct
     *
     * @param \Magento\Framework\Model\ResourceModel\Db\Context $context
     * @param string $connectionName
     */
    public function __construct(
        Context $context,
        $connectionName = null
    ) {
        parent::__construct($context, $connectionName);

        $this->appointmentTable = $this->getTable('petshop_order_appointment');
    }

    /**
     * Define main table
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('petshop_order_appointment', 'appointment_id');
    }

}
