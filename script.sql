 DROP TABLE IF EXISTS patient ;
  CREATE TABLE patient (idpatient int AUTO_INCREMENT NOT NULL, Nom VARCHAR(50), Prenom VARCHAR(50), age INT(11), addresse VARCHAR(50), telPatient VARCHAR(50), fixePatient VARCHAR(50), PRIMARY KEY (idpatient) ) ENGINE=InnoDB;  DROP TABLE IF EXISTS secretaire ; CREATE TABLE secretaire (idSecret int AUTO_INCREMENT NOT NULL, NomSecret VARCHAR(50), PrenomSecret VARCHAR(50), AgeSecret INT(50), addresseSecret VARCHAR(50), telSecret VARCHAR(50), passwordSecret VARCHAR(50), emailSecret VARCHAR(50), idmedecin INT, PRIMARY KEY (idSecret) ) ENGINE=InnoDB;  DROP TABLE IF EXISTS medecin ; CREATE TABLE medecin (idmedecin int AUTO_INCREMENT NOT NULL, NomMedecin VARCHAR(50), PrenomMedecin VARCHAR(50), ageMedecin INT(50), addresseMedecin INT(11), telMedecin VARCHAR(50), passwordMedecin VARCHAR(50), emailMedecin VARCHAR(50), PRIMARY KEY (idmedecin) ) ENGINE=InnoDB;  DROP TABLE IF EXISTS rendez_vousà ; CREATE TABLE rendez_vousà (idrv int AUTO_INCREMENT NOT NULL, heureRV TIME, daterv DATE, idSecret INT NOT NULL, idmedecin INT NOT NULL, idpatient INT NOT NULL, PRIMARY KEY (idrv) ) ENGINE=InnoDB;  ALTER TABLE secretaire ADD CONSTRAINT FK_secretaire_idmedecin FOREIGN KEY (idmedecin) REFERENCES medecin (idmedecin); ALTER TABLE rendez_vousà ADD CONSTRAINT FK_rendez_vousà_idSecret FOREIGN KEY (idSecret) REFERENCES secretaire (idSecret); ALTER TABLE rendez_vousà ADD CONSTRAINT FK_rendez_vousà_idmedecin FOREIGN KEY (idmedecin) REFERENCES medecin (idmedecin); ALTER TABLE rendez_vousà ADD CONSTRAINT FK_rendez_vousà_idpatient FOREIGN KEY (idpatient) REFERENCES patient (idpatient); 