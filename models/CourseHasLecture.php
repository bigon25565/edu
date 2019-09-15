<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course_has_lecture".
 *
 * @property int $id
 * @property int $course_id
 * @property int $lecture_id
 * @property int $order_in_course
 *
 * @property Course $course
 * @property Lecture $lecture
 */
class CourseHasLecture extends \yii\db\ActiveRecord {
	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'course_has_lecture';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[ [ 'course_id', 'lecture_id', 'order_in_course' ], 'required' ],
			[ [ 'course_id', 'lecture_id', 'order_in_course' ], 'integer' ],
			[
				[ 'course_id' ],
				'exist',
				'skipOnError'     => true,
				'targetClass'     => Course::className(),
				'targetAttribute' => [ 'course_id' => 'id' ]
			],
			[
				[ 'lecture_id' ],
				'exist',
				'skipOnError'     => true,
				'targetClass'     => Lecture::className(),
				'targetAttribute' => [ 'lecture_id' => 'id' ]
			],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'id'              => Yii::t( 'app', 'ID' ),
			'course_id'       => Yii::t( 'app', 'Course ID' ),
			'lecture_id'      => Yii::t( 'app', 'Lecture ID' ),
			'order_in_course' => Yii::t( 'app', 'Order' ),
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCourse() {
		return $this->hasOne( Course::className(), [ 'id' => 'course_id' ] );
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getLecture() {
		return $this->hasOne( Lecture::className(), [ 'id' => 'lecture_id' ] );
	}

	/**
	 * @param $course_id
	 *
	 * @return int
	 */
	public static function getNextOrder( $course_id ) {
		$nextOrder = self::find()->where( [ 'course_id' => $course_id ] )->max( 'order_in_course' )->order_in_course;

		return is_null( $nextOrder ) ? 1 : $nextOrder;
	}

	public function getPrevOrder() {

	}

	public function getLastOrder() {

	}

	public function getFirstOrder() {

	}

	/**
	 * @param $course_id
	 * @param $lecture_id
	 *
	 * @return array
	 */
	public static function addRecord( $course_id, $lecture_id ) {
		$order                                  = CourseHasLecture::getNextOrder( $course_id );
		$CourseHasLectureModel                  = new CourseHasLecture();
		$CourseHasLectureModel->course_id       = $course_id;
		$CourseHasLectureModel->lecture_id      = $lecture_id;
		$CourseHasLectureModel->order_in_course = $order ++;
		if ( $CourseHasLectureModel->save() ) {
			return [ 'result' => true, 'model' => $CourseHasLectureModel ];
		} else {
			return [ 'result' => false, 'errors' => $CourseHasLectureModel->errors ];
		}
	}
}
