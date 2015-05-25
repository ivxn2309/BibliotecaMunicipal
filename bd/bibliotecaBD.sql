-- =====================================================
-- Biblioteca BD
-- Created at 17/May/2015
-- =====================================================
-- ------------------------------------------------
-- User definition
-- ------------------------------------------------
SELECT PASSWORD('villanueva');
CREATE USER 'bibliotecario' IDENTIFIED BY PASSWORD '*762C18938B1A6193AF1B2E62A13BD181B87D248C';
-- ------------------------------------------------
-- DB defnition 
-- ------------------------------------------------
CREATE DATABASE `BibliotecaBD` CHARACTER SET utf8 COLLATE utf8_general_ci;
GRANT ALL ON `BibliotecaBD`.* TO `bibliotecario`@localhost IDENTIFIED BY 'villanueva';
FLUSH PRIVILEGES;

use `BibliotecaBD`;

-- ------------------------------------------------
-- Tables
-- ------------------------------------------------
-- DROPS
-- ------------------------------------------------
DROP TABLE IF EXISTS Recommendation;
DROP TABLE IF EXISTS Message;
DROP TABLE IF EXISTS Loan;
DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Book;
DROP TABLE IF EXISTS Game;
DROP TABLE IF EXISTS Forum;
DROP TABLE IF EXISTS Course;
DROP TABLE IF EXISTS Library;

-- ------------------------------------------------
-- Library
-- ------------------------------------------------
DROP TABLE IF EXISTS Library;
CREATE TABLE IF NOT EXISTS Library (
    library_id TINYINT(1),
    name VARCHAR(80) NOT NULL,
    address VARCHAR(100) NOT NULL,
    phone VARCHAR(100),
    email VARCHAR(100),
    schedule VARCHAR(100),
    facebook VARCHAR(100),
    twitter VARCHAR(100),
    PRIMARY KEY(library_id)
);

-- ------------------------------------------------
-- Course
-- ------------------------------------------------
DROP TABLE IF EXISTS Course;
CREATE TABLE IF NOT EXISTS Course (
    course_id SERIAL,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(200) NOT NULL,
    schedule VARCHAR(100),
    is_active TINYINT(1),
    PRIMARY KEY(course_id)
);
-- ------------------------------------------------
-- Forum
-- ------------------------------------------------
DROP TABLE IF EXISTS Forum;
CREATE TABLE IF NOT EXISTS Forum (
    forum_id SERIAL,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(200) NOT NULL,
    start_date DATE,
    is_active TINYINT(1),
    PRIMARY KEY(forum_id)
);
-- ------------------------------------------------
-- Game
-- ------------------------------------------------
DROP TABLE IF EXISTS Game;
CREATE TABLE IF NOT EXISTS Game (
    game_id SERIAL,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(900) NOT NULL,
    start_date DATE,
    is_active TINYINT(1),
    PRIMARY KEY(game_id)
);
-- ------------------------------------------------
-- Book
-- ------------------------------------------------
DROP TABLE IF EXISTS Book;
CREATE TABLE IF NOT EXISTS Book (
    book_id INT(9) NOT NULL AUTO_INCREMENT,
    signature VARCHAR(20) NOT NULL,
    title VARCHAR(100) NOT NULL,
    author VARCHAR(100),
    volume VARCHAR(5),
    copy VARCHAR(100),
    classification VARCHAR(100),
    image VARCHAR(100),
    is_active TINYINT(1),
    PRIMARY KEY(book_id)
);

-- ------------------------------------------------
-- User
-- ------------------------------------------------
DROP TABLE IF EXISTS User;
CREATE TABLE IF NOT EXISTS User (
    username VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL,
    firstname VARCHAR(100) NOT NULL,
    surnames VARCHAR(100) NOT NULL,
    address VARCHAR(100),
    phone VARCHAR(20),
    age INT(3),
    guarantor VARCHAR(100),
    email VARCHAR(100),
    usertype TINYINT(1) NOT NULL,
    is_active TINYINT(1) NOT NULL,
    PRIMARY KEY(username)
);

-- ------------------------------------------------
-- Loan
-- ------------------------------------------------
DROP TABLE IF EXISTS Loan;
CREATE TABLE IF NOT EXISTS Loan (
    loan_id SERIAL,
    user VARCHAR(50) NOT NULL,
    book INT(9) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    returned TINYINT(1) NOT NULL,
    PRIMARY KEY(loan_id),
    FOREIGN KEY(user) REFERENCES User(username),
    FOREIGN KEY(book) REFERENCES Book(book_id)
);

-- ------------------------------------------------
-- Message
-- ------------------------------------------------
DROP TABLE IF EXISTS Message;
CREATE TABLE IF NOT EXISTS Message (
    message_id SERIAL,
    user VARCHAR(50) NOT NULL,
    subject VARCHAR(100),
    body VARCHAR(900),
    sent_date DATE,
    is_read TINYINT(1) NOT NULL,
    is_active TINYINT(1) NOT NULL,
    PRIMARY KEY(message_id),
    FOREIGN KEY(user) REFERENCES User(username)
);

-- ------------------------------------------------
-- Recommendation
-- ------------------------------------------------
DROP TABLE IF EXISTS Recommendation;
CREATE TABLE IF NOT EXISTS Recommendation (
    recom_id SERIAL,
    book INT(9) NOT NULL,
    start_date DATE NOT NULL,
    recom_author VARCHAR(100),
    is_active TINYINT(1) NOT NULL,
    PRIMARY KEY(recom_id),
    FOREIGN KEY(book) REFERENCES Book(book_id)
);

-- ------------------------------------------------
-- Data dump
-- ------------------------------------------------
-- Library
-- ------------------------------------------------
INSERT INTO Library VALUES (1, "Lic. Pedro Vélez y Zúñiga", 
    "Calle Matamoros #41, colonia Centro, Villanueva Zacatecas", 
    "499-926-2717", "bmpvzvillanueva@hotmail.com", 
    "Lunes a Viernes de 9.00 am a 8.00 pm", NULL, NULL);
-- ------------------------------------------------
-- Course
-- ------------------------------------------------
INSERT INTO Course VALUES (NULL, "Mis vacaciones en la biblioteca", 
    "Fomento a la lectura leyendas, cuentos y manualidades", 
    "10 am-3 pm duracion 4 semanas", 1);
-- ------------------------------------------------
-- Game
-- ------------------------------------------------
INSERT INTO Game VALUES (NULL, "La Gallina Ciega", 
    "Para este juego hace falta un grupo de niños, mínimo cuatro, y un pañuelo. A continuación, de entre el grupo elegimos a un niño que se tendrá que tapar los ojos con el pañuelo y finalmente le darán vueltas cantando la siguiente canción: 'Gallinita ciega que se te ha perdido una dedal date la vuelta y lo encontrarás' para despistarlo. El niño que tiene tapado los ojos tendrá que encontrar a los demás.", 
    NULL, 1);

INSERT INTO Game VALUES (NULL, "El avioncito", 
    "Se puede jugar de manera individual, pero para mayor diversión se recomienda que sean dos o más los integrantes del juego. Se coge una tiza blanca y en las losas del suelo se dibujan cuadrados y se numeran del uno al diez. Después cada niño debe coger una bolita o una piedrecita pequeña e ir tirando a cada número intentando que la piedra entre dentro de ese cuadrado porque de no hacerlo pierde su turno y le toca al siguiente. Gana el primero en llegar al diez.", 
    NULL, 1);

