<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Wilayah;

/* @var $this yii\web\View */
/* @var $model app\models\DataGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-group-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_wilayah')->dropDownList(Wilayah::getListWilayah(), ["prompt" => "Pilih wilayah"]) ?>

    <?= $form->field($model, 'no_kk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kepala_keluarga')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_group')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rt')->textInput() ?>

    <?= $form->field($model, 'rw')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
