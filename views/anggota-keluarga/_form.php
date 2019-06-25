<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\StatusHubungan;
use app\models\StatusPerkawinan;
use app\models\Wilayah;
use app\models\JenisKelamin;
use app\models\GolDarah;
use app\models\Agama;
use app\models\PendidikanTerakhir;
use app\models\Pekerjaan;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\AnggotaKeluarga */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anggota-keluarga-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_kk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_anggota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_hubungan')->dropDownList(StatusHubungan::getStatusHub(), ["prompt" => "Pilih status hubungan"]); ?>

    <?= $form->field($model, 'status_perkawinan')->dropDownList(StatusPerkawinan::getStatusPerkawinan(), ["prompt" => "Pilih status perkawinan"]); ?>

    <?= $form->field($model, 'tempat_lahir')->dropDownList(Wilayah::getListKota(), ["prompt" => "Pilih kota kelahiran"]); ?>

    <?= $form->field($model, 'tanggal_lahir')->widget(
        DatePicker::classname(),
        [
            'options' => ['placeholder' => 'Masukkan tanggal lahir'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]
    ); ?>

    <?= $form->field($model, 'jenis_kelamin')->dropDownList(JenisKelamin::getListGender(), ["prompt" => "Pilih jenis kelamin"]); ?>

    <?= $form->field($model, 'gol_darah')->dropDownList(GolDarah::getListGoldar(), ["prompt" => "Pilih golongan darah"]); ?>

    <?= $form->field($model, 'agama')->dropDownList(Agama::getListAgama(), ["prompt" => "Pilih agama"]); ?>

    <?= $form->field($model, 'pendidikan')->dropDownList(PendidikanTerakhir::getListPendidikan(), ["prompt" => "Pilih pendidikan terakhir"]); ?>

    <?= $form->field($model, 'pekerjaan')->dropDownList(Pekerjaan::getListPekerjaan(), ["prompt" => "Pilih pekerjaan"]); ?>

    <?= $form->field($model, 'nama_ibu')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>