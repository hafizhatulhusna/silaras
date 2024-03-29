<?php

namespace app\models;
use yii\helpers\ArrayHelper;

use Yii;

/**
 * This is the model class for table "t_kasus".
 *
 * @property int $id_kasus
 * @property string $no_register
 * @property string $tanggal_kejadian
 * @property string $tanggal_pelaporan
 * @property string $deskripsi_kasus
 * @property int $kategori_kasus
 * @property string $tkp
 * @property string $desa_kelurahan
 * @property string $kab_kota
 * @property int $status_kasus
 * @property string|null $create_at
 * @property string|null $update_at
 * @property int|null $create_by
 * @property int|null $update_by
 */
class TKasus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 't_kasus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_register', 'tanggal_kejadian', 'tanggal_pelaporan', 'deskripsi_kasus', 'kategori_kasus', 'tkp', 'desa_kelurahan', 'kab_kota', 'status_kasus'], 'required'],
            [['tanggal_kejadian', 'tanggal_pelaporan', 'create_at', 'update_at'], 'safe'],
            [['deskripsi_kasus', 'deskripsi_pelayanan'], 'string'],
            [['kategori_kasus', 'status_kasus', 'create_by', 'update_by'], 'integer'],
            [['pelayanan'], 'string', 'max' => 100],
            [['no_register', 'desa_kelurahan'], 'string', 'max' => 50],
            [['tkp', 'kab_kota'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kasus' => 'Id Kasus',
            'no_register' => 'No Register',
            'tanggal_kejadian' => 'Tanggal Kejadian',
            'tanggal_pelaporan' => 'Tanggal Pelaporan',
            'deskripsi_kasus' => 'Deskripsi Kasus',
            'kategori_kasus' => 'Kategori Kasus',
            'tkp' => 'Tkp',
            'desa_kelurahan' => 'Desa Kelurahan',
            'kab_kota' => 'Kab Kota',
            'status_kasus' => 'Status Kasus',
            'pelayanan' => 'Pelayanan',
            'deskripsi_pelayanan' => 'Deskripsi Pelayanan',
            'create_at' => 'Creat At',
            'update_at' => 'Update At',
            'create_by' => 'Create By',
            'update_by' => 'Update By',
        ];
    }

    public function tglIndo($tanggal)
    {
        $bulan = array(
            1 => 'Januari',
                'February',
                'Maret',
                'April',
                'Mei',
                'Juni', 
                'Juli',
                'Agustus', 
                'September',
                'Oktober',
                'November',
                'Desember',
        );

        $pecahkan = explode('-', $tanggal);

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }

    public function getTampilTanggalnRegister(){
        return 'Tgl Lapor: '.date('d-m-Y', strtotime($this->tanggal_pelaporan)). ' No. Reg: ('.$this->no_register.')';
    }

    public function getdatakasus()
    {
        $kasus = ArrayHelper::map(TKasus::find()
            ->orderBy(['id_kasus' => SORT_DESC])
            ->all(), 'id_kasus', 'tampilTanggalnRegister');
        return $kasus;
        // $data = TKasus::find()->all();
        // $dropDown = \yii\helpers\ArrayHelper::map($data, 'id_kasus', 'tampilTanggalnRegister');
        // return $dropDown;
    }

    public function getdatakorban()
    {
        return $this->hasOne(TKorban::className(),['id_kasus'=>'id_kasus']);
    }

    public function getKategori(){
        return $this->hasOne(Kategori::className(),['id_kategori'=>'kategori_kasus']);
    }
}
