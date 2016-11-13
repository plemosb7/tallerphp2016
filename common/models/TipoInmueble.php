<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tipoInmueble".
 *
 * @property integer $id
 * @property string $nombre
 *
 * @property Inmueble[] $inmuebles
 */
class TipoInmueble extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipoInmueble';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 20],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInmuebles()
    {
        return $this->hasMany(Inmueble::className(), ['tipoInmueble_id' => 'id']);
    }
}
