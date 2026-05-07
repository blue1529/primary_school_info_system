-- Inserting Teacher Data
INSERT INTO Teacher (first_name, middle_name, last_name, phone, email, class_name, subjects_taught, gender, date_of_start, place_of_residence) VALUES
('Grace', 'Chikondi', 'Banda', '+265 881 100 001', 'grace.banda@school.mw', 'Class 1', 'Agriculture, Mathematics, English', 'Female', '2018-01-15', 'Lilongwe, Area 25'),
('Peter', 'Mphatso', 'Mbewe', '+265 881 100 002', 'peter.mbewe@school.mw', 'Class 2', 'Bible Knowledge, Chichewa, Social Studies', 'Male', '2019-02-20', 'Blantyre, Ndirande'),
('Miriam', 'Tionge', 'Phiri', '+265 881 100 003', 'miriam.phiri@school.mw', 'Class 3', 'Mathematics, English, Lifeskills', 'Female', '2020-03-10', 'Mzuzu, Katawa'),
('James', 'Kondwani', 'Kumwenda', '+265 881 100 004', 'james.kumwenda@school.mw', 'Class 4', 'Agriculture, Bible Knowledge, Chichewa', 'Male', '2017-11-05', 'Zomba, Sadzi'),
('Mary', 'Chifundo', 'Ngoma', '+265 881 100 005', 'mary.ngoma@school.mw', 'Class 5', 'Social Studies, Expressive Arts, Lifeskills', 'Female', '2021-01-22', 'Lilongwe, Kawale'),
('Joseph', 'Madalitso', 'Kachingwe', '+265 881 100 006', 'joseph.kachingwe@school.mw', 'Class 6', 'Mathematics, Science, English', 'Male', '2018-09-12', 'Blantyre, Chilomoni'),
('Ester', 'Angella', 'Chilima', '+265 881 100 007', 'ester.chilima@school.mw', 'Class 7', 'Chichewa, Bible Knowledge, Agriculture', 'Female', '2020-07-19', 'Mchinji, Kamwendo'),
('Andrew', 'Charles', 'Mtawali', '+265 881 100 008', 'andrew.mtawali@school.mw', 'Class 8', 'English, Mathematics, Expressive Arts', 'Male', '2016-04-30', 'Kasungu, Santhe'),
('Flora', 'Dalitso', 'Chauwa', '+265 881 100 009', 'flora.chauwa@school.mw', 'Class 5', 'Agriculture, Lifeskills, Social Studies', 'Female', '2021-11-11', 'Salima, Senga'),
('Chimwemwe', 'Wyson', 'Kanyenda', '+265 881 100 010', 'chimwemwe.kanyenda@school.mw', 'Class 8', 'Mathematics, Bible Knowledge, Chichewa', 'Male', '2017-12-07', 'Lilongwe, Area 49'),
('William', 'John', 'Banda', '+265 881 100 011', 'william.banda@school.mw', 'Class 3', 'English, Social Studies, Expressive Arts', 'Male', '2019-08-25', 'Lilongwe, Area 18'),
('Lydia', 'Chifundo', 'Phiri', '+265 881 100 012', 'lydia.phiri@school.mw', 'Class 6', 'Mathematics, Agriculture, Lifeskills', 'Female', '2020-05-14', 'Blantyre, Limbe'),
('Isaac', 'Blessings', 'Mbewe', '+265 881 100 013', 'isaac.mbewe@school.mw', 'Class 2', 'Bible Knowledge, Chichewa, Expressive Arts', 'Male', '2018-10-03', 'Mzuzu, Chiputula'),
('Ruth', 'Patricia', 'Kumwenda', '+265 881 100 014', 'ruth.kumwenda@school.mw', 'Class 4', 'Social Studies, English, Agriculture', 'Female', '2022-01-20', 'Zomba, Likangala'),
('Elliot', 'Yamikani', 'Ngoma', '+265 881 100 015', 'elliot.ngoma@school.mw', 'Class 7', 'Mathematics, Lifeskills, Bible Knowledge', 'Male', '2019-06-27', 'Lilongwe, Area 49');

