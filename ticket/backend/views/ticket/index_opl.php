<?php use \yii\helpers\Html;?>
<h1>Оплаченные билеты</h1>
	<table class="table">
		<tr  class="danger">
			<th>№ </th>
			<th>Фамилия</th>
			<th>Имя </th>
			<th>Дата рождения </th>
			<th>Номер телефона </th>
			<th>Рейс </th>
		</tr>	
		<?php foreach($tickets as $ticket) { ?>
			<tr>
				<td><?=$ticket->id ?> </td>
				<td><?=htmlspecialchars( $ticket->first_name)?> </td>
				<td><?=htmlspecialchars( $ticket->last_name)?> </td>
				<td><?=htmlspecialchars( $ticket->date_birth)?> </td>
				<td><?=htmlspecialchars( $ticket->phone_number)?> </td>
				<td><?php echo htmlspecialchars( $ticket->getFlight()->one()->number_flight )?> </td>
				<?php } ?>
	</table>	