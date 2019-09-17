<?php

namespace app\test_system\models\test_file;

/**
 * This is the ActiveQuery class for [[TestHasAnswerFileUpload]].
 *
 * @see TestHasAnswerFileUpload
 */
class TestHasAnswerFileUploadQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TestHasAnswerFileUpload[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TestHasAnswerFileUpload|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
