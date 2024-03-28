CREATE TYPE EnumTypeEtablissement AS ENUM  ( 
	'université','lycée général','lycée professionnel',
	'collège','école primaire', 'maternelle', 
	'établissement médico-sociaux', 'établissement pénitentiaire');
					 
CREATE TYPE EnumTypeLangue AS ENUM (
	'FR','US','EN','ES','CHN','JPN','RU','AR','GR');

CREATE TYPE EnumNiveauLangue AS ENUM (
	'A1','A2','B1','B2','C1','C2');

CREATE TYPE EnumTypeEtat AS ENUM (
	'Programmée','En attente','Annulée','Remplacée');

CREATE TYPE EnumPublicCible AS ENUM (
	'jeune', 'jeune adulte','adulte','enfant','tout public');


CREATE TYPE EnumGenreLitteraire AS ENUM (
	'roman', 'thriller','science-fiction',
	'fantasy','poème','littérature','bandes dessinées');

CREATE TABLE Langue(
	idLangue serial PRIMARY KEY, 
	nomLangue type EnumTypeLangue, 
	niveauLangueEcrit type EnumNiveauLangue, 
	niveauLangueParle type EnumNiveauLangue);

CREATE TABLE Accompagnateur(
	idAccompagnateur serial PRIMARY KEY, 
	nomAccompagnateur varChar(30) not null, 
	prenomAccompagnateur varChar(30) not null, 
	loginAccompagnateur varChar(30) not null,  -- pseudo
	motDePasseAccompagnateur varChar(30) not null, 
	emailAccompagnateur varChar(50) not null, 
	dateInscriptionAcommpagnateur date, 
	dateNaissanceAcommpagnateur date, 
	telAcommpagnateur integer, 
	adresseAccompagnateur varChar(50));
	
CREATE TABLE Interprete(
	idInterprete serial PRIMARY KEY, 
	nomInterprete varChar(30) not null, 
	prenomInterprete varChar(30) not null, 
	loginInterprete varChar(30) not null, 
	motDePasseInterprete varChar(30) not null, 
	emailInterprete varChar(50) not null, 
	dateInscriptionInterprete date, 
	dateNaissanceInterprete date, 
	telInterprete integer, 
	adresseInterprete varChar(50)); 

CREATE TABLE Etablissemnt ( 
	idEtablissement serial PRIMARY KEY, 
	mailEtablissement varChar(30) not null, 
	typeEtablissement type EnumTypeEtablissement, 
	nomEtablissement varChar(50) not null, 
	adresseEtablissement varChar(50), 
	nombreParticipant integer ); 
	
CREATE TABLE Oeuvre(
	idOeuvre serial PRIMARY KEY, 
	titre varchar(200) not null, 
	editionOeuvre varChar(50), 
	descriptionOeuvre text not null, 
	publicCible text, -- un enum ou pas ? si oui: publicCible type EnumPublicCible,
	prixLitteraire varChar(50) null, 
	anneePublication date, 
	genreLitteraire varChar(50)); -- un enum ou pas ? si oui: genreLitteraire type EnumGenreLitteraire,
	
CREATE TABLE Auteur (
	idAuteur serial constraint pk_Auteur PRIMARY KEY,
	idOeuvre int not null,
	nomAuteur varChar(30) not null, 
	prénomAuteur varChar(30) not null, 
	loginAuteur varChar(30) not null, 
	motDePasseAuteur varChar(30) not null,
	emailAuteur varChar(50) not null,  
	DateInscriptionAuteur date, 
	DateNaissanceAuteur date, 
	telAuteur integer, 
	adresseAuteur varChar(50), 
	FOREIGN KEY (idOeuvre) REFERENCES Oeuvre(idOeuvre));
 
