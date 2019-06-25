<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KartuKeluarga */

$this->title = 'Update Kartu Keluarga: ' . $model->no_kk;
$this->params['breadcrumbs'][] = ['label' => 'Kartu Keluargas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->no_kk, 'url' => ['view', 'id' => $model->no_kk]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kartu-keluarga-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
