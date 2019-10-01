<?php

namespace Quydhd\Article\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Zend_Db_Exception
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if (version_compare($context->getVersion(), '1.1.0', '<')) {
            if ($setup->getConnection()->isTableExists($setup->getTable('sm_article')) != true) {
                $table = $setup->getConnection()
                    ->newTable($setup->getTable('sm_article'))
                    ->addColumn(
                        'article_id',
                        Table::TYPE_INTEGER,
                        null,
                        [
                            'identity' => true,
                            'unsigned' => true,
                            'nullable' => false,
                            'primary' => true
                        ],
                        'Article ID'
                    )
                    ->addColumn(
                        'name',
                        Table::TYPE_TEXT,
                        255,
                        [
                            'nullable' => false
                        ],
                        'Name'
                    )
                    ->addColumn(
                        'content',
                        Table::TYPE_TEXT,
                        '50k',
                        [
                            'nullable' => false
                        ],
                        'Content'
                    )
                    ->addColumn(
                        'image',
                        Table::TYPE_TEXT,
                        255,
                        [],
                        'Image'
                    )
                    ->addColumn(
                        'created_at',
                        Table::TYPE_TIMESTAMP,
                        null,
                        [
                            'nullable' => false,
                            'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT
                        ],
                        'Create At'
                    )
                    ->addColumn(
                        'updated_at',
                        Table::TYPE_TIMESTAMP,
                        null,
                        [
                            'nullable' => false,
                            'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE
                        ],
                        'Updated At'
                    )
                    ->setComment('SmartOsc Article ');
                $setup->getConnection()->createTable($table);
                $setup->getConnection()->addIndex(
                    $setup->getTable('sm_article'),
                    $setup->getIdxName(
                        $setup->getTable('sm_article'),
                        ['name', 'content', 'image'], \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                    ),
                    ['name', 'content', 'image'], \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                );
            }
        }
        $setup->endSetup();
    }
}