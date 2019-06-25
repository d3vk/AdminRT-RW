<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DataGroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Groups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-group-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Data Group', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_wilayah',
            'no_kk',
            'kepala_keluarga',
            'nama_group',
            //'rt',
            //'rw',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
