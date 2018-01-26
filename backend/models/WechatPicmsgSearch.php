<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\WechatPicmsg;
use yii\db\Query;

/**
 * WechatPicmsgSearch represents the model behind the search form about `backend\models\WechatPicmsg`.
 */
class WechatPicmsgSearch extends WechatPicmsg
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [/* 'id',  'isbig', 'wechat_id'*/],
                'integer'
            ],
            [
                [
                    'title',
                    'image', /* 'groupid' */],
                'safe'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params            
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = WechatPicmsg::find()->groupBy('groupid')->select([
            'groupid,GROUP_CONCAT(title) title',
            'GROUP_CONCAT(image) image',
            'GROUP_CONCAT(link) link',
            'isbig',
        ])->orderBy('createtime desc');
        // $query=(new Query())->select(['GROUP_CONCAT(title) title','GROUP_CONCAT(image) image'])->from('wechat_picmsg')->groupBy('groupid');
        // add conditions that should always apply here
        $query->andFilterWhere([
            'id' => $this->id,
            'isbig' => $this->isbig,
            'wechat_id' => $this->wechat_id
        ]);
        
        $query->andFilterWhere([
            'like',
            'title',
            $this->title
        ])
        ->andFilterWhere([
            'like',
            'image',
            $this->image
        ])
       ->groupBy('groupid');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pagesize' => '5'
            ]
        ]);
        
        $this->load($params);
        
        if (! $this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        // grid filtering conditions
        
       
        return $dataProvider;
    }
}