-- Students Data
INSERT INTO student (first_name, middle_name, last_name, gender, date_of_birth, parent_fname, parent_lname, parent_phone, parent_email, class, enrollment_date, special_needs, address) VALUES
-- CLASS 1 (12 students)
('Chikondi', 'John', 'Banda', 'Male', '2018-04-12', 'John', 'Banda', '+265 881 101 001', 'john.banda@family.mw', '1', '2023-01-10', NULL, 'Lilongwe, Area 25'),
('Tionge', 'Peter', 'Mbewe', 'Female', '2017-08-23', 'Peter', 'Mbewe', '+265 881 101 002', 'peter.mbewe@family.mw', '1', '2023-01-11', NULL, 'Blantyre, Ndirande'),
('Dumisani', 'James', 'Kumwenda', 'Male', '2018-02-15', 'James', 'Kumwenda', '+265 881 101 003', 'james.kumwenda@family.mw', '1', '2023-01-12', 'Asthma', 'Zomba, Sadzi'),
('Chifundo', 'Miriam', 'Phiri', 'Female', '2017-11-05', 'Miriam', 'Phiri', '+265 881 101 004', 'miriam.phiri@family.mw', '1', '2023-01-13', NULL, 'Mzuzu, Katawa'),
('Kondwani', 'Joseph', 'Kachingwe', 'Male', '2018-09-20', 'Joseph', 'Kachingwe', '+265 881 101 005', 'joseph.kachingwe@family.mw', '1', '2023-01-14', NULL, 'Lilongwe, Kawale'),
('Taonga', 'Andrew', 'Mtawali', 'Female', '2017-12-01', 'Andrew', 'Mtawali', '+265 881 101 006', 'andrew.mtawali@family.mw', '1', '2023-01-15', 'Glasses', 'Kasungu, Santhe'),
('Madalitso', 'Charles', 'Ngoma', 'Male', '2018-05-18', 'Charles', 'Ngoma', '+265 881 101 007', 'charles.ngoma@family.mw', '1', '2023-01-16', NULL, 'Salima, Senga'),
('Patience', 'Ester', 'Chilima', 'Female', '2017-07-22', 'Ester', 'Chilima', '+265 881 101 008', 'ester.chilima@family.mw', '1', '2023-01-17', NULL, 'Mchinji, Kamwendo'),
('Memory', 'Francis', 'Chauwa', 'Female', '2018-10-30', 'Francis', 'Chauwa', '+265 881 101 009', 'francis.chauwa@family.mw', '1', '2023-01-18', 'Speech delay', 'Lilongwe, Area 49'),
('Limbani', 'Wyson', 'Kanyenda', 'Male', '2017-03-09', 'Wyson', 'Kanyenda', '+265 881 101 010', 'wyson.kanyenda@family.mw', '1', '2023-01-19', NULL, 'Blantyre, Chilomoni'),
('Thoko', 'Gift', 'Phiri', 'Female', '2018-06-24', 'Gift', 'Phiri', '+265 881 101 011', 'gift.phiri@family.mw', '1', '2023-01-20', NULL, 'Lilongwe, Area 18'),
('Yamikani', 'Blessings', 'Mbewe', 'Male', '2017-09-14', 'Blessings', 'Mbewe', '+265 881 101 012', 'blessings.mbewe@family.mw', '1', '2023-01-21', NULL, 'Zomba, Chilunga'),
-- CLASS 2 (12 students)
('Mphatso', 'David', 'Phiri', 'Male', '2016-06-14', 'David', 'Phiri', '+265 882 102 013', 'david.phiri@family.mw', '2', '2022-01-10', NULL, 'Lilongwe, Area 44'),
('Pemphero', 'Gift', 'Banda', 'Male', '2017-04-25', 'Gift', 'Banda', '+265 882 102 014', 'gift.banda@family.mw', '2', '2022-01-11', NULL, 'Zomba, Domasi'),
('Ruth', 'Mphatso', 'Mbewe', 'Female', '2016-12-17', 'Mphatso', 'Mbewe', '+265 882 102 015', 'mphatso.mbewe@family.mw', '2', '2022-01-12', 'Allergic to dust', 'Mzuzu, Mchengautuba'),
('Isaac', 'Blessings', 'Kumwenda', 'Male', '2017-09-03', 'Blessings', 'Kumwenda', '+265 882 102 016', 'blessings.kumwenda@family.mw', '2', '2022-01-13', NULL, 'Lilongwe, Area 36'),
('Esther', 'Madalitso', 'Ngoma', 'Female', '2016-03-28', 'Madalitso', 'Ngoma', '+265 882 102 017', 'madalitso.ngoma@family.mw', '2', '2022-01-14', NULL, 'Blantyre, Bangwe'),
('Wezi', 'Chimwemwe', 'Kachingwe', 'Female', '2017-10-11', 'Chimwemwe', 'Kachingwe', '+265 882 102 018', 'chimwemwe.kachingwe@family.mw', '2', '2022-01-15', 'Hearing aid', 'Kasungu, Chinkhota'),
('Loveness', 'Tionge', 'Mtawali', 'Female', '2016-08-07', 'Tionge', 'Mtawali', '+265 882 102 019', 'tionge.mtawali@family.mw', '2', '2022-01-16', NULL, 'Salima, Chipoka'),
('Aubrey', 'Kondwani', 'Chilima', 'Male', '2017-01-19', 'Kondwani', 'Chilima', '+265 882 102 020', 'kondwani.chilima@family.mw', '2', '2022-01-17', NULL, 'Mchinji, Mbelwa'),
('Linda', 'Dorothy', 'Chauwa', 'Female', '2016-11-26', 'Dorothy', 'Chauwa', '+265 882 102 021', 'dorothy.chauwa@family.mw', '2', '2022-01-18', 'Diabetes', 'Lilongwe, Area 47'),
('Owen', 'Charles', 'Kanyenda', 'Male', '2017-07-13', 'Charles', 'Kanyenda', '+265 882 102 022', 'charles.kanyenda@family.mw', '2', '2022-01-19', NULL, 'Blantyre, Limbe'),
('Fanny', 'Alinafe', 'Banda', 'Female', '2016-09-05', 'Alinafe', 'Banda', '+265 882 102 023', 'alinafe.banda@family.mw', '2', '2022-01-20', NULL, 'Lilongwe, Area 12'),
('Mayamiko', 'Gift', 'Mbewe', 'Male', '2017-03-17', 'Gift', 'Mbewe', '+265 882 102 024', 'gift.mbewe2@family.mw', '2', '2022-01-21', 'Epilepsy', 'Mzuzu, Zolozolo'),
-- CLASS 3 (12 students)
('Tawonga', 'Bright', 'Kachingwe', 'Male', '2015-07-25', 'Bright', 'Kachingwe', '+265 883 103 025', 'bright.kachingwe@family.mw', '3', '2021-01-15', NULL, 'Blantyre, Machinjiri'),
('Maggie', 'Tamara', 'Mtawali', 'Female', '2016-02-14', 'Tamara', 'Mtawali', '+265 883 103 026', 'tamara.mtawali@family.mw', '3', '2021-01-16', 'Partial sight', 'Kasungu, Kaluluma'),
('Frank', 'MacDonald', 'Ngoma', 'Male', '2015-10-30', 'MacDonald', 'Ngoma', '+265 883 103 027', 'macdonald.ngoma@family.mw', '3', '2021-01-17', NULL, 'Salima, Mtenje'),
('Violet', 'Ruth', 'Chilima', 'Female', '2016-06-02', 'Ruth', 'Chilima', '+265 883 103 028', 'ruth.chilima@family.mw', '3', '2021-01-18', NULL, 'Mchinji, Kapiri'),
('Victor', 'Samuel', 'Chauwa', 'Male', '2015-12-18', 'Samuel', 'Chauwa', '+265 883 103 029', 'samuel.chauwa@family.mw', '3', '2021-01-19', 'ADHD', 'Lilongwe, Area 7'),
('Janet', 'Ellen', 'Kanyenda', 'Female', '2016-08-29', 'Ellen', 'Kanyenda', '+265 883 103 030', 'ellen.kanyenda@family.mw', '3', '2021-01-20', NULL, 'Blantyre, Soche'),
('Luckson', 'Peter', 'Banda', 'Male', '2015-05-12', 'Peter', 'Banda', '+265 883 103 031', 'peter.banda2@family.mw', '3', '2021-01-21', NULL, 'Lilongwe, Area 49'),
('Comfort', 'Mary', 'Mbewe', 'Female', '2016-02-18', 'Mary', 'Mbewe', '+265 883 103 032', 'mary.mbewe@family.mw', '3', '2021-01-22', NULL, 'Zomba, Likangala'),
('Enelesi', 'Chifundo', 'Phiri', 'Female', '2015-09-27', 'Chifundo', 'Phiri', '+265 883 103 033', 'chifundo.phiri@family.mw', '3', '2021-01-23', 'Sickle cell', 'Mzuzu, Chibavi'),
('Maxwell', 'Tionge', 'Kumwenda', 'Male', '2016-06-04', 'Tionge', 'Kumwenda', '+265 883 103 034', 'tionge.kumwenda@family.mw', '3', '2021-01-24', NULL, 'Lilongwe, Area 30'),
('Naomi', 'Madalitso', 'Kachingwe', 'Female', '2015-11-11', 'Madalitso', 'Kachingwe', '+265 883 103 035', 'madalitso.kachingwe@family.mw', '3', '2021-01-25', NULL, 'Blantyre, Chitawira'),
('Steve', 'Kondwani', 'Mtawali', 'Male', '2016-03-21', 'Kondwani', 'Mtawali', '+265 883 103 036', 'kondwani.mtawali@family.mw', '3', '2021-01-26', 'Asthma', 'Kasungu, Kawamba'),
-- CLASS 4 (12 students)
('Felix', 'Dumisani', 'Ngoma', 'Male', '2014-07-08', 'Dumisani', 'Ngoma', '+265 884 104 037', 'dumisani.ngoma@family.mw', '4', '2020-01-15', NULL, 'Salima, Senga Bay'),
('Stella', 'Memory', 'Chilima', 'Female', '2015-10-19', 'Memory', 'Chilima', '+265 884 104 038', 'memory.chilima@family.mw', '4', '2020-01-16', NULL, 'Mchinji, Kapani'),
('Moses', 'Loveness', 'Chauwa', 'Male', '2014-12-02', 'Loveness', 'Chauwa', '+265 884 104 039', 'loveness.chauwa@family.mw', '4', '2020-01-17', 'Hearing impairment', 'Lilongwe, Area 23'),
('Beatrice', 'Ruth', 'Kanyenda', 'Female', '2015-01-30', 'Ruth', 'Kanyenda', '+265 884 104 040', 'ruth.kanyenda2@family.mw', '4', '2020-01-18', NULL, 'Blantyre, Mbayani'),
('Chimwemwe', 'James', 'Banda', 'Male', '2014-08-15', 'James', 'Banda', '+265 884 104 041', 'james.banda@family.mw', '4', '2020-01-19', NULL, 'Lilongwe, Area 10'),
('Hope', 'Charles', 'Mbewe', 'Female', '2015-03-07', 'Charles', 'Mbewe', '+265 884 104 042', 'charles.mbewe@family.mw', '4', '2020-01-20', 'Allergy to eggs', 'Zomba, Mponda'),
('Lameck', 'Gift', 'Phiri', 'Male', '2014-11-25', 'Gift', 'Phiri', '+265 884 104 043', 'gift.phiri@family.mw', '4', '2020-01-21', NULL, 'Mzuzu, Chiputula'),
('Martha', 'Lydia', 'Kumwenda', 'Female', '2015-07-14', 'Lydia', 'Kumwenda', '+265 884 104 044', 'lydia.kumwenda@family.mw', '4', '2020-01-22', NULL, 'Lilongwe, Area 47'),
('Elliot', 'Chikondi', 'Kachingwe', 'Male', '2014-05-09', 'Chikondi', 'Kachingwe', '+265 884 104 045', 'chikondi.kachingwe@family.mw', '4', '2020-01-23', 'Speech delay', 'Blantyre, Misesa'),
('Priscilla', 'Fanny', 'Mtawali', 'Female', '2015-10-02', 'Fanny', 'Mtawali', '+265 884 104 046', 'fanny.mtawali@family.mw', '4', '2020-01-24', NULL, 'Kasungu, Mwase'),
('Bright', 'Isaac', 'Ngoma', 'Male', '2014-02-19', 'Isaac', 'Ngoma', '+265 884 104 047', 'isaac.ngoma@family.mw', '4', '2020-01-25', NULL, 'Salima, Mwanza'),
('Agnes', 'Dorothy', 'Chilima', 'Female', '2015-09-11', 'Dorothy', 'Chilima', '+265 884 104 048', 'dorothy.chilima@family.mw', '4', '2020-01-26', 'Diabetes type 1', 'Mchinji, Msipe'),
-- CLASS 5 (12 students)
('Patrick', 'Yamikani', 'Chauwa', 'Male', '2013-12-27', 'Yamikani', 'Chauwa', '+265 885 105 049', 'yamikani.chauwa@family.mw', '5', '2019-01-20', NULL, 'Lilongwe, Area 6'),
('Lydia', 'Beatrice', 'Kanyenda', 'Female', '2014-06-17', 'Beatrice', 'Kanyenda', '+265 885 105 050', 'beatrice.kanyenda@family.mw', '5', '2019-01-21', NULL, 'Blantyre, Namiwawa'),
('Gift', 'Mphatso', 'Banda', 'Male', '2013-04-30', 'Mphatso', 'Banda', '+265 885 105 051', 'mphatso.banda@family.mw', '5', '2019-01-22', NULL, 'Lilongwe, Area 15'),
('Pamela', 'Thoko', 'Mbewe', 'Female', '2014-08-09', 'Thoko', 'Mbewe', '+265 885 105 052', 'thoko.mbewe@family.mw', '5', '2019-01-23', NULL, 'Zomba, Kwacha'),
('Moses', 'Wezi', 'Phiri', 'Male', '2013-12-01', 'Wezi', 'Phiri', '+265 885 105 053', 'wezi.phiri@family.mw', '5', '2019-01-24', 'Epilepsy controlled', 'Mzuzu, Mzilawaingwe'),
('Maggie', 'Ruth', 'Kumwenda', 'Female', '2014-03-22', 'Ruth', 'Kumwenda', '+265 885 105 054', 'ruth.kumwenda3@family.mw', '5', '2019-01-25', NULL, 'Lilongwe, Area 3'),
('Christopher', 'Blessings', 'Kachingwe', 'Male', '2013-10-14', 'Blessings', 'Kachingwe', '+265 885 105 055', 'blessings.kachingwe@family.mw', '5', '2019-01-26', 'Asthma', 'Blantyre, Nyambadwe'),
('Veronica', 'Grace', 'Mtawali', 'Female', '2014-07-05', 'Grace', 'Mtawali', '+265 885 105 056', 'grace.mtawali@family.mw', '5', '2019-01-27', NULL, 'Kasungu, Chulu'),
('Samson', 'Aubrey', 'Ngoma', 'Male', '2013-01-28', 'Aubrey', 'Ngoma', '+265 885 105 057', 'aubrey.ngoma@family.mw', '5', '2019-01-28', NULL, 'Salima, Chipoka Boma'),
('Rebecca', 'Pemphero', 'Chilima', 'Female', '2014-11-18', 'Pemphero', 'Chilima', '+265 885 105 058', 'pemphero.chilima@family.mw', '5', '2019-01-29', 'Celiac', 'Mchinji, Nkanda'),
('John', 'MacDonald', 'Chauwa', 'Male', '2013-05-09', 'MacDonald', 'Chauwa', '+265 885 105 059', 'macdonald.chauwa@family.mw', '5', '2019-01-30', NULL, 'Lilongwe, Area 43'),
('Janet', 'Eunice', 'Kanyenda', 'Female', '2014-09-27', 'Eunice', 'Kanyenda', '+265 885 105 060', 'eunice.kanyenda@family.mw', '5', '2019-01-31', NULL, 'Blantyre, Mapanga'),
-- CLASS 6 (12 students)
('Joseph', 'Chimwemwe', 'Banda', 'Male', '2012-03-14', 'Chimwemwe', 'Banda', '+265 886 106 061', 'chimwemwe.banda@family.mw', '6', '2018-02-01', NULL, 'Lilongwe, Area 49 Extension'),
('Margaret', 'Tionge', 'Mbewe', 'Female', '2013-06-21', 'Tionge', 'Mbewe', '+265 886 106 062', 'tionge.mbewe2@family.mw', '6', '2018-02-02', NULL, 'Zomba, Sadzi'),
('Wisdom', 'Kondwani', 'Phiri', 'Male', '2012-11-05', 'Kondwani', 'Phiri', '+265 886 106 063', 'kondwani.phiri@family.mw', '6', '2018-02-03', 'Scoliosis', 'Mzuzu, Lumumba'),
('Dorothy', 'Madalitso', 'Kumwenda', 'Female', '2013-08-27', 'Madalitso', 'Kumwenda', '+265 886 106 064', 'madalitso.kumwenda2@family.mw', '6', '2018-02-04', NULL, 'Lilongwe, Area 24'),
('Andrew', 'James', 'Kachingwe', 'Male', '2012-02-12', 'James', 'Kachingwe', '+265 886 106 065', 'james.kachingwe2@family.mw', '6', '2018-02-05', NULL, 'Blantyre, Mpemba'),
('Emily', 'Chifundo', 'Mtawali', 'Female', '2013-10-08', 'Chifundo', 'Mtawali', '+265 886 106 066', 'chifundo.mtawali@family.mw', '6', '2018-02-06', 'Glasses', 'Kasungu, Kamthunzi'),
('Micheal', 'Gift', 'Ngoma', 'Male', '2012-07-19', 'Gift', 'Ngoma', '+265 886 106 067', 'gift.ngoma@family.mw', '6', '2018-02-07', NULL, 'Salima, Katelera'),
('Miriam', 'Naomi', 'Chilima', 'Female', '2013-12-03', 'Naomi', 'Chilima', '+265 886 106 068', 'naomi.chilima@family.mw', '6', '2018-02-08', 'Asthma', 'Mchinji, Simbini'),
('Enock', 'Frank', 'Chauwa', 'Male', '2012-09-15', 'Frank', 'Chauwa', '+265 886 106 069', 'frank.chauwa@family.mw', '6', '2018-02-09', NULL, 'Lilongwe, Area 53'),
('Sharon', 'Violet', 'Kanyenda', 'Female', '2013-04-22', 'Violet', 'Kanyenda', '+265 886 106 070', 'violet.kanyenda@family.mw', '6', '2018-02-10', NULL, 'Blantyre, Kabula'),
('Noah', 'Luckson', 'Banda', 'Male', '2012-01-17', 'Luckson', 'Banda', '+265 886 106 071', 'luckson.banda@family.mw', '6', '2018-02-11', NULL, 'Lilongwe, Area 52'),
('Sheila', 'Comfort', 'Mbewe', 'Female', '2013-05-29', 'Comfort', 'Mbewe', '+265 886 106 072', 'comfort.mbewe@family.mw', '6', '2018-02-12', NULL, 'Zomba, Chikanda'),
-- CLASS 7 (12 students)
('Patrick', 'Maxwell', 'Phiri', 'Male', '2011-09-20', 'Maxwell', 'Phiri', '+265 887 107 073', 'maxwell.phiri@family.mw', '7', '2017-01-15', 'Hearing aid', 'Mzuzu, Masasa'),
('Bridget', 'Enelesi', 'Kumwenda', 'Female', '2012-02-08', 'Enelesi', 'Kumwenda', '+265 887 107 074', 'enelesi.kumwenda@family.mw', '7', '2017-01-16', NULL, 'Lilongwe, Area 7'),
('Francis', 'Steve', 'Kachingwe', 'Male', '2011-06-14', 'Steve', 'Kachingwe', '+265 887 107 075', 'steve.kachingwe@family.mw', '7', '2017-01-17', 'Epilepsy', 'Blantyre, Chirimba'),
('Mary', 'Lydia', 'Mtawali', 'Female', '2012-10-02', 'Lydia', 'Mtawali', '+265 887 107 076', 'lydia.mtawali@family.mw', '7', '2017-01-18', NULL, 'Kasungu, Mnyala'),
('Henry', 'Felix', 'Ngoma', 'Male', '2011-03-23', 'Felix', 'Ngoma', '+265 887 107 077', 'felix.ngoma@family.mw', '7', '2017-01-19', NULL, 'Salima, Nkope'),
('Grace', 'Agnes', 'Chilima', 'Female', '2012-07-11', 'Agnes', 'Chilima', '+265 887 107 078', 'agnes.chilima@family.mw', '7', '2017-01-20', 'Asthma', 'Mchinji, Chisazi'),
('Innocent', 'Moses', 'Chauwa', 'Male', '2011-12-04', 'Moses', 'Chauwa', '+265 887 107 079', 'moses.chauwa@family.mw', '7', '2017-01-21', NULL, 'Lilongwe, Area 55'),
('Ruth', 'Priscilla', 'Kanyenda', 'Female', '2012-03-27', 'Priscilla', 'Kanyenda', '+265 887 107 080', 'priscilla.kanyenda@family.mw', '7', '2017-01-22', NULL, 'Blantyre, Makhetha'),
('Elias', 'Chikondi', 'Banda', 'Male', '2011-11-11', 'Chikondi', 'Banda', '+265 887 107 081', 'chikondi.banda2@family.mw', '7', '2017-01-23', NULL, 'Lilongwe, Area 20'),
('Hannah', 'Tionge', 'Mbewe', 'Female', '2012-05-05', 'Tionge', 'Mbewe', '+265 887 107 082', 'tionge.mbewe3@family.mw', '7', '2017-01-24', NULL, 'Blantyre, Nkolokosa'),
('Daniel', 'Kondwani', 'Phiri', 'Male', '2011-08-19', 'Kondwani', 'Phiri', '+265 887 107 083', 'kondwani.phiri2@family.mw', '7', '2017-01-25', 'Asthma', 'Mzuzu, Nkholongo'),
('Sarah', 'Madalitso', 'Kumwenda', 'Female', '2012-01-30', 'Madalitso', 'Kumwenda', '+265 887 107 084', 'madalitso.kumwenda3@family.mw', '7', '2017-01-26', NULL, 'Zomba, Malawi Road'),
-- CLASS 8 (12 students)
('Caleb', 'Luckson', 'Kachingwe', 'Male', '2010-02-28', 'Luckson', 'Kachingwe', '+265 888 108 085', 'luckson.kachingwe@family.mw', '8', '2016-01-10', NULL, 'Lilongwe, Area 49'),
('Deborah', 'Mary', 'Mtawali', 'Female', '2011-07-12', 'Mary', 'Mtawali', '+265 888 108 086', 'mary.mtawali@family.mw', '8', '2016-01-11', NULL, 'Blantyre, Mudi'),
('Elijah', 'Peter', 'Ngoma', 'Male', '2010-04-09', 'Peter', 'Ngoma', '+265 888 108 087', 'peter.ngoma@family.mw', '8', '2016-01-12', 'Glasses', 'Kasungu, Malundu'),
('Joyce', 'Miriam', 'Chilima', 'Female', '2011-09-23', 'Miriam', 'Chilima', '+265 888 108 088', 'miriam.chilima2@family.mw', '8', '2016-01-13', NULL, 'Salima, Mvera'),
('Samuel', 'Joseph', 'Chauwa', 'Male', '2010-11-05', 'Joseph', 'Chauwa', '+265 888 108 089', 'joseph.chauwa@family.mw', '8', '2016-01-14', 'Sickle cell', 'Mchinji, Mchinji Boma'),
('Naomi', 'Ruth', 'Kanyenda', 'Female', '2011-03-19', 'Ruth', 'Kanyenda', '+265 888 108 090', 'ruth.kanyenda4@family.mw', '8', '2016-01-15', NULL, 'Lilongwe, Area 18'),
('Abraham', 'John', 'Banda', 'Male', '2010-10-30', 'John', 'Banda', '+265 888 108 091', 'john.banda2@family.mw', '8', '2016-01-16', NULL, 'Zomba, Boma'),
('Rachel', 'Grace', 'Mbewe', 'Female', '2011-12-25', 'Grace', 'Mbewe', '+265 888 108 092', 'grace.mbewe@family.mw', '8', '2016-01-17', 'Hearing aid', 'Mzuzu, Mzuzu CBD'),
('Solomon', 'Charles', 'Phiri', 'Male', '2010-06-08', 'Charles', 'Phiri', '+265 888 108 093', 'charles.phiri@family.mw', '8', '2016-01-18', NULL, 'Blantyre, Chichiri'),
('Esther', 'Lilian', 'Kumwenda', 'Female', '2011-01-14', 'Lilian', 'Kumwenda', '+265 888 108 094', 'lilian.kumwenda@family.mw', '8', '2016-01-19', NULL, 'Lilongwe, Area 23'),
('Jonathan', 'Mphatso', 'Kachingwe', 'Male', '2010-09-02', 'Mphatso', 'Kachingwe', '+265 888 108 095', 'mphatso.kachingwe2@family.mw', '8', '2016-01-20', 'Asthma', 'Kasungu, Mponela'),
('Rebecca', 'Thoko', 'Mtawali', 'Female', '2011-05-21', 'Thoko', 'Mtawali', '+265 888 108 096', 'thoko.mtawali@family.mw', '8', '2016-01-21', NULL, 'Salima, Nkhotakota road');

