<?php
/*
Template Name: Year Archives
*/
?>
<!-- Archives -->
<?php get_header(); ?>

<?php
$args = array(
	'post_type'           	=> 'post',
	'ignore_sticky_posts' 	=> 1,
	'posts_per_page'        => -1,
 );
 $query = new WP_query( $args );
 $i = 0;
 ?>

<section>
	<div class="fish-archive fade-in">
		<?php if($query -> have_posts()) : ?>
			<?php while($query -> have_posts()) : $query -> the_post() ?>
				<?php if($date != date('Y',strtotime($post->post_date) ) ){ ?>
					</ul>
					<p class="fish-archive-year"><?php echo date('Y',strtotime($post->post_date)); ?></p>
					<ul class="fish-archive-list">
				<?php }else{ ?>
					<?php if($i == 0){?>
						<p class="fish-archive-year"><?php echo date('Y',strtotime($post->post_date)); ?></p>
						<ul class="fish-archive-list">
					<?php } ?>
				<?php } ?>
					<li id=”post-<?php the_ID(); ?>>
						<time class="fish-archive-time" datetime="<?php the_time('Y-m-d h:i:s'); ?>"><?php the_time('Y-m-d'); ?></time>
						<span> &nbsp — &nbsp </span>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</li>
			<?php $i++; $date = date('Y',strtotime($post->post_date));endwhile; ?>
		<?php endif;wp_reset_query(); ?>
	</div>
</section>

<?php get_footer(); ?>
