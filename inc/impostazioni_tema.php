<?php

/*
* Questo file mi permettera' di creare le opzioni necessarie per creare il pannello di impostazioni del tema
*/

function pagina_impostazioni_tema_cb(){
	
   $pagina_impostazioni= add_theme_page(
       __('Pagina Impostazioni Tema', 'templatezero'), // Nome della Pagina
       __('Impostazioni Tema', 'templatezero'), //Voce menu
       'administrator', //Capacità richiesta
       __FILE__, // Slug della pagina, utilizziamo __FILE__ per dare uno slug unico
       'impostazioni_tema_cb' // Funzione incaricata di creare il layout della pagina
   );

}

function impostazioni_tema_cb(){
?>
    <div class="wrap">
        <div class="icon32" id="icon-options-general"><br /></div>
        <h2>La Pagina Impostazioni per il Mio Tema</h2>
        <p>Un p&ograve; di testo descrittivo per le nostre opzioni.</p>
        <form action="options.php" method="post" enctype="multipart/form-data">
            <?php settings_fields( 'opt_impostazioni_tema' ); ?>
            <?php do_settings_sections( __FILE__ ); ?>
            <p class="submit">
                <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e( 'Salva Cambiamenti' ); ?>" />
            </p>
        </form>
    </div>
<?php
}

//Registro le nostre impostazioni, la sezione e i suoi campi
function impostazioni_tema_init_cb(){
    register_setting( 'opt_impostazioni_tema', 'opt_impostazioni_tema', 'validazione_impostazioni_tema' );
    add_settings_section( 'main_section', 'Sezione Principale', 'testo_sezione_cb', __FILE__ );
    add_settings_field( 'logo', 'Logo', 'carico_logo_cb', __FILE__, 'main_section' );
}

function testo_sezione_cb(){
  echo "<p>Da qui puoi vedere il logo caricato.</p>";
  $options = get_option('opt_impostazioni_tema');
  
  if ( isset( $options['logo'] ) ) {
      echo "<img src='{$options['logo']}' />";
  }
  
}

function carico_logo_cb(){
	echo '<p>Carica qui il tuo file:</p>';
   echo '<input type="file" name="logo" />';
}

function validazione_impostazioni_tema( $input ){
    //echo "<pre>"; print_r( $_FILES ); echo "</pre>";
    foreach( $_FILES as $image ){
        // Controllo che sia stato effettivamente inviato un file
        if( $image['size'] ){
            if ( preg_match('/(jpg|jpeg|png|gif)$/i', $image['type'] ) ){
                $sovrascrivi = array('test_form' => false );
                $file = wp_handle_upload( $image, $sovrascrivi );

                $input['logo'] = $file['url'];
            } else {
                wp_die( 'Nessuna immagine e&amp;grave; stata caricata' );
            }
        } else {
            // Questo codice viene lanciato se non viene caricata nessuna immagine
            $opzioni = get_options('opt_impostazioni_tema');
            $input['logo'] = $opzioni['logo'];
        }
    }
    return $input;
}

add_action( 'admin_init', 'impostazioni_tema_init_cb' );

add_action('admin_menu', 'pagina_impostazioni_tema_cb');










