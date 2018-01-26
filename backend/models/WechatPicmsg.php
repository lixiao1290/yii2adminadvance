<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * This is the model class for table "wechat_picmsg".
 *
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property integer $isbig
 * @property string $groupid
 * @property integer $wechat_id
 * @property string $link
 * @property string $createtime
 */
class WechatPicmsg extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wechat_picmsg';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'title',
                    'link',
                   // 'image',
                ],
                'required'
            ],
            [
            [
                'title',
                'link',
                'image',
            ],
            'required',
            'on'=>'create'
                ],
            [
                [
                    'isbig',
                    'wechat_id'
                ],
                'integer'
            ],
            [
                [
                    'title',
                    'image',
                    'link'
                ],
                'string',
                'max' => 255
            ],
            [
                [
                    'groupid'
                ],
                'string',
                'max' => 100
            ],
            [
                [
                    'image'
                ],
                'file',
                'maxFiles' => 10,
                'extensions' => 'jpeg,jpg,png,gif'
            ] ,
            [
                [
                    'link'
                ],
                'url',
            ],
            [
                [
                    'id'
                ],
                'integer',
            ],
            [
                [
                    'createtime'
                ],
                'integer',
            ]
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
            'image' => '图片',
            'isbig' => '第一行显示',
            'groupid' => 'Groupid',
            'wechat_id' => 'Wechat ID',
            'link'=>'链接',
        ];
    }

    public function saveMsg($runValidation = true, $attributeNames = NULL)
    {
        try {
            $uploads = UploadedFile::getInstances(new static(), 'image');
            $dir = './public/image/' . time() . '/';
            $dirDb ='/public/image/' . time() . '/';
            if (false == is_dir($dir)) {
                mkdir($dir);
            }
            $files = array();
            foreach ($uploads as $upload) {
                $filename = time() . rand(1000, 10000) . '.' . $upload->extension;
                $fileDb = $dirDb . $filename;
                $filename = $dir . $filename;
                $upload->saveAs($filename);
                $files[] = $fileDb;
            }
            $atributes = $this->getAttributes();
            $count = count($atributes['title']);
            $groupid = uniqid();
            for ($i = 0; $i < $count; $i ++) {
                $mod = new static();
                if (0 == $i) {
                    $mod->isbig = 1;
                }
                $mod->wechat_id=$this->wechat_id;
                $mod->title = $atributes['title'][$i];
                if(isset($files[$i])) {
                    $mod->image = $files[$i];
                }
                $mod->groupid = $groupid;
                $mod->link=$atributes['link'][$i];
                $mod->createtime=$_SERVER['REQUEST_TIME'];
              //  var_dump('<pre>',$mod);exit;  
                $mod->save();
            }
            $this->id=$groupid;
            return true;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        
    }
    public function updateMsgs()
    { 
        try {
            if(!empty($_FILES)) {
                $uploads = UploadedFile::getInstances(new static(), 'image');
                $dir = './public/image/' . time() . '/';
                $dirDb ='/public/image/' . time() . '/';
                if (false == is_dir($dir)) {
                    mkdir($dir);
                }
                $files = array();
                foreach ($uploads as $upload) {
                    $filename = time() . rand(1000, 10000) . '.' . $upload->extension;
                    $fileDb = $dirDb . $filename;
                    $filename = $dir . $filename;
                    $upload->saveAs($filename);
                    $files[] = $fileDb;
                }
            }
             
            $atributes = $this->getAttributes();
            $count = count($atributes['title']);
            //var_dump('<pre>',$atributes );  exit('@');
            for ($i = 0; $i < $count; $i ++) {
                $mod = self::findOne($atributes['id'][$i]);
                if (0 == $i) {
                    $mod->isbig = 1;
                }
                $mod->title = $atributes['title'][$i];
                if(!empty($files[$i])) {
                @unlink('./../../'.$mod->image);    
                $mod->image = $files[$i];
                }
                $mod->link=$atributes['link'][$i];
//                  var_dump('<pre>',$mod);exit;
                $mod->update();
            }
             
            return true;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        
        
    }
}
