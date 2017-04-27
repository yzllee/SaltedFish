<!-- Page -->
<?php get_header(); ?>

<section>
	<div class="fish-archive fade-in">
		<?php if(have_posts()) : ?>
			<p class="fish-archive-year"><?php single_cat_title(); ?></p>
			<?php while(have_posts()) : the_post() ?>
					<ul class="fish-archive-list">
						<li id=”post-<?php the_ID(); ?>>
							<time class="fish-archive-time" datetime="<?php the_time('Y-m-d h:i:s'); ?>"><?php the_time('Y-m-d'); ?></time>
							<span> &nbsp — &nbsp </span>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						</li>
					</ul>
			<?php endwhile; ?>
			<div class="navigation">
				<div class="nav-previous"><?php next_posts_link() ?></div>
				<div class="nav-next"><?php previous_posts_link() ?></div>
			</div>
		<?php endif;?>
	</div>
</section>

<?php get_footer(); ?>
