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
	
	// Attivo le immagini in evidenza
	add_theme_support('post-thumbnails');
	
	// Le dimensioni per l'immagine slider
	add_image_size( 'slider-img', 500, 300, true );
	
	set_post_thumbnail_size( 500, 300, true );
	
	// Carico gli script per lo Slider
	
	// Aggiungo la funzione tz_init() all'Action Hook wp_enqueue_script
	add_action( 'wp_enqueue_scripts', 'tz_init' );
	
	// Adesso creo la funzione tz_init()
	function tz_init(){
		
		// Creo una variabile per salvare la posizione del tema
		$theme_url = get_template_directory_uri();
		// Registro il mio codice JS per far andare lo slider
		wp_register_script( 'tz-slider', "$theme_url/js/tz_slider.js", array( 'jquery' ), '0.0.1', false );
		
		// Dico a WordPress di includere questi file
		wp_enqueue_script('jquery');
		wp_enqueue_script('tz-slider');
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	