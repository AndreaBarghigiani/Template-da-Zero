<?php get_header(); ?>
 
<!-- Inizio Content -->
    <div id="main" role="main">

      <?php get_template_part( 'content', 'single' ); ?>
   		   
   		<?php comments_template(); ?>
    </div>
<!-- Fine Content -->
	
	
<?php get_sidebar( 'singola' ); ?>
 
<?php get_footer(); ?>