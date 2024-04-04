CREATE TYPE EnumTypeEtablissement AS ENUM  ( 
	'université','lycée général','lycée professionnel',
	'collège','école primaire', 'maternelle', 
	'établissement médico-sociaux', 'établissement pénitentiaire');

CREATE TYPE EnumTypeEtat AS ENUM (
	'Programmée','En attente','Annulée','Remplacée');
					 
CREATE TYPE EnumTypeLangue AS ENUM (
	'FR','US','EN','ES','CHN','JPN','RU','AR','GR');

CREATE TYPE EnumNiveauLangue AS ENUM (
	'A1','A2','B1','B2','C1','C2');

CREATE TYPE EnumPublicCible AS ENUM (
	'jeune', 'jeune adulte','adulte','enfant','tout public');

CREATE TYPE EnumGenreLitteraire AS ENUM (
	'roman', 'thriller','science-fiction',
	'fantasy','poème','littérature','bandes dessinées');
 
CREATE TYPE EnumTypeVoeux AS ENUM (
	'non validé','validé');
	
CREATE TABLE Admini (
	idAdmin serial  PRIMARY KEY,
	emailAdmin VARCHAR(50) NOT NULL check ( emailAdmin  ~ '^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$'),
	motDePasseAdmin varChar(30) not null);

CREATE TABLE Langue(
	idLangue serial PRIMARY KEY, 
	nomLangue EnumTypeLangue, 
	niveauLangueEcrit EnumNiveauLangue, 
	niveauLangueParle EnumNiveauLangue);
	
CREATE TABLE Interprete(
	idInterprete serial PRIMARY KEY, 
	nomInterprete varChar(30) not null, 
	prenomInterprete varChar(30) not null, 
	loginInterprete varChar(30) unique not null, 
	motDePasseInterprete varChar(30) not null, 
	emailInterprete VARCHAR(50) NOT NULL check ( emailInterprete  ~ '^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$'), 
	dateNaissanceInterprete date check (dateNaissanceInterprete<current_date), 
 	adresseInterprete varChar(50),
	telInterprete VARCHAR(25) check (telInterprete ~ '^\+?[0-9]{1,3}?[-.\s]?\(?[0-9]{1,3}?\)?[-.\s]?[0-9]{1,4}[-.\s]?[0-9]{1,4}[-.\s]?[0-9]{1,4}$'),
 	dateInscriptionInterprete date);

CREATE TABLE Auteur (
	idAuteur serial PRIMARY KEY,
	nomAuteur varChar(30) not null, 
	prénomAuteur varChar(30) not null, 
	loginAuteur varChar(30) not null, 
	motDePasseAuteur varChar(30) not null,
	emailAuteur varChar(50) not null check ( emailAuteur  ~ '^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$'),
	DateNaissanceAuteur date check (DateNaissanceAuteur < current_date ), 
	telAuteur VarChar(25) check (telAuteur ~ '^\+?[0-9]{1,3}?[-.\s]?\(?[0-9]{1,3}?\)?[-.\s]?[0-9]{1,4}[-.\s]?[0-9]{1,4}[-.\s]?[0-9]{1,4}$'), 
	adresseAuteur varChar(50),
 	dateInscriptionAuteur date);
	
CREATE TABLE Oeuvre(
	idOeuvre serial PRIMARY KEY,
	titre varchar(200) not null, 
	editionOeuvre varChar(50), 
	descriptionOeuvre text not null, 
	publicCible EnumPublicCible,
	prixLitteraire varChar(50) null, 
	anneePublication date check (anneePublication < current_date), 
	genreLitteraire EnumGenreLitteraire);
	
CREATE TABLE Editions ( 
	idEdition serial PRIMARY KEY, 
	dateDebuteEdition date not null check (dateDebuteEdition <= dateFinEdition) , 
	dateFinEdition date not null, 
	anneeEdition int not null, 
	descriptionEditon text) ;
		
CREATE TABLE Etablissement ( 
	idEtablissement serial PRIMARY KEY, 
	emailEtablissement  varChar(30) not null check ( emailEtablissement  ~ '^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$'),
 	loginEtablissement varChar(30) unique not null,
  	motdepasseEtablissement varChar(30) not null,
	typeEtablissement  EnumTypeEtablissement, 
	nomEtablissement varChar(50) not null, 
	adresseEtablissement varChar(50), 
	nombreParticipant integer check(nombreParticipant >'0'),
	telEtablissement VARCHAR(25) check (telEtablissement ~ '^\+?[0-9]{1,3}?[-.\s]?\(?[0-9]{1,3}?\)?[-.\s]?[0-9]{1,4}[-.\s]?[0-9]{1,4}[-.\s]?[0-9]{1,4}$'),
	lepublic EnumPublicCible,
	dateInscriptionEtablissement current_date not null);
	
CREATE TABLE Referent ( 
	idReferent serial PRIMARY KEY, 
	nomReferent varChar(30) not null, 
	prénomReferent varChar(30) not null,
	emailReferent varChar(50) not null check ( emailReferent  ~ '^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$'),
	telReferent VARCHAR(25) NOT NULL check (telReferent ~ '^\+?[0-9]{1,3}?[-.\s]?\(?[0-9]{1,3}?\)?[-.\s]?[0-9]{1,4}[-.\s]?[0-9]{1,4}[-.\s]?[0-9]{1,4}$')); 

