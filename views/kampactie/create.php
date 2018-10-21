<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kampactie */

$this->title = 'Create Kampactie';
$this->params['breadcrumbs'][] = ['label' => 'Kampacties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kampactie-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
