-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: shareddb-l.hosting.stackcp.net
-- Generation Time: Sep 12, 2026 at 05:56 PM
-- Server version: 10.11.18-MariaDB-log
-- PHP Version: 8.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `egyptTravel-3939f1b2`
--

-- --------------------------------------------------------

--
-- Table structure for table `attractions`
--

CREATE TABLE `attractions` (
  `id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `excerpt` text NOT NULL,
  `full_desc` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attractions`
--

INSERT INTO `attractions` (`id`, `destination_id`, `title`, `excerpt`, `full_desc`, `image`) VALUES
(1, 1, 'The Pyramids Of Giza & Sphinx', 'Of all of Egypt\'s major tourist attractions, only one is at the top of any list...', '<p>The Giza Plateau is home to the Great Pyramids of Cheops, Chephren, and Mykerinus. Built during the Fourth Dynasty of the Old Kingdom, the Great Pyramid of Cheops is the only surviving structure of the original Seven Wonders of the Ancient World.</p><p>Guarding this magnificent complex is the Great Sphinx, a monumental statue with the body of a lion and the head of a pharaoh, widely believed to represent King Chephren.</p>', 'https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=1000&auto=format&fit=crop'),
(2, 1, 'The Pyramids Of Sakkara', 'Sakkara (sometimes called Saqqara) is one section of the great necropolis of Memphis...', '<p>Located about 30 km south of Cairo, Sakkara was the vast necropolis of the ancient Egyptian capital, Memphis. Its absolute centerpiece is the Step Pyramid of Djoser, designed by the brilliant architect Imhotep.</p><p>Built in the 27th century BC, it is considered the earliest colossal stone building and the earliest large-scale cut stone construction in history.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/saqaraa.png'),
(3, 1, 'The Pyramids Of Dahshur', 'Dahshour is one of Memphis\'s most important cemeteries...', '<p>Dahshur is a royal necropolis located in the desert on the west bank of the Nile. It is most famous for its two spectacular pyramids built by King Sneferu: the Bent Pyramid and the Red Pyramid.</p><p>The Bent Pyramid is a unique transitional form with an angled top, representing a critical learning curve in pyramid building.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2018/09/cat_cairo.jpg'),
(4, 1, 'The Open Air Museum Of Memphis', 'Memphis was the capital of ancient Egypt during the first dynasty...', '<p>Founded around 3100 BC by King Menes, Memphis was the first capital of a unified Egypt. Today, its ruins form a fascinating open-air museum set in a tranquil, palm-shaded village.</p><p>The absolute highlight of the museum is the breathtaking colossal statue of Ramses II. Carved from limestone, it measures over 10 meters long even without its lower legs.</p>', 'https://egypteyetour.com/wp-content/uploads/2018/09/Memphis.jpg'),
(5, 1, 'Cairo Tower', 'This city looks fascinating from above than what one sees from below...', '<p>Standing gracefully at 187 meters (614 feet), the Cairo Tower has been the tallest structure in Egypt and North Africa for decades. Located on Gezira Island, its striking lattice design is inspired by the lotus plant.</p><p>The observation deck at the very top offers unparalleled, breathtaking 360-degree panoramic views of the sprawling metropolis of Cairo.</p>', 'https://media.istockphoto.com/id/1276967305/photo/view-from-the-cairo-tower.jpg?s=612x612&w=0&k=20&c=7wYuwohb7bYOhaMpA6Kf3Js02KH6Vcw3OzrUhjLFve8='),
(6, 1, 'Museum Of Egyptian Antiquities', 'The museum contains the most important collection of Egyptian antiquities in the world...', '<p>Situated in the heart of Tahrir Square, the Museum of Egyptian Antiquities is home to one of the most extensive collections of ancient Egyptian artifacts in the world. Opened in 1902 in its distinct neoclassical building.</p><p>While many artifacts are moving to the GEM, this historic building remains an incredible labyrinth of ancient statues, mummies, and sarcophagi.</p>', 'https://news.artnet.com/app/news-upload/2025/06/grand-egyptian-museum-galleries-3-1024x768.jpg'),
(7, 1, 'The Citadel Of Saladin', 'The Citadel, situated on a highly visible part of the Mokattam Mountains...', '<p>Perched strategically on the Mokattam Hills, the Citadel of Saladin is a magnificent Islamic fortress. It was originally fortified by the great military leader Salah El-Din in 1176 to protect Cairo from Crusader attacks.</p><p>For nearly 700 years, it served as the royal residence and the seat of the Egyptian government.</p>', 'https://www.goldenluxortours.com/wp-content/uploads/2024/05/Citadel-Egypt-Golden-Luxor-tours.webp'),
(8, 1, 'The Mosque of Mohamed Ali', 'The Mohamed Ali Mosque, or the Alabaster Mosque, is one of Egypt\'s most interesting mosques...', '<p>Dominating the Cairo skyline from within the Citadel, the Mosque of Mohamed Ali is one of the city\'s most recognizable landmarks. Built between 1830 and 1848, it is famously known as the Alabaster Mosque.</p><p>Its majestic Ottoman architecture, featuring a massive central dome and two towering, slender minarets, was heavily inspired by the grand mosques of Istanbul.</p>', 'https://egymonuments.gov.eg//media/1126/dsc_0143-2.jpg?anchor=center&mode=crop&width=1200&height=630&rnd=134159794440000000'),
(9, 1, 'Sultan Hassan Madrassa & Mosque', 'The Sultan Hassan Madrassa is the Islamic world\'s most memorable monument...', '<p>A true masterpiece of Mamluk architecture, the Sultan Hassan Mosque and Madrassa was built between 1356 and 1363. Its massive scale, towering walls, and elegant proportions make it one of the largest in the world.</p><p>It was designed not just as a place of worship, but to include schools (madrassas) for all four Sunni schools of Islamic law.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Sultan-Hassan-Madrassa-And-Mosque.jpg'),
(10, 1, 'The Mosque Of Al Refaie', 'The mosque of Al Refaie is considered one of the most remarkable Islamic structures...', '<p>Located immediately opposite the monumental Sultan Hassan Mosque, the Al-Refaie Mosque was constructed much later, completed in 1912. Despite the time gap, it was meticulously designed to complement its older neighbor.</p><p>The mosque serves as the royal mausoleum for the modern Egyptian royal family.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/refaimosque4.jpg'),
(11, 1, 'El-Azhar Mosque', 'Mosque of Al Azhar was the first Islamic University built in Cairo...', '<p>Founded in 970 AD during the Fatimid Caliphate, Al-Azhar Mosque is the first mosque established in Cairo, giving the city its title The City of a Thousand Minarets.</p><p>Shortly after its founding, it became a center of learning, making Al-Azhar University one of the oldest continuously operating universities in the world.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/al-azhar-mosque-cairo-egypt2.jpg'),
(12, 1, 'Old Market Of Khan El-Khalili', 'The Khan El-Khalili is one of the most famous and oldest bazaars...', '<p>Khan El-Khalili is a sprawling, vibrant historic bazaar located in the heart of Islamic Cairo. Dating back to the 14th century, it was originally built as a caravanserai—a massive trading hub for traveling merchants.</p><p>Today, its labyrinthine, narrow alleys are filled with shops selling everything from aromatic spices to intricate silver jewelry.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/The-Old-Market-Of-Khan-El-Khalili-.jpg'),
(13, 1, 'The Hanging Church', 'Its name, Al-Muallaka (the hanging), was given to it since it was built on ruins...', '<p>Officially known as the Saint Virgin Mary\'s Coptic Orthodox Church, the Hanging Church gets its name from its unique location—it is built suspended entirely over the gatehouse of the ancient Roman Babylon Fortress.</p><p>Dating back to the 3rd century, it is one of the oldest and most important churches in Egypt.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/The-Hanging-Church2.jpg'),
(14, 1, 'St. Sergious And Bacchus Church', 'The church of St. Sergio is one of the sites visited by the Holy Family...', '<p>The Church of St. Sergius and Bacchus, locally known as Abu Serga, is a site of immense historical and religious significance in Old Cairo.</p><p>According to strong local tradition, the church was built directly over the cavern where the Holy Family rested at the end of their flight into Egypt to escape King Herod.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/The-Church-Of-St.-Sergious-And-Bacchus.jpg'),
(15, 1, 'Ben Ezra Synagogue', 'The Synagogue of Ben Ezra in Cairo was originally named El-Shamieen Church...', '<p>Located directly behind the Hanging Church in Old Cairo, the Ben Ezra Synagogue is a jewel of Egypt\'s Jewish heritage. According to local folklore, it marks the exact spot where the baby Moses was found in his basket.</p><p>The synagogue gained worldwide fame in the late 19th century when an immense cache of ancient manuscripts was discovered in its storeroom.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Ben-Ezra-Synagogue.jpg'),
(16, 1, 'The Pharaonic Village', 'The Pharaonic Village is a historic experience not to be missed...', '<p>Created by Dr. Hassan Ragab (the man who rediscovered the ancient art of papyrus making), the Pharaonic Village is a unique, interactive living museum that transports visitors back in time.</p><p>Located on Jacob\'s Island in the Nile, visitors glide on motorized barges through a network of canals while actors in authentic ancient Egyptian costumes recreate scenes of daily life.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/The-Pharaonic-Village.jpg'),
(17, 2, 'Luxor Temple', 'Situated on the east bank of the Nile River, this large Ancient Egyptian temple...', '<p>Located in the heart of the modern city on the east bank of the Nile, Luxor Temple is a stunning testament to the continuous history of Egypt. Unlike other temples in Thebes, it wasn\'t dedicated to a cult god.</p><p>Constructed primarily by Amenhotep III and Ramesses II, with additions by Tutankhamun and Alexander the Great, the temple is famous for its grand colonnades.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2020/01/Luxor-Temple.jpg'),
(18, 2, 'The Temple of Karnak', 'The Karnak Temple Complex comprises a vast mix of decayed temples, chapels, pylons...', '<p>The Karnak Temple Complex is arguably the most astonishing religious site in the world. Developed over more than 2,000 years by successive pharaohs, it was the principal religious center of the god Amun-Re.</p><p>The sheer scale of Karnak is overwhelming. Its crown jewel is the Great Hypostyle Hall—a breathtaking forest of 134 massive sandstone columns.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Luxor-temple-Karnak-1.jpg'),
(19, 2, 'The Colossi of Memnon', 'Two massive stone statues of the Pharaoh Amenhotep III, standing at the front...', '<p>Standing like silent sentinels on the West Bank of Luxor, the Colossi of Memnon are two massive stone statues of Pharaoh Amenhotep III. For the past 3,400 years, they have sat here.</p><p>Towering at 18 meters high and weighing roughly 720 tons each, the statues gained immense fame in antiquity when an earthquake caused one to crack.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2020/01/The-Colossi-of-Memnon.jpg'),
(20, 2, 'The Valley Of The Kings', 'A valley where, for a period of nearly 500 years, rock-cut tombs were excavated...', '<p>Hidden within the arid cliffs of the Theban Necropolis on the West Bank lies the legendary Valley of the Kings. For nearly 500 years, this valley was the secret burial ground for the Pharaohs.</p><p>Boasting over 60 excavated tombs—including those of Ramesses II, Seti I, and the famous boy-king Tutankhamun—the walls of these subterranean crypts are adorned with incredibly well-preserved scenes.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2018/09/cat_Luxor.jpg'),
(21, 2, 'The Valley Of The Queens', 'The burial site of the wives of pharaohs, known in ancient times as Ta-Set-Neferu...', '<p>Situated near the Valley of the Kings, the Valley of the Queens—known in ancient times as Ta-Set-Neferu (The Place of Beauty)—was the primary burial site for royal wives, princes, and princesses.</p><p>The absolute highlight of this valley is the stunning Tomb of Queen Nefertari, the beloved Great Royal Wife of Ramesses II.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/hatspsout.jpg'),
(22, 2, 'The Temple Of Hatshepsut', 'Located at Deir El-Bahri, it is considered one of the incomparable monuments...', '<p>The Mortuary Temple of Queen Hatshepsut, located beneath the towering cliffs of Deir el-Bahari, is considered a masterpiece of ancient architecture. Designed by her architect Senenmut.</p><p>As one of the most successful female pharaohs, Hatshepsut utilized the temple\'s brilliant reliefs to immortalize her divine birth and her famous trading expedition to the Land of Punt.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/hatspsout.jpg'),
(23, 2, 'The Temple Of Dendera', 'One of the best-preserved temple complexes in Egypt, containing the Temple of Hathor...', '<p>Located north of Luxor, the Dendera Temple complex is one of the best-preserved in all of Egypt. The main structure, the Temple of Hathor (the goddess of love, joy, and beauty), was built largely during the Ptolemaic and Roman periods.</p><p>Dendera is famous for its breathtaking, recently cleaned astronomical ceiling, which retains its vibrant blue colors.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Abydos_temples.jpg'),
(24, 2, 'The Temple Of Abydos', 'One of the most ancient cities of Upper Egypt, and also of the eighth nome...', '<p>Abydos is one of the oldest and holiest cities in ancient Egypt, revered as the cult center and burial place of Osiris, god of the underworld. The main attraction is the magnificent Temple of Seti I.</p><p>The temple is celebrated for having some of the finest and most delicate bas-relief carvings in Egyptian art. It also houses the Abydos King List.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2020/01/The-Temple-Of-Abydos.jpg'),
(25, 2, 'The Temple Of Medinet Habu', 'The Mortuary Temple of Ramesses III at Medinet Habu is an important structure...', '<p>Medinet Habu is the spectacular mortuary temple of Ramesses III. Second only to Karnak in size, it is widely considered the best-preserved New Kingdom temple in the Theban region.</p><p>Approached through a massive, Syrian-style fortified gatehouse (the Migdol), the temple\'s massive walls are deeply incised with dramatic reliefs depicting Ramesses III\'s military victories.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2020/01/The-Temple-Of-MedinetHabu.jpg'),
(26, 2, 'The Temple Of Edfu', 'An Egyptian temple located on the west bank of the Nile in Edfu, dedicated to Horus...', '<p>Located between Luxor and Aswan, the Temple of Edfu is dedicated to the falcon god Horus. Built during the Ptolemaic period between 237 and 57 BC, it stands today as the most completely preserved temple in Egypt.</p><p>Buried under desert sand and river silt for centuries, its massive 36-meter-high pylon gateway and immense inner sanctuary are perfectly intact.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2020/01/The-Temple-Of-Edfu2.jpg'),
(27, 2, 'The Temple Of Kom Ombo', 'An unusual double temple built during the Ptolemaic dynasty, dedicated to Sobek and Horus...', '<p>Sitting picturesquely on a bend in the Nile River, Kom Ombo is an unusual double temple built during the Ptolemaic dynasty. The complex is perfectly symmetrical along its main axis.</p><p>Fascinating highlights of the temple include a relief depicting ancient surgical instruments and medical tools, an ancient nilometer used to measure river levels, and a nearby museum housing mummified crocodiles.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2020/01/The-Temple-Of-KomOmbo.jpg'),
(28, 3, 'The Unfinished Obelisk', 'The largest known ancient obelisk, providing incredible insight into the stone-working...', '<p>Located in the northern region of the stone quarries of ancient Egypt in Aswan, the Unfinished Obelisk provides an extraordinary, rare look into the stone-working techniques of the past.</p><p>Commissioned by Queen Hatshepsut, this obelisk would have been the heaviest and largest single piece of stone ever crafted by the Egyptians, weighing an estimated 1,200 tons.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2020/01/Unfinished-Obelisk-at-Aswan2.jpg'),
(29, 3, 'Aswan Botanical Island', 'Kitchener\'s Island is a quiet and beautiful oasis on the Nile River featuring...', '<p>Also known as Kitchener\'s Island, this lush oval-shaped island in the middle of the Nile is a tranquil oasis. It was given to Lord Horatio Kitchener in the 1890s as a reward for his military campaigns in Sudan.</p><p>With a deep passion for palm trees and plants, Kitchener transformed the entire island into a world-class botanical garden.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2020/01/The-Aswan-Botanical-Island.jpg'),
(30, 3, 'The High Dam', 'A marvel of modern engineering built in the 1960s to control the Nile\'s flooding...', '<p>Considered one of the greatest engineering feats of the 20th century, the Aswan High Dam was constructed between 1960 and 1970 to tame the unpredictable annual flooding of the Nile River.</p><p>The creation of this massive structure resulted in the formation of Lake Nasser, one of the world\'s largest artificial lakes.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2020/01/The-High-Dam.jpg'),
(31, 3, 'The Temples Of Abu Simbel', 'Two massive rock temples carved out of the mountainside during the reign of Pharaoh Ramesses II...', '<p>Carved entirely out of a solid sandstone mountain in southern Egypt, the Abu Simbel temples are a breathtaking monument to Pharaoh Ramesses II and his beloved queen, Nefertari.</p><p>In the 1960s, the entire complex was famously cut into massive blocks and relocated piece by piece to higher ground in a massive UNESCO-led effort to save it.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/egypt-aswan-day-trip-abu-simbel.jpg'),
(32, 3, 'Temple of Philae', 'An ancient island temple complex dedicated to the goddess Isis, relocated to Agilkia Island...', '<p>The Temple of Philae, dedicated primarily to the goddess Isis, is celebrated for its beautiful setting on an island in the Nile and its stunning Ptolemaic and Roman architecture.</p><p>Originally located on Philae Island, the temple was frequently flooded after the construction of the Aswan Low Dam. In an incredible rescue operation, UNESCO dismantled the entire complex and moved it to the nearby Agilkia Island.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Philae-Temple-1.jpg'),
(33, 4, 'The Catacombs', 'Kom El-Shoukafa tomb is considered one of the Seven Wonders of the Middle Ages...', '<p>The Catacombs of Kom El Shoqafa are considered one of the Seven Wonders of the Middle Ages. Discovered accidentally in 1900 when a donkey fell into the access shaft.</p><p>What makes this underground necropolis truly unique is its mesmerizing blend of ancient Egyptian, Greek, and Roman architectural and artistic styles.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/alexandria_shore_excursion.jpg'),
(34, 4, 'Pompey’s Pillar', 'The Memorial of Diocletian stands as a massive monolithic column towering over the ruins...', '<p>Standing tall amidst the ruins of the ancient Serapeum, Pompey\'s Pillar is a massive Roman triumphal column. Despite its name, which was mistakenly given by Crusaders.</p><p>Carved from a single piece of red Aswan granite, it is one of the largest monolithic columns ever erected, measuring nearly 27 meters high.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2019/11/WhatsApp-Image-2019-10-11-at-8.16.13-PM.jpeg'),
(35, 4, 'The Qaitbay Citadel', 'Built on the exact site of the famous Lighthouse of Alexandria, this fortress offers...', '<p>The Citadel of Qaitbay is a stunning 15th-century defensive fortress located on the Mediterranean sea coast. It was established in 1477 AD by Sultan Al-Ashraf Sayf al-Din Qa\'it Bay.</p><p>Most notably, the citadel was built on the exact site of the legendary Lighthouse of Alexandria (Pharos), one of the Seven Wonders of the Ancient World.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2020/01/The-Qaitbay-Citadel.jpg'),
(36, 4, 'Bibliotheca Alexandrina', 'The modern Library of Alexandria is a striking architectural masterpiece and a major cultural center...', '<p>The Bibliotheca Alexandrina is a striking modern architectural masterpiece, built to commemorate the original Great Library of Alexandria that was destroyed in antiquity.</p><p>Its stunning granite exterior is carved with characters from 120 different human scripts. Inside, this vast cultural complex houses space for over 8 million books.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2020/01/The-Library-Of-Alexandria.jpg'),
(37, 4, 'Roman Amphitheatre', 'Located in Kom El Dekka, it is the only Roman amphitheater discovered in Egypt...', '<p>Located in the heart of Alexandria at Kom El Dikka (Mound of Rubble), this is the only Roman amphitheatre ever discovered in Egypt. It was unearthed by accident in the 1960s.</p><p>Dating back to the 2nd century AD, the well-preserved theatre features 13 semicircular tiers made of white marble that could seat up to 800 spectators.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/el-alamein-western-desert-egypt-picture-id.jpg'),
(38, 4, 'Montaza Palace Gardens', 'A vast royal palace surrounded by lush, sprawling gardens overlooking the Mediterranean...', '<p>The Montaza Palace complex was built as a summer residence for the Egyptian royal family. Built in 1892 by Khedive Abbas II, the sprawling estate is perched on a low plateau overlooking a beautiful bay.</p><p>The main attraction for visitors is the spectacular 150-acre royal gardens. Lush with rare pine trees, vibrant flower beds, and sweeping lawns.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Wadi-El-Natrun-Day-tour.jpg'),
(39, 4, 'National Museum Of Alexandria', 'Housed in a restored Italianate mansion, this museum guides you through the city\'s history...', '<p>Housed in a beautifully restored Italianate palace that once belonged to a wealthy wood merchant, the Alexandria National Museum offers an incredible journey through the history of the city.</p><p>The basement is dedicated to the Pharaonic period, the ground floor covers the city\'s Greco-Roman prime, and the first floor showcases the Coptic and Islamic eras.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2019/11/WhatsApp-Image-2019-10-09-at-6.17.44-PM.jpeg'),
(40, 5, 'Ras Mohammed National Park', 'One of the most famous and pristine diving sites in the world...', '<p>Ras Mohammed is located at the southern extreme of the Sinai Peninsula. It is renowned globally for its spectacular coral reefs, diverse marine life, and crystal-clear waters, making it a paradise for snorkelers and divers.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2018/09/cat_sharm.jpg'),
(41, 5, 'Tiran Island', 'A breathtaking island famous for its crystal clear waters and coral reefs...', '<p>Named after Tiran Island, the Straits of Tiran are the narrow sea passages between Sinai and the Arabian peninsulas. It features four main reefs (Gordon, Thomas, Woodhouse, and Jackson) which are among the best-preserved in the entire Red Sea.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2019/11/WhatsApp-Image-2019-10-11-at-8.14.05-PM-1.jpeg'),
(42, 5, 'Naama Bay', 'The vibrant heart of Sharm El Sheikh, filled with cafes, restaurants, and bazaars...', '<p>Naama Bay is the bustling center of Sharm El Sheikh. With its long sandy beaches, extensive promenade, and endless array of dining and entertainment options, it is the perfect place to relax during the day and explore at night.</p>', 'https://egypttravelsquare.com/3abar-data/uploads/2020/01/sharm_elshikh.jpg'),
(43, 5, 'Saint Catherine Monastery', 'The oldest continuously inhabited Christian monastery in the world...', '<p>Located 220 km northwest of Sharm el Sheikh between the St-Catherine mountains and Mount Sinai, this Orthodox Greek monastery is incredibly rich in religious history. It houses a library of ancient manuscripts second only to the Vatican.</p>', '1789229910_attr.png');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `hero_image` varchar(255) NOT NULL,
  `intro_title` varchar(255) NOT NULL,
  `intro_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `name`, `slug`, `hero_image`, `intro_title`, `intro_text`) VALUES
(1, 'Cairo', 'cairo', 'https://media.istockphoto.com/id/1276967305/photo/view-from-the-cairo-tower.jpg?s=612x612&w=0&k=20&c=7wYuwohb7bYOhaMpA6Kf3Js02KH6Vcw3OzrUhjLFve8=', 'Welcome to the City of a Thousand Minarets', '<p>Cairo is the capital of Egypt and the largest city in Africa, its name means “the victorious one.” A trip to Egypt is not complete without a visit to this sprawling metropolis along the banks of the river Nile.</p>'),
(2, 'Luxor', 'luxor', 'https://egypttravelsquare.com/3abar-data/uploads/2018/09/cat_Luxor.jpg', 'Journey Back to Ancient Times', '<p>Luxor is often called the world\'s greatest open-air museum. The number and preservation of the monuments in the Luxor area are unparalleled anywhere else in the world.</p>'),
(3, 'Aswan', 'aswan', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/felucca-aswan.jpg', 'Sites to see in, or around Aswan', '<p>Aswan is the biggest city in Upper Egypt and the third biggest city in Egypt today, it is situated at the foot of the Nile Valley to the North end of Lake Nasser.</p>'),
(4, 'Alexandria', 'alexandria', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/alexandria_shore_excursion.jpg', 'The Pearl of the Mediterranean', '<p>The city of Alexandria was founded by Alexander the Great in 333 B.C. In Alexandria, there are many magnificent sightseeing spots to explore reflecting its unique Greek, Roman, and Egyptian heritage.</p>'),
(5, 'Sharm El Sheikh', 'sharm-el-sheikh', '1789229225_dest.png', 'The City of Peace', '<p>Egypt Travel Square arranges tours and excursions in Sharm El Sheikh whether you look for sea tours and Snorkeling trips, Diving, Watching dolphin shows, or Spending a wonderful day in Aqua Park.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`) VALUES
(1, 'Is it Safe to Travel to Egypt Now?', 'Yes, it is very safe. The best way to answer this is to review recent feedback on platforms like TripAdvisor from visitors who just left Egypt. The police, tourist police, and army are always close by, and the Egyptian people are incredibly friendly, welcoming, and protective of tourists.'),
(2, 'How do I get my tourist visa?', 'If you are from North America, Western Europe, Australia/New Zealand, Brazil/Argentina, Japan, or Singapore, you can easily get your tourist visa upon arrival at the airport in Egypt. Other nationalities usually need to apply to their local Egyptian Embassy or Consulate prior to travel.'),
(3, 'What is the best time to travel to Egypt?', 'The peak and most comfortable time to visit is from October to May when temperatures are mild. However, summer (May to October) offers a virtual peace and quiet with significantly fewer crowds at major sites, and great discounts, provided you can handle the heat!'),
(4, 'What about traveling during Ramadan?', 'Ramadan is a superb, festival-like month. While Muslims fast during the day, restaurants and cafes still cater to tourists. Sites close slightly earlier, but after sunset, the country comes alive with lights, food, and celebration. It is an unforgettable cultural experience.'),
(5, 'How should I dress for entering a mosque?', 'Protocol asks that men wear long trousers rather than shorts. Women should cover bare skin as much as possible—shoulders and legs must be covered. While covering the head is not strictly legally required in all tourist mosques, it is a highly appreciated sign of respect (a simple scarf will suffice).'),
(6, 'Can I take photographs inside the tombs?', 'No, photography inside ancient tombs (including inside the Pyramids and Abu Simbel) is strictly forbidden to protect the ancient paintwork from excessive flash damage. Cameras are perfectly fine outside the sites!'),
(7, 'Is it safe for women to travel alone?', 'Yes. Many solo female travelers visit Egypt and feel completely safe. However, as with any global destination, take standard precautions: avoid deserted areas at night and stick to reputable taxis or booked tours.'),
(8, 'Do I need to take anti-malaria tablets?', 'NO! Malaria has not been in Egypt for over 85 years. Taking unnecessary anti-malaria medication can cause side effects that might ruin your holiday. Stick to drinking bottled water to avoid minor stomach upsets from the local tap water.');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image_path`, `caption`) VALUES
(1, 'https://egypttravelsquare.com/3abar-data/uploads/2019/11/WhatsApp-Image-2019-10-09-at-6.28.43-PM-1.jpeg', 'Giza Pyramids'),
(2, 'https://egypttravelsquare.com/3abar-data/uploads/2018/09/cat_Luxor.jpg', 'Luxor Temple'),
(3, 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/felucca-aswan.jpg', 'Felucca in Aswan'),
(4, 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/alexandria_shore_excursion.jpg', 'Alexandria Coast'),
(5, 'https://egypttravelsquare.com/3abar-data/uploads/2020/01/sharm_elshikh.jpg', 'Sharm El Sheikh'),
(6, 'https://egypttravelsquare.com/3abar-data/uploads/2019/11/StCatherine_thmb.jpg', 'St. Catherine Monastery'),
(7, 'https://egypttravelsquare.com/3abar-data/uploads/2018/09/cat_cairo.jpg', 'Cairo City'),
(8, 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/temple-of-hatshupsut_COVER.jpg', 'Temple of Hatshepsut'),
(9, 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Port-Said-Shore-Excursions.jpg', 'Port Said'),
(10, 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/karnak-sound-light-show2.jpg', 'Karnak Temple'),
(11, 'https://egypttravelsquare.com/3abar-data/uploads/2020/01/The-Colossi-of-Memnon.jpg', 'Colossi of Memnon'),
(12, '1789227682_gallery.jpg', 'The High Dam'),
(13, '1789230450_gallery.png', 'The High Dam');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 5,
  `review_text` text NOT NULL,
  `status` enum('pending','approved') DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `country`, `rating`, `review_text`, `status`, `created_at`) VALUES
(1, 'Sarah Jenkins', 'United Kingdom', 5, 'Egypt Travel Square made our dream trip come true! The guides were incredibly knowledgeable and the organization was flawless from start to finish.', 'approved', '2026-09-12 14:57:38'),
(2, 'Michael Chen', 'Canada', 5, 'An absolutely magnificent experience. Sailing on the Nile and seeing the Pyramids with a private guide was worth every penny. Highly recommended!', 'approved', '2026-09-12 14:57:38'),
(3, 'Elena Rodriguez', 'Spain', 4, 'Very professional team. They took care of all the details, transfers, and tickets. We felt very safe and welcomed in Egypt.', 'approved', '2026-09-12 14:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `setting_key` varchar(50) NOT NULL,
  `setting_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting_key`, `setting_value`) VALUES
(1, 'phone', '+20 100 679 6511'),
(2, 'email', 'info@egypttravelsquare.com'),
(3, 'address', '12 Tahrir Street, Downtown, Cairo, Egypt'),
(4, 'facebook', 'https://www.facebook.com/share/196gByQFgj/?mibextid=wwXIfr'),
(5, 'instagram', 'https://www.instagram.com/abduo_egypt_guide?utm_source=qr'),
(6, 'tiktok', 'https://www.tiktok.com/@abduo.abdelaziz.e?_r=1&_t=ZS-96uondgXyoG'),
(7, 'youtube', 'http://www.youtube.com/@egypttravelsquare2264'),
(8, 'tripadvisor', 'https://www.tripadvisor.com/Attraction_Review-g294202-d19767047-Reviews-Egypt_Travel_Square-Giza_Giza_Governorate.html'),
(9, 'home_hero_title', 'Experience the Magic of <span>Egypt</span>'),
(10, 'home_hero_subtitle', 'Your trusted partner for extraordinary Egyptian adventures. Custom itineraries, expert guides, and unforgettable memories.'),
(11, 'home_hero_bg', 'https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=2000&auto=format&fit=crop'),
(12, 'home_hero_btn1_text', 'Explore Packages'),
(13, 'home_hero_btn1_link', 'packages.php'),
(14, 'home_hero_btn2_text', 'Find Day Tours'),
(15, 'home_hero_btn2_link', 'tours.php?type=day'),
(16, 'hero_about', '1789226377_hero_about.jpg'),
(17, 'hero_contact', 'https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=2000&auto=format&fit=crop'),
(18, 'hero_gallery', '1789230686_hero_gallery.jpg'),
(19, 'hero_videos', 'https://egypttravelsquare.com/3abar-data/uploads/2018/09/cat_cairo.jpg'),
(20, 'hero_faq', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/felucca-aswan.jpg'),
(21, 'hero_transfers', 'https://egypttravelsquare.com/3abar-data/uploads/2019/11/WhatsApp-Image-2019-12-19-at-4.26.25-PM-800x899.jpeg'),
(22, 'hero_shore', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/alexandria_shore_excursion.jpg'),
(23, 'hero_policies', '1789227884_hero_policies.jpg'),
(24, 'phone', '+20 100 679 6511'),
(25, 'email', 'info@egypttravelsquare.com'),
(26, 'address', '12 Tahrir Street, Downtown, Cairo, Egypt'),
(27, 'facebook', 'https://www.facebook.com/share/196gByQFgj/?mibextid=wwXIfr'),
(28, 'instagram', 'https://www.instagram.com/abduo_egypt_guide?utm_source=qr'),
(29, 'youtube', 'http://www.youtube.com/@egypttravelsquare2264'),
(30, 'tiktok', 'https://www.tiktok.com/@abduo.abdelaziz.e?_r=1&_t=ZS-96uondgXyoG'),
(31, 'tripadvisor', 'https://www.tripadvisor.com/Attraction_Review-g294202-d19767047-Reviews-Egypt_Travel_Square-Giza_Giza_Governorate.html'),
(32, 'home_hero_title', 'Experience the Magic of <span>Egypt</span>'),
(33, 'home_hero_subtitle', '<p>Your trusted partner for extraordinary Egyptian adventures. Custom itineraries, expert guides, and unforgettable memories.</p>'),
(34, 'home_hero_btn1_text', 'Explore Packages'),
(35, 'home_hero_btn1_link', 'packages.php'),
(36, 'home_hero_btn2_text', 'Find Day Tours'),
(37, 'home_hero_btn2_link', 'tours.php?type=day'),
(38, 'default_logo', '1789225323_logo.jpg'),
(39, 'phone', '+20 100 679 6511'),
(40, 'email', 'info@egypttravelsquare.com'),
(41, 'address', '12 Tahrir Street, Downtown, Cairo, Egypt'),
(42, 'facebook', 'https://www.facebook.com/share/196gByQFgj/?mibextid=wwXIfr'),
(43, 'instagram', 'https://www.instagram.com/abduo_egypt_guide?utm_source=qr'),
(44, 'youtube', 'http://www.youtube.com/@egypttravelsquare2264'),
(45, 'tiktok', 'https://www.tiktok.com/@abduo.abdelaziz.e?_r=1&_t=ZS-96uondgXyoG'),
(46, 'tripadvisor', 'https://www.tripadvisor.com/Attraction_Review-g294202-d19767047-Reviews-Egypt_Travel_Square-Giza_Giza_Governorate.html'),
(47, 'home_hero_title', 'Experience the Magic of <span>Egypt</span>'),
(48, 'home_hero_subtitle', '<p>Your trusted partner for extraordinary Egyptian adventures. Custom itineraries, expert guides, and unforgettable memories.</p>'),
(49, 'home_hero_btn1_text', 'Explore Packages'),
(50, 'home_hero_btn1_link', 'packages.php'),
(51, 'home_hero_btn2_text', 'Find Day Tours'),
(52, 'home_hero_btn2_link', 'tours.php?type=day'),
(53, 'default_logo', '1789225520_logo.jpg'),
(54, 'phone', '+20 100 679 6511'),
(55, 'email', 'info@egypttravelsquare.com'),
(56, 'address', '12 Tahrir Street, Downtown, Cairo, Egypt'),
(57, 'facebook', 'https://www.facebook.com/share/196gByQFgj/?mibextid=wwXIfr'),
(58, 'instagram', 'https://www.instagram.com/abduo_egypt_guide?utm_source=qr'),
(59, 'youtube', 'http://www.youtube.com/@egypttravelsquare2264'),
(60, 'tiktok', 'https://www.tiktok.com/@abduo.abdelaziz.e?_r=1&_t=ZS-96uondgXyoG'),
(61, 'tripadvisor', 'https://www.tripadvisor.com/Attraction_Review-g294202-d19767047-Reviews-Egypt_Travel_Square-Giza_Giza_Governorate.html'),
(62, 'home_hero_title', 'Experience the Magic of <span>Egypt</span>'),
(63, 'home_hero_subtitle', '<p>Your trusted partner for extraordinary Egyptian adventures. Custom itineraries, expert guides, and unforgettable memories.</p>'),
(64, 'home_hero_btn1_text', 'Explore Packages'),
(65, 'home_hero_btn1_link', 'packages.php'),
(66, 'home_hero_btn2_text', 'Find Day Tours'),
(67, 'home_hero_btn2_link', 'tours.php?type=day'),
(68, 'default_logo', '1789225715_logo.png'),
(69, 'phone', '+20 100 679 6511'),
(70, 'email', 'info@egypttravelsquare.com'),
(71, 'address', '12 Tahrir Street, Downtown, Cairo, Egypt'),
(72, 'facebook', 'https://www.facebook.com/share/196gByQFgj/?mibextid=wwXIfr'),
(73, 'instagram', 'https://www.instagram.com/abduo_egypt_guide?utm_source=qr'),
(74, 'youtube', 'http://www.youtube.com/@egypttravelsquare2264'),
(75, 'tiktok', 'https://www.tiktok.com/@abduo.abdelaziz.e?_r=1&_t=ZS-96uondgXyoG'),
(76, 'tripadvisor', 'https://www.tripadvisor.com/Attraction_Review-g294202-d19767047-Reviews-Egypt_Travel_Square-Giza_Giza_Governorate.html'),
(77, 'home_hero_title', 'Experience the Magic of <span>Egypt</span>'),
(78, 'home_hero_subtitle', '<p>Your trusted partner for extraordinary Egyptian adventures. Custom itineraries, expert guides, and unforgettable memories.</p>'),
(79, 'home_hero_btn1_text', 'Explore Packages'),
(80, 'home_hero_btn1_link', 'packages.php'),
(81, 'home_hero_btn2_text', 'Find Day Tours'),
(82, 'home_hero_btn2_link', 'tours.php?type=day'),
(83, 'default_logo', '1789225784_logo.png'),
(84, 'default_tour_img', '1789225784_default_tour.png'),
(85, 'phone', '+20 100 679 6511'),
(86, 'email', 'info@egypttravelsquare.com'),
(87, 'address', '12 Tahrir Street, Downtown, Cairo, Egypt'),
(88, 'facebook', 'https://www.facebook.com/share/196gByQFgj/?mibextid=wwXIfr'),
(89, 'instagram', 'https://www.instagram.com/abduo_egypt_guide?utm_source=qr'),
(90, 'youtube', 'http://www.youtube.com/@egypttravelsquare2264'),
(91, 'tiktok', 'https://www.tiktok.com/@abduo.abdelaziz.e?_r=1&_t=ZS-96uondgXyoG'),
(92, 'tripadvisor', 'https://www.tripadvisor.com/Attraction_Review-g294202-d19767047-Reviews-Egypt_Travel_Square-Giza_Giza_Governorate.html'),
(93, 'home_hero_title', 'Experience the Magic of <span>Egypt</span>'),
(94, 'home_hero_subtitle', '<p>Your trusted partner for extraordinary Egyptian adventures. Custom itineraries, expert guides, and unforgettable memories.</p>'),
(95, 'home_hero_btn1_text', 'Explore Packages'),
(96, 'home_hero_btn1_link', 'packages.php'),
(97, 'home_hero_btn2_text', 'Find Day Tours'),
(98, 'home_hero_btn2_link', 'tours.php?type=day'),
(99, 'default_logo', '1789225795_logo.png'),
(100, 'default_tour_img', '1789225795_default_tour.png'),
(101, 'phone', '+20 100 679 6511'),
(102, 'email', 'info@egypttravelsquare.com'),
(103, 'address', '12 Tahrir Street, Downtown, Cairo, Egypt'),
(104, 'facebook', 'https://www.facebook.com/share/196gByQFgj/?mibextid=wwXIfr'),
(105, 'instagram', 'https://www.instagram.com/abduo_egypt_guide?utm_source=qr'),
(106, 'youtube', 'http://www.youtube.com/@egypttravelsquare2264'),
(107, 'tiktok', 'https://www.tiktok.com/@abduo.abdelaziz.e?_r=1&_t=ZS-96uondgXyoG'),
(108, 'tripadvisor', 'https://www.tripadvisor.com/Attraction_Review-g294202-d19767047-Reviews-Egypt_Travel_Square-Giza_Giza_Governorate.html'),
(109, 'home_hero_title', 'Experience the Magic of <span>Egypt</span>'),
(110, 'home_hero_subtitle', '<p>Your trusted partner for extraordinary Egyptian adventures. Custom itineraries, expert guides, and unforgettable memories.</p>'),
(111, 'home_hero_btn1_text', 'Explore Packages'),
(112, 'home_hero_btn1_link', 'packages.php'),
(113, 'home_hero_btn2_text', 'Find Day Tours'),
(114, 'home_hero_btn2_link', 'tours.php?type=day'),
(115, 'default_logo', '1789225847_logo.png'),
(116, 'phone', '+20 100 679 6511'),
(117, 'email', 'info@egypttravelsquare.com'),
(118, 'address', '12 Tahrir Street, Downtown, Cairo, Egypt'),
(119, 'facebook', 'https://www.facebook.com/share/196gByQFgj/?mibextid=wwXIfr'),
(120, 'instagram', 'https://www.instagram.com/abduo_egypt_guide?utm_source=qr'),
(121, 'youtube', 'http://www.youtube.com/@egypttravelsquare2264'),
(122, 'tiktok', 'https://www.tiktok.com/@abduo.abdelaziz.e?_r=1&_t=ZS-96uondgXyoG'),
(123, 'tripadvisor', 'https://www.tripadvisor.com/Attraction_Review-g294202-d19767047-Reviews-Egypt_Travel_Square-Giza_Giza_Governorate.html'),
(124, 'home_hero_title', 'Experience the Magic of <span>Egypt</span>'),
(125, 'home_hero_subtitle', '<p>Your trusted partner for extraordinary Egyptian adventures. Custom itineraries, expert guides, and unforgettable memories.</p>'),
(126, 'home_hero_btn1_text', 'Explore Packages'),
(127, 'home_hero_btn1_link', 'packages.php'),
(128, 'home_hero_btn2_text', 'Find Day Tours'),
(129, 'home_hero_btn2_link', 'tours.php?type=day'),
(130, 'default_logo', '1789227367_logo.png'),
(131, 'phone', '+20 100 679 6511'),
(132, 'email', 'info@egypttravelsquare.com'),
(133, 'address', '12 Tahrir Street, Downtown, Cairo, Egypt'),
(134, 'facebook', 'https://www.facebook.com/share/196gByQFgj/?mibextid=wwXIfr'),
(135, 'instagram', 'https://www.instagram.com/abduo_egypt_guide?utm_source=qr'),
(136, 'youtube', 'http://www.youtube.com/@egypttravelsquare2264'),
(137, 'tiktok', 'https://www.tiktok.com/@abduo.abdelaziz.e?_r=1&_t=ZS-96uondgXyoG'),
(138, 'tripadvisor', 'https://www.tripadvisor.com/Attraction_Review-g294202-d19767047-Reviews-Egypt_Travel_Square-Giza_Giza_Governorate.html'),
(139, 'home_hero_title', 'Experience the Magic of <span>Egypt</span>'),
(140, 'home_hero_subtitle', '<p>Your trusted partner for extraordinary Egyptian adventures. Custom itineraries, expert guides, and unforgettable memories.</p>'),
(141, 'home_hero_btn1_text', 'Explore Packages'),
(142, 'home_hero_btn1_link', 'packages.php'),
(143, 'home_hero_btn2_text', 'Find Day Tours'),
(144, 'home_hero_btn2_link', 'tours.php?type=day'),
(145, 'home_hero_bg', '1789227742_hero_bg.jpg'),
(146, 'hero_about', 'https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=2000&auto=format&fit=crop'),
(147, 'hero_contact', 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2000&auto=format&fit=crop'),
(148, 'hero_gallery', '1789230686_hero_gallery.jpg'),
(149, 'hero_videos', 'https://images.unsplash.com/photo-1572252009286-268acec5ca0a?q=80&w=2000&auto=format&fit=crop'),
(150, 'hero_faq', 'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?q=80&w=2000&auto=format&fit=crop'),
(151, 'hero_transfers', 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=2000&auto=format&fit=crop'),
(152, 'hero_shore', 'https://images.unsplash.com/photo-1599839619722-39751411ea63?q=80&w=2000&auto=format&fit=crop'),
(153, 'hero_policies', 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=2000&auto=format&fit=crop'),
(154, 'hero_tours', 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?q=80&w=2000&auto=format&fit=crop'),
(155, 'hero_packages', '1789230686_hero_packages.jpg'),
(156, 'hero_about', 'https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=2000&auto=format&fit=crop'),
(157, 'hero_contact', 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2000&auto=format&fit=crop'),
(158, 'hero_gallery', '1789230686_hero_gallery.jpg'),
(159, 'hero_videos', 'https://images.unsplash.com/photo-1572252009286-268acec5ca0a?q=80&w=2000&auto=format&fit=crop'),
(160, 'hero_faq', 'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?q=80&w=2000&auto=format&fit=crop'),
(161, 'hero_transfers', 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=2000&auto=format&fit=crop'),
(162, 'hero_shore', 'https://images.unsplash.com/photo-1599839619722-39751411ea63?q=80&w=2000&auto=format&fit=crop'),
(163, 'hero_policies', 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=2000&auto=format&fit=crop'),
(164, 'hero_tours', 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?q=80&w=2000&auto=format&fit=crop'),
(165, 'hero_packages', '1789230686_hero_packages.jpg'),
(166, 'hero_about', 'https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=2000&auto=format&fit=crop'),
(167, 'hero_contact', 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2000&auto=format&fit=crop'),
(168, 'hero_gallery', '1789230686_hero_gallery.jpg'),
(169, 'hero_videos', 'https://images.unsplash.com/photo-1572252009286-268acec5ca0a?q=80&w=2000&auto=format&fit=crop'),
(170, 'hero_faq', 'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?q=80&w=2000&auto=format&fit=crop'),
(171, 'hero_transfers', 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=2000&auto=format&fit=crop'),
(172, 'hero_shore', 'https://images.unsplash.com/photo-1599839619722-39751411ea63?q=80&w=2000&auto=format&fit=crop'),
(173, 'hero_policies', 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=2000&auto=format&fit=crop'),
(174, 'hero_tours', 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?q=80&w=2000&auto=format&fit=crop'),
(175, 'hero_packages', '1789230686_hero_packages.jpg'),
(176, 'hero_about', 'https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=2000&auto=format&fit=crop'),
(177, 'hero_contact', 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2000&auto=format&fit=crop'),
(178, 'hero_gallery', '1789230686_hero_gallery.jpg'),
(179, 'hero_videos', 'https://images.unsplash.com/photo-1572252009286-268acec5ca0a?q=80&w=2000&auto=format&fit=crop'),
(180, 'hero_faq', 'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?q=80&w=2000&auto=format&fit=crop'),
(181, 'hero_transfers', 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=2000&auto=format&fit=crop'),
(182, 'hero_shore', 'https://images.unsplash.com/photo-1599839619722-39751411ea63?q=80&w=2000&auto=format&fit=crop'),
(183, 'hero_policies', 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=2000&auto=format&fit=crop'),
(184, 'hero_tours', 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?q=80&w=2000&auto=format&fit=crop'),
(185, 'hero_packages', '1789230686_hero_packages.jpg'),
(186, 'hero_about', 'https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=2000&auto=format&fit=crop'),
(187, 'hero_contact', 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2000&auto=format&fit=crop'),
(188, 'hero_gallery', '1789230686_hero_gallery.jpg'),
(189, 'hero_videos', 'https://images.unsplash.com/photo-1572252009286-268acec5ca0a?q=80&w=2000&auto=format&fit=crop'),
(190, 'hero_faq', 'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?q=80&w=2000&auto=format&fit=crop'),
(191, 'hero_transfers', 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=2000&auto=format&fit=crop'),
(192, 'hero_shore', 'https://images.unsplash.com/photo-1599839619722-39751411ea63?q=80&w=2000&auto=format&fit=crop'),
(193, 'hero_policies', 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=2000&auto=format&fit=crop'),
(194, 'hero_tours', 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?q=80&w=2000&auto=format&fit=crop'),
(195, 'hero_packages', '1789230686_hero_packages.jpg'),
(196, 'hero_about', 'https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=2000&auto=format&fit=crop'),
(197, 'hero_contact', 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2000&auto=format&fit=crop'),
(198, 'hero_gallery', '1789230686_hero_gallery.jpg'),
(199, 'hero_videos', 'https://images.unsplash.com/photo-1572252009286-268acec5ca0a?q=80&w=2000&auto=format&fit=crop'),
(200, 'hero_faq', 'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?q=80&w=2000&auto=format&fit=crop'),
(201, 'hero_transfers', 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=2000&auto=format&fit=crop'),
(202, 'hero_shore', 'https://images.unsplash.com/photo-1599839619722-39751411ea63?q=80&w=2000&auto=format&fit=crop'),
(203, 'hero_policies', 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=2000&auto=format&fit=crop'),
(204, 'hero_tours', 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?q=80&w=2000&auto=format&fit=crop'),
(205, 'hero_packages', '1789230686_hero_packages.jpg'),
(206, 'hero_about', 'https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=2000&auto=format&fit=crop'),
(207, 'hero_contact', 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2000&auto=format&fit=crop'),
(208, 'hero_gallery', '1789230686_hero_gallery.jpg'),
(209, 'hero_videos', 'https://images.unsplash.com/photo-1572252009286-268acec5ca0a?q=80&w=2000&auto=format&fit=crop'),
(210, 'hero_faq', 'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?q=80&w=2000&auto=format&fit=crop'),
(211, 'hero_transfers', 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=2000&auto=format&fit=crop'),
(212, 'hero_shore', 'https://images.unsplash.com/photo-1599839619722-39751411ea63?q=80&w=2000&auto=format&fit=crop'),
(213, 'hero_policies', 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=2000&auto=format&fit=crop'),
(214, 'hero_tours', 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?q=80&w=2000&auto=format&fit=crop'),
(215, 'hero_packages', '1789230686_hero_packages.jpg'),
(216, 'hero_about', 'https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=2000&auto=format&fit=crop'),
(217, 'hero_contact', 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2000&auto=format&fit=crop'),
(218, 'hero_gallery', '1789230686_hero_gallery.jpg'),
(219, 'hero_videos', 'https://images.unsplash.com/photo-1572252009286-268acec5ca0a?q=80&w=2000&auto=format&fit=crop'),
(220, 'hero_faq', 'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?q=80&w=2000&auto=format&fit=crop'),
(221, 'hero_transfers', 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=2000&auto=format&fit=crop'),
(222, 'hero_shore', 'https://images.unsplash.com/photo-1599839619722-39751411ea63?q=80&w=2000&auto=format&fit=crop'),
(223, 'hero_policies', 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=2000&auto=format&fit=crop'),
(224, 'hero_tours', 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?q=80&w=2000&auto=format&fit=crop'),
(225, 'hero_packages', '1789230686_hero_packages.jpg'),
(226, 'hero_about', 'https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=2000&auto=format&fit=crop'),
(227, 'hero_contact', 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2000&auto=format&fit=crop'),
(228, 'hero_gallery', '1789230686_hero_gallery.jpg'),
(229, 'hero_videos', 'https://images.unsplash.com/photo-1572252009286-268acec5ca0a?q=80&w=2000&auto=format&fit=crop'),
(230, 'hero_faq', 'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?q=80&w=2000&auto=format&fit=crop'),
(231, 'hero_transfers', 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=2000&auto=format&fit=crop'),
(232, 'hero_shore', 'https://images.unsplash.com/photo-1599839619722-39751411ea63?q=80&w=2000&auto=format&fit=crop'),
(233, 'hero_policies', 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=2000&auto=format&fit=crop'),
(234, 'hero_tours', 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?q=80&w=2000&auto=format&fit=crop'),
(235, 'hero_packages', '1789230686_hero_packages.jpg'),
(236, 'hero_about', 'https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=2000&auto=format&fit=crop'),
(237, 'hero_contact', 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2000&auto=format&fit=crop'),
(238, 'hero_gallery', '1789230686_hero_gallery.jpg'),
(239, 'hero_videos', 'https://images.unsplash.com/photo-1572252009286-268acec5ca0a?q=80&w=2000&auto=format&fit=crop'),
(240, 'hero_faq', 'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?q=80&w=2000&auto=format&fit=crop'),
(241, 'hero_transfers', 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=2000&auto=format&fit=crop'),
(242, 'hero_shore', 'https://images.unsplash.com/photo-1599839619722-39751411ea63?q=80&w=2000&auto=format&fit=crop'),
(243, 'hero_policies', 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=2000&auto=format&fit=crop'),
(244, 'hero_tours', 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?q=80&w=2000&auto=format&fit=crop'),
(245, 'hero_packages', '1789230686_hero_packages.jpg'),
(246, 'hero_about', 'https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=2000&auto=format&fit=crop'),
(247, 'hero_contact', 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2000&auto=format&fit=crop'),
(248, 'hero_gallery', '1789230686_hero_gallery.jpg'),
(249, 'hero_videos', 'https://images.unsplash.com/photo-1572252009286-268acec5ca0a?q=80&w=2000&auto=format&fit=crop'),
(250, 'hero_faq', 'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?q=80&w=2000&auto=format&fit=crop'),
(251, 'hero_transfers', 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=2000&auto=format&fit=crop'),
(252, 'hero_shore', 'https://images.unsplash.com/photo-1599839619722-39751411ea63?q=80&w=2000&auto=format&fit=crop'),
(253, 'hero_policies', 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=2000&auto=format&fit=crop'),
(254, 'hero_tours', 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?q=80&w=2000&auto=format&fit=crop'),
(255, 'hero_packages', '1789230686_hero_packages.jpg'),
(256, 'hero_about', 'https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=2000&auto=format&fit=crop'),
(257, 'hero_contact', 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2000&auto=format&fit=crop'),
(258, 'hero_gallery', '1789230686_hero_gallery.jpg'),
(259, 'hero_videos', 'https://images.unsplash.com/photo-1572252009286-268acec5ca0a?q=80&w=2000&auto=format&fit=crop'),
(260, 'hero_faq', 'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?q=80&w=2000&auto=format&fit=crop'),
(261, 'hero_transfers', 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=2000&auto=format&fit=crop'),
(262, 'hero_shore', 'https://images.unsplash.com/photo-1599839619722-39751411ea63?q=80&w=2000&auto=format&fit=crop'),
(263, 'hero_policies', 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=2000&auto=format&fit=crop'),
(264, 'hero_tours', 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?q=80&w=2000&auto=format&fit=crop'),
(265, 'hero_packages', '1789230686_hero_packages.jpg'),
(266, 'hero_about', 'https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=2000&auto=format&fit=crop'),
(267, 'hero_contact', 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2000&auto=format&fit=crop'),
(268, 'hero_gallery', '1789230686_hero_gallery.jpg'),
(269, 'hero_videos', 'https://images.unsplash.com/photo-1572252009286-268acec5ca0a?q=80&w=2000&auto=format&fit=crop'),
(270, 'hero_faq', 'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?q=80&w=2000&auto=format&fit=crop'),
(271, 'hero_transfers', 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=2000&auto=format&fit=crop'),
(272, 'hero_shore', 'https://images.unsplash.com/photo-1599839619722-39751411ea63?q=80&w=2000&auto=format&fit=crop'),
(273, 'hero_policies', 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=2000&auto=format&fit=crop'),
(274, 'hero_tours', 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?q=80&w=2000&auto=format&fit=crop'),
(275, 'hero_packages', '1789230686_hero_packages.jpg'),
(276, 'hero_about', 'https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=2000&auto=format&fit=crop'),
(277, 'hero_contact', 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2000&auto=format&fit=crop'),
(278, 'hero_gallery', '1789230686_hero_gallery.jpg'),
(279, 'hero_videos', 'https://images.unsplash.com/photo-1572252009286-268acec5ca0a?q=80&w=2000&auto=format&fit=crop'),
(280, 'hero_faq', 'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?q=80&w=2000&auto=format&fit=crop'),
(281, 'hero_transfers', 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=2000&auto=format&fit=crop'),
(282, 'hero_shore', 'https://images.unsplash.com/photo-1599839619722-39751411ea63?q=80&w=2000&auto=format&fit=crop'),
(283, 'hero_policies', 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=2000&auto=format&fit=crop'),
(284, 'hero_tours', 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?q=80&w=2000&auto=format&fit=crop'),
(285, 'hero_packages', '1789230686_hero_packages.jpg'),
(286, 'hero_about', 'https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=2000&auto=format&fit=crop'),
(287, 'hero_contact', 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2000&auto=format&fit=crop'),
(288, 'hero_gallery', '1789230686_hero_gallery.jpg'),
(289, 'hero_videos', 'https://images.unsplash.com/photo-1572252009286-268acec5ca0a?q=80&w=2000&auto=format&fit=crop'),
(290, 'hero_faq', 'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?q=80&w=2000&auto=format&fit=crop'),
(291, 'hero_transfers', 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=2000&auto=format&fit=crop'),
(292, 'hero_shore', 'https://images.unsplash.com/photo-1599839619722-39751411ea63?q=80&w=2000&auto=format&fit=crop'),
(293, 'hero_policies', 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=2000&auto=format&fit=crop'),
(294, 'hero_tours', 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?q=80&w=2000&auto=format&fit=crop'),
(295, 'hero_packages', '1789230686_hero_packages.jpg'),
(296, 'hero_about', 'https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=2000&auto=format&fit=crop'),
(297, 'hero_contact', 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2000&auto=format&fit=crop'),
(298, 'hero_gallery', '1789230686_hero_gallery.jpg'),
(299, 'hero_videos', 'https://images.unsplash.com/photo-1572252009286-268acec5ca0a?q=80&w=2000&auto=format&fit=crop'),
(300, 'hero_faq', 'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?q=80&w=2000&auto=format&fit=crop'),
(301, 'hero_transfers', 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=2000&auto=format&fit=crop'),
(302, 'hero_shore', 'https://images.unsplash.com/photo-1599839619722-39751411ea63?q=80&w=2000&auto=format&fit=crop'),
(303, 'hero_policies', 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=2000&auto=format&fit=crop'),
(304, 'hero_tours', 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?q=80&w=2000&auto=format&fit=crop'),
(305, 'hero_packages', '1789230686_hero_packages.jpg'),
(306, 'hero_about', 'https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=2000&auto=format&fit=crop'),
(307, 'hero_contact', 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2000&auto=format&fit=crop'),
(308, 'hero_gallery', '1789230686_hero_gallery.jpg'),
(309, 'hero_videos', 'https://images.unsplash.com/photo-1572252009286-268acec5ca0a?q=80&w=2000&auto=format&fit=crop'),
(310, 'hero_faq', 'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?q=80&w=2000&auto=format&fit=crop'),
(311, 'hero_transfers', 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=2000&auto=format&fit=crop'),
(312, 'hero_shore', 'https://images.unsplash.com/photo-1599839619722-39751411ea63?q=80&w=2000&auto=format&fit=crop'),
(313, 'hero_policies', 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=2000&auto=format&fit=crop'),
(314, 'hero_tours', 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?q=80&w=2000&auto=format&fit=crop'),
(315, 'hero_packages', '1789230686_hero_packages.jpg'),
(316, 'hero_about', 'https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=2000&auto=format&fit=crop'),
(317, 'hero_contact', 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2000&auto=format&fit=crop'),
(318, 'hero_gallery', '1789230686_hero_gallery.jpg'),
(319, 'hero_videos', 'https://images.unsplash.com/photo-1572252009286-268acec5ca0a?q=80&w=2000&auto=format&fit=crop'),
(320, 'hero_faq', 'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?q=80&w=2000&auto=format&fit=crop'),
(321, 'hero_transfers', 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=2000&auto=format&fit=crop'),
(322, 'hero_shore', 'https://images.unsplash.com/photo-1599839619722-39751411ea63?q=80&w=2000&auto=format&fit=crop'),
(323, 'hero_policies', 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=2000&auto=format&fit=crop'),
(324, 'hero_tours', 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?q=80&w=2000&auto=format&fit=crop'),
(325, 'hero_packages', '1789230686_hero_packages.jpg'),
(326, 'hero_about', 'https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=2000&auto=format&fit=crop'),
(327, 'hero_contact', 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2000&auto=format&fit=crop'),
(328, 'hero_gallery', '1789230686_hero_gallery.jpg'),
(329, 'hero_videos', 'https://images.unsplash.com/photo-1572252009286-268acec5ca0a?q=80&w=2000&auto=format&fit=crop'),
(330, 'hero_faq', 'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?q=80&w=2000&auto=format&fit=crop'),
(331, 'hero_transfers', 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=2000&auto=format&fit=crop'),
(332, 'hero_shore', 'https://images.unsplash.com/photo-1599839619722-39751411ea63?q=80&w=2000&auto=format&fit=crop'),
(333, 'hero_policies', 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=2000&auto=format&fit=crop'),
(334, 'hero_tours', 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?q=80&w=2000&auto=format&fit=crop'),
(335, 'hero_packages', '1789230686_hero_packages.jpg'),
(336, 'hero_about', 'https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=2000&auto=format&fit=crop'),
(337, 'hero_contact', 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2000&auto=format&fit=crop'),
(338, 'hero_gallery', '1789230686_hero_gallery.jpg'),
(339, 'hero_videos', 'https://images.unsplash.com/photo-1572252009286-268acec5ca0a?q=80&w=2000&auto=format&fit=crop'),
(340, 'hero_faq', 'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?q=80&w=2000&auto=format&fit=crop'),
(341, 'hero_transfers', 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=2000&auto=format&fit=crop'),
(342, 'hero_shore', 'https://images.unsplash.com/photo-1599839619722-39751411ea63?q=80&w=2000&auto=format&fit=crop'),
(343, 'hero_policies', 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=2000&auto=format&fit=crop'),
(344, 'hero_tours', 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?q=80&w=2000&auto=format&fit=crop'),
(345, 'hero_packages', '1789230686_hero_packages.jpg'),
(346, 'hero_about', 'https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=2000&auto=format&fit=crop'),
(347, 'hero_contact', 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2000&auto=format&fit=crop'),
(348, 'hero_gallery', '1789230686_hero_gallery.jpg'),
(349, 'hero_videos', 'https://images.unsplash.com/photo-1572252009286-268acec5ca0a?q=80&w=2000&auto=format&fit=crop'),
(350, 'hero_faq', 'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?q=80&w=2000&auto=format&fit=crop'),
(351, 'hero_transfers', 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=2000&auto=format&fit=crop'),
(352, 'hero_shore', 'https://images.unsplash.com/photo-1599839619722-39751411ea63?q=80&w=2000&auto=format&fit=crop'),
(353, 'hero_policies', 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=2000&auto=format&fit=crop'),
(354, 'hero_tours', 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?q=80&w=2000&auto=format&fit=crop'),
(355, 'hero_packages', '1789230686_hero_packages.jpg'),
(356, 'hero_about', 'https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=2000&auto=format&fit=crop'),
(357, 'hero_contact', 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2000&auto=format&fit=crop'),
(358, 'hero_gallery', '1789230686_hero_gallery.jpg'),
(359, 'hero_videos', 'https://images.unsplash.com/photo-1572252009286-268acec5ca0a?q=80&w=2000&auto=format&fit=crop'),
(360, 'hero_faq', 'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?q=80&w=2000&auto=format&fit=crop'),
(361, 'hero_transfers', 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=2000&auto=format&fit=crop'),
(362, 'hero_shore', 'https://images.unsplash.com/photo-1599839619722-39751411ea63?q=80&w=2000&auto=format&fit=crop'),
(363, 'hero_policies', 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=2000&auto=format&fit=crop'),
(364, 'hero_tours', 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?q=80&w=2000&auto=format&fit=crop'),
(365, 'hero_packages', '1789230686_hero_packages.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `hero_image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `price_single` decimal(10,2) NOT NULL,
  `price_group_small` decimal(10,2) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `timing` varchar(100) NOT NULL,
  `languages` varchar(255) NOT NULL,
  `availability` varchar(255) NOT NULL,
  `overview` text NOT NULL,
  `excludes_html` text NOT NULL,
  `brings_html` text NOT NULL,
  `itinerary` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `type`, `title`, `location`, `hero_image`, `price`, `price_single`, `price_group_small`, `duration`, `timing`, `languages`, `availability`, `overview`, `excludes_html`, `brings_html`, `itinerary`) VALUES
