<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kampactie */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kampactie-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'naam')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'datum')->textInput() ?>

    <?= $form->field($model, 'omschrijving')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'geld')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
