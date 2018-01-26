<?php
namespace frontend\models;

use yii\base\Model;

class IllegalForm extends Model
{

    public $hpzl;

    public $hphm;

    public $clsbdh;

    public function rules()
    {
        return array(
          array('hphm','required','message'=>'车牌号必填'),
          array('hphm','match','pattern'=>'/^[\x{4e00}-\x{9fa5}]{1}[a-zA-Z]{1}[a-zA-Z_0-9]{4}[\x{4e00}-\x{9fa5}A-Za-z0-9]{1}$/u','message'=>'号码无效'),
          array('clsbdh','required','message'=>'请填写车架号后六位'),
          array('clsbdh', 'string', 'min' => 6, 'max' => 6,"tooLong"=>"最多六个字符", "tooShort"=>"车架号后六位"),
        );
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