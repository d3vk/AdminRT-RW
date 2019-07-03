<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Mutasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mutasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_kk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kepala_keluarga')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal')->textInput() ?>

    <?= $form->field($model, 'wilayah_lama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wilayah_baru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'group_lama')->textInput() ?>

    <?= $form->field($model, 'group_baru')->textInput() ?>

    <?= $form->field($model, 'approval')->dropDownList(['Proses Mutasi' => 'Proses Mutasi', 'Aktif' => 'Aktif']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
