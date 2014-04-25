<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>	
		<title>编辑导航内容</title>
        
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/Admin/Css/reset.css" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/Admin/Css/style.css" />
  
		<!-- jQuery -->
		<script type="text/javascript" src="__PUBLIC__/Admin/Scripts/jquery-1.8.3.min.js"></script>	

	</head>
       <body style="background:none;margin:10px 10px;">
		
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>编辑导航</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">导航内容</a></li> <!-- href must be unique and match the id of target div -->
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
		<div class="tab-content default-tab" id="tab2">
					
						<form name="editNav" action="__URL__/deleteNavProcess" method="post">
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								<p>
									<label>1、选择一个要操作的导航</label>
										<select name="id">
                                       <?php if(is_array($menu["nav"])): $i = 0; $__LIST__ = $menu["nav"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$navOne): $mod = ($i % 2 );++$i;?><option value="<?php echo ($navOne["id"]); ?>"><?php echo ($navOne["nav_name"]); ?>(一级)</option>
                                            <?php if(is_array($navOne["sub"])): $i = 0; $__LIST__ = $navOne["sub"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>">——<?php echo ($vo["nav_name"]); ?>(二级)</option><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
								</select> 
								<input class="button" type="submit" value="删除该导航" />	<br />
                                <small>注：删除导航将会删除该导航以及其下的所有子导航及文章</small>
								</p>
                          </fieldset>
                          </form>
                          <form action="__URL__/renameNavProcess" method="post">
                                <p>
									<label>2、更名导航</label>
										<select name="id">
                                       <?php if(is_array($menu["nav"])): $i = 0; $__LIST__ = $menu["nav"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$navOne): $mod = ($i % 2 );++$i;?><option value="<?php echo ($navOne["id"]); ?>"><?php echo ($navOne["nav_name"]); ?>(一级)</option>
                                            <?php if(is_array($navOne["sub"])): $i = 0; $__LIST__ = $navOne["sub"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>">——<?php echo ($vo["nav_name"]); ?>(二级)</option><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
										</select> =>
                                <input class="text-input" type="text" name="nav_name" />
                                </p>
                                
								<p>
                                	<button class="button" id="nav_rename">更名</button>
                                </p>
								</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div>
						</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
    </body>
    </html>