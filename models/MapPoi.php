<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "map_poi".
 *
 * @property int $id
 * @property string $name
 * @property string $latitude
 * @property string $longitude
 */
class MapPoi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'map_poi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'latitude', 'longitude'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['latitude', 'longitude'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
        ];
    }
}
