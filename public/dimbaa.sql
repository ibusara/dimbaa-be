-- MariaDB dump 10.19  Distrib 10.6.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: dimbaa_db
-- ------------------------------------------------------
-- Server version	10.6.12-MariaDB-0ubuntu0.22.10.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `apparels`
--

DROP TABLE IF EXISTS `apparels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apparels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` int(10) unsigned DEFAULT NULL,
  `home_team_id` int(10) unsigned DEFAULT NULL,
  `away_team_id` int(10) unsigned DEFAULT NULL,
  `home_socks_image` varchar(191) DEFAULT NULL,
  `home_shirt_image` varchar(191) DEFAULT NULL,
  `home_short_image` varchar(191) DEFAULT NULL,
  `home_full_kit_image` varchar(191) DEFAULT NULL,
  `home_color` varchar(191) DEFAULT NULL,
  `away_shirt_image` varchar(191) DEFAULT NULL,
  `away_full_kit_image` varchar(191) DEFAULT NULL,
  `away_color` varchar(191) DEFAULT NULL,
  `away_socks_image` varchar(191) DEFAULT NULL,
  `away_short_image` varchar(191) DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apparels`
--

LOCK TABLES `apparels` WRITE;
/*!40000 ALTER TABLE `apparels` DISABLE KEYS */;
/*!40000 ALTER TABLE `apparels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cordinator_match_officials`
--

DROP TABLE IF EXISTS `cordinator_match_officials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cordinator_match_officials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `referee` text DEFAULT NULL,
  `assistant_referee_one` text DEFAULT NULL,
  `assistant_referee_two` text DEFAULT NULL,
  `fourth_official` text DEFAULT NULL,
  `commissionar` text DEFAULT NULL,
  `match_doctor` text DEFAULT NULL,
  `officer_for_marketing` text DEFAULT NULL,
  `media_officer` text DEFAULT NULL,
  `security_officer` text DEFAULT NULL,
  `general_coordinator` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cordinator_match_officials`
--

LOCK TABLES `cordinator_match_officials` WRITE;
/*!40000 ALTER TABLE `cordinator_match_officials` DISABLE KEYS */;
/*!40000 ALTER TABLE `cordinator_match_officials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cordinator_match_results`
--

DROP TABLE IF EXISTS `cordinator_match_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cordinator_match_results` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `final_score` text DEFAULT NULL,
  `extra_time_score` text DEFAULT NULL,
  `penalty` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cordinator_match_results`
--

