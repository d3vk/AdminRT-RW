<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Tagihan;
use app\controllers\SiteController;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TagihanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lihat Tagihan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tagihan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    
    $data = SiteController::getStatusBayar();
    $tagihan1 = $data['1'];
    $tagihan2 = $data['2'];
    $tagihan3 = $data['3'];

    if ($tagihan1 == "Terbayar" && $tagihan2 == "Terbayar" && $tagihan3 == "Terbayar") {
        echo "<div class='alert alert-success' role='alert'>
    <b>Terimakasih telah melakukan pembayaran</b></div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>
    <b>Anda belum melakukan pembayaran</b></div>";
    }
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'id_group',
            // 'no_kk',
            'deskripsi',
            'tagihan',
            'status',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>