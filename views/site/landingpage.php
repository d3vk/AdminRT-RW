<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\helpers\Url;
use kartik\sidenav\SideNav;


$this->title = 'Home Page';
$this->params['breadcrumbs'][] = $this->title;

$item = Yii::$app->controller->id;
$params = ucfirst($item);
VarDumper::dump($params);

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

        $isAdmin = Yii::$app->user->identity->isAdmin;

        if ($isAdmin) {
            echo SideNav::widget([
                'type' => SideNav::TYPE_DEFAULT,
                'heading' => 'Menu',
                'items' => [
                    [
                        'url' => '#',
                        'label' => 'Home (Admin)',
                        'icon' => 'home',
                        'active' => ($item == 'site')
                    ],
                    [
                        'url' => Url::toRoute('/pengguna'),
                        'label' => 'Manage Pengguna',
                        'icon' => 'user'
                    ],
                    [
                        'url' => Url::toRoute('/anggota-keluarga'),
                        'label' => 'Manage Anggota Keluarga',
                        'icon' => 'file'
                    ],
                    [
                        'url' => Url::toRoute('/kartu-keluarga'),
                        'label' => 'Manage Kartu Keluarga',
                        'icon' => 'file'
                    ],
                    [
                        'url' => Url::toRoute('/data-group'),
                        'label' => 'Manage Group',
                        'icon' => 'file'
                    ],
                    [
                        'url' => Url::toRoute('/mutasi'),
                        'label' => 'Manage Mutasi',
                        'icon' => 'file'
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
        } else {
            echo SideNav::widget([
                'type' => SideNav::TYPE_DEFAULT,
                'heading' => 'Options',
                'items' => [
                    [
                        'url' => '#',
                        'label' => 'Home (' . Yii::$app->user->identity->nik . ')',
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
        }

        ?>
    </div>

    <div class="col-sm-9">
        Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.
    </div>
</div>