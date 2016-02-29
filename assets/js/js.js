var nbParent = 0;
var formulaireAjoutParent = ["nom", "prenom", "mail", "ville"];
var baseurl = setBaseUrl();

function setBaseUrl(){
    var url = location.href;
    var split = url.split('/');
    var resultat = "";
    
    for(var i = 0; i < url.length; i++){
        if(split[i] !== "index.php")
            resultat += split[i] + '/';
        else
            break;
    }
    return resultat;
}

function nouveauParent(){
	var div = document.getElementById("parents");

	var divInsertion = document.createElement("div");
	divInsertion.setAttribute('id', 'ajoutParent' + nbParent);

	div.appendChild(divInsertion);

	$("#ajoutParent" + nbParent).load(baseurl + "application/views/template/ajoutParent.html");
	nbParent += 1;
}

function parentExistant(){
    var xhr = new XMLHttpRequest();;
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            createHtmlParentExistant(xhr.responseText);
            changeName("exist");
            nbParent += 1;
        }
    };
    xhr.open("POST", baseurl + "index.php/gestionEnfant/rechercheParent", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("autorisation=1"); 
}

function createHtmlParentExistant(resultat){
    splitAdulte = resultat.split(",");
    var div = document.getElementById("parents");

    var divInsertion = document.createElement("div");
    divInsertion.setAttribute('id', 'parentExistant' + nbParent);

    var select = document.createElement("select");
    select.setAttribute('name', "nom-prenom");
    select.setAttribute('id', 'changeName');
    select.setAttribute('size', 1);
    
    for(var i = 0; i < splitAdulte.length; i++){
        var option = document.createElement("option");
        option.innerHTML = splitAdulte[i];
        select.appendChild(option);
    }
    
    var buttonSupprimer = document.createElement("button");
    buttonSupprimer.innerHTML = "Supprimer";
    buttonSupprimer.setAttribute('onclick', 'supprimerElement(this)');
    
    divInsertion.appendChild(select);
    divInsertion.appendChild(buttonSupprimer);
    div.appendChild(divInsertion);
}

function changeName(type){
	if(type == "exist"){
		$("#changeName").attr('name', 'parentExistant' + nbParent)
			.attr('id', 'selector' + nbParent);
	}else if(type == "new"){
		var elements = document.getElementsByName("generator");
		var index = 0;

		while(elements.length > 0){
			elements[0].setAttribute('name', formulaireAjoutParent[index] + "NouveauParent" + (nbParent - 1));
			index += 1;
		}
	}
}

function supprimerElement(element){
	var divASupprimer = element.parentElement;
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
                            window.location = baseUrl + 'index.php/activites/gestionActivites';
                    },
                    error:function(error){
                            console.log(error.responseText);
                    }
            });
	}
}

function supprimerParent(id,nom,baseUrl){
    if(confirm('Voulez vous vraiment supprimer l\'utilisateur '+nom))
    {
        $.ajax({
            type: "POST",
            data: {idSuppUtilisateur: id},
            url: baseUrl + "index.php/gestionParent/suppParent",
            success: function(output) {
                window.location = baseUrl + 'index.php/activites/gestionActivites';
            },
            error:function(error){
                console.log(error.responseText);
            }
        });
    }
}