	<div id="sidebar">
			<div id="search" class="box">
				<div class="cell"><span class="fade">Search</span></div>
				<div class="inner" style="line-height: 200%;">
					<?php vf_get_search_form(); ?>
				</div>	
			</div>
			
			<div class="sep20"></div>
			
			<div class="box">
				<div class="cell"><span class="fade">Category</span></div>
				<div class="inner" style="line-height: 200%;">
					<ul>
						<?php wp_list_categories('orderby=name&title_li='); ?> 
					</ul>
				</div>	
			</div>
			
			<div class="sep20"></div>
			
			<div class="box">
				<div class="inner">
				<script type="text/javascript"><!--
google_ad_client = "ca-pub-4416392246250307";
/* Code.Tuoniao */
google_ad_slot = "5578378713";
google_ad_width = 250;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
				</div>
			</div>
			
			<div class="sep20"></div>
			
			<div id="meta" class="box">
				<div class="cell"><span class="fade">Meta</span></div>
				<div class="inner" style="line-height: 200%;">
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</div>
			</div>
	</div>

