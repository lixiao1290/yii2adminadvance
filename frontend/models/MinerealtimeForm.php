<?php
namespace frontend\models;

use yii\base\Model;

class MinerealtimeForm extends Model
{

    public $hpzl;

    public $hphm;

    public $clsbdh;

    public function rules()
    {
        return [
            [
                [
                    'hpzl',
                    'hphm',
                    'clsbdh'
                ],
                'required'
            ]
        ];
    }

    public function attributeLabels()
    {
        return [
            'hpzl' => '车辆类型',
            'hphm' => '车牌号码',
            'clsbdh' => '车架号后六位'
        ];
    }
}

?>