<?php

use kartik\markdown\Markdown;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lecture */

$this->title                   = $model->title;
$this->params['breadcrumbs'][] = [ 'label' => Yii::t( 'app', 'Lectures' ), 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register( $this );
?>
<div class="lecture-view">
    <div id="w1" class="x_panel">
        <div class="x_title">
            <h1><?= Html::encode( $this->title ) ?></h1>

            <div class="clearfix"></div>
        </div>


        <ul id="w14" class="nav navbar-left panel_toolbox">
            <li>
				<?= Html::a( '<i
                            class="fa fa-pencil fa-2x"></i>', [
					'update',
					'id' => $model->id
				] ) ?>

            </li>
            <li>
				<?= Html::a( '<i
                            class="fa fa-plus fa-2x"></i>', [
					'create'
				] ) ?>

            </li>
            <li>
				<?= Html::a( '<i
                        class="fa fa-trash fa-2x"></i>', [ 'delete', 'id' => $model->id ], [
					'data' => [
						'confirm' => Yii::t( 'app', 'Are you sure you want to delete this item?' ),
						'method'  => 'post',
					],
				] ) ?>

            </li>
            <li>
				<?= \Yii::t( 'app', 'author' ) ?>
				<?= \Yii::$app->user->identity->username ?>
            </li>
        </ul>

        <div class="x_content">

			<?= Markdown::convert( $model->body ) ?>


        </div>
    </div>
</div>
