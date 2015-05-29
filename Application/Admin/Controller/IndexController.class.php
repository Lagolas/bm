<?php
namespace Admin\Controller;
use Common\Controller\IniController;
class IndexController extends IniController {
    private $userinfo;
    private $manager_info;
    public function __construct() {
        parent::__construct();
        $this->is_admin();
        $user['name'] = $this->cookie_arr['0'];
        $user['id'] = $this->cookie_arr['2'];
        $this->userinfo = M('member')->where($user)->find();
        $manager_where['uid'] = $user['id'];
        $this->manager_info = M('manager')->where($manager_where)->find();
    }
    public function index(){
        $this->display();
    }
    
    /*********************************************************************
    *
    * 项目管理部分
    * 
    *********************************************************************/
    public function project(){
        $list = M()->table(DB_PREFIX.'project p')->field("p.id,p.title,p.stime,p.etime,p.ctime,p.records,m.name")
                ->join(DB_PREFIX.'model m on p.model=m.mid')
                ->select();
        $this->assign('list',$list);
        $this->display();
    }
    public function creatpro(){
        $model_where['state'] = 1;
        $models = M('model')->where($model_where)->select();
        $this->assign('models',$models);
        $this->display();
    }
    public function docreatpro(){
        if(!IS_POST) exit;
        //检查必填项以及长度
        $data['title'] = I('post.title');
        $data['model'] = I('post.model','','intval');
        if(!$data['title'] || !$data['model'] || strlen($data['title'])>100){
            $this->error('项目标题或所属模型不合法');
        }
        //检查别名是否为数字字母下划线
        $data['cname'] = I('post.cname');
        if(!$this->checkEn_num($data['cname'])){
            $this->error('项目别名必须是数字、字母、下划线');
        }
        $data['description'] = I('post.description');
        $setime = I('post.setime');
        if($setime){
            list($data['stime'],$data['etime']) = explode(' - ', $setime);
            $data['stime'] = strtotime($data['stime']);
            $data['etime'] = strtotime($data['etime']);
        }
        $data['ctime'] = NOW_TIME;
        $data['remarks'] = I('post.remarks');
        $data['detail'] = $_POST['editorValue'];
        if($_FILES['thumb']['name']){
            $info = $this->upload('project_img');
            if($info['state']){
                $data['img'] = UPLOAD_ROOT_PATH.$info['info']['thumb']['savepath'].$info['info']['thumb']['savename'];
            }else{
                $this->error($info['info']);
            }
        }
        if(M('project')->add($data)){
            $this->success('添加成功');
        }else{
            $this->error("添加失败");
        }
    }
    
