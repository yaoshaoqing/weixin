<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
header("Content-type: text/html; charset=utf-8");
use Think\Controller;

class WeixinController extends AdminController {

	public function weixin(){

    	//获得接口认证
	    $timestamp = $_GET['timestamp'];
	    $nonce = $_GET['nonce'];
	    $token = 'hellow2017';
	    $signature = $_GET['signature'];
	    //将参数字典化排序
	    $tmpArr = array($timestamp,$nonce,$token);
	    sort($tmpArr);
	    $judgeArr = implode('',$tmpArr);
	    $judge = sha1($judgeArr);
	    //判断是否符合
	    if($judge == $signature)
	    {
	        echo $_GET['echostr'];
	        exit;
	    }
    }
    public function index(){
    $weixin  = new \Org\Util\weixin\WxBizMsgCrypt();
    //$weixin  = new \Org\Util\Images();
    $weixin->WxBizMsgCrypt('hellow2017','D2zdUyOSxzyzOionnKz0HpVla3jc5HS4yKS9W9KoVGd','wx5ab9d1507cee70b5');
    //var_dump($weixin);
    $this->display();
    }

    public function add(){
        //var_dump($this->access_token());
        $url = "https://kyfw.12306.cn/otn/leftTicket/query?leftTicketDTO.train_date=2017-02-24&leftTicketDTO.from_station=BJP&leftTicketDTO.to_station=SHH&purpose_codes=ADULT";
        print_r(json_decode($this->request_get($url),true));
        //$this->display();
    }
   
    
}