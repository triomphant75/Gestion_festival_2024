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
	nomLangue EnumTypeLangue, 
	niveauLangueEcrit EnumNiveauLangue, 
	niveauLangueParle EnumNiveauLangue);

CREATE TABLE Accompagnateur(
	idAccompagnateur serial PRIMARY KEY, 
	nomAccompagnateur varChar(30) not null, 
	prenomAccompagnateur varChar(30) not null, 
	loginAccompagnateur varChar(30) unique not null,  -- pseudo
	motDePasseAccompagnateur varChar(30) not null, 
	emailAccompagnateur VARCHAR(50) NOT NULL check (emailAccompagnateur  ~ '^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$'),
	dateInscriptionAcommpagnateur date check (dateInscriptionAcommpagnateur=current_date), 
	dateNaissanceAcommpagnateur date check (dateNaissanceAcommpagnateur<current_date), 
 	adresseAccompagnateur varChar(50),
	telAcommpagnateur VARCHAR(25) check (telAcommpagnateur ~ '^\+?[0-9]{1,3}?[-.\s]?\(?[0-9]{1,3}?\)?[-.\s]?[0-9]{1,4}[-.\s]?[0-9]{1,4}[-.\s]?[0-9]{1,4}$'));
	
	
CREATE TABLE Interprete(
	idInterprete serial PRIMARY KEY, 
	nomInterprete varChar(30) not null, 
	prenomInterprete varChar(30) not null, 
	loginInterprete varChar(30) unique not null, 
	motDePasseInterprete varChar(30) not null, 
	emailInterprete VARCHAR(50) NOT NULL check (emailInterprete  ~ '^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$'), 
	dateInscriptionInterprete date check (dateInscriptionInterprete=current_date), 
	dateNaissanceInterprete date check (dateNaissanceInterprete<current_date), 
 	adresseInterprete varChar(50),
	telInterprete VARCHAR(25) check (telInterprete ~ '^\+?[0-9]{1,3}?[-.\s]?\(?[0-9]{1,3}?\)?[-.\s]?[0-9]{1,4}[-.\s]?[0-9]{1,4}[-.\s]?[0-9]{1,4}$'));
	


CREATE TABLE Etablissement ( 
	idEtablissement serial PRIMARY KEY, 
	emailEtablissement  varChar(30) not null check (emailEtablissement  ~ '^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$'), 
	typeEtablissement  EnumTypeEtablissement, 
	nomEtablissement varChar(50) not null, 
	adresseEtablissement varChar(50), 
	nombreParticipant integer check(nombreParticipant >'0')  ); 
 
alter table etablissement
Add COLUMN telEtablissement VARCHAR(25) check (telEtablissement ~ '^\+?[0-9]{1,3}?[-.\s]?\(?[0-9]{1,3}?\)?[-.\s]?[0-9]{1,4}[-.\s]?[0-9]{1,4}[-.\s]?[0-9]{1,4}$');

 
	
CREATE TABLE Oeuvre(
	idOeuvre serial PRIMARY KEY, 
	titre varchar(200) not null, 
	editionOeuvre varChar(50), 
	descriptionOeuvre text not null, 
	publicCible EnumPublicCible,
	prixLitteraire varChar(50) null, 
	anneePublication date check (anneePublication < current_date), 
	genreLitteraire EnumGenreLitteraire);
	
CREATE TABLE Auteur (
	idAuteur serial PRIMARY KEY,
	idOeuvre int not null,
	nomAuteur varChar(30) not null, 
	prénomAuteur varChar(30) not null, 
	loginAuteur varChar(30) not null, 
	motDePasseAuteur varChar(30) not null,
	emailAuteur varChar(50) not null check ( emailAuteur  ~ '^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$'),  
	DateInscriptionAuteur date check (DateInscriptionAuteur = current_date), 
	DateNaissanceAuteur date check (DateNaissanceAuteur > current_date ), 
	telAuteur VarChar(25) check (telAuteur  ~ '^\\+?[0-9]{1,3}?[-.\\s]?\\(?[0-9]{1,3}?\\)?[-.\\s]?[0-9]{1,4}[-.\\s]?[0-9]{1,4}[-.\\s]?[0-9]{1,4}$'), 
	adresseAuteur varChar(50), 
	FOREIGN KEY (idOeuvre) REFERENCES Oeuvre(idOeuvre));
	

CREATE TABLE Referent ( 
	idReferent serial PRIMARY KEY, 
	nomReferent varChar(30) not null, 
	prénomReferent varChar(30) not null,
	emailReferent varChar(50) not null,
	telReferent VARCHAR(25) NOT NULL check (telReferent ~ '^\+?[0-9]{1,3}?[-.\s]?\(?[0-9]{1,3}?\)?[-.\s]?[0-9]{1,4}[-.\s]?[0-9]{1,4}[-.\s]?[0-9]{1,4}$')); 

CREATE TABLE Voeux ( 
	idVoeux serial PRIMARY KEY, 
	idEtablissement int not null, 
	idReferent int not null,
	dateEnvoie date, 
	prioriteVoeux int not null CHECK (prioriteVoeux>= 1  and prioriteVoeux>=  3), 
	FOREIGN KEY (idReferent) REFERENCES Referent(idReferent), 
	FOREIGN KEY (idEtablissement) REFERENCES Etablissement(idEtablissement));

CREATE TABLE Edition ( 
	idEdition serial PRIMARY KEY, 
	dateDebuteEdition date not null check (dateDebuteEdition>=current_date and dateDebuteEdition<=dateFinEdition) , 
	dateFinEdition date not null, 
	anneeEdition int not null check (anneeEdition>=2024), 
	descriptionEditon text) ;
 
