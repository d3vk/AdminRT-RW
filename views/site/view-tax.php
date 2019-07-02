<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Tagihan;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TagihanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lihat Tagihan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tagihan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'id_group',
            'no_kk',
            'deskripsi',
            'tagihan',
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php
    $sum = Tagihan::getSum();
    echo "<div class='alert alert-light' role='alert'>
    Jumlah Tagihan Anda <b>Rp" . $sum ."</b></div>"

    
    ?>


</div>