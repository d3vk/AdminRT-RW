<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\DataGroup;

/* @var $this yii\web\View */
/* @var $model app\models\Pengguna */

$this->title = 'Daftar';
// $this->params['breadcrumbs'][] = ['label' => 'Penggunas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengguna-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="pengguna-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'no_kk')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'id_group')->dropDownList(DataGroup::getListGroupID(), ["prompt" => "Pilih group"]) ?>

        <?= $form->field($model, 'isAdmin')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Daftar', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>