(1, 'day', 'Day tour to Giza Pyramids, Egyptian Museum and Bazaar from Sharm El Sheik by plane', 'Sharm / Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2019/11/WhatsApp-Image-2019-10-09-at-6.28.43-PM-1.jpeg', 315.00, 390.00, 325.00, '14 Hours', '06:00 AM to 08:00 PM', 'English, Spanish, German, French, Arabic, Italian', 'Runs on a daily basis', '<p>Private Tour includes Domestic flight from and to sharm el shiekh, all Pick up & drop off transfers, expert tour guide, All Taxes Services.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Entrance fees</li><li><i class=\"fa-solid fa-xmark\"></i> Personal expenses</li>', '<li><i class=\"fa-solid fa-check\"></i> Passport for Flight</li><li><i class=\"fa-solid fa-check\"></i> Comfortable shoes</li>', '<p>Egypt travel square Egyptologist tour guide will meet you with a sign with your name at Cairo Airport after that pick you up for visiting Giza Pyramids and the Great Sphinx...</p>'),
(2, 'half', 'Short Felucca Ride on the Nile River', 'Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/cairo72016.jpg', 30.00, 35.00, 30.00, '2 Hours', '04:00 PM to 06:00 PM', 'English, Spanish, German, French, Arabic, Italian', 'Runs on a daily basis', '<p>Unforgettable tour for 2 hours Felucca Ride starts every day upon request. Soak in the beautiful city lights of Cairo aboard a felucca.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Meals and Drinks</li>', '<li><i class=\"fa-solid fa-check\"></i> Sunglasses & Sunblock</li>', '<p>Representative will pick you up from your hotel and transfer you to downtown Cairo where there are two best spots for Riding a boat...</p>'),
(3, 'half', 'Submarine Trip in Sharm El Sheikh', 'Sharm El Sheikh', 'https://egypttravelsquare.com/3abar-data/uploads/2018/09/cat_sharm.jpg', 60.00, 65.00, 60.00, '3 Hours', '10:00 AM to 01:00 PM', 'English, Spanish, German, French, Arabic, Italian', 'Runs on a daily basis', '<p>Join the Funniest excursions under navies! Semi- Submarine allows you to sit below the sea surface and view the Fish.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Personal expenses</li>', '<li><i class=\"fa-solid fa-check\"></i> Camera</li>', '<p>Pickup from your hotel as per the chosen time, then drive to the Sea Dock. Join the boat and enjoy panoramic windows under the sea...</p>'),
(4, 'day', 'Snorkeling trip in Tiran Island by Boat in Sharm El Sheikh', 'Tiran Island', 'https://egypttravelsquare.com/3abar-data/uploads/2019/11/WhatsApp-Image-2019-10-11-at-8.14.05-PM-1.jpeg', 40.00, 45.00, 45.00, '8 Hours', '08:00 AM to 04:00 PM', 'English, Spanish, German, French', 'Runs on a daily basis', '<p>Snorkeling Trip 8 Hours Runs Every Day. Private Trip includes Lunch, Soft Drinks on the boat and Tour Leader.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Snorkeling equipment</li>', '<li><i class=\"fa-solid fa-check\"></i> Towels & Sunscreen</li>', '<p>There will be 3 stops, as we visit the best three areas for those who love jumping to enjoy the coral reefs.</p>'),
(5, 'half', 'Unbelievable Cairo tour visiting a real Egyptian village by TukTuk', 'Cairo / Giza', 'https://egypttravelsquare.com/3abar-data/uploads/2018/09/cat_cairo.jpg', 40.00, 55.00, 45.00, '4 Hours', 'Flexible (08:00 AM - 11:00 PM)', 'English, Spanish, German, French', 'Runs on a daily basis', '<p>Unforgettable tour visiting a real Egyptian village by TukTuk ride to see the real life of local Egyptians.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Personal Items</li>', '<li><i class=\"fa-solid fa-check\"></i> Camera</li>', '<p>Get on the TukTuk ride and Enjoy your free Trip that helps you to see real life of Egyptians People and discover Their Life Style...</p>'),
(6, 'day', 'Day trip to St Catherine from Sharm-El-sheikh', 'Sinai Peninsula', 'https://egypttravelsquare.com/3abar-data/uploads/2019/11/StCatherine_thmb.jpg', 85.00, 150.00, 95.00, '10 Hours', '07:00 AM to 05:00 PM', 'English, Spanish, German, French', 'Daily (Except Sunday)', '<p>Visit the St. Catherine Monastery, located 220 km northwest of Sharm el Sheikh, the oldest monastery of Christianity.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Optional Tours</li>', '<li><i class=\"fa-solid fa-check\"></i> Comfortable shoes</li>', '<p>Drive for roughly 2.5 hours. You will be transferred to St-Catherine to visit the Orthodox Greek monastery and its library of ancient manuscripts...</p>'),
(7, 'half', 'Sound and Light Show at Giza Pyramids', 'Giza Pyramids', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/sound-and-light-show-at-giza-pyramids.jpg', 55.00, 70.00, 55.00, '2 Hours', '06:00 PM', 'English, Spanish, German, French', 'Runs on a daily basis', '<p>Attend the laser show that starts every day from 19:00 pm. It is a marvelous show that brings creatively to life the rule of ancient Egyptians.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Meals and Drinks</li>', '<li><i class=\"fa-solid fa-check\"></i> Camera</li>', '<p>The history is narrated by the Sphinx, telling you the most ancient secrets of the world...</p>'),
(8, 'half', 'Sound and Light show at Karnak Temple in Luxor', 'Luxor', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/karnak-sound-light-show2.jpg', 45.00, 65.00, 55.00, '2 Hours', '07:00 PM to 09:00 PM', 'English, Spanish, German, French', 'Runs on a daily basis', '<p>Karnak Sound and Light Show highlight the dramatic history of ancient Thebes narrating the achievements of great Pharaohs.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Tipping</li>', '<li><i class=\"fa-solid fa-check\"></i> Camera</li>', '<p>As visitors walk through the complex of temples, pharaohs arise to tell the story of their interesting lives...</p>'),
(9, 'day', 'Wadi El Natrun Day tour from Alexandria', 'Alexandria', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Wadi-El-Natrun-Day-tour.jpg', 55.00, 95.00, 65.00, '8 Hours', '08:00 AM to 04:00 PM', 'English, Spanish, German, French', 'Runs on a daily basis', '<p>Wadi El Natrun desert area, the actual birth place for Christian monasticism. Visit the 4 surviving Monasteries.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Entrance Fees</li>', '<li><i class=\"fa-solid fa-check\"></i> Comfortable shoes</li>', '<p>Begin your trip with Deir al-Baramus, proceed to Deir Anba Bishoi, Deir Abu Maqar, and Deir El-Suryani...</p>'),
(10, 'half', 'Tanoura Egyptian Heritage Dance Show', 'Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/tour-to-wekalet-el-ghoury-for-tanoura-egyptian-heritage-dance-show2.jpg', 45.00, 65.00, 50.00, '4 Hours', '05:30 PM to 09:30 PM', 'English, Spanish', 'Saturday, Monday, Wednesday', '<p>Attend the Tanoura Show at Wekalet El Ghoury which is an architecturally stunning arts center in the El Azhar area.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Meals</li>', '<li><i class=\"fa-solid fa-check\"></i> Camera</li>', '<p>Watch performers with array of musical instruments, followed by the Sufi tanoura dance, derived from the moves of whirling dervishes...</p>'),
(11, 'half', 'Traditional Food Tour to Eat Mouthwatering Local Dishes', 'Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/article_original_9288_20151118_564c8dffa32ea-544x323-1.jpg', 40.00, 55.00, 45.00, '4 Hours', 'Flexible 9:00 AM to 11:00 PM', 'English, Spanish', 'Runs on a daily basis', '<p>Discover Egypt’s age-old recipes which date back 5000 years. We will take you to places only locals visit.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Tipping</li>', '<li><i class=\"fa-solid fa-check\"></i> Empty Stomach!</li>', '<p>Our professional tour Guide will help you to organize special food tours for you to eat at the best local spots...</p>'),
(12, 'day', 'Cairo Stopover Tour: Giza Pyramids, Museum & Old Cairo', 'Cairo Airport', 'https://egypttravelsquare.com/3abar-data/uploads/2019/11/WhatsApp-Image-2019-10-11-at-8.14.07-PM.jpeg', 60.00, 90.00, 70.00, 'Flexible Full-Day', 'Upon Arrival', 'English, Spanish, German, French', 'Runs daily', '<p>Enjoy the ultimate transit experience. Designed for travelers with a longer layover starting immediately upon your arrival.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Entrance fees</li>', '<li><i class=\"fa-solid fa-check\"></i> Passport</li>', '<p>Pick up from Airport, visit Pyramids, Sphinx, Old Coptic Cairo, Egyptian Museum, and drop off back at the Airport.</p>'),
(13, 'half', 'Luxor Half Day Tour to West Bank of Luxor', 'Luxor', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/temple-of-hatshupsut_COVER.jpg', 40.00, 65.00, 45.00, '6 Hours', '08:00 AM', 'English, Spanish, German, French', 'Runs on a daily basis', '<p>Visit the Valley Of The Kings, the Temple of Queen Hatshepsut, and The Colossi of Memnon.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Entrance fees</li>', '<li><i class=\"fa-solid fa-check\"></i> Sunglasses</li>', '<p>Transferred by Private A/C Vehicle to the West Bank. Visit the grand tombs, Hatshepsut temple, and Memnon statues...</p>'),
(14, 'shore', 'Shore 2 Days 1 Night tours to Cairo from Port Said or Alexandria', 'Port Said / Alexandria', 'https://media-cdn.tripadvisor.com/media/attractions-splice-spp-674x446/15/82/91/de.jpg', 300.00, 450.00, 350.00, '2 Days 1 Night', 'Upon Ship Arrival', 'English, Spanish, German', 'Upon Request', '<p>Overnight trip to Cairo from Alexandria Port or Port Said. Visit Giza Pyramids, Sphinx, Egyptian Museum.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Personal Expenses</li>', '<li><i class=\"fa-solid fa-check\"></i> Passport</li>', '<p>Day 1: Pyramids & Museum. Day 2: Old Cairo & Return to Port.</p>'),
(15, 'package', 'Egypt 9 Days 8 Nights Package', 'Cairo / Luxor / Aswan / Sharm', 'https://egypttravelsquare.com/3abar-data/uploads/2018/09/egypt-tours-sharm-el-sheikh-excursion-day-tours.jpg', 1130.00, 1500.00, 1200.00, '9 Days 8 Nights', 'Morning Arrivals', 'English, Spanish', 'All Year Round', '<p>The ultimate Egypt experience covering all major historical sites and the beautiful Red Sea.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> International Flights</li>', '<li><i class=\"fa-solid fa-check\"></i> Travel Insurance</li>', '<p>Full comprehensive 9 days itinerary across Egypt...</p>'),
(16, 'package', 'Egypt Package 8 DAYS 7 NIGHTS CAIRO, NILE CRUISE, ABU SIMBEL', 'Cairo / Nile Cruise', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/egypt-aswan-day-trip-abu-simbel.jpg', 1230.00, 1600.00, 1300.00, '8 Days 7 Nights', 'Morning Arrivals', 'English, Spanish, French', 'All Year Round', '<p>Explore Cairo and sail the Nile River on a 5-Star Cruise from Aswan to Luxor including Abu Simbel.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> International Flights</li>', '<li><i class=\"fa-solid fa-check\"></i> Comfortable Clothes</li>', '<p>Cairo sightseeing, fly to Aswan, board Nile Cruise, Abu Simbel, Edfu, Kom Ombo, Luxor...</p>'),
(17, 'package', 'Egypt 7 Days 6 Nights tours Cairo & Sharm El Shiekh', 'Cairo / Sharm El Sheikh', 'https://egypttravelsquare.com/3abar-data/uploads/2020/01/sharm_elshikh3.jpg', 985.00, 1200.00, 1050.00, '7 Days 6 Nights', 'Upon Arrival', 'English, Spanish', 'All Year Round', '<p>Perfect mix of History and Relaxation. 3 Nights in Cairo and 3 Nights in Sharm El Sheikh.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Entry Visa</li>', '<li><i class=\"fa-solid fa-check\"></i> Swimwear</li>', '<p>Cairo Pyramids, Museum, then fly to Sharm for snorkeling and desert safari...</p>'),
(18, 'package', 'Egypt adventure 6 Days 5 Nights Cairo & White desert', 'Cairo / White Desert', 'https://egypttravelsquare.com/3abar-data/uploads/2020/01/20210322_182627.jpg', 650.00, 850.00, 700.00, '6 Days 5 Nights', 'Upon Arrival', 'English, German', 'All Year Round', '<p>Discover the magic of the Black and White Deserts with camping under the stars, plus Cairo highlights.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Sleeping Bags (Provided by us but bring personal items)</li>', '<li><i class=\"fa-solid fa-check\"></i> Heavy Jacket for night</li>', '<p>Cairo Tours, drive to Bahariya Oasis, 4x4 Safari in White Desert, Camping, Return to Cairo...</p>'),
(19, 'package', 'Egypt Highlight 4 Days 3 Nights Tour to Cairo, Luxor & ASWAN', 'Cairo / Luxor / Aswan', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Nile-Cruise-from-Aswan.jpg', 750.00, 950.00, 800.00, '4 Days 3 Nights', 'Upon Arrival', 'English, Spanish', 'All Year Round', '<p>A quick but comprehensive tour covering the very best of ancient Egypt.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> International Flights</li>', '<li><i class=\"fa-solid fa-check\"></i> Camera</li>', '<p>Day 1: Cairo. Day 2: Fly to Aswan. Day 3: Luxor. Day 4: Departure.</p>'),
(20, 'package', 'Egypt Highlight 3 Days 2 Nights Cairo & Luxor', 'Cairo / Luxor', 'https://egypttravelsquare.com/3abar-data/uploads/2019/11/WhatsApp-Image-2019-10-11-at-8.14.05-PM-1.jpeg', 530.00, 680.00, 550.00, '3 Days 2 Nights', 'Upon Arrival', 'English, Spanish', 'All Year Round', '<p>Short getaway to see the Pyramids and the incredible Valley of the Kings.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Meals not specified</li>', '<li><i class=\"fa-solid fa-check\"></i> Passport</li>', '<p>Day 1: Pyramids. Day 2: Fly to Luxor, West Bank. Day 3: East Bank, Fly back.</p>'),
(21, 'package', 'Egypt Highlights 3 Days 2 Nights Cairo & Alexandria', 'Cairo / Alexandria', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/alexandria_shore_excursion.jpg', 340.00, 450.00, 360.00, '3 Days 2 Nights', 'Upon Arrival', 'English, Spanish', 'All Year Round', '<p>Explore the Pharaohs in Cairo and the Greco-Roman history in Alexandria.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Tipping</li>', '<li><i class=\"fa-solid fa-check\"></i> Sunglasses</li>', '<p>Day 1: Cairo Highlights. Day 2: Drive to Alexandria, Catacombs, Library. Day 3: Departure.</p>'),
(22, 'package', 'Egypt highlights tours 2 days 1 night Giza & Cairo', 'Cairo / Giza', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/0aaccd3d-a462-4e3a-a422-bfc4d81b4c75.jpg', 150.00, 220.00, 160.00, '2 Days 1 Night', 'Upon Arrival', 'English', 'All Year Round', '<p>A perfect weekend trip to discover the core of Cairo and Giza.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Hotel Accommodation (Can be added)</li>', '<li><i class=\"fa-solid fa-check\"></i> Walking shoes</li>', '<p>Day 1: Giza Pyramids, Sphinx, Sakkara. Day 2: Egyptian Museum, Citadel, Khan El Khalili.</p>'),
(23, 'day', 'Unbelievable Cairo tour visiting a real Egyptian village by TukTuk ride', 'Cairo', 'cat_cairo.jpg', 40.00, 55.00, 45.00, '4 Hours', 'Flexible (08:00 AM - 11:00 PM)', 'English, Spanish, German, French', 'Runs on a daily basis', '<p>Unforgettable tour visiting a real Egyptian village by TukTuk ride to see the real life of local Egyptians.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Personal Items</li>', '<li><i class=\"fa-solid fa-check\"></i> Camera</li>', '<p>Get on the TukTuk ride and Enjoy your free Trip that helps you to see real life of Egyptians People and discover Their Life Style...</p>'),
(24, 'day', 'Traditional Food Tour to Eat Mouthwatering Local Dishes', 'Cairo', 'article_original_9288_20151118_564c8dffa32ea-544x323-1.jpg', 40.00, 55.00, 45.00, '4 Hours', 'Flexible 9:00 AM to 11:00 PM', 'English, Spanish', 'Runs on a daily basis', '<p>Discover Egypt’s age-old recipes which date back 5000 years. We will take you to places only locals visit.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Tipping</li>', '<li><i class=\"fa-solid fa-check\"></i> Empty Stomach!</li>', '<p>Our professional tour Guide will help you to organize special food tours for you to eat at the best local spots...</p>'),
(25, 'day', 'Wadi El Natrun Day tour from Alexandria', 'Alexandria', 'Wadi-El-Natrun-Day-tour.jpg', 55.00, 95.00, 65.00, '8 Hours', '08:00 AM to 04:00 PM', 'English, Spanish, German, French', 'Runs on a daily basis', '<p>Wadi El Natrun desert area, the actual birth place for Christian monasticism. Visit the 4 surviving Monasteries.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Entrance Fees</li>', '<li><i class=\"fa-solid fa-check\"></i> Comfortable shoes</li>', '<p>Begin your trip with Deir al-Baramus, proceed to Deir Anba Bishoi, Deir Abu Maqar, and Deir El-Suryani...</p>'),
(26, 'day', 'Day trip to St Catherine from Sharm-El-sheikh', 'Sinai Peninsula', 'StCatherine_thmb.jpg', 85.00, 150.00, 95.00, '10 Hours', '07:00 AM to 05:00 PM', 'English, Spanish, German, French', 'Daily (Except Sunday)', '<p>Visit the St. Catherine Monastery, located 220 km northwest of Sharm el Sheikh, the oldest monastery of Christianity.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Optional Tours</li>', '<li><i class=\"fa-solid fa-check\"></i> Comfortable shoes</li>', '<p>Drive for roughly 2.5 hours. You will be transferred to St-Catherine to visit the Orthodox Greek monastery and its library of ancient manuscripts...</p>'),
(27, 'half', 'Sound and Light Show at Giza Pyramids', 'Giza Pyramids', 'sound-and-light-show-at-giza-pyramids.jpg', 55.00, 70.00, 55.00, '2 Hours', '06:00 PM', 'English, Spanish, German, French', 'Runs on a daily basis', '<p>Attend the laser show that starts every day from 19:00 pm. It is a marvelous show that brings creatively to life the rule of ancient Egyptians.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Meals and Drinks</li>', '<li><i class=\"fa-solid fa-check\"></i> Camera</li>', '<p>The history is narrated by the Sphinx, telling you the most ancient secrets of the world...</p>'),
(28, 'half', 'Sound and Light show at Karnak Temple in Luxor', 'Luxor', 'karnak-sound-light-show2.jpg', 45.00, 65.00, 55.00, '2 Hours', '07:00 PM to 09:00 PM', 'English, Spanish, German, French', 'Runs on a daily basis', '<p>Karnak Sound and Light Show highlight the dramatic history of ancient Thebes narrating the achievements of great Pharaohs.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Tipping</li>', '<li><i class=\"fa-solid fa-check\"></i> Camera</li>', '<p>As visitors walk through the complex of temples, pharaohs arise to tell the story of their interesting lives...</p>'),
(29, 'shore', 'Alexandria Port Shore Excursions to Cairo', 'Alexandria Port', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/alexandria_shore_excursion.jpg', 120.00, 180.00, 140.00, '1 Day', 'Upon Ship Arrival', 'English, Spanish', 'Upon Request', '<p>Private shore Excursions to Cairo from Alexandria Port. Visit Giza Pyramids, Sphinx, and the Egyptian Museum.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Personal Expenses</li>', '<li><i class=\"fa-solid fa-check\"></i> Passport</li>', '<p>Pick up from Alexandria port, drive to Cairo, visit the Pyramids and Museum, then return to your ship in Alexandria.</p>'),
(30, 'shore', 'Port Said Shore Excursions to Cairo', 'Port Said', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Port-Said-Shore-Excursions.jpg', 130.00, 190.00, 150.00, '1 Day', 'Upon Ship Arrival', 'English, Spanish', 'Upon Request', '<p>Private shore Excursions to Cairo from Port Said. Visit Giza Pyramids, Sphinx, and the Egyptian Museum in a day.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Personal Expenses</li>', '<li><i class=\"fa-solid fa-check\"></i> Passport</li>', '<p>Pick up from Port Said, drive to Cairo, visit the Pyramids and Museum, then return to your ship in Port Said.</p>'),
(31, 'transfer', 'Cairo Airport Private Transfer', 'Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2019/11/WhatsApp-Image-2019-10-09-at-6.28.43-PM-1.jpeg', 25.00, 35.00, 30.00, 'Flexible', '24/7 Upon Request', 'English, Arabic', 'Runs on a daily basis', '<p>Safe, reliable, and hassle-free private transfer from Cairo International Airport to your hotel in Cairo or Giza, or vice versa.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Additional stops</li>', '<li><i class=\"fa-solid fa-check\"></i> Flight details</li>', '<p>Our representative will meet you at the airport holding a sign with your name, assist you with luggage, and drive you safely to your destination in a modern A/C vehicle.</p>'),
(32, 'transfer', 'Luxor Airport or Train Station Transfer', 'Luxor', 'https://egypttravelsquare.com/3abar-data/uploads/2018/09/cat_Luxor.jpg', 20.00, 30.00, 25.00, 'Flexible', '24/7 Upon Request', 'English, Arabic', 'Runs on a daily basis', '<p>Enjoy a comfortable private transfer from Luxor Airport or Train Station to your hotel or Nile Cruise.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Extra luggage beyond standard</li>', '<li><i class=\"fa-solid fa-check\"></i> Arrival details</li>', '<p>Meet and greet at the arrival gate, followed by a smooth transfer in an air-conditioned vehicle to your accommodation in Luxor.</p>'),
(33, 'transfer', 'Aswan Airport or Station Transfer', 'Aswan', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/felucca-aswan.jpg', 20.00, 30.00, 25.00, 'Flexible', '24/7 Upon Request', 'English, Arabic', 'Runs on a daily basis', '<p>Private and prompt transfer service from Aswan Airport or Train Station to your hotel or Nile Cruise.</p>', '<li><i class=\"fa-solid fa-xmark\"></i> Unscheduled stops</li>', '<li><i class=\"fa-solid fa-check\"></i> Booking confirmation</li>', '<p>Our driver will be waiting for you with a welcome sign to ensure a swift and comfortable journey to your destination in Aswan.</p>'),
(34, 'transfer', 'Pickup from Sharm El Sheikh airport to a Hotel', 'Sharm El-Sheikh', 'https://egypttravelsquare.com/3abar-data/uploads/2019/11/WhatsApp-Image-2019-12-19-at-4.26.25-PM-800x899.jpeg', 35.00, 45.00, 40.00, 'Flexible', '24/7 Upon Request', 'English, Arabic', 'Runs on a daily basis', '<p>Start your vacation in Sharm El Sheikh stress-free with a private transfer from the airport directly to your resort.</p>', '<ul>\r\n<li>Gratuities</li>\r\n</ul>', '<ul>\r\n<li>Flight info</li>\r\n</ul>', '<p>Upon arrival at Sharm El Sheikh airport, our representative will assist you with your luggage and transfer you in a modern A/C vehicle to your hotel.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(2, 'admin', '$2y$12$8Dpm.kNrrIETRtzRph5QCeA1AUz51pxJdml24sl0MG6Dz3uEegYle');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `video_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attractions`
--
ALTER TABLE `attractions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attractions`
--
ALTER TABLE `attractions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=366;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
