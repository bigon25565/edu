<?php

use yii\db\Migration;

class m190910_091041_create_table_group_has_course extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%group_has_course}}', [
            'id' => $this->primaryKey(),
            'group_id' => $this->integer()->notNull(),
            'course_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('IDX_group_has_course_course_id', '{{%group_has_course}}', 'course_id');
        $this->createIndex('IDX_group_has_course_group_id', '{{%group_has_course}}', 'group_id');
        $this->addForeignKey('FK_group_has_course_course_id', '{{%group_has_course}}', 'course_id', '{{%course}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_group_has_course_group_id', '{{%group_has_course}}', 'group_id', '{{%group}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%group_has_course}}');
    }
}
