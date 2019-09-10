<?php

use yii\db\Migration;

class m190910_091006_create_table_course extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%course}}', [
            'id' => $this->primaryKey(),
            'title' => $this->text()->notNull()->comment('Наимнование курса'),
            'desc' => $this->text()->notNull()->comment('Описание курса'),
            'image_text' => $this->string()->comment('Текст на картинке'),
            'image_file' => $this->string()->comment('Картинка курса'),
            'rating' => $this->float()->comment('Рейтинг'),
            'meta_keword' => $this->string()->comment('Мета keyword'),
            'meta_description' => $this->string()->comment('Meta desc'),
            'created_at' => $this->dateTime()->notNull(),
            'update_at' => $this->dateTime()->notNull(),
            'created_by' => $this->integer(),
            'begin_at' => $this->dateTime(),
            'end_at' => $this->dateTime(),
        ], $tableOptions);

        $this->createIndex('IDX_course_created_by', '{{%course}}', 'created_by');
        $this->addForeignKey('FK_course_profile_user_id', '{{%course}}', 'created_by', '{{%profile}}', 'user_id', 'SET NULL', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%course}}');
    }
}
