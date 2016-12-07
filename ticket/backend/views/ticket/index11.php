 <?php use \yii\helpers\html;?>
	<h1> Список рейсов </h1>
	<table class="table">
		<tr class="danger">
			<th>№ </th>
			
			<th>Номер рейса</th>
			<th>Город отправления </th>
			<th>Город прибытия</th>
			<th>Дата и время отправления </th>
		</tr>	
		<?php foreach($flight as $flights) { ?>
			<tr  >
				<td><?=$flights->id ?> </td>
				<td><?=htmlspecialchars( $flights->number_flight)?> </td>
				<td><?php echo htmlspecialchars( $flights->getDepartureCity()->one()->name_city )?> </td>
				<td><?php echo htmlspecialchars( $flights->getArrivalCity()->one()->name_city )?> </td>
				<td><?=(new\ DateTime( $flights->date_departure))->format('d.m.Y'. ' время ' .'H:i:s' )?> </td>
				<td><?=html::a('<span class="glyphicon glyphicon-pencil"> </span> Редактировать',['ticket/edit_flight','id'=>$flights->id],['class'=>'btn btn-primary']) ?>
					<?php 
					if ($flights->getTickets()->count()==0  ) {    
						echo html::a('<span class="glyphicon glyphicon-remove"> </span> Удалить',['ticket/delete_flight','id'=>$flights->id],['class'=>'btn btn-primary']);
					}?>	
				</td>
			</tr>	
		<?php } ?>
			<tr>
				<td colspan="1"> </td>
				<td>  <?=html::a('<span class="glyphicon glyphicon-plus"> </span> Добавить',['ticket/add_flight','id'=>$flights->id],['class'=>'btn btn-primary']) ?>  </td>
			</tr>
	</table>	