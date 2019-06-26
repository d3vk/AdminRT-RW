<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use kartik\sidenav\SideNav;

$this->title = 'Userpage';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>
</div>

<hr>

<div class="row">
    <div class="col-sm-3">
        <?php
        echo SideNav::widget([
            'type' => SideNav::TYPE_DEFAULT,
            'heading' => 'Options',
            'items' => [
                [
                    'url' => '#',
                    'label' => 'Home',
                    'icon' => 'home'
                ],
                [
                    'label' => 'Help',
                    'icon' => 'question-sign',
                    'items' => [
                        ['label' => ' About', 'icon' => 'info-sign', 'url' => '#'],
                        ['label' => 'Contact', 'icon' => 'phone', 'url' => '#'],
                    ],
                ],
            ],
        ]);
        ?>
    </div>

    <div class="col-sm-9">
        Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.
    </div>
</div>