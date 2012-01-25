<?php get_header();?>

	<div id="Wrapper"> 
		<div id="Main"> 
			<?php get_sidebar(); ?>
			<div id="Content"> 
				<div class="box" id="page">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="cell from_<?php the_ID(); ?>" id="post-<?php the_ID(); ?>">
								<div class="cell">
									<h1><?php the_title(); ?></h1>
									<strong><small class="fade"><?php the_author() ?> 写于 <?php the_time('Y年n月d日') ?></small></strong>
								</div>
								<div class="inner">
									<div class="content topic_content">
										<?php the_content('继续阅读'); ?>
										<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
									</div>
								</div>
						</div>
				</div>
				<div class="sep20"></div>
				<?php endwhile; else: ?>

						<p>Sorry, no posts matched your criteria.</p>

				<?php endif; ?>
			</div>		
		<div class="c"></div> 
		</div> 
    </div>

<?php get_footer(); ?>