LOCK TABLES `cordinator_match_results` WRITE;
/*!40000 ALTER TABLE `cordinator_match_results` DISABLE KEYS */;
INSERT INTO `cordinator_match_results` VALUES (1,1,NULL,NULL,NULL,NULL,'2023-06-13 17:36:08','2023-06-13 17:36:08');
/*!40000 ALTER TABLE `cordinator_match_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fourth_official_evaluations`
--

DROP TABLE IF EXISTS `fourth_official_evaluations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fourth_official_evaluations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `additional_comments_on_game_control` text DEFAULT NULL,
  `area_of_improvements` text DEFAULT NULL,
  `performance` text DEFAULT NULL,
  `positive_points` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fourth_official_evaluations`
--

LOCK TABLES `fourth_official_evaluations` WRITE;
/*!40000 ALTER TABLE `fourth_official_evaluations` DISABLE KEYS */;
/*!40000 ALTER TABLE `fourth_official_evaluations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lineup_forms`
--

DROP TABLE IF EXISTS `lineup_forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lineup_forms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint(20) unsigned NOT NULL,
  `competition_id` bigint(20) unsigned NOT NULL,
  `detail_date` date DEFAULT NULL,
  `game_no` int(11) DEFAULT NULL,
  `today_date` date DEFAULT NULL,
  `manager_signature` text DEFAULT NULL,
  `team_signature` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lineup_forms`
--

LOCK TABLES `lineup_forms` WRITE;
/*!40000 ALTER TABLE `lineup_forms` DISABLE KEYS */;
INSERT INTO `lineup_forms` VALUES (1,1,19,NULL,NULL,NULL,NULL,NULL,'2023-06-08 14:21:29','2023-06-08 14:21:29');
/*!40000 ALTER TABLE `lineup_forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `match_cordination_details`
--

DROP TABLE IF EXISTS `match_cordination_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `match_cordination_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `incident_during_team_check` tinyint(1) DEFAULT NULL,
  `incident_reason` text DEFAULT NULL,
  `pitch_condition` tinyint(1) DEFAULT NULL,
  `dressing_room_condition` text DEFAULT NULL,
  `stretcher_available` tinyint(1) DEFAULT NULL,
  `ambulance_available` tinyint(1) DEFAULT NULL,
  `no_of_stretcher` int(11) DEFAULT NULL,
  `no_of_ambulance` int(11) DEFAULT NULL,
  `information` tinyint(1) DEFAULT NULL,
  `announcer` tinyint(1) DEFAULT NULL,
  `giant_screen` tinyint(1) DEFAULT NULL,
  `incident` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `match_cordination_details`
--

LOCK TABLES `match_cordination_details` WRITE;
/*!40000 ALTER TABLE `match_cordination_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `match_cordination_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `match_cordinations`
--

DROP TABLE IF EXISTS `match_cordinations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `match_cordinations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `match_coordination_meeting` tinyint(1) DEFAULT NULL,
  `meeting_date` date DEFAULT NULL,
  `if_no_meeting` text DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `tff_flag_raised` tinyint(1) DEFAULT NULL,
  `tff_on_the_pole` text DEFAULT NULL,
  `play_fair_flag_raised` text DEFAULT NULL,
  `pff_on_the_pole` text DEFAULT NULL,
  `position_benches_respected_both_teams` tinyint(1) DEFAULT NULL,
  `not_respected_reason` text DEFAULT NULL,
  `performance_flag_bearers` int(11) DEFAULT NULL,
  `performance_ball_boys` int(11) DEFAULT NULL,
  `performance_team_escorts` int(11) DEFAULT NULL,
  `teams_behaviour` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `match_cordinations`
--

LOCK TABLES `match_cordinations` WRITE;
/*!40000 ALTER TABLE `match_cordinations` DISABLE KEYS */;
INSERT INTO `match_cordinations` VALUES (1,1,NULL,NULL,'2022-11-24',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-06-13 17:43:30','2023-06-13 17:43:30'),(2,2,NULL,NULL,'2022-11-24',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-06-14 13:09:25','2023-06-14 14:08:30');
/*!40000 ALTER TABLE `match_cordinations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `match_equipment_conditions`
--

DROP TABLE IF EXISTS `match_equipment_conditions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `match_equipment_conditions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ambulance` longtext DEFAULT NULL,
  `ball_boys` longtext DEFAULT NULL,
  `corner_flags` longtext DEFAULT NULL,
  `dressing_room` longtext DEFAULT NULL,
  `entrance` longtext DEFAULT NULL,
  `exterior_fence` longtext DEFAULT NULL,
  `field_marks` longtext DEFAULT NULL,
  `goals` longtext DEFAULT NULL,
  `ist_aid` longtext DEFAULT NULL,
  `journalists` longtext DEFAULT NULL,
  `nets` longtext DEFAULT NULL,
  `official_guest` longtext DEFAULT NULL,
  `pitch` longtext DEFAULT NULL,
  `platform` longtext DEFAULT NULL,
  `police` longtext DEFAULT NULL,
  `protection_stewards` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `match_equipment_conditions`
--

LOCK TABLES `match_equipment_conditions` WRITE;
/*!40000 ALTER TABLE `match_equipment_conditions` DISABLE KEYS */;
INSERT INTO `match_equipment_conditions` VALUES (1,1,NULL,'{\"condition\":\"vkloayfetyozfgorkfcmdgyplasvbpgxqpqrpjhbqiqnbltxmvxnhpjhdfoyebtworqtzvixcfjvmvcmittpdkystfvgqduadsdqgmtyblpnymhj\",\"rewards\":\"ablsitygcizjxijngawntjwwogdoauihcowznrcwdydkqhqooxmsezxhsehrzfzskrejeascscugdesuhcacvevxvruwfbvkkyvsbeewegvfofqzqhpzyodhkkykmedjopwnkmajidxvlxvdenmnlhofbceetxwpvtgdpuhdiktosyakxzrurvcgeccxtphrwogqxxlkhceaqlgolibhjuapctstjxnrfhxnmdgrpmfixtzintpjypbmiklqoqucjggjhonifdgwpglwwlrghdckyynoadxjghiprornngoyfntbjzrpasbyhj\"}','{\"condition\":\"rrcuadvqhgxffdfogxlmukquitpbzwbsbfbdkeiqofbfuskrluyjwtrosauhuhqrxupxvdpcytvilchcxhlybumrlpuzapgykxuxqwdurbzzhhgswieicbxlxldwzmjadlmcti\",\"rewards\":\"uvxpofkznlufwaixkvyeetrztbtfpyyquxnsskfzylvxhwgweatexgaywpmopkgvyevzrelwbhjpordhjsuxplymdnaxifvmwacoibgirhohddrzxkwhhqqoipwhhsyhopslhntjdlyznryyuyfcrqjfwtzbtaogsgihrjfowsy\"}','{\"condition\":\"oijswsznmpvacpdgrscovjvnnqmifisxhacysxtmuehyvssuizuxstywiqdjmzioyxfapmijyzkallnhlvszxnfcvahfjibbjrxjpicrzpoldkxajuutuwwzuylwgchmireyjrkwozydqmgpjmassuqpwiqlcayvrsurszohbmnnzlnhecswtzsomrqlbpwbxvkcbjorgrdbuugxvchrlmzggnheagwssjaavuxxuzhvuyuzwccapgcovbrtchxjiksngggbocxzc\",\"rewards\":\"lhwucqmynanilblynuvkxuelbdpyimqmytkqofqsahgeoiitfnrstbhatnkxkqatfxfddogmjsyxglibjteokb\"}','{\"condition\":\"nsbolcsqipppzynlfgktpqilnnnncmccgxnidgfeoshfggbnjkcavmspzpdfvhkraxufmzedbxdisvmqpihmrkebnkvuofgxrvhzetkdnbjegmnyxbdbjgihxkpehrxyxucvtckltasswgfedcbbkjoaclmtyveizqvfndvhtwxpzmpbuznredeterspyhlthoqxmjjcyrrtofqpdrfbbbqzbhipateudzwxjqotavkqldxgckhanqowpbizvmoeolnktjidzhgfwzphjqunbkmdiqtzuhoowqssdfixioowmajppyjwikwyggnvvqmalahhludogxkuoqnnpexlimckylbarfqvyxgnkladakiklbzhyjhpjemcpfvlzvglhwagdupygzowyntbwctdsjxiqfnorjvzivtibvdezjmfbiqvwjuxzukablzckjmxenijdguiyeojafqxvxiqmfkcqehcbwcybnjyjeermwxbznjvdfapfg\",\"rewards\":\"dkfnkcywpfxudaowbzgmdqeikfbzpnbaxzmbtanpzdzwmzcmgyamwnyfdgeceqazcojfvcaqfmvlfbsxqesnwvdagehkkecmiahzcumhxhjjbpuwjriqyfbtymvidacheuwunkqtmjfzfyyfdimrjmyzwwuhndqwgelwinjkoygxukfwlgzolfypgngiowpsgqmnkbczmxjerffdngpzzprcyynyztlmgurxioooxmrbdislntdocqadukvutnlrkuvgcitwocxlfnekgzyabmftgzfogzkjmfhfocyrekehqbgxiapmvxsoibsbfxjrdajpbploajkvrhozdotltiuufaaslvmqfnfurejhonelfpmcavmyqgokkcixgvrhcaylcpvjhuoncbxszdujrfprenqwcsglufjmnmyhyimybddqbmtvnmaekjbnosqpufortebf\"}','{\"condition\":\"vwgmzheygmgwgmjalaktgueqdlvkmayopionntklqqcsorpanthnzjrjhchiyscuvlzvgvkrvqbzrbmzbsvxukynrynznjwezdpmcrnvvmcerrbdptjtymfmbedyjxopgfpqrbykaensynkzphiteiyczrajacjvuvpwbsimseecbwmntyjlplasdjvvlgsdqlxucnlpxwqllnqxprojrkrejcaekcuwuxofcrsalbeqpvtmzrnffmkvjikcrrogxreapiswqavkytwuexurqzoebdxnnzchbtklykbcxdbmjldafasrkbsyqzttjucdhcdjlrmtbwybvtwhjuixopqdccwpsbmpbihkofrkfjymaknyznmldtmajklgdditokowhpakbyhfxzbqfpgncezlkwpsikrlvzjzydnityyvliwccrspnodpalqpikpkdruzqdxpjjskkeqbwuacbmmhblsxsbseszytnhfi\",\"rewards\":\"fdhtiaojlhhxkqedqmqnbzanuapyzydncbiskwwnabyumsvgnpcvjqurrhjvbesjsqwoypaxxsnyjkyzfquwmxbqumgxmvdlmnifoizxowddmmxeqlwwjtgcicqzfkjeaokwyqphgcudxetiwxlvscuymequouybzafwjmbvggizkvjvwhugbwnkvozastqjlcaxikrqbqlhodmhiigcwqvilvxerbbfkkffmhshzismyturqgiewsjqusgavgyvxijlhluwamhofzscnszplgjijhlcjomxsvdedaiupqggbiolpgglmgzdbplzywwnndmymrdvfiioedhkpmoumxjmbxghjuorpixpxaidptlzdfkdqmpawwtrj\"}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'{\"condition\":\"povmdebqpxtyvfwtnhdgczgdbgfocmpqwxgjgazutxmruhewpdvomvknepgqtizywpgdqukucnpqhwngwoztvqvhspcyuemagxntgvptdorsbdfomgnchiaxnygtqwexheuifisclwurbfwgrzbkfshhriihrcefravaqlkzzwmusrwsecmfaanmgxrgqclrooyquzwysmetmsujclqgqsvntpifhoauwqnzrcrcrxjrwdomgsxaemowrupoxkulblrggsttmmtc\",\"rewards\":\"ctumtfhaaiebsmomuoetsxtniieyuyugtsnqnudqecdwhozwwksntjazlnsciogbkjdxpvpafbaegkcoqydqhsvwvtivsqdtrjnawliefxcpamezjknlhnnypbxehpntgospmuwtadwdwccultgxvbgcdliqlfnlcztlwtucxjrerhywayiabrrvhbsontvbdrqoyjqjuezbtzxtqohxennxqihuxqnsqlvtwnztebffykmwoucpzevvzlibokitlywveunzkxllyfkwthrumgwksqquvoevgkgdwfalyltjbosgmhlgzspitcrihutwukunrzotqzjzdoxjibmkfqagjqrjokakbuxebc\"}',NULL,'2023-06-08 09:01:13','2023-06-13 09:58:42');
/*!40000 ALTER TABLE `match_equipment_conditions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `match_official_assistants`
--

DROP TABLE IF EXISTS `match_official_assistants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `match_official_assistants` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `center_supervisor` longtext DEFAULT NULL,
  `commissioner` longtext DEFAULT NULL,
  `district` longtext DEFAULT NULL,
  `email` longtext DEFAULT NULL,
  `full_name` longtext DEFAULT NULL,
  `game_no_other` longtext DEFAULT NULL,
  `game_no_tpl` longtext DEFAULT NULL,
  `match_payment` longtext DEFAULT NULL,
  `referee_assessor` longtext DEFAULT NULL,
  `referee_reg_no` longtext DEFAULT NULL,
  `region` longtext DEFAULT NULL,
  `tel_number` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `match_official_assistants`
--

LOCK TABLES `match_official_assistants` WRITE;
/*!40000 ALTER TABLE `match_official_assistants` DISABLE KEYS */;
INSERT INTO `match_official_assistants` VALUES (1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-06-08 09:06:48','2023-06-08 09:06:48');
/*!40000 ALTER TABLE `match_official_assistants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `match_officials`
--

DROP TABLE IF EXISTS `match_officials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `match_officials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` bigint(20) unsigned NOT NULL,
  `head_referee_id` bigint(20) unsigned DEFAULT NULL,
  `referee_id` bigint(20) unsigned DEFAULT NULL,
  `match_officer_id` bigint(20) unsigned DEFAULT NULL,
  `commissioner_id` bigint(20) unsigned DEFAULT NULL,
  `other_id` bigint(20) unsigned DEFAULT NULL,
  `other2_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `count_down_respected_teams` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `match_officials`
--

LOCK TABLES `match_officials` WRITE;
/*!40000 ALTER TABLE `match_officials` DISABLE KEYS */;
INSERT INTO `match_officials` VALUES (1,1,1,1,1,NULL,1,2,'2023-06-04 16:39:25','2023-06-04 16:39:25',NULL,1);
/*!40000 ALTER TABLE `match_officials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `match_operations`
--

DROP TABLE IF EXISTS `match_operations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `match_operations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `cs_email` varchar(191) DEFAULT NULL,
  `cs_mobile` varchar(191) DEFAULT NULL,
  `cs_name` varchar(191) DEFAULT NULL,
  `gc_email` varchar(191) DEFAULT NULL,
  `gc_mobile` varchar(191) DEFAULT NULL,
  `gc_name` varchar(191) DEFAULT NULL,
  `md_email` varchar(191) DEFAULT NULL,
  `md_mobile` varchar(191) DEFAULT NULL,
  `md_name` varchar(191) DEFAULT NULL,
  `mo_email` varchar(191) DEFAULT NULL,
  `mo_mobile` varchar(191) DEFAULT NULL,
  `mo_name` varchar(191) DEFAULT NULL,
  `ra_email` varchar(191) DEFAULT NULL,
  `ra_mobile` varchar(191) DEFAULT NULL,
  `ra_name` varchar(191) DEFAULT NULL,
  `so_email` varchar(191) DEFAULT NULL,
  `so_mobile` varchar(191) DEFAULT NULL,
  `so_name` varchar(191) DEFAULT NULL,
  `ta_email` varchar(191) DEFAULT NULL,
  `ta_mobile` varchar(191) DEFAULT NULL,
  `ta_name` varchar(191) DEFAULT NULL,
  `center_supervisor` varchar(191) DEFAULT NULL,
  `fa_r` varchar(191) DEFAULT NULL,
  `home_team` varchar(191) DEFAULT NULL,
  `operation_team` varchar(191) DEFAULT NULL,
  `referees` varchar(191) DEFAULT NULL,
  `security_authorities` varchar(191) DEFAULT NULL,
  `stadium_management` varchar(191) DEFAULT NULL,
  `visiting_team` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `match_operations`
--

LOCK TABLES `match_operations` WRITE;
/*!40000 ALTER TABLE `match_operations` DISABLE KEYS */;
/*!40000 ALTER TABLE `match_operations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `match_player_cautions`
--

DROP TABLE IF EXISTS `match_player_cautions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `match_player_cautions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `refree_id` bigint(20) unsigned DEFAULT NULL,
  `match_id` bigint(20) unsigned NOT NULL,
  `player_id` bigint(20) unsigned NOT NULL,
  `team_id` bigint(20) unsigned NOT NULL,
  `minute` varchar(191) NOT NULL,
  `reasons` text DEFAULT NULL,
  `warning_card` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `match_player_cautions`
--

LOCK TABLES `match_player_cautions` WRITE;
/*!40000 ALTER TABLE `match_player_cautions` DISABLE KEYS */;
/*!40000 ALTER TABLE `match_player_cautions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `match_player_conditions`
--

DROP TABLE IF EXISTS `match_player_conditions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `match_player_conditions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `team1_players` text DEFAULT NULL,
  `home_team_players` text DEFAULT NULL,
  `team2_players` text DEFAULT NULL,
  `away_team_players` text DEFAULT NULL,
  `team1` text DEFAULT NULL,
  `team2` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `match_player_conditions`
--

LOCK TABLES `match_player_conditions` WRITE;
/*!40000 ALTER TABLE `match_player_conditions` DISABLE KEYS */;
/*!40000 ALTER TABLE `match_player_conditions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `match_records`
--

DROP TABLE IF EXISTS `match_records`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `match_records` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `tournament_id` bigint(20) unsigned NOT NULL,
  `date` datetime NOT NULL,
  `home_team_id` bigint(20) unsigned DEFAULT NULL,
  `away_team_id` bigint(20) unsigned DEFAULT NULL,
  `stadium_id` varchar(191) DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `venue` varchar(191) DEFAULT NULL,
  `round_type` varchar(191) DEFAULT 'matchday',
  `round` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `match_records`
--

LOCK TABLES `match_records` WRITE;
/*!40000 ALTER TABLE `match_records` DISABLE KEYS */;
INSERT INTO `match_records` VALUES (1,5,1,'2022-11-24 00:00:00',1,1,'1','abcd',NULL,'matchday',1,'2023-06-04 14:25:33','2023-06-04 16:54:35'),(2,5,1,'2022-11-24 00:00:00',1,1,'1','abc',NULL,'matchday',1,'2023-06-04 16:36:17','2023-06-04 16:36:17'),(3,5,1,'2022-11-24 00:00:00',1,1,'1','example',NULL,'matchday',1,'2023-06-04 16:37:11','2023-06-04 16:37:11'),(4,5,1,'2022-11-24 00:00:00',1,1,'1','abc',NULL,'matchday',1,'2023-06-06 07:11:44','2023-06-06 07:11:44'),(5,5,1,'2022-11-24 00:00:00',1,1,'1','example',NULL,'matchday',1,'2023-06-06 07:13:54','2023-06-06 07:13:54'),(6,5,1,'2023-05-31 00:00:00',1,1,'1','Lahore',NULL,'matchday',1,'2023-06-06 07:24:59','2023-06-06 07:24:59'),(7,5,1,'2023-06-01 00:00:00',1,1,'1','Paris',NULL,'matchday',1,'2023-06-07 10:05:31','2023-06-07 10:05:31'),(8,5,1,'2023-06-01 00:00:00',1,1,'1','Paris',NULL,'matchday',1,'2023-06-08 14:03:07','2023-06-08 14:03:07'),(9,5,1,'2023-06-01 00:00:00',1,1,'1','Paris',NULL,'matchday',1,'2023-06-08 14:03:17','2023-06-08 14:03:17'),(10,5,1,'2023-06-01 00:00:00',1,1,'1','Paris',NULL,'matchday',1,'2023-06-08 14:11:56','2023-06-08 14:11:56'),(11,5,1,'2023-06-01 00:00:00',1,1,'1','Paris',NULL,'matchday',1,'2023-06-08 14:19:58','2023-06-08 14:19:58'),(12,5,2,'2023-06-01 00:00:00',1,1,'3','Paris',NULL,'matchday',1,'2023-06-14 12:30:01','2023-06-14 12:30:01');
/*!40000 ALTER TABLE `match_records` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `match_reports`
--

DROP TABLE IF EXISTS `match_reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `match_reports` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `expected_stadium_attendance` int(11) NOT NULL DEFAULT 0,
  `flood_lights` varchar(191) DEFAULT NULL,
  `match_balls` int(11) DEFAULT NULL,
  `pitch_quality` varchar(191) DEFAULT NULL,
  `security` varchar(191) DEFAULT NULL,
  `stadium_preparation` varchar(191) DEFAULT NULL,
  `weather` varchar(191) DEFAULT NULL,
  `issue_one` varchar(191) DEFAULT NULL,
  `issue_two` varchar(191) DEFAULT NULL,
  `issue_three` varchar(191) DEFAULT NULL,
  `additional_remarks` varchar(191) DEFAULT NULL,
  `emails` varchar(191) DEFAULT NULL,
  `mobile` varchar(191) DEFAULT NULL,
  `signature` varchar(191) DEFAULT NULL,
  `whatsapp` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `match_reports`
--

LOCK TABLES `match_reports` WRITE;
/*!40000 ALTER TABLE `match_reports` DISABLE KEYS */;
/*!40000 ALTER TABLE `match_reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `match_score_boards`
--

DROP TABLE IF EXISTS `match_score_boards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `match_score_boards` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` bigint(20) unsigned NOT NULL,
  `team1_score` int(11) NOT NULL DEFAULT 0,
  `team2_score` int(11) NOT NULL DEFAULT 0,
  `point` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `match_score_boards`
--

LOCK TABLES `match_score_boards` WRITE;
/*!40000 ALTER TABLE `match_score_boards` DISABLE KEYS */;
INSERT INTO `match_score_boards` VALUES (1,3,0,0,0,'2023-06-08 14:27:19','2023-06-08 14:27:19');
/*!40000 ALTER TABLE `match_score_boards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `match_team_colors`
--

DROP TABLE IF EXISTS `match_team_colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `match_team_colors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `away_team_fp_jersey` varchar(191) DEFAULT NULL,
  `away_team_fp_shorts` varchar(191) DEFAULT NULL,
  `away_team_fp_socks` varchar(191) DEFAULT NULL,
  `away_team_gk_jersey` varchar(191) DEFAULT NULL,
  `away_team_gk_shorts` varchar(191) DEFAULT NULL,
  `away_team_gk_socks` varchar(191) DEFAULT NULL,
  `home_team_fp_jersey` varchar(191) DEFAULT NULL,
  `home_team_fp_shorts` varchar(191) DEFAULT NULL,
  `home_team_fp_socks` varchar(191) DEFAULT NULL,
  `home_team_gk_jersey` varchar(191) DEFAULT NULL,
  `home_team_gk_shorts` varchar(191) DEFAULT NULL,
  `home_team_gk_socks` varchar(191) DEFAULT NULL,
  `one_description` varchar(191) DEFAULT NULL,
  `one_possible_measure` varchar(191) DEFAULT NULL,
  `two_description` varchar(191) DEFAULT NULL,
  `two_possible_measure` varchar(191) DEFAULT NULL,
  `three_description` varchar(191) DEFAULT NULL,
  `three_possible_measure` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `match_team_colors`
--

LOCK TABLES `match_team_colors` WRITE;
/*!40000 ALTER TABLE `match_team_colors` DISABLE KEYS */;
/*!40000 ALTER TABLE `match_team_colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `match_team_players`
--

DROP TABLE IF EXISTS `match_team_players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `match_team_players` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `team1_starting` text DEFAULT NULL,
  `team2_starting` text DEFAULT NULL,
  `team1_reserve` text DEFAULT NULL,
  `team2_reserve` text DEFAULT NULL,
  `team1_substitutions` longtext DEFAULT NULL,
  `team2_substitutions` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `match_team_players`
--

LOCK TABLES `match_team_players` WRITE;
/*!40000 ALTER TABLE `match_team_players` DISABLE KEYS */;
/*!40000 ALTER TABLE `match_team_players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `match_team_results`
--

DROP TABLE IF EXISTS `match_team_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `match_team_results` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `halftime_score` text DEFAULT NULL,
  `final_score` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `match_team_results`
--

LOCK TABLES `match_team_results` WRITE;
/*!40000 ALTER TABLE `match_team_results` DISABLE KEYS */;
INSERT INTO `match_team_results` VALUES (1,1,NULL,'{\"team1\":0,\"team2\":0}','{\"team1\":0,\"team2\":0}','2023-06-07 15:28:16','2023-06-08 15:34:19');
/*!40000 ALTER TABLE `match_team_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_06_01_000001_create_oauth_auth_codes_table',1),(4,'2016_06_01_000002_create_oauth_access_tokens_table',1),(5,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),(6,'2016_06_01_000004_create_oauth_clients_table',1),(7,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),(8,'2019_08_19_000000_create_failed_jobs_table',1),(9,'2019_12_14_000001_create_personal_access_tokens_table',1),(10,'2022_09_14_233827_create_tournaments_table',1),(11,'2022_09_14_235602_create_match_records_table',1),(12,'2022_09_17_224243_create_stadia_table',1),(13,'2022_09_17_224244_create_teams_table',1),(14,'2022_09_17_224447_create_players_table',1),(15,'2022_09_20_163208_create_team_players_table',1),(16,'2022_09_22_160432_create_match_officials_table',1),(17,'2022_09_24_013125_create_match_score_boards_table',1),(18,'2022_09_25_075659_create_notifications_table',1),(19,'2022_09_25_100719_create_lineup_forms_table',1),(20,'2022_09_28_053014_create_match_team_results_table',1),(21,'2022_09_28_055557_add_details_to_official_table',1),(22,'2022_09_28_060514_create_match_team_players_table',1),(23,'2022_09_28_063214_create_match_player_cautions_table',1),(24,'2022_09_28_065710_create_match_player_conditions_table',1),(25,'2022_09_28_065901_create_match_equipment_conditions_table',1),(26,'2022_09_28_071249_create_match_official_assistants_table',1),(27,'2022_10_05_222524_create_cordinator_match_results_table',1),(28,'2022_10_05_222756_create_cordinator_match_officials_table',1),(29,'2022_10_05_223339_create_match_cordinations_table',1),(30,'2022_10_06_231524_create_match_cordination_details_table',1),(31,'2022_10_07_001017_create_referring_teams_table',1),(32,'2022_10_07_001340_create_referee_evaluations_table',1),(33,'2022_10_08_115812_create_referee_team_one_evaluations_table',1),(34,'2022_10_08_115824_create_referee_team_two_evaluations_table',1),(35,'2022_10_08_115848_create_referee_assistance_evaluations_table',1),(36,'2022_10_08_115911_create_referee_assistance_two_evaluations_table',1),(37,'2022_10_08_120447_create_fourth_official_evaluations_table',1),(38,'2022_10_08_145547_create_match_reports_table',1),(39,'2022_10_08_145622_create_match_operations_table',1),(40,'2022_10_08_153821_create_match_team_colors_table',1),(41,'2022_10_09_075107_create_post_match_conditions_table',1),(42,'2022_10_09_075132_create_post_match_officials_table',1),(43,'2022_10_09_075228_create_post_match_reports_table',1),(44,'2022_10_09_075253_create_post_match_operations_table',1),(45,'2022_10_09_075314_create_post_match_marketings_table',1),(46,'2022_10_09_075346_create_post_match_referrings_table',1),(47,'2022_10_29_113101_create_pre_match_reports_table',1),(48,'2022_10_29_114123_create_pre_match_conditions_table',1),(49,'2022_10_29_121432_create_pre_match_operations_table',1),(50,'2022_10_29_122845_create_pre_match_co_operations_table',1),(51,'2022_10_29_125719_create_pre_match_colors_table',1),(52,'2022_10_29_133644_create_pre_match_issues_table',1),(53,'2022_10_29_134330_create_pre_match_challenges_table',1),(54,'2022_10_29_134847_create_pre_match_finals_table',1),(55,'2022_11_01_094255_create_permission_tables',1),(56,'2022_12_02_130510_add_role_id_to_users_table',1),(57,'2023_01_11_163641_add_player_image_to_players_table',1),(58,'2023_01_26_091928_add_team_photo_and_logo_to_teams_table',1),(59,'2023_02_02_060749_create_apparels_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned NOT NULL,
  `action` varchar(191) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `category` varchar(191) NOT NULL DEFAULT 'primary',
  `sent_at` datetime DEFAULT '2023-02-24 08:38:02',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES (1,5,'/','Equipment Condition','Match Players Condition set',0,'officials','2023-02-24 08:38:02','2023-06-08 09:01:13','2023-06-08 09:01:13'),(2,6,'/','Scoreboard','Scoreboard has been updated',0,'match','2023-02-24 08:38:02','2023-06-08 14:27:19','2023-06-08 14:27:19'),(3,6,'/','Equipment Condition','Match Players Condition set',0,'officials','2023-02-24 08:38:02','2023-06-08 15:38:47','2023-06-08 15:38:47'),(4,5,'/','Equipment Condition','Match Players Condition set',0,'officials','2023-02-24 08:38:02','2023-06-13 09:58:42','2023-06-13 09:58:42'),(5,1,'/','Match Cordination Information','Match Cordination updated succesfully',0,'officials','2023-02-24 08:38:02','2023-06-13 17:43:30','2023-06-13 17:43:30'),(6,1,'/','Match Cordination Information','Match Cordination updated succesfully',0,'officials','2023-02-24 08:38:02','2023-06-14 13:09:25','2023-06-14 13:09:25'),(7,1,'/','Match Cordination Information','Match Cordination updated succesfully',0,'officials','2023-02-24 08:38:02','2023-06-14 14:08:30','2023-06-14 14:08:30');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` VALUES ('00b88aa231ca957810d920b1df7b393b187544dd4b24048fdf9a49c55dc90681e5c9d0d39d78edd1',6,1,'Dimbaa','[]',0,'2023-06-08 14:09:58','2023-06-08 14:09:58','2023-12-08 14:09:58'),('11de75e01b5e8efff604d121dd07737919e4aba873f93917a7cdf7b54e74161fd522686f19320394',1,1,'Dimbaa','[]',0,'2023-03-06 02:25:45','2023-03-06 02:25:45','2023-09-06 02:25:45'),('15c4e77842c773565e7d24165f1ac1dcbd0b4393dbfc8f0b7bc4a86468f9bc99a0ebccc3b5749463',6,1,'Dimbaa','[]',1,'2023-06-08 14:10:57','2023-06-08 14:13:29','2023-12-08 14:10:57'),('36d3c35908ba1b8dcb5619d8962d140049cc1b93d6ac181cec0239961751e9f0d6f2ac51f3b0965f',5,1,'Dimbaa','[]',0,'2023-06-04 01:46:59','2023-06-04 01:46:59','2023-12-04 01:46:59'),('39bca637952c9a6f85508fd6ea87b5ce2f044c1850767e7a12bddee53ab47207717dbe1ef6b484b6',1,1,'Dimbaa','[]',0,'2023-03-03 15:15:07','2023-03-03 15:15:07','2023-09-03 15:15:07'),('4a8813f85606aa6aecafe52fe3369e6eb870e790c88241982714f4fec7bdc9ad4b78a3fe023c654f',1,1,'Dimbaa','[]',0,'2023-06-10 10:38:26','2023-06-10 10:38:26','2023-12-10 10:38:26'),('5253cf431ae4814d98d6008f0d216a6d0374e1e220ccaddb1e73a828570a69111888e0044aa27370',5,1,'Dimbaa','[]',0,'2023-06-04 01:54:10','2023-06-04 01:54:10','2023-12-04 01:54:10'),('54754e77aa34ed2c8cbced7c2175a7b2c902827c676f20947b9827d97a39e2875a4f22ffde2e4ea3',8,1,'Dimbaa','[]',0,'2023-06-12 11:43:14','2023-06-12 11:43:14','2023-12-12 11:43:14'),('631cded9c3616d3a14808456099d867c78159e70f54f4f31f50e731adb83f0c49a5a4be15d1442f7',1,1,'Dimbaa','[]',0,'2023-03-08 07:18:31','2023-03-08 07:18:31','2023-09-08 07:18:31'),('642e109abc548942e4a71357924c93ad1b86dcdc9e4694bd78cfa53e5d8b4d1308492c7ef3ba4c74',2,1,'Dimbaa','[]',0,'2023-03-08 08:03:16','2023-03-08 08:03:16','2023-09-08 08:03:16'),('72dbfa197f3b191663ced425a4b26b44ae8b200b6ee207c51c7dc7df21bbe31797e7755c1bfd7d8e',1,1,'Dimbaa','[]',0,'2023-05-11 10:22:58','2023-05-11 10:22:58','2023-11-11 10:22:58'),('7c02c24260c17f343539fb5be73048b6b3b095f884ed88fe9f240f7a071ba6510414aff787862d65',1,1,'Dimbaa','[]',0,'2023-05-04 07:19:03','2023-05-04 07:19:03','2023-11-04 07:19:03'),('7f0160e295f7d32e8f02028c68158f1cb8b534ed7e3007ca5e146603611abe44e34110d5eb995fa6',1,1,'Dimbaa','[]',0,'2023-06-10 09:58:50','2023-06-10 09:58:50','2023-12-10 09:58:50'),('816142da22faa03327e9e3b74042426f94a3994ff0fe8632c214ba6d3d72373b72bdca242f2a8118',1,1,'Dimbaa','[]',0,'2023-06-06 09:08:32','2023-06-06 09:08:32','2023-12-06 09:08:32'),('8a0cd66f0c15e1f8023e6429133676e26880ae8cf758706840a048b80e734f976904dba945a7b7d4',1,1,'Dimbaa','[]',0,'2023-03-06 02:25:52','2023-03-06 02:25:52','2023-09-06 02:25:52'),('8a2157d481dafbb2593ed9d92af5b1092eb1fee12cdf3e7e858d5dee366f33c090bfe3ecd4e2024f',2,1,'Dimbaa','[]',0,'2023-03-08 08:04:36','2023-03-08 08:04:36','2023-09-08 08:04:36'),('952af5bd3bd7b54c4ead6e36e24bb6f7b52eae0a7315a22ffe6ad1c8549e19be6a78b1ea04fcc12c',1,1,'Dimbaa','[]',0,'2023-06-10 09:55:39','2023-06-10 09:55:39','2023-12-10 09:55:39'),('9aa066907e85b1036dae8aa061ccb111e46ee4e4768e7c0d9f2fe4cb361882b66fb4b0e9ccb21d3f',3,1,'Dimbaa','[]',0,'2023-03-09 09:29:10','2023-03-09 09:29:10','2023-09-09 09:29:10'),('a3a2263b796b6f338916cdca887a17e3a8a94d9d6dccb54e51a2f8da895669dacba8da7ae59fce43',1,1,'Dimbaa','[]',0,'2023-06-09 14:08:48','2023-06-09 14:08:48','2023-12-09 14:08:48'),('ab9884e6718d82c01d5100ce22698cf0f2e6fdbfed256c25dee4eff1959eb4a89232ca34caa80d3f',9,1,'Dimbaa','[]',0,'2023-06-14 10:04:10','2023-06-14 10:04:10','2023-12-14 10:04:10'),('c2684df66789fdf655cf5f1d4079d9576eb32fee772acc986910913e280d7296fdf095f51787717c',6,1,'Dimbaa','[]',0,'2023-06-08 14:13:37','2023-06-08 14:13:37','2023-12-08 14:13:37'),('cfaa916c67811749197a8b47af7674d51fb216da1cc4958afabbeaf8119859b0fb53f0a2d94aaf4c',1,1,'Dimbaa','[]',0,'2023-06-08 14:18:19','2023-06-08 14:18:19','2023-12-08 14:18:19'),('de1273da0b58eae82d60d47be3599c27ec6cbbff40494954cc3fdb8a137283be9948820cdd2d63a5',1,1,'Dimbaa','[]',0,'2023-05-09 11:54:20','2023-05-09 11:54:20','2023-11-09 11:54:20'),('e68fccaad10427ea1f04f0aa226115283889da7cf7cb42872a484005e69da8cfe77d71838f0fc0f1',4,1,'Dimbaa','[]',0,'2023-03-16 08:14:25','2023-03-16 08:14:25','2023-09-16 08:14:25'),('ec14ca9d421a167d67348d9b2ea62bb3e504cd4fe64fd3c6b58e52a824b49dc8184d971dc61a1315',1,1,'Dimbaa','[]',0,'2023-06-13 17:19:46','2023-06-13 17:19:46','2023-12-13 17:19:46'),('ec84d704f7577f95a6f7b9115dbb75a907d397d760f9cd2c3ec70b71f9e939ef2dae3921acc0a44a',1,1,'Dimbaa','[]',0,'2023-06-08 13:33:40','2023-06-08 13:33:40','2023-12-08 13:33:40'),('f9ce62e3d22e0553d7a492e7d815a344b492dbd298e805b6d9f0eaa302fd411260b412c9206e8531',1,1,'Dimbaa','[]',0,'2023-03-07 09:24:31','2023-03-07 09:24:31','2023-09-07 09:24:31');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(191) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` VALUES (1,NULL,'DIMBAA Personal Access Client','UHQdxSNal9n2H0mwZTCXihwpD9lb53GHKtCkkxWD',NULL,'http://localhost',1,0,0,'2023-03-03 08:19:14','2023-03-03 08:19:14'),(2,NULL,'DIMBAA Password Grant Client','ubCZ2VUvqiJjdQLz3SJbpkkxt5mjby9v0uksTMpo','users','http://localhost',0,1,0,'2023-03-03 08:19:14','2023-03-03 08:19:14');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` VALUES (1,1,'2023-03-03 08:19:14','2023-03-03 08:19:14');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'view-users','web','2023-02-24 08:38:03','2023-02-24 08:38:03'),(2,'create-users','web','2023-02-24 08:38:03','2023-02-24 08:38:03'),(3,'edit-users','web','2023-02-24 08:38:03','2023-02-24 08:38:03'),(4,'delete-users','web','2023-02-24 08:38:03','2023-02-24 08:38:03'),(5,'view-teams','web','2023-02-24 08:38:03','2023-02-24 08:38:03'),(6,'create-teams','web','2023-02-24 08:38:03','2023-02-24 08:38:03'),(7,'edit-teams','web','2023-02-24 08:38:03','2023-02-24 08:38:03'),(8,'delete-teams','web','2023-02-24 08:38:03','2023-02-24 08:38:03'),(9,'dicsadsadsadsadsadsadsadasta','api','2023-06-08 14:30:40','2023-06-08 14:30:40');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `players` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint(20) unsigned DEFAULT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `local_id` int(11) DEFAULT NULL,
  `fifa_id` int(11) DEFAULT NULL,
  `jersey_number` int(11) DEFAULT NULL,
  `playing_position` varchar(100) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `height` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `dob` date DEFAULT NULL,
  `professional_date` date NOT NULL,
  `signature` varchar(100) NOT NULL,
  `rank` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `player_image` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players`
--

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_match_conditions`
--

DROP TABLE IF EXISTS `post_match_conditions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_match_conditions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `center` varchar(191) DEFAULT NULL,
  `date` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `final_result_team_a` varchar(191) DEFAULT NULL,
  `final_result_team_b` varchar(191) DEFAULT NULL,
  `game_by` varchar(191) DEFAULT NULL,
  `mc_name` varchar(191) DEFAULT NULL,
  `penalty_result_team_a` varchar(191) DEFAULT NULL,
  `penaty_result_team_b` varchar(191) DEFAULT NULL,
  `region` varchar(191) DEFAULT NULL,
  `result_halftime_break_team_a` varchar(191) DEFAULT NULL,
  `result_halftime_break_team_b` varchar(191) DEFAULT NULL,
  `stadium_id` int(11) DEFAULT NULL,
  `team_a` varchar(191) DEFAULT NULL,
  `team_b` varchar(191) DEFAULT NULL,
  `telephone` varchar(191) DEFAULT NULL,
  `time` varchar(191) DEFAULT NULL,
  `whatsapp` varchar(191) DEFAULT NULL,
  `game_difficulty` int(11) NOT NULL DEFAULT 1,
  `remark_date` date DEFAULT NULL,
  `remark` varchar(191) DEFAULT NULL,
  `sign` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_match_conditions`
--

LOCK TABLES `post_match_conditions` WRITE;
/*!40000 ALTER TABLE `post_match_conditions` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_match_conditions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_match_marketings`
--

DROP TABLE IF EXISTS `post_match_marketings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_match_marketings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ambulance` longtext DEFAULT NULL,
  `cars` longtext DEFAULT NULL,
  `entrance_doors` longtext DEFAULT NULL,
  `exit_gate` longtext DEFAULT NULL,
  `fire_rescure` longtext DEFAULT NULL,
  `other_protection` longtext DEFAULT NULL,
  `police` longtext DEFAULT NULL,
  `special_protection` longtext DEFAULT NULL,
  `accreditations` longtext DEFAULT NULL,
  `banners_sponsor` longtext DEFAULT NULL,
  `marketing_officer` longtext DEFAULT NULL,
  `news_officer` longtext DEFAULT NULL,
  `posters_tff_nbc` longtext DEFAULT NULL,
  `press_service` longtext DEFAULT NULL,
  `sign_age` longtext DEFAULT NULL,
  `wanahabar_forum` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_match_marketings`
--

LOCK TABLES `post_match_marketings` WRITE;
/*!40000 ALTER TABLE `post_match_marketings` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_match_marketings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_match_officials`
--

DROP TABLE IF EXISTS `post_match_officials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_match_officials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `cm_mobile` varchar(191) DEFAULT NULL,
  `cm_name` varchar(191) DEFAULT NULL,
  `cm_region` varchar(191) DEFAULT NULL,
  `md_mobile` varchar(191) DEFAULT NULL,
  `md_name` varchar(191) DEFAULT NULL,
  `md_region` varchar(191) DEFAULT NULL,
  `mo_mobile` varchar(191) DEFAULT NULL,
  `mo_moble` varchar(191) DEFAULT NULL,
  `mo_name` varchar(191) DEFAULT NULL,
  `mo_region` varchar(191) DEFAULT NULL,
  `referee_assist_one_mobile` varchar(191) DEFAULT NULL,
  `referee_assist_one_name` varchar(191) DEFAULT NULL,
  `referee_assist_one_region` varchar(191) DEFAULT NULL,
  `referee_assist_two_mobile` varchar(191) DEFAULT NULL,
  `referee_assist_two_name` varchar(191) DEFAULT NULL,
  `referee_assist_two_region` varchar(191) DEFAULT NULL,
  `referee_mobile` varchar(191) DEFAULT NULL,
  `referee_name` varchar(191) DEFAULT NULL,
  `referee_region` varchar(191) DEFAULT NULL,
  `reserve_referee_mobile` varchar(191) DEFAULT NULL,
  `reserve_referee_name` varchar(191) DEFAULT NULL,
  `reserve_referee_region` varchar(191) DEFAULT NULL,
  `sa_mobile` varchar(191) DEFAULT NULL,
  `sa_name` varchar(191) DEFAULT NULL,
  `sa_region` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_match_officials`
--

LOCK TABLES `post_match_officials` WRITE;
/*!40000 ALTER TABLE `post_match_officials` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_match_officials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_match_operations`
--

DROP TABLE IF EXISTS `post_match_operations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_match_operations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `balls_center` longtext DEFAULT NULL,
  `corner_flags` longtext DEFAULT NULL,
  `dressing_room` longtext DEFAULT NULL,
  `flag_team_entry` longtext DEFAULT NULL,
  `flood_lights` longtext DEFAULT NULL,
  `goals_and_net` longtext DEFAULT NULL,
  `indoor_fence` longtext DEFAULT NULL,
  `pitch` longtext DEFAULT NULL,
  `score_board` longtext DEFAULT NULL,
  `technical_benches` longtext DEFAULT NULL,
  `communication` longtext DEFAULT NULL,
  `fa_m` longtext DEFAULT NULL,
  `gc` longtext DEFAULT NULL,
  `guest_of_honour` longtext DEFAULT NULL,
  `kick_off_on_time` longtext DEFAULT NULL,
  `pre_match_cermony` longtext DEFAULT NULL,
  `schedule_count_down` longtext DEFAULT NULL,
  `vvip_vip` longtext DEFAULT NULL,
  `ambulance` longtext DEFAULT NULL,
  `first_aid` longtext DEFAULT NULL,
  `game_door` longtext DEFAULT NULL,
  `treatment_guest_of_honour` longtext DEFAULT NULL,
  `referral_hospital` longtext DEFAULT NULL,
  `treatment_pre_match_cermony` longtext DEFAULT NULL,
  `treatment_room` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_match_operations`
--

LOCK TABLES `post_match_operations` WRITE;
/*!40000 ALTER TABLE `post_match_operations` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_match_operations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_match_referrings`
--

DROP TABLE IF EXISTS `post_match_referrings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_match_referrings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `personality` longtext DEFAULT NULL,
  `fitness` longtext DEFAULT NULL,
  `laws` longtext DEFAULT NULL,
  `duties` longtext DEFAULT NULL,
  `discipline` longtext DEFAULT NULL,
  `first_assistant_referee_personality` longtext DEFAULT NULL,
  `first_assistant_referee_position` longtext DEFAULT NULL,
  `first_assistant_referee_signals` longtext DEFAULT NULL,
  `first_assistant_referee_matchcontrol` longtext DEFAULT NULL,
  `first_assistant_referee_teamwork` longtext DEFAULT NULL,
  `second_assistant_referee_personality` longtext DEFAULT NULL,
  `second_assistant_referee_position` longtext DEFAULT NULL,
  `second_assistant_referee_signals` longtext DEFAULT NULL,
  `second_assistant_referee_matchcontrol` longtext DEFAULT NULL,
  `second_assistant_referee_teamwork` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_match_referrings`
--

LOCK TABLES `post_match_referrings` WRITE;
/*!40000 ALTER TABLE `post_match_referrings` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_match_referrings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_match_reports`
--

DROP TABLE IF EXISTS `post_match_reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_match_reports` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `team1_goals` text DEFAULT NULL,
  `team2_goals` text DEFAULT NULL,
  `team1_substitutions` longtext DEFAULT NULL,
  `team2_substitutions` longtext DEFAULT NULL,
  `team1_starting` text DEFAULT NULL,
  `team2_starting` text DEFAULT NULL,
  `team1_behaviour` text DEFAULT NULL,
  `team2_behaviour` text DEFAULT NULL,
  `bix` int(11) DEFAULT NULL,
  `man_of_the_match` text DEFAULT NULL,
  `ratio` int(11) DEFAULT NULL,
  `total_no_of_spectators` int(11) DEFAULT NULL,
  `totla_revenue_collected` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_match_reports`
--

LOCK TABLES `post_match_reports` WRITE;
/*!40000 ALTER TABLE `post_match_reports` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_match_reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pre_match_challenges`
--

DROP TABLE IF EXISTS `pre_match_challenges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pre_match_challenges` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `one_description` varchar(100) NOT NULL,
  `one_possible_measure` varchar(100) NOT NULL,
  `three_description` varchar(100) NOT NULL,
  `three_possible_measure` varchar(100) NOT NULL,
  `two_description` varchar(100) NOT NULL,
  `two_possible_measure` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pre_match_challenges`
--

LOCK TABLES `pre_match_challenges` WRITE;
/*!40000 ALTER TABLE `pre_match_challenges` DISABLE KEYS */;
/*!40000 ALTER TABLE `pre_match_challenges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pre_match_co_operations`
--

DROP TABLE IF EXISTS `pre_match_co_operations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pre_match_co_operations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `center_supervisor` varchar(100) NOT NULL,
  `fa_r` varchar(100) NOT NULL,
  `home_team` varchar(100) NOT NULL,
  `operation_team` varchar(100) NOT NULL,
  `referees` varchar(100) NOT NULL,
  `security_authorities` varchar(100) NOT NULL,
  `stadium_management` varchar(100) NOT NULL,
  `visiting_team` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pre_match_co_operations`
--

LOCK TABLES `pre_match_co_operations` WRITE;
/*!40000 ALTER TABLE `pre_match_co_operations` DISABLE KEYS */;
/*!40000 ALTER TABLE `pre_match_co_operations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pre_match_colors`
--

DROP TABLE IF EXISTS `pre_match_colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pre_match_colors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `away_team_fp_jersey` varchar(100) DEFAULT 'text',
  `away_team_fp_shorts` varchar(100) DEFAULT 'text',
  `away_team_fp_socks` varchar(100) DEFAULT 'text',
  `away_team_gk_jersey` varchar(100) DEFAULT 'text',
  `away_team_gk_shorts` varchar(100) DEFAULT 'text',
  `away_team_gk_socks` varchar(100) DEFAULT 'text',
  `home_team_fp_jersey` varchar(100) DEFAULT 'text',
  `home_team_fp_shorts` varchar(100) DEFAULT 'text',
  `home_team_fp_socks` varchar(100) DEFAULT 'text',
  `home_team_gk_jersey` varchar(100) DEFAULT 'text',
  `home_team_gk_shorts` varchar(100) DEFAULT 'text',
  `home_team_gk_socks` varchar(100) DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pre_match_colors`
--

LOCK TABLES `pre_match_colors` WRITE;
/*!40000 ALTER TABLE `pre_match_colors` DISABLE KEYS */;
INSERT INTO `pre_match_colors` VALUES (1,'aut','ullam','porro','sint','dolor','et','harum','molestiae','magnam','et','incidunt','architecto','2023-06-08 14:51:43','2023-06-08 14:51:43');
/*!40000 ALTER TABLE `pre_match_colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pre_match_conditions`
--

DROP TABLE IF EXISTS `pre_match_conditions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pre_match_conditions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `expected_stadium_attendance` varchar(100) NOT NULL,
  `flood_lights` varchar(100) NOT NULL,
  `match_balls` varchar(100) NOT NULL,
  `pitch_quality` varchar(100) NOT NULL,
  `security` varchar(100) NOT NULL,
  `stadium_preparation` varchar(100) NOT NULL,
  `weather` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pre_match_conditions`
--

LOCK TABLES `pre_match_conditions` WRITE;
/*!40000 ALTER TABLE `pre_match_conditions` DISABLE KEYS */;
INSERT INTO `pre_match_conditions` VALUES (1,'128.647022702','voluptates','62177360.994084','dolores','optio','non','magni','2023-06-08 14:47:48','2023-06-08 14:47:48');
/*!40000 ALTER TABLE `pre_match_conditions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pre_match_finals`
--

DROP TABLE IF EXISTS `pre_match_finals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pre_match_finals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `additional_remarks` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `signature` varchar(100) NOT NULL,
  `whatsapp` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pre_match_finals`
--

LOCK TABLES `pre_match_finals` WRITE;
/*!40000 ALTER TABLE `pre_match_finals` DISABLE KEYS */;
INSERT INTO `pre_match_finals` VALUES (1,'iusto','hamill.kaycee@example.net','sint','iusto','quas','2023-06-08 14:53:09','2023-06-08 14:53:09');
/*!40000 ALTER TABLE `pre_match_finals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pre_match_issues`
--

DROP TABLE IF EXISTS `pre_match_issues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pre_match_issues` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `issue_one` varchar(100) NOT NULL,
  `issue_two` varchar(100) NOT NULL,
  `issue_three` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pre_match_issues`
--

LOCK TABLES `pre_match_issues` WRITE;
/*!40000 ALTER TABLE `pre_match_issues` DISABLE KEYS */;
INSERT INTO `pre_match_issues` VALUES (1,'iste','molestiae','amet','2023-06-08 14:52:33','2023-06-08 14:52:33');
/*!40000 ALTER TABLE `pre_match_issues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pre_match_operations`
--

DROP TABLE IF EXISTS `pre_match_operations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pre_match_operations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cs_email` varchar(100) NOT NULL,
  `cs_mobile` varchar(100) NOT NULL,
  `cs_name` varchar(100) NOT NULL,
  `gc_email` varchar(100) NOT NULL,
  `gc_mobile` varchar(100) NOT NULL,
  `gc_name` varchar(100) NOT NULL,
  `md_email` varchar(100) NOT NULL,
  `md_mobile` varchar(100) NOT NULL,
  `md_name` varchar(100) NOT NULL,
  `mo_email` varchar(100) NOT NULL,
  `mo_mobile` varchar(100) NOT NULL,
  `mo_name` varchar(100) NOT NULL,
  `ra_email` varchar(100) NOT NULL,
  `ra_mobile` varchar(100) NOT NULL,
  `ra_name` varchar(100) NOT NULL,
  `so_email` varchar(100) NOT NULL,
  `so_mobile` varchar(100) NOT NULL,
  `so_name` varchar(100) NOT NULL,
  `ta_email` varchar(100) NOT NULL,
  `ta_mobile` varchar(100) NOT NULL,
  `ta_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pre_match_operations`
--

LOCK TABLES `pre_match_operations` WRITE;
/*!40000 ALTER TABLE `pre_match_operations` DISABLE KEYS */;
INSERT INTO `pre_match_operations` VALUES (1,'heaney.marcelle@example.net','deserunt','rerum','triston.hansen@example.com','ipsum','nisi','opurdy@example.org','et','adipisci','alison.rippin@example.org','quo','explicabo','renner.rico@example.com','blanditiis','sunt','precious32@example.com','sit','magnam','wparisian@example.com','aut','quidem','2023-06-08 14:48:24','2023-06-08 14:48:24');
/*!40000 ALTER TABLE `pre_match_operations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pre_match_reports`
--

DROP TABLE IF EXISTS `pre_match_reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pre_match_reports` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` bigint(20) unsigned NOT NULL,
  `away_team` bigint(20) unsigned NOT NULL,
  `home_team` varchar(191) NOT NULL,
  `kick_off_time` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `competition` varchar(100) NOT NULL,
  `match_commissionar` varchar(100) NOT NULL,
  `match_date` varchar(100) NOT NULL,
  `stadium` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pre_match_reports_match_id_foreign` (`match_id`),
  KEY `pre_match_reports_away_team_foreign` (`away_team`),
  CONSTRAINT `pre_match_reports_away_team_foreign` FOREIGN KEY (`away_team`) REFERENCES `teams` (`id`),
  CONSTRAINT `pre_match_reports_match_id_foreign` FOREIGN KEY (`match_id`) REFERENCES `match_records` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pre_match_reports`
--

LOCK TABLES `pre_match_reports` WRITE;
/*!40000 ALTER TABLE `pre_match_reports` DISABLE KEYS */;
/*!40000 ALTER TABLE `pre_match_reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `referee_assistance_evaluations`
--

DROP TABLE IF EXISTS `referee_assistance_evaluations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `referee_assistance_evaluations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `additional_comments_on_game_control` text DEFAULT NULL,
  `area_of_improvements` text DEFAULT NULL,
  `performance` text DEFAULT NULL,
  `positive_points` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referee_assistance_evaluations`
--

LOCK TABLES `referee_assistance_evaluations` WRITE;
/*!40000 ALTER TABLE `referee_assistance_evaluations` DISABLE KEYS */;
/*!40000 ALTER TABLE `referee_assistance_evaluations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `referee_assistance_two_evaluations`
--

DROP TABLE IF EXISTS `referee_assistance_two_evaluations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `referee_assistance_two_evaluations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `additional_comments_on_game_control` text DEFAULT NULL,
  `area_of_improvements` text DEFAULT NULL,
  `performance` text DEFAULT NULL,
  `positive_points` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referee_assistance_two_evaluations`
--

LOCK TABLES `referee_assistance_two_evaluations` WRITE;
/*!40000 ALTER TABLE `referee_assistance_two_evaluations` DISABLE KEYS */;
/*!40000 ALTER TABLE `referee_assistance_two_evaluations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `referee_evaluations`
--

DROP TABLE IF EXISTS `referee_evaluations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `referee_evaluations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `additional_comments_on_game_control` text DEFAULT NULL,
  `area_of_improvements` text DEFAULT NULL,
  `performance` text DEFAULT NULL,
  `positive_points` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referee_evaluations`
--

LOCK TABLES `referee_evaluations` WRITE;
/*!40000 ALTER TABLE `referee_evaluations` DISABLE KEYS */;
/*!40000 ALTER TABLE `referee_evaluations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `referee_team_one_evaluations`
--

DROP TABLE IF EXISTS `referee_team_one_evaluations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `referee_team_one_evaluations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `additional_comments_on_game_control` text DEFAULT NULL,
  `area_of_improvements` text DEFAULT NULL,
  `performance` text DEFAULT NULL,
  `positive_points` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referee_team_one_evaluations`
--

LOCK TABLES `referee_team_one_evaluations` WRITE;
/*!40000 ALTER TABLE `referee_team_one_evaluations` DISABLE KEYS */;
/*!40000 ALTER TABLE `referee_team_one_evaluations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `referee_team_two_evaluations`
--

DROP TABLE IF EXISTS `referee_team_two_evaluations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `referee_team_two_evaluations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `additional_comments_on_game_control` text DEFAULT NULL,
  `area_of_improvements` text DEFAULT NULL,
  `performance` text DEFAULT NULL,
  `positive_points` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referee_team_two_evaluations`
--

LOCK TABLES `referee_team_two_evaluations` WRITE;
/*!40000 ALTER TABLE `referee_team_two_evaluations` DISABLE KEYS */;
/*!40000 ALTER TABLE `referee_team_two_evaluations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `referring_teams`
--

DROP TABLE IF EXISTS `referring_teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `referring_teams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `referee` text DEFAULT NULL,
  `ass_referee_1` text DEFAULT NULL,
  `ass_referee_2` text DEFAULT NULL,
  `fourth_official` text DEFAULT NULL,
  `add_referee_one` text DEFAULT NULL,
  `add_referee_two` text DEFAULT NULL,
  `additional_assistant_referee_1` text DEFAULT NULL,
  `additional_assistant_referee_2` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referring_teams`
--

LOCK TABLES `referring_teams` WRITE;
/*!40000 ALTER TABLE `referring_teams` DISABLE KEYS */;
/*!40000 ALTER TABLE `referring_teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(3,2),(4,1),(5,1),(6,1),(6,2),(7,1),(7,2),(8,1),(8,2);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin','web','2023-02-24 08:38:03','2023-02-24 08:38:03'),(2,'Editor','web','2023-02-24 08:38:03','2023-02-24 08:38:03'),(3,'rerum','api','2023-06-08 15:01:25','2023-06-08 15:01:25'),(4,'rerumad','api','2023-06-08 15:02:52','2023-06-08 15:02:52');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stadia`
--

DROP TABLE IF EXISTS `stadia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stadia` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `capacity` varchar(100) NOT NULL,
  `stadium_owner` varchar(100) NOT NULL,
  `stadium_picture` varchar(100) NOT NULL,
  `inauguration_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stadia`
--

LOCK TABLES `stadia` WRITE;
/*!40000 ALTER TABLE `stadia` DISABLE KEYS */;
INSERT INTO `stadia` VALUES (1,'Grant Brown','Burdette Anderson','Tianna Schoen','21.8547','Marlin Wisoky DVM','https://via.placeholder.com/640x480.png/0088bb?text=animals+aut','1974-05-19 00:00:00','2023-02-24 08:38:03','2023-02-24 08:38:03'),(2,'Kory Weimann','Mrs. Alejandra Dickens','Danika Gerhold','0.2744','Dr. Letha Mraz','https://via.placeholder.com/640x480.png/0066ee?text=animals+doloremque','1986-06-08 00:00:00','2023-02-24 08:38:03','2023-02-24 08:38:03'),(3,'Princess Balistreri','Ms. Hortense Bartell V','Laila Denesik','9774603.5178','Hilario Kunde','https://via.placeholder.com/640x480.png/001111?text=animals+quasi','1984-07-18 00:00:00','2023-02-24 08:38:03','2023-02-24 08:38:03'),(4,'Dave Luettgen','Dr. Darrel Terry I','Mara Hickle','9833413.7308','Freda Bailey','https://via.placeholder.com/640x480.png/0088bb?text=animals+vero','2005-06-27 00:00:00','2023-02-24 08:38:03','2023-02-24 08:38:03'),(5,'Dr. Hal Swift','Ms. Savannah Renner','Amber Deckow','398.0305','Reymundo Bartoletti','https://via.placeholder.com/640x480.png/001111?text=animals+amet','1997-10-09 00:00:00','2023-02-24 08:38:03','2023-02-24 08:38:03'),(6,'Prof. Tiana Goldner DDS','Mrs. Andreane Zemlak PhD','Mr. Joey Pollich','4183.9866','Cleve Mayert I','https://via.placeholder.com/640x480.png/000088?text=animals+est','2011-11-19 00:00:00','2023-02-24 08:38:03','2023-02-24 08:38:03'),(7,'Mrs. Claudie Ortiz','Freda Schamberger','Charley Wolff','1740.5032','Muriel Terry III','https://via.placeholder.com/640x480.png/000055?text=animals+fugiat','1998-08-11 00:00:00','2023-02-24 08:38:03','2023-02-24 08:38:03'),(8,'Prof. Timmothy Abshire DDS','Sierra Weber','Esteban Ziemann','1.1974','Janet Ryan','https://via.placeholder.com/640x480.png/00ff66?text=animals+et','2016-10-22 00:00:00','2023-02-24 08:38:03','2023-02-24 08:38:03'),(9,'Tina Kohler II','Shannon Halvorson','Elroy Auer','13.4879','Adolfo Kub','https://via.placeholder.com/640x480.png/004444?text=animals+nostrum','2006-12-18 00:00:00','2023-02-24 08:38:03','2023-02-24 08:38:03'),(10,'Sherman Blanda Sr.','Cordelia Gleichner','Hallie Roberts','12.9697','Timmy Krajcik','https://via.placeholder.com/640x480.png/00cc99?text=animals+asperiores','1998-07-05 00:00:00','2023-02-24 08:38:03','2023-02-24 08:38:03'),(11,'libero','ipsam','voluptas','6','deserunt','https://fra1.digitaloceanspaces.com/uploads/1678262779.png','2022-11-01 15:32:16','2023-03-08 08:06:20','2023-03-08 08:06:20');
/*!40000 ALTER TABLE `stadia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_players`
--

DROP TABLE IF EXISTS `team_players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_players` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `team_id` bigint(20) unsigned DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `mobile` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_players`
--

LOCK TABLES `team_players` WRITE;
/*!40000 ALTER TABLE `team_players` DISABLE KEYS */;
/*!40000 ALTER TABLE `team_players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `stadium_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) NOT NULL,
  `region` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `team_photo` varchar(191) DEFAULT NULL,
  `team_logo` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `teams_name_unique` (`name`),
  KEY `teams_stadium_id_foreign` (`stadium_id`),
  CONSTRAINT `teams_stadium_id_foreign` FOREIGN KEY (`stadium_id`) REFERENCES `stadia` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,5,'aliquam','excepturi','2023-03-08 08:06:58','2023-03-08 08:06:58','/uploads/team_photo1678262818.jpg','/uploads/team_logo1678262818.jpg');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tournaments`
--

DROP TABLE IF EXISTS `tournaments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tournaments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `start_at` date NOT NULL,
  `end_at` date DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tournaments`
--

LOCK TABLES `tournaments` WRITE;
/*!40000 ALTER TABLE `tournaments` DISABLE KEYS */;
INSERT INTO `tournaments` VALUES (1,5,'Kings To',2022,'2022-06-01',NULL,NULL,'2023-06-04 13:47:20','2023-06-04 13:47:20'),(2,5,'PSL',2023,'2023-06-01',NULL,NULL,'2023-06-04 13:57:45','2023-06-04 13:57:45'),(3,5,'tournament',2023,'2023-06-01',NULL,NULL,'2023-06-05 15:16:09','2023-06-05 15:16:09'),(4,5,'New tournament',2023,'2023-06-01',NULL,NULL,'2023-06-07 10:05:47','2023-06-07 10:05:47'),(5,5,'M24 Ligi 1',2023,'2023-06-01',NULL,NULL,'2023-06-08 08:50:59','2023-06-08 08:50:59'),(6,5,'M24 Ligi 1',2023,'2023-06-01',NULL,NULL,'2023-06-08 08:51:00','2023-06-08 08:51:00'),(7,5,'M24 Ligi 1',2023,'2023-06-01',NULL,NULL,'2023-06-08 08:51:00','2023-06-08 08:51:00'),(8,5,'M24 Ligi 1',2023,'2023-06-01',NULL,NULL,'2023-06-08 08:51:00','2023-06-08 08:51:00'),(9,5,'M24 Ligi 1',2023,'2023-06-01',NULL,NULL,'2023-06-08 08:51:00','2023-06-08 08:51:00'),(10,5,'M24 Ligi 1',2023,'2023-06-01',NULL,NULL,'2023-06-08 08:51:00','2023-06-08 08:51:00'),(11,5,'M24 Ligi 1',2023,'2023-06-01',NULL,NULL,'2023-06-08 08:51:00','2023-06-08 08:51:00'),(12,5,'M24 Ligi 1',2023,'2023-06-01',NULL,NULL,'2023-06-08 08:51:38','2023-06-08 08:51:38'),(13,5,'M24 Ligi 1',2023,'2023-06-01',NULL,NULL,'2023-06-08 08:51:39','2023-06-08 08:51:39'),(14,5,'M24 Ligi 1',2023,'2023-06-01',NULL,NULL,'2023-06-08 08:51:40','2023-06-08 08:51:40'),(15,5,'mg Ligi 1',2023,'2023-06-01',NULL,NULL,'2023-06-08 14:14:05','2023-06-08 14:14:05'),(16,5,'mg Ligi 1',2023,'2023-06-01',NULL,NULL,'2023-06-08 14:14:05','2023-06-08 14:14:05'),(17,5,'mg Ligi 1',2023,'2023-06-01',NULL,NULL,'2023-06-08 14:14:05','2023-06-08 14:14:05'),(18,5,'mg Ligi 1',2023,'2023-06-01',NULL,NULL,'2023-06-08 14:14:06','2023-06-08 14:14:06'),(19,5,'mg Ligi 1',2023,'2023-06-01',NULL,NULL,'2023-06-08 14:14:06','2023-06-08 14:14:06'),(20,5,'mg Ligi 1',2023,'2023-06-01',NULL,NULL,'2023-06-08 14:14:06','2023-06-08 14:14:06'),(21,5,'mg Ligi 1',2023,'2023-06-01',NULL,NULL,'2023-06-08 14:14:07','2023-06-08 14:14:07'),(22,5,'mg Ligi 1',2023,'2023-06-01',NULL,NULL,'2023-06-08 14:14:07','2023-06-08 14:14:07'),(23,5,'mg Ligi 1',2023,'2023-06-01',NULL,NULL,'2023-06-08 14:14:07','2023-06-08 14:14:07'),(24,5,'mg Ligi 1',2023,'2023-06-01',NULL,NULL,'2023-06-08 14:14:07','2023-06-08 14:14:07'),(25,5,'mg Ligi 1',2023,'2023-06-01',NULL,NULL,'2023-06-08 14:14:07','2023-06-08 14:14:07'),(26,5,'mg Ligi 1',2023,'2023-06-01',NULL,NULL,'2023-06-08 14:17:29','2023-06-08 14:17:29'),(27,5,'mg Ligi 1',2023,'2023-06-01',NULL,NULL,'2023-06-08 14:17:30','2023-06-08 14:17:30'),(28,5,'mg Ligi 1',2023,'2023-06-01',NULL,NULL,'2023-06-08 14:17:30','2023-06-08 14:17:30'),(29,5,'New TOurnament',2023,'2023-06-01',NULL,NULL,'2023-06-08 14:20:59','2023-06-08 14:20:59'),(30,6,'Kings To',2022,'2022-06-01',NULL,NULL,'2023-06-08 14:24:46','2023-06-08 14:24:46'),(31,6,'et',2001,'2001-06-01',NULL,NULL,'2023-06-08 14:42:43','2023-06-08 14:42:43'),(32,6,'Kings To',2022,'2022-06-01',NULL,NULL,'2023-06-08 15:29:54','2023-06-08 15:29:54'),(33,5,'tourna',2023,'2023-06-01',NULL,NULL,'2023-06-13 12:14:05','2023-06-13 12:14:05');
/*!40000 ALTER TABLE `tournaments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `mobile` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_mobile_unique` (`mobile`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'et','trenton691@example.org','1023',NULL,'$2y$10$7Lw9Xks.jZb7uG6ymqKpiO6Nuww9yAQdwf/gAEab19P9rFNwxgyh2',NULL,1,NULL,'2023-03-01 05:15:19','2023-03-01 05:15:19',NULL),(2,'et','test@test.com','234978234',NULL,'$2y$10$r28yXzt.ZFaTRJaUIhmADe7BSvIKgE0rzKauToccbr9yFp1FsQG7q',NULL,1,NULL,'2023-03-08 08:03:16','2023-03-08 08:03:16',NULL),(3,'penguin','penguin@dev.com','1234567',NULL,'$2y$10$4AeDgnQQJX701NfXifX8Cu4laXBSBTt81Ptmvp0/gGyfwffC1riUy',NULL,1,NULL,'2023-03-09 09:29:10','2023-03-09 09:29:10',NULL),(4,'akuma','test@teest.com','7970000',NULL,'$2y$10$oCeIkqcJnXyWedrbW5NKqe8sRB0KOkmKdRZgo64u1udxjvifZxZfi',NULL,1,NULL,'2023-03-16 08:14:25','2023-03-16 08:14:25',NULL),(5,'usama','usama@gmail.com','11111',NULL,'$2y$10$0KNqYn737K8rXvvK4vhuN.dikHgubP2rXknihpzCef3/PIiBxDuuy',NULL,1,NULL,'2023-06-04 01:46:59','2023-06-04 01:46:59',NULL),(6,'testing786','testing786@gmail.com','9876',NULL,'$2y$10$VZMH2uDj9yKGz6xI1hUpveIMO/G.wbByFguaWarKcn2QN1j3VI3kq',NULL,1,NULL,'2023-06-08 14:09:58','2023-06-08 14:09:58',NULL),(7,'testing','testing@gmail.com','12',NULL,'$2y$10$bC4Yui5WhBbqY8efhB6RQu8YS/mZRShq7f3mc5o4pr7DhPFrzjcNy',NULL,1,NULL,'2023-06-08 15:21:17','2023-06-08 15:21:17',1),(8,'azan','azanumrani33@gmail.com','31039',NULL,'$2y$10$T5pvtCimt7s8.ht4knF2XOtCIoQWEf1u6y0BbXToj3eXd09U78pDy',NULL,1,NULL,'2023-06-12 11:43:14','2023-06-12 11:56:37',NULL),(9,'a','sha@c.com','87878787887',NULL,'$2y$10$3uLh9hCLhsMq6J/B/OqVFuVVxVie8j17XehpONzNg0wfO/CdNmLEG',NULL,1,NULL,'2023-06-14 10:03:27','2023-06-14 10:03:27',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-14 14:19:56
