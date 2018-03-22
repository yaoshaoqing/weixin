<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
header("Content-type: text/html; charset=utf-8");
use Think\Controller;

class LoginController extends Controller {

    public function index(){
    	if(IS_POST){
    		if(I('post.username') =='admin' && I('post.password') =='admin123'){
                    session('username','admin');
                    session('password','admin123');
                    $this->redirect('weixin/index');
                    return;
    		}else{
    			$this->error('密码错误','');
    		}
    		
    	}
    	$this->display('index');
    }


    
}