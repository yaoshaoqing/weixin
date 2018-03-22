<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
header("Content-type: text/html; charset=utf-8");
use Think\Controller;
include './ThinkPHP/Conf/weixin.php';
class AdminController extends Controller {
    
    public function __construct() {
        session('[start]'); // 启动session
        $session = session('username');
        if(empty($session)){
            $this->redirect('login/index','请登录，谢谢！');
            return;
        }
        parent::__construct();
    }
    
    public  function access_token(){
        $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".AppId."&secret=".AppSecret;
        $model = M('Access_token');
        $info=$model->find();
        
        if(empty($info)){
            $access_token = $this->request_get($url);
            $data = [];
            $json = json_decode($access_token,true);
            $data['access_token'] = $json['access_token'];
            $model->add($data);
        }else{
            $info['addtime'] = (strtotime($info['addtime'])+ 7200);
            if($info['addtime'] < time()){
                $access_token = $this->request_get($url);
                $data=[];
                $json = json_decode($access_token,true);
                $data['access_token'] = $json['access_token'];
                $model->where('id=1')->save($data);
            }
            $json = $model->where('id=1')->field('access_token')->find();
            
        }
        return $json['access_token'];
    }
            
    //用post给第三方传参或取值
    function request_post($url = '', $param = '') {
        if (empty($url) || empty($param)) {
            return false;
        }
        $postUrl = $url;
        $curlPost = $param;
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
        $data = curl_exec($ch);//运行curl
        curl_close($ch);
        
        return $data;
    }

    
    //用get给第三方传参或取值
    function request_get($url) {
        
        $postUrl = $url;
        //$curlPost = $param;
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //https请求 不验证证书 其实只用这个就可以了
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        //curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
        //curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
        $data = curl_exec($ch);//运行curl
        curl_close($ch);
        return $data;
    }

}