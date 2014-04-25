<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<title>Simpla Admin</title>
        
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/Admin/Css/reset.css" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/Admin/Css/style.css" />
  
		<!-- jQuery -->
		<script type="text/javascript" src="__PUBLIC__/Admin/Scripts/jquery-1.8.3.min.js"></script>
		
		<!-- jQuery Configuration -->
	</head>
       <body style="background:none;margin:10px 10px;">
    <div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>添加导航</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">导航内容</a></li> <!-- href must be unique and match the id of target div -->
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
		<div class="tab-content default-tab" id="tab2">
					
						<form name="addNav" action="__URL__/addNavProcess" method="post">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>1、选择所属导航</label>
										<select name="fid">
										<option value="0">添加一级导航</option>
                                       <?php if(is_array($menu["nav"])): $i = 0; $__LIST__ = $menu["nav"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$navOne): $mod = ($i % 2 );++$i;?><option value="<?php echo ($navOne["id"]); ?>"><?php echo ($navOne["nav_name"]); ?>(一级)</option>
                                            <?php if(is_array($navOne["sub"])): $i = 0; $__LIST__ = $navOne["sub"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>">——<?php echo ($vo["nav_name"]); ?>(二级)</option><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
								</select> 
										<br /><small>注:如果添加一级导航，请选择"添加一级导航"</small>
								</p>
								
								<p>
									<label>2、导航菜单名称</label>
									<input class="text-input small-input" type="text" name="nav_name" />
								</p>
								<p>
									<label>3、选择添加的为几级导航</label>
									<input type="radio" name="level" value="1"/>一级
									<input type="radio" name="level" value="2"/>二级
								</p>
								<p>
									<label>4、选择该导航是对应</label>
									<input type="radio" name="list" value="0"/>一篇文章<br />
									<input type="radio" name="list" value="1"/>文章列表
								</p>							
								<p>
									<input class="button" type="submit" value="提 交" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div>
						</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
    </body>
    </html>