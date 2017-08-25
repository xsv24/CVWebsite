CREATE Database cv;
USE cv;


# languages Table
CREATE TABLE languages(
    lang_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    skill INT NOT NULL,
    PRIMARY KEY(lang_id)
);

# language entries
INSERT INTO languages(name, skill)
    VALUES("HTML", 4);

INSERT INTO languages(name, skill)
    VALUES("CSS", 4);

INSERT INTO languages(name, skill)
    VALUES("php", 4);

INSERT INTO languages(name, skill)
    VALUES("Java", 5);

INSERT INTO languages(name, skill)
    VALUES("C#", 4);

INSERT INTO languages(name, skill)
    VALUES("JavaScript", 4);

INSERT INTO languages(name, skill)
    VALUES("SQL", 4);

INSERT INTO languages(name, skill)
    VALUES("Python", 5);

INSERT INTO languages(name, skill)
    VALUES("NoSQL", 4);


#platforms Table
CREATE TABLE platforms(
    plat_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    skill INT NOT NULL NOT NULL,
    PRIMARY KEY(plat_id)
);

#platform entries
INSERT INTO platforms(name, skill)
    VALUES(".NET", 4);

INSERT INTO platforms(name, skill)
    VALUES("AWS Lambda", 5);

INSERT INTO platforms(name, skill)
    VALUES("AWS Dynamo", 5);

INSERT INTO platforms(name, skill)
    VALUES("Git", 5);

INSERT INTO platforms(name, skill) 
    VALUES("Android", 5);

INSERT INTO platforms(name, skill)
    VALUES("Unity", 3);

#concepts 
CREATE TABLE concepts(
    concept_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(150) NOT NULL,
    skill INT NOT NULL,
    PRIMARY KEY(concept_id)
);

#concept entries
INSERT INTO concepts(name, skill)
    VALUES("Agile Scrum", 5);

INSERT INTO concepts(name, skill)
    VALUES("Front End", 4);

INSERT INTO concepts(name, skill)
    VALUES("Back End", 5);

INSERT INTO concpets(name, skill)
    VALUES("Object Oriented", 5);

INSERT INTO concepts(name, skill)
    VALUES("Test Driven Devlopment", 4);

INSERT INTO concepts(name, skill)
    VALUES("Data Structures", 4);

INSERT INTO concepts(name, skill)
    VALUES("Algorithms", 4);

INSERT INTO concepts(name, skill)
    VALUES("AI", 3);

CREATE TABLE experience_category(
    cat_id INT NOT NULL AUTO_INCREMENT,
    cat_name VARCHAR(100) NOT NULL,
    PRIMARY KEY(cat_id)
);

INSERT INTO experience_category(cat_name) VALUES("education");
INSERT INTO experience_category(cat_name) VALUES("commercial");

CREATE TABLE experiences(
    exp_id INT NOT NULL AUTO_INCREMENT,
    exp_category_id INT NOT NULL,
    exp_title VARCHAR(200) NOT NULL,
    exp_loc VARCHAR(100) NOT NULL,
    exp_from_date DATE NOT NULL,
    exp_to_date DATE,
    exp_descript TEXT NOT NULL,
    PRIMARY KEY(exp_id),
    FOREIGN KEY(exp_category_id) REFERENCES experience_category(cat_id)
);

INSERT INTO experiences(exp_title, exp_category_id ,exp_loc, exp_from_date, exp_to_date, exp_descript)
    VALUES(
        "Bachelor of Information Sciences <br>",
        1,
        "Massey University",
        "2014/02/26", 
        "2017/06/12",
        "
        Majoring  Computer Science and Minoring Information Technology,<br><br>
        Learn a broad spectrum of skills from business management through to developing software and hardware. Emerge from your studies at Massey with a well-rounded understanding of the whole industry as well as the specialist skills needed to become an excellent ICT professional.
        "
    );

INSERT INTO experiences(exp_title, exp_category_id ,exp_loc, exp_from_date, exp_to_date, exp_descript)
    VALUES(
        "Full Stack Developer",
        2,
        "Massey University Commerical Project",
        "2016/02/20", 
        "2017/06/3",
        "
        This project involed creating a Android application for sporting events allowing scheduling of events and matches at public and private venues.<br><br>

        This application involves the following technologies: Android client code written in Java, the UI structure layout and widgets are created in XML, AWS Lambda operates 
        as the sever returning JSON and generally communicates with Dynamo DB (a NoSQL Database), and Bit Bucket is used as our version control system which uses Git.<br><br>
        
        I originally worked on this project as a paper that was part of my degree with two other students and we used Agile Scrum to organize our tasks and track the progress of the applications development. However, I have since been employed by the project director to assist his team to complete the project. Therefore, I have worked on this project from scratch and have been involved in all areas of the projects development.
        "
    );

