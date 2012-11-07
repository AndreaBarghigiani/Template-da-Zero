<!-- Creo il contenitore per lo slider -->
<div class="mask">
	<div id='container-slider'>
		
		<!-- Creo il Loop per lo slider -->
		<?php
			// Importante per impostare gli id che conterranno gli articoli
			$i = 1;
			
			// I parametri da passare a WP_Query() 
			$args = array(	//Al suo interno seleziono: 
				'category_name' => 'slider', // la categoria di interesse
				'post_per_page' => 3, // il numero di articoli massimo
				'order' => 'ASC' // e ordino i risultati in base alla data
			);
			
			//La variabile che conterra' la nuova richiesta per il Loop
			$loop = new WP_Query( $args );
			
			// Apriamo il Loop con il classico while e 
			// le funzioni collegate alla richiesta racchiusa in $loop
			while ( $loop->have_posts() ) : $loop->the_post();
		?>
		
		<div id="content-<?php echo $i; ?>" class="section animated <?php if( $i == 1 ) echo 'active'; ?>">
			
			<!-- Aggiungo img in evidenza con misure 500x300 -->
			<?php the_post_thumbnail( 'slider-img' ); ?>
			
			<!-- Aggiungo il titolo -->
			<h2><?php the_title(); ?></h2>
			
			<!-- Aggiungo il riassunto -->
			<div class="riassunto">
				<?php the_excerpt(); ?>
			</div>
		
		</div>
		<?php
			$i++;
			endwhile;
		   wp_reset_query();
		?>
	
	</div><!-- Fine #container-slider -->
</div><!-- Fine .mask -->