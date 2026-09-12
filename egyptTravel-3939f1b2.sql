-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: shareddb-l.hosting.stackcp.net
-- Generation Time: Sep 12, 2026 at 11:13 PM
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
(4, 'Alexandria', 'alexandria', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/alexandria_shore_excursion.jpg', 'The Pearl of the Mediterranean', '<p>The city of Alexandria was founded by Alexander the Great in 333 B.C. In Alexandria, there are many magnificent sightseeing spots to explore reflecting its unique Greek, Roman, and Egyptian heritage.</p>'),
(5, 'Sharm El Sheikh', 'sharm-el-sheikh', '1789229225_dest.png', 'The City of Peace', '<p>Egypt Travel Square arranges tours and excursions in Sharm El Sheikh whether you look for sea tours and Snorkeling trips, Diving, Watching dolphin shows, or Spending a wonderful day in Aqua Park.</p>'),
(8, 'aswan', 'aswan', '1789250272_dest.jpg', 'aswan', '<p><label class=\"form-label\">Intro Description (Rich Text) *</label></p>\r\n<div class=\"tox tox-tinymce\" role=\"application\" aria-disabled=\"false\">\r\n<div class=\"tox-editor-container\">\r\n<div class=\"tox-editor-header\" data-alloy-vertical-dir=\"toptobottom\">\r\n<div class=\"tox-anchorbar\">&nbsp;</div>\r\n</div>\r\n<div class=\"tox-sidebar-wrap\">&nbsp;</div>\r\n</div>\r\n</div>');

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
(13, '1789230450_gallery.png', 'The High Dam'),
(14, '1789242240_gallery.jpg', 'transfer'),
(15, '1789250430_gallery.jpg', 'The High Dam');

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
(365, 'hero_packages', '1789230686_hero_packages.jpg'),
(366, 'home_cta_bg', 'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?q=80&w=2000&auto=format&fit=crop'),
(367, 'about_who_we_are', 'Formed by a passionate team of professional operators and experienced tour guides. Our deep experience as guides allowed us to understand exactly what makes a perfect holiday. We specialize in Ancient Egyptian, Greco-Roman, Coptic, and Islamic History. As freelance guides certified by the Ministry of Tourism in Egypt (EGTGS), our ultimate mission is to show you Egypt through authentic Egyptian eyes.'),
(368, 'about_philosophy', 'We believe in introducing \"More of the Egyptian Experience for Less\" by developing quality, affordable vacations to all magnificent Egyptian attractions.'),
(369, 'about_mission', 'To provide exemplary service, earn customer satisfaction, and create a safe, comfortable environment. We constantly innovate and act as technology leaders in the travel industry, while developing quality, affordable vacations.'),
(370, 'about_vision', 'To be the most famous and trusted travel agency in Egypt by consistently delivering high-quality, great-value, and socially responsible tourism services to visitors from all over the world.'),
(371, 'about_values', 'We deliver what we promise, and only promise what we can deliver. You only pay when you are completely satisfied. We promise an unforgettable, deeply interesting experience customized completely to your unique interests.'),
(372, 'cancellation_policy_html', '<h2>Cancellation Policy (Standard Bookings)</h2><p>The following cancellation charges apply to cancellations made outside peak travel periods:</p><ul><li>From booking date up to 61 days before arrival: <strong>15%</strong> of the total tour price</li><li>60 to 31 days before arrival: <strong>35%</strong> of the total tour price</li><li>30 to 15 days before arrival: <strong>50%</strong> of the total tour price</li><li>14 days or less before arrival: <strong>100%</strong> of the total tour price</li></ul><p>Airline cancellation charges are subject to the respective airline\'s terms and conditions. A 5% bank administration fee will be deducted from any applicable refund.</p><h2>Cancellation Policy for Christmas, New Year & Easter</h2><ul><li>From booking date up to 61 days before arrival: <strong>25%</strong></li><li>60 to 31 days: <strong>50%</strong></li><li>30 to 15 days: <strong>75%</strong></li><li>14 days or less: <strong>100%</strong></li></ul><h2>Refund Policy</h2><p>Any approved refund will be processed using the same payment method used for the original transaction. Refunds are subject to applicable cancellation charges, airline penalties, supplier fees, and bank processing fees. A 5% bank administration fee will be deducted from all refunds. No refunds will be provided for unused services, missed tours, voluntary itinerary changes, or no-show reservations.</p><h2>Amendments and Changes</h2><p>Requests to modify confirmed bookings are subject to availability and may incur additional charges imposed by hotels, airlines, transportation providers, or other service suppliers.</p>'),
(373, 'egypt_info_html', '<section class=\"info-section reveal\"><div class=\"container\"><div class=\"widgets-grid\"><div class=\"widget-card\"><div class=\"widget-icon\"><i class=\"fa-solid fa-cloud-sun\"></i></div><h2 class=\"widget-title\">Current Weather</h2><div class=\"weather-box\"><div class=\"w-city\">Cairo, EG</div><div class=\"w-temp\"><i class=\"fa-solid fa-sun\" style=\"color: #FDB813;\"></i> 81°F</div><div style=\"font-size: 16px; margin-bottom: 10px;\">Fair / Sunny</div><div class=\"w-details\"><span><i class=\"fa-solid fa-wind\"></i> 6 mph</span><span><i class=\"fa-solid fa-droplet\"></i> 20% Hum</span><span>UV: 3</span></div></div></div><div class=\"widget-card\"><div class=\"widget-icon\"><i class=\"fa-solid fa-money-bill-transfer\"></i></div><h2 class=\"widget-title\">Currency Converter</h2><div class=\"currency-box\"><div class=\"c-row\"><span class=\"c-lbl\"><img src=\"https://flagcdn.com/w20/us.png\" alt=\"USA\"> USD (US Dollar)</span><span class=\"c-val\">1.00</span></div><div class=\"c-row\" style=\"justify-content: center; padding: 5px 0;\"><i class=\"fa-solid fa-arrow-down-up-across-line\" style=\"color: var(--gold);\"></i></div><div class=\"c-row\"><span class=\"c-lbl\"><img src=\"https://flagcdn.com/w20/eg.png\" alt=\"Egypt\"> EGP (Egyptian Pound)</span><span class=\"c-val\">~48.50</span></div><p style=\"font-size: 12px; color: var(--text-muted); margin-top: 15px;\">* Exchange rates are approximate and subject to daily changes.</p></div></div></div><h2 style=\"font-family: var(--font-display); font-size: 36px; color: var(--navy); text-align: center; margin-bottom: 20px;\">Tourist Map of Egypt</h2><div class=\"map-container reveal\"><img src=\"https://egypttravelsquare.com/3abar-data/uploads/2019/12/egypt.gif\" alt=\"Map of Egypt\"></div></div></section>'),
(374, 'contact_us_html', '<section class=\"contact-section reveal\"><div class=\"container\"><div class=\"contact-header\"><h2>Leave us your info</h2><p>and our specialized team will get back to you immediately to assist with your inquiries and bookings.</p></div><div class=\"contact-grid\"><div class=\"contact-form\"><form onsubmit=\"sendToWhatsApp(event, \'Contact Us Form\')\"><div class=\"form-row\"><input type=\"text\" class=\"form-control\" name=\"name\" placeholder=\"Full Name*\" required=\"\"><input type=\"email\" class=\"form-control\" name=\"email\" placeholder=\"Email Address*\" required=\"\"></div><div class=\"form-group\"><input type=\"text\" class=\"form-control\" name=\"subject\" placeholder=\"Subject*\" required=\"\"></div><div class=\"form-group\"><textarea class=\"form-control\" name=\"msg\" placeholder=\"Your Message*\" required=\"\"></textarea></div><button type=\"submit\" class=\"btn-submit\">Submit Now <i class=\"fa-solid fa-paper-plane\"></i></button></form></div><div class=\"contact-info\"><div class=\"info-card\"><div class=\"info-icon\"><i class=\"fa-solid fa-phone-volume\"></i></div><h3>Give Us a Call</h3><p>Direct & Whatsapp</p><strong>+20 100 679 6511</strong></div><div class=\"info-card\"><div class=\"info-icon\"><i class=\"fa-solid fa-envelope-open-text\"></i></div><h3>Email Us</h3><p>For detailed inquiries</p><strong>info@egypttravelsquare.com</strong></div><div class=\"info-card\"><div class=\"info-icon\"><i class=\"fa-solid fa-location-dot\"></i></div><h3>Visit Our Office</h3><p>Headquarters</p><strong>23 St El-haram , Giza<br>Cairo, Egypt</strong></div></div></div></div></section><section class=\"map-section reveal\"><iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d110534.64618218175!2d31.111812836261546!3d29.98777123992257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14584587634f1981%3A0xc3f1709fc3bb7241!2sAl%20Haram%2C%20Giza%20Governorate%2C%20Egypt!5e0!3m2!1sen!2sus!4v1714856000000!5m2!1sen!2sus\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\" style=\"width: 100%; height: 400px; border: none;\"></iframe></section>'),
(375, 'gallery_html', '<section class=\"gallery-intro reveal\"><div class=\"container\"><h2>A Visual Journey Through Egypt</h2><p>Discover the breathtaking beauty, timeless monuments, and vibrant culture of Egypt. Browse through the memorable moments of our guests exploring the land of the Pharaohs.</p></div></section><section class=\"masonry-container\"><div class=\"container\"><div class=\"masonry-gallery\" id=\"gallery-grid\"></div></div></section><div class=\"lightbox\" id=\"lightbox\"><div class=\"lightbox-img-wrapper\"><i class=\"fa-solid fa-xmark lightbox-close\" id=\"lb-close\"></i><img src=\"\" alt=\"Gallery Image Full\" id=\"lb-img\"><div class=\"lightbox-btn lightbox-prev\" id=\"lb-prev\"><i class=\"fa-solid fa-chevron-left\"></i></div><div class=\"lightbox-btn lightbox-next\" id=\"lb-next\"><i class=\"fa-solid fa-chevron-right\"></i></div><div class=\"lightbox-counter\" id=\"lb-counter\"></div></div></div>'),
(376, 'payment_methods_html', '<section class=\"policy-section reveal\"><div class=\"container policy-container\"><h2>Book Your Dream Tour with Ease</h2><p>Hello there! We\'re thrilled to help you book your dream tour with us. Just let us know what you\'re looking for, and we\'ll take it from there.</p><div class=\"feature-box\"><h4><i class=\"fa-solid fa-calendar-check\"></i> Standard Booking Policy</h4><p style=\"margin-bottom: 0;\">Start your dream tour by paying as low as <strong>25%</strong> of the total cost. Feel free to pay the rest two days before your arrival or in cash when you arrive - we\'ve got you covered!</p></div><div class=\"feature-box\"><h4><i class=\"fa-solid fa-gift\"></i> Festive Periods Policy</h4><p style=\"margin-bottom: 0;\">During peak festive periods like Christmas, New Year, and Easter, we require a <strong>50%</strong> down payment. The remaining balance may be paid up to two (2) days prior to your arrival date or in cash upon arrival, unless otherwise specified in your booking confirmation.</p></div><h2>Credit Card Payments</h2><p>For security and verification purposes, clients who choose to pay by credit card may be required to complete and sign a Credit Card Authorization Form.</p><p>The signature provided on the authorization form must match the signature appearing on the cardholder’s passport and the credit card used for payment. Egypt Travel Square reserves the right to request additional documentation to verify payment details and prevent fraudulent transactions.</p></div></section>'),
(377, 'privacy_policy_html', '<section class=\"policy-section reveal\"><div class=\"container policy-container\"><h2>Our Commitment to You</h2><p>At Egypt Travel Square, we are dedicated to creating exceptional travel experiences tailored to the unique interests, preferences, and budgets of our clients. Our mission is to deliver outstanding service and unforgettable journeys while maintaining the highest standards of professionalism, integrity, and customer care.</p><p>Building and maintaining our clients’ trust is at the heart of everything we do. We are committed to conducting our business honestly, transparently, and reliably throughout every stage of the travel planning process—from the initial inquiry and booking to the completion of your trip and beyond.</p><p>We recognize the importance of protecting your personal information and are committed to safeguarding your privacy. This Privacy Policy outlines how we collect, use, and protect your information when you use our website and services. By accessing our website or utilizing our travel planning resources, you acknowledge and agree to the practices described in this Privacy Policy.</p><h2>Information We Collect and Protect</h2><h3>A. Protection of Personal and Payment Information</h3><p>Egypt Travel Square respects your privacy and is committed to protecting your personal data. All credit card, debit card, and personally identifiable information provided through our website will be handled securely and confidentially.</p><p>We do not store, sell, share, rent, or lease your payment card details or personally identifiable information to any third parties, except where required to process your travel arrangements or comply with applicable laws and regulations.</p><h3>B. Updates to Our Privacy Policy and Website Terms</h3><p>Egypt Travel Square reserves the right to modify, update, or amend this Privacy Policy and the Website Terms &amp; Conditions at any time to reflect changes in legal requirements, industry standards, or business practices.</p><p>We encourage visitors and customers to review these sections periodically to remain informed of any updates. Any changes will become effective immediately upon publication on our website.</p><h3>C. Third-Party Advertising and Cookies</h3><p>Our website may display advertisements or promotional content provided by third-party advertising networks, agencies, advertisers, and audience analytics providers.</p><p>These third parties may use cookies, web beacons, and similar technologies to collect information about your interactions with our website and other websites. This information may be used to better understand your interests and deliver advertisements that are more relevant to you.</p><p>Please note that Egypt Travel Square does not have access to or control over the information collected by these third parties. Their data collection practices and privacy policies are independent of ours and are not governed by this Privacy Policy. We encourage you to review the privacy policies of any third-party providers whose services you may interact with through our website.</p></div></section>'),
(378, 'guest_reviews_html', '<section class=\"reviews-section\"><div class=\"container\"><div class=\"review-form-container reveal\"><h3>Share Your Experience</h3><p>We\'d love to hear about your trip to Egypt!</p>[WPCR_INSERT]</div></div></section>'),
(379, 'terms_conditions_html', '<section class=\"policy-section reveal\"><div class=\"container policy-container\"><h2>Our Booking Terms: Journey with Peace of Mind!</h2><p>Welcome to Egypt Travel Square. These Terms and Conditions outline the rules and regulations for the use of our website and the booking of our travel services.</p><h2>Personalized Itinerary for You</h2><p>Once we receive your request, our friendly representative will get in touch with you. We\'ll discuss all the details and create a customized itinerary just for you. Once you love it, it\'s a go!</p><p>Our commitment is to ensure that your travel experience matches your expectations completely, offering full flexibility during the planning stage.</p><h2>Acceptance of Terms</h2><p>By confirming a booking with Egypt Travel Square, you acknowledge that you have read, understood, and agreed to these Booking Terms &amp; Conditions, including all payment, cancellation, and refund policies.</p></div></section>'),
(380, 'travel_tips_html', '<section class=\"tips-section reveal\"><div class=\"container\"><div class=\"tips-intro\"><h2>Everything You Need to Know</h2><p>Our Egypt Travel Guide helps travelers learn important information including the best things to do, what to wear, the best time to travel, culture, traditions, and entry visas.</p></div><div class=\"tips-grid\"><div class=\"faq-container\"><details open><summary>Is it Safe to Travel to Egypt Now?</summary><div class=\"faq-content\">Yes, it is very safe. The police, tourist police, and army are always close by, and the Egyptian people are incredibly friendly, welcoming, and protective of tourists.</div></details><details><summary>What is the best time to travel to Egypt?</summary><div class=\"faq-content\">The peak and most comfortable time to visit is from October to May when temperatures are mild.</div></details><details><summary>Can I take photographs inside the tombs?</summary><div class=\"faq-content\">No, photography inside ancient tombs (including inside the Pyramids and Abu Simbel) is strictly forbidden to protect the ancient paintwork from excessive flash damage.</div></details></div></div></div></section>'),
(381, 'videos_html', '<section class=\"video-section\"><div class=\"container\"><div class=\"video-grid\"><div class=\"video-card reveal\"><video controls preload=\"metadata\"><source src=\"https://egypttravelsquare-com.stackstaging.com/wp-content/uploads/2026/06/Video_٢٠١٨٠٦١٣٠٥٤٠٠٣٩٤١_by_videoshow.mp4\" type=\"video/mp4\"></video><div class=\"video-info\"><h3>Magical Egypt Tour Highlight</h3><p>A glimpse into the stunning experiences waiting for you in Egypt.</p></div></div><div class=\"video-card reveal reveal-delay-1\"><video controls preload=\"metadata\"><source src=\"https://egypttravelsquare-com.stackstaging.com/wp-content/uploads/2026/06/WhatsApp-Video-2026-06-15-at-2.41.26-PM.mp4\" type=\"video/mp4\"></video><div class=\"video-info\"><h3>Unforgettable Egyptian Adventures</h3><p>Discover ancient wonders and vibrant local life across our beautiful destinations.</p></div></div></div></div></section>'),
(382, 'hero_wheretogo', 'https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=2000&auto=format&fit=crop'),
(383, 'home_video_cover', 'https://images.unsplash.com/photo-1539667468225-eebb663053e6?q=80&w=2000&auto=format&fit=crop'),
(384, 'hero_slider_images', '1789249704_0_hero_slider_images.jpg'),
(385, 'experience_slider_images', '1789249704_0_experience_slider_images.jpg'),
(386, 'phone', '+20 100 679 6511'),
(387, 'email', 'info@egypttravelsquare.com'),
(388, 'address', '12 Tahrir Street, Downtown, Cairo, Egypt'),
(389, 'facebook', 'https://www.facebook.com/share/196gByQFgj/?mibextid=wwXIfr'),
(390, 'instagram', 'https://www.instagram.com/abduo_egypt_guide?utm_source=qr'),
(391, 'youtube', 'http://www.youtube.com/@egypttravelsquare2264'),
(392, 'tiktok', 'https://www.tiktok.com/@abduo.abdelaziz.e?_r=1&_t=ZS-96uondgXyoG');
INSERT INTO `settings` (`id`, `setting_key`, `setting_value`) VALUES
(393, 'tripadvisor', 'https://www.tripadvisor.com/Attraction_Review-g294202-d19767047-Reviews-Egypt_Travel_Square-Giza_Giza_Governorate.html'),
(394, 'home_hero_title', 'Experience the Magic of <span>Egypt</span>'),
(395, 'home_hero_subtitle', '<p>Your trusted partner for extraordinary Egyptian adventures. Custom itineraries, expert guides, and unforgettable memories.</p>'),
(396, 'home_hero_btn1_text', 'Explore Packages'),
(397, 'home_hero_btn1_link', 'packages.php'),
(398, 'home_hero_btn2_text', 'Find Day Tours'),
(399, 'home_hero_btn2_link', 'tours.php?type=day'),
(400, 'home_video_upload', '1789249307_home_video.mp4'),
(401, 'phone', '+20 100 679 6511'),
(402, 'email', 'info@egypttravelsquare.com'),
(403, 'address', '12 Tahrir Street, Downtown, Cairo, Egypt'),
(404, 'facebook', 'https://www.facebook.com/share/196gByQFgj/?mibextid=wwXIfr'),
(405, 'instagram', 'https://www.instagram.com/abduo_egypt_guide?utm_source=qr'),
(406, 'youtube', 'http://www.youtube.com/@egypttravelsquare2264'),
(407, 'tiktok', 'https://www.tiktok.com/@abduo.abdelaziz.e?_r=1&_t=ZS-96uondgXyoG'),
(408, 'tripadvisor', 'https://www.tripadvisor.com/Attraction_Review-g294202-d19767047-Reviews-Egypt_Travel_Square-Giza_Giza_Governorate.html'),
(409, 'home_hero_title', 'Experience the Magic of <span>Egypt</span>'),
(410, 'home_hero_subtitle', '<p>Your trusted partner for extraordinary Egyptian adventures. Custom itineraries, expert guides, and unforgettable memories.</p>'),
(411, 'home_hero_btn1_text', 'Explore Packages'),
(412, 'home_hero_btn1_link', 'packages.php'),
(413, 'home_hero_btn2_text', 'Find Day Tours'),
(414, 'home_hero_btn2_link', 'tours.php?type=day'),
(415, 'home_video_upload', '1789249475_home_video.mp4');

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
(34, 'transfer', 'Pickup from Sharm El Sheikh airport to a Hotel', 'Sharm El-Sheikh', '1789249664_tour.jpg', 35.00, 45.00, 40.00, 'Flexible', '24/7 Upon Request', 'English, Arabic', 'Runs on a daily basis', '<p>Start your vacation in Sharm El Sheikh stress-free with a private transfer from the airport directly to your resort.</p>', '<ul>\r\n<li>Gratuities</li>\r\n</ul>', '<ul>\r\n<li>Flight info</li>\r\n</ul>', '<p>Upon arrival at Sharm El Sheikh airport, our representative will assist you with your luggage and transfer you in a modern A/C vehicle to your hotel.</p>'),
(35, 'day', 'Day tour to Abu Simbel from Aswan by private car', 'Aswan / Abu Simbel', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/abuosimple11.jpg', 95.00, 0.00, 0.00, '10 Hours', '', '', '', '', '', '', ''),
(36, 'day', 'Ain Sohkna Day tour in the Red sea from Cairo', 'Ain Sokhna', 'https://egypttravelsquare-com.stackstaging.com/wp-content/uploads/2026/06/WhatsApp-Image-2024-04-17-at-10.03.38-PM2.jpeg', 175.00, 0.00, 0.00, '11 Hours', '', '', '', '', '', '', ''),
(37, 'day', 'Alexandria day tour to visit Alexandria highlight', 'Alexandria', 'https://egypttravelsquare-com.stackstaging.com/wp-content/uploads/2026/06/alexandria-egypt-000.jpg', 30.00, 0.00, 0.00, '7 Hours', '', '', '', '', '', '', ''),
(38, 'day', 'Aqua Park in Sharm El Sheikh', 'Sharm El Sheikh', 'https://egypttravelsquare-com.stackstaging.com/wp-content/uploads/2026/06/10309491_375333935938202_5552356356462892232_n.jpg', 35.00, 0.00, 0.00, '6 Hours', '', '', '', '', '', '', ''),
(39, 'transfer', 'Pick up from or to Aswan airport to Aswan Hotels', 'Aswan Airport', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Aswan-International-Airport-duty-free.jpg', 30.00, 0.00, 0.00, 'Transfer', '', '', '', '', '', '', ''),
(40, 'half', 'Aswan City tour on Horse Carriage', 'Aswan', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Aswan-City-tour-on-Horse-Carriage2.jpg', 30.00, 0.00, 0.00, '2 Hours', '', '', '', '', '', '', ''),
(41, 'transfer', 'Transfer from Aswan to Luxor', 'Aswan / Luxor', 'https://egypttravelsquare.com/3abar-data/uploads/2018/09/cat_aswan.jpg', 100.00, 0.00, 0.00, '3.5 Hours', '', '', '', '', '', '', ''),
(42, 'day', 'Cairo Day Tour from Alexandria to visit Giza Pyramids and Egyptian Museum', 'Alexandria to Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2019/11/WhatsApp-Image-2019-10-09-at-6.17.44-PM.jpeg', 120.00, 0.00, 0.00, 'Full Day', '', '', '', '', '', '', ''),
(43, 'half', 'Cairo by Night tour', 'Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Cairo-by-Night-tour.jpg', 45.00, 0.00, 0.00, '4 Hours', '', '', '', '', '', '', ''),
(44, 'package', 'Egypt’s Highlights Tours 2 Days 1 Night: Giza & Cairo', 'Cairo', 'https://egypttravelsquare-com.stackstaging.com/wp-content/uploads/2026/06/WhatsApp-Image-2025-11-10-at-8.00.23-PM.jpeg', 150.00, 0.00, 0.00, '2 Days / 1 Night', '', '', '', '', '', '', ''),
(45, 'transfer', 'Cairo Airport Transfers', 'Cairo Airport', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/cairoairport.jpg', 35.00, 0.00, 0.00, 'Transfer', '', '', '', '', '', '', ''),
(46, 'half', 'Cairo half day City tour (Photography & Highlights)', 'Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/half-day-tour-CITYTOURE.jpg', 40.00, 0.00, 0.00, '4 Hours', '', '', '', '', '', '', ''),
(47, 'day', 'Day tour to Giza Pyramids, Egyptian Museum from Sharm El Sheik by plane', 'Cairo from Sharm', 'https://egypttravelsquare.com/3abar-data/uploads/2019/11/WhatsApp-Image-2019-10-09-at-6.28.43-PM-1.jpeg', 315.00, 0.00, 0.00, '14 Hours', '', '', '', '', '', '', ''),
(48, 'day', 'Fabulous Safari DAY TRIP TO BAHARIYA OASIS, BLACK AND WHITE DESERT', 'Bahariya Oasis', 'https://egypttravelsquare-com.stackstaging.com/wp-content/uploads/2020/03/overnight-camping-at-the-white-and-black-desert-bahareya-oasis-from-cairo.jpg', 250.00, 0.00, 0.00, '17 Hours', '', '', '', '', '', '', ''),
(49, 'day', 'Local Day Tour To Giza Pyramids, Saladin Citadel & Egyptian Museum', 'Cairo', 'https://www.brilliantegypttours.com/wp-content/uploads/2023/05/image-39-1024x576.png', 50.00, 0.00, 0.00, '8 Hours', '', '', '', '', '', '', ''),
(50, 'day', 'Aswan Day tour from Luxor City', 'Aswan / Luxor', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/egypt-aswan-day-trip-abu-simbel.jpg', 120.00, 0.00, 0.00, '14 Hours', '', '', '', '', '', '', ''),
(51, 'day', 'Aswan highlight Full day Tour to Philae Temple, High Dam and Unfinished Obelisk', 'Aswan', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Philae-Temple-1.jpg', 50.00, 0.00, 0.00, '8 Hours', '', '', '', '', '', '', ''),
(52, 'day', 'Day tour to Abu Simbel from Aswan by private car', 'Aswan / Abu Simbel', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/abuosimple11.jpg', 95.00, 0.00, 0.00, '10 Hours', '', '', '', '', '', '', ''),
(53, 'day', 'Ain Sohkna Day tour in the Red sea from Cairo', 'Ain Sokhna', 'https://egypttravelsquare-com.stackstaging.com/wp-content/uploads/2026/06/WhatsApp-Image-2024-04-17-at-10.03.38-PM2.jpeg', 175.00, 0.00, 0.00, '11 Hours', '', '', '', '', '', '', ''),
(54, 'day', 'Alexandria day tour to visit Alexandria highlight', 'Alexandria', 'https://egypttravelsquare-com.stackstaging.com/wp-content/uploads/2026/06/alexandria-egypt-000.jpg', 30.00, 0.00, 0.00, '7 Hours', '', '', '', '', '', '', ''),
(55, 'day', 'Aqua Park in Sharm El Sheikh', 'Sharm El Sheikh', 'https://egypttravelsquare-com.stackstaging.com/wp-content/uploads/2026/06/10309491_375333935938202_5552356356462892232_n.jpg', 35.00, 0.00, 0.00, '6 Hours', '', '', '', '', '', '', ''),
(56, 'transfer', 'Pick up from or to Aswan airport to Aswan Hotels', 'Aswan Airport', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Aswan-International-Airport-duty-free.jpg', 30.00, 0.00, 0.00, 'Transfer', '', '', '', '', '', '', ''),
(57, 'half', 'Aswan City tour on Horse Carriage', 'Aswan', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Aswan-City-tour-on-Horse-Carriage2.jpg', 30.00, 0.00, 0.00, '2 Hours', '', '', '', '', '', '', ''),
(58, 'transfer', 'Transfer from Aswan to Luxor', 'Aswan / Luxor', 'https://egypttravelsquare.com/3abar-data/uploads/2018/09/cat_aswan.jpg', 100.00, 0.00, 0.00, '3.5 Hours', '', '', '', '', '', '', ''),
(59, 'day', 'Cairo Day Tour from Alexandria to visit Giza Pyramids and Egyptian Museum', 'Alexandria to Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2019/11/WhatsApp-Image-2019-10-09-at-6.17.44-PM.jpeg', 120.00, 0.00, 0.00, 'Full Day', '', '', '', '', '', '', ''),
(60, 'half', 'Cairo by Night tour', 'Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Cairo-by-Night-tour.jpg', 45.00, 0.00, 0.00, '4 Hours', '', '', '', '', '', '', ''),
(61, 'package', 'Egypt’s Highlights Tours 2 Days 1 Night: Giza & Cairo', 'Cairo', 'https://egypttravelsquare-com.stackstaging.com/wp-content/uploads/2026/06/WhatsApp-Image-2025-11-10-at-8.00.23-PM.jpeg', 150.00, 0.00, 0.00, '2 Days / 1 Night', '', '', '', '', '', '', ''),
(62, 'transfer', 'Cairo Airport Transfers', 'Cairo Airport', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/cairoairport.jpg', 35.00, 0.00, 0.00, 'Transfer', '', '', '', '', '', '', ''),
(63, 'half', 'Cairo half day City tour (Photography & Highlights)', 'Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/half-day-tour-CITYTOURE.jpg', 40.00, 0.00, 0.00, '4 Hours', '', '', '', '', '', '', ''),
(64, 'day', 'Day tour to Giza Pyramids, Egyptian Museum from Sharm El Sheik by plane', 'Cairo from Sharm', 'https://egypttravelsquare.com/3abar-data/uploads/2019/11/WhatsApp-Image-2019-10-09-at-6.28.43-PM-1.jpeg', 315.00, 0.00, 0.00, '14 Hours', '', '', '', '', '', '', ''),
(65, 'day', 'Fabulous Safari DAY TRIP TO BAHARIYA OASIS, BLACK AND WHITE DESERT', 'Bahariya Oasis', 'https://egypttravelsquare-com.stackstaging.com/wp-content/uploads/2020/03/overnight-camping-at-the-white-and-black-desert-bahareya-oasis-from-cairo.jpg', 250.00, 0.00, 0.00, '17 Hours', '', '', '', '', '', '', ''),
(66, 'day', 'Local Day Tour To Giza Pyramids, Saladin Citadel & Egyptian Museum', 'Cairo', 'https://www.brilliantegypttours.com/wp-content/uploads/2023/05/image-39-1024x576.png', 50.00, 0.00, 0.00, '8 Hours', '', '', '', '', '', '', ''),
(67, 'day', 'Aswan Day tour from Luxor City', 'Aswan / Luxor', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/egypt-aswan-day-trip-abu-simbel.jpg', 120.00, 0.00, 0.00, '14 Hours', '', '', '', '', '', '', ''),
(68, 'day', 'Aswan highlight Full day Tour to Philae Temple, High Dam and Unfinished Obelisk', 'Aswan', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Philae-Temple-1.jpg', 50.00, 0.00, 0.00, '8 Hours', '', '', '', '', '', '', ''),
(69, 'day', 'Cairo City Tour to Egyptian Museum, Citadel & Khan Khalily Bazaar', 'Cairo', 'https://egypttravelsquare-com.stackstaging.com/wp-content/uploads/2026/06/20190323_132750-scaled.jpg', 45.00, 0.00, 0.00, '7.5 Hours', '', '', '', '', '', '', ''),
(70, 'layover', 'Cairo Layover tours to Giza Pyramids and Sphinx from Cairo Airport', 'Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/WhatsApp-Image-2019-12-19-at-4.26.29-PM.jpeg', 55.00, 0.00, 0.00, 'Flexible', '', '', '', '', '', '', ''),
(71, 'layover', 'Cairo Layover Tours to Giza Pyramids Egyptian Museum & Bazaar', 'Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/egypt_pyramids1111.jpg', 60.00, 0.00, 0.00, 'Flexible', '', '', '', '', '', '', ''),
(72, 'layover', 'Cairo Layover Tours to Giza Pyramids & Islamic Cairo and Egyptian Museum', 'Cairo', 'https://egypttravelsquare-com.stackstaging.com/wp-content/uploads/2026/06/WhatsApp-Image-2025-11-03-at-6.50.29-PM-2.jpeg', 60.00, 0.00, 0.00, 'Flexible', '', '', '', '', '', '', ''),
(73, 'day', 'Cairo Local Markets Day Tour', 'Cairo', 'https://egypttravelsquare-com.stackstaging.com/wp-content/uploads/2026/06/WhatsApp-Image-2024-04-17-at-10.03.41-PM.jpeg', 35.00, 0.00, 0.00, '5 Hours', '', '', '', '', '', '', ''),
(74, 'day', 'Luxor fantastic Day Tour to visit Dendera and Abydos temples', 'Luxor', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Abydos_temples.jpg', 100.00, 0.00, 0.00, '10 Hours', '', '', '', '', '', '', ''),
(75, 'half', 'Luxor half day tours to East Bank Visit Karnak and Luxor Temples', 'Luxor', 'https://egypttravelsquare-com.stackstaging.com/wp-content/uploads/2026/06/WhatsApp-Image-2024-04-17-at-10.03.39-PM5.jpeg', 40.00, 0.00, 0.00, '6 Hours', '', '', '', '', '', '', ''),
(76, 'half', 'Sunrise or Sunset Camel ride tour at Giza Pyramids', 'Cairo', 'https://d3rr2gvhjw0wwy.cloudfront.net/uploads/activity_headers/234863/2000x2000-0-70-f65625f28a2a58eec273d0a4f30b8df9.jpg', 35.00, 0.00, 0.00, '2.5 Hours', '', '', '', '', '', '', ''),
(77, 'day', 'Luxor Day Tour to visit the magnificent temples of Edfu and Kom Ombo from Luxor City', 'Luxor', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/edfo.jpg', 125.00, 0.00, 0.00, '11 Hours', '', '', '', '', '', '', ''),
(78, 'day', 'Day Tour to Giza Pyramids, Memphis and Saqqara Pyramids', 'Cairo / Giza', 'https://egypttravelsquare-com.stackstaging.com/wp-content/uploads/2026/06/WhatsApp-Image-2025-09-10-at-4.45.53-PM.jpeg', 50.00, 0.00, 0.00, '7.5 Hours', '', '', '', '', '', '', ''),
(79, 'package', 'Egypt’s Highlights 3 Days 2 Nights: Cairo & Alexandria', 'Cairo / Alexandria', 'https://egypttravelsquare.com/3abar-data/uploads/2020/01/80c0a35d-1ea0-44ea-961d-8bd300e5f664.jpg', 340.00, 0.00, 0.00, '3 Days / 2 Nights', '', '', '', '', '', '', ''),
(80, 'package', 'Egypt’s Highlight 3 Days 2 Nights Tour: Cairo & Luxor', 'Cairo / Luxor', 'https://egypttravelsquare.com/3abar-data/uploads/2020/01/Luxor-Temple.jpg', 530.00, 0.00, 0.00, '3 Days / 2 Nights', '', '', '', '', '', '', ''),
(81, 'day', 'Cairo Shopping Tours to Old and Local Markets', 'Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2020/03/600x400-1-50-18353d623a73fef108cc716d4ae35bfe.jpg', 35.00, 0.00, 0.00, '5 Hours', '', '', '', '', '', '', ''),
(82, 'half', 'Camel half Day Tour to Giza Pyramids', 'Cairo / Giza', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/WhatsApp-Image-2022-12-19-at-10.28.57-PM-1.jpeg', 40.00, 0.00, 0.00, '4 Hours', '', '', '', '', '', '', ''),
(83, 'transfer', 'Cairo Transfer', 'Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/cairoairport.jpg', 35.00, 0.00, 0.00, 'Flexible', '', '', '', '', '', '', ''),
(84, 'day', 'Day Tour to Kom Ombo and Edfu temples from Aswan', 'Aswan', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Edfu-Temple0.jpg', 65.00, 0.00, 0.00, '8 Hours', '', '', '', '', '', '', ''),
(85, 'half', 'Felucca Ride on the Nile in Aswan', 'Aswan', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/felucca-aswan.jpg', 30.00, 0.00, 0.00, '2 Hours', '', '', '', '', '', '', ''),
(86, 'half', 'Felucca Ride on the Nile in Luxor', 'Luxor', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/flucca_COVER.jpg', 30.00, 0.00, 0.00, '2 Hours', '', '', '', '', '', '', ''),
(87, 'day', 'Highlight Day Tour to Alexandria City from Cairo', 'Alexandria', 'https://egypttravelsquare-com.stackstaging.com/wp-content/uploads/2026/06/alexandria-egypt-000.jpg', 65.00, 0.00, 0.00, 'Full Day', '', '', '', '', '', '', ''),
(88, 'package', 'Egypt’s 9 Days 8 Nights Package: Cairo, Aswan, Luxor & Sharm El Sheikh', 'Cairo / Aswan / Luxor / Sharm', 'https://egypttravelsquare.com/3abar-data/uploads/2020/01/sharm_elshikh.jpg', 1130.00, 0.00, 0.00, '9 Days / 8 Nights', '', '', '', '', '', '', ''),
(89, 'package', 'Egypt’s Adventure 6 Days 5 Nights Tours to Cairo & White Desert', 'Cairo / Bahariya', 'https://egypttravelsquare-com.stackstaging.com/wp-content/uploads/2026/06/20210322_182627-scaled.jpg', 650.00, 0.00, 0.00, '6 Days / 5 Nights', '', '', '', '', '', '', ''),
(90, 'day', 'Fayoum Oasis Safari Day tour from Cairo by Car', 'Fayoum', 'https://egypttravelsquare-com.stackstaging.com/wp-content/uploads/2026/06/WhatsApp-Image-2026-05-07-at-4.57.30-PM.jpeg', 120.00, 0.00, 0.00, '11 Hours', '', '', '', '', '', '', ''),
(91, 'day', 'Local Day Tour To Giza Pyramids, Saladin Citadel & Egyptian Museum', 'Cairo', 'https://media.tacdn.com/media/attractions-splice-spp-674x446/0f/27/64/69.jpg', 50.00, 0.00, 0.00, '8 Hours', '', '', '', '', '', '', ''),
(92, 'half', 'Glass bottom boat in Sharm El Sheikh', 'Sharm El Sheikh', 'https://egypttravelsquare.com/3abar-data/uploads/2018/09/tour-packages-classical-egypt-tours.jpg', 35.00, 0.00, 0.00, '4 Hours', '', '', '', '', '', '', ''),
(93, 'day', 'Luxor Day Tour to visit the magnificent temples of Edfu and Kom Ombo from Luxor City', 'Luxor', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/edfo.jpg', 125.00, 0.00, 0.00, '10 Hours', '', '', '', '', '', '', ''),
(94, 'package', 'Egypt’s Highlight 4 Days 3 Nights Tour to Cairo, Luxor & ASWAN', 'Cairo / Luxor / Aswan', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Aswan-City-tour-on-Horse-Carriage2.jpg', 750.00, 0.00, 0.00, '4 Days / 3 Nights', '', '', '', '', '', '', ''),
(95, 'day', 'Historical Day Tour to Giza Pyramids, Saqqara and Dahshur Pyramids', 'Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2018/09/dahshour-red-bent-pyramids-day-tour-camel-ride-cairo-excursion-day-tours-egypt-excursions.jpg', 50.00, 0.00, 0.00, 'Full Day', '', '', '', '', '', '', ''),
(96, 'half', 'Egyptian Museum Half Day Tour', 'Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/egypt_m.jpg', 35.00, 0.00, 0.00, '4 Hours', '', '', '', '', '', '', ''),
(97, 'day', 'Day Tour to Islamic and Christian Cairo', 'Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/WhatsApp-Image-2022-12-19-at-10.29.17-PM.jpeg', 45.00, 0.00, 0.00, '8 Hours', '', '', '', '', '', '', ''),
(98, 'transfer', 'Pick up from or to Luxor airport to Luxor Hotels', 'Luxor', 'https://egypttravelsquare.com/3abar-data/uploads/2019/11/WhatsApp-Image-2019-10-11-at-8.14.04-PM-1.jpeg', 30.00, 0.00, 0.00, 'Flexible', '', '', '', '', '', '', ''),
(99, 'package', 'Egypt’s Highlight 4 Days 3 Nights Tour to Cairo, Luxor & ASWAN', 'Cairo / Luxor / Aswan', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Aswan-City-tour-on-Horse-Carriage2.jpg', 750.00, 0.00, 0.00, '4 Days / 3 Nights', '', '', '', '', '', '', ''),
(100, 'package', 'Egypt’s Adventure 6 Days 5 Nights Tours to Cairo & White Desert', 'Cairo / Bahariya', 'https://egypttravelsquare-com.stackstaging.com/wp-content/uploads/2026/06/20210322_182627-scaled.jpg', 650.00, 0.00, 0.00, '6 Days / 5 Nights', '', '', '', '', '', '', ''),
(101, 'package', 'Egypt 7 Days 6 Nights Package includes Cairo & Sharm El Sheikh', 'Cairo / Sharm El Sheikh', 'https://egypttravelsquare.com/3abar-data/uploads/2020/01/sharm_elshikh3.jpg', 985.00, 0.00, 0.00, '7 Days / 6 Nights', '', '', '', '', '', '', ''),
(102, 'package', 'Egypt’s 9 Days 8 Nights Package: Cairo, Aswan, Luxor & Sharm El Sheikh', 'Cairo / Aswan / Luxor / Sharm', 'https://egypttravelsquare.com/3abar-data/uploads/2020/01/sharm_elshikh.jpg', 1130.00, 0.00, 0.00, '9 Days / 8 Nights', '', '', '', '', '', '', ''),
(103, 'package', 'Egypt Package 8 DAYS 7 NIGHTS CAIRO, NILE CRUISE ASWAN, LUXOR AND ABU SIMBEL', 'Cairo / Aswan / Luxor', 'https://egypttravelsquare.com/3abar-data/uploads/2020/01/WhatsApp-Image-2022-01-13-at-7.44.30-PM.jpeg', 1050.00, 0.00, 0.00, '8 Days / 7 Nights', '', '', '', '', '', '', ''),
(104, 'half', 'Egyptian Museum Half Day Tour', 'Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/egypt_m.jpg', 35.00, 0.00, 0.00, '4 Hours', '', '', '', '', '', '', ''),
(105, 'day', 'Fabulous Safari DAY TRIP TO BAHARIYA OASIS, BLACK AND WHITE DESERT FROM CAIRO', 'Bahariya Oasis', 'https://egypttravelsquare-com.stackstaging.com/wp-content/uploads/2026/06/IMG_20210405_210504_330.jpg', 250.00, 0.00, 0.00, 'Full Day', '', '', '', '', '', '', ''),
(106, 'day', 'Fayoum Oasis Safari Day tour from Cairo by Car', 'Fayoum', 'https://egypttravelsquare-com.stackstaging.com/wp-content/uploads/2026/06/WhatsApp-Image-2026-05-07-at-4.57.30-PM.jpeg', 120.00, 0.00, 0.00, 'Full Day', '', '', '', '', '', '', ''),
(107, 'half', 'Felucca Ride on the Nile in Aswan', 'Aswan', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/felucca-aswan.jpg', 30.00, 0.00, 0.00, '2 Hours', '', '', '', '', '', '', ''),
(108, 'half', 'Felucca Ride on the Nile in Luxor', 'Luxor', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/flucca_COVER.jpg', 30.00, 0.00, 0.00, '2 Hours', '', '', '', '', '', '', ''),
(109, 'half', 'Glass bottom boat in Sharm El Sheikh', 'Sharm El Sheikh', 'https://egypttravelsquare.com/3abar-data/uploads/2018/09/tour-packages-classical-egypt-tours.jpg', 35.00, 0.00, 0.00, '4 Hours', '', '', '', '', '', '', ''),
(110, 'day', 'Highlight Day Tour to Alexandria City from Cairo', 'Alexandria', 'https://egypttravelsquare-com.stackstaging.com/wp-content/uploads/2026/06/alexandria-egypt-000.jpg', 65.00, 0.00, 0.00, 'Full Day', '', '', '', '', '', '', ''),
(111, 'day', 'Luxor Day trip from Sharm el Sheikh by plane', 'Luxor / Sharm', 'https://egypttravelsquare.com/3abar-data/uploads/2019/11/luxor.jpg', 55.00, 0.00, 0.00, '15 Hours', '', '', '', '', '', '', ''),
(112, 'half', 'Luxor half day tours to East Bank Visit Karnak and Luxor Temples', 'Luxor', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Luxor-Karnak2.jpg', 40.00, 0.00, 0.00, '6 Hours', '', '', '', '', '', '', ''),
(113, 'half', 'Luxor City tour on Horse Carriage', 'Luxor', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Horse-carriage-luxor.jpg', 30.00, 0.00, 0.00, '2 Hours', '', '', '', '', '', '', ''),
(114, 'day', 'Luxor High Light Day Tour from Cairo', 'Luxor / Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/luxor_cover.jpg', 55.00, 0.00, 0.00, '14 Hours', '', '', '', '', '', '', ''),
(115, 'day', 'Luxor High Light Day Tour', 'Luxor', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/luxor_cover.jpg', 45.00, 0.00, 0.00, '8 Hours', '', '', '', '', '', '', ''),
(116, 'half', 'Half Day Tour Visit Luxor Mummification Museum', 'Luxor', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Luxor-Mummification-Museum.jpg', 35.00, 0.00, 0.00, '6 Hours', '', '', '', '', '', '', ''),
(117, 'day', 'Tour to Madinet Habu temple and Dier el madina or Valley Of Workers', 'Luxor', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Luxor-temple-Karnak-1.jpg', 35.00, 0.00, 0.00, '8 Hours', '', '', '', '', '', '', ''),
(118, 'package', 'Nile Cruise from Aswan to Luxor for 4 Days 3 Nights', 'Aswan / Luxor', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Nile-Cruise-from-Aswan2.jpg', 385.00, 0.00, 0.00, '4 Days 3 Nights', '', '', '', '', '', '', ''),
(119, 'day', 'Nubian Village Day tour in Aswan', 'Aswan', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Nubian-Village-Day-tour-in-Aswan2.jpg', 55.00, 0.00, 0.00, '4 Hours', '', '', '', '', '', '', ''),
(120, 'day', 'Overnight Safari Oasis Tours at White and Black Desert', 'Bahariya Oasis', 'https://egypttravelsquare.com/3abar-data/uploads/2020/03/overnight-camping-at-the-white-and-black-desert-bahareya-oasis-from-cairo.jpg', 290.00, 0.00, 0.00, '2 Days / 1 Night', '', '', '', '', '', '', ''),
(121, 'half', 'Philae temple sound and Light show Aswan', 'Aswan', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/sound-Light-philae-temple2.jpg', 40.00, 0.00, 0.00, '2 Hours', '', '', '', '', '', '', ''),
(122, 'transfer', 'Pickup from Sharm El Sheikh airport to a Hotel', 'Sharm El Sheikh', 'https://egypttravelsquare.com/3abar-data/uploads/2019/11/WhatsApp-Image-2019-12-19-at-4.26.25-PM.jpeg', 35.00, 0.00, 0.00, 'Flexible', '', '', '', '', '', '', ''),
(123, 'half', 'Quad Bikes around Giza Pyramids (ATV)', 'Giza', 'https://egypttravelsquare-com.stackstaging.com/wp-content/uploads/2026/06/WhatsApp-Image-2023-03-27-at-10.02.34-PM.jpeg', 45.00, 0.00, 0.00, '4 Hours', '', '', '', '', '', '', ''),
(124, 'shore', 'Shore Tour from Alexandria or Port Said to Visit Giza Pyramid & Egyptian Museum', 'Alexandria / Port Said / Cairo', 'https://www.egypttourpackages.com/data1/images/Day-Tour-to-Port-said-from-Cairo/3.jpg', 125.00, 0.00, 0.00, 'Full Day', '', '', '', '', '', '', ''),
(125, 'shore', 'Shore 2 Days 1 Night tours to Cairo from Port Said or Alexandria', 'Port Said / Alexandria / Cairo', 'https://www.egypttourpackages.com/data1/images/Day-Tour-to-Port-said-from-Cairo/6.jpg', 300.00, 0.00, 0.00, '2 Days / 1 Night', '', '', '', '', '', '', ''),
(126, 'half', 'Cairo Layover Tours to Giza Pyramids and Sphinx', 'Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/WhatsApp-Image-2019-12-19-at-4.26.29-PM.jpeg', 55.00, 0.00, 0.00, 'Flexible', '', '', '', '', '', '', ''),
(127, 'day', 'Pyramids, Egyptian Museum & Bazaar Layover Tour', 'Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/egypt_pyramids1111.jpg', 60.00, 0.00, 0.00, 'Flexible', '', '', '', '', '', '', ''),
(128, 'day', 'Local Day Tour To Giza Pyramids, Saladin Citadel & Egyptian Museum', 'Cairo', 'https://media.tacdn.com/media/attractions-splice-spp-674x446/0f/27/64/69.jpg', 50.00, 0.00, 0.00, '8 Hours', '', '', '', '', '', '', ''),
(129, 'half', 'Cairo half day Tour to Memphis & Sakkara Pyramids', 'Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2019/11/WhatsApp-Image-2019-10-11-at-8.14.05-PM-1.jpeg', 35.00, 0.00, 0.00, '4 Hours', '', '', '', '', '', '', ''),
(130, 'day', 'Historical Day Tour to Giza Pyramids, Saqqara and Dahshur Pyramids', 'Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2018/09/dahshour-red-bent-pyramids-day-tour-camel-ride-cairo-excursion-day-tours-egypt-excursions.jpg', 50.00, 0.00, 0.00, 'Full Day', '', '', '', '', '', '', ''),
(131, 'transfer', 'Transfer from Luxor to Aswan', 'Luxor / Aswan', 'https://egypttravelsquare.com/3abar-data/uploads/2019/11/WhatsApp-Image-2019-10-11-at-8.14.04-PM-1.jpeg', 100.00, 0.00, 0.00, '3.5 Hours', '', '', '', '', '', '', ''),
(132, 'transfer', 'Private Transfer from Luxor to Hurghada', 'Luxor / Hurghada', 'https://egypttravelsquare.com/3abar-data/uploads/2019/11/WhatsApp-Image-2019-10-11-at-8.14.04-PM-1.jpeg', 100.00, 0.00, 0.00, '3.5 Hours', '', '', '', '', '', '', ''),
(133, 'day', 'Day tour to Luxor from Aswan', 'Aswan / Luxor', 'https://egypttravelsquare.com/3abar-data/uploads/2018/09/egypt-excursions-luxor-excursion-day-tours.jpg', 120.00, 0.00, 0.00, '14 Hours', '', '', '', '', '', '', ''),
(134, 'half', 'Luxor Half Day Tour to West Bank of Luxor visiting Valley of the Kings', 'Luxor', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/temple-of-hatshupsut_COVER.jpg', 40.00, 0.00, 0.00, '6 Hours', '', '', '', '', '', '', ''),
(135, 'half', 'Luxor Hot air Balloon ride in Luxor', 'Luxor', 'https://egypttravelsquare-com.stackstaging.com/wp-content/uploads/2026/06/WhatsApp-Image-2021-10-13-at-8.17.49-PM-1.jpeg', 85.00, 0.00, 0.00, '2 Hours', '', '', '', '', '', '', ''),
(136, 'day', 'Day tour to Giza Pyramids, Egyptian Museum and Bazaar from Sharm El Sheik by plane', 'Sharm / Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2019/11/WhatsApp-Image-2019-10-09-at-6.28.43-PM-1.jpeg', 315.00, 0.00, 0.00, '14 Hours', '', '', '', '', '', '', ''),
(137, 'half', 'Short Felucca Ride on the Nile River', 'Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/cairo72016.jpg', 30.00, 0.00, 0.00, '2 Hours', '', '', '', '', '', '', ''),
(138, 'half', 'Sound and Light Show at Giza Pyramids', 'Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/sound-and-light-show-at-giza-pyramids.jpg', 55.00, 0.00, 0.00, '2-3 Hours', '', '', '', '', '', '', ''),
(139, 'half', 'Sound and Light show at Karnak Temple in Luxor', 'Luxor', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/karnak-sound-light-show2.jpg', 45.00, 0.00, 0.00, '2 Hours', '', '', '', '', '', '', ''),
(140, 'day', 'Day trip to St Catherine from Sharm-El-sheikh', 'Sinai Peninsula', 'https://egypttravelsquare.com/3abar-data/uploads/2019/11/StCatherine_thmb.jpg', 85.00, 0.00, 0.00, '10 Hours', '', '', '', '', '', '', ''),
(141, 'day', 'Giza Pyramids, Egyptian Museum & Old Cairo Stopover', 'Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2019/11/WhatsApp-Image-2019-10-11-at-8.14.07-PM.jpeg', 60.00, 0.00, 0.00, 'Flexible', '', '', '', '', '', '', ''),
(142, 'half', 'Submarine trip in Sharm El Sheikh', 'Sharm El Sheikh', 'https://egypttravelsquare.com/3abar-data/uploads/2018/09/tour-packages-classical-egypt-tours.jpg', 60.00, 0.00, 0.00, '3 Hours', '', '', '', '', '', '', ''),
(143, 'half', 'Tour to Wekalet El Ghoury for Tanoura Egyptian Heritage Dance Show', 'Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/tour-to-wekalet-el-ghoury-for-tanoura-egyptian-heritage-dance-show2.jpg', 45.00, 0.00, 0.00, '4 Hours', '', '', '', '', '', '', ''),
(144, 'day', 'Snorkeling trip in Tiran Island by Boat in Sharm El Sheikh', 'Tiran Island', 'https://egypttravelsquare.com/3abar-data/uploads/2019/11/WhatsApp-Image-2019-10-11-at-8.14.05-PM-1.jpeg', 40.00, 0.00, 0.00, '8 Hours', '', '', '', '', '', '', ''),
(145, 'half', 'Traditional Food Tour to Eat Mouthwatering Local Dishes', 'Cairo', 'https://touringinegypt.com/wp-content/uploads/2025/11/traditional-egypt-food.jpg', 40.00, 0.00, 0.00, '4 Hours', '', '', '', '', '', '', ''),
(146, 'half', 'Unbelievable Cairo tour visiting a real Egyptian village by TukTuk ride', 'Cairo', 'https://egypttravelsquare.com/3abar-data/uploads/2018/09/cat_cairo.jpg', 40.00, 0.00, 0.00, '4 Hours', '', '', '', '', '', '', ''),
(147, 'day', 'Wadi El Natrun Day tour to from Alexandria', 'Alexandria', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/Wadi-El-Natrun-Day-tour.jpg', 55.00, 0.00, 0.00, '8 Hours', '', '', '', '', '', '', ''),
(148, 'half', 'Luxor Half Day Tour to West Bank of Luxor', 'Luxor', 'https://egypttravelsquare.com/3abar-data/uploads/2019/12/temple-of-hatshupsut_COVER.jpg', 40.00, 0.00, 0.00, '6 Hours', '', '', '', '', '', '', '');

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
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `description`, `video_path`) VALUES
(4, 'egypt', 'a', '1789241764_vid.mp4');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=416;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
