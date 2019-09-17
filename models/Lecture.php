<?php

namespace app\models;

use app\test_system\models\lecture_has_test\LectureHasTest;
use app\test_system\models\test\Test;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "lecture".
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property string $meta_keyword
 * @property string $meta_description
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $course_id
 *
 * @property CourseHasLecture[] $courseHasLectures
 * @property LectureHasTest[] $lectureHasTests
 */
class Lecture extends \yii\db\ActiveRecord {
	public $course_id;

	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'lecture';
	}

	/**
	 * @return array
	 */
	public function behaviors() {
		return [
			[
				'class'              => BlameableBehavior::className(),
				'createdByAttribute' => 'created_by',
				'updatedByAttribute' => false,
			],
			[
				'class'              => TimestampBehavior::className(),
				'createdAtAttribute' => 'created_at',
				'updatedAtAttribute' => 'updated_at',
				'value'              => new Expression( 'NOW()' ),
			]
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[ [ 'title', 'body' ], 'required' ],
			[ [ 'title', 'body' ], 'string' ],
			[ [ 'created_at', 'updated_at', 'course_id' ], 'safe' ],
			[ [ 'created_by' ], 'integer' ],
			[ [ 'meta_keyword', 'meta_description' ], 'string', 'max' => 255 ],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'id'               => Yii::t( 'app', 'ID' ),
			'title'            => Yii::t( 'app', 'Title' ),
			'body'             => Yii::t( 'app', 'Body' ),
			'meta_keyword'     => Yii::t( 'app', 'Meta Keyword' ),
			'meta_description' => Yii::t( 'app', 'Meta Description' ),
			'created_at'       => Yii::t( 'app', 'Created At' ),
			'updated_at'       => Yii::t( 'app', 'Updated At' ),
			'created_by'       => Yii::t( 'app', 'Created By' ),
			'course_id'        => Yii::t( 'app', 'Course' ),
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCourseHasLectures() {
		return $this->hasMany( CourseHasLecture::className(), [ 'lecture_id' => 'id' ] );
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getLectureHasTests() {
		return $this->hasMany( LectureHasTest::className(), [ 'lecture_id' => 'id' ] );
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getTests()
	{
		return $this->hasMany(Test::className(), ['id' => 'test_id'])
		            ->via('lectureHasTests');
	}
		/**
		 * @param bool $insert
		 * @param array $changedAttributes
		 */
		public
		function afterSave( $insert, $changedAttributes ) {
			parent::afterSave( $insert, $changedAttributes );
			CourseHasLecture::addRecord( $this->course_id, $this->id );
		}
	}
