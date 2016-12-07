<?php 
use yii\bootstrap\activeform;
use yii\helpers\arrayHelper;
?>
	<h2> Редактировать билет </h2>
	<?php  $form=ActiveForm::begin();?>
		<?=$form->field($ticket,'first_name')?>
		<?=$form->field($ticket,'last_name')?>
		<?=$form->field($ticket,'date_birth')?>
		<?=$form->field($ticket,'phone_number')?>
		<?=$form->field($ticket,'status_ticket')->listbox([0=>"Отказ",1=>"Заявка",2=>"Оплачен"])?>
		<button class="btn btn-primary" type="submit"> Добавить </button>
	<?php  ActiveForm::end(); ?>
