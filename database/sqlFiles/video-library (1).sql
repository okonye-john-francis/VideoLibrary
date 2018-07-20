
INSERT INTO `configs` (`id`, `config_key`, `config_value`, `created_at`, `updated_at`) VALUES
(1, 'Standard Movie Price', '1500.00', '2018-07-14 05:35:57', '2018-07-14 05:35:57'),
(2, 'Rare Movie Price', '2000.00', '2018-07-14 05:36:07', '2018-07-14 05:36:07');


INSERT INTO `genres` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Action', '2018-07-14 07:25:13', '2018-07-14 07:25:13'),
(2, 'Horror', '2018-07-14 07:25:42', '2018-07-14 07:25:42'),
(3, 'Adventure', '2018-07-14 07:25:51', '2018-07-14 07:25:51'),
(4, 'History', '2018-07-14 07:26:02', '2018-07-14 07:26:02'),
(5, 'Sports', '2018-07-14 07:26:11', '2018-07-14 07:26:11'),
(6, 'Animation', '2018-07-14 07:55:53', '2018-07-14 07:55:53'),
(7, 'Nigerian', '2018-07-14 13:17:55', '2018-07-14 13:17:55'),
(8, 'Indian', '2018-07-14 13:18:04', '2018-07-14 13:18:04'),
(9, 'Christian', '2018-07-14 13:18:17', '2018-07-14 13:18:17'),
(10, 'Love Story', '2018-07-14 14:08:49', '2018-07-14 14:08:49'),
(11, 'Comedy', '2018-07-17 05:16:04', '2018-07-17 05:16:04');


INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '2018_07_14_061959_create_users_table', 1),
(18, '2018_07_14_062042_create_password_resets_table', 1),
(19, '2018_07_14_062220_create_configs_table', 1),
(20, '2018_07_14_062302_create_genre_table', 1),
(21, '2018_07_14_062510_create_videos_table', 1),
(22, '2018_07_14_062551_create_orders_table', 1),
(23, '2018_07_14_062823_create_shopping_carts_table', 1);


INSERT INTO `orders` (`id`, `video_ordered`, `ordered_by`, `contact`, `address`, `quantity`, `price`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 2, '0788753585', 'Kikoni', 2, '4000.00', NULL, 'pending', '2018-07-16 04:15:47', '2018-07-16 04:15:47'),
(2, 18, 2, '0788753585', 'Kikoni', 1, '2000.00', NULL, 'Approved', '2018-07-16 11:07:24', '2018-07-17 06:21:01'),
(3, 4, 2, '0703267129', 'Nakulabye', 1, '1500.00', NULL, 'Approved', '2018-07-17 03:55:54', '2018-07-18 08:18:12'),
(4, 23, 2, '0712392745', 'Bugolobi', 1, '2000.00', NULL, 'Approved', '2018-07-17 11:08:19', '2018-07-19 05:53:16'),
(5, 21, 2, '0792172946', 'Katwe', 2, '3000.00', NULL, 'Approved', '2018-07-17 11:10:08', '2018-07-20 03:11:14'),
(7, 9, 2, '0713863597', 'Lugala', 3, '4500.00', NULL, 'pending', '2018-07-18 01:15:59', '2018-07-18 01:15:59'),
(16, 15, 2, '0788753585', 'Gayaza', 1, '2000.00', NULL, 'pending', '2018-07-19 05:49:45', '2018-07-19 05:49:45'),
(14, 12, 2, '0703267129', 'Bulange', 1, '1500.00', NULL, 'pending', '2018-07-19 05:02:35', '2018-07-19 05:02:35'),
(13, 21, 2, '0703267129', 'Bulange', 1, '1500.00', NULL, 'Approved', '2018-07-19 05:02:35', '2018-07-20 03:11:11'),
(25, 5, 2, '0788753585', 'Buwate', 5, '7500.00', NULL, 'pending', '2018-07-20 03:39:18', '2018-07-20 03:39:18');


INSERT INTO `shopping_carts` (`id`, `video_id`, `booked_by`, `created_at`, `updated_at`) VALUES
(36, 21, 3, '2018-07-18 08:12:08', '2018-07-18 08:12:08'),
(35, 15, 3, '2018-07-18 08:09:56', '2018-07-18 08:09:56');


INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@admin.com', '$2y$10$ZHeuu3xyyzKxNLwU0VaN2e6EGa2eT/VkUi/sQiTD4ilpPdsvH03Ce', 'Oa1FUdAabyCvZ1BJLIh9dBiMA8lFYZHgh2Dt6hxfLwVBfV6I4YmrqrCizqkq', '2018-07-14 05:34:40', '2018-07-14 05:34:40'),
(2, 'Francis', 'francis.jero2@gmail.com', '$2y$10$TDvQMdE1eFkh2FHfobm7BumEbbWFTToQgGfbmnLDPsBbyRMcpimHG', '7gUZtO4k5fYzrLRVJ1bdj4HkL5kcxNniWQ4V5K3Su3OFejWmO6OgM1wPLEIh', '2018-07-14 13:49:25', '2018-07-14 13:49:25'),
(3, 'Emmanuel', 'eobua@gmail.com', '$2y$10$8rfdvWnMhvgtq1LHVRNLEuOSGVl8JwbndDcFzwlBb39JZ/6UpgmDC', 'N0KMRpwSQT8biebZKBxPBNN5T9HYZRVM5SoMrBI3Skq4VXt5IHHlvN5mZMXa', '2018-07-18 08:06:59', '2018-07-18 08:06:59'),
(4, 'Client', 'client@client.com', '$2y$10$JXe10d4Uh9n2XQaQ1lkii.WrO63fjVJE8CwMIeIR4cVTjJ5d9G5De', 'bWamvZA4aCYrDMA7uVf2w9hxD0eF6dsvGMOXjqYA2uqRqVafy6vmV1IDuYM3', '2018-07-20 05:18:08', '2018-07-20 05:18:08');

