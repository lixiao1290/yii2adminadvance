<?php
namespace frontend\controllers;


use Yii;
use yii\web\Controller;
use frontend\models\ViolationForm;
use common\lib\HttpGet;
class ViolationController extends Controller
{
    
    /**
     * 事故高发路段！
     * @return string
     */
    public function  actionIndex()
    {
        $this->layout = false;
        
        $model = new ViolationForm();
        
        $result = Yii::$app->request->post();
        if($result)
        {
            $getIp=$_SERVER["REMOTE_ADDR"];
//             echo 'IP:',$getIp;
//             echo '<br/>';
            $content = file_get_contents("http://api.map.baidu.com/location/ip?ak=NCSb73ywzhsWN0OLvjTWrksX&ip=222.175.96.0&coor=bd09ll");
            if('127.0.0.1'!=$_SERVER['REMOTE_ADDR']) {
                 $content = file_get_contents("http://api.map.baidu.com/location/ip?ak=NCSb73ywzhsWN0OLvjTWrksX&ip={$_SERVER['REMOTE_ADDR']}&coor=bd09ll");
            }
//             var_dump($content);die;
            $json = json_decode($content);
            $lng = $json->{'content'}->{'point'}->{'x'};
            $lat = $json->{'content'}->{'point'}->{'y'};
            $cityName = $json->{'content'}->{'address'};
            $cityName_r = substr($cityName, 9,6);
            $distince = $lng-$lat;
//                var_dump($json);die;
//             echo 'lng:',$json->{'content'}->{'point'}->{'x'};//按层级关系提取经度数据
//             echo '<br/>';
//             echo 'lat:',$json->{'content'}->{'point'}->{'y'};//按层级关系提取纬度数据
//             echo '<br/>';
//             print $json->{'content'}->{'address'};//按层级关系提取address数据
            $data = array(
              'username'=>'cpic10108888',
               'password'=>'e30fb8337da9190af689249e4351f676',
                'cityName'=>$cityName_r,
                'lat'=>$lat,
                'lng'=>$lng,
                'distince'=>$distince,
            );
            $url = "http://115.28.141.134/PublicData/other/selViolationByDistince";
            $result = HttpGet::http_get($url,$data,'post');
//             var_dump($data);die;
            
            $ch = curl_init($url) ;  
            curl_setopt($ch,CURLOPT_POST,1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回  
            curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ; // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回  
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $output = curl_exec($ch);
            curl_close ($ch);
            
            $res = json_decode($output,true);
            $vio = json_decode($res['data'],true);
//             var_dump($vio);die;
            $info = '';
            foreach ($vio as $k=>$v)
            {
                $info[$k]['data']['vioTitle'] = $v['vioTitle'];
                $info[$k]['data']['lng'] = $v['lng'];
                $info[$k]['data']['lat'] = $v['lat'];
                $info[$k]['data']['type'] = $v['type'];
//                 echo $v['lng'];
//                 echo '<br/>';
            }
//             die;
            
            return $this->render('_form',['info'=>$info]);
        }
        return  $this->render('index',['model'=>$model]);
    }
    
    /**
     * ip定位
     * @param string $ip
     * @return array
     * @throws Exception
     */
    public function locationByIP($ip)
    {
        //检查是否合法IP
        if (!filter_var($ip, FILTER_VALIDATE_IP))
        {
            throw new Exception('ip地址不合法');
        }
        $params = array(
            'ak' => '百度地图API KEY',
            'ip' => $ip,
            'coor' => 'bd09ll'//百度地图GPS坐标
        );
        $api = 'http://api.map.baidu.com/location/ip';
        $resp = $this->async($api, $params);
        $data = json_decode($resp, true);
        //有错误
        if ($data['status'] != 0)
        {
            throw new Exception($data['message']);
        }
        //返回地址信息
        return array(
            'address' => $data['content']['address'],
            'province' => $data['content']['address_detail']['province'],
            'city' => $data['content']['address_detail']['city'],
            'district' => $data['content']['address_detail']['district'],
            'street' => $data['content']['address_detail']['street'],
            'street_number' => $data['content']['address_detail']['street_number'],
            'city_code' => $data['content']['address_detail']['city_code'],
            'lng' => $data['content']['point']['x'],
            'lat' => $data['content']['point']['y']
        );
    }
    
}

?>