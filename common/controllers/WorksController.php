<?php

namespace app\common\controllers;

use Yii;
use app\common\models\Comments;
use app\common\models\Files;
use app\common\models\Hasfiles;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class WorksController extends Controller
{


	public function actionIndex()
    {	
    	$comments = Comments::find()->where(['test_id'=>1])->all();
    	// foreach ($comments as $key => $value) {
    	// 	echo '<pre>';
    	// print_r($value->creator);
    	// echo '</pre>';
    	// }
    	$has = new Hasfiles;
    	
    	// die;
        $model = new Comments;
        $file = new Files;
    	if($model->load(Yii::$app->request->post()))
    	{
    		$model->test_id=1;
    		$model->creator_id=2;
    		$model->save();
    		$file->file = UploadedFile::getInstance($file, 'file');
    		if ($file->upload())
    		{

    		$has->name = $file->file->name;
    		$has->comment_id = $model->id;
    		$has->type = $file->file->type;
    		$has->save(false);
    		// echo '<pre>';
    		// print_r($has);
    		// echo '</pre>';
    		// die;
                return $this->render('index', ['model'=>$model,'file'=>$file,'comments'=>$comments]);
            }
            return $this->render('index', ['model'=>$model,'file'=>$file,'comments'=>$comments]);
        }
        return $this->render('index', ['model'=>$model,'file'=>$file,'comments'=>$comments]);
    }
}