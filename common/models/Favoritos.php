<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "favoritos".
 *
 * @property integer $cliente_id
 * @property integer $inmueble_id
 *
 * @property User $cliente
 * @property Inmueble $inmueble
 */
class Favoritos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'favoritos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cliente_id', 'inmueble_id'], 'required'],
            [['cliente_id', 'inmueble_id'], 'integer'],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['cliente_id' => 'id']],
            [['inmueble_id'], 'exist', 'skipOnError' => true, 'targetClass' => Inmueble::className(), 'targetAttribute' => ['inmueble_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cliente_id' => 'Cliente ID',
            'inmueble_id' => 'Inmueble ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(User::className(), ['id' => 'cliente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInmueble()
    {
        return $this->hasOne(Inmueble::className(), ['id' => 'inmueble_id']);
    }
}
