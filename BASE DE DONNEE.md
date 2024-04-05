
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
<<<<<<< HEAD
-----------------------------------------------------PROCEDURE/FONCTION TRIGGER----------------------------------------------------------
/* Les voeux formulés ne peuvent pas dépasser plus de 3 choix
=======




-----------------------------------------------------PROCEDURE/FONCTION TRIGGER----------------------------------------------------------
/*Les voeux formulés ne peuvent pas dépasser plus de 3 choix*/
>>>>>>> origin/main

CREATE OR REPLACE FUNCTION check_voeux_limit()
RETURNS TRIGGER AS $$
DECLARE
    voeux_count INTEGER;
BEGIN
    -- On Compte le nombre de voeux formulés pour l'établissement concerné
    SELECT COUNT(*)
    INTO voeux_count
    FROM Voeux
    WHERE idetablissement = NEW.idetablissement;

    -- Puis on vérifie si le nombre de voeux formulés dépasse 3
    IF voeux_count >= 3 THEN
        -- on affiche un message d'erreur si c'est le cas 
        RAISE EXCEPTION 'Le nombre maximal de voeux formulés (3) pour cet établissement est atteint';
    END IF;

    -- Si la condition n'est pas violée, on continue normalement
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER voeux_limit_trigger
BEFORE INSERT OR UPDATE ON Voeux
FOR EACH ROW
EXECUTE FUNCTION check_voeux_limit();
<<<<<<< HEAD
=======



/*un participant ne peut pas s’inscrire plusieurs fois à une édition*/

CREATE OR REPLACE FUNCTION check_enregistrement_participant() RETURNS TRIGGER AS $$
BEGIN
    IF EXISTS (
        SELECT 1
        FROM Etablissement e
        WHERE e.idetablissement = NEW.idetablissement
        AND e.idedition = NEW.idedition
    ) THEN
        RAISE EXCEPTION 'Un établissement ne peut pas s''inscrire plusieurs fois à un événement.';
    END IF;
    RETURN NEW;
	
	IF EXISTS (
        SELECT 1
        FROM Auteur a
        WHERE a.idauteur = NEW.idauteur
        AND a.idedition = NEW.idedition
    ) THEN
        RAISE EXCEPTION 'un auteur ne peut pas s''inscrire plusieurs fois à un événement.';
    END IF;
    RETURN NEW;
	
	
	IF EXISTS (
        SELECT 1
        FROM Accompagnateur ac
        WHERE ac.idaccompagnateur = NEW.idaccompagnateur
        AND ac.idedition = NEW.idedition
    ) THEN
        RAISE EXCEPTION 'Un accompagnateur ne peut pas s''inscrire plusieurs fois à un événement.';
    END IF;
    RETURN NEW;
	
	
	IF EXISTS (
        SELECT 1
        FROM Interprete i
        WHERE i.idinterprete = NEW.idinterprete
        AND i.idedition = NEW.idedition
    ) THEN
        RAISE EXCEPTION 'Un interprète ne peut pas s''inscrire plusieurs fois à un événement.';
    END IF;
    RETURN NEW;
	
	
END;
$$ LANGUAGE plpgsql;



-- Création du déclencheur
CREATE TRIGGER check_duplicate_registration_trigger
BEFORE INSERT ON Inscription
FOR EACH ROW EXECUTE FUNCTION check_enregistrement_participant();

>>>>>>> origin/main



----------------------- taux de participation des établissment à une édition 

DROP FUNCTION calculer_nombre_etablissement_edition;
CREATE OR REPLACE FUNCTION calculer_nombre_etablissement_edition(edition_id int)
RETURNS TABLE (etablissement_id INT, nombre_participants bigint) AS
$$
BEGIN
    RETURN QUERY
    SELECT i.idEtablissement, 
	COUNT(*) AS nombre_participants
    FROM Inscription i
    WHERE i.idEdition = edition_id
    GROUP BY i.idEtablissement;
END;
$$ LANGUAGE plpgsql;

SELECT * FROM calculer_nombre_participants_edition(5); -- Remplacez 5 par l'ID de l'édition souhaitée

CREATE OR REPLACE FUNCTION calculer_taux_participation_edition(edition_id INT)
RETURNS DECIMAL AS
$$
DECLARE
    total_participants BIGINT;
    total_etablissements BIGINT;
    taux_participation DECIMAL;
BEGIN
    SELECT SUM(nombre_participants) INTO total_participants
    FROM calculer_nombre_participants_edition(edition_id);

    SELECT COUNT(idEtablissement) INTO total_etablissements
    FROM Etablissement;

    IF total_etablissements > 0 THEN
        taux_participation := total_participants::DECIMAL / total_etablissements;
    ELSE
        taux_participation := 0.0;
    END IF;

    RETURN taux_participation;
END;
$$ LANGUAGE plpgsql;

SELECT calculer_taux_participation_edition(3); -- Remplacez 5 par l'ID de l'édition souhaitée

