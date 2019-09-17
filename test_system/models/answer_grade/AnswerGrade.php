<?php

namespace app\test_system\models\answer_grade;

use Yii;

/**
 * This is the model class for table "answer_grade".
 *
 * @property int $id
 * @property string $type Тип оценок
 * @property string $grade_json Оценка в формате JSON
 * @property string $comment
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property TestHasAnswerFileUpload $testHasAnswerFileUpload
 */
class AnswerGrade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'answer_grade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'grade_json'], 'required'],
            [['grade_json', 'comment'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('test_system', 'ID'),
            'type' => Yii::t('test_system', 'Type'),
            'grade_json' => Yii::t('test_system', 'Grade Json'),
            'comment' => Yii::t('test_system', 'Comment'),
            'created_at' => Yii::t('test_system', 'Created At'),
            'updated_at' => Yii::t('test_system', 'Updated At'),
            'created_by' => Yii::t('test_system', 'Created By'),
            'updated_by' => Yii::t('test_system', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestHasAnswerFileUpload()
    {
        return $this->hasOne(TestHasAnswerFileUpload::className(), ['grade_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return AnswerGradeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AnswerGradeQuery(get_called_class());
    }
}
