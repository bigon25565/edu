<?php

namespace app\common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property string $content
 * @property int $creator_id
 * @property string $created_at
 *
 * @property CommentHasFiles[] $commentHasFiles
 * @property User $creator
 * @property Raiting[] $raitings
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    public function rules()
    {
        return [
            [['content', 'creator_id'], 'required'],
            [['creator_id'], 'integer'],
            [['created_at'], 'safe'],
            [['content'], 'string', 'max' => 255],
            [['creator_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['creator_id' => 'id']],
        ];
    }
    public function behaviors()
    {
    return [
        [
            'class' => TimestampBehavior::className(),
            'createdAtAttribute' => 'created_at',
            'updatedAtAttribute' => FALSE,
            'value' => new Expression('NOW()'),
        ]
    ];
    }

 
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'creator_id' => 'Creator ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommentHasFiles()
    {
        return $this->hasMany(CommentHasFiles::className(), ['comment_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator()
    {
        return $this->hasOne(User::className(), ['id' => 'creator_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRaitings()
    {
        return $this->hasMany(Raiting::className(), ['comment_id' => 'id']);
    }
}
