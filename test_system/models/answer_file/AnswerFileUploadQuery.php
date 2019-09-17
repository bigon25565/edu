<?php

namespace app\test_system\models\answer_file;

/**
 * This is the ActiveQuery class for [[AnswerFileUpload]].
 *
 * @see AnswerFileUpload
 */
class AnswerFileUploadQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AnswerFileUpload[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AnswerFileUpload|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
