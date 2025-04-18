-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 18, 2025 at 02:36 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet_books`
--

-- --------------------------------------------------------

--
-- Table structure for table `livre`
--

CREATE TABLE `livre` (
  `id_livre` int(11) NOT NULL,
  `nom_livre` varchar(64) NOT NULL,
  `nom_auteur` varchar(64) NOT NULL,
  `nbr_exemplaire` int(11) NOT NULL,
  `nbr_restant` int(11) NOT NULL,
  `chemin_image` longtext NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `livre`
--

INSERT INTO `livre` (`id_livre`, `nom_livre`, `nom_auteur`, `nbr_exemplaire`, `nbr_restant`, `chemin_image`, `description`) VALUES
(1, 'Le Comte de Monte-Cristo', ' Alexandre Dumas', 10, 10, 'https://media.sudouest.fr/18828592/1200x-1/l-affiche-teaser-du-comte-de-monte-cristo-avec-pierre-niney-1818300.jpg?v=1709565595', 'Le Comte de Monte-Cristo est un roman d\'Alexandre Dumas, écrit avec la collaboration d\'Auguste Maquet et dont la publication commence pendant l\'été 1844. Il est partiellement inspiré du récit d\'un fait divers, « Le Diamant et la Vengeance » (voir Pierre Picaud), publié en 1838 dans les Mémoires tirés des archives de la police (tome V, chapitre LXXIV), mémoires apocryphes rédigés en large partie par l\'écrivain Étienne-Léon de Lamothe-Langon à partir des notes de Jacques Peuchet, archiviste de la préfecture de police.\r\n\r\nCet ouvrage est, avec Les Trois Mousquetaires, l\'une des œuvres les plus connues de l\'écrivain tant en France qu\'à l\'étranger. Il a d\'abord été publié en feuilleton dans le Journal des débats du 28 août au 19 octobre 1844 (1re partie), du 31 octobre au 26 novembre 1844 (2e partie), puis finalement du 20 juin 1845 au 15 janvier 1846 (3e partie).'),
(2, 'Les Misérables', 'Victor Hugo', 10, 10, 'https://m.media-amazon.com/images/I/51KWBQezwrL._SY445_SX342_.jpg', 'Les Misérables est un roman de Victor Hugo publié en 1862, l’un des plus vastes[1] et des plus notables de la littérature du XIXe siècle[2].\r\n\r\nIl décrit la vie de pauvres gens dans Paris et la France provinciale du premier tiers du XIXe siècle, l’auteur s\'attachant plus particulièrement au destin du bagnard Jean Valjean ; il a donné lieu à de nombreuses adaptations, au cinéma et sur d’autres supports.\r\n\r\nC\'est un roman historique, social et philosophique dans lequel on retrouve les idéaux du romantisme et ceux de Victor Hugo concernant la nature humaine. La préface résume clairement les intentions de l\'auteur : « Tant que les trois problèmes du siècle, la dégradation de l’homme par le prolétariat, la déchéance de la femme par la faim, l\'atrophie de l\'enfant par la nuit, ne seront pas résolus ; en d’autres termes, et à un point de vue plus étendu encore, tant qu’il y aura sur la terre ignorance et misère, des livres de la nature de celui-ci pourront ne pas être inutiles ».'),
(3, 'Madame Bovary', 'Gustave Flaubert', 10, 10, 'https://cdn.kobo.com/book-images/a80e86ad-8690-4916-a2be-1a8827e376ad/1200/1200/False/madame-bovary-183.jpg', 'Madame Bovary. Mœurs de province, couramment abrégé en Madame Bovary, est un roman de Gustave Flaubert paru en 1857 chez Michel Lévy frères, après une préparution en 1856 dans la Revue de Paris. Il s\'agit d\'une œuvre majeure de la littérature française. L\'histoire est celle de l\'épouse d\'un médecin de province, Emma Bovary, qui lie des relations adultères et vit au-dessus de ses moyens, essayant ainsi d\'éviter l’ennui, la banalité et la médiocrité de la vie provinciale.\r\n\r\nÀ sa parution, le roman fut attaqué par le procureur de Paris du Second Empire pour immoralité et obscénité. Le procès de Flaubert, commencé en janvier 1857, fit connaître l’histoire en France. Après l\'acquittement de l\'auteur le 7 février 1857, le roman fut édité en deux volumes le 15 avril 1857 chez Michel Lévy frères. La première édition de 6 750 exemplaires fut un succès instantané : elle fut vendue en deux mois. Il est considéré comme l\'un des premiers exemples d\'un roman réaliste.'),
(4, 'Le Rouge et le Noir', 'Stendhal', 10, 10, 'https://images.epagine.fr/978/9782017064978_1_75.jpg', 'Le Rouge et le Noir, sous-titré Chronique du XIXe siècle, puis Chronique de 1830, est un roman écrit par Stendhal, publié pour la première fois à Paris chez Levasseur le 13 novembre 1830[1], bien que l\'édition originale[2] mentionne la date de 1831. C\'est son deuxième roman, après Armance.\r\n\r\nIl est cité par William Somerset Maugham en 1954, dans son essai Ten Novels and Their Authors, parmi les dix plus grands romans jamais écrits.'),
(5, 'Germinal', 'Émile Zola', 10, 9, 'https://bibliomaniapublishing.com/wp-content/uploads/2023/03/GERMINAL-EMILE-ZOLA-1-600x869.png', 'Germinal est un roman d\'Émile Zola publié en 1885. Écrit d\'avril 1884 à janvier 1885, le treizième roman de la série des Rougon-Macquart paraît d\'abord en feuilleton entre novembre 1884 et février 1885 dans le Gil Blas, l\'année de la grande grève des mineurs d\'Anzin débutée le 2 mars 1884 et temps fort de l\'histoire du Bassin minier du Nord-Pas-de-Calais, où l\'auteur s\'est rendu pour inspirer l\'intrigue. Après sa première édition en mars 1885, le roman a été publié dans plus d\'une centaine de pays et adapté pour le cinéma et la télévision.'),
(6, 'Notre-Dame de Paris', 'Victor Hugo', 10, 10, 'https://products-images.di-static.com/image/victor-hugo-notre-dame-de-paris/9789953315867-475x500-1.webp', 'Notre-Dame de Paris (titre complet : Notre-Dame de Paris. 1482) est un roman historique de l\'écrivain français Victor Hugo, publié en 1831.\r\n\r\nLe titre fait référence à la cathédrale Notre-Dame de Paris, qui est un des lieux principaux de l\'intrigue du roman.'),
(7, 'À la recherche du temps perdu', 'Marcel Proust', 10, 10, 'https://media.s-bol.com/mORp5Z9lAx9R/550x710.jpg', 'À la recherche du temps perdu, couramment évoqué plus simplement sous le titre La Recherche, est un roman de Marcel Proust, écrit de 1906 à 1922 et publié de 1913 à 1927 en sept tomes, dont les trois derniers parurent après la mort de l’auteur. Plutôt que le récit d\'une séquence déterminée d\'événements, cette œuvre s\'intéresse non pas aux souvenirs du narrateur mais à une réflexion psychologique sur la littérature, sur la mémoire et sur le temps. Cependant, comme le souligne Jean-Yves Tadié dans Proust et le roman, tous ces éléments épars se découvrent reliés les uns aux autres quand, à travers toutes ses expériences négatives ou positives, le narrateur (qui est aussi le héros du roman), découvre le sens de la vie dans l\'art et la littérature au dernier tome.\r\n\r\nÀ la recherche du temps perdu est parfois considéré comme l\'une des plus importantes œuvres littéraires de tous les temps '),
(8, 'L\'Étranger', 'Albert Camus', 10, 9, 'https://media.senscritique.com/media/000020584322/300/l_etranger.jpg', 'L\'Étranger est le premier roman publié d\'Albert Camus, paru en 1942. Les premières esquisses datent de 1938, mais le roman ne prend vraiment forme que dans les premiers mois de 1940 et sera travaillé par Camus jusqu’en 1941. Il prend place dans la tétralogie que Camus nommera « cycle de l\'absurde » qui décrit les fondements de la philosophie camusienne : l\'absurde. Cette tétralogie comprend également l\'essai Le Mythe de Sisyphe ainsi que les pièces de théâtre Caligula et Le Malentendu.\r\n\r\nLe roman a été traduit en soixante-huit langues ; c\'est le troisième roman francophone le plus lu dans le monde, après Le Petit Prince de Saint-Exupéry et Vingt Mille Lieues sous les mers de Jules Verne. Une adaptation cinématographique en a été réalisée par Luchino Visconti en 1967.'),
(9, '1984', ' George Orwell', 10, 10, 'https://s3.amazonaws.com/adg-bucket/1984-george-orwell/3423-medium.jpg', '1984 ou en toutes lettres Mil neuf cent quatre-vingt-quatre[1] (titre original : Nineteen Eighty-Four), est un roman dystopique de l\'écrivain britannique George Orwell. Publié le 8 juin 1949 par Secker & Warburg (en), il s\'agit du neuvième et dernier livre d\'Orwell achevé de son vivant. Thématiquement, il se concentre sur les conséquences du totalitarisme, de la surveillance de masse, et de l\'enrégimentement répressif des personnes et des comportements au sein de la société. Orwell, fervent partisan du socialisme démocratique et membre de la gauche antistalinienne, décrit dans son roman une Grande-Bretagne, trente ans après une guerre nucléaire entre l\'Est et l\'Ouest censée avoir eu lieu dans les années 1950, et où s\'est instauré un régime totalitaire fortement inspiré à la fois de certains éléments du stalinisme et du nazisme. Plus largement, le roman examine le rôle de la vérité et des faits au sein des sociétés et les manières dont ils peuvent être manipulés.\r\n\r\nL\'histoire se déroule dans un futur imaginaire. L\'année en cours est incertaine, mais on pense qu\'il s\'agit de 1984. Une grande partie du monde est en guerre perpétuelle (en). La Grande-Bretagne, désormais connue sous le nom d\'Airstrip One, est devenue une province du super-État (en) Océania, dirigé par Big Brother, un leader dictatorial soutenu par un culte de la personnalité intense orchestré par la police de la Pensée. Le Parti s\'engage dans une surveillance gouvernementale omniprésente et, par l\'intermédiaire du ministère de la vérité, dans un négationnisme historique et une propagande constante pour persécuter l\'individualité et la pensée indépendante. La liberté d\'expression n\'existe plus, tous les comportements sont minutieusement surveillés grâce à des machines appelées télécrans et d\'immenses affiches représentant le visage de Big Brother sont placardées dans les rues, avec l\'inscription « Big Brother vous regarde » (« Big Brother is watching you »).\r\n\r\nLe protagoniste, Winston Smith, est un employé assidu de niveau intermédiaire au ministère de la Vérité qui déteste secrètement le Parti et rêve de rébellion. Il tient un journal interdit et entame une relation sexuelle avec sa collègue Julia. Ils découvrent un groupe de résistance obscur appelé la Fraternité. Cependant, leur contact au sein de ce groupe s\'avère être un agent du Parti, et Smith et Julia sont arrêtés. Smith est soumis à des mois de manipulation psychologique et de torture de la part du ministère de l\'Amour. Il trahit finalement Julia et est libéré. Il prend conscience dans les dernières pages du roman qu\'il est « guéri » et qu’il aime Big Brother.'),
(10, 'Crime et Châtiment\r\n', 'Fiodor Dostoïevski', 10, 10, 'https://lug.scenari-community.org/kkf/res/CrimeChatiment.png', 'Crime et Châtiment (en russe : Преступление и наказание [prʲɪstʊˈplʲenʲɪje ɪ nəkɐˈzanʲɪje]) est un roman de l’écrivain russe Fiodor Dostoïevski publié en feuilleton en 1866 et en édition séparée en 1867. Archétype du roman psychologique, il est considéré comme l\'une des plus grandes œuvres littéraires de l\'Histoire.\r\n\r\nLe roman dépeint l\'assassinat d’une vieille prêteuse sur gage et de sa sœur par Rodion Raskolnikov, ancien étudiant de Saint-Pétersbourg tombé dans la pauvreté et l\'exclusion sociale avec une analyse minutieuse de l\'évolution de l\'état émotionnel, mental, physique et socio-économique du meurtrier ainsi que des causes et des conséquences du crime.'),
(11, 'Gatsby le Magnifique', 'F. Scott Fitzgerald', 10, 10, 'https://media.senscritique.com/media/000006683824/300/gatsby_le_magnifique.jpg', 'Gatsby le Magnifique (titre en Anglais : The Great Gatsby) est un roman de l\'écrivain américain Francis Scott Fitzgerald (1896-1940). Publié en 1925 aux États-Unis, il a été traduit en français à partir de 1926 sous ce titre (hormis la retraduction de 2011 intitulée Gatsby). L\'histoire se déroule à New York dans les années 1920. Il est souvent décrit comme le reflet des années folles dans la littérature américaine.\r\n\r\nIl figure à la 2e place dans la liste des 100 meilleurs romans de langue anglaise du XXe siècle établie par la Modern Library en 1998[2].'),
(12, 'Orgueil et Préjugés', 'Jane Austen', 10, 10, 'https://cdn1.booknode.com/book_cover/1146/full/orgueil-et-prejuges-1146355.jpg', 'Orgueil et Préjugés (Pride and Prejudice) est un roman de la femme de lettres anglaise Jane Austen paru en 1813. Il est considéré comme l\'une de ses œuvres les plus significatives et est aussi la plus connue du grand public.\r\n\r\nRédigé entre 1796 et 1797, le texte, alors dans sa première version (First Impressions), figurait au nombre des grands favoris des lectures en famille que l\'on faisait le soir à la veillée dans la famille Austen. Révisé en 1811, il est finalement édité deux ans plus tard, en janvier 1813. Son succès en librairie est immédiat, mais bien que la première édition en soit rapidement épuisée, Jane Austen n\'en tire aucune notoriété : le roman est en effet publié sans mention de son nom (« par l\'auteur de Sense and Sensibility ») car sa condition de « femme de la bonne société » lui interdit de revendiquer le statut d\'écrivain à part entière.\r\n\r\nDrôle et romanesque, le chef-d\'œuvre de Jane Austen continue à jouir d\'une popularité considérable, par ses personnages bien campés, son intrigue soigneusement construite et prenante, ses rebondissements nombreux, et son humour plein d\'imprévu. Derrière les aventures sentimentales des cinq filles Bennet, Jane Austen dépeint fidèlement les rigidités de la société anglaise au tournant des XVIIIe et XIXe siècles. À travers le comportement et les réflexions d\'Elizabeth Bennet, son personnage principal, elle soulève les problèmes auxquels sont confrontées les femmes de la petite gentry campagnarde pour s\'assurer sécurité économique et statut social. À cette époque et dans ce milieu, la solution passe en effet presque obligatoirement par le mariage : cela explique que les deux thèmes majeurs d\'Orgueil et Préjugés soient l\'argent et le mariage, lesquels servent de base au développement des thèmes secondaires.\r\n\r\nGrand classique de la littérature anglaise, Orgueil et Préjugés est à l\'origine du plus grand nombre d\'adaptations fondées sur une œuvre austenienne, tant au cinéma qu\'à la télévision. Depuis Orgueil et Préjugés de Robert Z. Leonard en 1940, il a inspiré quantité d\'œuvres ultérieures : des romans, des films, et même une bande dessinée parue chez Marvel Comics.\r\n\r\nDans son essai de 1954, Ten Novels and Their Authors, William Somerset Maugham le cite en seconde position parmi les dix romans qu\'il considére comme les plus grands. En 2013, Le Nouvel Observateur, dans un hors-série consacré à la littérature des XIXe et XXe siècles, le cite parmi les seize titres retenus pour le XIXe siècle, le considérant comme « peut-être le premier chef-d\'œuvre de la littérature au féminin »[1].'),
(13, 'Le Petit Prince', 'Antoine de Saint-Exupéry', 10, 10, 'https://www.lepetitprince.com/wp-content/uploads/2023/01/COVER-Le-Petit-Prince-FR.jpg', 'Le Petit Prince est l\'œuvre la plus connue d\'Antoine de Saint-Exupéry. Publié en français en 1943 à New York simultanément à sa traduction anglaise[1], c\'est une œuvre poétique et philosophique sous l\'apparence d\'un conte illustré pour enfants.\r\n\r\nTraduit en six cents langues et dialectes différents[2], Le Petit Prince est l\'ouvrage le plus traduit au monde après la Bible[3].\r\n\r\nLe langage et les illustrations, simples et dépouillés, pour être compris des enfants, constituent pour le narrateur le support privilégié de l\'expression symbolique de la vie et de ses mystères. Les chapitres relatent le voyage et les rencontres du petit prince qui le laissent souvent perplexe, en raison de l\'incohérence voire de l\'absurdité du comportement des hommes. Cette histoire peut être lue comme une allégorie qui décrit le parcours d\'une âme humaine enfantine confrontée à la dure réalité d\'un monde désenchanté qui va la mettre à l\'épreuve.\r\n\r\nLes aquarelles font partie intégrante de l\'ouvrage[4] et participent à la pureté du style : sensibilité et profondeur sont les qualités maîtresses de d\'une œuvre pour éclairer nos choix de vie, notre vécu de l\'amitié et de l\'amour[5].\r\n\r\nL\'œuvre peut aussi se lire comme une invitation à retrouver l\'enfant en soi, car « toutes les grandes personnes ont d\'abord été des enfants...Mais peu d\'entre elles s\'en souviennent. » Telle est la dédicace adressée à son ami Léon Werth, « quand il était petit garçon ».');

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `idreserve` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `j_debut` date NOT NULL,
  `j_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`idreserve`, `id_livre`, `id_utilisateur`, `j_debut`, `j_fin`) VALUES
(30, 8, 8, '2025-04-18', '2025-05-18'),
(31, 5, 8, '2025-02-18', '2025-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `adresse_mail` varchar(64) NOT NULL,
  `mot_de_passe` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `adresse_mail`, `mot_de_passe`) VALUES
(8, 'admin', 'admin@gmail.com', '$2y$10$EcVaHGSPshVdFk1FPw.W6OriuXpWUabRUJMMJh62D2LVbZ51qasa2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id_livre`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`idreserve`),
  ADD KEY `fk_commande` (`id_livre`),
  ADD KEY `fk_commande2` (`id_utilisateur`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `livre`
--
ALTER TABLE `livre`
  MODIFY `id_livre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `idreserve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `fk_commande` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`id_livre`),
  ADD CONSTRAINT `fk_commande2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;