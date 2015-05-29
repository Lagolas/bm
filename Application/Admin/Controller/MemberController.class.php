<?php
namespace Admin\Controller;
use Common\Controller\IniController;
class MemberController extends IniController{
    public function __construct() {
        parent::__construct();
    }
    public function login(){
        if(cookie('authcookie')){
            redirect(U('index/index'));
        }
        $this->display();
    }
    public function gologin(){
        if(!IS_POST) exit;
        $where['name'] = I('post.name');
        $db = M('member');
        $userinfo = $db->where($where)->find();
        $salt = $userinfo['salt'];
        $subpwd = I('post.password');
        if(MD5($subpwd."+".$salt)==$userinfo['password']){
            cookie('authcookie',  authcode($where['name'].'-'.GetIP(),'ENCODE'));
            $this->success('登陆成功',U('index/index'));
        }else{
            $this->error('用户名或密码错误');
        }
    }
    
    public function logout(){
        cookie('authcookie',null);
        $this->success('已经安全退出',U('member/login'));
    }
}