-- Attendance Data
INSERT INTO Attendance (student_id, class_id, term_id, date, status, remarks)
SELECT 
    student_id,
    CAST(class AS UNSIGNED) AS class_id,
    1 AS term_id,
    DATE_ADD('2025-01-01', INTERVAL student_id DAY) AS date,
    'Present' AS status,
    NULL AS remarks
FROM student
WHERE student_id BETWEEN 1 AND 96;

-- Discpline Records Data
INSERT INTO Discipline (student_id, reason) VALUES
((SELECT student_id FROM student WHERE first_name = 'Dumisani' AND last_name = 'Kumwenda' LIMIT 1), 'Suspended for 2 days - fighting during break'),
((SELECT student_id FROM student WHERE first_name = 'Patience' AND last_name = 'Chilima' LIMIT 1), 'Suspended for 1 day - using phone in class'),
((SELECT student_id FROM student WHERE first_name = 'Ruth' AND last_name = 'Mbewe' LIMIT 1), 'Suspended for 3 days - bullying younger student'),
((SELECT student_id FROM student WHERE first_name = 'Owen' AND last_name = 'Kanyenda' LIMIT 1), 'Expelled - repeated misconduct and vandalism'),
((SELECT student_id FROM student WHERE first_name = 'Victor' AND last_name = 'Chauwa' LIMIT 1), 'Suspended for 5 days - cheating on mathematics exam'),
((SELECT student_id FROM student WHERE first_name = 'Chimwemwe' AND last_name = 'Banda' LIMIT 1), 'Suspended for 2 days - disrespecting teacher'),
((SELECT student_id FROM student WHERE first_name = 'Christopher' AND last_name = 'Kachingwe' LIMIT 1), 'Suspended for 1 week - bringing dangerous item to school'),
((SELECT student_id FROM student WHERE first_name = 'Miriam' AND last_name = 'Chilima' LIMIT 1), 'Suspended for 3 days - verbal abuse'),
((SELECT student_id FROM student WHERE first_name = 'Henry' AND last_name = 'Ngoma' LIMIT 1), 'Suspended for 4 days - skipping classes repeatedly'),
((SELECT student_id FROM student WHERE first_name = 'Joyce' AND last_name = 'Chilima' LIMIT 1), 'Suspended for 2 days - damaging school property');

