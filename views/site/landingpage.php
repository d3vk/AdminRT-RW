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
    $approval = SiteController::getApproval();
    $status = SiteController::getStatusKK();

    if ($approval == "Aktif" && $status == 'Aktif') {
        echo "<div class='alert alert-success' role='alert'>
    Status Kartu Keluarga Anda : <b>" . $status . "</b> 
    </div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>
    Status Kartu Keluarga Anda : <b>Proses Mutasi</b> 
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
                'heading' => 'Menu',
                'items' => [
                    [
                        'url' => '#',
                        'label' => 'Home (' . $nik . ')',
                        'icon' => 'home'
                    ], [
                        'url' => 'index.php?r=site%2Fview-member',
                        'label' => 'Lihat Anggota',
                        'icon' => 'eye-open'
                    ],
                    [
                        'url' => 'index.php?r=site%2Fview-tax',
                        'label' => 'Lihat Tagihan',
                        'icon' => 'file'
                    ],
                    [
                        'url' => 'index.php?r=site%2Freq-mutasi',
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