CREATE TABLE OuvragesSelectionnes (
	idOeuvre int not null,
	idEdition int not null,
	dateSelection date check (dateSelection<= current_date),
	description text not null,
	quantitesOuvrageSelectionne int check (quantitesOuvrageSelectionne> 0),
	PRIMARY KEY (idOeuvre, idEdition),
	FOREIGN KEY (idOeuvre) REFERENCES Oeuvre(idOeuvre),
	FOREIGN KEY (idEdition) REFERENCES Edition(idEdition));

CREATE TABLE Inscription(
	idInscription serial not null,
	dateInscription date not null check(dateInscription = current_date),
	idInterprete int not null,
	idAuteur int not null,
	idAccompagnateur int not null,
	idEdition int not null,
	idEtablissement int not null references Etablissement(idEtablissement),
	FOREIGN KEY (idInterprete) REFERENCES Interprete(idInterprete),
	FOREIGN KEY (idAuteur) REFERENCES Auteur(idAuteur),
	FOREIGN KEY (idEdition) REFERENCES Edition(idEdition),
	FOREIGN KEY (idAccompagnateur) REFERENCES Accompagnateur(idAccompagnateur));


CREATE TABLE Intervention(
	idIntervention serial PRIMARY KEY,
	dureeIntervention time not null check (dureeIntervention>='2:00:00' AND dureeIntervention<='4:00:00'),
	dateDebutIntervention timestamp not null check(dateDebutIntervention >= current_date),
	dateFinIntervention timestamp not null check(dateFinIntervention > dateDebutIntervention),
	lieuIntervention varchar(50) not null ,
	etatIntervention  EnumTypeEtat,
	idInterprete int not null,
	idAuteur int not null,
	idAccompagnateur int not null,
	idEdition int not null,
	FOREIGN KEY (idInterprete) REFERENCES Interprete(idInterprete),
	FOREIGN KEY (idAuteur) REFERENCES Auteur(idAuteur),
	FOREIGN KEY (idEdition) REFERENCES Edition(idEdition),
	FOREIGN KEY (idAccompagnateur) REFERENCES Accompagnateur(idAccompagnateur));

CREATE TABLE Sauvegarde(
	idSauvegarde serial PRIMARY KEY,
	tauxDeParticipation DECIMAL(10,2) not null,
	nombreDeParicipantPresentParIntervention int not null check(nombreDeParicipantPresentParIntervention>0),
	annee int not null,
	idEdition int not null,
	idIntervention int not null,
	FOREIGN KEY (idEdition) REFERENCES Edition(idEdition),
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

INSERT INTO Langue (nomLangue, niveauLangueEcrit, niveauLangueParle)
VALUES
    ('FR', 'A1', 'A2'),
    ('EN', 'B1', 'B2'),
    ('ES', 'C1', 'C2'),
    ('CHN', 'A2', 'B1'),
    ('JPN', 'B1', 'B2'),
    ('RU', 'A2', 'B1'),
    ('AR', 'A1', 'A2'),
    ('GR', 'B1', 'B2'),
    ('US', 'C1', 'C2'),
    ('FR', 'B2', 'C1');

INSERT INTO Oeuvre (titre, editionOeuvre, descriptionOeuvre, publicCible, prixLitteraire, anneePublication, genreLitteraire)
VALUES
    ('Le Maître et Marguerite', 'Édition originale', 'Un roman fantastique et satirique écrit par Mikhaïl Boulgakov.', 'adulte', NULL, '1967-01-01', 'roman'),
    ('1984', 'Penguin Classics', 'Un roman dystopique de George Orwell qui explore les dangers de la surveillance et du totalitarisme.', 'tout public', 'Prix Hugo', '1949-06-08', 'science-fiction'),
    ('L Étranger', 'Gallimard', 'Un roman existentialiste d Albert Camus qui raconte lhistoire d un homme apathique confronté à l absurdité de la vie.', 'adulte', 'Prix Nobel de littérature', '1942-01-01', 'roman'),
    ('Harry Potter à l école des sorciers', 'Bloomsbury', 'Le premier livre de la série Harry Potter de J.K. Rowling, qui suit les aventures d un jeune sorcier.', 'jeune', 'Prix Locus', '1997-06-26', 'fantasy'),
    ('Les Misérables', 'A. Lacroix, Verboeckhoven & Cie', 'Un roman historique de Victor Hugo qui explore la condition humaine, la justice et la rédemption.', 'adulte', NULL, '1862-03-15', 'littérature'),
    ('Le Seigneur des Anneaux', 'Allen & Unwin', 'Une trilogie épique de J.R.R. Tolkien avec des elfes, des nains, des hobbits et un anneau magique.', 'tout public', 'Prix International Fantasy', '1954-07-29', 'fantasy'),
    ('Crime et Châtiment', 'The Russian Messenger', 'Un roman psychologique de Fiodor Dostoïevski qui explore la culpabilité et la rédemption.', 'adulte', NULL, '1866-01-01', 'roman'),
    ('Moby-Dick', 'Harper & Brothers', 'Un roman d aventures de Herman Melville centré sur la chasse à la baleine et la quête obsessionnelle du capitaine Ahab.', 'tout public', NULL, '1851-10-18', 'littérature'),
    ('Le Petit Prince', 'Reynal & Hitchcock', 'Un conte philosophique d Antoine de Saint-Exupéry qui aborde des thèmes tels que l amitié et la quête de sens.', 'enfant', NULL, '1943-04-06', 'littérature'),
    ('Watchmen', 'DC Comics', 'Une bande dessinée de Alan Moore et Dave Gibbons qui déconstruit le genre des super-héros.', 'jeune adulte', 'Prix Hugo', '1986-09-01', 'bandes dessinées');




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
