<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AnggotaKeluarga */

$this->title = 'Update Anggota Keluarga: ' . $model->nik;
$this->params['breadcrumbs'][] = ['label' => 'Anggota Keluargas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nik, 'url' => ['view', 'id' => $model->nik]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="anggota-keluarga-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
