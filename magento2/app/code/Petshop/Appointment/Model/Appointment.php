<?php
/**
 * Created by PhpStorm.
 * User: Simona
 * Date: 30/05/2019
 * Time: 16:19
 */
namespace Petshop\Appointment\Model;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Registry;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\Model\ResourceModel\AbstractResource;
use Magento\Framework\App\ResourceConnection;

class Appointment extends AbstractModel
{
    /**
     * Model event prefix
     *
     * @var string
     */
    protected $_eventPrefix = 'order_appointment';

    /**
     * Parameter name in event
     *
     * In observe method you can use $observer->getEvent()->getObject() in this case
     *
     * @var string
     */
    protected $_eventObject = 'order_appointment';

    /**
     * Appointment constructor.
     * @param Context $context
     * @param Registry $registry
     * @param AbstractResource|null $resource
     * @param AbstractDb|null $resourceCollection
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        AbstractResource $resource = null,
        AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);

    }

    /**
     * Initialize vendor model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Petshop\Appointment\Model\ResourceModel\Appointment');
    }


    /**
     * Processing object after save data
     *
     * @return $this
     */
    public function afterSave()
    {
        parent::afterSave();
    }

}
