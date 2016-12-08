<?php 
use yii\bootstrap\Activeform;
use yii\helpers\ArrayHelper;
?>
	<h2> Добавить город </h2>
	<?php  $form=ActiveForm::begin();?>
		<?=$form->field($city,'name_city')?>
		<button class="btn btn-primary" type="submit"> Добавить </button>
	<?php  ActiveForm::end(); ?>