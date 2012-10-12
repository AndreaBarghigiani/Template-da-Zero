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