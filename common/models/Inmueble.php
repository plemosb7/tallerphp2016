<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inmueble".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $tipoInmueble_id
 * @property integer $idCliente
 * @property integer $cantDorm
 * @property integer $cantBanos
 * @property integer $supTotal
 * @property integer $supEdificada
 * @property integer $garage
 * @property integer $patio
 * @property double $latitud
 * @property double $longitud
 * @property string $foto1
 * @property string $foto2
 * @property string $foto3
 *
 * @property Favoritos $favoritos
 * @property TipoInmueble $tipoInmueble
 * @property User $idCliente0
 */
class Inmueble extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $image;
    
    
    public static function tableName()
    {
        return 'inmueble';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'tipoInmueble_id', 'idCliente'], 'required'],
            [['tipoInmueble_id', 'idCliente', 'cantDorm', 'cantBanos', 'supTotal', 'supEdificada', 'garage', 'patio'], 'integer'],
            [['latitud', 'longitud'], 'number'],
            [['nombre', 'foto1', 'foto2', 'foto3'], 'string', 'max' => 30],
            [['tipoInmueble_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipoInmueble::className(), 'targetAttribute' => ['tipoInmueble_id' => 'id']],
            [['idCliente'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idCliente' => 'id']],
//            [['image'], 'safe'],
//            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
//            [['image'], 'file', 'maxSize'=>'100000000000'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'tipoInmueble_id' => 'Tipo Inmueble ID',
            'idCliente' => 'Id Cliente',
            'cantDorm' => 'Cant Dorm',
            'cantBanos' => 'Cant Banos',
            'supTotal' => 'Sup Total',
            'supEdificada' => 'Sup Edificada',
            'garage' => 'Garage',
            'patio' => 'Patio',
            'latitud' => 'Latitud',
            'longitud' => 'Longitud',
            'foto1' => 'Foto1',
            'foto2' => 'Foto2',
            'foto3' => 'Foto3',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavoritos()
    {
        return $this->hasOne(Favoritos::className(), ['inmueble_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoInmueble()
    {
        return $this->hasOne(TipoInmueble::className(), ['id' => 'tipoInmueble_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente0()
    {
        return $this->hasOne(User::className(), ['id' => 'idCliente']);
    }
}
