<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AnggotaKeluargaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lihat Anggota Keluarga';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anggota-keluarga-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nik',
            'no_kk',
            'nama_anggota',
            'status_hubungan',
            'status_perkawinan',
            //'tempat_lahir',
            //'tanggal_lahir',
            //'jenis_kelamin',
            //'gol_darah',
            //'agama',
            //'pendidikan',
            //'pekerjaan',
            //'nama_ibu',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>