 <?php use \yii\helpers\Html;?>
	<p> Текущая дата <?php  echo  (new\ DateTime($date_1 = date("Y-m-d")))->format('d.m.Y'); ?> </p>
	<h1 align="center"> Выберите рейс </h1>
	<table class="table">
		<tr class="danger">
			<th>№ </th>
			<th>Номер рейса</th>
			<th>Город отправления </th>
			<th>Город прибытия</th>
			<th>Дата и время отправления</th>
		</tr>	
		
		<?php 
	foreach($flight as $flights)
	{ 
		$born = $flights->date_departure; 
		$born = strtotime($born); 
		$now = time(); 
		if ($born >= $now ) { 
		 ?> 
			<tr>
				<td><?=$flights->id ?> </td>
				<td><?=htmlspecialchars( $flights->number_flight)?> </td>
				<td><?php echo htmlspecialchars( $flights->getDepartureCity()->one()->name_city )?> </td>
				<td><?php echo htmlspecialchars( $flights->getArrivalCity()->one()->name_city )?> </td>
				<td><?=(new\ DateTime( $flights->date_departure))->format('d.m.Y'. ' время ' .'H:i:s' )?> </td>
				<td> <?=html::a(' Купить билет',['ticket/addt','flight'=>$flights->id],['class'=>'btn btn-primary']) ?> </td> 
			</tr>	
		<?php } ?>
		<?php } ?>
	</table>	