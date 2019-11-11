<?php

namespace app\common\models;

use Yii;

/**
 * This is the model class for table "raiting".
 *
 * @property int $id
 * @property int $comment_id
 * @property int $rating
 *
 * @property Comments $comment
 */
class Rating extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rating';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comment_id', 'rating'], 'required'],
            [['comment_id', 'rating'], 'integer'],
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
            'rating' => 'Rating',
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
