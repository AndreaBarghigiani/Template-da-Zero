<?php

/*
 * In questo file posso inserire tutti le mie personalizzazioni,
 * ma per una miglior consultazione andro' a collegare i file esterni
 * per compiti specifici.
 */
 
 /* 
  * Richiamo il file che mi permettera'
  * di aggiungere personalizzazioni da parte dell'utente
  */
  
  	require_once( 'inc/impostazioni_tema.php');
  
	// Rendo il tema disponibile alle traduzioni
	// Le traduzioni potranno essere trovate dentro la cartella /languages/
	function localizzo_tema(){
	
		load_theme_textdomain( 'templatezero', TEMPLATEPATH . '/languages' );
	
		$locale = get_locale();
	
		$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	
		if ( is_readable($locale_file) ) require_once($locale_file);
	}
	
	add_action( 'after_setup_theme', 'localizzo_tema' );
	
	// Creo il mio primo menu
	if( function_exists( 'register_nav_menu' ) ){
		register_nav_menu( 'principale', 'Header Menu' );
	}
	
	function zero_widget_area(){
	    register_sidebar(
	        array(
	            'name' => 'Sidebar Principale',
	            'id' => 'principale-sidebar',
	            'before_widget' => '<div id="%1$s" class="widget %2$s">',
	            'after_widget' => '</div>',
	            'before_title' => '<h4>',
	            'after_title' => '</h4>'
	       )
	   );
		
		//Messaggio Benvenuto
		register_sidebar(
		  array(
		    'name' => 'Messaggio Benvenuto',
		    'id' => 'benvenuto',
		    'before_widget' => '<div id="benvenuto">',
		    'after_widget' => '</div>',
		    'before_title' => '<h3>',
		    'after_title' => '</h3>'
		  )
		);
		 
		//Sidebar Singola Pagina
		register_sidebar(
		  array(
		    'name' => 'Sidebar Singola',
		       'id' => 'sidebar-singola',
		       'before_widget' => '<div id="%1$s" class="widget %2$s">',
		       'after_widget' => '</div>',
		       'before_title' => '<h4>',
		       'after_title' => '</h4>'
		  )
		);
		 
		//Sezione Footer
		register_sidebar(
		  array(
		    'name' => 'Footer',
		       'id' => 'area-footer',
		       'before_widget' => '<div id="%1$s" class="widget %2$s">',
		       'after_widget' => '</div>',
		       'before_title' => '<h4>',
		       'after_title' => '</h4>'
		  )
		);
	}
	 
	add_action( 'widgets_init', 'zero_widget_area');
	
	
	/* Mostra Commenti */
	function tz_comment_list( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
		?>
			<li>Caso Pingback o Trackback</li>
		<?php
			break;
			default :
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<article class="comment">
				<div class="comment-info">
					<p class="comment-auth">
						<?php comment_author_link(); ?>
					</p>
					<time class="comment-time" pubdate datetime="<?php get_comment_date( 'c' ); ?>">
						<?php comment_time('j F, Y'); ?>
					</time>
		
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<em class="comment-awaiting-moderation"><?php _e( 'Il tuo commento sta aspettando la moderazione.', 'am_template' ); ?></em>
							<br />
					<?php endif; ?>
		
				</div><!-- .comment-info -->
		
				<p><?php comment_text(); ?></p>
		
			</article><!-- .comment -->
		
		</li>
		<?php
			break;
			endswitch;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	