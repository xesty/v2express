<?php get_header(); ?>
<!-- Main -->
    <div id="Wrapper"> 
		<div id="Main"> 
			<?php get_sidebar(); ?>
			<div id="Content">
				<?php if (have_posts()) : ?>
				<div class="box" id="topics_index">
					<div class="cell">
						<div class="sep10"></div>
						<span class="header">搜索结果</span>
						<div class="sep10"></div>
					</div>
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
											<span class="created"><?php the_tags('Tags: ', ', ', ''); ?> | <?php edit_post_link('Edit', '', ' | '); ?></span> 
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
                                    <?php previous_posts_link('下一页 &raquo;') ?>
                                    <div class="sep5"></div>
                                    
                                </td>
                                <td width="100" align="right">
                                    <div class="sep5"></div>
									<?php next_posts_link('&laquo; 上一页') ?>
                                    <div class="sep5"></div> 
                                </td>
                        </tr></tbody></table>                    
					</div>
				</div>
				<?php else : ?>
					<div class="box">
						<div class="cell">
							<span class="fade" style="line-height: 200%;">似乎你寻找的东西在这个地方并不存在，或许你可以换个关键词搜索一下看，没准能找到你想要的东西，不过，这玩意儿谁能说的准呢 :) </span>
						</div>
						<div class="inner">
							<?php get_search_form(); ?>
						</div>
					</div>
					
				<?php endif; ?>
				
			</div> 
		<div class="c"></div> 
		</div> 
    </div>
	<!-- Main Ends -->
	<?php get_footer(); ?>