<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title><?php echo ($project['title']); ?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="/dt/css/bootstrap-datepicker3.standalone.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
		body {font-family: "Helvetica Neue",Helvetica,Arial,"Hiragino Sans GB","Hiragino Sans GB W3","WenQuanYi Micro Hei",sans-serif;color:#555;}
		h1, .h1, h2, .h2, h3, .h3, h4, .h4, .lead {font-family: "Helvetica Neue",Helvetica,Arial,"Hiragino Sans GB","Hiragino Sans GB W3","Microsoft YaHei UI","Microsoft YaHei","WenQuanYi Micro Hei",sans-serif;}
    	.projects-header{width: 60%;text-align: center;margin: 0px 0 10px;font-weight: 200;margin-bottom: 40px;display: block;margin-left: auto;margin-right: auto;}
		.projects-header h2 {font-size: 42px;letter-spacing: -1px;}
		.mycheckbox label,.myradio label{margin-right:15px;}
	</style>
</head>

<body>
<div class="container projects">
    <div class="projects-header page-header">
        <h2><?php echo ($project['title']); ?></h2>
        <p><?php echo ($project['description']); ?></p>
    </div>
    <div class="row">
    	<div class="col-md-12">
        	<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo U('index/infosub');?>" method="post">
            <input type="hidden" name="proid" value="<?php echo ($project['id']); ?>" />
            <?php if(is_array($fields)): $i = 0; $__LIST__ = $fields;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i; if($data['type']==1){ ?>
                <div class="form-group">
                    <label for="<?php echo ($data['cname']); ?>" class="col-sm-2 control-label"><?php echo ($data['name']); ?></label>
                    <div class="col-sm-10">
                        <input type="text" name="<?php echo ($data['cname']); ?>" class="form-control" id="<?php echo ($data['cname']); ?>" placeholder="<?php echo ($data['placeholder']); ?>">
                    </div>
                </div>
            <?php }else if($data['type']==2){ ?>
                <div class="form-group">
                    <label for="<?php echo ($data['cname']); ?>" class="col-sm-2 control-label"><?php echo ($data['name']); ?></label>
                    <div class="col-sm-10">
                    	<textarea class="form-control" rows="3" id="<?php echo ($data['cname']); ?>" name="<?php echo ($data['cname']); ?>"></textarea>
                    </div>
                </div>
            <?php }else if($data['type']==3){ ?>
                <div class="form-group">
                    <label for="<?php echo ($data['cname']); ?>" class="col-sm-2 control-label"><?php echo ($data['name']); ?></label>
                    <div class="col-sm-10">
                    <?php  $list = explode('|',$data['setting']); ?>
                        <select class="form-control" name="<?php echo ($data['cname']); ?>">
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
            <?php }else if($data['type']==4){ ?>
                <div class="form-group">
                    <label for="<?php echo ($data['cname']); ?>" class="col-sm-2 control-label"><?php echo ($data['name']); ?></label>
                    <div class="col-sm-10">
                        <div class="radio myradio">
                        <?php
 $list = explode('|',$data['setting']); ?>
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><label><input type="radio" name="<?php echo ($data['cname']); ?>" <?php if($i==1){ ?>checked<?php } ?> value="<?php echo ($vo); ?>"> <?php echo ($vo); ?></label><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>

            <?php }else if($data['type']==5){ ?>
                <div class="form-group">
                    <label for="<?php echo ($data['cname']); ?>" class="col-sm-2 control-label"><?php echo ($data['name']); ?></label>
                    <div class="col-sm-10">
                        <div class="checkbox mycheckbox">
                        <?php
 $list = explode('|',$data['setting']); ?>
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><label><input type="checkbox" name="<?php echo ($data['cname']); ?>[]" value="<?php echo ($vo); ?>"> <?php echo ($vo); ?></label><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>
            <?php }else if($data['type']==6){ ?>
                <div class="form-group">
                    <label for="<?php echo ($data['cname']); ?>" class="col-sm-2 control-label"><?php echo ($data['name']); ?></label>
                    <div class="col-sm-10  has-feedback">
                        <input type="text" class="form-control" id="<?php echo ($data['cname']); ?>" name="<?php echo ($data['cname']); ?>">
                        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                    </div>
                </div>
            <?php }else if($data['type']==7){ ?>
                <div class="form-group">
                    <label for="<?php echo ($data['cname']); ?>" class="col-sm-2 control-label"><?php echo ($data['name']); ?></label>
                    <div class="col-sm-10">
                        <input type="file" id="<?php echo ($data['cname']); ?>" name="<?php echo ($data['cname']); ?>" />
                    </div>
                </div>
            <?php }else if($data['type']==8){ ?>
                <div class="form-group">
                    <label for="<?php echo ($data['cname']); ?>" class="col-sm-2 control-label"><?php echo ($data['name']); ?></label>
                    <div class="col-sm-10" style="z-index:0;">
                        <script id="<?php echo ($data['cname']); ?>" name="<?php echo ($data['cname']); ?>" type="text/plain" style="width:100%;height:300px;"></script>
                    </div>
                </div>
            <?php } endforeach; endif; else: echo "" ;endif; ?>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                	<button type="submit" class="btn btn-info">提交</button>
                </div>
            </div>
			</form>
            
        </div>
    </div>
</div>
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="/dt/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo PUBLIC_PATH;?>plus/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo PUBLIC_PATH;?>plus/ueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="<?php echo PUBLIC_PATH;?>plus/ueditor/lang/zh-cn/zh-cn.js"></script>
<script>
$(function(){
	<?php if(is_array($datepicker)): $i = 0; $__LIST__ = $datepicker;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dtp): $mod = ($i % 2 );++$i;?>$("#<?php echo ($dtp['cname']); ?>").datepicker({autoclose:true});<?php endforeach; endif; else: echo "" ;endif; ?>
})
</script>
<script type="text/javascript">
//实例化编辑器
//建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
<?php if(is_array($text_input)): $i = 0; $__LIST__ = $text_input;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>var ue = UE.getEditor('<?php echo ($data['cname']); ?>');<?php endforeach; endif; else: echo "" ;endif; ?>
</script>
</body>
</html>