CREATE TABLE Referent (
	idReferent serial PRIMARY KEY,
	nomReferent varChar(30) not null, 
	prénomReferent varChar(30) not null,
	emailReferent varChar(50) not null,
	telReferent integer;

CREATE TABLE Voeux (
	idVoeux serial PRIMARY KEY,
	idEtablissement int not null,
	dateEnvoie date,
	prioriteVoeux int not null CHECK (prioriteVoeux in ('1','2','3')),
 	FOREIGN KEY (idReferent) REFERENCES Referent(idReferent),
	FOREIGN KEY (idEtablissement) REFERENCES Etablissement(idEtablissement));

CREATE TABLE Edition ( 
	idEdition serial PRIMARY KEY, 
	dateDebuteEdition date not null, 
	dateFinEdition date not null, 
	anneeEdition date not null, 
	descriptionEditon text) ;

CREATE TABLE OuvragesSelectionnes ( 
	idOeuvre int not null, 
	idEdition int not null,
	dateSelection date,
	description text,
	quantitesOuvrageSelectionne int,
	PRIMARY KEY (idOeuvre, idEdition),
	FOREIGN KEY (idOeuvre) REFERENCES Oeuvre(idOeuvre),
	FOREIGN KEY (idEdition) REFERENCES Edition(idEdition));

CREATE TABLE Inscription(
	idInscription serial not null, 
	dateInscription date not null,
	idInterprete int not null, 
	idAuteur int not null, 
	idAccompagnateur int not null, 
	idEdition int not null,
	FOREIGN KEY (idInterprete) REFERENCES Interprete(idInterprete),
	FOREIGN KEY (idAuteur) REFERENCES Auteur(idAuteur),
	FOREIGN KEY (idEdition) REFERENCES Edition(idEdition),
	FOREIGN KEY (idAccompagnateur) REFERENCES Accompagnateur(idAccompagnateur));

CREATE TABLE Intervention( 
	idIntervention serial PRIMARY KEY, 
	dureeIntervention time not null, 
	dateDebutIntervention date time not null, 
	dateFinIntervention date time not null, 
	lieuIntervention varchar(50), 
	etatIntervention type EnumTypeEtat,
	idInterprete int not null, 
	idAuteur int not null, 
	idAccompagnateur int not null,  
	idEdition int not null,
	FOREIGN KEY (idInterprete) REFERENCES Interprete(idInterprete),
	FOREIGN KEY (idAuteur) REFERENCES Auteur(idAuteur),
	FOREIGN KEY (idEdition) REFERENCES Edition(idEdition),
	FOREIGN KEY (idAccompagnateur) REFERENCES Accompagnateur(idAccompagnateur));

CREATE TABLE SAUVEGARDE(
	idSauvegarde serial PRIMARY KEY, 
	tauxDeParticipation DECIMAL(10,2) not null, 
	nombreDeParicipantPresentParIntervention int not null, 
	annee date not null, 
	idEdition int not null, 
	idIntervation int not null,
	FOREIGN KEY (idEdition) REFERENCES Edition(idEdition),
	FOREIGN KEY (idIntervatio) REFERENCES Intervatio(idIntervatio);

CREATE TABLE LanguesAuteurs (
	idLangue int not null, 
	idAuteur int not null,
	FOREIGN KEY (idLangue) REFERENCES Langue(idLangue),
	FOREIGN KEY (idAuteur) REFERENCES Auteur(idAuteur));

CREATE TABLE LanguesInterprete ( 
	idLangue int not null, 
	idInterprete int not null, 
	FOREIGN KEY (idLangue) REFERENCES Langue(idLangue),
	FOREIGN KEY (idInterprete) REFERENCES Interprete(idInterprete));
	
/* La table Langue : 
	La langue avec ses attribut de niveau doit être indiqué pendant l’inscription à une édition mais pas obligatoire pendant la création de son compte ➜ statique faible 
*/
	
/* La table Oeuvre : 
	L’année de publication doit toujours être inférieure ou égale à l’année d’inscription à l’édition ➜ contrainte statique forte
	la description de l’oeuvre doit être renseigner à l’inscription ➜ statique forte 
	le public ciblé doit renseigner à l’inscription ➜ statique forte 
*/
	
/*	La table Interprète : 
	Le nom,  prénom et l'email de Interprète est obligatoire à la création de son compte ➜ statique forte
	Le numéro de téléphone peut ne pas être renseigné à la création du compte mais doit être renseigné à l’inscription à une édition ➜ statique faible
	date de naissance de l’Interprète doit être inférieur à sa date d’inscription à l'édition ➜ statique forte
	un Interprète ne peut pas être attribué à deux auteur au même moment ➜ statique forte 
	un interprète doit obligatoirement avoir 2 langues parlé et écrite de niveau C1 et ce niveau doit être justifier par un certificat officiel ➜ statique faible
	L’adresse de l'interprète peut ne pas être renseigné à la création du compte mais doit être renseigné à l’inscription à une édition ➜ statique faible
*/
	
/* La table Auteur
	Le nom, prénom et l'email de Auteur est obligatoire à la création de son compte ➜ statique forte
	Le numéro de téléphone peut ne pas être renseigné à la création du compte mais doit être renseigné à l’inscription à une édition ➜ statique faible
	date de naissance de l’Auteur  doit être inférieur à sa date d’inscription à l'édition ➜ statique forte
	le nombre d'œuvres de l’Auteur doit être supérieur ou égal à 1 à son inscription à une édition ➜ statique forte
	le nombre d’oeuvre de l’auteur peut augmenter mais pas diminuer à  l’édition ➜ dynamique forte l’auteur   
	Un auteur est limité à trois interventions par jour ➜ dynamique forte
	l’auteur peut se désister à une intervention 2 jours avant l’intervention ➜ dynamique forte
	l’auteur doit indiquer les langues qu’il maîtrise ➜ statique faible
	Une oeuvre peut être supprimée si elle ne fait pas partie d’une oeuvre sélectionnée   
*/
	
/* La table Edition
	la date début d'une édition ne doit pas être inférieur à sa date de fin ➜ statique forte 
	l’année de l’édition doit être inférieure ou égale à l’année en cours ➜ statique forte 
	pour une édition donnée, la date de début et de fin  doivent être renseignées ➜ statique forte
	la date de fin d’édition ne peut qu’augmenter ➜ dynamique forte 
*/
	
/*La table Etablissement 
	l'établissement ne peut participer à une intervention que si elle existe ➜ statique forte 
	Pour participer à une intervention, l'établissement doit être inscrit à une édition ➜ statique forte 
	Le nom,  prénom et l'email de l'établissement sont obligatoire à la création du compte ➜ statique forte
	Le numéro de téléphone, le nombre de participant ainsi que l’adresse peuvent ne pas être renseignés à la création du compte mais doivent être renseignés à l’inscription à une édition ➜ statique faible
	le nombre de participants d'un établissement ne doit pas être négatif ➜ statique forte 
	Un établissement peut participer à plusieurs interventions le même jour ➜ statique faible  
*/
	
/* La table Accompagnateur
	Le nom,  prénom et l'email de accompagnateur est obligatoire à la création de son compte ➜ statique forte
	Le numéro de téléphone peut ne pas être renseigné à la création du compte mais doit être renseigné à l’inscription à une édition ➜ statique faible
	la date de naissance de l’accompagnateur  doit être inférieur à sa date d’inscription à l'édition ➜ statique forte
	un accompagnateur ne peut pas être attribué à deux auteur au même moment ➜ statique forte
*/

/*La table Vœux
	les vœux formulés ne peuvent pas dépasser plus de 3 ➜ Statique forte
	les coordonnées d’un référent peuvent être nuls durant la sélection des vœux mais doivent être renseignés lors de l’envoi ➜ Statique faible
	La date d’envoie des vœux doit être inférieure à la date de fin de l’édition ➜ Statique forte 
	la priorité de voeux doit être inclue entre 1 et 3 ➜ Statique forte
*/

/*La table Inscription
	un participant ne peut pas s’inscrire plusieurs fois à une édition ➜ contrainte statique forte
	Les participants peuvent s’inscrire à une édition  jusqu'à la date de clôture des inscriptions ➜ statique faible.
	la date d’inscription à une édition >= date de création du compte ➜ statique forte 
*/
	
/* La table Intervention
	une intervention dure entre 2 et 4 heures ➜ contrainte dynamique forte
	dateFinIntervention >  dateDebutIntervention ➜ statique forte
	une intervention peut être annulée  en cas de désistement d’un auteur ou d’un établissement ➜ statique forte
	une intervention peut passer de l’état annulé à  remplacée➜ dynamique forte
	si une intervention est remplacée, dateDebutIntervention de la nouvelle intervention doit être supérieure à la dateDebutIntervention de l’ancienne intervention 
*/
	
/*La table Ouvrageselectiones
	La date Sélection de l’ouvrage doit être inférieur à la date de début d’édition➜ Statique forte
	Une oeuvre déjà sélectionnée ne peut pas être resélectionnée par la commission durant la même édition   ➜ Statique forte
*/

/* La table sauvegarde
	Le taux de participation doit être supérieur à 0 et inférieur à 1 ➜ Statique forte 
	l’année d’une édition doit être inférieure ou égale à l’année en cours➜  Statique forte
	le nombre de participants doit  être positif ➜  Statique forte
*/
