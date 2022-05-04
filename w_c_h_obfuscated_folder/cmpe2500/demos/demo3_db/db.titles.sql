CREATE TABLE IF NOT EXISTS `titles` (
  `title_id` int(11) NOT NULL AUTO_INCREMENT,
  `price` real NOT NULL,
  `title` varchar(64) NOT NULL,
  PRIMARY KEY (`title_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `titles` (`title_id`, `price`, `title`) VALUES
(1, 36.90, 'AI 2041: Ten Visions for Our Future'),
(2, 22.77, 'Thinking, Fast & Slow'),
(3, 18.27, 'Thinking in Systems'),
(4, 29.21, 'The Premonition: A Pandemic Story');