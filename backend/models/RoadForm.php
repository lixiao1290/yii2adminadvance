<?php
namespace backend\models;

use yii\base\Model;

class RoadForm extends Model
{

    public $startCity;
    public $endCity;

    public function scenarios()
    {
        return [
            'index' => ['startCity', 'endCity'],
        ];
    }
    
    public function rules()
    {
        return array(
            array('startCity','required','message' => '请输入开始城市'),
            array('endCity','required','message' => '请输入结束城市'),
        );
    }
    
    public function attributeLabels()
    {
        return [
            'startCity' => '开始城市(*只标注城市名称)',
            'endCity' => '结束城市(*只标注城市名称)'
        ];
    }
}

?>