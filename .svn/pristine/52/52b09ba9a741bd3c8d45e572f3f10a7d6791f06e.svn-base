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
					
					<h3>编辑文章</h3>
				
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
		<div class="tab-content default-tab" id="tab2">
					
								<p style="border-bottom: 1px solid #DDDDDD;">
												文章列表
								</p>
								
						
                        <table>
							
							<thead>
								<tr>
                                <th>ID</th>
								   <th>标题</th>
								   <th>所属菜单</th>
								   <th>提交时间</th>
								   <th>是否首页</th>
                                   <th>是否热门</th>
                                   <th>操作</th>
								</tr>
								
							</thead>
							<tbody>
								<?php if(is_array($artArr)): $i = 0; $__LIST__ = $artArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voArtList): $mod = ($i % 2 );++$i;?><tr>
                                	<td><?php echo ($voArtList["id"]); ?></td>
									<td><a title="点击编辑" href="__URL__/detail/artID/<?php echo ($voArtList["id"]); ?>"><?php echo ($voArtList["title"]); ?></a></td>
									<td><?php echo ($voArtList["nav_name"]); ?>(<?php echo ($voArtList["level"]); ?>级)</td>
									<td><?php echo (date('Y-m-d H:i',$voArtList["time"])); ?></td>
									<td><?php echo ($voArtList["home_page"]); ?></td>
									<td><?php echo ($voArtList["hot_news"]); ?></td>
                                    <td>
										<!-- Icons -->
										 <a title="Edit" href="__URL__/detail/artID/<?php echo ($voArtList["id"]); ?>"><img alt="Edit" src="__PUBLIC__/Admin/Images/icons/pencil.png"></a>
										 <a title="Delete" href="__URL__/deleteArticle/artID/<?php echo ($voArtList["id"]); ?>" onclick="return confirm('确定删除该文章吗？')"><img alt="Delete" src="__PUBLIC__/Admin/Images/icons/cross.png"></a> 
									</td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</tbody>
                            
                            <tfoot>
								<tr>
									<td colspan="6">
										<div class="pagination">
											<?php echo ($listPage); ?>
										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
							
						</table>
					</div>
            
						</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
    </body>
    </html>