<?php

use yii\db\Migration;

class m190906_104843_create_table_group_has_user extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%group_has_user}}', [
            'id' => $this->primaryKey(),
            'group_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('IDX_group_has_user_group_id', '{{%group_has_user}}', 'group_id');
        $this->createIndex('IDX_group_has_user_user_id', '{{%group_has_user}}', 'user_id');
        $this->addForeignKey('FK_group_has_user_group_id', '{{%group_has_user}}', 'group_id', '{{%group}}', 'id', 'NO ACTION', 'NO ACTION');
        $this->addForeignKey('FK_group_has_user_user_id', '{{%group_has_user}}', 'user_id', '{{%user}}', 'id', 'NO ACTION', 'NO ACTION');
    }

    public function down()
    {
        $this->dropTable('{{%group_has_user}}');
    }
}
