 <?php use \yii\helpers\html;?>
<table class="table">
	<tr>
		<th>№ </th>
		<th>Номер рейса</th>
	
	</tr>	
<?php foreach($flight as $flights) { ?>
<tr>
	<td><?=$flights->id ?> </td>
	<td><?=htmlspecialchars( $flights->number_flight)?> </td>

</tr>	
<?php } ?>
 </table>	