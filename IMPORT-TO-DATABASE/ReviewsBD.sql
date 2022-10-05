-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 04, 2022 at 09:15 PM
-- Server version: 8.0.30-0ubuntu0.20.04.2
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ReviewsBD`
--

-- --------------------------------------------------------

--
-- Table structure for table `generos`
--

CREATE TABLE `generos` (
  `ID` int NOT NULL,
  `Nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `generos`
--

INSERT INTO `generos` (`ID`, `Nombre`) VALUES
(1, 'Terror'),
(2, 'Romance'),
(3, 'Infantil'),
(4, 'Accion'),
(5, 'Ciencia Ficcion'),
(6, 'Fantástico'),
(7, 'Thriller'),
(8, 'Drama'),
(9, 'Comedia'),
(10, 'Novela'),
(11, 'Obra teatral');

-- --------------------------------------------------------

--
-- Table structure for table `libros`
--

CREATE TABLE `libros` (
  `ID` int NOT NULL,
  `Titulo` varchar(90) NOT NULL,
  `Autor` varchar(90) NOT NULL,
  `ID_Genero` int DEFAULT NULL,
  `Portada` varchar(255) DEFAULT NULL,
  `Rating` float NOT NULL DEFAULT '0',
  `Descripcion` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `libros`
--

INSERT INTO `libros` (`ID`, `Titulo`, `Autor`, `ID_Genero`, `Portada`, `Rating`, `Descripcion`) VALUES
(1, 'Cementerio de mascotas', 'Stephen King', 1, 'petSematary.jpg', 0, 'Cuando el Dr. Louis Creed deja Chicago y se traslada con su familia a la idílica ciudad de Ludlow, en Maine, todo en la vida parece sonreírles. Pero en ese paisaje idílico un peligro oculto acecha a la comunidad.'),
(2, 'Duna', 'Frank Herbert', 5, 'duna.jpg', 0, 'Dune relata la historia del planeta desértico Arrakis, única fuente de melange, la especia necesaria para el viaje interestelar y que además garantiza longevidad y poderes psíquicos. La administración de Arrakis es transferida por el emperador de la noble Casa de Harkonnen a la Casa Atreides. Lo que desemboca grandes  acontesimientos.'),
(3, 'Prohibido suicidarse en primavera', 'Alejandro Casona', 8, 'prohibido suicidarse.jpg', 0, 'se trata de una clínica llamada « el hogar del suicida » que se ocupa de personas que quieren suicidarse y que reproduce los diferentes medios para que consigan sus fines. Se elabora un mundo de ilusión, lleno de fantasía, en el que se pone la muerte en e'),
(4, 'Crónica de una muerte anuciada', 'Gabriel García Márquez', 10, 'cronicas de una muerte anunciada.jpg', 0, 'Versa sobre la rara historia de amor que existiera entre Bayardo San Román y Ángela Vicario y el pobre Santiago Nasar, cabeza de turco que propuso Ángela ante la inquietante pregunta de sus hermanos, de quién le había pegado. '),
(5, 'Demian', 'Hermann Hesse', 10, 'demian.jpg', 0, ' Emil Sinclair es un niño que ha vivido toda su vida en lo que el llama el Scheinwelt, pero una mentira lo lleva a ampliar sus visiones del mundo y a conocer un personaje enigmático de nombre Max Demian que lo llevará por los senderos del auto-razonamiento destruyendo paradigmas materialistas que antes le rodeaban.'),
(6, '1Q84', 'Haruki Murakami', 6, '1q84.jpg', 0, 'un detective llamado Ushikawa. Su última misión, encargada por Vanguardia, el misterioso culto religioso, consistió en comprobar si Aomame era digna de confianza para trabajar para el líder. Ushikawa dio el visto bueno a la joven, pero ésta los traicionó a todos, cometió un nuevo asesinato y luego desapareció. Si el detective no logra encontrarla, la venganza de la secta se abatirá sobre él.'),
(7, 'Almendra', 'Won-pyung Sohn', 10, 'Almendra.png', 0, '\"Esta historia habla de un monstruo que se encuentra con otro monstruo. Uno de esos monstruos soy yo.\"\r\nYunjae nació con alexitimia, una enfermedad que le impide reconocer y expresar emociones, y que está asociada a un crecimiento inferior de la amígdala cerebral, generalmente del tamaño de una almendra. Su madre soltera y su abuela hacen todo lo posible por ayudarlo a relacionarse con los demás, si bien en la escuela se enfrenta a la intimidación y al rechazo de sus compañeros por su comportamiento indolente. Pero un día ocurre la tragedia: en la tarde de su decimosexto cu'),
(8, 'Los árboles mueren de pie', 'Alejandro Casona', 11, 'los arboles mueren de pie.jpg', 0, 'El señor Balboa tenía un nieto desalmado al que, un día, tuvo que echar de casa. Luego de un tiempo, para que su esposa no se deprima, Balboa empieza a escribir cartas apócrifas haciéndose pasar por su nieto.\r\n\r\nEl nieto de verdad decide volver a su hogar (en busca de dinero), pero el barco en el que venía se pierde. Balboa contrata a Mauricio para que, en combinación con una linda muchacha, Isabel, finjan ante la abuela ser el nieto perdido y su feliz esposa.\r\n\r\nInesperadamente, llega el verdadero nieto, que no había muerto como pensaba Balboa. La abuela se entera del engaño, pero decide no decírselo al imitador ni a la muchacha, como agradecimiento por los días felices que le han hecho vivir y en definitiva, con el mismo objetivo que la pareja y la institución de Mauricio habían ido a realizar allí: hacer realidad ilusiones. Mauricio e Isabel terminan juntos y la abuela les da la receta de su licor y un trozo del jacarandá como muestra de agradecimiento por los días tan felices que le han hecho pasar.'),
(9, 'El problema de los tres cuerpos', 'Liu Cixin', 5, 'Tres cuerpos.jpg', 0, '\"El problema de los tres cuerpos\" arranca en la Revolución cultural china y salta uno años para seguir el proyecto gubernamental secreto Costa Roja. Un proyecto de busca de vida extraterrestre en el que trabaja Ye Wenjie, científica hija de un profesor purgado en esa época.'),
(10, 'Yo, robot', 'Isaac Asimov', 5, 'yo robot.jpg', 0, 'Yo, robot es una colección de relatos basados en las tres leyes de la robótica que son un compendio fijo e imprescindible de moral aplicable a supuestos robots inteligentes, con las que supuestamente nunca debería haber un conflicto si se cumplieran fielmente. Los relatos, no obstante, plantean diferentes situaciones en las que dichas \"tres leyes\" se cumplen, y aun así plantean problemas, paradojas e ingeniosos ejercicios intelectuales a los que tendrán que enfrentarse distintos especialistas en robótica.'),
(11, 'Soy leyenda', 'Richard Matheson', 5, 'soy leyenda.jpg', 0, 'Robert Neville es el único superviviente de una guerra bacteriológica que ha asolado el planeta y convertido al resto de la humanidad en vampiros. Su vida se ha reducido a asesinar el máximo número posible de estos seres sanguinarios durante el día, y a soportar su asedio cada noche. Para ellos, el auténtico monstruo es este hombre que lucha por subsistir en un nuevo orden establecido.'),
(12, 'El hobbit', 'J. R. R. Tolkien', 6, 'el hobbit.jpg', 0, 'El reino enano de Erebor, también conocido como la Montaña Solitaria, fue fundado en el año 1999 de la Tercera Edad del Sol,2​ por el rey Thráin I, quien acababa de huir con parte de su pueblo de Khazad-dûm tras la aparición de un balrog. Siete siglos después, el dragón Smaug llegó a Erebor y, tras expulsar a los enanos, se apoderó del tesoro que estos habían acumulado. En 2463 T. E. algunos hobbits de la rama de los Fuertes vivían en los Campos Gladios, donde milenios atrás el rey Isildur de Arnor y Gondor fue asesinado por los orcos y el Anillo Único del Señor Oscuro Sauron se hundió en el río Anduin. Sméagol y su primo Déagol se encontraban pescando en el río cuando este último encontró el Anillo. Su poder despertó la codicia de Sméagol, que asesinó a su primo para arrebatárselo y, al ser desterrado por su pueblo, vagó hasta llegar a las Montañas Nubladas. Allí el poder del Anillo le corrompió, alargando su vida más allá de lo natural y convirtiéndole en una criatura que pasó a ser conocida como Gollum. Cien años antes de los hechos narrados en la novela, el por entonces rey de los enanos, Thráin II, decidió regresar a Erebor. No obstante, fue apresado durante el viaje por los siervos de Sauron y le llevaron a la fortaleza de Dol Guldur, donde le arrebataron el último de los siete Anillos de los Enanos.'),
(13, 'Ready Player One', 'Ernest Cline', 5, 'ready player one.jpg', 0, 'En la década de 2040, el mundo se ha visto afectado por una crisis energética por el agotamiento de los combustibles fósiles y las consecuencias de la contaminación , el calentamiento global y la sobrepoblación , lo que ha causado problemas sociales generalizados, pobreza y estancamiento económico . Para escapar del declive al que se enfrenta su mundo, la gente recurre a OASIS, [a] un simulador de realidad virtual accesible para los jugadores que usan visores y tecnología háptica como guantes. Funciona como un MMORPG y como un mundo virtual ., siendo su moneda la más estable del mundo real. Fue creado por James Donovan Halliday, fundador de Gregarious Simulation Systems (anteriormente Gregarious Games), quien hizo un video póstumo de su testamento declarando al público que había dejado un huevo de Pascua dentro del OASIS, y la primera persona en encontrarlo sería hereda toda su fortuna, la propiedad de su corporación, así como el control total del propio OASIS, que vale billones. La historia sigue las aventuras de Wade Watts, comenzando unos cinco años después del anuncio, cuando descubre una de las tres llaves que abren tres puertas sucesivas que conducen al tesoro.'),
(14, 'Cazadores de sombras: Ciudad de Hueso', 'Cassandra Clare', 10, 'cazadores de sombras.jpg', 0, 'En el Pandemonium, la discoteca de moda de Nueva York, Clary sigue a un atractivo chico de pelo azul hasta que presencia su muerte a manos de tres jóvenes cubiertos de extraños tatuajes.\r\n\r\nDesde esa noche, su destino se une al de esos tres cazadores de sombras, guerreros dedicados a liberar a la tierra de demonios y, sobre todo, al de Jace, un chico con aspecto de ángel y tendencia a actuar como un idiota.'),
(15, 'La dama de negro', 'Susan Hill', 1, 'la dama de negro.jpg', 0, 'La novela está narrada por Arthur Kipps, el joven abogado que anteriormente trabajó para el Sr. Bentley. Una Nochebuena está en casa con su segunda esposa Esmé y sus cuatro hijastros, quienes comparten historias de fantasmas. Cuando se le pide que cuente una historia, se irrita y sale de la habitación, y decide escribir sus horribles experiencias de varios años en el pasado con la esperanza de que al hacerlo las exorcice de su memoria.\r\n\r\nMuchos años antes, cuando todavía era abogado junior de Bentley, Kipps es convocado a Crythin Gifford, una pequeña ciudad comercial en la costa noreste de Inglaterra, para asistir al funeral de la Sra. Alice Drablow y liquidar su patrimonio. Kipps es reacio a dejar a su prometida, Stella, pero está ansioso por alejarse de la lúgubre niebla de Londres . La difunta Sra. Drablow era una viuda anciana y solitaria que vivía sola en la desolada y aislada Eel Marsh House.\r\n\r\nLa casa está situada en Nine Lives Causeway . Durante la marea alta, queda completamente aislado del continente, rodeado solo por marismas y marismas .. Kipps pronto se dio cuenta de que había más en Alice Drablow de lo que pensó originalmente.'),
(16, 'Orgullo y prejuicio', 'Jane Austen', 10, 'orgullo y prejuicio.jpg', 0, 'La novela Orgullo y Prejuicio es una crítica de la sociedad inglesa de comienzos del S.XIX. Jane, Elizabeth, Mary, Kitty y Lidia son cinco hermanas que viven con sus padres en las afueras de Londres y que deben contraer matrimonio para que, de acuerdo a las reglas de la época, la herencia paterna continúe en el seno familiar. A dicha tarea se encomienda con ahínco su madre, quien se siente esperanzada cuando entran en escena Mr. Binglye, un joven soltero y rico, y Mr. Darcy. El libro Orgullo y Prejuicio es uno de los más leídos y populares. Es por ello que en ALIBRATE puedes encontrar muchas reseñas y opiniones de los lectores de este libro de Jane Austen para que puedas conocer más sobre la novela. Si te interesa este libro tan conocido, lo puedes comprar online en papel en las tiendas más importantes.'),
(17, 'Bajo la misma estrella', 'John Green', 2, 'bajo la misma estrella.jpg', 0, 'Hazel Grace Lancaster, quien padece cáncer de tiroides que acaba haciendo metástasis y trasladándose a los pulmones. Por ese motivo, tiene que usar siempre un tanque de oxígeno, al que ella llama Philip.\r\n\r\nSus padres la obligan a acudir a un grupo de apoyo para jóvenes afectados por la enfermedad situado en el sótano de una iglesia, llamada El corazón literal de Jesús, en la cual conoce y se enamora de un joven de dieciocho años llamado Augustus Waters (Gus), exjugador de baloncesto que tiene amputada una pierna a causa del osteosarcoma.'),
(18, 'La metamorfosis', 'Franz Kafka', 6, 'la metamorfosis.jpg', 0, 'La historia trata sobre Gregorio Samsa, cuya repentina transformación en un enorme insecto dificulta cada vez más la comunicación de su entorno social con él, hasta que es considerado intolerable por su familia y finalmente perece.'),
(19, 'Casa de muñecas', 'Henrik Ibsen', 11, 'casa de muñecas.jpg', 0, 'Nora se cree feliz casada con Torvaldo. Llevan ocho años de casados y tienen tres hijos. Además, Torvaldo Helmer asumirá en el año nuevo el puesto de director en el banco en que trabaja. Nils Krogstad intenta recuperar ante la sociedad y sus hijos su honra, pero sabe que Torvaldo lo despedirá por sus antecedentes corruptos. Para evitarlo, chantajea a Nora, quien ve cómo se derrumba su felicidad. Torvaldo no accede a su petición de que mantenga al procurador en su puesto. Este se encuentra dispuesto a todo. Sin embargo, Linde habla con él. Ella será quien lo reemplazará en el puesto; pero intenta recuperar su vida. Le propone que vivan juntos como lo deseó hace mucho tiempo Krogstad. Linde no impide que el procurador informe, a través de una carta, del crimen de Nora. Cree que él le agradecerá el haberlo salvado. Por el contrario, Torvaldo se entera y en lugar de agradecerle por haberle salvado la vida, la humilla y juzga. En medio de los insultos y ofensas recibe unos nuevos papeles.Krogstad ha devuelto el contrato. No hará nada contra los Helmer. Torvaldo trata de reconciliarse con Nora, pero esta ha cambiado radicalmente. Se ha dado cuenta de que en su matrimonio no es más que una muñeca grande; como de niña fue una muñeca pequeña. Quiere reencontrarse consigo misma. Torvaldo le es un extraño, un egoísta. Para encontrarse consigo misma, abandonará la casa.'),
(20, 'El gran Gatsby', 'F. Scott Fitzgerald', 11, 'el gran gatsby.jpg', 0, 'Situada en plena Belle Époque estadounidense, luego de la Primera Guerra Mundial, en la zona residencial de Long Island, El gran Gatsby cuenta la historia de un dramático “pentágono” amoroso, a la vez que deja entrever las consecuencias inadvertidas del conflicto bélico, la corrupción económica disfrazada de oportunidad financiera y el declive de una clase social amenazada por su propia ceguera');

-- --------------------------------------------------------

--
-- Table structure for table `peliculas`
--

CREATE TABLE `peliculas` (
  `ID` int NOT NULL,
  `Titulo` varchar(90) NOT NULL,
  `Director` varchar(90) NOT NULL,
  `ID_Genero` int DEFAULT NULL,
  `Portada` varchar(255) DEFAULT NULL,
  `Rating` float NOT NULL DEFAULT '0',
  `Descripcion` varchar(580) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `peliculas`
--

INSERT INTO `peliculas` (`ID`, `Titulo`, `Director`, `ID_Genero`, `Portada`, `Rating`, `Descripcion`) VALUES
(1, 'El despertar del Diablo 2', 'Sam Raimi', 1, 'evilDeadTwo.jpg', 0, 'Evil Dead II es una película de terror estadounidense de 1987 dirigida por Sam Raimi. Es la segunda parte de la cinta The Evil Dead. Fue protagonizada por Bruce Campbell, quien repite su rol de Ashley J. \"Ash\" William y por Sarah Berry, como Annie Knowby.'),
(2, 'interstellar', 'Christopher Nolan', 5, 'interstellar.jpg', 0, 'Gracias a un descubrimiento, un grupo de científicos y exploradores, encabezados por Cooper, se embarcan en un viaje espacial para encontrar un lugar con las condiciones necesarias para reemplazar a la Tierra y comenzar una nueva vida allí.'),
(3, 'Dune', 'Denis Villeneuev', 5, 'dune.jpg', 0, 'Arrakis, también denominado \"Dune\", se ha convertido en el planeta más importante del universo. A su alrededor comienza una gigantesca lucha por el poder que culmina en una guerra interestelar.'),
(4, 'Alien: el octavo pasajero', 'Ridley Scott', 5, 'Alien.jpg', 0, 'Tras acudir a una llamada de ayuda, la tripulación (Tom Skerritt, Sigourney Weaver, John Hurt) encuentra una voraz y horrible criatura abordo de una nave espacial.'),
(5, 'Black Panther', 'Ryan Coogler', 4, 'black panther.jpg', 0, 'Después de morir su padre, T\'Challa regresa a su nación, Wakanda. Una vez allí, descubre que tiene un nuevo y terrible enemigo, y T\'Challa asume la personalidad de Pantera Negra para salvar no solo al reino de Wakanda, sino a toda la humanidad.'),
(6, 'Titanic', 'James Cameron', 2, 'titanic.jpg', 0, 'Una joven de la alta sociedad abandona a su arrogante pretendiente por un artista humilde en el trasatlántico que se hundió durante su viaje inaugural.'),
(7, 'Avatar', 'James Cameron', 5, 'avatar.jpg', 0, 'En un exuberante planeta llamado Pandora viven los Na\'vi, seres que aparentan ser primitivos pero que en realidad son muy evolucionados. Debido a que el ambiente de Pandora es venenoso, los híbridos humanos/Na\'vi, llamados Avatares, están relacionados con las mentes humanas, lo que les permite moverse libremente por Pandora. Jake Sully, un exinfante de marina paralítico se transforma a través de un Avatar, y se enamora de una mujer Na\'vi.'),
(8, 'El rey Leon (2019)', 'Jon Favreau', 3, 'the lion king.jpg', 0, 'Un joven príncipe león huye de su reino solo para aprender el verdadero significado de la responsabilidad y la valentía.'),
(9, 'La bella y la Bestia (2017)', 'Bill Condon', 2, 'beauty and the beast.jpg', 0, 'Belle, una joven hermosa y brillante, asume el lugar de su padre como prisionero en el castillo de una bestia. Poco a poco, la valiente Belle irá dándose cuenta de que el príncipe bestia no es el malvado ser que todos creen que es y tiene, en realidad, un gran corazón.'),
(10, 'Avengers: End Game', 'Anthony Russo, Joe Russo', 5, 'avengers endgame.jpg', 0, 'Los Vengadores restantes deben encontrar una manera de recuperar a sus aliados para un enfrentamiento épico con Thanos, el malvado que diezmó el planeta y el universo.'),
(11, 'Rapidos y Furiosos 7', 'James Wan', 4, 'fast furious7.jpg', 0, 'Ha pasado un año desde que Dominic y Brian fueron indultados y pudieron regresar a Estados Unidos. Aunque desean adaptarse a su nueva vida dentro de la legalidad, las cosas no son tan fáciles. Además, un asesino británico va a entrar en sus vidas.'),
(12, 'Avegers: Infinity War', 'Anthony Russo, Joe Russo', 5, 'avengers infinity war.jpg', 0, 'Los superhéroes se alían para vencer al poderoso Thanos, el peor enemigo al que se han enfrentado. Si Thanos logra reunir las seis gemas del infinito: poder, tiempo, alma, realidad, mente y espacio, nadie podrá detenerlo.'),
(13, 'Aquaman', 'James Wan', 6, 'aquaman.jpg', 0, 'Aquaman debe recuperar el legendario Tridente de Atlan para salvar a la ciudad subacuática de Atlantis, y al mundo de la superficie, de su hermano hambriento de poder.'),
(14, 'Frozen: Una aventura congelada', 'Chris Buck, Jennifer Lee', 3, 'frozen.jpg', 0, 'Una joven princesa valiente se establece con un montañista para encontrar a su hermana, cuyos poderes gélidos han atrapado a su reino en el invierno eterno. Con letras en pantalla y nieve saltando para seguir las canciones.'),
(15, 'Los Minions', 'Kyle Balda, Pierre Coffin', 3, 'minions.jpg', 0, 'Los minions, ingenuos y torpes, buscan un verdadero villano al que servir. A lo largo de una evolución de millones de años, los minions se han puesto al servicio de los amos más despreciables. Kevin, acompañado por el rebelde Stuart y el adorable Bob, emprende un emocionante viaje para conseguir una jefa a quien servir, la terrible Scarlet Overkill.'),
(16, 'Lightyear', 'Angus MacLane', 3, 'lightyear.jpg', 0, 'La historia del origen de Buzz Lightyear, el héroe que inspiró el juguete, y que nos da a conocer al legendario Guardián Espacial que acabaría contando con generaciones de fans.'),
(17, 'Los imprevistos del amor', 'Christian Ditter', 2, 'love rosie.jpg', 0, 'Rosie y Alex son mejores amigos hasta que la familia se muda a Estados Unidos. Ellos se juegan todo para conservar vivos su amor y amistad al paso de los años y las millas.'),
(18, 'Charlie y la fabriica de chocolates', 'Tim Burton', 6, 'charlie and_the chocolate factory.jpg', 0, 'Un niño pobre y cuatro jovencitos ricos ganan un paseo a la increíble empresa de un raro fabricante de dulces.'),
(19, 'Entrevista con el vampiro', 'Neil Jordan', 1, 'interview_with_the_vampire.jpg', 0, 'Louis de Pointe le explica a Daniel Malloy, un periodista, cómo se convirtió en un vampiro doscientos años atrás.\r\n'),
(20, 'El secreto de adaline', 'Lee Toland Krieger', 2, 'the age of adaline.jpg', 0, 'Después de un accidente, una mujer deja de envejecer y mantiene su extraña condición como un secreto mientras se embarca en una serie de aventuras a través del siglo XX.'),
(21, 'Un pequeño favor', 'Paul Feig', 8, 'a simple favor.jpg', 0, 'En un pequeño pueblo de los Estados Unidos, una vloguera investiga la súbita y misteriosa desaparición de su mejor amiga.'),
(22, 'Parásitos', 'Bong Joon-ho', 9, 'gisaengchung.jpg', 0, 'Tanto Gi Taek como su familia están sin trabajo. Cuando su hijo mayor, Gi Woo, empieza a impartir clases particulares en la adinerada casa de los Park, las dos familias, que tienen mucho en común pese a pertenecer a dos mundos totalmente distintos, entablan una relación de resultados imprevisibles.'),
(23, 'La cumbre escarlata', 'Guillermo del Toro', 1, 'crimson_peak.jpg', 0, 'Todo ocurre en Inglaterra durante el siglo XIX. Edith es una joven recién casada con sir Thomas, un hombre encantador. Edith se traslada a la mansión que la familia de él posee en Cumbria, región del norte de Inglaterra, y allí, Edith, que es capaz de hablar con los muertos, descubre que su esposo y la hermana de este, Lady Lucille, esconden un sombrío secreto; y además, que las casas embrujadas no sólo existen en las novelas, porque la que ella habita, respira, sangra... y nunca olvida.'),
(24, 'Sucker Punch: Mundo surreal', 'Zack Snyder', 7, 'sucker_punch.jpg', 0, 'Una chica es internada por su padrastro en una institución psiquiátrica para que le practiquen una lobotomía. Mientras espera, su imaginación crea una realidad alternativa que podría salvarla de su dramática situación.');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `ID` int NOT NULL,
  `Usuario_ID` int NOT NULL,
  `Review_ID` int NOT NULL,
  `Comentario` varchar(255) NOT NULL,
  `Date` datetime NOT NULL,
  `Likes` int NOT NULL DEFAULT '0',
  `Dislikes` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `ID` int NOT NULL,
  `Pelicula_ID` int DEFAULT NULL,
  `Libro_ID` int DEFAULT NULL,
  `Usuario_ID` int DEFAULT NULL,
  `Comentario` varchar(900) NOT NULL,
  `Cant_Estrellas` float NOT NULL,
  `Date` datetime NOT NULL,
  `Likes` int NOT NULL DEFAULT '0',
  `Dislikes` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int NOT NULL,
  `Nombre` varchar(35) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Usuario_ID` (`Usuario_ID`),
  ADD KEY `Review_ID` (`Review_ID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Pelicula` (`Pelicula_ID`),
  ADD KEY `ID_Libro` (`Libro_ID`),
  ADD KEY `ID_Usuario` (`Usuario_ID`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `generos`
--
ALTER TABLE `generos`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `libros`
--
ALTER TABLE `libros`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
