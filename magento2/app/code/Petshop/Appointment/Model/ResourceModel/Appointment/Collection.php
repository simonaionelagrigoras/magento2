<?php
/**
 * Created by PhpStorm.
 * User: Simona
 * Date: 30/05/2019
 * Time: 16:28
 */

namespace Petshop\Appointment\Model\ResourceModel\Appointment;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @inheritdoc
     */
    protected $_eventPrefix = 'order_appointment_collection';

    /**
     * @inheritdoc
     */
    protected $_eventObject = 'order_appointment_collection';

    /**
     * @inheritdoc
     */
    protected $_idFieldName = 'appointment_id';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init('Petshop\Appointment\Model\Appointment', 'Petshop\Appointment\Model\ResourceModel\Appointment');
    }

}
