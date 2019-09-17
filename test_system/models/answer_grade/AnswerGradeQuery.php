<?php

namespace app\test_system\models\answer_grade;

/**
 * This is the ActiveQuery class for [[AnswerGrade]].
 *
 * @see AnswerGrade
 */
class AnswerGradeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AnswerGrade[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AnswerGrade|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
