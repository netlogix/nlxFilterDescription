<?php

namespace nlxFilterDescription\Migrations;

use Shopware\Components\Migrations\AbstractPluginMigration;

class Migration1 extends AbstractPluginMigration
{
    public function up($modus): void
    {
        $sql = <<<SQL
UPDATE s_core_config_elements
SET `name` = 'nlxFilterPrefixList'
WHERE `name` = 'sdFilterPrefixList';
SQL;
        $this->addSql($sql);
    }

    public function down(bool $keepUserData): void
    {
        $sql = <<<SQL
UPDATE s_core_config_elements
SET `name` = 'sdFilterPrefixList'
WHERE `name` = 'nlxFilterPrefixList';
SQL;
        $this->addSql($sql);
    }
}