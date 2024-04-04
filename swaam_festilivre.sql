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
 
CREATE TYPE EnumTypeEtatVoeux AS ENUM (
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
	dateInscriptionEtablissement date not null check (dateInscriptionEtablissement=current_date));
	
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
 	dateInscriptionAccompagnateur date);
	
CREATE TABLE OuvragesSelectionnes (
	idOeuvre int not null,
	idEdition int not null,
	dateSelection date check (dateSelection<= current_date),
	description text not null,
	PRIMARY KEY (idOeuvre, idEdition),
	FOREIGN KEY (idOeuvre) REFERENCES Oeuvre(idOeuvre),
	FOREIGN KEY (idEdition) REFERENCES Editions(idEdition));

CREATE TABLE Voeux ( 
	idVoeux serial PRIMARY KEY,  
  	idEdition int not null,
	idOeuvre int not null,
	idReferent int not null,
	dateEnvoie date, 
	prioriteVoeux int not null CHECK (prioriteVoeux>= 1  and prioriteVoeux<=  3),
	etatvoeux EnumTypeEtatVoeux,
	FOREIGN KEY (idReferent) REFERENCES Referent(idReferent),
 	FOREIGN KEY (idOeuvre) REFERENCES Oeuvre(idOeuvre),
	FOREIGN KEY (idEdition) REFERENCES Editions(idEdition));
 
 CREATE TABLE Inscription( 
	idInscription serial PRIMARY KEY,
	dateInscription date not null check (dateInscription = current_date),
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
  	dureeIntervention time not null check (dureeIntervention >= '2:00:00' AND dureeIntervention <= '4:00:00'),
	dateDebutIntervention timestamp not null,
	dateFinIntervention timestamp not null check(dateDebutIntervention < dateFinIntervention),
	lieuIntervention varchar(50) not null ,
 	etatIntervention EnumTypeEtat,
	idEtablissement int not null,
	idInterprete int,
	idAuteur int not null,
	idAccompagnateur int not null,
	idEdition int not null,
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
	tauxDeParticipation DECIMAL(10,2) not null check(tauxDeParticipation >= 0 and tauxDeParticipation <= 1),
	nombreDeParicipantPresentParIntervention int not null check(nombreDeParicipantPresentParIntervention>0),
	anneeSauvegarde INT NOT NULL CHECK (anneeSauvegarde <= EXTRACT(YEAR FROM CURRENT_DATE)),
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

INSERT INTO Admini (emailAdmin, motDePasseAdmin)
VALUES
	('anmin@hotmail.fr','admdp');

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
    ('FR', 'B2', 'C1'),
    ('FR', 'B1', 'B2'),
    ('EN', 'B1', 'B2'),
    ('ES', 'C1', 'C2'),
    ('CHN', 'B2', 'B1'),
    ('JPN', 'B1', 'B2'),
    ('RU', 'B2', 'B1'),
    ('AR', 'B1', 'B2'),
    ('GR', 'B1', 'B2'),
    ('US', 'C1', 'C2'),
    ('FR', 'B2', 'C1');

INSERT INTO Interprete (nomInterprete, prenomInterprete, loginInterprete, motDePasseInterprete, emailInterprete, dateNaissanceInterprete, adresseInterprete, telInterprete,dateInscriptionInterprete)
VALUES
    ('Dupont', 'Marie', 'mdupont', 'secret123', 'marie.dupont@example.com', '1990-05-15', 'Paris, France', '06 12 34 56 78','2024-04-04'),
    ('Smith', 'John', 'jsmith', 'password123', 'john.smith@example.com', '1985-02-20', 'New York, USA', '01 25 55 12 34','2024-04-04'),
    ('García', 'Ana', 'agarcia', 'clave123', 'ana.garcia@example.com',  '1992-09-10', 'Madrid, Spain', '06 78 90 12 34','2024-04-04'),
    ('Kim', 'Ji-hoon', 'jkim', 'secretpass', 'jihoon.kim@example.com',  '1988-11-03', 'Seoul, South Korea', '10 12 34 56 78','2024-04-04'),
    ('Müller', 'Hans', 'hmuller', 'geheim123', 'hans.muller@example.com',  '1977-07-01', 'Berlin, Germany', '30 98 76 54 32','2024-04-04'),
    ('Sato', 'Yuki', 'ysato', 'sakurapass', 'yuki.sato@example.com',  '1995-04-12', 'Tokyo, Japan', '03 12 34 56 78','2024-04-04'),
    ('Ivanov', 'Dmitri', 'divanov', 'topsecret', 'dmitri.ivanov@example.com', '1980-08-25', 'Moscow, Russia', '09 59 87 65 43','2024-04-04'),
    ('López', 'Carlos', 'clopez', 'contraseña', 'carlos.lopez@example.com',  '1983-03-18', 'Barcelona, Spain', '06 78 12 34 56','2024-04-04'),
    ('Chen', 'Wei', 'wchen', 'password123', 'wei.chen@example.com',  '1998-12-05', 'Shanghai, China', '01 98 76 54 32','2024-04-04'),
    ('Dubois', 'Sophie', 'sdubois', 'secret123', 'sophie.dubois@example.com',  '1993-06-30', 'Paris, France', '06 78 90 12 34','2024-04-04');

INSERT INTO Auteur (nomAuteur, prénomAuteur, loginAuteur, motDePasseAuteur, emailAuteur, DateNaissanceAuteur, telAuteur, adresseAuteur,dateInscriptionAuteur)
VALUES
    ('Dumas', 'Alexandre', 'adumas', 'secret123', 'alex.dumas@example.com', '1802-07-24', '06 12 34 56 78', 'Paris, France','2024-04-04'),
    ('Orwell', 'George', 'gorwell', '1984pass', 'george.orwell@example.com', '1903-06-25', '07 12 34 56 78', 'London, UK','2024-04-04'),
    ('Camus', 'Albert', 'acamus', 'existentialism', 'albert.camus@example.com', '1913-11-07', '04 56 78 90 12', 'Algiers, Algeria','2024-04-04'),
    ('Rowling', 'J.K.', 'jkrowling', 'magic123', 'jk.rowling@example.com', '1965-07-31', '06 98 76 54 32', 'Edinburgh, UK','2024-04-04'),
    ('Hugo', 'Victor', 'vhugo', 'lesmis1862', 'victor.hugo@example.com','1802-02-26', '01 23 45 67 89', 'Paris, France','2024-04-04'),
    ('Tolkien', 'J.R.R.', 'jrrtolkien', 'hobbit123', 'jrr.tolkien@example.com', '1892-01-03', '07 76 54 32 10', 'Oxford, UK','2024-04-04'),
    ('Dostoïevski', 'Fiodor', 'fdostoevski', 'guiltcomplex', 'fiodor.dostoevski@example.com', '1821-11-11', '07 95 23 45 67', 'Saint Petersburg, Russia','2024-04-04'),
    ('Melville', 'Herman', 'hmelville', 'whalehunt', 'herman.melville@example.com', '1819-08-01', '01 25 55 12 34', 'New York, USA','2024-04-04'),
    ('Saint-Exupéry', 'Antoine de', 'saintexupery', 'rose123', 'antoine.saintexupery@example.com', '1900-06-29', '05 43 21 65 87', 'Lyon, France','2024-04-04'),
    ('Moore', 'Alan', 'alanmoore', 'watchmen', 'alan.moore@example.com','1953-11-18', '0 87 65 43 21', 'Northampton, UK','2024-04-04');

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

INSERT INTO Editions (dateDebuteEdition, dateFinEdition, anneeEdition, descriptionEditon)
VALUES
    ('2020-03-01', '2020-11-10', 2020, 'Festival du Livre de Nancy'),
    ('2021-04-01', '2021-09-20', 2021, 'Salon du Roman Policier'),
    ('2022-05-01', '2022-10-15', 2022, 'Foire du Livre d été'),
    ('2023-03-01', '2023-11-25', 2023, 'Semaine de la Bande Dessinée'),
    ('2024-04-01', '2024-12-10', 2024, 'Festival de la Poésie');

INSERT INTO Etablissement (emailEtablissement, loginEtablissement, motdepasseEtablissement, typeEtablissement, nomEtablissement, adresseEtablissement, nombreParticipant, telEtablissement,lepublic,dateInscriptionEtablissement)
VALUES
    ('contact@universite.fr','univNancy', 'agdhdskh','université', 'Université de Nancy', '123 Avenue des Étudiants', 5000, '03 12 34 56 78','adulte','2024-04-04'),
    ('lycee.general@example.com','LVH', 'ayghh','lycée général', 'Lycée Victor Hugo', '45 Rue des Écoliers', 800, '03 45 67 89 10','jeune adulte','2024-04-04'),
    ('lycee.pro@example.com','LDM','dfghjh', 'lycée professionnel', 'Lycée des Métiers', '78 Boulevard des Artisans', 600, '03 23 45 67 89','jeune adulte','2024-04-04'),
    ('college@example.com','CJM','pkjhgyh', 'collège', 'Collège Jean Moulin', '56 Rue des Collégiens', 400, '03 56 78 90 12','jeune','2024-04-04'),
    ('ecole.primaire@example.com','EESE','okjbvg', 'école primaire', 'École Élémentaire Saint-Exupéry', '10 Rue des Écoliers', 300, '03 78 90 12 34','enfant','2024-04-04'),
    ('maternelle@example.com','EMLP','iujhgfh', 'maternelle', 'École Maternelle Les Petits', '2 Rue des Tout-Petits', 200, '03 90 12 34 56','enfant','2024-04-04'),
    ('medico-social@example.com','CMS','okjhgfkh', 'établissement médico-sociaux', 'Centre Médico-Social', '15 Rue de la Santé', 100, '03 12 34 56 78','adulte','2024-04-04'),
    ('penitentiaire@example.com','CDD','aoiuyth', 'établissement pénitentiaire', 'Centre de Détention', '20 Rue des Détenus', 50, '03 78 90 12 34','adulte','2024-04-04'),
    ('centre.culturel@example.com','MDLC','sedfcskh', 'établissement médico-sociaux', 'Maison de la Culture', '30 Rue des Artistes', 150, '03 56 78 90 12','adulte','2024-04-04'),
    ('bibliotheque@example.com','BMN','oiytskh', 'établissement médico-sociaux', 'Bibliothèque Municipale', '5 Rue des Livres', 80, '03 90 12 34 56','tout public','2024-04-04');

INSERT INTO Referent (nomReferent, prénomReferent, emailReferent, telReferent)
VALUES
    ('Dupont', 'Marie', 'marie.dupont@example.com', '06 12 34 56 78'),
    ('Smith', 'John', 'john.smith@example.com', '01 25 55 12 34'),
    ('García', 'Ana', 'ana.garcia@example.com', '07 78 90 12 34'),
    ('Kim', 'Ji-hoon', 'jihoon.kim@example.com', '10 12 34 56 78'),
    ('Müller', 'Hans', 'hans.muller@example.com', '30 98 76 54 32'),
    ('Sato', 'Yuki', 'yuki.sato@example.com', '03 12 34 56 78'),
    ('Ivanov', 'Dmitri', 'dmitri.ivanov@example.com', '09 59 87 65 43'),
    ('López', 'Carlos', 'carlos.lopez@example.com', '06 78 12 34 56'),
    ('Chen', 'Wei', 'wei.chen@example.com', '01 98 76 54 32'),
    ('Dubois', 'Sophie', 'sophie.dubois@example.com', '06 78 90 12 34');

INSERT INTO Accompagnateur (nomAccompagnateur, prenomAccompagnateur, loginAccompagnateur, motDePasseAccompagnateur, emailAccompagnateur, dateNaissanceAcommpagnateur, adresseAccompagnateur, telAcommpagnateur,dateInscriptionAccompagnateur)
VALUES
    ('Dupont', 'Marie', 'mdupont', 'secret123', 'marie.dupont@example.com', '1990-05-15', 'Paris, France', '06 12 34 56 78','2024-04-04'),
    ('Smith', 'John', 'jsmith', 'password123', 'john.smith@example.com', '1985-02-20', 'New York, USA', '01 25 55 12 34','2024-04-04'),
    ('García', 'Ana', 'agarcia', 'clave123', 'ana.garcia@example.com','1992-09-10', 'Madrid, Spain', '06 78 90 12 34','2024-04-04'),
    ('Kim', 'Ji-hoon', 'jkim', 'secretpass', 'jihoon.kim@example.com', '1988-11-03', 'Seoul, South Korea', '06 12 34 56 78','2024-04-04'),
    ('Müller', 'Hans', 'hmuller', 'geheim123', 'hans.muller@example.com', '1977-07-01', 'Berlin, Germany', '30 98 76 54 32','2024-04-04'),
    ('Sato', 'Yuki', 'ysato', 'sakurapass', 'yuki.sato@example.com', '1995-04-12', 'Tokyo, Japan', '03 12 34 56 78','2024-04-04'),
    ('Ivanov', 'Dmitri', 'divanov', 'topsecret', 'dmitri.ivanov@example.com', '1980-08-25', 'Moscow, Russia', '09 59 87 65 43','2024-04-04'),
    ('López', 'Carlos', 'clopez', 'contraseña', 'carlos.lopez@example.com', '1983-03-18', 'Barcelona, Spain', '06 78 12 34 56','2024-04-04'),
    ('Chen', 'Wei', 'wchen', 'password123', 'wei.chen@example.com', '1998-12-05', 'Shanghai, China', '01 98 76 54 32','2024-04-04'),
    ('Dubois', 'Sophie', 'sdubois', 'secret123', 'sophie.dubois@example.com', '1993-06-30', 'Paris, France', '06 78 90 12 34','2024-04-04');

INSERT INTO OuvragesSelectionnes (idOeuvre, idEdition, dateSelection, description)
VALUES
    (1, 5, '2024-03-29', 'Sélectionné pour le festival du livre'),
    (2, 5, '2024-03-29', 'Choisi pour le salon du roman policier'),
    (3, 5, '2024-03-29', 'Inclus dans la foire du livre d été'),
    (4, 5, '2024-03-29', 'Sélectionné pour la semaine de la bande dessinée'),
    (5, 5, '2024-03-29', 'Retenu pour la foire du livre ancien'),
    (6, 5, '2024-03-29', 'Sélectionné pour le festival de la poésie'),
    (7, 5, '2024-03-29', 'Inclus dans le salon de la science-fiction'),
    (8, 5, '2024-03-29', 'Choisi pour la semaine du roman historique'),
    (9, 5, '2024-03-29', 'Sélectionné pour le festival de la littérature contemporaine'),
    (10, 5, '2024-03-29', 'Retenu pour le salon du livre jeunesse');

INSERT INTO Voeux (idEdition, idOeuvre, idReferent, dateEnvoie, prioriteVoeux)
VALUES
    (5,1, 1, '2024-04-01', 2),
    (5,2, 3, '2024-04-01', 1),
    (5,3, 2, '2024-04-01', 3),
    (5,4, 5, '2024-04-01', 2),
    (5,4, 4, '2024-04-01', 1),
    (5,6, 6, '2024-04-01', 3),
    (5,7, 7, '2024-04-01', 2),
    (5,8, 9, '2024-04-01', 1),
    (5,9, 8, '2024-04-01', 3),
    (5,10, 10, '2024-04-01', 2);
	
INSERT INTO Inscription (dateInscription,idEdition,idAccompagnateur,idEtablissement,idInterprete,idAuteur)
VALUES
    ('2024-04-04',5,1,1,1,1),
    ('2024-04-04',5,2,2,2,2),
    ('2024-04-04',5,3,3,3,3),
    ('2024-04-04',5,4,4,4,4),
    ('2024-04-04',5,5,5,5,5),
    ('2024-04-04',5,6,6,6,6),
    ('2024-04-04',5,7,7,7,7),
    ('2024-04-04',5,8,8,8,8),
    ('2024-04-04',5,9,9,9,9),
    ('2024-04-04',5,10,10,10,10);
	
INSERT INTO Referent (nomReferent, prénomReferent, emailReferent, telReferent)
VALUES
    ('Dupont', 'Marie', 'marie.dupont@example.com', '06 12 34 56 78'),
    ('Smith', 'John', 'john.smith@example.com', '01 25 55 12 34'),
    ('García', 'Ana', 'ana.garcia@example.com', '07 78 90 12 34'),
    ('Kim', 'Ji-hoon', 'jihoon.kim@example.com', '10 12 34 56 78'),
    ('Müller', 'Hans', 'hans.muller@example.com', '30 98 76 54 32'),
    ('Sato', 'Yuki', 'yuki.sato@example.com', '03 12 34 56 78'),
    ('Ivanov', 'Dmitri', 'dmitri.ivanov@example.com', '09 59 87 65 43'),
    ('López', 'Carlos', 'carlos.lopez@example.com', '06 78 12 34 56'),
    ('Chen', 'Wei', 'wei.chen@example.com', '01 98 76 54 32'),
    ('Dubois', 'Sophie', 'sophie.dubois@example.com', '06 78 90 12 34');

INSERT INTO Intervention (dureeIntervention, dateDebutIntervention, dateFinIntervention, lieuIntervention, etatIntervention, idEtablissement, idInterprete, idAuteur, idAccompagnateur, idEdition)
VALUES
    ('03:00:00','2024-04-04 08:00:00', '2024-04-04 11:00:00', 'Salle A', 'Programmée',1, 1, 2, 3, 5),
    ('02:30:00', '2024-04-04 09:00:00', '2024-04-04 11:30:00', 'Amphithéâtre B', 'En attente',2, 5, 6, 7, 5),
    ('04:00:00', '2024-04-04 08:00:00', '2024-04-04 12:00:00', 'Salle C', 'Annulée',3, 9, 10, 1, 5),
    ('03:30:00', '2024-04-04 13:00:00', '2024-04-04 16:30:00', 'Auditorium', 'Remplacée', 4, 3, 4, 5, 5),
    ('02:15:00', '2024-04-04 14:00:00', '2024-04-04 18:15:00', 'Salle D', 'Programmée', 5,7, 8, 9, 5),
    ('03:45:00', '2024-04-04 14:00:00', '2024-04-04 17:45:00', 'Salle E', 'En attente',6, 2, 3, 4, 5),
    ('03:20:00', '2024-04-04 15:00:00', '2024-04-04 18:20:00', 'Salle F', 'En attente',7, 6, 7, 8, 5),
    ('02:50:00', '2024-04-04 08:00:00', '2024-04-04 10:50:00', 'Salle G', 'Programmée',8, 10, 1, 2, 5),
    ('03:10:00', '2024-04-04 09:00:00', '2024-04-04 12:10:00' , 'Salle H', 'En attente',9, 4, 5, 6, 5),
    ('03:30:00', '2024-04-04 10:00:00', '2024-04-04 13:30:00', 'Salle I', 'Programmée',10, 8, 9, 10, 5);

INSERT INTO Sauvegarde (tauxDeParticipation, nombreDeParicipantPresentParIntervention, anneeSauvegarde, idEdition, idIntervention)
VALUES
    (0.75, 20, 2024, 5, 2),
    (0.90, 30, 2024, 5, 4),
    (0.80, 25, 2024, 5, 6),
    (0.70, 18, 2024, 5, 8),
    (0.95, 40, 2024, 5, 10),
    (0.60, 15, 2024, 5, 9),
    (0.85, 28, 2024, 5, 7),
    (0.78, 22, 2024, 5, 5),
    (0.88, 35, 2024, 5, 3),
    (0.92, 38, 2024, 5, 1);
	
INSERT INTO LanguesAuteurs (idLangue, idAuteur)
VALUES
    (1, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 5),
    (6, 6),
    (7, 7),
    (8, 8),
    (9, 9),
    (10, 10);
	
INSERT INTO LanguesInterprete (idLangue, idInterprete)
VALUES
    (1, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 5),
    (6, 6),
    (7, 7),
    (8, 8),
    (9, 9),
    (10, 10);
	
INSERT INTO AuteurOeuvre (idAuteur, idOeuvre)
VALUES
    (1, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 5),
    (6, 6),
    (7, 7),
    (8, 8),
    (9, 9),
    (10, 10);

INSERT INTO VoeuFormule (idVoeux, idEtablissement)
VALUES
    (1, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 5),
    (6, 6),
    (7, 7),
    (8, 8),
    (9, 9),
    (10, 10);
