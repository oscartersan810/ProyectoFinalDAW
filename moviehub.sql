-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2025 a las 13:26:50
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `moviehub`
--
CREATE DATABASE IF NOT EXISTS `moviehub` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `moviehub`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favourites`
--

DROP TABLE IF EXISTS `favourites`;
CREATE TABLE `favourites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_21_105335_add_avatar_to_users_table', 1),
(5, '2025_04_21_113436_create_movies_table', 1),
(6, '2025_04_21_114058_create_reviews_table', 1),
(7, '2025_04_21_114240_create_favourites_table', 1),
(8, '2025_04_22_081732_add_rol_to_users_table', 1),
(10, '2025_05_07_102951_create_series_table', 2),
(12, '2025_05_08_072806_add_is_admin_to_users_table', 3),
(13, '2025_05_12_110337_add_serie_id_to_reviews_table', 3),
(14, '2025_05_13_103639_create_reviewsmovies_table', 4),
(15, '2025_05_13_103640_create_reviewsseries_table', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE `movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `poster` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `rating` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `poster`, `genre`, `year`, `rating`, `created_at`, `updated_at`) VALUES
(3, 'Flow', 'Un gato se despierta en un mundo cubierto de agua, donde toda la raza humana parece haber desaparecido. Busca refugio en un barco con un grupo de animales. Pero llevarse bien con ellos resulta ser un reto aún mayor que superar su miedo al agua.', 'posters/tBLW9463saFJpFA3tCnHax4g99aTbGz0xGG1rPXJ.png', 'Animacion', 2024, 5, '2025-05-06 08:24:02', '2025-05-16 09:47:46'),
(4, 'Mickey 17', 'Mickey 17, un miembro de la tripulación prescindible enviado a un planeta helado para colonizarlo, se niega a dejar que su clon de reemplazo, Mickey 18, tome su lugar.', 'posters/Ko84KBwdYiLIXHG5RO11IInRkFppy3uBZ4lUzzFz.jpg', 'Accion', 2025, 0, '2025-05-06 08:26:37', '2025-05-06 08:54:08'),
(5, 'Gran Turismo', 'El joven Jann Mardenborough gana una serie de competiciones de videojuegos Gran Turismo organizadas por una importante empresa automovilística y obtiene la oportunidad de convertirse en piloto de carreras profesional.', 'posters/9YGa0r0UOKdhImjUpVZGrAHgz8ROkvwtVCf5V6ZK.jpg', 'Accion', 2023, 3.5, '2025-05-06 08:30:39', '2025-05-24 20:01:54'),
(6, 'Blancanieves', 'Snow White​ es una película de fantasía musical estadounidense dirigida por Marc Webb, a partir de un guion de Greta Gerwig y Erin Cressida Wilson.', 'posters/8ho5jXAvrS6N78nDQzfVnlIuV31Q8sIYZFqH1heT.png', 'Fantastico', 2025, 1.5, '2025-05-06 08:33:11', '2025-05-24 20:43:48'),
(7, 'Una película de Minecraft', 'Una película de Minecraft es una película de aventuras fantásticas estadounidense basada en el videojuego del mismo nombre de Mojang Studios. Producida por Legendary Pictures, Mojang y Vertigo Entertainment, y distribuida por Warner Bros.', 'posters/OOs4AhoAqyfBejM9RUNeypQyGPyShN4xU5xo2b6g.png', 'Aventuras', 2025, 0, '2025-05-06 08:37:01', '2025-05-06 08:37:01'),
(8, 'Lilo & Stitch', 'Lilo & Stitch es una próxima película de ciencia ficción y comedia estadounidense dirigida por Dean Fleischer-Camp y producida por Dan Lin y Jonathan Eirich, con el escritor y director de cine original Chris Sanders interpretando la voz de Stitch.', 'posters/1Hgv3IW80wfvo6o9d2P6j5t23JMf5CrTxPCpMfGi.png', 'Aventuras', 2025, 5, '2025-05-06 08:38:54', '2025-05-24 20:02:42'),
(9, '¿Quién es quién?', 'es una película española de comedia dirigida por Hugo Martín Cuervo y escrita por Irene Niubó. Es un remake español de la película francesa Le sens de la famille, cuya idea original fue concebida por Jean-Patrick Benes, Antoine Gandaubert, Fabrice Goldstein y Antoine Rein. Está protagonizada por Kira Miró, Salva Reina, Elena Irureta, Sofía Otero, Martí Cordero y Ana Jara Martínez. Su estreno en cines españoles está previsto para el 5 de diciembre de 2024, de la mano de DeAPlaneta.', 'posters/ePmpoZ7o9T6m82jZqimPQ1wqDiupdH1ZgXsnl38Q.jpg', 'Comedia', 2024, 3, '2025-05-06 08:45:36', '2025-05-15 09:48:13'),
(10, 'Heretic', 'Tras un día infructuoso en su labor religiosa, dos jóvenes misioneras llaman a la puerta de una casa aislada en un pueblo. Allí, son recibidas por un misterioso y encantador hombre. Sin embargo, pronto se dan cuenta de que cayeron en una trampa.', 'posters/Kg4OwPtUi6JlYdRTpTgxbAa7BvzvRDFc5ZjK9hHY.jpg', 'Terror', 2024, 0, '2025-05-06 08:58:04', '2025-05-06 08:58:04'),
(11, 'Odio el verano', 'Tres familias completamente opuestas reservan una casa en las islas Canarias para pasar las mejores vacaciones de sus vidas. Lo que no saben es que han alquilado la misma casa y se verán obligados a compartir todo el verano juntos.', 'posters/bDIE5GOD6zdGutwpnYclU4Jn4csmv5u3wlp9Xj8e.jpg', 'Comedia', 2024, 0, '2025-05-06 08:59:40', '2025-05-06 08:59:40'),
(12, 'Gladiator 2', 'Lucio es obligado a entrar en el Coliseo después de que su hogar sea conquistado por los tiránicos emperadores que ahora dirigen Roma con puño de hierro. Con la ira en su corazón y el futuro del Imperio en juego, Lucio debe mirar hacia atrás para encontrar fuerza y devolver la gloria de Roma a su pueblo.', 'posters/ypN02OVf2vbieOkYMc0UJtTNlL7f5T9eH5fMibxk.jpg', 'Accion', 2024, 0, '2025-05-06 09:01:24', '2025-05-06 09:01:24'),
(13, 'Robot salvaje', 'La aventura épica de una robot, la unidad ROZZUM 7134, que naufraga en una isla desierta y debe aprender a adaptarse a las inclemencias del entorno. Poco a poco, establece relación con los animales de la isla y adopta a una cría de ganso huérfana.', 'posters/45tUTwn1AUegK4AucTWMBmCO6PilWdYjiP4MW6ao.jpg', 'Animacion', 2024, 0, '2025-05-06 09:04:02', '2025-05-06 09:04:02'),
(14, 'Dune Parte 2', 'Paul Atreides se une a Chani y a los Fremen mientras busca venganza contra los conspiradores que destruyeron a su familia. Enfrentándose a una elección entre el amor de su vida y el destino del universo, debe evitar un futuro terrible.', 'posters/AwWVlrj2fR9MOCLosIJvma72XEpZmPmdnLu89Y9E.jpg', 'Accion', 2024, 4, '2025-05-06 09:18:42', '2025-05-23 17:13:48'),
(15, 'Five Nights at Freddy\'s', 'Un problemático guardia de seguridad empieza a trabajar en la pizzería Freddy Fazbear\'s. Mientras pasa su primera noche en el trabajo, se da cuenta de que el turno de noche en Freddy\'s no será tan fácil de sobrellevar.', 'posters/JTgV3pQZVXpK6rIbWBRV8Si4QveIxauKY3URQ13g.jpg', 'Terror', 2023, 0, '2025-05-06 09:38:13', '2025-05-06 09:38:13'),
(16, 'Megalodón 2: La fosa', 'Jonas Taylor lidera un equipo de investigación en las profundidades del océano. Acorralados por tiburones prehistóricos y saqueadores medioambientales, los científicos intentan sobrevivir a toda costa.', 'posters/qyfrfXSeGg7Lzsa1fyRhVNEqxqwirUMA5ytz58Lq.jpg', 'Ciencia Ficcion', 2023, 0, '2025-05-06 09:40:36', '2025-05-06 09:40:36'),
(17, 'Avatar: El sentido del agua', 'Jake Sully y Ney\'tiri han formado una familia y hacen todo lo posible por permanecer juntos. Sin embargo, deben abandonar su hogar y explorar las regiones de Pandora cuando una antigua amenaza reaparece.', 'posters/v9aErXk724s42NIz2woW6UPj4ZDOSCZWfr4xlD1i.jpg', 'Ciencia Ficcion', 2022, 0, '2025-05-06 09:42:51', '2025-05-06 09:42:51'),
(18, 'Aquaman y el Reino Perdido', 'Aquaman forja una alianza incómoda con un aliado poco probable para salvar a Atlantis y al resto del planeta de la muerte inminente.', 'posters/0WeOi5J8fTNOfFFq4trJMG0Gen02XYXR6redRmQM.jpg', 'Fantastico', 2023, 0, '2025-05-06 09:45:01', '2025-05-06 09:45:01'),
(19, 'Memorias de un hombre en pijama', 'Paco es un cuarentón soltero empedernido que, en la plenitud de su vida, consigue su sueño infantil: trabajar desde casa y en pijama. Pero cuando creía haber encontrado el summum de la felicidad, irrumpe en su vida Jilguero, la chica de la que se enamora y que tendrá que luchar por permanecer al lado de un hombre cuyo máximo objetivo vital es quedarse en casa en pijama... Adaptación del cómic homónimo de Paco Roca.', 'posters/OJDhkbMEhqo4yoos5zUjoFSx0kq4RbhmE3tpr4W9.jpg', 'Comedia', 2018, 0, '2025-05-09 06:37:35', '2025-05-09 06:37:35'),
(20, 'Jurassic World: Dominion', 'Cuatro años después de la destrucción de la Isla Nublar, los dinosaurios viven y cazan junto a los humanos en todo el mundo. Este frágil equilibrio remodelará el futuro y determinará si los humanos seguirán siendo o no la especie dominante.', 'posters/eiXRelUoU2jHzLezM97jLQ4esF1kS7bQ6CNMp1zd.jpg', 'Ciencia Ficcion', 2022, 0, '2025-05-09 06:39:27', '2025-05-09 06:39:27'),
(21, 'Padre no hay más que uno', 'Javier es un hombre que cree saberlo todo, pero no mueve un dedo para ayudar a su mujer en el cuidado de la casa y de sus cinco hijos. Sin embargo, este padre de familia tiene que enfrentarse a la realidad cuando su mujer decide irse de viaje y dejarlo solo con sus hijos. Esta será una experiencia que cambiará las vidas de todos para siempre.', 'posters/OGmWSYKQCDygeLRM0B9VHyeDQTrEZsygMSkl6W0J.jpg', 'Comedia', 2019, 0, '2025-05-09 08:13:44', '2025-05-09 08:13:44'),
(22, 'Padre no hay más que uno 2: La llegada de la suegra', 'Con el triunfo de la asistente virtual \'Conchi\', Javier se ha convertido en líder del chat de madres. Sin embargo, la noticia inesperada de la llegada de un nuevo bebé lo pone todo patas arriba. Y para rematar, llegará la suegra.', 'posters/R1xK1Okzx2CGyJXqRmtCW24NwC2i3LOpDcKw2ygb.jpg', 'Comedia', 2020, 0, '2025-05-09 08:15:20', '2025-05-09 08:15:20'),
(23, 'Padre no hay más que uno 3', 'Se acercan las Navidades. Los niños rompen accidentalmente una figurilla del Belén de colección de su padre y deben conseguir por todos los medios una igual, el problema es que es una pieza única de anticuario. Sara, la hija mayor rompe con su novio, Ocho, que intentará recuperar sus favores con la ayuda de su suegro, Javier. Precisamente el suegro de Javier, el padre de Marisa, será acogido en la casa familiar para pasar las fiestas tras su reciente separación, lo cual no dejará indiferente a la madre de Javier, Milagros. Rocío, la folclórica de la familia, que hacía de Virgen desde hace varias Navidades, es relegada este año a hacer de pastorcilla, algo que su padre, Javier, no está dispuesto a asumir.', 'posters/KxNyzkoDRLKWcrNoh67rbWayoWZGlNNEMfR47pjZ.jpg', 'Comedia', 2022, 0, '2025-05-09 08:17:09', '2025-05-09 08:17:09'),
(24, 'Padre no hay más que uno 4: Campanas de boda', '¿Qué efecto tendría en unos padres que el mismo día que su hija mayor cumple 18 años su novio le proponga matrimonio y ella acepte de inmediato?', 'posters/cUNX1L85IOvXim34HZOjzZrE3BYMRRHridAbowlg.jpg', 'Comedia', 2024, 0, '2025-05-09 08:18:25', '2025-05-09 08:18:25'),
(25, 'The Legend of Ochi', 'Una niña descubre los misterios de la comunicación animal.', 'posters/EHvshcQyw3iGUMFuJjNbgIqCB58nLEtN2SMyPg1G.jpg', 'Aventuras', 2025, 0, '2025-05-09 08:22:41', '2025-05-09 08:22:41'),
(26, 'Mufasa: el rey león', 'Rafiki, Timón y Pumba le cuentan la leyenda de Mufasa a la joven cachorro de león Kiara, hija de Simba y Nala. La historia se cuenta en flashbacks y presenta a Mufasa como un cachorro huérfano, perdido y solo hasta que conoce a un simpático león llamado Taka, heredero de un linaje real. Este encuentro casual pone en marcha un viaje de un extraordinario grupo de inadaptados que buscan su destino. Y sus vínculos se pondrán a prueba mientras trabajan juntos para escapar de un enemigo amenazador y letal.', 'posters/xXXZwyFyOxLkyF3zMOynn0XxqyaIaok17CAHSADl.jpg', 'Animacion', 2024, 0, '2025-05-09 09:01:49', '2025-05-09 09:01:49'),
(27, 'Sonic 3, la película', 'Sonic, Knuckles y Tails se reúnen para enfrentarse a un nuevo y poderoso adversario, Shadow, un misterioso villano cuyos poderes no se parecen a nada de lo que nuestros héroes han conocido hasta ahora. Con sus facultades superadas en todos los sentidos, el Equipo Sonic tendrá que establecer una insólita alianza con la esperanza de detener a Shadow y proteger el planeta.', 'posters/4kWNxrZMQQRKxv9sJRNrLaLu3EA22gqwd95s9ZrC.jpg', 'Aventuras', 2024, 0, '2025-05-09 09:03:26', '2025-05-09 09:03:26'),
(28, 'Sonic 2: La película', 'Después de establecerse en Green Hills, Sonic se muere por demostrar que tiene madera de auténtico héroe. La prueba de fuego llega con el retorno del malvado Robotnik, en esta ocasión con un nuevo compinche, Knuckles, en busca de una esmeralda que tiene el poder de destruir civilizaciones. Sonic forma equipo con su propio compañero de fatigas, Tails, y juntos se lanzan a una aventura que les llevará por todo el mundo en busca de la preciada piedra para evitar que caiga en manos equivocadas.', 'posters/4edFi344T2af7URaLmFYuSvV8WxESXxfOXxnEJhV.jpg', 'Aventuras', 2022, 4, '2025-05-09 09:04:54', '2025-05-16 09:46:44'),
(29, 'Sonic, la película', 'Sonic, el descarado erizo azul basado en la famosa serie de videojuegos de Sega, vivirá aventuras y desventuras cuando conoce a su amigo humano y policía, Tom Wachowski (James Marsden). Sonic y Tom unirán sus fuerzas para tratar de detener los planes del malvado Dr. Robotnik (Jim Carrey), que intenta atrapar a Sonic con el fin de emplear sus inmensos poderes para dominar el mundo.', 'posters/75rxyj6t5LwQZpIadyGNJOKTMDFCUIQC3IN0fGSP.jpg', 'Aventuras', 2020, 0, '2025-05-09 09:05:31', '2025-05-09 09:05:42'),
(30, 'Kung Fu Panda 4', 'Tras varias aventuras desafiando a la muerte, Po, el Guerrero del Dragón, recibe una llamada del destino para tomarse un respiro. En concreto, para convertirse en el Líder Espiritual del Valle de la Paz.', 'posters/6nr474kjwr6wLtbHIojTeyjipRBiQeLYUh63Hsyy.jpg', 'Animacion', 2024, 0, '2025-05-09 09:07:28', '2025-05-09 09:07:28'),
(31, 'Érase una vez en... Hollywood', 'Hollywood, años 60. La estrella de un western televisivo, Rick Dalton (DiCaprio), intenta amoldarse a los cambios del medio al mismo tiempo que su doble (Pitt). La vida de Dalton está ligada completamente a Hollywood, y es vecino de la joven y prometedora actriz y modelo Sharon Tate (Robbie) que acaba de casarse con el prestigioso director Roman Polanski. (FILMAFFINITY)', 'posters/A6Xh99NHF4ibrqljrUtEBEZwuoHYZpV97zdKjUSb.jpg', 'Thriller', 2019, 0, '2025-05-20 07:06:37', '2025-05-20 07:06:37'),
(32, 'Up', 'Carl Fredricksen es un viudo vendedor de globos de 78 años que, finalmente, consigue llevar a cabo el sueño de su vida: enganchar miles de globos a su casa y salir volando rumbo a América del Sur. Pero ya estando en el aire y sin posibilidad de retornar Carl descubre que viaja acompañado de Russell, un explorador que tiene ocho años y un optimismo a prueba de bomba.', 'posters/G2bPgT18m2btOOjEcfCivZ80LJIOgmIG47whuz9d.jpg', 'Animacion', 2009, 0, '2025-05-21 18:13:36', '2025-05-21 18:13:36'),
(33, 'El padrino', 'América, años 40. Don Vito Corleone (Marlon Brando) es el respetado y temido jefe de una de las cinco familias de la mafia de Nueva York. Tiene cuatro hijos: Connie (Talia Shire), el impulsivo Sonny (James Caan), el pusilánime Fredo (John Cazale) y Michael (Al Pacino), que no quiere saber nada de los negocios de su padre. Cuando Corleone, en contra de los consejos de \'Il consigliere\' Tom Hagen (Robert Duvall), se niega a participar en el negocio de las drogas, el jefe de otra banda ordena su asesinato. Empieza entonces una violenta y cruenta guerra entre las familias mafiosas.', 'posters/u8xT6Lrm6zSBo8JReywM95DJ7zvQmaLUm7O4csas.jpg', 'Drama', 1972, 0, '2025-05-21 18:17:49', '2025-05-21 18:17:49'),
(34, 'El padrino. Parte II', 'Continuación de la historia de los Corleone por medio de dos historias paralelas: la elección de Michael como jefe de los negocios familiares y los orígenes del patriarca, Don Vito Corleone, primero en su Sicilia natal y posteriormente en Estados Unidos, donde, empezando desde abajo, llegó a ser un poderosísimo jefe de la mafia de Nueva York.', 'posters/1omiDx7SmkC4HBej9c3CuepwJHnxc7n4SeQ2RuMd.jpg', 'Drama', 1974, 0, '2025-05-21 18:21:17', '2025-05-21 18:21:17'),
(35, 'Cadena perpetua', 'Acusado del asesinato de su mujer, Andrew Dufresne (Tim Robbins), tras ser condenado a cadena perpetua, es enviado a la cárcel de Shawshank. Con el paso de los años conseguirá ganarse la confianza del director del centro y el respeto de sus compañeros de prisión, especialmente de Red (Morgan Freeman), el jefe de la mafia de los sobornos.', 'posters/SRXNzfiMYt1YRRTULayHhhUFzk29TnWTwSWD7wfd.jpg', 'Drama', 1994, 0, '2025-05-21 18:22:37', '2025-05-21 18:22:37'),
(36, 'La vida es bella', 'En 1939, a punto de estallar la Segunda Guerra Mundial (1939-1945), el extravagante Guido llega a Arezzo, en la Toscana, con la intención de abrir una librería. Allí conoce a la encantadora Dora y, a pesar de que es la prometida del fascista Rodolfo, se casa con ella y tiene un hijo. Al estallar la guerra, los tres son internados en un campo de exterminio, donde Guido hará lo imposible para hacer creer a su hijo que la terrible situación que están padeciendo es tan sólo un juego.', 'posters/LMOBlF1PCpr1f4cy6FQ7E91BrRAkAh3jtSVyfoDC.jpg', 'Drama', 1997, 0, '2025-05-21 18:25:24', '2025-05-21 18:25:24'),
(37, 'Uno de los nuestros', 'Henry Hill, hijo de padre irlandés y madre siciliana, vive en Brooklyn y se siente fascinado por la vida que llevan los gángsters de su barrio, donde la mayoría de los vecinos son inmigrantes. Paul Cicero, el patriarca de la familia Pauline, es el protector del barrio. A los trece años, Henry decide abandonar la escuela y entrar a formar parte de la organización mafiosa como chico de los recados; muy pronto se gana la confianza de sus jefes, gracias a lo cual irá subiendo de categoría.', 'posters/NlYdfreU7VySvvTx3tbHnWchqGQ1pTpc6r2pe8BV.jpg', 'Thriller', 1990, 0, '2025-05-21 18:27:04', '2025-05-21 18:27:04'),
(38, 'Cinema Paradiso', '\'Cinema Paradiso\' es una historia de amor por el cine. Narra la historia de Salvatore, un niño de un pueblecito italiano en el que el único pasatiempo es ir al cine. Subyugado por las imágenes en movimiento, el chico cree ciegamente que el cine es magia; pero, un día, Alfredo, el operador, accede a enseñarle al pequeño los misterios y secretos que se ocultan detrás de una película. Salvatore va creciendo y llega el momento en el que debe abandonar el pueblo y buscarse la vida. Treinta años después recibe un mensaje, en el que le comunican que debe volver a casa.', 'posters/r2F4hrCamgyBhcmxHmBUVFtLIviu0Sv725wu16O6.jpg', 'Drama', 1988, 0, '2025-05-21 18:30:49', '2025-05-21 18:30:49'),
(39, 'Érase una vez en América', 'Principios del siglo XX. David Aaronson, un pobre chaval judío, conoce en los suburbios de Manhattan a Max, otro joven de origen hebreo dispuesto a llegar lejos por cualquier método. Entre ellos nace una gran amistad y, con otros colegas, forman una banda que prospera rápidamente, llegando a convertirse, en los tiempos de la Ley Seca (1920-1933), en unos importantes mafiosos.', 'posters/RhYuCAIavonz8AVdFeNZ1dT7nqV8SblHAwXFu5gd.jpg', 'Drama', 1984, 0, '2025-05-21 18:32:58', '2025-05-21 18:32:58'),
(40, 'prueba', 'prueba', 'posters/EUrTY0uKFO8Pjp9z079WlCO6RlZ3piBDxISVQb7o.webp', 'prueba', 1998, 0, '2025-06-09 06:31:41', '2025-06-09 06:31:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('oscar@gmail.com', '$2y$12$o/EEngysDj9kMLoWCg9cku6ubi7834gn8BY68EMlkiSYdIss9DLGe', '2025-04-30 07:18:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reviewsmovies`
--

DROP TABLE IF EXISTS `reviewsmovies`;
CREATE TABLE `reviewsmovies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `rating` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reviewsmovies`
--

INSERT INTO `reviewsmovies` (`id`, `movie_id`, `content`, `rating`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 16, 'Es una mierda de pelicula, aburrida!!', 1, 3, NULL, NULL),
(2, 6, 'Esa actriz no le pega en la pelicula ni con cola, horror!!', 1, 8, NULL, NULL),
(3, 3, 'Tremenda pelicula, me gustaría verla una y otra vez!!', 5, 6, NULL, NULL),
(4, 11, 'Como ha dicho la pelicula \"odio el verano\", pero yo odio su pelicula mala!!', 1, 9, NULL, NULL),
(5, 7, 'Meh, no ha sido gran cosa per no esta mal!!', 3, 2, NULL, NULL),
(6, 4, 'La pelìcula esta bien entretenida literalmente pero le falta un poco motivación!!', 4, 5, NULL, NULL),
(7, 5, 'Esta bastante bien la pelicula me gustaría repetirla!!', 5, 2, '2025-05-15 08:15:52', '2025-05-15 08:15:52'),
(8, 11, 'A sido entretenida la película la verdad!!', 4, 2, '2025-05-15 08:46:55', '2025-05-15 08:46:55'),
(9, 9, 'No esta mal en realidad, pero bueno tampoco me a agradado mucho', 3, 5, '2025-05-15 09:48:13', '2025-05-15 09:48:13'),
(10, 28, 'Muy entretenida!!', 5, 2, '2025-05-16 06:09:37', '2025-05-16 06:09:37'),
(11, 28, 'Muy entretenida!!', 5, 2, '2025-05-16 06:14:56', '2025-05-16 06:14:56'),
(12, 28, 'Vaya aburrimiento de pelicula la verdad, el jim carrier ese no hace na como siempre, vaya basura!!', 2, 8, '2025-05-16 09:46:44', '2025-05-16 09:46:44'),
(13, 3, 'Esta guapa la pelicula su hermanoo!!', 5, 8, '2025-05-16 09:47:46', '2025-05-16 09:47:46'),
(14, 14, 'Guapìsimo!!', 5, 9, '2025-05-19 06:42:25', '2025-05-19 06:42:25'),
(15, 3, 'He llorado mucho con esta pelicula', 5, 2, '2025-05-23 17:11:25', '2025-05-23 17:11:25'),
(16, 14, 'Para mi en realidad ha sido una película bastante aburrida, pero tan poco tan mala la verdad', 3, 8, '2025-05-23 17:13:48', '2025-05-23 17:13:48'),
(17, 5, 'Meh no me convence', 2, 30, '2025-05-24 20:01:54', '2025-05-24 20:01:54'),
(18, 8, '¡Que chulada!, la recomiendo al 100 por 100 la vi con mis amigos y esta genial!!', 5, 30, '2025-05-24 20:02:42', '2025-05-24 20:02:42'),
(19, 6, 'Podria haber sido mejor literalmente', 2, 29, '2025-05-24 20:43:48', '2025-05-24 20:43:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reviewsseries`
--

DROP TABLE IF EXISTS `reviewsseries`;
CREATE TABLE `reviewsseries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serie_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `rating` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reviewsseries`
--

INSERT INTO `reviewsseries` (`id`, `serie_id`, `content`, `rating`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 3, 'Pedazo de serie es!!, con efecto visuales que tiene y todo es impresionante!!', 5, 2, '2025-05-16 06:30:49', '2025-05-16 06:30:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series`
--

DROP TABLE IF EXISTS `series`;
CREATE TABLE `series` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `rating` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `series`
--

INSERT INTO `series` (`id`, `title`, `description`, `poster`, `genre`, `year`, `rating`, `created_at`, `updated_at`) VALUES
(3, 'The Last of Us', 'The Last of Us es una serie de televisión estadounidense de drama postapocalíptica creado por Craig Mazin y Neil Druckmann para HBO. Basada en el videojuego de 2013 del mismo nombre desarrollado por Naughty Dog, la serie se ambienta veinte años después de una pandemia causada por una infección fúngica masiva, que hace que sus huéspedes se transformen en criaturas similares a zombis y causen el colapso de la sociedad.', 'series_posters/PRu30JDrS8lO2Sv3YZzxdSmjN8Ggo7SeuYrMTvxn.jpg', 'Accion', 2023, 5, '2025-05-07 14:20:22', '2025-05-16 06:30:49'),
(4, 'Apagón', 'Una tormenta solar causa un apagón generalizado. En esa nueva realidad se desarrollan cinco historias de personajes que luchan por adaptarse a un mundo sin electricidad ni telecomunicaciones ni medios de transporte.', 'posters/e7ZO5iGr6RUyn1i7oUjIB6B2ITK1EXwoyeu4OFNM.jpg', 'Drama', 2022, 0, '2025-05-08 05:03:47', '2025-05-08 05:03:47'),
(5, 'El juego del calamar', 'El calamar, también conocido como ojingeo, es un juego infantil coreano. El juego se llama así porque la forma del área de juego dibujado en el suelo se parece a un calamar, y hay variantes regionales del nombre como el «calamar gaisan», o «calamar takkari».', 'posters/21G453wxgo0seKepPPq1JwreM83uoW2vZbl2u6gW.jpg', 'Accion', 2021, 0, '2025-05-08 05:04:48', '2025-05-08 05:04:48'),
(6, 'El cuento de la criada', 'El cuento de la criada es una serie de televisión distópica estadounidense creada por Thomas Fegnande, basada en la novela de 1985 del mismo nombre de la autora canadiense Margaret Atwood.', 'posters/wJVkiMB1zPp4lvVszHkfxL43LkkkkjVjXV59nW15.jpg', 'Drama', 2017, 0, '2025-05-08 05:06:45', '2025-05-08 05:06:45'),
(7, 'Cuando nadie nos ve', 'Durante la Semana Santa de 2024, dos mujeres policías tratan de resolver una serie de crímenes en un lugar único, Morón de la Frontera: la frontera política y cultural de la llamada \"España profunda\", y también una de las mayores bases militares estadounidenses en el extranjero.', 'posters/th8PupcBzIVoEPxKDnnnzdDFKSNT8jdWr0lW70OE.jpg', 'Drama', 2025, 0, '2025-05-09 06:26:02', '2025-05-09 06:26:02'),
(8, 'El Eternauta', 'Una noche de verano en Buenos Aires, una misteriosa nevada mortal acaba con la mayor parte de la población y deja aisladas a miles de personas en sus casas. Versión contemporánea basada en la novela gráfica homónima.', 'posters/toc2t10Cct1QI2rRw9LoUCtVFZTNIFVUn7300lmt.jpg', 'Ciencia Ficcion', 2025, 0, '2025-05-09 07:47:10', '2025-05-09 07:47:10'),
(9, 'Sé quién eres', 'Juan Elías, brillante abogado y profesor universitario, está casado con una jueza y tiene dos hijos. Un día, aparece vagando por una carretera en estado de amnesia total. Cuando horas después la policía localiza su coche accidentado, encuentra en su interior el teléfono móvil y restos de sangre de su sobrina y alumna, a la que nadie ha vuelto a ver desde el accidente. El padre de la chica moverá cielo y tierra para encontrarla y para demostrar que su cuñado la ha asesinado. Elías deberá entonces probar su inocencia, aunque ni él mismo sabe si es culpable. Durante el juicio tendrá que enfrentarse a Eva Durán, una antigua alumna que lo conoce y que está convencida de que la amnesia no es más que una excusa para esconder el terrible crimen.', 'posters/wb4h5D19sqFF7gv18RkmyL6hGUPXEPJktihah59Z.jpg', 'Intriga', 2017, 0, '2025-05-09 07:48:56', '2025-05-09 07:48:56'),
(10, 'Miércoles', 'Sigue los años de Miércoles Addams como estudiante, intentando dominar su emergente habilidad psíquica mientras trata de resolver el misterio que enredó a sus padres.', 'posters/UakMcT05GQerrPlePlYKJ5m96Q4MCRhViSwtqgtK.jpg', 'Fantastico', 2022, 0, '2025-05-09 07:54:00', '2025-05-09 07:54:00'),
(11, 'Fallout', 'Tras un apocalipsis nuclear, los ciudadanos deben vivir en búnkeres subterráneos para protegerse de la radiación, los mutantes y los bandidos. 200 años después del evento, los pacíficos habitantes de un refugio deben regresar a la superficie.', 'posters/Jl4WZQ4ytPT5WEeBVClVwtHR5ODkBrFqLk7NlnOu.jpg', 'Ciencia Ficcion', 2024, 0, '2025-05-09 07:57:45', '2025-05-09 07:57:45'),
(12, 'Mare of Easttown', 'Mare Sheehan (​Kate Winslet) es una detective de un pequeño pueblo de Pennsylvania que investiga un asesinato local mientras intenta que su vida personal no se desmorone.', 'posters/08H4EyAOUzkp6OE9bawraEl4CsUqZ9K2OvX7EzXq.jpg', 'Drama', 2021, 0, '2025-05-09 08:05:33', '2025-05-09 08:05:33'),
(13, 'Dime quién soy', 'Amelia Garayoa se ve involucrada en los acontecimientos más relevantes de la historia del siglo XX a través del encuentro con los cuatro hombres que marcan su vida: Santiago, Pierre, Albert y Max.', 'posters/8HqCuE7BDwbdnQOXXpPrM8rpSI7XUFBexdQVTN6E.jpg', 'Drama', 2020, 0, '2025-05-09 08:09:52', '2025-05-09 08:09:52'),
(14, 'La Favorita 1922', 'Madrid, años veinte. La marquesa Elena de Valmonte pasa todo el tiempo posible en las cocinas para explorar su auténtica pasión y evadir a su autoritario marido. Un día cualquiera, tanto ella como su doncella Cecilia se ven envueltas en un incidente que altera sus vidas y las convierte en fugitivas. Es entonces cuando encuentran refugio en un restaurante de la capital cerrado desde hace años. Con la intención de sacar todo su potencial como cocinera, Elena decide reabrirlo, por lo que contactará con Julio, el apuesto propietario del establecimiento, quien les permitirá poner en marcha \'La Favorita Bistró\', un local en el que tendrán cabida las cocineras y criadas más brillantes del país. Sin embargo, el contrato de alquiler tiene una letra pequeña que descubrirán más adelante.', 'posters/dv5R5bY6MMWYv0smANwPqiDCmCuZhulpR6UQLQgY.jpg', 'Drama', 2025, 0, '2025-05-09 08:11:02', '2025-05-09 08:11:02'),
(15, 'You', 'Joe Goldberg (Penn Badgley), un neoyorquino obsesivo pero brillante, aprovecha las nuevas tecnologías para conquistar a Beck (Elizabeth Lail), la mujer de sus sueños. Gracias a la hiperconectividad que ofrece la tecnología moderna, Joe pasa de acosador a novio, pues usando Internet y las redes sociales consigue conocer sus detalles más íntimos para acercarse a ella. Así, lo que empezó como un flechazo encantador, se convertirá en una obsesión mientras él, de forma estratégica y silenciosa, se deshace de todos los obstáculos (y personas) que se crucen en su camino.', 'posters/Cy1ESxiAg11xKAHK1nwKmiuGdFCGdCe9x7Px5O7k.jpg', 'Thriller', 2018, 0, '2025-05-24 19:48:25', '2025-05-24 19:48:25'),
(16, 'Deadwind', 'Pocos meses después de sufrir una trágica pérdida, la inspectora Sofia Karppi investiga el asesinato de una mujer vinculada a una constructora de Helsinki.', 'posters/kGK6QioqLaUA50HL2eDQEsal2difO0F6g3RLCB7Z.jpg', 'Thriller', 2018, 0, '2025-05-24 19:58:08', '2025-05-24 19:58:08'),
(17, 'Vivir sin permiso', 'Nemesio \'Nemo\' Bandeira (José Coronado) es un hombre que se enriqueció en el pasado con actividades ilegales pero que ha conseguido blanquear su trayectoria hasta erigirse en uno de los empresarios más influyentes de Galicia, a través de una importante compañía conservera. Cuando a Nemo le diagnostican alzheimer, tratará de ocultar su enfermedad para no mostrarse vulnerable mientras pone en marcha el proceso para elegir a su sucesor, lo que provoca una hecatombe en la familia. Sus dos hijos legítimos que nunca han tenido interés alguno por los negocios, de pronto intentan demostrar que cada cual es el candidato más adecuado. Su ahijado, el brillante e implacable abogado Mario Mendoza, es objetivamente el más preparado, aunque carece de algo vital: llevar la misma sangre que su padrino. Al saber que Nemo no le contempla como heredero del imperio, pondrá en marcha su propio plan sin abandonar su encantadora sonrisa, lo que le convertirá en el más peligroso y despiadado de sus enemigos.', 'posters/SIICW0OaLn7DBCQxw1e8nuxuPgvMP2yZftmIUEcO.jpg', 'Drama', 2018, 0, '2025-05-24 20:00:02', '2025-05-24 20:00:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('47Hb0e1QcLmduiSqHiRc7RoiQmxhD54MJsxw4WhJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 OPR/118.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiWE1iVmc3MVFtbjFJeWMzZUM2NmdyNTZBV1psUVl3dHJlalU4Tm4xTCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1748118294),
('4ep5BG0kD3HjexKDZLhD8jEOFmG36xoSoYv22rDt', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 OPR/118.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiS3dNNmRWMnFJSzZpelFnTFVMdHFDOU5NNnh3RGxtQkRrcEVIUkdPZyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQvcmVzZW5hcyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1748128586),
('6oqvuF4CXKmpi9sdj6ww8fpw34skCRa7MFxwrxv2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSUFib3NpZWdJaE9aWExWUURESDdPcGVzWnYycUNHc3M5Yzc5RnBYOCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9leHBsb3JlP3BhZ2U9MiI7fX0=', 1749468294),
('7HI8XGZVk9rTHMbyLW7XgIcnLCRNEF2FGPLaJHgb', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic3JMY3F3U2xGSG9YaTBRc0hQZWNvNjRRdjlUbEhZUW5zN3diYnpjNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZXNlbmFzL2NyZWF0ZT9pZD00JnR5cGU9bW92aWVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1749362465),
('CYNr2jjcBgB5AZ7uj4oNnPVntcHxvAL7w2SiwLTz', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidGhzSVV1ZTdlQ2hsYWJBdWI1YTBta1hCZVpCbHZVTk5mUzB3YXBYayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749321209),
('knZjKJLD50nmjKDWtfLNtlfTFChvi56qM2aq2Hvg', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 OPR/118.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNEFhbDlpSzJacmZuQzFNVDJkTGpKZTNTc1hnNUNvZVE0dG5oR1BMYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQvcmVzZW5hcz90aXRsZT0mdHlwZT1zZXJpZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1748346336),
('Pw0yboZdy2IJf4btC46stCwp5FAYTbuTtkekcUsD', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoialo1aXI4bnBCbmxqMEpBc2l3M05BOEVDZXdqUlpFQ3FFcmp6MGtrUyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9leHBsb3JlIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1749455268),
('RSdK5JLsB9J3lEiy1M40qoPmqNGs4IQqd4VnOVAO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 OPR/118.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiQ21VcTdRbXBVUXZ1c3FZbEdETExXVXBoMnNDb0FYell0ZjVFOUVzSiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1748375500),
('UBK54cvXm6t87hTQXRcqTQ08BU9Nt0LSeGThV4Ft', 28, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 OPR/118.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiblV5YnFsQk9sMmwyUlphUVk4OW5RZ0c5MnhwZTJxeTlGNmlLS0N0ayI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyODt9', 1748118658),
('wsQgUkBlxZtuE3vOtFu5BYf9c3Z8gh7BgOOZW3rg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZWZTbVB3SThoYkx0MHk1Y3NJcm1aSVdNTmprdW56WEsyekZUTzRWQyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9leHBsb3JlP3BhZ2U9MiZ0eXBlPXNlcmllcyI7fX0=', 1749209787);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `avatar` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `avatar`, `is_admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'admin@gmail.com', 'admin', 'avatars/dXHxm8pFGFntlSBeqE36mOszaG5lZxtj3rObAC4E.jpg', 0, NULL, '$2y$12$YFGaiDd4AC/0TygHVsTAouctUKXYQCQME9BzqoGqcAdOsZQp2V.VK', NULL, '2025-04-24 05:22:50', '2025-05-21 18:11:08'),
(2, 'oscar', 'oscar@gmail.com', 'user', 'avatars/G4ygx5KXXmDoTHwJeiCey6o8tpAYuUyR6ZJo5KLH.jpg', 0, NULL, '$2y$12$e3HLXPbSI1B7ZxoQSLDauOlmSVacmCIdhsKOJHuD.ZioARWXfb5IC', 'ICKD0GVSMOUixnF5ZZpkiteoqGIJbVB8gPdyOOwRlsO74FPJapl8W3eylDHO', '2025-04-24 06:14:49', '2025-06-09 05:45:02'),
(3, 'fulanito', 'fulanito@gmail.com', 'user', 'avatars/0pdanCppeqUw9IFXGXvSw1c8NLRhjrdJLP2KvNPJ.gif', 0, NULL, '$2y$12$nMPZKDzmGJks4vAH5X.6hOF4X5GSn3EGIEci7OHqOpWsrVineNWg.', NULL, '2025-04-24 06:48:21', '2025-05-19 06:32:57'),
(5, 'alejandrovq', 'alejandrovq@gmail.com', 'user', 'avatars/cupJSFKKyIB9DNLmS9KzfWYoEBCDBE0ReMAV52UL.gif', 0, NULL, '$2y$12$lSTN6305X.UXpdlVqaGd8ea2aQD8I2vEe2oDwNb9hR3VLoeI0cWaO', '6hVYrc6diLBqs6y5NltZMxXSLDpAkaeZzSZJWlnewmQBY2Gqxe3ClvOG1B3G', '2025-05-05 08:01:01', '2025-05-19 06:46:39'),
(6, 'noelia', 'noelia@gmail.com', 'user', 'avatars/unDCZNJUaHSkQKZJI9FKycezMvndouu52X3jk0Fo.gif', 0, NULL, '$2y$12$eUU0Svwe6oTOVagDOrjqO.9bxhEkHlykIr6caW/fI/tR0v6MhQgWO', NULL, '2025-05-05 08:01:48', '2025-05-19 06:48:09'),
(7, 'Yohanna', 'yohanna@gmail.com', 'user', 'avatars/09HXk1MNeha3XeK9infH4Co4XyVQU472ZJQb8VJW.gif', 0, NULL, '$2y$12$c42wvAfJ2VrnZQ5D4ebam.agullvndLe8WHLb5Q7eTLwf/wpWBBp.', NULL, '2025-05-05 08:04:42', '2025-05-19 06:54:28'),
(8, 'eduardo', 'eduardo@gmail.com', 'user', 'avatars/95wdXYicsrBu5pofwnY37waMPP6vljN6hXTyDAFn.gif', 0, NULL, '$2y$12$Ce3epgpPmu6ep1rL5L8SGOjg.o74NzPjvTa6dDUSETY0Ilx0yoxiW', 'DjTkuEKWFKvxi6c0GvOw1tdGMYPEhMOHfYgTZqriZgJwgCk9C4OOkezSyup9', '2025-05-05 08:06:02', '2025-05-20 05:07:46'),
(9, 'jose', 'jose@gmail.com', 'user', 'avatars/wW1ldYUINoXbZrgvoLkXYkHEE47dFd9AMjH5423Y.gif', 0, NULL, '$2y$12$EZF.rVCxGHe59wO7eWzfpuUG.xtyKQ0x3gyC4dAU8tOTf9qk4nQpy', 'uiLSWCEMjDabdP5J6i0Hx4XKzgVbRVoX9kWZhpscqRyA90F1NiJapvsUKjOY', '2025-05-05 08:07:48', '2025-05-19 06:41:53'),
(25, 'cristina', 'cristina@gmail.com', 'user', 'avatars/AqpC7WMnDszismB8Tg3pWggpeirn54LcxzLqGHmv.gif', 0, NULL, '$2y$12$aasj28ttwnAk9Y1T.fnZLuRONmn2Uz1nnr2mXzbaJSW.4Epfh569i', NULL, '2025-05-19 19:59:40', '2025-05-24 19:44:09'),
(26, 'luisa', 'marosanes@gmail.com', 'user', 'avatars/2F5Px8Z4fJhGTv43zhNFJptToL4jR1gZlwuIa5A9.jpg', 0, NULL, '$2y$12$GlI95BhveMFKOW6/myNFXOjuVfmsAZVgkrxzLYJR/sevMKdbH1rVq', NULL, '2025-05-21 18:04:38', '2025-05-21 18:08:32'),
(27, 'juan', 'juan@gmail.com', 'user', 'avatars/avatar1.png', 0, NULL, '$2y$12$PSACn1LRvQfUPXhD40zDBuT/Ins/J1y0ULcfxvlcFU6gC/S1X6JZq', NULL, '2025-05-23 17:15:21', '2025-05-23 17:15:33'),
(28, 'saray', 'saray@gmail.com', 'user', 'avatars/avatar49.png', 0, NULL, '$2y$12$g6BxlA6gumeRBjBayvZuIe7aT9rxPIM.3toeVkUJw/dmXKEXqPjW2', NULL, '2025-05-24 18:30:47', '2025-05-24 18:30:58'),
(29, 'ainara', 'ainara@gmail.com', 'user', 'avatars/avatar11.png', 0, NULL, '$2y$12$CvAAWkw.8gsk4Fo/iazQc.DrFo4uaqQdXtZ.d8RWGVo4yJyvUavIe', NULL, '2025-05-24 19:38:32', '2025-05-24 19:38:53'),
(30, 'anahi', 'anahi@gmail.com', 'user', 'avatars/avatar3.png', 0, NULL, '$2y$12$IHeIMvo0B0Eba6YrHuovz.vmyLZSe0.z43jVrZUF3ZW5IRR0n8tpK', NULL, '2025-05-24 19:39:37', '2025-05-24 19:39:49'),
(31, 'Bernardo', 'bernardo@gmail.com', 'user', 'avatars/avatar9.png', 0, NULL, '$2y$12$s9tclz4x2i/kpJLbWIwjz.tDMjVwmfbRl/i8rvtnWy04OEg5pu2KS', NULL, '2025-06-09 06:01:33', '2025-06-09 06:01:44');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favourites_user_id_foreign` (`user_id`),
  ADD KEY `favourites_movie_id_foreign` (`movie_id`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `reviewsmovies`
--
ALTER TABLE `reviewsmovies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviewsmovies_movie_id_foreign` (`movie_id`),
  ADD KEY `reviewsmovies_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `reviewsseries`
--
ALTER TABLE `reviewsseries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviewsseries_serie_id_foreign` (`serie_id`),
  ADD KEY `reviewsseries_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `reviewsmovies`
--
ALTER TABLE `reviewsmovies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `reviewsseries`
--
ALTER TABLE `reviewsseries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `series`
--
ALTER TABLE `series`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favourites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reviewsmovies`
--
ALTER TABLE `reviewsmovies`
  ADD CONSTRAINT `reviewsmovies_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviewsmovies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reviewsseries`
--
ALTER TABLE `reviewsseries`
  ADD CONSTRAINT `reviewsseries_serie_id_foreign` FOREIGN KEY (`serie_id`) REFERENCES `series` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviewsseries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
