<?php

use yii\db\Migration;

class m190907_204459_create_table_educational_organization extends Migration {
	public function up() {
		$tableOptions = null;
		if ( $this->db->driverName === 'mysql' ) {
			$tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
		}

		$this->createTable( '{{%educational_organization}}', [
			'id'        => $this->primaryKey(),
			'title'     => $this->string()->notNull()->comment( 'Сокращенное наименование' ),
			'full_name' => $this->text()->notNull()->comment( 'Полное наименование' ),
			'city'      => $this->integer()->comment( 'Город' ),
		], $tableOptions );

		$this->addColumn( 'group', 'educational_organization_id', $this->integer( 11 )->comment( 'Образовательное учреждение' ) );
		$this->createIndex(
			'IDX_group_educational_organization_id',
			'group',
			'educational_organization_id',
			false
		);

		$this->addForeignKey(
			'FK_group_educational_organization_id',
			'group',
			'educational_organization_id',
			'educational_organization',
			'id',
			'SET NULL',
			'CASCADE'
		);
	}

	public function down() {
		$this->dropTable( '{{%educational_organization}}' );
		$this->dropColumn( 'group', 'educational_organization_id' );
		$this->dropIndex( 'IDX_group_educational_organization_id', 'group' );
		$this->dropForeignKey( 'FK_group_educational_organization_id', 'group' );
	}
}
