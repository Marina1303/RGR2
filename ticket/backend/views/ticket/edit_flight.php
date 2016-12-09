<?php 
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<h2> Редактировать рейс </h2>
	<?php  $form=ActiveForm::begin();?>
		<?=$form->field($flight,'number_flight')?>
		<?=$form->field($flight,'status')->listbox([1=>"Действующий",2=>"Отменен"])?>
		<?=$form->field($flight,'date_departure')?>
		<?=$form->field($flight,'departure_city_id')->listbox(arrayHelper::map($cities,'id','name_city'))?>
		<?=$form->field($flight,'arrival_city_id')->listbox(arrayHelper::map($cities,'id','name_city'))?>
		<button class="btn btn-primary" type="submit"> Сохранить </button>
	<?php  ActiveForm::end(); ?>
