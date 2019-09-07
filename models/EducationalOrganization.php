<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "educational_organization".
 *
 * @property int $id
 * @property string $title Сокращенное наименование
 * @property string $full_name Полное наименование
 * @property int $city Город
 *
 * @property Group[] $groups
 */
class EducationalOrganization extends \yii\db\ActiveRecord {
	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'educational_organization';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[ [ 'title', 'full_name' ], 'required' ],
			[ [ 'full_name' ], 'string' ],
			[ [ 'city' ], 'integer' ],
			[ [ 'title' ], 'string', 'max' => 255 ],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'id'        => Yii::t( 'app', 'ID' ),
			'title'     => Yii::t( 'app', 'Title' ),
			'full_name' => Yii::t( 'app', 'Full Name' ),
			'city'      => Yii::t( 'app', 'City' ),
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getGroups() {
		return $this->hasMany( Group::className(), [ 'educational_organization_id' => 'id' ] );
	}

	/**
	 * Array of educational organization ['id','name+full_name']
	 * @return array
	 */
	public static function selectList() {
		return ArrayHelper::map( self::find()->select( [
			'id',
			'title'
		] )->asArray()->all(), 'id', 'title' );
	}

}
