<?php
namespace Common\Controller;
use Think\Controller;

class IniController extends Controller {
    private $cookie_arr;
    
    public function __construct() {
        parent::__construct();
        $this->init();
    }
    public function init(){
        define("SOURCE_PATH", C("VIEW_PATH").C('DEFAULT_THEME')."/statics/");
        define("PUBLIC_PATH","/Public/");
        define("UPLOAD_ROOT_PATH","./Public/");
        define("DB_PREFIX",C('DB_PREFIX'));
        $cookie = cookie('authcookie');
        $this->cookie_arr = explode('-',authcode($cookie));
    }
    protected function is_login(){
        if(!is_array($this->cookie_arr) || $this->cookie_arr['1']!== GetIP()){
            $this->error('未登录',U('member/login'));
            exit;
        }
    }
    protected function is_admin(){
        $this->is_login();
        $where['name'] = $this->cookie_arr['0'];
        $admininfo = M('member')->where($where)->find();
        if($admininfo['level'] < 1){
            cookie('authcookie',null);
            $this->error('没有管理权限','member/login');
            exit;
        }
    }
}