INSERT INTO Game VALUES (NULL, "Las canicas", 
    "Se trata de un juego de puntería y precisión en el cual deberemos tocar a la canica objetivo con nuestra bola que será lanzada con nuestro dedo pulgar. Por supuesto, no está permitido ayudarnos arrastrando la mano o acompañar el lanzamiento con un movimiento. Existen varias modalidades para jugar a este juego. Entre las existentes algunas de las más interesantes son: Bombardero y círculo.", 
    NULL, 1);

INSERT INTO Game VALUES (NULL, "Sillas musicales", 
    "Para realizar este juego se necesitan sillas resistentes, al menos tantas como personas haya menos una, y música que se pueda iniciar y parar a voluntad: Se colocan todas las sillas formando un círculo con los respaldos hacia dentro. Los jugadores están de pie delante de ellas, excepto una persona que controlará la música. Se colocará siempre una silla menos que personas estén jugando o dando vueltas. Cuando empiece a sonar la música, los jugadores deben girar alrededor de las sillas siguiendo el ritmo. En el momento que para la música, cada persona intentara sentarse en una de las sillas. Quien se queda sin sentarse en una silla quedara eliminado. Entonces se retira una silla, se recompone el círculo y vuelve a sonar la música. Se repite el juego hasta que la última ronda se hace con una sola silla y dos jugadores. Gana el que queda sentado en la última silla.", 
    NULL, 1);

INSERT INTO Game VALUES (NULL, "El juego del trompo", 
    "Es uno de los juegos más populares del siglo XX, también uno de los más antiguos. Una de las formas colectivas de jugar era formando un círculo en el suelo, en cuyo centro se colocaba un trompo dando vueltas para que los demás jugadores chocaran su trompo con éste. El que fallaba, dejaba su trompo ocupando la posición del anterior.", 
    NULL, 1);

INSERT INTO Game VALUES (NULL, "El cometa", 
    "Es un artefacto volador más pesado que el aire, que vuela gracias a la fuerza del viento y a uno o varios hilos que la mantienen desde tierra en su postura correcta de vuelo. Debido a su propia construcción lo habitual es desplegar las cometas en lugares abiertos y ventosos, como descampados o playas, etc.", 
    NULL, 1);

INSERT INTO Game VALUES (NULL, "La liga", 
    "La liga es un juego que tiene especial aceptación entre las niñas. Para llevarlo a cabo, se utiliza una liga elástica unida con un nudo por los extremos. Dos niñas se ponen en los laterales sujetándola con las piernas abiertas de modo que quede un espacio en el medio para saltar. Entonces, una o varias niñas tienen que realizar determinados ejercicios al ritmo de canciones y palmadas que interpretan las participaciones. En el momento en que una falla el ejercicio, pierde pasando a sujetar la liga.", 
    NULL, 1);

