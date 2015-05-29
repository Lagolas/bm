<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
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
							<li class="active">模型列表</li>
						</ul><!-- .breadcrumb -->
					</div>

					<div class="page-content">
						<div class="row">
                        	<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-12">
										<h3 class="header smaller lighter blue">模型列表</h3>
										<div class="table-header">
											已创建的备选模型列表，创建项目前，请先创建模型
										</div>

										<div class="table-responsive">
											<table id="sample-table-2" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">编号</th>
														<th>模型名称</th>
														<th>模型别名</th>
                                                        <th>数据量</th>
														<th>状态</th>
                                                        <th><i class="icon-time bigger-110"></i>创建时间</th>
                                                        <th>操作</th>
													</tr>
												</thead>

												<tbody>
                                                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
														<td class="center"><?php echo ($data['mid']); ?></td>
														<td><?php echo ($data['name']); ?></td>
                                                        <td><?php echo ($data['cname']); ?></td>
                                                        <td><?php echo ($data['records']); ?></td>
                                                        <td>
                                                        <?php if($data['state']){ ?>开启中
                                                        <?php }else{ ?>已关闭<?php } ?>	
                                                        </td>
                                                        <td><?php echo (date("Y.m.d",$data['ctime'])); ?></td>
														<td>
															<div class="action-buttons">
																<a class="blue" href="<?php echo U('index/fieldslist',array('mid'=>$data['mid']));?>" title="查看字段">
																	<i class="icon-zoom-in bigger-130"></i>
																</a>

																<a class="green" href="<?php echo U('index/editmodel',array('mid'=>$data['mid']));?>" title="编辑">
																	<i class="icon-pencil bigger-130"></i>
																</a>

																<a class="red" href="<?php echo U('index/delmodel',array('mid'=>$data['mid']));?>" title="删除" onClick="return confirm('删除后该模型下的报名数据会全部删除，且不可恢复，请慎重');">
																	<i class="icon-trash bigger-130"></i>
																</a>
															</div>
														</td>
													</tr><?php endforeach; endif; else: echo "" ;endif; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<div id="modal-table" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-footer no-margin-top">
												<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
													<i class="icon-remove"></i>
													Close
												</button>

												<ul class="pagination pull-right no-margin">
													<li class="prev disabled">
														<a href="#">
															<i class="icon-double-angle-left"></i>
														</a>
													</li>

													<li class="active">
														<a href="#">1</a>
													</li>

													<li>
														<a href="#">2</a>
													</li>

													<li>
														<a href="#">3</a>
													</li>

													<li class="next">
														<a href="#">
															<i class="icon-double-angle-right"></i>
														</a>
													</li>
												</ul>
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div><!-- PAGE CONTENT ENDS -->
							</div>
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
			window.jQuery || document.write("<script src='<?php echo SOURCE_PATH;?>assets/js/jquery-2.0.3.min.js'>"+"<"+"script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='<?php echo SOURCE_PATH;?>assets/js/jquery-1.10.2.min.js'>"+"<"+"script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?php echo SOURCE_PATH;?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"script>");
		</script>
		<script src="<?php echo SOURCE_PATH;?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo SOURCE_PATH;?>assets/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<script src="<?php echo SOURCE_PATH;?>assets/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo SOURCE_PATH;?>assets/js/jquery.dataTables.bootstrap.js"></script>

		<!-- ace scripts -->

		<script src="<?php echo SOURCE_PATH;?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo SOURCE_PATH;?>assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
        
        <script type="text/javascript">
			jQuery(function($) {
				var oTable1 = $('#sample-table-2').dataTable( {
				"aoColumns": [
			      null,{ "bSortable": false },{ "bSortable": false },null, { "bSortable": false }, null,{ "bSortable": false }
				] } );
				
			})
		</script>
</body>
</html>