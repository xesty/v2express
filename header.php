<!DOCTYPE html> 
<html lang="zh-CN"> 
<head> 
	<meta charset="UTF-8" /> 
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<title><?php bloginfo('name'); ?> <?php wp_title('›'); ?></title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
</head> 
<body> 
    <div id="Top"> 
		<div id="TopMain"> 
			<div id="Logo" onclick="location.href='/'"></div> 
			<div id="Navigation">   
				<ul> 
					<li><a href="/" class="white">首页</a></li>
					<?php wp_list_pages('title_li='); ?>
				</ul> 
			</div>
			<div id="Search"></div> 
		</div>
	</div> 