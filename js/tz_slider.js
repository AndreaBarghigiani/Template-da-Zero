// alias di jQuery per evitare conflitti
var $j = jQuery.noConflict();

// variabile di controllo per vedere quale #content-x viene visto
var i = 2;
$j(function(){
	
	// Imposto un intervallo per eseguire l'animazione
	var automatico = setInterval( function(){
		if( i == 4) i = 1;
		
		// creo alcune variabili di controllo
		var attivo = $j( '#container-slider .active'),
		prox = 'content-'+i;
		
		// se raggiungo il limite, parto dall'inizio
		if( prox == 'content-4') prox = 'content-1';
		
		// sparisce l'articolo attivo
		$j(attivo).fadeOut(500);
		
		// appare il prossimo articolo
		$j('#' + prox).delay(500).fadeIn(1500);	
		
		// funzione che mi serve per aggiungere/togliere la classe .active
		// dopo un corretto lasso di tempo, altrimenti l'animazione non funge...
		setTimeout( function(){
			$j('#' + prox).addClass('active');
			$j( attivo ).removeClass('active');	
		}, 1000);
		
		// incremento la variabile di controllo
		i++;
	}, 6000); // intervallo impostato a 6000 ms

});
