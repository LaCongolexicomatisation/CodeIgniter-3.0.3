insert into ville (nomVille,codePostal)
values("Belfort",90000);

insert into adulte(nom,prenom,login,motDePasse,adresseMail,idVille,rang)
VALUES ("admin","admin","admin","admin","adresse@hotmail.fr",1,0);

insert into niveau(niveau)
VALUES("CP"),("CE1");

insert into classe(nom,professeur,idNiveau)
VALUES ("CP1","Deshinkel",1);

insert into enfant (nomEnfant,prenomEnfant,dateDeNaissance,idClasse)
VALUES ("nomEnfant","prenomEnfant",'1995-06-19',1);

insert into theme (nomTheme)
values ("Cirque");

insert into activite (nomActivite,descriptionActivite,idTheme)
VALUES ("Diabolo","Apprentisage du diabolo",1);

insert into tarifs(idActivite,tarifs)
VALUES (1,15);

insert into agenda (idActivite,dateDebutActivite,dateFinActivite,jour,horaireDebutActivite,horaireFinActivite)
VALUES (1,'2015-11-23 00:00:01','2015-12-23 23:59:59',1,'17:00:00','18:00:00');

insert into inscription(idEnfant,idActivite,dateDebutInscription,dateFinInscription,valideInscription)
VALUES (1,1,'2015-11-23 08:00:00','215-11-23 09:00:00',true);

insert into autoriseModif (idAdulteResponsable,idEnfant)
values(1,1);

