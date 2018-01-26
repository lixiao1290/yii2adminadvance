<?php
namespace backend\models;

use yii\base\Model;

class IntegralForm extends Model
{

    public $jszh;

    public $DABH;

    public function rules()
    {
        return array(
            array('jszh','required','message' => '请输入驾驶证号'),
            array('jszh','string','min' => 18, 'max' => 18,"tooLong"=>"最多十八个字符", "tooShort"=>"不是正确的驾驶证号码",'message'=>'驾驶证号码无效'),
            array('DABH','required','message' => '请输入档案编号'),
            array('DABH','string','min'=> 6,'max'=> 6,"tooLong"=>"最多六个字符","tooShort"=>"请输入正确的档案编号"),
        );
    }

    public function attributeLabels()
    {
        return [
            'jszh' => '驾驶证号码',
            'DABH' => '档案编号'
        ];
    }
}

?>
