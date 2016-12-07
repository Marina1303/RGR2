<?php use \yii\helpers\html;?>
	<h1 > Список поступивших заявок </h1>
	<table class="table">
		<tr  class="danger">
			<th>№ </th>
			<th>Фамилия</th>
			<th>Имя </th>
			<th>Телефон</th>
			<th>Дата рождения </th>
			<th>Рейс </th>
			<th> Действие </th>
		</tr>	
		<?php foreach($tickets as $ticket) { ?>
			<tr >
				<td><?=$ticket->id ?> </td>
				<td><?=htmlspecialchars( $ticket->first_name)?> </td>
				<td><?=htmlspecialchars( $ticket->last_name)?> </td>
				<td><?=htmlspecialchars( $ticket->phone_number)?> </td>
				<td><?= (new\ DateTime( $ticket->date_birth))->format('d.m.Y')?> </td>
				<td> <?=html::a($ticket->getFlight()->one()->number_flight,['ticket/pass','id'=>$ticket->flight_id]) ?> </td> 
				<td> <?=html::a('<span class="glyphicon glyphicon-pencil "> </span> Редактировать',['ticket/editt','id'=>$ticket->id],['class'=>'btn btn-primary']) ?> 
				<?php
					echo html::a('<span class="glyphicon glyphicon-remove "> </span> Удалить',['ticket/delete','id'=>$ticket->id],
					['class'=>'btn btn-primary']);
				?> 
				</td>
			</tr>	
		<?php } ?>
		<tr>
			<td colspan="6"> </td>
			<td> <?=html::a('<span class="glyphicon glyphicon-ok "> </span> Оплаченные заявки',['ticket/index_opl','id'=>$ticket->id],['class'=>'btn btn-primary']) ?>
				 <?=html::a('<span class="glyphicon glyphicon-trash "> </span> Отмененные заявки',['ticket/index_cancel','id'=>$ticket->id],['class'=>'btn btn-primary']) ?> </td> 
		</tr>
 	</table>	