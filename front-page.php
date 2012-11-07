<?php get_header(); ?>
 	
 	
 	<!-- Inizio Slider -->
 		<?php get_template_part( 'slider', 'articoli' ); ?>
 	<!-- Fine Slider -->
 	
<!-- Inizio Content -->
    <div id="main" role="main">
 
 		<?php
		    $loop = new WP_Query( 'category_name=parent-category-i&posts_per_page=1' );
		    while( $loop->have_posts() ) : $loop->the_post();
		?>
			<h3>Categoria Parent Category I</h3>
		    <div class="parent-i">
		        <?php the_title(); ?>
		    </div>
		<?php
		    endwhile;
		    wp_reset_query();
		?>
		 
		<!-- Mostro Parent Category II -->
		<h3>Categoria Parent Category II</h3>
		<?php
		    $loop = new WP_Query( 'category_name=parent-category-ii&posts_per_page=2' );
		    while( $loop->have_posts() ) : $loop->the_post();
		?>
			
		    <div class="parent-ii">
		        <?php the_title(); ?>
		    </div>
		<?php
		    endwhile;
		    wp_reset_query();
		?>
		 
		<!-- Mostro Parent Category III -->
		<?php
		    $loop = new WP_Query( 'category_name=parent-category-iii&posts_per_page=1' );
		    while( $loop->have_posts() ) : $loop->the_post();
		?>
			<h3>Categoria Parent Category III</h3>
		    <div class="parent-iii">
		        <?php the_title(); ?>
		    </div>
		<?php
		    endwhile;
		    wp_reset_query();
		?>
 
 
    </div>
<!-- Fine Content -->
 
<?php get_sidebar(); ?>
 
<?php get_footer(); ?>