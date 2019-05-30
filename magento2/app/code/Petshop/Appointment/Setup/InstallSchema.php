<?php
/**
 * Created by PhpStorm.
 * User: Simona
 * Date: 30/05/2019
 * Time: 16:30
 */

namespace Petshop\Appointment\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $this->createAppointmentTable($setup);
        $setup->endSetup();
    }



    protected function createAppointmentTable(SchemaSetupInterface $setup){
        $installer = $setup;
        /**
         * Create table 'petshop_order_appointment'
         */
        if (!$installer->getConnection()->isTableExists($installer->getTable('petshop_order_appointment'))) {

            $table = $installer->getConnection()
                ->newTable($installer->getTable('petshop_order_appointment'))
                ->addColumn(
                    'appointment_id',
                    Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                    'Appointment ID'
                )
                ->addColumn(
                    'customer_id',
                    Table::TYPE_INTEGER,
                    null,
                    ['unsigned' => true, 'nullable' => false],
                    'Customer id'
                )
                ->addColumn(
                    'order_id',
                    Table::TYPE_INTEGER,
                    null,
                    ['unsigned' => true, 'nullable' => false],
                    'Order Id'
                )
                ->addColumn(
                    'created_at',
                    Table::TYPE_DATE,
                    null,
                    ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                    'Created At'
                )
                ->addColumn(
                    'next_date',
                    Table::TYPE_DATE,
                    null,
                    ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                    'Next Delivery Date'
                )
                ->addColumn(
                    'email_sent',
                    Table::TYPE_INTEGER,
                    null,
                    ['nullable' => false, 'default' => 0],
                    'Notification Email'
                )
                ->setComment('Petshop orders appointment table');

            $installer->getConnection()->createTable($table);

        }

        $installer->endSetup();
    }
}