-- Book
-- ------------------------------------------------
INSERT INTO Book VALUES (NULL, "70.4074", "La especialización en el periodísmo", "Pedro Orive y Concha Fagoaga", "NULL", "Ej 1", "Obras generales", "especializacion.png", 1);
INSERT INTO Book VALUES (NULL, "082S46172", "La vorágine", "José Eustasio Rivera", "NULL", "Ej 1", "Obras generales", "voragine.png", 1);
INSERT INTO Book VALUES (NULL, "082S4681", "El sitio de Querétaro", "Daniel Moreno", "NULL", "Ej 1", "Obras generales", "queretaro.png", 1);
INSERT INTO Book VALUES (NULL, "082S4681", "Breve Historia de la revolución mexicana", "Jesus Silva Herzog", "V.9", "NULL", "Obras generales", "revolucionuno.png", 1);
INSERT INTO Book VALUES (NULL, "070.43R58", "Conversaciones para gente grande", "Ricardo Rocha", "NULL", "NULL", "Obras generales", "conversaciones.png", 1);
INSERT INTO Book VALUES (NULL, "082P617", "Breve Historia de la revolución mexicana", "Jesus Silva Herzog", "V.1", "NULL", "Obras generales", "revolucionuno.png", 1);
INSERT INTO Book VALUES (NULL, "082S46312", "Yolanda Morgan", "Emilio Salgari", "NULL", "Ej 1", "Obras generales", "yolanda.png", 1);
INSERT INTO Book VALUES (NULL, "082S4659", "La ciudad de dios", "Francisco Montes de Oca", "NULL", "Ej 1", "Obras generales", "laciudad.png", 1);
INSERT INTO Book VALUES (NULL, "082S4658", "Los origenes del cine mexicano", "Aurelio de los Reyes", "NULL", "Ej 2", "Obras generales", "origenescine.png", 1);
INSERT INTO Book VALUES (NULL, "082S46254", "La madre mis confeciones", "Máximo Gorki", "NULL", "Ej 1", "Obras generales", "lamadre.png", 1);
INSERT INTO Book VALUES (NULL, "135.42G37", "El alquimista errante paracelso", "Horacio García", "NULL", "Ej. 1", "FILOSOFÍA Y PSICOLOGÍA", "elalquimista.png", 1);
INSERT INTO Book VALUES (NULL, "160D51979", "Curso de Lógica", "Carlos Dión Martínez", " ", "Ej. 2", "FILOSOFÍA Y PSICOLOGÍA", "curlogica.png", 1);
INSERT INTO Book VALUES (NULL, "155.422D6", "Cómo enseñar matemáticas a su bebé", "Glenn J. Doman", "NULL", "Ej. 3", "FILOSOFÍA Y PSICOLOGÍA", "matbebe.png", 1);
INSERT INTO Book VALUES (NULL, "199.72Z43", "Colección cuadernos americanos", "Leopoldo Zea", "NULL", "Ej. 3", "FILOSOFÍA Y PSICOLOGÍA", "coleccion.png", 1);
INSERT INTO Book VALUES (NULL, "155.232T73", "Niños agresivos ¿Qué hacer?", "Alan Train", "V.1", "Ej. 1", "FILOSOFÍA Y PSICOLOGÍA", "niñosagresivos.png", 1);
INSERT INTO Book VALUES (NULL, "155.8972M66", "Amor perdido", "Carlos Monsiváis", "NULL", "Ej. 1", "FILOSOFÍA Y PSICOLOGÍA", "amorperdido.png", 1);
INSERT INTO Book VALUES (NULL, "177G285", "La ética", "Mercedes Garzón Bates", "NULL", "NULL", "FILOSOFÍA Y PSICOLOGÍA", "laetica.png", 1);
INSERT INTO Book VALUES (NULL, "100.6G47", "Micro-electronica", "S. Gergely", "V.1", "Ej. 1", "FILOSOFÍA Y PSICOLOGÍA", "microelectronica.png", 1);
INSERT INTO Book VALUES (NULL, "100-M35", "Introducción a la filosofía", "Héctor D. Mandrioni", "V.1", "Ej. 3", "FILOSOFÍA Y PSICOLOGÍA", "intfilosofia.png", 1);
INSERT INTO Book VALUES (NULL, "153.4CH3", "Psicología de los juegos", "Jean Chateau", "NULL", "Ej. 2", "FILOSOFÍA Y PSICOLOGÍA", "Psicologia.png", 1);
INSERT INTO Book VALUES (NULL, "190205", "Las aventuras de los jóvenes dioses", "Eduardo Galeano", "V.1", "Ej. 1", "RELIGIÓN", "lasaventuras.png", 1);
INSERT INTO Book VALUES (NULL, "291B52", "Enciclopedia de las creencias y religiones", "Jorge Blaschke", "V.1", "Ej. 1", "RELIGIÓN", "enciclopedia.png", 1);
INSERT INTO Book VALUES (NULL, "294..56212V42", "El rig veda", "Anónimo", "NULL", "NULL", "RELIGIÓN", "elrig.png", 1);
INSERT INTO Book VALUES (NULL, "299.792T73", "Dioses mitos y ritos del México antiguo", "Silvia Trejo", "V.1", "EJ. 1", "RELIGIÓN", "dioses.png", 1);
INSERT INTO Book VALUES (NULL, "299.792M285", "Mitología de coyolxauhqui", "Cesar Macazaga", "V.1", "Ej. 1", "RELIGIÓN", "mitologia.png", 1);
INSERT INTO Book VALUES (NULL, "230P34", "La edad de la razón", "Thomas Paine", "NULL", "Ej. 1", "RELIGIÓN", "laedad.png", 1);
INSERT INTO Book VALUES (NULL, "291.171B44", "Y la religión ¿para qué?", "Hermann Von Bertrab", "V.1", "Ej. 1", "RELIGIÓN", "ylareligion.png", 1);
INSERT INTO Book VALUES (NULL, "232.917B72", "La virgen de guadalupe imagén y tradición", "David A. Brading", "V.1", "Ej. 1", "RELIGIÓN", "lavirgen.png", 1);
INSERT INTO Book VALUES (NULL, "232.91M32", "El guadalupanismo mexicano", "Francisco de la maza", "V.1", "Ej. 1", "RELIGIÓN", "guadalupanismo.png", 1);
INSERT INTO Book VALUES (NULL, "220.09T82", "Pueblos de la biblia", "Jonattahan N. Tubb", "V.1", "Ej. 1", "RELIGIÓN", "pueblos.png", 1);
INSERT INTO Book VALUES (NULL, "305.4097252ARR", "Las mujeres dela ciudad de México", "Silva María Arrom", "V.1", " Ej. 1", "CIENCIAS SOCIALES", "lasmujeres.png", 1);
INSERT INTO Book VALUES (NULL, "362.293V43", "La accion social ante las drogas", "Amando Vega Fuente", "V.1", "Ej. 1", "CIENCIAS SOCIALES", "laaccion.png", 1);
INSERT INTO Book VALUES (NULL, "401M67", "Minucias del lenguaje", "José G. Moreno de Alba", "V.1 ", "Ej. 1", "CIENCIAS SOCIALES", "minucias.png", 1);
INSERT INTO Book VALUES (NULL, "370.15B46", "Bases psicológicas de la educación", "Morris  L. Bigge ", "NULL", "Ej. 2", "CIENCIAS SOCIALES", "basespsicologicas.png", 1);
INSERT INTO Book VALUES (NULL, "327.2S38", "El embajador de panama", "Marc Saudade", "NULL", "Ej. 1", "CIENCIAS SOCIALES", "elembajador.png", 1);
INSERT INTO Book VALUES (NULL, "301P46", "Cómo acercarse a la sociología", "Ricardo de la peña", "NULL", "NULL", "CIENCIAS SOCIALES", "sociologia.png", 1);
INSERT INTO Book VALUES (NULL, "302.23B65", "Medios de comunicación ", "Marcos Andres Bonvin", "V.1", "Ej. 1", "CIENCIAS SOCIALES", "medios.png", 1);
INSERT INTO Book VALUES (NULL, "300.7G57", "Nueva dinámica de la vida social ", "Ciro Gonzalez Blackaller", "V.1", "Ej. 1", "CIENCIAS SOCIALES", "nuevadinamica.png", 1);
INSERT INTO Book VALUES (NULL, "305.86872073S24", "México en tierra yanqui", "Victoriano Salado Álvarez", "NULL", "Ej. 1", "CIENCIAS SOCIALES", "mexicoentierra.png", 1);
INSERT INTO Book VALUES (NULL, "330.9G4", "Panorama del mundo actual ", "Pierre George", "NULL", "Ej. 1", "CIENCIAS SOCIALES", "panorama.png", 1);
INSERT INTO Book VALUES (NULL, "465.8B76", "Los verbos en español", "Busquets y L. Bonzi", "V. 1", "Ej. 1", "Español", "losverbos.png", 1);
INSERT INTO Book VALUES (NULL, "460.7L61", "Verbum", "Emma Lopez", "V.1", "Ej. 1", "Español", "verbum.png", 1);
INSERT INTO Book VALUES (NULL, "460.7A4", "Palabra y pensamiento", "Agustin Antonio Albarran", "V.3", "Ej. 3", "Español", "palabraypensamiento.png", 1);
INSERT INTO Book VALUES (NULL, "468S273", "Español texto y actividades", "Gilberto Sánchez Azuara", "V.1", "NULL", "Español", "españoltexto.png", 1);
INSERT INTO Book VALUES (NULL, "460CH9", "Español ", "Choren de ballester Jose", "V.1 ", "Ej. 1", "Español", "españoluno.png", 1);
INSERT INTO Book VALUES (NULL, "465B3", "Curso de redacción dinámica", "Hilda Basulto", "NULL", "NULL", "Español", "cursoredaccion.png", 1);
INSERT INTO Book VALUES (NULL, "468M83", "Lengua y comunicación ", "Graciela Murillo", "V.3", "NULL", "Español", "lengua.png", 1);
INSERT INTO Book VALUES (NULL, "468L658", "Español Activo", "Lucero Lozano", "V.3", "NULL", "Español", "españolactivo.png", 1);
INSERT INTO Book VALUES (NULL, "468CH98", "El universo 3 de las letras", "Pedro Teobaldo Chávez González", "V.3", "NULL", "Español", "eluniverso.png", 1);
INSERT INTO Book VALUES (NULL, "468A54", "Palabras sin fronteras 1", "Maricela Guadalupe Ángeles Calderón", "NULL", "NULL", "Español", "palabrassin.png", 1);
INSERT INTO Book VALUES (NULL, "512.0076A53", "Álgebra", "Agustin Anfossi", "V.1", "Ej. 1", "Matemáticas", "algebra.png", 1);
INSERT INTO Book VALUES (NULL, "512.7V34", "Algo hacer de los números lo curioso y lo divertido", "Santiago Valiente", "V.1", "Ej. 1", "Matemáticas", "numeros.png", 1);
INSERT INTO Book VALUES (NULL, "510.76L52", "Ejercicios de matemáticas 1", "Jesús Liceaga Ángeles", "V.1", "NULL", "Matemáticas", "ejerciciosmat.png", 1);
INSERT INTO Book VALUES (NULL, "536.2K4", "Procesos de transparencia de calor", "Donald Q. Kern", "V.1", "Ej. 1", "Física", "procesos.png", 1);
INSERT INTO Book VALUES (NULL, "530H372", "¿Sientes la fuerza?", "Richard Hammond", "V.1", "Ej. 1", "Física", "sienteslafuerza.png", 1);
INSERT INTO Book VALUES (NULL, "540Q465", "Química 2", "Aníbal Bascuñán", "V.2", "Ej. 1", "Química", "quimicados.png", 1);
INSERT INTO Book VALUES (NULL, "540.76O44", "Olimpiadas de química", "María Antonia Dosal Gómez", "V.1", "Ej. 1", "Química", "olimpiadas.png", 1);
INSERT INTO Book VALUES (NULL, "613.04A76", "Mejore su salud 24 maneras realistas", "Dr. Tim Arnott", "V.1", "Ej. 1", "Biología", "mejoresusalud.png", 1);
INSERT INTO Book VALUES (NULL, "613.79K4", "¡Descance y viva!", "Joseph Kennedy", "NULL", "Ej. 3", "Biología", "descanse.png", 1);
INSERT INTO Book VALUES (NULL, "614.4M3", "Principios y métodos de epidemiologia", "Brian Mac Mahon", "NULL", "Ej. 1", "Biología", "principios.png", 1);
INSERT INTO Book VALUES (NULL, "781.91C38", "Instrumental Precortesiano", "Daniel Castañeda", "NULL", "NULL", "Ciencias aplicadas", "instrumental.png", 1);
INSERT INTO Book VALUES (NULL, "621.3815H6", "Circuitos electrónicos digitales y analógicos", "Charles A. Holt", "V. 1", "Ej. 2", "Ciencias aplicadas", "circuitos.png", 1);
INSERT INTO Book VALUES (NULL, "696.1L38", "Plomería y calefacción", "Mike Lawrence", "NULL", "Ej. 1", "Ciencias aplicadas", "plomeria.png", 1);
INSERT INTO Book VALUES (NULL, "694M38", "Manual práctico de carpintería", "Juan Carlos Gil Espinosa", "V.1", "Ej. 1", "Ciencias aplicadas", "carpinteria.png", 1);
INSERT INTO Book VALUES (NULL, "730.09R43", "Apolo historia general de las artes plásticas", "Salomon Reinach", "NULL", "Ej. 3", "Ciencias aplicadas", "apolo.png", 1);
INSERT INTO Book VALUES (NULL, "658.4034S72", "Estadística para administración y economía ", "William J. Stevenson", "V.1", "Ej. 1", "Ciencias aplicadas", "estadistica.png", 1);
INSERT INTO Book VALUES (NULL, "793.73R58", "Acertijero", "Valentín Rincón", "V.1", "Ej. 1", "Ciencias aplicadas", "acertijero.png", 1);
INSERT INTO Book VALUES (NULL, "794.81526T46", "Videojuegos Manual para diseñadores gráficos", "Jim Thompson", "V.1", "Ej. 1", "Ciencias aplicadas", "videojuegos.png", 1);
INSERT INTO Book VALUES (NULL, "792.0226M36", "Escenografía teatro escolar y de muñecos", "Ignacio Méndez Amezcua", "NULL", "Ej. 1", "Ciencias aplicadas", "escenografia.png", 1);
INSERT INTO Book VALUES (NULL, "751.4K78", "Manual para el artista medios y técnicas", "Margaret Krug", "V.1", "Ej. 1", "Ciencias aplicadas", "manualartista.png", 1);
INSERT INTO Book VALUES (NULL, "808B55V64", "Obras escojidas ", "Voltaire Francois Marie", "NULL", "NULL", "Literatura", "obrasescogidas.png", 1);
INSERT INTO Book VALUES (NULL, "808bB55A57", "Antología de poetas líricos castellanos", "varios autores", "NULL", "NULL", "Literatura", "antologiapoetas.png", 1);
INSERT INTO Book VALUES (NULL, "813G657H47", "Hermanas devotas", "Eileen Goudge", "NULL", "Ej. 1", "Literatura", "hermanas.png", 1);
INSERT INTO Book VALUES (NULL, "801.954M87", "Polaridad-unidad, caminos hacia Octavio Paz", "Margarita Murillo González", "NULL", "NULL", "Literatura", "polaridad.png", 1);
INSERT INTO Book VALUES (NULL, "813D48S74", "¿Sueñan los androides con ovejas eléctricas?", "Philip K. Dick", "V.1", "Ej. 1", "Literatura", "sueñan.png", 1);
INSERT INTO Book VALUES (NULL, "809.93354R686", "Amor y occidente", "Denis de Rougemont", "NULL", "NULL", "Literatura", "amoroccidente.png", 1);
INSERT INTO Book VALUES (NULL, "813G5435E77", "El esposo divino", "Francisco Goldman", "V.1", "Ej. 1", "Literatura", "elesposo.png", 1);
INSERT INTO Book VALUES (NULL, "822.33S5R47", "El rey lear ", "William Shakespeare", "NULL", "Ej. 1", "Literatura", "elrey.png", 1);
INSERT INTO Book VALUES (NULL, "808L36", "Introducción a los estudios literarios", "Rafael Lapesa", "NULL", "Ej. 3", "Literatura", "introduccion.png", 1);
INSERT INTO Book VALUES (NULL, "813B7P34", "El país de octubre", "Ray Bradbury", "NULL", "NULL", "Literatura", "elpais.png", 1);
INSERT INTO Book VALUES (NULL, "861MA76A57", "Antología poética (1960-1994)", "Homero Aridjis", "NULL", "Ej. 1", "Literatura", "antología.png", 1);
INSERT INTO Book VALUES (NULL, "823R787H375", "Harry potter y la piedra filosofal", "Rowing, Joanne Kathleen", "V.1", "Ej. 1", "Literatura", "harry.png", 1);
INSERT INTO Book VALUES (NULL, "823M54F55", "El filo de la navaja", "Willam Somerset Maugham", "V.1", "Ej. 1", "Literatura", "filo.png", 1);
INSERT INTO Book VALUES (NULL, "823A27R84", "Ruinas", "Brian Aldiss", "NULL", "Ej. 1", "Literatura", "ruinas.png", 1);
INSERT INTO Book VALUES (NULL, "864MM65", "Amor perdido", "Carlos Monsiváis", "NULL", "Ej. 3", "Novelas", "amorperdido.png", 1);
INSERT INTO Book VALUES (NULL, "863MM3326M47", "La merced ", "Jose Guillermo Magaña", "NULL", "Ej. 1", "Novelas", "merced.png", 1);
INSERT INTO Book VALUES (NULL, "891.4101J64", "La palabra de los aztecas", "Patrick Johansson", "V.1", "Ej. 1", "Novelas", "lapalabra.png", 1);
INSERT INTO Book VALUES (NULL, "868MB485", "Un chavo bien helado", "José Joaquín Blanco", "NULL", "Ej. 1", "Novelas", "chavo.png", 1);
INSERT INTO Book VALUES (NULL, "868MV48", "Vicente Riva Palacio", "José Ortiz Monasterio", "NULL", "NULL", "Novelas", "vicente.png", 1);
INSERT INTO Book VALUES (NULL, "NG65M35", "Mambrú se fue a la guerra", "José Luis González", "NULL", "Ej. 2", "Novelas", "mambrú.png", 1);
INSERT INTO Book VALUES (NULL, "909G7", "Roma", "Carl Grimberg", "V.3", "Ej. 2", "Geografía", "roma.png", 1);
INSERT INTO Book VALUES (NULL, "909G7", "El siglo del liberalismo", "Carl Grimberg", "V.11", "Ej. 1", "Geografía", "liberalismo.png", 1);
INSERT INTO Book VALUES (NULL, "909G7", "El siglo de la ilustracion", "Carl Grimberg", "V.9", "Ej. 2", "Geografía", "ilustracion.png", 1);
INSERT INTO Book VALUES (NULL, "909G7", "Los siglos del gotico ", "Carl Grimberg", "V.5", "Ej. 2", "Geografía", "gotico.png", 1);
INSERT INTO Book VALUES (NULL, "928.61R46R32", "El luto humano de Jose Revueltas", "Antoine Rabadán", "NULL", "Ej. 1", "Historia", "elluto.png", 1);
INSERT INTO Book VALUES (NULL, "928.61P42P43", "Itinerario", "Octavio Paz", "NULL", "Ej. 1", "Historia", "itinerario.png", 1);
INSERT INTO Book VALUES (NULL, "927.59972B67T52", "Hermenégildo Bustos", "Raquel Tibol", "NULL", "Ej. 1", "Historia", "hermenegildo.png", 1);
INSERT INTO Book VALUES (NULL, "972.0098N33D43", "El tequio de los santos y la competencia entre los mercaderes", "Daniele Dehouve", "NULL", "Ej. 1", "Historia", "eltequio.png", 1);
INSERT INTO Book VALUES (NULL, "972.75V677", "Los enredos de remesal", "Jan de Vos", "NULL", "Ej. 1", "Historia", "losenredos.png", 1);
INSERT INTO Book VALUES (NULL, "972.01A744", "Ciudades del México prehispánico", "Luis E. Arochi", "NULL", "Ej. 1", "Historia", "ciudades.png", 1);
INSERT INTO Book VALUES (NULL, "972.01A744", "Tajín y los siete truenos", "Felipe carrido", "NULL", "Ej. 3", "Infántil", "tajin.png", 1);
INSERT INTO Book VALUES (NULL, "972.01A744", "El reino de los animales", "George S. Fichter", "NULL", "Ej. 2", "Infántil", "reino.png", 1);
INSERT INTO Book VALUES (NULL, "972.01A744", "Discurso del oso", "Julio Cortázar", "V. 1", "Ej. 1", "Infántil", "discurso.png", 1);
INSERT INTO Book VALUES (NULL, "972.01A744", "El higo más dulce", "Chris Van Allsburg", "NULL", "NULL", "Infántil", "dulce.png", 1);
INSERT INTO Book VALUES (NULL, "972.01A744", "Un cambio de piel", "Tere Remolina", "NULL", "NULL", "Infántil", "cambio.png", 1);
INSERT INTO Book VALUES (NULL, "972.01A744", "Hijos de la primavera", "Daniel Goldin", "NULL", "NULL", "Infántil", "hijos.png", 1);
INSERT INTO Book VALUES (NULL, "972.01A744", "Una dulce historia de mariposas y libélulas", "Jordi Sierra i Fabra", "V. 1", "Ej. 1", "Infántil", "dulce.png", 1);
INSERT INTO Book VALUES (NULL, "972.01A744", "Peregrinos del amazonas", "Alfredo Gómez Cerdá", "NULL", "NULL", "Infántil", "peregrinos.png", 1);
INSERT INTO Book VALUES (NULL, "972.01A744", "¿Has sido tú, kasimir?", "Achim Broger", "NULL", "Ej. 3", "Infántil", "kasimir.png", 1);
INSERT INTO Book VALUES (NULL, "972.01A744", "La época liberai", "Fabiola García Rubio", "V. 1", "Ej. 1", "Infántil", "epoca.png", 1);

