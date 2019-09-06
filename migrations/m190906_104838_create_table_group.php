<?php

use yii\db\Migration;

class m190906_104838_create_table_group extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%group}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->comment('Номер или название группы'),
            'year_begn' => $this->date()->notNull()->comment('Год начала обучения группы'),
            'year_end' => $this->date()->notNull()->comment('Год окончания обучения группы'),
            'p_id' => $this->integer(),
            'author_id' => $this->integer()->comment('Автор записи'),
        ], $tableOptions);

        $this->createIndex('UK_group_p_id', '{{%group}}', 'p_id');
        $this->createIndex('IDX_group_author_id', '{{%group}}', 'author_id');
        $this->addForeignKey('FK_group_group_id', '{{%group}}', 'p_id', '{{%group}}', 'id', 'NO ACTION', 'NO ACTION');
        $this->addForeignKey('FK_group_user_id', '{{%group}}', 'author_id', '{{%user}}', 'id', 'NO ACTION', 'NO ACTION');
    }

    public function down()
    {
        $this->dropTable('{{%group}}');
    }
}
