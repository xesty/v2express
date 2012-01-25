<?php get_header(); ?>
<!-- Main -->
    <div id="Wrapper"> 
		<div id="Main"> 
			<?php get_sidebar(); ?>
			<div id="Content"> 
				<div class="box" id="topics_index">
				<?php if (have_posts()) : ?>
					<?php $postcnt = 1; ?>
					<?php while (have_posts()) : the_post(); ?>
						<?php if ($postcnt == 1 && is_home() && !is_paged()) : ?>
							<div class="cell from_<?php the_ID(); ?>" id="post-<?php the_ID(); ?>">
								<div class="cell" style="min-height: 73px;">
									<div class="fr"> 
										<?php comments_popup_link('0', '1', '%','count_blue'); ?> 
									</div>
									<p class="headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
									
									
									<span class="created"><strong><?php vf_the_category(' &bull; ') ?></strong> &nbsp;•&nbsp; <?php userViews('','次点击'); ?> &nbsp;•&nbsp; 添加时间：<? wp_days_ago(); ?> </span>
								</div>
								<div class="inner">
									<div class="content topic_content">
										<?php the_content('继续阅读'); ?>
									</div>
								</div>
							</div>
						<?php else : ?>
							<div class="cell from_<?php the_ID(); ?>"> 
								<table>
									<tr> 
										<td class="post-date">
											<div class="date">
												<span class="day"><?php the_time('n') ?>/</span> 
												<span class="month"><?php the_time('d') ?></span>
											</div>
										</td> 
										<td style="padding-left: 12px"> 
											<div class="fr"> 
												 <?php comments_popup_link('0', '1', '%','count_blue'); ?> 
											</div> 
											<div class="sep3"></div> 
											<span class="bigger" style="font-size: 16px"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></span> 
											<div class="sep5"></div> 
											<span class="created"><strong><?php vf_the_category(' &bull; ') ?></strong> &nbsp;•&nbsp; <?php userViews('','次点击'); ?> &nbsp;•&nbsp; 添加时间：<? wp_days_ago(); ?> </span>
										</td>
									</tr> 
								</table> 
							</div>
						<?php endif; $postcnt++; ?>	
					<?php endwhile; ?>
					<div class="inner">
                        <table>
                            <tbody>
								<tr>
									<td width="100" align="left">
										
										<div class="sep5"></div>
										<?php previous_posts_link('上一页') ?>
										<div class="sep5"></div>
										
									</td>
									<td width="100" align="right">
										<div class="sep5"></div>
										<?php next_posts_link('下一页') ?>
										<div class="sep5"></div> 
									</td>
								</tr>
							</tbody>
						</table>                    
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