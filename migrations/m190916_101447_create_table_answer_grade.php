<?php

use yii\db\Migration;

class m190916_101447_create_table_answer_grade extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%answer_grade}}', [
            'id' => $this->primaryKey(),
            'type' => $this->string()->notNull()->comment('Тип оценок'),
            'grade_json' => $this->text()->notNull()->comment('Оценка в формате JSON'),
            'comment' => $this->text(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%answer_grade}}');
    }
}
