<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataGroup */

$this->title = 'Update Data Group: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="data-group-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
