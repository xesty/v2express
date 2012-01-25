<?php get_header(); ?>
<!-- Main -->
    <div id="Wrapper"> 
		<div id="Main"> 
			<?php get_sidebar(); ?>
			<div id="Content"> 
				<div class="box" id="topics_index">
					<div class="cell">
						<div class="sep10"></div>
						<span class="header">
							<?php if ( is_404() || is_category() || is_day() || is_month() || is_year() || is_search() || is_paged() ) { ?>

								<?php /* If this is a 404 page */ if (is_404()) { ?>
								<?php /* If this is a category archive */ } elseif (is_category()) { ?>
								以下是分类 <?php single_cat_title(''); ?> 中的内容。

								<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
								以下是<a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a><?php the_time('Y年m月d日'); ?>的内容。

								<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
								以下是<a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a><?php the_time('Y年m月'); ?>的内容。

								<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
								以下是<a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a><?php the_time('Y年'); ?>的内容。
								
								<?php } ?>
							<?php }?>

						</span>
						<div class="sep10"></div>
					</div>
				<?php if (have_posts()) : ?>
					<?php $postcnt = 1; ?>
					<?php while (have_posts()) : the_post(); ?>
						<?php if ($postcnt == 1 && is_home() && !is_paged()) : ?>
							<div class="cell from_<?php the_ID(); ?>" id="post-<?php the_ID(); ?>">
								<div class="cell" style="min-height: 73px;">
									<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									<strong><small class="fade">By <?php the_author() ?> at <?php the_time('F jS, Y') ?> </small></strong>
								</div>
								<div class="inner">
									<div class="content topic_content">
										<?php the_content('继续阅读'); ?>
									</div>
								</div>
							</div>
						<?php else : ?>
							<div class="cell from_1036"> 
								<table cellpadding="0" cellspacing="0" border="0" width="100%">
									<tr> 
										<td class="post-date">
											<div class="date">
												<span class="day"><?php the_time('n') ?>/</span> 
												<span class="month"><?php the_time('d') ?></span>
											</div>
										</td> 
										<td style="padding-left: 12px" valign="top"> 
											<div class="fr"> 
												 <?php comments_popup_link('0', '1', '%','count_blue'); ?> 
											</div> 
											<div class="sep3"></div> 
											<span class="bigger" style="font-size: 16px"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></span> 
											<div class="sep5"></div> 
											<span class="fade" style="font-size: 10px;">By <strong><?php the_author() ?></strong> in <strong><?php the_category(', ') ?></strong><br /> 
											<span class="created"><?php the_tags('Tags: ', '·', ''); ?> | <?php edit_post_link('Edit', '', ' | '); ?></span> 
										</td> 
									</tr> 
								</table> 
							</div>
						<?php endif; $postcnt++; ?>	
					<?php endwhile; ?>
					<div class="inner">
                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                            <tbody><tr>
                                <td width="100" align="left">
                                    
                                    <div class="sep5"></div>
                                    <?php previous_posts_link('Newer Entries &raquo;') ?>
                                    <div class="sep5"></div>
                                    
                                </td>
                                <td width="100" align="right">
                                    <div class="sep5"></div>
									<?php next_posts_link('&laquo; Older Entries') ?>
                                    <div class="sep5"></div> 
                                </td>
                        </tr></tbody></table>                    
					</div>
				<?php else : ?>
					<h2 class="center">Not Found</h2>
					<p class="center">Sorry, but you are looking for something that isn't here.</p>
					<?php get_search_form(); ?>
				<?php endif; ?>
				</div>
			</div> 
		<div class="c"></div> 
		</div> 
    </div>
	<!-- Main Ends -->
	<?php get_footer(); ?>