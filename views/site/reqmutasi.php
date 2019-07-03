<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Wilayah;
use app\models\DataGroup;
/* @var $this yii\web\View */
/* @var $model app\models\Mutasi */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Ajukan Mutasi';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="mutasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nik')->textInput(['value' => Yii::$app->user->identity->nik]) ?>

    <?= $form->field($model, 'tanggal')->label(false)->hiddenInput(['value' => date('Y-m-d')]); ?>

    <?= $form->field($model, 'wilayah_lama')->dropDownList(Wilayah::getListWilayah(), ["prompt" => "Masukkan alamat"]); ?>

    <?= $form->field($model, 'wilayah_baru')->dropDownList(Wilayah::getListWilayah(), ["prompt" => "Masukkan alamat"]); ?>

    <?= $form->field($model, 'group_lama')->dropDownList(DataGroup::getListGroupID(), ["prompt" => "Masukkan asal keluarga"]); ?>

    <?= $form->field($model, 'group_baru')->dropDownList(DataGroup::getListGroupID(), ["prompt" => "Masukkan keluarga baru"]); ?>

    <?= $form->field($model, 'approval')->label(false)->hiddenInput(['value' => 'Proses Mutasi']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>