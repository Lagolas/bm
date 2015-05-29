<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>一团报名系统</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
		body {font-family: "Helvetica Neue",Helvetica,Arial,"Hiragino Sans GB","Hiragino Sans GB W3","WenQuanYi Micro Hei",sans-serif;}
		h1, .h1, h2, .h2, h3, .h3, h4, .h4, .lead {font-family: "Helvetica Neue",Helvetica,Arial,"Hiragino Sans GB","Hiragino Sans GB W3","Microsoft YaHei UI","Microsoft YaHei","WenQuanYi Micro Hei",sans-serif;}
    	.projects-header{width: 60%;text-align: center;margin: 0px 0 10px;font-weight: 200;margin-bottom: 40px;display: block;margin-left: auto;margin-right: auto;}
		.projects-header h2 {font-size: 42px;letter-spacing: -1px;}
		.projects .thumbnail {display: block;margin-left: auto;margin-right: auto;text-align: center;max-width: 310px;height:270px;margin-bottom: 30px;border-radius: 0;}
		.projects .thumbnail .caption {height: 138px;overflow-y: hidden;color: #555;}
    </style>
  </head>
  <body>
    <div class="container projects">
    	<div class="projects-header page-header">
        	<h2>一团报名管理系统</h2>
            <p>一团报名管理系统是由著名互联网创业者服务商一团网络自主研发，功能全面，安全稳定</p>
        </div>
        <div class="row">
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div class="col-sm-6 col-md-4 col-lg-3 ">
              <div class="thumbnail">
                <a href="<?php if($data['cname']){ echo U('index/show',array('cname'=>$data['cname'])); }else{ echo U('index/show',array('id'=>$data['id'])); } ?>" title="<?php echo ($data['title']); ?>" target="_blank"><img class="lazy" src="<?php echo ($data['img']); ?>" width="300" height="150" data-src="<?php echo ($data['img']); ?>" alt="<?php echo ($data['title']); ?>"></a>
                <div class="caption">
                  <h3> 
                    <a href="<?php if($data['cname']){ echo U('index/show',array('cname'=>$data['cname'])); }else{ echo U('index/show',array('id'=>$data['id'])); } ?>" title="<?php echo ($data['title']); ?>" target="_blank"><?php echo ($data['title']); ?></a>
                  </h3>
                  <p><?php echo ($data['description']); ?></p>
                </div>
              </div>
        	</div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </body>
</html>