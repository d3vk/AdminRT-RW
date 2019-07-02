<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "anggota_keluarga".
 *
 * @property string $nik
 * @property string $no_kk
 * @property string $nama_anggota
 * @property string $status_hubungan
 * @property string $status_perkawinan
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $jenis_kelamin
 * @property string $gol_darah
 * @property string $agama
 * @property string $pendidikan
 * @property string $pekerjaan
 * @property string $nama_ibu
 *
 * @property Agama $agama0
 * @property GolDarah $golDarah
 * @property JenisKelamin $jenisKelamin
 * @property Pekerjaan $pekerjaan0
 * @property PendidikanTerakhir $pendidikan0
 * @property StatusHubungan $statusHubungan
 * @property StatusPerkawinan $statusPerkawinan
 * @property KartuKeluarga $noKk
 */
class AnggotaKeluarga extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'anggota_keluarga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nik', 'no_kk', 'nama_anggota', 'status_hubungan', 'status_perkawinan', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'gol_darah', 'agama', 'pendidikan', 'pekerjaan', 'nama_ibu'], 'required'],
            [['tanggal_lahir'], 'safe'],
            [['nik', 'no_kk'], 'string', 'max' => 16],
            [['nama_anggota', 'tempat_lahir', 'nama_ibu'], 'string', 'max' => 255],
            [['status_hubungan', 'status_perkawinan'], 'string', 'max' => 50],
            [['jenis_kelamin', 'agama'], 'string', 'max' => 15],
            [['gol_darah'], 'string', 'max' => 2],
            [['pendidikan'], 'string', 'max' => 70],
            [['pekerjaan'], 'string', 'max' => 30],
            [['nik'], 'unique'],
            [['agama'], 'exist', 'skipOnError' => true, 'targetClass' => Agama::className(), 'targetAttribute' => ['agama' => 'agama']],
            [['gol_darah'], 'exist', 'skipOnError' => true, 'targetClass' => GolDarah::className(), 'targetAttribute' => ['gol_darah' => 'gol_darah']],
            [['jenis_kelamin'], 'exist', 'skipOnError' => true, 'targetClass' => JenisKelamin::className(), 'targetAttribute' => ['jenis_kelamin' => 'jenis_kelamin']],
            [['pekerjaan'], 'exist', 'skipOnError' => true, 'targetClass' => Pekerjaan::className(), 'targetAttribute' => ['pekerjaan' => 'pekerjaan']],
            [['pendidikan'], 'exist', 'skipOnError' => true, 'targetClass' => PendidikanTerakhir::className(), 'targetAttribute' => ['pendidikan' => 'pendidikan']],
            [['status_hubungan'], 'exist', 'skipOnError' => true, 'targetClass' => StatusHubungan::className(), 'targetAttribute' => ['status_hubungan' => 'status']],
            [['status_perkawinan'], 'exist', 'skipOnError' => true, 'targetClass' => StatusPerkawinan::className(), 'targetAttribute' => ['status_perkawinan' => 'status']],
            [['no_kk'], 'exist', 'skipOnError' => true, 'targetClass' => KartuKeluarga::className(), 'targetAttribute' => ['no_kk' => 'no_kk']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nik' => 'NIK',
            'no_kk' => 'Nomor KK',
            'nama_anggota' => 'Nama Anggota',
            'status_hubungan' => 'Status Hubungan',
            'status_perkawinan' => 'Status Perkawinan',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'gol_darah' => 'Golongan Darah',
            'agama' => 'Agama',
            'pendidikan' => 'Pendidikan',
            'pekerjaan' => 'Pekerjaan',
            'nama_ibu' => 'Nama Ibu',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgama0()
    {
        return $this->hasOne(Agama::className(), ['agama' => 'agama']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGolDarah()
    {
        return $this->hasOne(GolDarah::className(), ['gol_darah' => 'gol_darah']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisKelamin()
    {
        return $this->hasOne(JenisKelamin::className(), ['jenis_kelamin' => 'jenis_kelamin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPekerjaan0()
    {
        return $this->hasOne(Pekerjaan::className(), ['pekerjaan' => 'pekerjaan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendidikan0()
    {
        return $this->hasOne(PendidikanTerakhir::className(), ['pendidikan' => 'pendidikan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusHubungan()
    {
        return $this->hasOne(StatusHubungan::className(), ['status' => 'status_hubungan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusPerkawinan()
    {
        return $this->hasOne(StatusPerkawinan::className(), ['status' => 'status_perkawinan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoKk()
    {
        return $this->hasOne(KartuKeluarga::className(), ['no_kk' => 'no_kk']);
    }
}