INSERT INTO `videos` (`id`, `video_title`, `video_image`, `video_description`, `video_genre`, `video_actor`, `video_director`, `config_category`, `created_at`, `updated_at`) VALUES
(2, 'Heart of a Woman', '/storage/uwj8m2Vvq8LUMMIUoKEde9756YtnJOP0RRX0oHz2.jpeg', 'A real life Nigerian Movie with lots of life lessons to teach the viewer', '7', 'Jenaviv', 'Ibu', 1, '2018-07-14 13:22:22', '2018-07-14 13:22:22'),
(3, 'Harvest Love', '/storage/5fPtoqu8oiDyqWi0OD4bhgJZE76Y4YIscNCKDr5M.jpeg', 'Fantastic movie teaching how to handle love matters', '7', 'Van Vicker', 'Ibu', 1, '2018-07-14 13:24:37', '2018-07-14 13:24:37'),
(4, 'Sorrows of Chimamanda', '/storage/cUZjk0fmqGhv8fcVAg6WZ5E2AvMZThPP0dH9KaGj.jpeg', 'Movie emphasis how to handle real life hard situations that arise in life', '7', 'Chimamanda', 'Oyelobo', 1, '2018-07-14 13:26:30', '2018-07-14 13:26:30'),
(5, 'The King and the Palace', '/storage/4dnmNMpowvoetysqFJ8oZY3f1cOBj7bB9oSkefRL.jpeg', 'Movie spiced with African Traditional flavour', '7', 'Van Vicker', 'Oyelobo', 1, '2018-07-14 13:42:21', '2018-07-14 13:42:21'),
(6, 'Safe Haven', '/storage/gSlK9FzLx6M4mE3tTPmTysZZuxChR6QIXP7gBOFM.jpeg', 'Great Movie teaching love tips', '10', 'Josh Duhamel', 'Dear John', 2, '2018-07-14 14:10:35', '2018-07-14 14:10:35'),
(7, 'Letters to Juliet', '/storage/tXD74WUyyqhsYVLLuO0pq30nqe73b6FbIVrjThpA.jpeg', 'How to take love to the next level', '10', 'Amanda Seyfried and Vanessa Redgrave', NULL, 2, '2018-07-14 14:14:34', '2018-07-14 14:14:34'),
(8, 'Me before You', '/storage/o68LNdB8Nu1mh86wWWRK7iHOcRYwLf6Y48dukYRD.jpeg', 'The movies is a quick love guide', '10', 'Emilia Clarke and Sam Claflin', NULL, 1, '2018-07-14 14:16:16', '2018-07-14 14:16:16'),
(9, 'Kya Love Story Hai', '/storage/E5gM7SnA1vS2gkMNi33dv9DPaaX0iQWWfFdwGQwb.jpeg', 'Indian Romantic Love Story', '10', 'Kareena Kapul', NULL, 1, '2018-07-14 14:20:27', '2018-07-14 14:20:27'),
(11, 'The Rejected Stone', '/storage/jfJmfwQJJ3AwqyJ9vh92iKZXjNS7jXjN0UMf0dSc.jpeg', 'Christian Movie', '7', 'Jenaviv', 'Oyelobo', 1, '2018-07-16 09:35:24', '2018-07-16 09:35:24'),
(12, 'Education Is the Key', '/storage/Khn3BYVYkj1FA3UOTabPJJQvonOH3sAFckkg87y2.jpeg', 'Giving good background to education', '7', 'Jenaviv', 'Oyelobo', 1, '2018-07-16 09:36:16', '2018-07-16 09:36:16'),
(13, 'True Love Never Dies', '/storage/6RIAla2VPfV4OAJx2g9fZN8Ci5pJRzGwLXg9W6s6.jpeg', 'Love scene', '10', 'John Smith', 'Mark Hummels', 2, '2018-07-16 09:38:59', '2018-07-16 09:38:59'),
(15, 'Bible', '/storage/t7GlkLin7iE9qAks1KxEMqBJfziqbLsxMX7SH1Vx.jpeg', 'Bible easy Learning', '9', 'Fredricko James', 'Christopher Nolan', 2, '2018-07-16 09:45:19', '2018-07-16 09:45:19'),
(16, 'The Biblical Joseph', '/storage/KFkyco6SB6WXVIAWoFZCYQK3gqAukbqCcxyeU1T0.jpeg', 'Lifestyle of Joseph', '9', 'John Walker', 'Patrick Helm', 2, '2018-07-16 09:46:25', '2018-07-16 09:46:25'),
(17, 'Passion of Christ', '/storage/IagfzlkEO4r53zJ3kttLPc1X4TdVmQAkJEqOwZ3m.jpeg', 'Story of the Biblical life of Christ', '9', 'Peter Rock', 'Patrick Helm', 1, '2018-07-16 09:53:09', '2018-07-16 09:53:09'),
(18, 'Biblical Moses', '/storage/RJ8tAnL3VNvoQo9smocWq0osUKlmVteZuB8RBJPW.jpeg', 'Life style of Biblical Moses', '9', 'John Smith', 'Mark Button', 2, '2018-07-16 09:54:41', '2018-07-16 09:54:41'),
(19, 'The Biblical Jacob', '/storage/SNadiGgrhWDsiWJoR7hs283eNDn6qmVhAV7Sr6Rc.jpeg', 'Jacob and hoe he became Israel', '9', 'Harry Reuson', 'Christopher Nolan', 1, '2018-07-16 09:56:32', '2018-07-16 09:56:32'),
(20, 'Fright Night', '/storage/bzHISR7hUgekEy4HC1cdGpVqJe2OPYReBxTAbChz.jpeg', 'Interesting', '2', 'Tonny Jaa', 'Mark Hummels', 1, '2018-07-16 10:01:02', '2018-07-16 10:01:02'),
(21, 'Scary or Die', '/storage/ePkvDLjDc1knSYtbSKt8siNnxgDkdkh3FKqhlR9j.jpeg', 'Very interesting Movies', '2', 'Josh Duhamel', 'Christopher Nolan', 1, '2018-07-16 10:01:59', '2018-07-16 10:01:59'),
(22, 'Bye Bye Man', '/storage/NcNjAadLv7gwVmN7AfGgPVjDg9CR7uzX20eH1W7P.jpeg', 'Very nice movie', '2', 'John Smith', 'Oyelobo', 1, '2018-07-16 10:02:47', '2018-07-20 01:11:30'),
(23, 'Secret Mission', '/storage/AVXQS9OO9YYsfE7f4NfNW4vUSAQurSStdiIf0xMV.jpeg', 'Very Interesting Movies with animations', '2', 'John Smith', 'Patrick Helm', 2, '2018-07-16 10:08:27', '2018-07-16 10:08:27');
