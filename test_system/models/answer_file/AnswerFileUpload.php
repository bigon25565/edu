<?php

namespace app\test_system\models\answer_file;

use Yii;

/**
 * This is the model class for table "answer_file_upload".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $file_id
 * @property string $created_at
 * @property int $attempt
 * @property string $file_link
 * @property string $file_type
 * @property int $time_left
 * @property int $created_by
 *
 * @property TestHasAnswerFileUpload[] $testHasAnswerFileUploads
 */
class AnswerFileUpload extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'answer_file_upload';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['file_id', 'file_link'], 'required'],
            [['file_id', 'attempt', 'time_left', 'created_by'], 'integer'],
            [['created_at'], 'safe'],
            [['title', 'file_link', 'file_type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('test_system', 'ID'),
            'title' => Yii::t('test_system', 'Title'),
            'description' => Yii::t('test_system', 'Description'),
            'file_id' => Yii::t('test_system', 'File ID'),
            'created_at' => Yii::t('test_system', 'Created At'),
            'attempt' => Yii::t('test_system', 'Attempt'),
            'file_link' => Yii::t('test_system', 'File Link'),
            'file_type' => Yii::t('test_system', 'File Type'),
            'time_left' => Yii::t('test_system', 'Time Left'),
            'created_by' => Yii::t('test_system', 'Created By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestHasAnswerFileUploads()
    {
        return $this->hasMany(TestHasAnswerFileUpload::className(), ['answer_file_upload_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return AnswerFileUploadQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AnswerFileUploadQuery(get_called_class());
    }
}