CREATE TABLE Accompagnateur(
	idAccompagnateur serial PRIMARY KEY, 
	nomAccompagnateur varChar(30) not null, 
	prenomAccompagnateur varChar(30) not null, 
	loginAccompagnateur varChar(30) unique not null,  -- pseudo
	motDePasseAccompagnateur varChar(30) not null, 
	emailAccompagnateur VARCHAR(50) NOT NULL check ( emailAccompagnateur  ~ '^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$'),
	dateNaissanceAcommpagnateur date check (dateNaissanceAcommpagnateur<current_date), 
 	adresseAccompagnateur varChar(50),
	telAcommpagnateur VARCHAR(25) check (telAcommpagnateur ~ '^\+?[0-9]{1,3}?[-.\s]?\(?[0-9]{1,3}?\)?[-.\s]?[0-9]{1,4}[-.\s]?[0-9]{1,4}[-.\s]?[0-9]{1,4}$'),
 	dateInscriptionAccompagnateur date,
 	idInscription int not null);
	
CREATE TABLE OuvragesSelectionnes (
	idOeuvre int not null,
	idEdition int not null,
	dateSelection date check (dateSelection<= current_date),
	description text not null,
	quantitesOuvrageSelectionne int check (quantitesOuvrageSelectionne> 0),
	PRIMARY KEY (idOeuvre, idEdition),
	FOREIGN KEY (idOeuvre) REFERENCES Oeuvre(idOeuvre),
	FOREIGN KEY (idEdition) REFERENCES Editions(idEdition));

CREATE TABLE Voeux ( 
	idVoeux serial PRIMARY KEY,  
	idReferent int not null,
 	idOeuvre int not null,
  	idEdition int not null,
	dateEnvoie date, 
	prioriteVoeux int not null CHECK (prioriteVoeux>= 1  and prioriteVoeux<=  3),
	Etatvoeux EnumTypeVoeux),
	FOREIGN KEY (idReferent) REFERENCES Referent(idReferent),
 	FOREIGN KEY (idOeuvre) REFERENCES Oeuvre(idOeuvre),
	FOREIGN KEY (idEdition) REFERENCES Editions(idEdition));
 
 	CREATE TABLE Inscription( 
	idInscription serial PRIMARY KEY,
	dateDebutInscription date not null check(dateDebutInscription<dateFinInscription),
 	dateFinInscription date not null,
	idEdition int not null,
 	idAccompagnateur int,
  	idEtablissement int,
 	idInterprete int,
  	idAuteur int,
	FOREIGN KEY (idEtablissement) REFERENCES Etablissement(idEtablissement),
	FOREIGN KEY (idInterprete) REFERENCES Interprete(idInterprete),
	FOREIGN KEY (idAuteur) REFERENCES Auteur(idAuteur),
	FOREIGN KEY (idEdition) REFERENCES Editions(idEdition),
	FOREIGN KEY (idAccompagnateur) REFERENCES Accompagnateur(idAccompagnateur));

CREATE TABLE Intervention( 
	idIntervention serial PRIMARY KEY,
  	dureeIntervention time not null check (dureeIntervention>='2:00:00' AND dureeIntervention<='4:00:00'),
	dateDebutIntervention datetime not null check(debutIntervention < finIntervention),
	dateFinIntervention datetime not null check(finIntervention > debutIntervention),
	lieuIntervention varchar(50) not null ,
 	etatIntervention EnumTypeEtat,
	idInterprete int,
	idAuteur int not null,
	idAccompagnateur int not null,
	idEdition int not null,
	idEtablissement int not null,
 	FOREIGN KEY (idEtablissement) REFERENCES Etablissement(idEtablissement),
	FOREIGN KEY (idInterprete) REFERENCES Interprete(idInterprete),
	FOREIGN KEY (idAuteur) REFERENCES Auteur(idAuteur),
	FOREIGN KEY (idEdition) REFERENCES Editions(idEdition),
	FOREIGN KEY (idAccompagnateur) REFERENCES Accompagnateur(idAccompagnateur));
	
CREATE TABLE DemandeAnnulation(
 	idDemandeAnnulation serial PRIMARY KEY,
  	raisonDemande text not null,
   	dateAnnulation date,
    idAccompagnateur int not null,
    idIntervention int not null,
    idEtablissement int not null, 
    idInterprete int,
    idAuteur int not null,
    FOREIGN KEY (idAuteur) REFERENCES Auteur(idAuteur),
    FOREIGN KEY (idInterprete) REFERENCES Interprete(idInterprete),
    FOREIGN KEY (idEtablissement) REFERENCES Etablissement(idEtablissement),
    FOREIGN KEY (idAccompagnateur) REFERENCES Accompagnateur(idAccompagnateur),
	FOREIGN KEY (idIntervention) REFERENCES Intervention(idIntervention));

CREATE TABLE Sauvegarde( 
	idSauvegarde serial PRIMARY KEY,
	tauxDeParticipation DECIMAL(10,2) not null check(0<=tauxDeParticipation<=1),
	nombreDeParicipantPresentParIntervention int not null check(nombreDeParicipantPresentParIntervention>0),
	annee INT NOT NULL CHECK (YEAR(annee) <= YEAR(CURRENT_DATE)),
	idEdition int not null,
	idIntervention int not null,
	FOREIGN KEY (idEdition) REFERENCES Editions(idEdition),
	FOREIGN KEY (idIntervention) REFERENCES Intervention(idIntervention));

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

CREATE TABLE AuteurOeuvre ( 
	idAuteur int not null, 
	idOeuvre int not null, 
	FOREIGN KEY (idAuteur) REFERENCES Auteur(idAuteur),
	FOREIGN KEY (idOeuvre) REFERENCES Oeuvre(idOeuvre));

CREATE TABLE VoeuFormule ( 
	idVoeux int not null, 
	idEtablissement int not null, 
	FOREIGN KEY (idVoeux) REFERENCES Voeux(idVoeux),
	FOREIGN KEY (idEtablissement) REFERENCES Etablissement(idEtablissement));
