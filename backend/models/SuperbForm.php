<?php
namespace backend\models;

use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;

class SuperbForm extends Model
{
    public $title;
    public $id;
    public $content;

    public function rules()
    {
        return [
            [
                [
                    'id',
                    'title',
                    'content'
                ],
                'required'
            ]
        ];
    }

    public static function tableName()
    {
        return 'wechat_review';
    }

    public function attributeLabels()
    {
        return [
            'id'=>'id',
            'title' => '标题',
            'content' => '内容'
        ];
    }

    public static function find()
    {
        return new ActiveQuery(get_called_class());
    }
    
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}

?>