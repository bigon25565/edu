<?php

namespace app\test_system\models\lecture_has_test;

use app\models\Lecture;
use app\test_system\models\test\Test;
use Yii;

/**
 * This is the model class for table "lecture_has_test".
 *
 * @property int $id
 * @property int $lecture_id
 * @property int $test_id
 *
 * @property Lecture $lecture
 * @property Test $test
 */
class LectureHasTest extends \yii\db\ActiveRecord {
	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'lecture_has_test';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[ [ 'lecture_id', 'test_id' ], 'integer' ],
			[
				[ 'lecture_id' ],
				'exist',
				'skipOnError'     => true,
				'targetClass'     => Lecture::className(),
				'targetAttribute' => [ 'lecture_id' => 'id' ]
			],
			[
				[ 'test_id' ],
				'exist',
				'skipOnError'     => true,
				'targetClass'     => Test::className(),
				'targetAttribute' => [ 'test_id' => 'id' ]
			],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'id'         => Yii::t( 'test_system', 'ID' ),
			'lecture_id' => Yii::t( 'test_system', 'Lecture ID' ),
			'test_id'    => Yii::t( 'test_system', 'Test ID' ),
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getLecture() {
		return $this->hasOne( Lecture::className(), [ 'id' => 'lecture_id' ] );
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getTest() {
		return $this->hasOne( Test::className(), [ 'id' => 'test_id' ] );
	}

	/**
	 * {@inheritdoc}
	 * @return LectureHasTestQuery the active query used by this AR class.
	 */
	public static function find() {
		return new LectureHasTestQuery( get_called_class() );
	}

	/**
	 * @param $lecture_id
	 * @param $test_id
	 *
	 * @return array
	 */
	public static function addRecord( $lecture_id, $test_id ) {
		$model             = new LectureHasTest();
		$model->lecture_id = $lecture_id;
		$model->test_id    = $test_id;
		if ( $model->save() ) {
			return [ 'result' => true, 'model' => $model ];
		} else {
			return [ 'result' => false, 'errors' => $model->errors ];
		}
	}
}
