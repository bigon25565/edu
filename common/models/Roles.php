<?php

namespace app\common\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
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
class Roles extends ActiveRecord
{

    public static function tableName()
    {
        return 'auth_assignment';
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
