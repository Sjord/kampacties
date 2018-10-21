<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kampacties';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kampactie-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Kampactie', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'naam',
            'datum',
            'omschrijving:ntext',
            'id',
            'geld',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
