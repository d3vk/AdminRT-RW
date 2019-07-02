<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Wilayah;

/* @var $this yii\web\View */
/* @var $model app\models\Mutasi */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Ajukan Mutasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mutasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="mutasi-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'no_kk')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'kepala_keluarga')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tanggal')->label(false)->hiddenInput(['value' => date('Y-m-d')]); ?>

        <?= $form->field($model, 'wilayah_lama')->dropDownList(Wilayah::getListWilayah(), ["prompt" => "Masukkan alamat"]); ?>

        <?= $form->field($model, 'wilayah_baru')->dropDownList(Wilayah::getListWilayah(), ["prompt" => "Masukkan alamat"]); ?>

        <?= $form->field($model, 'group_lama')->label(false)->hiddenInput(['value' => '3']); ?>

        <?= $form->field($model, 'group_baru')->label(false)->hiddenInput(['value' => '3']); ?>

        <?= $form->field($model, 'approval')->label(false)->hiddenInput(['value' => 'Proses Mutasi']); ?>

        <div class="form-group">
            <?= Html::submitButton('Ajukan', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>