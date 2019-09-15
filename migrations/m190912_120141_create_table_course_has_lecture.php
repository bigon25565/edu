<?php

use yii\db\Migration;

class m190912_120141_create_table_course_has_lecture extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%course_has_lecture}}', [
            'id' => $this->primaryKey(),
            'course_id' => $this->integer()->notNull(),
            'lecture_id' => $this->integer()->notNull(),
            'order_in_course' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('IDX_course_has_lecture_order_in_course', '{{%course_has_lecture}}', 'order_in_course');
        $this->createIndex('IDX_course_has_lecture_course2', '{{%course_has_lecture}}', 'course_id');
        $this->createIndex('IDX_course_has_lecture_course_', '{{%course_has_lecture}}', 'course_id');
        $this->addForeignKey('FK_course_has_lecture_course_id', '{{%course_has_lecture}}', 'course_id', '{{%course}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_course_has_lecture_lecture_id', '{{%course_has_lecture}}', 'lecture_id', '{{%lecture}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%course_has_lecture}}');
    }
}
