$(document).ready(function(){

	// Fonction pour dérouler le menu des reservations validées
	$('#valide').click(function(){
		// Le dérouler s'il n'est pas invisible
		if($('#table_valide').css('display') == 'none') {
			$('#table_valide').fadeIn();
			$('#valide').val("-");
		}
		// Sinon l'enrouler
		else {
			$('#table_valide').fadeOut();
			$('#valide').val("+");
		}
	});

	// Fonction pour dérouler le menu des reservations en attente
	$('#reserv').click(function(){
		// Le dérouler s'il n'est pas invisible
		if($('#table_reserv').css('display') == 'none') {
			$('#table_reserv').fadeIn();
			$('#reserv').val("-");
		}
		// Sinon l'enrouler
		else {
			$('#table_reserv').fadeOut();
			$('#reserv').val("+");
		}
	});
	
});
