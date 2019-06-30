<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
// use yii\helpers\VarDumper;
use yii\helpers\Url;
use kartik\sidenav\SideNav;
use app\controllers\SiteController;

$this->title = 'Home Page';
$this->params['breadcrumbs'][] = $this->title;

$item = Yii::$app->controller->id;
// $params = ucfirst($item);
// VarDumper::dump($params);

$isAdmin = Yii::$app->user->identity->isAdmin;
$nik = Yii::$app->user->identity->nik;

?>

<div class="site-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    $status = SiteController::getStatusKK();

    if ($status == 'Proses Mutasi') {
        echo "<div class='alert alert-danger' role='alert'>
    Status Kartu Keluarga Anda : <b>" . $status . "</b> 
    </div>";
    } else {
        echo "<div class='alert alert-success' role='alert'>
    Status Kartu Keluarga Anda : <b>" . $status . "</b> 
    </div>";
    }

    ?>

</div>

<hr>

<div class="row">
    <div class="col-sm-3">
        <?php



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
                        'label' => 'Home (' . $nik . ')',
                        'icon' => 'home'
                    ],
                    [
                        'url' => '#',
                        'label' => 'Lihat Tagihan',
                        'icon' => 'file'
                    ],
                    [
                        'url' => '#',
                        'label' => 'Request Mutasi',
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
        }

        ?>
    </div>

    <div class="col-sm-9">
        <?php
        if ($isAdmin) {
            echo "Selamat Datang, Admin!<br>
            Anda bisa melakukan manajemen terhadap catatan sipil yang ada di RT/RW anda.";
        } else {
            echo "Selamat Datang, " . Yii::$app->user->identity->nama . "!<br>";
            echo "Anda dapat melakukan aksi berdasarkan menu pada sidebar sebelah kiri.";
        }
        ?>
    </div>
</div>