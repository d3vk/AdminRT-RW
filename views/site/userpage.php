<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
// use yii\helpers\VarDumper;
use yii\helpers\Url;
use kartik\sidenav\SideNav;
use app\controllers\SiteController;

$item = Yii::$app->controller->id;
// $params = ucfirst($item);
// VarDumper::dump($params);

$isAdmin = Yii::$app->user->identity->isAdmin;
$nik = Yii::$app->user->identity->nik;
if ($isAdmin) {
    $title = "Laman Admin";
} else {
    $title = "Laman Pengguna";
}

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;

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
                        'label' => 'Action Admin',
                        'icon' => 'th-large',
                        'items' => [
                            [
                                'url' => Url::toRoute('/pengguna'),
                                'label' => 'Manage Pengguna',
                                'icon' => 'user'
                            ],
                            [
                                'url' => Url::toRoute('/anggota-keluarga'),
                                'label' => 'Manage Anggota Keluarga',
                                'icon' => 'list-alt'
                            ],
                            [
                                'url' => Url::toRoute('/kartu-keluarga'),
                                'label' => 'Manage Kartu Keluarga',
                                'icon' => 'file'
                            ],
                            [
                                'url' => Url::toRoute('/data-group'),
                                'label' => 'Manage Group',
                                'icon' => 'pushpin'
                            ],
                            [
                                'url' => Url::toRoute('/mutasi'),
                                'label' => 'Manage Mutasi',
                                'icon' => 'send'
                            ],
                            [
                                'url' => Url::toRoute('/tagihan'),
                                'label' => 'Manage Tagihan',
                                'icon' => 'usd'
                            ],
                        ],
                    ],
                    [
                        'label' => 'Action User',
                        'icon' => 'th',
                        'items' => [
                            [
                                'url' => 'index.php?r=site%2Fview-member',
                                'label' => 'Lihat Anggota',
                                'icon' => 'eye-open'
                            ],
                            [
                                'url' => 'index.php?r=site%2Fview-tax',
                                'label' => 'Lihat Tagihan',
                                'icon' => 'usd'
                            ],
                            [
                                'url' => 'index.php?r=site%2Freq-mutasi',
                                'label' => 'Request Mutasi',
                                'icon' => 'send'
                            ],
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
                        'icon' => 'home',
                        'active' => ($item == 'site')
                    ], [
                        'url' => 'index.php?r=site%2Fview-member',
                        'label' => 'Lihat Anggota',
                        'icon' => 'eye-open'
                    ],
                    [
                        'url' => 'index.php?r=site%2Fview-tax',
                        'label' => 'Lihat Tagihan',
                        'icon' => 'usd'
                    ],
                    [
                        'url' => 'index.php?r=site%2Freq-mutasi',
                        'label' => 'Request Mutasi',
                        'icon' => 'send'
                    ],
                    // [
                    //     'label' => 'Help',
                    //     'icon' => 'question-sign',
                    //     'items' => [
                    //         ['label' => ' About', 'icon' => 'info-sign', 'url' => '#'],
                    //         ['label' => 'Contact', 'icon' => 'phone', 'url' => '#'],
                    //     ],
                    // ],
                ],
            ]);
        }

        ?>
    </div>

    <div class="col-sm-9">
        <?php
        if ($isAdmin) {
            echo "Selamat Datang, <b>Admin</b>!<br>
            Anda bisa melakukan manajemen terhadap catatan sipil yang ada di RT/RW anda. Sebagai seorang admin, Anda diberikan dua hak akses. Sebagai Admin dan sebagai pengguna.";
        } else {
            echo "Selamat Datang, <b>" . Yii::$app->user->identity->nama . "</b>!<br>";
            echo "Anda dapat melakukan aksi berdasarkan menu pada sidebar sebelah kiri. Anda dapat melakukan cek tagihan dan mengajukan mutasi.";
        }
        ?>
    </div>
</div>