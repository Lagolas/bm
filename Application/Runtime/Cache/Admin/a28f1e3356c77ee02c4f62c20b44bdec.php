<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>云报名CMS --最简洁的轻量级报名系统</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- basic styles -->
		<link href="<?php echo SOURCE_PATH;?>assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo SOURCE_PATH;?>assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="<?php echo SOURCE_PATH;?>assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->
		<link rel="stylesheet" href="<?php echo SOURCE_PATH;?>assets/css/css.css" />

		<!-- ace styles -->

		<link rel="stylesheet" href="<?php echo SOURCE_PATH;?>assets/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo SOURCE_PATH;?>assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="<?php echo SOURCE_PATH;?>assets/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="<?php echo SOURCE_PATH;?>assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<script src="<?php echo SOURCE_PATH;?>assets/js/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="<?php echo SOURCE_PATH;?>assets/js/html5shiv.js"></script>
		<script src="<?php echo SOURCE_PATH;?>assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

		<body>
		<div class="navbar navbar-default" id="navbar">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand"><small><i class="icon-leaf"></i>易报名CMS</small></a><!-- /.brand -->
				</div><!-- /.navbar-header -->

				<div class="navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo SOURCE_PATH;?>assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>欢迎使用,</small>
									管理员
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li><a href="/" target='_blank'><i class="icon-cog"></i>前台首页</a></li>
								<li><a href="#"><i class="icon-user"></i>系统设置</a></li>
								<li class="divider"></li>
								<li><a href="<?php echo U('member/logout');?>"><i class="icon-off"></i>安全退出</a></li>
							</ul>
						</li>
					</ul><!-- /.ace-nav -->
				</div><!-- /.navbar-header -->
			</div><!-- /.container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#"><span class="menu-text"></span></a>

				<div class="sidebar" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>

					<div class="sidebar-shortcuts" id="sidebar-shortcuts">
						<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
							<button class="btn btn-success"><i class="icon-signal"></i></button>
							<button class="btn btn-info"><i class="icon-pencil"></i></button>
							<button class="btn btn-warning"><i class="icon-group"></i></button>
							<button class="btn btn-danger"><i class="icon-cogs"></i></button>
						</div>

						<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
							<span class="btn btn-success"></span>
							<span class="btn btn-info"></span>
							<span class="btn btn-warning"></span>
							<span class="btn btn-danger"></span>
						</div>
					</div><!-- #sidebar-shortcuts -->

					<ul class="nav nav-list">
						<li class="<?php if(ACTION_NAME =='index' || ACTION_NAME ==''){ ?>active<?php } ?>">
                        	<a href="<?php echo U('index');?>">
								<i class="icon-dashboard"></i>
								<span class="menu-text"> 后台首页 </span>
							</a>
						</li>
                        <li class="<?php if(in_array(ACTION_NAME,array('project','creatpro','editpro','bmlist'))){ ?>active open<?php } ?>">
							<a href="#" class="dropdown-toggle">
								<i class="icon-tasks"></i>
								<span class="menu-text"> 项目管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="<?php if(in_array(ACTION_NAME,array('project','bmlist'))){ ?>active<?php } ?>">
									<a href="<?php echo U('index/project');?>">
										<i class="icon-double-angle-right"></i>
										项目列表
									</a>
								</li>

								<li class="<?php if(in_array(ACTION_NAME,array('creatpro','editpro'))){ ?>active<?php } ?>">
									<a href="<?php echo U('index/creatpro');?>">
										<i class="icon-double-angle-right"></i>
										新建项目
									</a>
								</li>
							</ul>
						</li>
                        
                        <li class="<?php if(in_array(ACTION_NAME,array('model','creatmodel','fieldslist','editmodel'))){ ?>active open<?php } ?>">
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 模型管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="<?php if(in_array(ACTION_NAME,array('model','fieldslist'))){ ?>active<?php } ?>">
									<a href="<?php echo U('index/model');?>">
										<i class="icon-double-angle-right"></i>
										模型列表
									</a>
								</li>

								<li class="<?php if(in_array(ACTION_NAME,array('creatmodel','editmodel'))){ ?>active<?php } ?>">
									<a href="<?php echo U('index/creatmodel');?>">
										<i class="icon-double-angle-right"></i>
										创建模型
									</a>
								</li>
							</ul>
						</li>
						
					</ul><!-- /.nav-list -->

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>

		<!-- page specific plugin styles -->
				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="<?php echo U('index');?>">首页</a>
							</li>

							<li>
								<a href="#">模型管理</a>
							</li>
							<li class="active">创建模型</li>
						</ul><!-- .breadcrumb -->
					</div>

					<div class="page-content">
                    	<div class="page-header">
							<h1>创建模型</h1>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
                                <form class="form-horizontal" role="form" id="validation-form" action="<?php echo U('index/docreatmodel');?>" method="post">
                                	<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="name"> 模型名称* </label>

										<div class="col-sm-9">
											<input type="text" id="name" name="name" placeholder="模型名称" class="col-xs-10 col-sm-5 limited" maxlength="25" />
										</div>
									</div>

									<div class="space-4"></div>
                                    <div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="cname"> 模型别名* </label>

										<div class="col-sm-9">
											<input type="text" id="cname" name="cname" placeholder="（创建后不可修改）只能填写字母、数字、下划线，并且不能以下划线开头或结尾" class="col-xs-12 limited" maxlength="20" />
										</div>
									</div>

									<div class="space-4"></div>
                                    <div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="model"> 状态 </label>

										<div class="col-sm-9">
											<div class="radio">
                                                <label>
                                                    <input type="radio" name="state" value="1" checked class="ace" />
                                                    <span class="lbl"> 开启</span>
                                                </label>&emsp;&emsp;
                                                <label>
                                                    <input type="radio" name="state" value="0" class="ace" />
                                                    <span class="lbl"> 关闭</span>
                                                </label>
                                            </div>
										</div>
									</div>

									<div class="space-4"></div>
                                    <div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="remark"> 备注说明</label>

										<div class="col-sm-9">
											<textarea class="form-control limited" name="remark" id="remark" maxlength="255"></textarea>
										</div>
									</div>
                                    
                                    <div class="space-4"></div>
                                    <div class="clearfix form-actions">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button class="btn btn-info" id="submit" type="submit">
                                            <i class="icon-ok bigger-110"></i>
                                            立即提交
                                        </button>

                                        &nbsp; &nbsp; &nbsp;
                                        <button class="btn" type="reset">
                                            <i class="icon-undo bigger-110"></i>
                                            重置
                                        </button>
                                    </div>
                                </div>
                                </form>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

				<div class="ace-settings-container" id="ace-settings-container">
					<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
						<i class="icon-cog bigger-150"></i>
					</div>

					<div class="ace-settings-box" id="ace-settings-box">
						<div>
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-skin="default" value="#438EB9">#438EB9</option>
									<option data-skin="skin-1" value="#222A2D">#222A2D</option>
									<option data-skin="skin-2" value="#C6487E">#C6487E</option>
									<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
								</select>
							</div>
							<span>&nbsp; 选择皮肤</span>
						</div>
					</div>
				</div><!-- /#ace-settings-container -->
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->

		<script src="<?php echo SOURCE_PATH;?>assets/js/jquery-2.0.3.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="<?php echo SOURCE_PATH;?>assets/js/jquery-1.10.2.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo SOURCE_PATH;?>assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='<?php echo SOURCE_PATH;?>assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?php echo SOURCE_PATH;?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo SOURCE_PATH;?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo SOURCE_PATH;?>assets/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->
        <!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
        <script src="<?php echo SOURCE_PATH;?>assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="<?php echo SOURCE_PATH;?>assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo SOURCE_PATH;?>assets/js/jquery.validate.min.js"></script>
		<script src="<?php echo SOURCE_PATH;?>assets/js/jquery.inputlimiter.1.3.1.min.js"></script>
		<!-- ace scripts -->

		<script src="<?php echo SOURCE_PATH;?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo SOURCE_PATH;?>assets/js/ace.min.js"></script>
        
        <script type="text/javascript">
			jQuery(function($) {
				$('textarea.limited,input.limited').inputlimiter({
					remText: '还可以输入%n 个字符',
					limitText: '最多允许: %n个字符.'
				});
				
				$('#validation-form').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					rules: {
						name:{required: true},
						cname:{
							required: true,
							remote:{
								 type:"POST",
								 url:"<?php echo U('index/checkmodelcname');?>",
								 data:{cname:function(){return $("#cname").val();}}
							}
						}
						
					},
					messages: {
						name: "*模型名称不能为空！",
						cname:{
							required:"*模型别名不能为空",
							remote:"别名已存在或者含有非法字符！"
						}
					},
					invalidHandler: function (event, validator) { //display error alert on form submit   
						$('.alert-danger', $('.login-form')).show();
					},
					highlight: function (e) {
						$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
					},
					success: function (e) {
						$(e).closest('.form-group').removeClass('has-error').addClass('has-info');
						$(e).remove();
					},
					errorPlacement: function (error, element) {
						error.insertAfter(element);
					},
					submitHandler: function (form) {
						form.submit();
					}
				});
			
			});
		</script>
		<!-- inline scripts related to this page -->
</body>
</html>