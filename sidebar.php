<!-- Inizio Sidebar -->
		<aside>
			<?php if ( !dynamic_sidebar( 'principale-sidebar' ) ) : ?>
		 	<div class="widget search">
			    <?php get_search_form(); ?>
	      </div>
			
			<div class="widget rss">
			    <a href="<?php bloginfo('rss2_url'); ?>">Iscriviti al Feed</a>  
			</div>
			
			<div class="widget cat_list">
			    	<h4><?php _e('Lista Categorie', 'templatezero'); ?></h4>
    				<ul>
    					<?php wp_list_categories( 'title_li=' ); ?>
    				</ul>
			</div>
			
			<div class="widget archivio">
			    <h4><?php _e('Archivio Articoli', 'templatezero'); ?></h4>
    			<ul>
        			<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>     
    			</ul>
			</div>
			<?php endif; ?>
		</aside>
<!-- Fine Sidebar -->