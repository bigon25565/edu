<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use kartik\rating\StarRating;
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
					    <?= $form->field($hell, 'file')->widget(FileInput::classname(),[
					    'pluginOptions' => [
					        'showPreview' => false,
					        'showCaption' => true,
					        'showRemove' => true,
					        'showUpload' => false,
					    ],
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

					foreach ($comments as $groovy): ?>
<!-- 						echo '<pre>';
				    	print_r($valu=$groovy->rating[0]->rating*0.5);
				    	echo '</pre>';
				    	die; -->
						 <li>
						 	<div class="row">
						 		<div class="imag col-md-2">
						 			<? if($groovy->creator->role[0]->item_name == 'admin')
						 			{
						 				echo '<img src="/web/uploads/mr.PNG" class="img-rounded img-responsive">';
						 			}else if($groovy->creator->role[0]->item_name == 'teacher'){
						 				echo '<img src="/web/uploads/teacher.PNG" class="img-rounded img-responsive">';
						 			}else if($groovy->creator->role[0]->item_name == 'student'){
						 				echo '<img src="/web/uploads/student.PNG" class="img-rounded img-responsive">';
						 			}else if($groovy->creator->role[0]->item_name == 'student'){
						 				echo '<img src="/web/uploads/manager.PNG" class="img-rounded img-responsive">';
						 			}
						 			?>
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
								<?php foreach ($groovy->files as $boomstick): ?>
									<div class="imag col-md-1">
									<?= '<a href="/web/uploads/'.$boomstick->name.'" download >' ?>
									<div class="">
									<img src="/web/uploads/file.PNG" class="img-responsive">
									</div>
									<div>
							    	<?= $boomstick->name ?>
							    	</div>
							    	</a>
							    	</div>
								<?php endforeach;?>
						 	</div>
						 	<?php
						 	$number;
						 	$i;
							// echo '<pre>';
				   //  		print_r($groovy->rating);
				   //  		echo '</pre>';
				   //  		die;
						 	foreach ($groovy->rating as $arr)
						 	{
						 		$number= $number+$arr->rating;
						 		$i++;
						 	}
						 	if($i==0){
						 		$i=1;
						 	}
						 	if($_SESSION['__id']==$groovy->creator->id  || $groovy->creator->role[0]->item_name == 'admin')
						 	{
						 		echo 
						 		'
						 		<a href="http://edu/web/common/works/commentdelete?id='.$groovy->id.'">
						 		<div class="btn btn-danger pull_left">
						 			Удалить
						 		</div>
						 		</a>
						 		';
						 	}
						 	?>
						 	<hr>
						 	<div>
						 		<?php $lol = ActiveForm::begin(['id' => 'lel'])?>
						 		<?= $lol->field($rating, 'rating')->widget(StarRating::classname(), [
						 			'options'=>[
						 			'value'=>$number/$i,
						 			],
						 			'pluginOptions'=>['mainclass'=>'lol'],
						 			'pluginEvents' => [
						 				'rating:change' => "function(event, value, caption) {
						 					     console.log(value);
   												 console.log(".$groovy->id.");
						 					$.ajax({
						 						url:'works/rating',
						 						method:'post',
						 						data: {
						 							stars:value, id:".$groovy->id."
						 						},
						 						success:function(data){
						 							alert(data);
						 						},
						 						error:function(){
						 							alert('Вы уже оставили оценку на этот комментарий');
						 						}
						 					});
						 			}"			
						 			],
						 		])->label('Оставьте свою оценку!') ?>
						 		<?php ActiveForm::end() ?>
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