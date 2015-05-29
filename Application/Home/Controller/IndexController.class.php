<?php
namespace Home\Controller;
use Common\Controller\IniController;
class IndexController extends IniController {
    public function index(){
        //$this->is_login();
        $list = M('project')->order("listorder DESC,id DESC")->select();
        $this->assign("list",$list);
        $this->display(":index");
    }
    public function show(){
        if(I('get.id','','intval')){
            $where['id'] = I('get.id','','intval');
        }else if(I('get.cname')){
            $where['cname'] = I('get.cname');
        }
        $project = M('project')->where($where)->find();
        $mid['mid'] = $project['model'];
        $mid['state'] = 1;
        $fields = M('fields')->where($mid)->order('listorder DESC,id ASC')->select();
        $dtpicker['mid'] = $project['model'];
        $dtpicker['state'] = 1;
        $dtpicker['type'] = 6;
        $datepicker = M('fields')->where($dtpicker)->select();
        $textinput['mid'] = $project['model'];
        $textinput['state'] = 1;
        $textinput['type'] = 8;
        $text_input = M('fields')->where($textinput)->select();
        $this->assign('fields',$fields);
        $this->assign('datepicker',$datepicker);
        $this->assign('text_input',$text_input);
        $this->assign('project',$project);
        $this->display(":show");
    }
    
    public function infosub(){
        if(!IS_POST) exit;
        $w_mid['id'] = I('post.proid','','intval');
        $result = M('project')->where($w_mid)->find();
        $endtime = $result['etime'];
        if($endtime>0 && $endtime<NOW_TIME) $this->error ('报名已结束');
        $mid = $result['model'];
        $w_fields['mid'] = $mid;
        $w_fields['state'] = 1;
        $fields = M('fields')->where($w_fields)->select();
        foreach($fields as $k=>$v){
            if($v['type']==7){//文件上传处理
                if($_FILES[$v['cname']]['name']){
                    $setting = explode('|',$v['setting']);
                    $size = $setting[1];
                    $exts = explode('-',$setting[0]);
                    $info = $this->upload('infosubmit',$exts,$size);
                    if($info['state']){
                        $_POST[$v['cname']] = UPLOAD_ROOT_PATH.$info['info'][$v['cname']]['savepath'].$info['info'][$v['cname']]['savename'];
                    }else{
                        $this->error($info['info']);
                    }
                }
            }else if($v['type']==5){//复选框处理
                $_POST[$v['cname']] = implode('-', $_POST[$v['cname']]);
            }
            if($v['required']==1){//验证必填项
                if(!$_POST[$v['cname']]) $this->error ($v['name'].'不能为空！');
            }
            if($v['pattern']){//正则验证
                if(!preg_match($v['pattern'],$_POST[$v['cname']])) $this->error ($v['name']."格式错误");
            }
            if($v['type']==8){//长文本处理
                if($_POST[$v['cname']]){
                    $textarr[$v['cname']] = strip_tags($_POST[$v['cname']], "<p>,<span>,<br/>,<strong>,<em>,<h1>,<h2>,<h3>,<h4>,<h5>,<h6>,<hr/>");
                    unset($_POST[$v['cname']]);
                }
            }
        }
        
        //数据入库
        $w_model['mid'] = $mid;
        $model_cname = M('model')->where($w_model)->getField('cname');
        $db = M($model_cname);
        $_POST['ctime'] = NOW_TIME;
        $_POST['etime'] = strtotime(I('post.etime'));
        if($db->create()){
            $bmid = $db->add();
            if($bmid){
                if(is_array($textarr)){
                    $db->where('id='.$bmid)->save($textarr);
                }
                M('project')->where($w_mid)->setInc('records');
                $this->success('提交成功');
            }else{
                $this->success('提交失败');
            }
        }else{
            $this->error('创建数据失败，报名失败');
        }
    }
    
    /*
     * 附件上传
     **/
    // 文件上传
    private function upload($dir,$exts,$size) {
       $dir = $dir?$dir:date('Ymd',NOW_TIME);
       $size = $size?$size*1000:3145728;
       $exts = $exts?$exts:array('jpg', 'gif', 'png', 'jpeg');
       $config = array(
            'maxSize'    =>    $size,
            'rootPath'   =>    UPLOAD_ROOT_PATH,
            'savePath'   =>    'Uploads/'.$dir."/",
            'saveName'   =>    array('uniqid',''),
            'exts'       =>    $exts,
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
}