    public function delpro(){
        if(!IS_GET) exit;
        $where['id'] = I('get.id','','intval');
        if(M('project')->where($where)->delete()){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
    
    public function editpro(){
        $where['id'] = I('get.id','','intval');
        $project = M('project')->where($where)->find();
        $model = M('model')->where('mid='.$project['model'])->getField('name');
        $this->assign('model',$model);
        $this->assign('pro',$project);
        $this->display();
    }
    
    public function doeditpro(){
        if(!IS_POST) exit;
        $where['id'] = I('post.id','','intval');
        if(I('post.cname') || I('post.model')) $this->error ('含非法参数');
        if(!I('post.title')) $this->error ('项目名称不能为空');
        $data['title'] = I('post.title');
        $data['description'] = I('post.description');
        $setime = I('post.setime');
        if($setime){
            list($data['stime'],$data['etime']) = explode(' - ', $setime);
            $data['stime'] = strtotime($data['stime']);
            $data['etime'] = strtotime($data['etime']);
        }
        $data['remarks'] = I('post.remarks');
        $data['detail'] = $_POST['editorValue'];
        if($_FILES['thumb']['name']){
            $info = $this->upload('project_img');
            if($info['state']){
                $data['img'] = UPLOAD_ROOT_PATH.$info['info']['thumb']['savepath'].$info['info']['thumb']['savename'];
            }else{
                $this->error($info['info']);
            }
        }
        $result = M('project')->where($where)->save($data);
        if($result===false){
            $this->error('修改失败');
        }else{
            $this->success("修改成功");
        }
    }
    
    public function bmlist(){
        $id = I('get.id','','intval');
        $proid['id'] = $id;
        $pro = M('project')->where($proid)->find();
        $where['mid'] = $pro['model'];
        $where['state'] = 1;
        $fields = M('fields')->where($where)->order('listorder DESC,id ASC')->select();
        $mid['mid'] = $where['mid'];
        $cname = M('model')->where($mid)->getField('cname');
        $w_pid['proid'] = $id;
        $db = M($cname);
        $count = $db->where($w_pid)->count();
        $Page       = new \Think\Page($count,18);
        $infolist = M($cname)->where($w_pid)->limit($Page->firstRow.','.$Page->listRows)->select();
        //dump($result);exit;
        $this->assign('infolist',$infolist);
        $this->assign('fields',$fields);
        $this->assign('proname',$pro['title']);
        $this->assign('page',$Page->show());
        $this->display();
    }


    /**********************************************************
    * 模型管理部分
    * 字段管理 
    **********************************************************/
    //模型列表
    public function model(){
        $this->check_level_1();
        $list = M('model')->select();
        $this->assign('list',$list);
        $this->display();
    }
    
    //创建模型
    public function creatmodel(){
        $this->check_level_1();
        $this->display();
    }
    
    //模型创建执行逻辑
    public function docreatmodel(){
        $this->check_level_1();
        if(!IS_POST) exit;
        if(!I('post.name') || !I('post.cname')) $this->error ('非法提交');
        $check['cname'] = I('post.cname');
        if(M('model')->where($check)->find()) $this->error ('别名已存在，请换一个');
        $_POST['utime'] = $_POST['ctime'] = NOW_TIME;
        $model = M('model');
        if($model->create()){
            $result = $model->add();
            $tablename = DB_PREFIX.I('post.cname');
            $default_fields = "CREATE TABLE IF NOT EXISTS `{$tablename}` (`id` int(10) unsigned NOT NULL AUTO_INCREMENT,`ctime` int(10) unsigned NOT NULL,`proid` int(10) unsigned NOT NULL,PRIMARY KEY (`id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";
            $creat_table = M()->execute($default_fields);
            if($result && $creat_table===0){
                $this->success('创建成功');
            }else{
                M('model')->where('mid='.$result)->delete();
                $this->error('创建失败');
            }
        }
    }

    //修改模型
    public function editmodel(){
        $this->check_level_1();
        if(!IS_GET) exit;
        $where['mid'] = I('get.mid','','intval');
        $result = M('model')->where($where)->find();
        $this->assign('model',$result);
        $this->display();
    }
    //模型修改保存逻辑
    public function updatemodel(){
        $this->check_level_1();
        if(!IS_POST) exit;
        if(!I('post.name') || !I('post.cname') || !I('post.mid')) $this->error ('非法提交');
        if(I('post.cname')) unset ($_POST['cname']);
        $_POST['utime'] = NOW_TIME;
        $model = M('model');
        if($model->create()){
            $result = $model->save();
            if($result){
                $this->success('修改成功',U('index/model'));
            }else{
                $this->error('修改失败');
            }
        }
    }
    //查看字段
    public function fieldslist(){
        if(!IS_GET || !I('get.mid')) exit;
        $db = M('fields');
        $where = array('mid'=>I('get.mid','','intval'));
        $fields = $db->where($where)->select();
        $fields_num = $db->where($where)->count();
        $model_name = M('model')->where($where)->getField('name');
        $this->assign('fields',$fields);
        $this->assign('model_name',$model_name);
        $this->assign('fields_num',$fields_num);
        $this->assign('mid',I('get.mid','','intval'));
        $this->assign('field_types',C('FIELD_TYPES'));
        $this->assign('field_patterns',C('FIELD_PATTERNS'));
        $this->display();
    }
    
    //添加字段
    public function addfield(){
        $this->check_level_1();
        if(!IS_POST) exit;
        if(!I('post.name') || !I('post.cname') || !I('post.type')) $this->error ("非法提交");
        $where['cname'] = I('post.cname');
        $where['mid'] = I('post.mid','','intval');
        if(M('fields')->where($where)->find()) $this->error ('别名已存在！');
        $db = M('fields');
        if($db->create()){
            if($db->add()){
                $mid['mid'] = I('post.mid','','intval');
                $tablename = DB_PREFIX.M('model')->where($mid)->getField('cname');
                $sql = "ALTER TABLE  `{$tablename}` ADD  `{$where['cname']}`";
                //根据字段类型，动态组合sql语句，添加字段
                $varchar255 = " VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL";
                $varchar50 = " VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL";
                switch (I('post.type','','intval')){
                    case 1:
                        $sql .=$varchar255;
                    break;
                    case 2:
                        $sql .=$varchar255;
                        break;
                    case 3:
                        $sql .=$varchar50;
                        break;
                    case 4:
                        $sql .=$varchar50;
                        break;
                    case 5:
                        $sql .=$varchar255;
                        break;
                    case 6:
                        $sql .=" INT( 10 ) UNSIGNED NOT NULL";
                        break;
                    case 7:
                        $sql .=$varchar255;
                        break;
                    case 8:
                        $sql .=" TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL";
                        break;
                    default:
                        break;
                }
                M()->execute($sql);
                $this->success('添加成功');
            }else{
                $this->error('添加失败');
            }
        }else{
            $this->error("添加失败");
        }
    }


    //删除模型
    public function delmodel(){
        $this->check_level_1();
        if(!IS_GET) exit;
        $where['mid'] = I('get.mid','','intval');
        $tablename = M('model')->where($where)->getField('cname');
        $tablename = DB_PREFIX.$tablename;
        if(M('model')->where($where)->delete()){
            //此处后期新增删除前备份表数据，防止误删
            M()->execute("DROP TABLE `{$tablename}`");
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
    
    public function editfield(){
        $this->check_level_1();
        $where['id'] = I('get.id','','intval');
        $field = M('fields')->where($where)->find();
        $this->assign('type',C('FIELD_TYPES'));
        $this->assign('field_patterns',C('FIELD_PATTERNS'));
        $this->assign("field",$field);
        $this->display();
    }
    
    public function doeditfield(){
        $this->check_level_1();
        if(!IS_POST) exit;
        $where['id'] = I('post.id','','intval');
        if(!I('post.name')) $this->error ('字段名称不能为空');
        if(I('post.cname') || I('post.type') || I('post.mid')) $this->error ('含非法参数');
        if(M('fields')->create()){
            $result = M('fields')->where($where)->save();
            if($result===false){
                $this->error('修改失败');
            }else{
                $this->success('修改成功');
            }
        }
    }
    
    /*********************************************************************
     * 管理员管理
     * 
     *********************************************************************/
    public function manager(){
        $this->check_level_1();
        $manager = M()->table(DB_PREFIX.'member m')->field("mn.*,m.*")->join(DB_PREFIX.'manager mn on m.id=mn.uid')->where('m.level=2')->select();
        $this->assign('manager',$manager);
        $this->display();
    }
    
    public function addmanager(){
        $this->check_level_1();
        $password = creatRandStr(10);
        $this->assign('password',$password);
        $this->display();
    }
    
    public function goaddmanager(){
        $this->check_level_1();
        if(!IS_POST) exit;
        $where['name'] = I('post.name');
        $used = M('member')->where($where)->find();
        if($used) {$this->error ('用户名已存在');exit;}
        if(!I('post.password')) {$this->error ('密码不能为空');exit;}
        if(I('post.mobile') && !preg_match("/^(1)[0-9]{10}$/", I('post.mobile'))) $this->error ('手机号格式错误');
        $member['name'] = I('post.name');
        $member['salt'] = creatRandStr();
        $member['password'] = MD5(I('post.password').'+'.$member['salt']);
        $member['mobile'] = I('post.mobile')?I('post.mobile'):"";
        $member['level'] = 2;
        $member['ctime'] = NOW_TIME;
        $db = M('member');
        if($db->create($member)){
            $uid = $db->add($member);
            if($uid){
                $manager['uid'] = $uid;
                $manager['etime'] = I('post.etime')?  strtotime(I('post.etime')):"";
                M('manager')->add($manager);
                $this->success('创建成功');
            }else{
                $this->error('失败');
            }
        }else{
            $this->error('创建数据失败，添加失败');
        }
    }
    
    public function editmanager(){
        
    }

    public function delmanager(){
        
    }
    /**********************************************************************
     * 异步请求部分
     * 
     *********************************************************************/
    
    //前台异步检查项目别名是否规范以及是否存在 return boolean
    public function checkprojectcname(){
        if(IS_AJAX){
            $where['cname'] = I('post.cname');
            $preg = $this->checkEn_num($where['cname']);
            if(!$preg){
                $this->ajaxReturn(false);
            }
            $used = M('project')->where($where)->find();
            if($used){
                $this->ajaxReturn(false);   
            }else{
                $this->ajaxReturn(true);
            }
        }
    }
    
    //前台异步检查模型别名是否规范以及是否存在 return boolean
    public function checkmodelcname(){
        if(IS_AJAX){
            $where['cname'] = I('post.cname');
            $where['mid'] = array('NEQ',I('post.mid','','intval'));
            $preg = $this->checkEn_num($where['cname']);
            if(!$preg){
                $this->ajaxReturn(false);
            }
            $used = M('model')->where($where)->find();
            if($used){
                $this->ajaxReturn(false);   
            }else{
                $this->ajaxReturn(true);
            }
        }
    }
    
    //通用检查唯一值
    public function checkunique(){
        if(IS_AJAX){
            $where[I('post.id')] = I('post.idvalue','','intval');
            $where[I('post.field')] = I('post.value');
            if(I('post.origid')){
                $where[I('post.origid')] = array('NEQ',I('post.origidvalue','','intval'));
            }
            if(I('post.filter')==1){
                $preg = $this->checkEn_num(I('post.value'));
                if(!$preg){
                    $this->ajaxReturn(false);
                }
            }
            $used = M('fields')->where($where)->find();
            if($used){
                $this->ajaxReturn(false);   
            }else{
                $this->ajaxReturn(true);
            }
        }
    }
    public function checkmanagername(){
        if(IS_AJAX){
            $where['name'] = I('post.name');
            if(I('post.origid')){
                $where[I('post.origid')] = array('NEQ',I('post.origidvalue','','intval'));
            }
            $used = M('member')->where($where)->find();
            if($used){
                $this->ajaxReturn(false);   
            }else{
                $this->ajaxReturn(true);
            }
        }
    }
    /*********************************************************
     * 私有方法部分
     * 
     ********************************************************/
    // 文件上传
    private function upload($dir) {
       $dir = $dir?$dir:date('Ymd',NOW_TIME);
       $config = array(
            'maxSize'    =>    3145728,
            'rootPath'   =>    UPLOAD_ROOT_PATH,
            'savePath'   =>    'Uploads/'.$dir."/",
            'saveName'   =>    array('uniqid',''),
            'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
            'autoSub'    =>    true,
            'subName'    =>    array('date','Ymd'),
        );

       $upload = new \Think\Upload($config);// 实例化上传类
       $info = $upload->upload();
       if(!$info) {// 上传错误提示错误信息
           $return['state'] = 0;
           $return['info'] = $upload->getError();
       }else{// 上传成功
           $return['state'] = 1;
           $return['info'] = $info;
       }
       return $return;
    }
    
    //以字母数字开头和结尾的，字母或数字或下划线组成的字符串
    private function checkEn_num($str){
        $pattern = strlen($str)<3?"/^[0-9a-z]?[0-9a-z]{1}$/i":"/^[0-9a-z][0-9a-z\_]*[0-9a-z]$/i";
        if(preg_match($pattern, $str)){
            return true;
        }else{
            return false;
        }
    }
    
    private function check_level_1(){
        if(intval($this->userinfo['level'])!==1) $this->error('权限不足，无权访问');
    }
    private function check_level_2(){
        if(intval($this->userinfo['level'])!==2 && intval($this->userinfo['level'])!==1) $this->error('权限不足，无权访问');
    }
}