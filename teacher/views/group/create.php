<?php

use app\models\EducationalOrganization;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Group */
/* @var $educationalOrganizationList EducationalOrganization::selectList() */

$this->title = Yii::t('app', 'Create Group');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'educationalOrganizationList' => $educationalOrganizationList
    ]) ?>

</div>
