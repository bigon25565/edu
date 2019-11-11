<?php

namespace app\common\controllers;

use Yii;
use app\common\models\Comments;
use app\common\models\Files;
use app\common\models\Hasfiles;
use app\common\models\Roles;
use app\common\models\Rating;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class WorksController extends Controller
{


	public function actionIndex()
    {	
    	$comments = Comments::find()->where(['test_id'=>1])->all();
    	$has = new Hasfiles;
        $model = new Comments;
        $hell = new Files;
        $rating = new Rating;
        // $rating = Rating::find()->all();
        //     echo '<pre>';
        //     print_r($rating);
        //     echo '</pre>';
        //     die;
        if($rating->load(Yii::$app->request->post()))
        {
            // if($rating->validate)
            // {
                die;
                $rating->save();
            // }
        }
    	if($model->load(Yii::$app->request->post()))
    	{
            // echo '<pre>';
            // print_r($hell);
            // echo '</pre>';
            // die;
    		$model->test_id=1;
    		$model->creator_id=2;
    		$model->save();
    		$hell->file = UploadedFile::getInstance($hell, 'file');
    		if ($hell->upload())
    		{
            // echo '<pre>';
            // print_r($hell);
            // echo '</pre>';
            // die;
    		$has->name = $hell->file->name;
    		$has->comment_id = $model->id;
    		$has->type = $hell->file->type;
    		$has->save(false);
                return $this->redirect('works/index');
            }
            return $this->redirect('works/index');
        }
        return $this->render('index', ['model'=>$model,'hell'=>$hell,'comments'=>$comments,'rating'=>$rating]);
    }

    public function actionCommentdelete($id)
    {
        $del = Comments::find()->where(['id'=>$id])->one();
        $del->delete();
        return $this->redirect('http://edu/web/common/works');
    }
}