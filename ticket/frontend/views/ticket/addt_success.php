<h2 align="center"> Ваша заявка принята  </h2>
<h2 align="center"> Заказан билет на рейс 
  <?= htmlspecialchars( $ticket->getFlight()->one()->number_flight)?> 
  <?=htmlspecialchars( $ticket->getFlight()->one()->getDepartureCity()->one()->name_city)?> &mdash;
  <?=htmlspecialchars( $ticket->getFlight()->one()->getArrivalCity()->one()->name_city)?>,
  вылет  <?=htmlspecialchars( $ticket->getFlight()->one()->date_departure)?>
 </h2>
 
<h2 align="center"><?= htmlspecialchars($ticket->first_name) ?> <?= htmlspecialchars($ticket->last_name) ?>, ожидайте звонка</h2>
