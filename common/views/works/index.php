<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

?>
<div class=''>



	 

	<?php
	$form = ActiveForm::begin([
	    'id' => 'comment_form',
	    'options' => ['class' => ''],
	    'options' => ['enctype' => 'multipart/form-data'],
	]) ?>
	 <div>
		 	<div class='col-md-3'>
		 	</div>

		 	<div class="col-md-6 offset-2">
				<div class='x_panel'>
		<div class="row">
					    <?= $form->field($model, 'content')->textarea(['class'=>'resizable_textarea form-control'])->label('Оставьте комментарий'); ?>
					      <div class="row">
					 		<div class='col-md-6'>
					    <?= $form->field($file, 'file')->widget(FileInput::classname(),[
					    'pluginOptions' => [
					        'showPreview' => false,
					        'showCaption' => true,
					        'showRemove' => true,
					        'showUpload' => false,
					       // 'mainClass' => 'col-md-4 fom'
					    ]
					])->label('');?>
						</div>
					<div class='col-md-6'>
					    <?= Html::submitButton('Отправить', ['class' => 'btn btn-success pull-right']) ?>
				 	</div>
				 		</div>
				<?php ActiveForm::end() ?>
		</div>
		<div>
			<h1 class="x_title">Комментарии</h1>
				<div class=' fom x_content'>
					<ul class ='list-unstyled msg_list'>

					<?php
					    // echo '<pre>';
				    	// print_r($comments);
				    	// echo '</pre>';
				    	// die;
							// echo '<pre>';
				  //   	print_r($groovy);
				  //   	echo '</pre>';
				  //   	die; C:/ospanel/domains/edu/common/uploads/mr.png
					foreach ($comments as $groovy):
					// strstr($groovy->created_at,':',true); ?>
				
						 <li>
						 	<div class="row">
						 		<div class="imag col-md-2">
						 			<img src="/web/uploads/mr.PNG" class="img-rounded img-responsive">
						 		</div>
						 			<div class="textes col-md-10">
						 				<span class="bigtxt">
						 				<?= $groovy->creator->username ?>
						 				</span><span class="wind datat">
						 				<?= $groovy->created_at ?>	
						 				</span><br>
						 				<span>
						 					<?= $groovy->content ?> 
						 				</span>
						 			</div>
						 			
							</div>
							<div class="row">

								<hr class="whakyline">
								<?php foreach ($groovy as $boomstick){
									echo '<pre>';
							    	print_r($boomstick->commentHasFiles);
							    	echo '</pre>';
							    	die;
								}

								?>
						 	</div>
						</li>
					 
					<? endforeach;?>
				</ul>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>