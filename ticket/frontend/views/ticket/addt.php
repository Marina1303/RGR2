<?php 
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?>
	<h2> Информация по рейсу:  </h2>
	<p> Рейс:  <?=htmlspecialchars( $ticket->getFlight()->one()->number_flight)?> </p>
	<p>город отправления - <?=htmlspecialchars( $ticket->getFlight()->one()->getDepartureCity()->one()->name_city)?></p> 
	<p>город прибытия -  <?=htmlspecialchars( $ticket->getFlight()->one()->getArrivalCity()->one()->name_city)?> </p>
	
	<h2> Заказать билет </h2>
	<?php  $form=ActiveForm::begin();?>
		<?=$form->field($ticket,'first_name')?>
		<?=$form->field($ticket,'last_name')?>
		<?=$form->field($ticket,'date_birth')?>
		<?=$form->field($ticket,'phone_number')?>
		<button class="btn btn-primary" type="submit"> Добавить </button>
	
		
	<?php  ActiveForm::end(); ?>
