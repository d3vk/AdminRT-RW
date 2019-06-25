<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MutasiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mutasi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'no_kk') ?>

    <?= $form->field($model, 'tanggal') ?>

    <?= $form->field($model, 'group_lama') ?>

    <?= $form->field($model, 'group_baru') ?>

    <?php // echo $form->field($model, 'approval') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
