<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kampactie */

$this->title = 'Update Kampactie: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kampacties', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kampactie-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
