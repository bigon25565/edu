<?php

namespace app\teacher;

/**
 * Teacher module definition class
 */
class Teacher extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $layout = 'teacher_layout';
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\teacher\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
