<?php

use yii\db\Migration;

class m190916_101516_create_table_test_has_answer_file_upload extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%test_has_answer_file_upload}}', [
            'id' => $this->primaryKey(),
            'test_id' => $this->integer(),
            'answer_file_upload_id' => $this->integer(),
            'grade_id' => $this->integer(),
        ], $tableOptions);

        $this->createIndex('IDX_test_has_a_file_answer', '{{%test_has_answer_file_upload}}', 'answer_file_upload_id');
        $this->createIndex('IDX_test_has_a_file_test', '{{%test_has_answer_file_upload}}', 'test_id');
        $this->createIndex('UK_test_has_a_grade', '{{%test_has_answer_file_upload}}', 'grade_id', true);
        $this->addForeignKey('FK_test_has_answer_file_upload_answer_file_upload_id', '{{%test_has_answer_file_upload}}', 'answer_file_upload_id', '{{%answer_file_upload}}', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('FK_test_has_answer_file_upload_answer_grade_id', '{{%test_has_answer_file_upload}}', 'grade_id', '{{%answer_grade}}', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('FK_test_has_answer_file_upload_test_id', '{{%test_has_answer_file_upload}}', 'test_id', '{{%test}}', 'id', 'SET NULL', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%test_has_answer_file_upload}}');
    }
}
