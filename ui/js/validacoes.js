var numHoras = 0;
var sequenciaHoras = 0;
var horasDia = 0;
var checks = 0;

function contaChecks(){
	checks = $(".checkHora:checked").length;
}

function limiteHoras(ultimoClicado){
	var horasDisponiveis = (numHoras-checks);
	if(horasDisponiveis>0){
		$("#tdHoras").html("Horas<br />" + horasDisponiveis).css("color","#000000");	
	}
	else if(checks>0){
		$("#tdHoras").html("Horas<br />" + horasDisponiveis).css("color","#CD2626");
		if(horasDisponiveis<0){
			$("#"+ultimoClicado).attr("checked",false);
			$("#lightboxerro").html('Você não deve ultrapassar as horas de seu regime de trabalho.<span class="red_button">OK</span>');
			lightpanelimage();
			mostraInput();
			checks = $(".checkHora:checked").length;
			horasDisponiveis = (numHoras-checks);
			$("#tdHoras").html("Horas<br />" + horasDisponiveis).css("color","#CD2626");
		}
	}
}

function limiteIntervalo(coluna, ultimoClicado){
	for(var i=7;i<=16;i++){
		if($("#"+coluna+[i]).attr("checked") == "checked"){
			sequenciaHoras++;
			if(sequenciaHoras>6){
				$("#"+ultimoClicado).attr("checked",false);
				$("#lightboxerro").html('Você não pode marcar mais de 6 horas na sequência.<span class="red_button">OK</span>');
				lightpanelimage();
				mostraInput();
				sequenciaHoras = 0;
			}
		}
		else{
			sequenciaHoras = 0;
		}
	}
	
	sequenciaHoras = 0;
}

function limiteDia(coluna, ultimoClicado){

	if(coluna != "qua"){
		var limite = 9;
	}
	else{
		var limite = 10;
	}
	for(var i=1;i<=16;i++){
		if($("#"+coluna+[i]).attr("checked")=="checked"){
			horasDia++;
			if(horasDia > limite){
				$("#"+ultimoClicado).attr("checked",false);
				$("#lightboxerro").html('Você não pode marcar mais de ' + limite + ' horas neste dia.<span class="red_button">OK</span>');
				lightpanelimage();
				mostraInput();
			}
		}
	}
	horasDia = 0;
}

function mostraInput(){
	for(var i=1;i<=16;i++){ 
		if($("#seg"+[i]).attr("checked") == "checked"){
			$("#atvSeg"+[i]).show(0);
		}
		else{
			$("#atvSeg"+[i]).hide(0);
		}
	}
	for(var i=1;i<=16;i++){ 
		if($("#ter"+[i]).attr("checked") == "checked"){
			$("#atvTer"+[i]).show(0);
		}
		else{
			$("#atvTer"+[i]).hide(0);
		}
	}
	for(var i=1;i<=16;i++){ 
		if($("#qua"+[i]).attr("checked") == "checked"){
			$("#atvQua"+[i]).show(0);
		}
		else{
			$("#atvQua"+[i]).hide(0);
		}
	}
	for(var i=1;i<=16;i++){ 
		if($("#qui"+[i]).attr("checked") == "checked"){
			$("#atvQui"+[i]).show(0);
		}
		else{
			$("#atvQui"+[i]).hide(0);
		}
	}
	for(var i=1;i<=16;i++){ 
		if($("#sex"+[i]).attr("checked") == "checked"){
			$("#atvSex"+[i]).show(0);
		}
		else{
			$("#atvSex"+[i]).hide(0);
		}
	}
	for(var i=1;i<=12;i++){ 
		if($("#sab"+[i]).attr("checked") == "checked"){
			$("#atvSab"+[i]).show(0);
		}
		else{
			$("#atvSab"+[i]).hide(0);
		}
	}
}

function selecionaAula(){
	for(var i=1;i<=16;i++){ 
		if(($("#seg"+[i]).attr("checked") == "checked") && ($("#atvSeg"+[i]).attr("value") == "")){
			$("#lightboxerro").html('Selecione todas as aulas.<span class="red_button">OK</span>');
			lightpanelimage();
			e.preventDefault();
		}
	}
	for(var i=1;i<=16;i++){ 
		if(($("#ter"+[i]).attr("checked") == "checked") && ($("#atvTer"+[i]).attr("value") == "")){
			$("#lightboxerro").html('Selecione todas as aulas.<span class="red_button">OK</span>');
			lightpanelimage();
			e.preventDefault();
		}
	}
	for(var i=1;i<=16;i++){ 
		if(($("#qua"+[i]).attr("checked") == "checked") && ($("#atvQua"+[i]).attr("value") == "")){
			$("#lightboxerro").html('Selecione todas as aulas.<span class="red_button">OK</span>');
			lightpanelimage();
			e.preventDefault();
		}
	}
	for(var i=1;i<=16;i++){ 
		if(($("#qui"+[i]).attr("checked") == "checked") && ($("#atvQui"+[i]).attr("value") == "")){
			$("#lightboxerro").html('Selecione todas as aulas.<span class="red_button">OK</span>');
			lightpanelimage();
			e.preventDefault();
		}
	}
	for(var i=1;i<=16;i++){ 
		if(($("#sex"+[i]).attr("checked") == "checked") && ($("#atvSex"+[i]).attr("value") == "")){
			$("#lightboxerro").html('Selecione todas as aulas.<span class="red_button">OK</span>');
			lightpanelimage();
			e.preventDefault();
		}
	}
	for(var i=1;i<=16;i++){ 
		if(($("#sab"+[i]).attr("checked") == "checked") && ($("#atvSab"+[i]).attr("value") == "")){
			$("#lightboxerro").html('Selecione todas as aulas.<span class="red_button">OK</span>');
			lightpanelimage();
			e.preventDefault();
		}
	}
}

