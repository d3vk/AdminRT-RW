<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\DataGroup;

/* @var $this yii\web\View */
/* @var $model app\models\Tagihan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tagihan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_group')->dropDownList(DataGroup::getListGroupID()) ?>

    <?= $form->field($model, 'no_kk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi')->dropDownList(['Tenaga Kebersihan' => 'Tenaga Kebersihan', 'Tenaga Keamanan' => 'Tenaga Keamanan']) ?>

    <?= $form->field($model, 'tagihan')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(['Belum Bayar' => 'Belum Bayar', 'Terbayar' => 'Terbayar']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
