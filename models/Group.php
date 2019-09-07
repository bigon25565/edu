<?php

namespace app\models;

use dektrium\user\models\Profile;
use Yii;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "group".
 *
 * @property int $id
 * @property string $title Номер или название группы
 * @property string $year_begin Год начала обучения группы
 * @property string $year_end Год окончания обучения группы
 * @property int $p_id
 * @property int $author_id Автор записи
 * @property int $educational_organization_id Автор записи
 *
 * @property Group $p
 * @property Group[] $groups
 * @property User $author
 * @property Profile $authorProfile
 * @property GroupHasUser[] $groupHasUsers
 * @property EducationalOrganization[] $educationalOrganization
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group';
    }
     /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'author_id',
                'updatedByAttribute' => false,
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'year_begin', 'year_end'], 'required'],
            [['year_begin', 'year_end'], 'safe'],
            [['p_id', 'author_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['p_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['p_id' => 'id']],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['educational_organization_id'], 'exist', 'skipOnError' => true, 'targetClass' => EducationalOrganization::className(), 'targetAttribute' => ['educational_organization_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Номер или название группы'),
            'year_begin' => Yii::t('app', 'Год начала обучения группы'),
            'year_end' => Yii::t('app', 'Год окончания обучения группы'),
            'p_id' => Yii::t('app', 'P ID'),
            'author_id' => Yii::t('app', 'Автор записи'),
            'educational_organization_id' => Yii::t('app', 'Образовательная организация'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getP()
    {
        return $this->hasOne(Group::className(), ['id' => 'p_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Group::className(), ['p_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }
	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getAuthorProfile()
	{
		return $this->hasOne(Profile::className(), ['user_id' => 'author_id']);
	}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupHasUsers()
    {
        return $this->hasMany(GroupHasUser::className(), ['group_id' => 'id']);
    }
	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getEducationalOrganization()
	{
		return $this->hasOne(EducationalOrganization::className(), ['id' => 'educational_organization_id']);
	}
}
