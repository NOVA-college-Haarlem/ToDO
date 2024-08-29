
--
-- Tabelstructuur voor tabel `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `category` varchar(200) DEFAULT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `category`, `status`) VALUES
(1, 'Boodschappen doen deze week', NULL, 'in behandeling'),
(2, 'Autoverzekering vernieuwen', NULL, 'in behandeling'),
(3, 'Online code cursus kopen', NULL, 'in behandeling');