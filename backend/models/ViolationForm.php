<?php
namespace backend\models;

use yii\base\Model;

class ViolationForm extends Model
{

    public $cityName;

    public $lat;

    public $lng;

    public $distince;

    public function rules()
    {
        return [
            [
                [
                    'cityName',
                    'lat',
                    'lng',
                    'distince'
                ],
                'required'
            ]
        ];
    }

    public function attributeLabels()
    {
        return [
            'cityName' => '城市名称',
            'lat' => '经度',
            'lng' => '纬度',
            'distince' => '距离'
        ];
    }
}

?>