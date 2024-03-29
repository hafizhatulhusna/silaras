<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\TKorban $model */

// $this->title = $model->id_korban;
$this->title = $model->nama_pelaku;
$this->params['breadcrumbs'][] = ['label' => 'T-Korban', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tkorban-view">

    <!-- <h1><= Html::encode($this->title) ?></h1> -->

    <div class="card card-outline card-info">
        <div class="card-header">
            <p class="card-title" style="font-size: 20px;">Detail Kasus</p>
            <!-- <h3 class="card-title">Data Kasus</h3> -->
            <div class="card-tools">
                <?= Html::a('<i class="fa fa-fw fa-sign-out-alt"></i> Kembali', ['index', 'id_pelaku' => $model->id_pelaku], ['class' => 'btn btn-warning']) ?>
            </div>
        </div>
        <div class="card-body">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><b>No Registrasi</b></td>
                                    <td>
                                        <?php
                                            $rgtr = $model->datakasus ? $model->datakasus->no_register : '-';
                                            echo $rgtr;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Kategori</b></td>
                                    <!-- <td><= $model->kategori_kasus ?></td> -->
                                    <td>
                                        <?php 
                                            $kategori_kasus = $model->kategori ? $model->kategori->nama_kategori: '-';
                                            echo $kategori_kasus;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>TKP</b></td>
                                    <td>
                                        <?php
                                            $tkp = $model->datakasus ? $model->datakasus->tkp : '-';
                                            echo $tkp;
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><b>Tanggal Kejadian</b></td>
                                    <!-- <td><= $model->tanggal_kejadian ?></td> -->
                                    <td>
                                        <?php 
                                            $tgl_kjd = $model->datakasus ? $model->datakasus->tanggal_kejadian : '-';
                                            $tanggal_indo = $model->tglIndo($tgl_kjd);
                                            echo $tanggal_indo;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Tanggal Pelaporan</b></td>
                                    <!-- <td><= $model->tanggal_pelaporan ?></td> -->
                                    <td>
                                        <?php 
                                            $tgl_plrn = $model->datakasus ? $model->datakasus->tanggal_pelaporan : '-';
                                            $tanggal_indo = $model->tglIndo($tgl_plrn);
                                            echo $tanggal_indo;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Deskripsi</b></td>
                                    <td>
                                        <?php
                                            $deskripsi = $model->datakasus ? $model->datakasus->deskripsi_kasus : '-';
                                            echo $deskripsi;
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- <= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_korban',
            'nik',
            'nama_korban',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            'agama_korban',
            'umur_korban',
            'alamat_korban:ntext',
            'no_hp',
            'id_kasus',
            'create_at',
            'update_at',
            'create_by',
            'update_by',
        ],
    ]) ?> -->