$(document).ready(function(){
	$('#dados-pessoais  table  tr:even').css('background-color','#EEEEE0');
	if(($("input[name=regime]").is(":checked"))){
		$('input:radio[name=regime]').each(function() {	                
			if ($(this).is(':checked'))
				regimeMarcado = $(this).val();
		});
		marcaRegime(regimeMarcado);
	}
	mostraInput();
	contaChecks();
	limiteHoras();
	$(".checkHora").change(function(){
			if(!($("input[name=regime]").is(":checked"))){
				var checkHora = "#" + $(this).attr("id");
				$(checkHora).attr("checked",false);
				$("#lightboxerro").html('Marque o regime de trabalho.<span class="red_button">OK</span>');
				lightpanelimage();
			}
			mostraInput();
			limiteIntervalo($(this).attr("id").substr(0,3), $(this).attr("id"));
			limiteDia($(this).attr("id").substr(0,3), $(this).attr("id"));
			contaChecks();
			limiteHoras($(this).attr("id"));
	});
	
	$("input[name=regime]").change(function(){
		var regimeMarcado = $(this).attr("value");
		marcaRegime(regimeMarcado);
	});
	
	$("#form-for").submit(function(e) {
		if(!($("input[name=regime]").is(":checked"))){
			$("#lightboxerro").html('Preencha sua FOR.<span class="red_button">OK</span>');
			lightpanelimage();
			e.preventDefault();
		}
		else{
			if(numHoras-checks > 0){
				$("#lightboxerro").html('Marque todas as horas do seu regime de trabalho.<span class="red_button">OK</span>');
				lightpanelimage();
				e.preventDefault();
			}
			else if(numHoras-checks < 0){
				$("#lightboxerro").html('Você não deve ultrapassar as horas do seu regime de trabalho.<span class="red_button">OK</span>');
				lightpanelimage();
				e.preventDefault();
			}
		}
		selecionaAula();
	});
	$('#lancar-for').click(function(){
		data = new Date();
		ano = data.getFullYear();
		$("#lightboxerro").html('<form method="POST" action=""><table style="margin:20px 20px 0 20px;"><tr><td>Ano:</td><td style="vertical-align:middle;"><select name="ano" style="font-family: Arial, Helvetica, sans-serif;"><option  value="'+(ano-3)+'">'+(ano-3)+'</option><option  value="'+(ano-2)+'">'+(ano-2)+'</option><option  value="'+(ano-1)+'">'+(ano-1)+'</option><option selected="selected" value="'+ano+'">'+ano+' </option><option  value="'+(ano+1)+'">'+(ano+1)+'</option><option  value="'+(ano+2)+'">'+(ano+2)+'</option><option  value="'+(ano+3)+'">'+(ano+3)+'</option></select></td><td style="vertical-align:middle; padding:0 0 0 20px;"><select name="semestre" style="font-family: Arial, Helvetica, sans-serif;"><option value="1" >1º</option><option value="2" >2º</option></select></td><td>Semestre</td><td style="padding:0 0 0 10px;"><input type="submit" name="lancar" value="Lançar" /></td></tr></table></form>');
		$("#lightboxerro").css({'background':'#FFF','border-color':'silver','color':'#000'});
		lightpanelimage();
	});
});

function marcaRegime(regimeMarcado){
	var regime = regimeMarcado;
	$("#msgRegime").text("").css("color","#000000");
	if(regime == "40" || regime == "rde" ){
		numHoras = 32;
	}
	else if(regime == "20"){
		numHoras = 16;
	}
	limiteHoras();
}


 function lightpanelimage() {
	$("#lightpanel").fadeIn(500);
    $("#lightpanel").css("display","table");
    $("#tablecell").css("display","table-cell");
	$("#lightboxerro").delay(400).fadeIn(500);
    $("#lightboxerro").css("display","inline-block");
		
	$("#lightpanel").click(function(){
		$("#lightpanel").fadeOut(400);
		$("#lightpanel").children().hide();
	});
      
	$(".red_button").click(function(){
		$("#lightpanel").fadeOut(400);
		$("#lightpanel").children().hide();
	});
    $("#lightboxerro").click(function(event){
		event.stopPropagation();
	});    
}