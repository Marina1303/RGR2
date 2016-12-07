<?php use \yii\helpers\Html;?>
	<h1> Пассажиры рейса <?=htmlspecialchars( $flight->number_flight);?> </h1>
	<table class="table">
		<tr class="danger">
			<th>№ </th>
			<th>Фамилия</th>
			<th>Имя </th>
			<th>Дата рождения </th>
			<th> Номер телефона </th>
		</tr>	
		<?php foreach($list as $pass) { ?>
			<tr>
				<td><?=$pass->id ?> </td>
				<td><?=htmlspecialchars( $pass->first_name)?> </td>
				<td><?=htmlspecialchars( $pass->last_name)?> </td>
				<td><?=(new\ DateTime( $pass->date_birth))->format('d.m.Y')?> </td>
				<td><?=htmlspecialchars( $pass->phone_number)?> </td>
			</tr>
		<?php } ?>
	</table>