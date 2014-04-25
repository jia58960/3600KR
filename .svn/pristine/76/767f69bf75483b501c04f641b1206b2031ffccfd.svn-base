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
		<script type="text/javascript" src="__PUBLIC__/Admin/Scripts/simpla.jquery.configuration.js"></script>
		<!-- jQuery Configuration -->
        <!--<script type="text/javascript" src="__PUBLIC__/Admin/Scripts/editor/kindeditor-min.js"></script>
        <script type="text/javascript" src="__PUBLIC__/Admin/Scripts/facebox.js"></script>-->
       
        
	</head>
       <body style="background:none;margin:10px 10px;">
    <div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>添加文章</h3>
				
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
		<div class="tab-content default-tab" id="tab2">
					
						<form name="addArticle" action="__URL__/addArticleProcess" method="post">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>1、选择所属导航及文章标题</label>
                                    导航：
										<select name="nav_id" id="nav_id">
                                       <?php if(is_array($menu["nav"])): $i = 0; $__LIST__ = $menu["nav"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$navOne): $mod = ($i % 2 );++$i;?><option value="<?php echo ($navOne["id"]); ?>"><?php echo ($navOne["nav_name"]); ?>(一级)</option>
                                            <?php if(is_array($navOne["sub"])): $i = 0; $__LIST__ = $navOne["sub"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>">——<?php echo ($vo["nav_name"]); ?>(二级)</option><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
								</select> 
                                =>添加文章标题：
                                <input type="text" name="title" class="text-input small-input" />
								</p>
								<p>
                                	<label>2、文章是否显示在网站首页</label>									
									<input type="radio" name="home_page" value="0" />不显示<br />
                                    <input type="radio" name="home_page" value="1" />显示“在关于金瑞亿”（有且仅有一篇文章）<br />
                                    <input type="radio" name="home_page" value="2" />显示在“我们能做什么”（只能显示三篇文章）<br />
                                    <input type="radio" name="home_page" value="3" />显示在“合作伙伴”（有且仅有一篇文章）
                                    <br />
                                     <small>如添加多篇文章到主页，则根据时间降序排列</small>
                                </p>
                                <p>
                                	<label>3、是否本菜单下的热门文章(热门文章将显示在列表右侧)</label>									
									<input type="radio" name="hot_news" value="0" />不是
                                    <input type="radio" name="hot_news" value="1" />是
                                    <br />
                                    <small>一个菜单下最多显示三篇热门文章，超过三篇按最新添加时间排序</small>
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