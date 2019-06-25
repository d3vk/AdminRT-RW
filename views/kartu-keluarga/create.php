<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KartuKeluarga */

$this->title = 'Create Kartu Keluarga';
$this->params['breadcrumbs'][] = ['label' => 'Kartu Keluargas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kartu-keluarga-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