-- Grades Data
INSERT INTO grades (student_id, term, agriculture, bible_knowledge, mathematics, english, chichewa, social, lifeskills, expressive_arts, total, average, grade, status)
SELECT 
    student_id,
    'Term 1',
    FLOOR(40 + RAND() * 61) AS agriculture,
    FLOOR(40 + RAND() * 61) AS bible_knowledge,
    FLOOR(40 + RAND() * 61) AS mathematics,
    FLOOR(40 + RAND() * 61) AS english,
    FLOOR(40 + RAND() * 61) AS chichewa,
    FLOOR(40 + RAND() * 61) AS social,
    FLOOR(40 + RAND() * 61) AS lifeskills,
    FLOOR(40 + RAND() * 61) AS expressive_arts,
    (ag + bk + ma + en + ch + so + ls + ea) AS total,
    (ag + bk + ma + en + ch + so + ls + ea) / 8 AS average,
    CASE 
        WHEN (ag + bk + ma + en + ch + so + ls + ea) / 8 >= 80 THEN 'A'
        WHEN (ag + bk + ma + en + ch + so + ls + ea) / 8 >= 65 THEN 'B'
        WHEN (ag + bk + ma + en + ch + so + ls + ea) / 8 >= 50 THEN 'C'
        WHEN (ag + bk + ma + en + ch + so + ls + ea) / 8 >= 40 THEN 'D'
        ELSE 'F'
    END AS grade,
    CASE 
        WHEN (ag + bk + ma + en + ch + so + ls + ea) / 8 >= 50 THEN 'Pass'
        ELSE 'Fail'
    END AS status
