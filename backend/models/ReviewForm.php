<?php
namespace backend\models;

use yii\base\Model;

class ReviewForm extends Model
{

    public $title;

    public $content;

    public $regdate;

    public function rules()
    {
        return [
            [
                [
                    'title',
                    'content',
                    'regdate'
                ],
                'required'
            ]
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => '标题',
            'content' => '内容',
            'regdate' => '时间'
        ];
    }
}

?>