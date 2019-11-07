<?php

namespace app\common\models;

use Yii;

/**
 * This is the model class for table "comment_has_files".
 *
 * @property int $id
 * @property int $comment_id
 * @property string $name
 * @property string $type
 *
 * @property Comments $comment
 */
class Hasfiles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment_has_files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comment_id', 'name', 'type'], 'required'],
            [['comment_id'], 'integer'],
            [['name', 'type'], 'string', 'max' => 255],
            [['comment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Comments::className(), 'targetAttribute' => ['comment_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'comment_id' => 'Comment ID',
            'name' => 'Name',
            'type' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComment()
    {
        return $this->hasOne(Comments::className(), ['id' => 'comment_id']);
    }
}
