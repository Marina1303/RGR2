<?php 
use yii\bootstrap\activeform;
use yii\helpers\arrayHelper;
?>
<h2> Редактировать рейс </h2>
	<?php  $form=ActiveForm::begin();?>
		<?=$form->field($flight,'number_flight')?>
		<?=$form->field($flight,'status')->listbox([1=>"Действующий",2=>"Отменен"])?>
		<?=$form->field($flight,'date_departure')?>
		<?=$form->field($flight,'departure_city_id')->listbox(arrayHelper::map($cities,'id','name_city'))?>
		<?=$form->field($flight,'arrival_city_id')->listbox(arrayHelper::map($cities,'id','name_city'))?>
		<button class="btn btn-primary" type="submit"> Добавить </button>
	<?php  ActiveForm::end(); ?>
