<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MutasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mutasis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mutasi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Mutasi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'no_kk',
            'kepala_keluarga',
            'tanggal',
            'wilayah_lama',
            //'wilayah_baru',
            //'group_lama',
            //'group_baru',
            //'approval',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
