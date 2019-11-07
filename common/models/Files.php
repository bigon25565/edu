<?php

namespace app\common\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
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
class Files extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;

    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg,docx,txt'],
        ];
    }

        public function attributeLabels()
    {
        return [
 
            'file' => 'Type',
        ];
    }

    public function upload()
    {
        if ($this->validate() && $this->file != NULL) {
            $this->file->saveAs('../web/uploads/' . $this->file->baseName . '.' . $this->file->extension);
            return true;
        } else {
            return false;
        }
    }
    /**
     * @return \yii\db\ActiveQuery
     */

}
