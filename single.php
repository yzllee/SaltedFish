<!-- Article -->
<?php get_header(); ?>

<section>
	<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>

		<article class="fish-article fade-in">
			<h3 class="fish-article-title"><?php the_title(); ?></h3>

			<div class="fish-article-content">
				<?php the_content(); ?>
			</div>

			<div class="fish-article-tag">
				<p><?php the_tags( '— 本文标签：', ', ', '</br>' ); ?> </p>
				<p>—&nbsp<?php the_time('Y-m-d'); ?></p>
			</div>

			<div class="fish-article-page">
				<p><?php if (get_previous_post()) { previous_post_link('上一篇 : %link');} else {echo "";} ?></p>
				<p><?php if (get_next_post()) { next_post_link('下一篇 : %link');} else {echo "";} ?></p>
			</div>
		</article>

	<?php else : ?>

		<div class="errorbox">
			你要找的文章被吃掉了!
		</div>

	<?php endif; ?>
</section>

<section class="fish-comment">
	<?php comments_template(); ?>
</section>


<?php get_footer(); ?>