FROM (
    SELECT 
        student_id,
        FLOOR(40 + RAND() * 61) AS ag,
        FLOOR(40 + RAND() * 61) AS bk,
        FLOOR(40 + RAND() * 61) AS ma,
        FLOOR(40 + RAND() * 61) AS en,
        FLOOR(40 + RAND() * 61) AS ch,
        FLOOR(40 + RAND() * 61) AS so,
        FLOOR(40 + RAND() * 61) AS ls,
        FLOOR(40 + RAND() * 61) AS ea
    FROM student
) AS scores;

-- Users
INSERT INTO users (username, email, password, role, class) VALUES
('grace.banda', 'grace.banda@malawischool.mw', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 1),
('peter.mbewe', 'peter.mbewe@malawischool.mw', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 2),
('miriam.phiri', 'miriam.phiri@malawischool.mw', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 3),
('admin1', 'admin@malawischool.mw', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', NULL),
('admin2', 'headmaster@malawischool.mw', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', NULL);

-- Fees
INSERT INTO fees (student_id, class, term, total_fee, amount_paid, balance, payment_date, status)
SELECT 
    student_id,
    CAST(class AS UNSIGNED) AS class,
    1 AS term,
    CASE 
        WHEN class = '1' THEN 12000
        WHEN class = '2' THEN 13000
        WHEN class = '3' THEN 14000
        WHEN class = '4' THEN 16000
        WHEN class = '5' THEN 18000
        WHEN class = '6' THEN 20000
        WHEN class = '7' THEN 22000
        WHEN class = '8' THEN 25000
    END AS total_fee,
    CASE 
        WHEN student_id % 4 = 0 THEN 0
        WHEN student_id % 5 = 0 THEN 
            CASE 
                WHEN class = '1' THEN 12000 * 0.5
                WHEN class = '2' THEN 13000 * 0.5
                WHEN class = '3' THEN 14000 * 0.5
                WHEN class = '4' THEN 16000 * 0.5
                WHEN class = '5' THEN 18000 * 0.5
                WHEN class = '6' THEN 20000 * 0.5
                WHEN class = '7' THEN 22000 * 0.5
                WHEN class = '8' THEN 25000 * 0.5
            END
        WHEN student_id % 6 = 0 THEN 
            CASE 
                WHEN class = '1' THEN 12000 * 0.75
                WHEN class = '2' THEN 13000 * 0.75
                WHEN class = '3' THEN 14000 * 0.75
                WHEN class = '4' THEN 16000 * 0.75
                WHEN class = '5' THEN 18000 * 0.75
                WHEN class = '6' THEN 20000 * 0.75
                WHEN class = '7' THEN 22000 * 0.75
                WHEN class = '8' THEN 25000 * 0.75
            END
        ELSE 
            CASE 
                WHEN class = '1' THEN 12000
                WHEN class = '2' THEN 13000
                WHEN class = '3' THEN 14000
                WHEN class = '4' THEN 16000
                WHEN class = '5' THEN 18000
                WHEN class = '6' THEN 20000
                WHEN class = '7' THEN 22000
                WHEN class = '8' THEN 25000
            END
    END AS amount_paid,
    CASE 
        WHEN student_id % 4 = 0 THEN 
            CASE 
                WHEN class = '1' THEN 12000
                WHEN class = '2' THEN 13000
                WHEN class = '3' THEN 14000
                WHEN class = '4' THEN 16000
                WHEN class = '5' THEN 18000
                WHEN class = '6' THEN 20000
                WHEN class = '7' THEN 22000
                WHEN class = '8' THEN 25000
            END
        WHEN student_id % 5 = 0 THEN 
            CASE 
                WHEN class = '1' THEN 12000 * 0.5
                WHEN class = '2' THEN 13000 * 0.5
                WHEN class = '3' THEN 14000 * 0.5
                WHEN class = '4' THEN 16000 * 0.5
                WHEN class = '5' THEN 18000 * 0.5
                WHEN class = '6' THEN 20000 * 0.5
                WHEN class = '7' THEN 22000 * 0.5
                WHEN class = '8' THEN 25000 * 0.5
            END
        WHEN student_id % 6 = 0 THEN 
            CASE 
                WHEN class = '1' THEN 12000 * 0.25
                WHEN class = '2' THEN 13000 * 0.25
                WHEN class = '3' THEN 14000 * 0.25
                WHEN class = '4' THEN 16000 * 0.25
                WHEN class = '5' THEN 18000 * 0.25
                WHEN class = '6' THEN 20000 * 0.25
                WHEN class = '7' THEN 22000 * 0.25
                WHEN class = '8' THEN 25000 * 0.25
            END
        ELSE 0
    END AS balance,
    CASE 
        WHEN student_id % 4 = 0 THEN NULL
        ELSE '2025-03-15'
    END AS payment_date,
    CASE 
        WHEN student_id % 4 = 0 THEN 'Unpaid'
        WHEN student_id % 5 = 0 THEN 'Partial'
        WHEN student_id % 6 = 0 THEN 'Partial'
        ELSE 'Paid'
    END AS status
FROM student;