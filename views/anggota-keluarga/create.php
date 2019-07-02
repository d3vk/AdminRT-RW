<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AnggotaKeluarga */

$this->title = 'Buat Anggota Keluarga';
$this->params['breadcrumbs'][] = ['label' => 'Anggota Keluargas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anggota-keluarga-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>