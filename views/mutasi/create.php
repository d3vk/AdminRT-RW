<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mutasi */

$this->title = 'Buat Mutasi';
$this->params['breadcrumbs'][] = ['label' => 'Mutasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mutasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
