

USE school;

INSERT INTO faculty (name) VALUES ("Faculté des Sciences et Techniques");
INSERT INTO faculty (name) VALUES ("Faculté de Droit");

INSERT INTO department (name, faculty_id) VALUES ("Mathématiques - Science Physiques - Informatique", 1);
INSERT INTO department (name, faculty_id) VALUES ("Sciences naturelles", 1);

INSERT INTO formation (name, department_id) VALUES ("Mathématiques", 1);
INSERT INTO formation (name, department_id) VALUES ("Physique", 1);
INSERT INTO formation (name, department_id) VALUES ("Environnement", 2);

INSERT INTO level (name, formation_id) VALUES ("Première année", 1);
INSERT INTO level (name, formation_id) VALUES ("Deuxième année", 1);
INSERT INTO level (name, formation_id) VALUES ("Première année", 2);
INSERT INTO level (name, formation_id) VALUES ("Première année", 3);
