<?php get_header(); ?>

<!-- Inizio Content -->
		<div id="main" role="main">
		   <?php if (have_posts()) : while (have_posts()) : the_post(); ?> 	
		  
		   	<article>
			  	<header>
			    	<h3><?php the_title(); ?></h3>
			    	
			    	
					<div class="meta">
					  <time datetime="<?php the_date( 'c' ); ?>" pubdate>
					    <?php the_time( get_option('date_format') ); ?>
					  </time>
					
					  <span class="autore">
					    Scritto da: <?php the_author_link(); ?>
					  </span>
					
					  <span class="cat">
					    Categorie: <?php the_category( ',' ); ?>
					  </span>
					</div>
			    	
			  	</header>
			 
			  	<section class="contenuto-art">
			    	<?php the_content( "Continua a Leggere" ); ?>
			  	</section>
			 
			  	<footer>
			    	<?php the_tags('Etichette', ', ', '.'); ?>
			  	</footer>
			</article>
			
			<?php endwhile; else: ?>

			  <!-- Aggiungere un messaggio di errore -->
			
			<?php endif; ?>
		</div>
<!-- Fine Content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
