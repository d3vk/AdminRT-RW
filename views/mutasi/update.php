<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mutasi */

$this->title = 'Update Mutasi: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mutasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mutasi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
