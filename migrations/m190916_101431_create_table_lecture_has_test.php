<?php

use yii\db\Migration;

class m190916_101431_create_table_lecture_has_test extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%lecture_has_test}}', [
            'id' => $this->primaryKey(),
            'lecture_id' => $this->integer(),
            'test_id' => $this->integer(),
        ], $tableOptions);

        $this->createIndex('IDX_lecture_has_test_course_id', '{{%lecture_has_test}}', 'test_id');
        $this->createIndex('IDX_lecture_has_test_lecture_i', '{{%lecture_has_test}}', 'lecture_id');
        $this->addForeignKey('FK_lecture_has_test_lecture_id', '{{%lecture_has_test}}', 'lecture_id', '{{%lecture}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_lecture_has_test_test_id', '{{%lecture_has_test}}', 'test_id', '{{%test}}', 'id', 'NO ACTION', 'NO ACTION');
    }

    public function down()
    {
        $this->dropTable('{{%lecture_has_test}}');
    }
}
