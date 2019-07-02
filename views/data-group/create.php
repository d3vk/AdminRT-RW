<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataGroup */

$this->title = 'Buat Data Group';
$this->params['breadcrumbs'][] = ['label' => 'Data Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
