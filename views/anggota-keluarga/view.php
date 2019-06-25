<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AnggotaKeluarga */

$this->title = $model->nik;
$this->params['breadcrumbs'][] = ['label' => 'Anggota Keluargas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="anggota-keluarga-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->nik], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->nik], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nik',
            'no_kk',
            'nama_anggota',
            'status_hubungan',
            'status_perkawinan',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            'gol_darah',
            'agama',
            'pendidikan',
            'pekerjaan',
            'nama_ibu',
        ],
    ]) ?>

</div>
