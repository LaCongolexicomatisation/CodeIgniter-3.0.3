var nbParent = 0;
var formulaireAjoutParent = ["nom", "prenom", "mail", "rang", "ville"];

function nouveauParent(){
	var div = document.getElementById("parents");

	var divInsertion = document.createElement("div");
	divInsertion.setAttribute('id', 'ajoutParent' + nbParent);

	div.appendChild(divInsertion);

	$("#ajoutParent" + nbParent).load("/CodeIgniter-3.0.3/application/views/template/ajoutParent.html");
	nbParent += 1;
}

function parentExistant(){
	var div = document.getElementById("parents");

	var divInsertion = document.createElement("div");
	divInsertion.setAttribute('id', 'parentExistant' + nbParent);

	div.appendChild(divInsertion);

	$("#parentExistant" + nbParent).load('/CodeIgniter-3.0.3/application/views/template/parentExistant.html');
	nbParent += 1;
}

function changeName(type){
	if(type == "exist"){
		$("#changeName").attr('name', 'parentExistant' + nbParent)
			.attr('id', 'selector' + nbParent);
	}else if(type == "new"){
		var elements = document.getElementsByName("generator");
		var index = 0;

		while(elements.length > 0){
			elements[0].setAttribute('name', formulaireAjoutParent[index] + "Parent" + (nbParent - 1));
			index += 1;
		}
	}
}

function supprimerElement(element){
	var divASupprimer = element.parentElement.parentElement;
	var divParent = divASupprimer.parentElement;
	divParent.removeChild(divASupprimer);
}

function changeTheme(element){
	if(element.options[element.selectedIndex].value==-1){
		document.getElementById("ajoutTheme").style.visibility='visible';
	}
	else{
		document.getElementById("ajoutTheme").style.visibility='hidden';
	}
}


function supprimerActivite(id,nom,baseUrl){
	if(confirm('Voulez vous vraiment supprimer l\'activite '+nom))
	{
		$.ajax({
			type: "POST",
			data: {idSuppActivite: id},
			url: baseUrl + "index.php/activites/suppActivite",
			success: function(output) {
				window.location = baseUrl+'index.php/activites/gestionActivites';
			},
			error:function(error){
				console.log(error.responseText);
			}
		});
	}
}