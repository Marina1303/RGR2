<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = 'ошибка';
?>
<div class="site-error">

    <h1>  Ошибка № <?=$exception->statusCode ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        
		Произошла ошибка во время обработки вашего запроса.
    </p>
    <p>
    
		 Пожалуйста, свяжитесь с нами, если возникла ошибка с сервером. Спасибо.
    </p>

</div>