-- ------------------------------------------------
-- Recommendation
-- ------------------------------------------------
INSERT INTO Recommendation VALUES (NULL, 25, "2015/5/22", "El presidente", 1);
-- ------------------------------------------------

-- ------------------------------------------------
-- User
-- ------------------------------------------------
INSERT INTO User VALUES ("gova_ac35", SHA("biblio_1167"), "Giovanni", "Aguayo Cerros", "C. del rosal #35, lomas doradas, Villanueva, Zac", "4991020523", 15, "Imelda Cerros Muro", "gova_35@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("aurora_ag64", SHA("biblio_1167"), "Aurora", "Aguayo Cerros", "C. centenario #64, COL. Las flores, Villanueva , Zac", "4991036599", 16, "Benito Aguayo D", "aurora_64@hotmail.com", 0, 1);
INSERT INTO User VALUES ("albert_as2", SHA("biblio_1167"), "Jorge Alberto", "Avila Salas", "C. Bellavista #2, COL. Nueva, Villanueva, Zac", "4999261117", 8, "Jorge Alberto Avila Montalvo", "albert_2@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("merry_ad62", SHA("biblio_1167"), "María Inés", "Aviles Dominguez", "C. Hidalgo #62A, Atitanac Villanueva, Zac", "9478266", 57, "Ramón Briseño Montalvo", "merry_62@hotmail.com", 0, 1);
INSERT INTO User VALUES ("reefu_am64", SHA("biblio_1167"), "J. Refugio", "Avila Martinez", "C. Porvenir #64, Villanueva, Zac.", "4999260266", 47, "Alberto Márquez Márquez", "reefu_64@hotmail.com", 0, 1);
INSERT INTO User VALUES ("marben_ar33", SHA("biblio_1167"), "Erika Marben", "Aguayo R", "C. san judas #33, Villanueva, Zac.", "4999262369", 11, "Lucila Rodriguez Rodriguez", "marben_33@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("gema_ar80", SHA("biblio_1167"), "Gema Edith", "Almazán R", "C. Pascual santoyo #80, Villanueva, Zac.", "4999262418", 11, "Selina Ramírez Camacho", "gema_80@hotmail.com", 0, 1);
INSERT INTO User VALUES ("lily_ap118", SHA("biblio_1167"), "Liliana", "Arellano Pacheco", "C. Del transito #118, Villanueva, Zac.", "NULL", 11, "Marcela Pacheco Garcia", "lily_118@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("cecy_at26", SHA("biblio_1167"), "Laura Cecilia", "Altamirano Torres", "C. Loma del diezmo #26, Villanueva, Zac.", "4999260540", 9, "Cecilia Torres ", "cecy_26@hotmail.com", 0, 1);
INSERT INTO User VALUES ("isabel_as3", SHA("biblio_1167"), "Alejandra Isabel", "Avila Siqueiros", "C. Monte Moriah #3, Frac. Monte de la cruz coprovi", "NULL", NULL, "Alejandra Siqueiros Contreras", "isabel_3@hotmail.com", 0, 1);
INSERT INTO User VALUES ("lupe_ar12", SHA("biblio_1167"), "J. Guadalupe", "Alonso Rubalcava", "C. 24 de febrero #12 A, COL. Loma del diezmo, Villanueva, Zac", "4991008131", 11, "Mauela Rubalcava Gonzaléz", "lupe_12@hotmail.com", 0, 1);
INSERT INTO User VALUES ("omaar_ac167", SHA("biblio_1167"), "Erick Omar", "Avila Carrillo ", "C. Venustiano Carranza #167, COL.  Nueva, Villanueva, Zac.", "4999261862", 8, "Ma. Guadalupe Carrillo Méndez", "omaar_167@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("ely_ag3", SHA("biblio_1167"), "Maria Elena ", "Alvarez G", "C. Privada los sauces 3.A Villanueva, Zac.", "4929464901", 40, "Omar Alejandro Morales Villa", "ely_3@hotmail.com", 0, 1);
INSERT INTO User VALUES ("andy_am14", SHA("biblio_1167"), "Andrea", "Aguayo Muro", "C. Himno nacional #14, COL. Magisterial, Villanueva, Zac.", "4999262483", 22, "M. Guadalupe Muro Márquez", "andy_14@hotmail.com", 0, 1);
INSERT INTO User VALUES ("joce_ag8", SHA("biblio_1167"), "Jocelyn", "Avila Gonzalez ", "C. A de la penitencia #8, Villanueva, Zac.", "4999260454", 11, "Susana M. González Rios", "joce_8@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("david_ac167", SHA("biblio_1167"), "David ", "Avila Carrillo ", "C. Venustiano Carranza #167, Col Nueva, Villanueva, Zac.", "4999261862", 12, "Ma. Guadalupe Carrillo Méndez", "david_167@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("miky_at19", SHA("biblio_1167"), "Miguel", "Arias de la Torre", "C. El árbolito #19, La encarnación Villanueva, Zac.", "4991006013", 15, "Ma. Lourdes Carrillo Rodriguez", "miky_19@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("mary_ac27", SHA("biblio_1167"), "María ", "Alfaro de la Cruz", "C. Morelos #27, Col Centro Villanueva, Zac.", "4991020163", 18, "Maria Monserrath Guardado Almeida", "mary_27@hotmail.com", 0, 1);
INSERT INTO User VALUES ("rosa_at9", SHA("biblio_1167"), "Alma Rosa", "Arjón Trujillo", "C. Sor juana ines de la cruz #9, COL Sierra nevada, Villanueva, Zac.", "4999261940", 22, "Laura Isela Arjón Trujillo", "rosa_9@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("nereyda_ag10", SHA("biblio_1167"), "Brenda Nereyda", "Avila Gonzalez ", "C. Pascual santoyo #10, COL Lindavista, Villanueva, Zac.", "4991020054", 27, "Maria Nazareth Reveles Ruiz", "nereyda_10@hotmail.com", 0, 1);
INSERT INTO User VALUES ("rafa_bf38", SHA("biblio_1167"), "Rafael", "Barajas Fernández", "C. del cartero #38, Villanueva, Zac.", "NULL", 12, "Hector Barajas García", "rafa_38@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("oscaar_ba", SHA("biblio_1167"), "Oscar", "Barraza de Avila", "C. De las torres s/n Centro", "4991021532", 15, "Ruth de Avila Delgado", "oscaar_@hotmail.com", 0, 1);
INSERT INTO User VALUES ("mando_ba3", SHA("biblio_1167"), "M. Armando", "Barrios de Avila", "C. Francisco Villa #3B, Villanueva, Zac.", "4991009335", NULL, "Alma Yesenia de Avila Villegas", "mando_3@hotmail.com", 0, 1);
INSERT INTO User VALUES ("jeimy_br6", SHA("biblio_1167"), "Jeimy ", "Basurto Rodriguez", "C. Garcia salinas #6, Villanueva, Zac.", "4991002955", 4, "Martha Isabel Basurto Rodriguez", "jeimy_6@hotmail.com", 0, 1);
INSERT INTO User VALUES ("mary_bt9", SHA("biblio_1167"), "María del Carmen", "Bugarín Trujillo", "Av. Naranjo #9, Villanueva, Zac.", "4999261489", 21, "Marisol Aléman Trujillo", "mary_9@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("rafa_cp1", SHA("biblio_1167"), "Rafael C.", "Collazo Perez", "C. Francisco Villa #1, El tigre Villanueva, Zac.", "4999260268", 15, "Raymundo Perez Hernandez", "rafa_1@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("alexia_ca13", SHA("biblio_1167"), "Alexia J", "Cardona Arteaga", "C. Loma del diezmo #13, Villanueva, Zac.", "4991001366", 11, "Alexia Jazmín Cardona Arteaga", "alexia_13@hotmail.com", 0, 1);
INSERT INTO User VALUES ("limni_cc26", SHA("biblio_1167"), "Limni", "Casas Cortez", "C. Matamoros #26, Villanueva, Zac.", "4999262448", 15, "Ruben Casas Sandoval", "limni_26@hotmail.com", 0, 1);
INSERT INTO User VALUES ("hector_cv23", SHA("biblio_1167"), "Hector", "Collazo V", "C. Alamitas #23, COL. Colosio, Villanueva, Zac", "NULL", 46, "Alicia Colazo Villagrana", "hector_23@hotmail.com", 0, 1);
INSERT INTO User VALUES ("esther_cq10", SHA("biblio_1167"), "Esther", "Carrillo Quintero", "C. Purísima #10B, Villanueva, Zac.", "4999260562", 11, "Ma Esther Quintero M.", "esther_10@hotmail.com", 0, 1);
INSERT INTO User VALUES ("karla_cf25", SHA("biblio_1167"), "Karla", "Ceballos Frausto", "C. Escuadra del aviador #25, Villanueva, Zac.", "4999261127", 11, "Beatriz Frausto Fernandez", "karla_25@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("naty_cc5", SHA("biblio_1167"), "Natalia", "Corvera Cabrera", "C. Miguel hidalgo #5A, COL. Nueva, Villanueva, Zac.", "NULL", 6, "Irene Cabrera Sánchez", "naty_5@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("luis_cm61", SHA("biblio_1167"), "Luis Fernando", "Corvera Marquez", "C. Madero #61, Villanueva, Zac.", "4999260408", 6, "Claudia Nabeth Marquez Renteria ", "luis_61@hotmail.com", 0, 1);
INSERT INTO User VALUES ("mayra_cm22", SHA("biblio_1167"), "Mayra A", "Collazo Muñoz", "C. Loma de tlalpan #22, Villanueva, Zac", "4991004151", 26, "Cesar Marquez Martinez", "mayra_22@hotmail.com", 0, 1);
INSERT INTO User VALUES ("mary_cv7", SHA("biblio_1167"), "Maria ", "Castellanos Valencia", "C. Priv la huerta #7, COL. Barrio de guadalupe, Villanueva, Zac.", "4991027702", 35, "Luis Gutierrez Carrillo", "mary_7@hotmail.com", 0, 1);
INSERT INTO User VALUES ("cris_df5", SHA("biblio_1167"), "Cristopher", "De avila Flores", "C. de los ramirez #5, COL. Nueva, Villanueva, Zac", "4999260869", 5, "Cecilia Maricruz Flores Frias", "cris_5@hotmail.com", 0, 1);
INSERT INTO User VALUES ("david_dp62", SHA("biblio_1167"), "David ", "Davila Puente", "C. Gutierrez del aguila #62, Villanueva, Zac.", "NULL", 6, "Enriqueta Puente Reveles", "david_62@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("gaby_dh25", SHA("biblio_1167"), "Gabriela", "De la cruz Huerta", "C. Morelos #77, Villanueva, Zac.", "49992660271", 20, "Maria Lourdes de la Cruz H", "gaby_25@hotmail.com", 0, 1);
INSERT INTO User VALUES ("clara_dc25", SHA("biblio_1167"), "Clara", "De avila Ceballos", "C. Escuadra del aviador #25, Villanueva, Zac.", "4999261127", 11, "Beatriz Frausto Fernandez", "clara_25@hotmail.com", 0, 1);
INSERT INTO User VALUES ("eliza_dv15", SHA("biblio_1167"), "Elizabeth", "Delgado Vargas", "C. Cobre #15, COL. Sierra nevada, Villanueva, Zac.", "4991008342", 31, "Ma de Jesus Delgado Vargas", "eliza_15@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("luz_dc16", SHA("biblio_1167"), "Luz Ofelia", "De loera Cornejo", "C. Independencia #16, Villanueva, Zac.", "NULL", 21, "Ofelia Cornejo", "luz_16@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("rosario_dg63", SHA("biblio_1167"), "Ma del Rosario", "Delgado Galvez", "C. Del rocio #63, Barrio de guadalupe, Villanueva, Zac.", "4991036605", 34, "José de Jesus Villagrana Avila", "rosario_63@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("cristina_dv14", SHA("biblio_1167"), "Cristina", "De loera Velazquez ", "C. De las torres #14, COL. Nueva, Villanueva, Zac.", "4991033257", 12, "Juana Velazquez Vera", "cristina_14@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("jesus_db72", SHA("biblio_1167"), "Jesús ", "Damasco B", "C. Del transito #72G, COL. Sierra nevada, Villanueva, Zac.", "NULL", 11, "Josefina Bañuelos Vázquez", "jesus_72@hotmail.com", 0, 1);
INSERT INTO User VALUES ("jesus_dh11", SHA("biblio_1167"), "Jesús ", "Dávila Hurtado", "C. Pascual Santoyo #11, Villanueva, Zac.", "4991021787", 14, "Esther Hurtado Huerta", "jesus_11@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("ana_d18", SHA("biblio_1167"), "Ana Maria ", "Delgado", "C. Francisco Villa #18A, Villanueva, Zac.", "4991027948", 19, "Francisco Javier Castro de la Rosa", "ana_18@hotmail.com", 0, 1);
INSERT INTO User VALUES ("hector_dr3", SHA("biblio_1167"), "Hector", "Del muro Rivas", "Privada de los sauces #3B, Fraccionamiento sauces", "NULL", 8, "Leticia Rivas Barajas", "hector_3@hotmail.com", 0, 1);
INSERT INTO User VALUES ("pedro_dm9", SHA("biblio_1167"), "Pedro", "Dominguez Mejia", "Privada de los sauces #9A, Fraccionamiento sauces", "4991023285", 20, "Maria Josefina Mejia Avila", "pedro_9@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("ivan_dg17", SHA("biblio_1167"), "Adrian Iván", "De león González", "C. Luis moya #17, COL. Centro, Villanueva, Zac.", "NULL", 10, "Sonia González Pinales", "ivan_17@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("cesar_dc30", SHA("biblio_1167"), "Cesar Alejandro", "De Loera Carlos", "C. Madrid #30, COL. Nueva, Villanueva, Zac.", "NULL", 14, "Teresa Carlos Magadán", "cesar_30@hotmail.com", 0, 1);
INSERT INTO User VALUES ("gris_ev9", SHA("biblio_1167"), "Gricelda", "Escobedo V", "C. Tampico #9, La quemada Villanueva, Zac.", "4999262241", 25, "David Escobedo Villegas", "gris_9@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("juan_ea10", SHA("biblio_1167"), "Juan Diego", "Escareño Avila", "C. Del almo #10, Villanueva, Zac.", "4999261900", 11, "Ma del Socorro Avila Alfaro", "juan_10@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("manuel_er5", SHA("biblio_1167"), "Manuel de Jesus", "Escobedo Raygoza", "C. 2 de abril #5, COL. La oma del diezmo, Villanueva, Zac.", "4991033077", 8, "Ma de la luz Raygoza Hernandez", "manuel_5@hotmail.com", 0, 1);
INSERT INTO User VALUES ("nayeli_e7", SHA("biblio_1167"), "Nayeli", "Escobedo", "C. San antonio #45, Fraccionamiento san tadeo", "4999261927", 13, "Salvador Escobedo Urquizo", "nayeli_7@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("alexa_ee7", SHA("biblio_1167"), "Alexa", "Enriquez Escareño", "C. Allende #7, Villanueva, Zac.", "4999261498", 6, "Claudia Escareño P", "alexa_7@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("diego_ea10", SHA("biblio_1167"), "J. Diego", "Escareño Avila", "C. Olmo #10, COL. Sierra nevada, Villanueva, Zac.", "4999261900", 7, "Ma. Del Socorro Avila Alfaro", "diego_10@hotmail.com", 0, 1);
INSERT INTO User VALUES ("jesus_er21", SHA("biblio_1167"), "Jesus M", "Escareño Ramos", "C. Escuadra del aviador #21, Villanueva, Zac.", "NULL", 18, "Nora Edith Escareño Ramos", "jesus_21@hotmail.com", 0, 1);
INSERT INTO User VALUES ("kevin_er14", SHA("biblio_1167"), "Kevin", "Escobedo Romero", "C. Gral. Ignacio López Rayón #14, Villanueva Zac.", "4991009732", 11, "Evelia Romero González", "kevin_14@hotmail.com", 0, 1);
INSERT INTO User VALUES ("jose_eb", SHA("biblio_1167"), "Jose Antonio", "Escobedo Briseño", "El salto Villanueva, Zac.", "4991006377", 16, "Gilberto Escobedo Garcia", "jose_@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("alexis_er14", SHA("biblio_1167"), "Alexis", "Escareño Romero", "C. Benito Juarez #18, Villanueva Zac.", "NULL", 8, "Cecilia Romero Avila", "alexis_14@hotmail.com", 0, 1);
INSERT INTO User VALUES ("rafael_fg19", SHA("biblio_1167"), "Juan Rafael ", "Flores Gutierrez", "C. Escuadra del aviador #19, Villanueva, Zac.", "4999262362", 7, "Norma Patricia Gutierrez Carrillo", "rafael_19@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("tony_fa9", SHA("biblio_1167"), "Antonio", "Félex Acosta", "C. Bugambilias #9, Fraccionamiento Jardines de ramón lópez V.", "4949451416", 56, "José Antonio Luna Aguilar", "tony_9@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("enrique_fo3", SHA("biblio_1167"), "Enrique", "Flores Ortega", "C. Arroyo de la penitencia #3A, Villanueva Zac.", "NULL", 8, "Oliva Ortega C.", "enrique_3@hotmail.com", 0, 1);
INSERT INTO User VALUES ("jona_ff5", SHA("biblio_1167"), "Jonathan", "Flores Frias", "C. de los ramirez #5, COL Nueva, Villanueva, Zac", "NULL", 7, "Margarita Frias Herrera", "jona_5@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("tadeo_fc3", SHA("biblio_1167"), "Tadeo ", "Flores Chavarría", "C. Del trueno #3, COL. Flores del pedregal, Villanueva, Zac.", "NULL", 11, "Beatriz Chavarría chavarría", "tadeo_3@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("jesus_fm", SHA("biblio_1167"), "J. Jesús", "Figueroa Manzo", "El Tigre Villanueva, Zac.", "4999262058", 29, "Ma. Auxilio Delgado Sánchez", "jesus_@hotmail.com", 0, 1);
INSERT INTO User VALUES ("karla_gh63", SHA("biblio_1167"), "Karla Guadalupe", "Gálvez Herrera", "C. Madero #63, Villanueva, Zac.", "4991021286", 11, "Isabel Gálvez Herrera", "karla_63@hotmail.com", 0, 1);
INSERT INTO User VALUES ("velia_gm42", SHA("biblio_1167"), "Velia Alexa", "Gutierrez Mora", "C. Monterrey #42, COL. Nueva, Villanueva, Zac.", "4929266829", 7, "Ericka Mora Medina", "velia_42@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("adan_gh23", SHA("biblio_1167"), "Adan Jesús", "Gomez Herrera", "C. Del panteon #23, Villanueva Zac.", "4991021036", 9, "Ma. Concepción Herrera M.", "adan_23@hotmail.com", 0, 1);
INSERT INTO User VALUES ("jose_gm27", SHA("biblio_1167"), "Ma. Jose", "Gómez Martínez", "C. Del tránsito #27, Villanueva Zac.", "NULL", NULL, "NULL", "jose_27@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("annet_gv37", SHA("biblio_1167"), "Annet Michel", "Guardado Villegas", "Av. Allende #37, Villanueva Zac.", "4999260120", 6, "Alfredo Guardado Muro", "annet_37@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("esme_g145", SHA("biblio_1167"), "Esmeralda", "Guzman", "C. Venustiano Carranza #145, COL. Nueva, Villanueva, Zac.", "4999262274", 11, "Gabriel Guzmán Sánchez", "esme_145@hotmail.com", 0, 1);
INSERT INTO User VALUES ("dago_gg9", SHA("biblio_1167"), "Dagoberto", "Gonzalez Garcia", "C. Brisas #9, barrio guadalupe Villanueva  Zac.", "4999262364", 11, "Pablo Gonzalez Puentes", "dago_9@hotmail.com", 0, 1);
INSERT INTO User VALUES ("gibran_ge6", SHA("biblio_1167"), "Gibrán", "Garcia Escobedo", "C. Garcia de la cadena #6, Villanueva Zac.", "4999260887", 11, "Maria del Socorro Escobedo Dávila", "gibran_6@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("mary_gv10", SHA("biblio_1167"), "Maria Guadalupe", "Guardado Vargas", "C. Pinos #10, Villanueva Zac.", "4999260825", 15, "Gabriela Vargas Orozco", "mary_10@hotmail.com", 0, 1);
INSERT INTO User VALUES ("luis_g75", SHA("biblio_1167"), "Luis Mario ", "García", "C. Santa anita #75, COL. Santa anita, Villanueva Zac.", "4999260433", 11, "Luis Mario Garcia", "luis_75@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("diana_gs20", SHA("biblio_1167"), "Diana ", "Gutierrez Saldaña", "C. Esmeralda #20, COL. Palmares escobedo #20, Villanueva Zac.", "NULL", 8, "Olivia Saldaña Galvez", "diana_20@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("ricardo_gp60", SHA("biblio_1167"), "Ricardo", "Gutierrez Perez", "C. Libertad #60, Villanueva Zac.", "4999261783", 8, "Martina Perez Ramirez", "ricardo_60@hotmail.com", 0, 1);
INSERT INTO User VALUES ("victor_gm1", SHA("biblio_1167"), "Victor ", "Garcia Martinez", "C. Bentito juarez #1, COL. Linda vista, Villanueva Zac.", "NULL", 15, "Salvador García Cerna", "victor_1@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("fabian_gv6", SHA("biblio_1167"), "Fabián ", "Gonzalez Valdez", "C. Santa julia #6A, COL. Santa anita, Villanueva Zac.", "4991037760", 11, "Maria Antonia Valdez de León", "fabian_6@hotmail.com", 0, 1);
INSERT INTO User VALUES ("citlali_gv6", SHA("biblio_1167"), "Citlali Lisset", "González Valdez", "C. Santa julia #6A, COL. Santa anita, Villanueva Zac.", "4991037760", 5, "Maria Antonia Valdez de León", "citlali_6@hotmail.com", 0, 1);
INSERT INTO User VALUES ("mariana_hc65", SHA("biblio_1167"), "Mariana", "Herrera Castillo", "C. Vicente Guerrero #65, El jaguey Villanueva Zac.", "4941022947", 17, "Maria de Jesús Castillo Reveles", "mariana_65@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("jorge_hv64", SHA("biblio_1167"), "Jorge", "Hernández Vázquez", "C. Porvenir #64, Villanueva, Zac.", "4991004319", 26, "Ma de Jesús Villegas Raygoza", "jorge_64@hotmail.com", 0, 1);
INSERT INTO User VALUES ("estefanía_hu36", SHA("biblio_1167"), "Estefanía", "Hernández Urquizo", "C. López Potillo #36, COL. Nueva, Villanueva Zac.", "NULL", 6, "Amelia Urquizo Lozano", "estefanía_36@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("sandy_hr13", SHA("biblio_1167"), "Sandra Yareni", "Herrera Rodriguez", "C. Del maíz #13, Villanueva Zac.", "NULL", 17, "Leticia Rodríguez Rodríguez", "sandy_13@yahoo.com.mx", 0, 1);
INSERT INTO User VALUES ("mario_hm29", SHA("biblio_1167"), "Mario Roberto", "Hernández Murillo", "C. Primavera #29, COL. Loma dorada, Villanueva Zac.", "4991003323", 12, "Ma Guadalupe Murillo Rondán", "mario_29@hotmail.com", 0, 1);
INSERT INTO User VALUES ("jazmín_hm29", SHA("biblio_1167"), "Jazmín", "Hernández Murillo", "C. Primavera #29, COL. Loma dorada, Villanueva Zac.", "4991003323", 15, "Ma Guadalupe Murillo Rondán", "jazmín_29@hotmail.com", 0, 1);
INSERT INTO User VALUES ("lizeth_hm29", SHA("biblio_1167"), "Lizeth", "Hernández Murillo", "C. Primavera #29, COL. Loma dorada, Villanueva Zac.", "4991003323", 10, "Ma Guadalupe Murillo Rondán", "lizeth_29@yahoo.com.mx", 0, 1);
-- Bibliotecario
INSERT INTO User VALUES ("bibliotecario", SHA("villanueva_1167"), "Bibliotecario", "", "C. Matamoros #41, COL. Centro, Villanueva Zac.", "4999262717", 0, " ", "bmpvzvillanueva@hotmail.com", 1, 1);
