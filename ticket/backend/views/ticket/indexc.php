<?php use \yii\helpers\Html;?>
	<h1> Список городов </h1>
	<table class="table">
		<tr  class="danger">
			<th>№ </th>
			<th>Название города</th>
			<th>Действие</th>
		</tr>	
		<?php foreach($city as $cities) { ?>
			<tr>
				<td><?=$cities->id ?> </td>
				<td><?=htmlspecialchars( $cities->name_city)?> </td>
				<td>  <?=html::a('<span class="glyphicon glyphicon-pencil"> </span> Редактировать',['ticket/edit_city','id'=>$cities->id],['class'=>'btn btn-primary']) ?>
				<?php
		           if ($cities->getFlights()->count()==0 && $cities->getFlights0()->count()==0  ) {
			echo html::a('<span class="glyphicon glyphicon-remove"> </span> Удалить',['ticket/delete_city','id'=>$cities->id],['class'=>'btn btn-primary']);
				   }?>	
				</td>
			</tr>	
			<?php } ?>
				<tr>
					<td colspan="1"> </td>
					<td>  <?=html::a('<span class="glyphicon glyphicon-plus"> </span> Добавить',['ticket/add_city','id'=>$cities->id],['class'=>'btn btn-primary']) ?> </td>
				</tr>
	</table>	