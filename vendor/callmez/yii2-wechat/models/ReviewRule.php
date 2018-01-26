<?php

namespace callmez\wechat\models;

use Yii;
use yii\behaviors\TimestampBehavior;

class ReviewRule extends \yii\db\ActiveRecord
{
    /**
     * 激活状态
     */
    const STATUS_ACTIVE = 1;
    /**
     * 禁用状态
     */
    const STATUS_DISABLED = 0;
    const PROCESSOR_DEFAULT = 'process';
    const DATE_DEFU = '00-00-00';
    public static $statuses = [
        self::STATUS_ACTIVE => '启用',
        self::STATUS_DISABLED => '禁用'
    ];

    /**
     * @inheritdoct
     */
    public static function find()
    {
        return Yii::createObject(ReplyRuleQuery::className(), [get_called_class()]);
    }

//     public function behaviors()
//     {
//         return [
//             'timestamp' => TimestampBehavior::className()
//         ];
//     }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wechat_review}}';
    }
    
//     public function scenarios()
//     {
//         $scenarios = parent::scenarios();
//         return [
//           'create' => ['title','content','created_at'],  
//           'update' => ['img'],
//         ];
//     }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content','created_at'], 'required'],
            [['img'],'required'],
            [['created_at'],'safe'],
//             [['created_at'], 'default','value'=>self::DATE_DEFU]
//             [['processor'], 'default', 'value' => self::PROCESSOR_DEFAULT]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'content' => '内容',
            'img' => '图片地址',
            'created_at' => '写入时间'
        ];
    }

}
