<!DOCTYPE html>

<html>

<head>

	<title><?php if ( is_home() ) {
		bloginfo('name'); echo " - "; bloginfo('description');
	} elseif (is_404() ) {
		echo '页面未找到!';
	} else {
		echo wp_title('');echo " - ";bloginfo('name');
	} ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<?php
	$description = '';
	$keywords = '';

	if (is_home() || is_page()) {

	   $description = "有梦想的咸鱼";

	   $keywords = "WordPress, 博客, javascript, css";
	}
	elseif (is_single()) {
	   $description1 = get_post_meta($post->ID, "description", true);
	   $description2 = str_replace("\n","",mb_strimwidth(strip_tags($post->post_content), 0, 200, "…", 'utf-8'));

	   // 填写自定义字段description时显示自定义字段的内容，否则使用文章内容前200字作为描述
	   $description = $description1 ? $description1 : $description2;

	   // 填写自定义字段keywords时显示自定义字段的内容，否则使用文章tags作为关键词
	   $keywords = get_post_meta($post->ID, "keywords", true);
	   if($keywords == '') {
	      $tags = wp_get_post_tags($post->ID);
	      foreach ($tags as $tag ) {
	         $keywords = $keywords . $tag->name . ", ";
	      }
	      $keywords = rtrim($keywords, ', ');
	   }
	}
	elseif (is_category()) {
	   // 分类的description可以到后台 - 文章 -分类目录，修改分类的描述
	   $description = category_description();
	   $keywords = single_cat_title('', false);
	}
	elseif (is_tag()){
	   // 标签的description可以到后台 - 文章 - 标签，修改标签的描述
	   $description = tag_description();
	   $keywords = single_tag_title('', false);
	}
	$description = trim(strip_tags($description));
	$keywords = trim(strip_tags($keywords));
	?>

	<meta name="description" content="<?php echo $description; ?>" />

	<meta name="keywords" content="<?php echo $keywords; ?>" />

	<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url') ?>/images/favicon.ico" />

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

	<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/tomorrow.css" type="text/css" />

	<script src="<?php bloginfo('template_url') ?>/js/highlight.pack.js"></script>

	<script src="<?php bloginfo('template_url') ?>/js/jquery.min.js"></script>

	<script>hljs.initHighlightingOnLoad();</script>

	<?php wp_head(); ?>

	<?php flush(); ?>
</head>

<body>

	<header>
		<div class="fish-head-img">
			<a href="<?php bloginfo('url') ?>">
				<img src="<?php bloginfo('template_url') ?>/images/bear.jpg">
			</a>
		</div>
		<nav class="fish-head-nav">
			<?php
				$top_nav = wp_nav_menu( array(
					'theme_location'=>'main',
					'fallback_cb'=>'',
					'container'=>'',
					'menu_class'=>'fish-head-ul',
					'echo'=>false) );
				echo $top_nav;
			?>
		</nav>
	</header>
