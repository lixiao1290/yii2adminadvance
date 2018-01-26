<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\RoadForm;
use common\lib\HttpGet;
use yii\filters\HttpCache;
class RoadController extends Controller
{
    
    /**
     * 高速路况
     * 
     * @return string
     */
    public function  actionIndex()
    {
        $this->layout = false;
        
        $getIp=$_SERVER["REMOTE_ADDR"];
        if('127.0.0.1'==$getIp) {
            $getIp='222.175.96.0';
        }
        //             echo 'IP:',$getIp;
        //             echo '<br/>';
        $content = file_get_contents("http://api.map.baidu.com/location/ip?ak=NCSb73ywzhsWN0OLvjTWrksX&ip={$getIp}&coor=bd09ll");
//                     var_dump($content);die;
        $json = json_decode($content);
        $lng = $json->{'content'}->{'point'}->{'x'};
        $lat = $json->{'content'}->{'point'}->{'y'};
        $cityName = $json->{'content'}->{'address'};
        $distince = $lng-$lat;
//                         	var_dump($json);die;
//                     echo 'lng:',$json->{'content'}->{'point'}->{'x'};//按层级关系提取经度数据
//                     echo '<br/>';
//                     echo 'lat:',$json->{'content'}->{'point'}->{'y'};//按层级关系提取纬度数据
//                     echo '<br/>';
//                     print $json->{'content'}->{'address'};//按层级关系提取address数据
//                     die;
        
        $model = new RoadForm();
        $result = Yii::$app->request->post();
        $model->setScenario('index');
        if($result)
        {
            $model = new RoadForm();
            $illegal = $result['RoadForm'];
            $startCity = $illegal['startCity'];
            $endCity = $illegal['endCity'];
            $data = array(
                'USERNAME' => 'cpic10108888',
                'PASSWORD'=>'e30fb8337da9190af689249e4351f676',
                'startCity' => $illegal['startCity'],
                'endCity' => $illegal['endCity'],
            );
            if (empty($startCity))
            {   
                echo "<script>alert('请输入开始城市！')</script>";
                return $this->render('index',['model'=>$model]);
            }elseif (empty($endCity))
            {
                echo "<script>alert('请输入结束城市！')</script>";
                return $this->render('index',['model'=>$model]);
            }
            
            $url = "http://115.28.141.134/PublicData/other/selLineInfo";
            $result = HttpGet::http_get($url,$data,'post');

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
//             var_dump($res['code']);die;
            $info = '';
            $code_r = $res['code'];
            /**
             * 判断code返回是否正常
             */
            if ($code_r == 10008)
            {
                return $this->render('error',['info'=>$info]);
            }
            /**
             * 一个大的遍历包含几个小的遍历
             */
            foreach ($vio as $k=> $v)
            {
                $a = $v['allCitys'];
                $info[$k]['detail']['allCitys'] = $a;
                $info[$k]['detail']['lineNo'] = $v['lineNo'];
                $info[$k]['detail']['name'] = $v['name'];
                $info[$k]['detail']['city'] = $v['city'];
              
               $data_str = array(
                  'USERNAME' => 'cpic10108888',
                  'PASSWORD'=>'e30fb8337da9190af689249e4351f676',
                  'startCity' => $illegal['startCity'],
                  'endCity' => $illegal['endCity'],
                  'lineId' => $v['lineId'],
                );
                /**
                 * 再次调接口，此处会遍历三次，调用三次
                 * @var unknown
                 */
                $url_str = "http://115.28.141.134/PublicData/other/selLineRealTimeDetail";
                $result_r = HttpGet::http_get($url_str,$data_str,'post');
                
//                 var_dump($illegal['startCity']);die;
                $startCity = $illegal['startCity'];
                
                /**
                 * 操作转换返回数据
                 * @var unknown
                 */
                $res_r = json_decode($result_r,true);
                $vio_r = json_decode($res_r['data'],true);
//                 var_dump($res_r['code']);die;
                $code = $res_r['code'];
//                 echo $code;die;
                /**
                 * 如果code返回不等于10000
                 */
                if ($code != 10000 && $code !=10008)
                {
//                     echo $code;
                    return $this->render('error',['info'=>$info]);
                }
                /**
                 * 预定义一个数组，判断返回数据是否为空
                 * @var unknown
                 */
                $arr = '';
               if (!empty($vio_r))
               {
//                    echo count($vio_r);die;
                    /**
                     * 再次遍历 键->值
                     */
                   foreach ($vio_r as $a=>$b)
                   {
                       $arr[$a]['StartPileNo'] = $b['StartPileNo'];
                       $arr[$a]['pubTime'] = $b['pubTime'];
                       $arr[$a]['exceptionReason'] = $b['exceptionReason'];
                       $arr[$a]['StartPileNo'] = $b['StartPileNo'];
                       $arr[$a]['endPileNo'] = $b['endPileNo'];
                       $arr[$a]['trafficTip'] = $b['trafficTip'];
                       $arr[$a]['expectedRecoveryTime'] = $b['expectedRecoveryTime'];
                   }
                   /**
                    *   附近出口接口
                    */
                    $data_r = array(
                        'lineNo' => $v['lineNo'],
                        'distance' => '2000',
                        'x' => $lng,
                        'y' => $lat,
                    );
                   $url_r = "http://115.28.141.134/PublicData/other/selPassExit";
                   $result_s = HttpGet::http_get($url_r,$data_r,'post');
//                    var_dump($result_s);die;
                   $res_s = json_decode($result_s,true);
                   $vio_s = json_decode($res_s['data'],true);
//                    var_dump($vio_s);die;

                   $arr_str = '';
                   foreach ($vio_s as $m=>$c)
                   {
                       $arr_str[$m]['tollbooth'] = $c['tollbooth'];
                       $arr_str[$m]['distance'] = $c['distance'];
                       $c['distance'] = substr($c['distance'], 0,5);//截取至小数点后两位
//                        var_dump( $c['distance']);
                   }
//                    die;
               }
               $info[$k]['traffic'] = $arr; 
               $info[$k]['toll'] = $arr_str; 
            }
           // var_dump('<pre>',$info);
            $result = HttpGet::objarray_to_array($res);
            $l_json = json_decode($result['data']);
           //  var_dump($l_json);die;
            
            return $this->render('_form',['info'=>$info]);
        }
           return  $this->render('index',['model'=>$model]);
    }
    public function actionSupport()
    {
        $data = array(
            'USERNAME' => 'cpic10108888',
            'PASSWORD'=>'e30fb8337da9190af689249e4351f676',
            'startCity' => $_GET['startCity'],
            'endCity' => ' ',
        );
        if (empty($data['startCity']))
        {
            return ;
        } 
        
        $url = "http://115.28.141.134/PublicData/other/selLineInfo";
        $result = HttpGet::http_get($url,$data,'post');
        
        $ch = curl_init($url) ;
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ; // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $output = curl_exec($ch);
        curl_close ($ch);
        
        $res = json_decode($output,true);
        if($res['code'] != 10000 && $res['code']!=10008) {
            echo json_encode(array('code'=>$res['code'],'message'=>$res['message']));
        }
        $ls=json_decode($res['data'],true);
         
        
         $rs= $this->renderPartial('support',['ls'=>$ls]);
         echo json_encode(array('code'=>$res['code'],'message'=>$res['message'],'html'=>$rs));
    }
}
?>