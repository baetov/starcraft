<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Data */
?>
<div class="data-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'card_number',
            'date',
            'volume',
            'service',
            'address_id',
        ],
    ]) ?>

</div>
