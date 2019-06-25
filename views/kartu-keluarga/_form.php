<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Wilayah;
use app\models\StatusKk;

/* @var $this yii\web\View */
/* @var $model app\models\KartuKeluarga */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kartu-keluarga-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_kk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kepala_keluarga')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->dropDownList(Wilayah::getListWilayah(), ["prompt" => "Masukkan alamat"]); ?>

    <?= $form->field($model, 'status')->dropDownList(StatusKk::getStatusKK(), ["prompt" => "Pilih status"]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
