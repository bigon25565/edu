<?php

namespace app\test_system\models\lecture_has_test;

/**
 * This is the ActiveQuery class for [[LectureHasTest]].
 *
 * @see LectureHasTest
 */
class LectureHasTestQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return LectureHasTest[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return LectureHasTest|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
