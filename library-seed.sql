-- Starter library data (same content as pest_library_data.dart)
-- Run this once, after database.sql
SET NAMES utf8mb4;

INSERT INTO library_items (slug, type, name, local_name, scientific_name, description, cause, symptoms, prevention) VALUES

-- ── PESTS ──
('bph', 'pest', 'Brown Planthopper', 'Kayumangging Ipis-dapo', 'Nilaparvata lugens',
'Maliit at kayumangging insekto na sumisipsip ng katas ng palay at nagkukumpulan sa ibaba ng tangkay. Isa ito sa pinakamapaminsalang peste ng palay sa Asya, at nakakapagpasa rin ng grassy stunt at ragged stunt virus.',
'Dumadami sa mainit at mahalumigmig na panahon. Sumasabog ang populasyon nito kapag sobra ang nitrogen fertilizer, masyadong siksik ang tanim, at sobra ang paggamit ng insecticide na pumapatay sa natural na kalaban nito (gagamba, wasps).',
'Naninilaw at natutuyo ang ibabang dahon. May "hopperburn": mga bahagi ng bukid na nagiging kayumanggi at namamatay na parang nasunog. Bansot ang tubo at kaunti ang suwi (tillers).',
'Magtanim ng resistant variety. Iwasan ang sobrang nitrogen. Bigyan ng tamang pagitan ang mga tanim para may daloy ng hangin. Protektahan ang natural na kalaban sa pamamagitan ng pagbawas sa paggamit ng broad-spectrum insecticide. I-monitor ang bukid linggo-linggo sa vegetative stage.'),

('black_bug', 'pest', 'Rice Black Bug', 'Itim na Susô ng Bigas', 'Scotinophara coarctata',
'Madilim na kayumanggi hanggang itim na bug na kumakain sa tangkay at leaf sheath ng palay. Pinakaaktibo ito sa ibaba ng halaman tuwing gabi.',
'Gusto nito ang tuloy-tuloy na pagtatanim ng palay na walang pahinga (fallow), at ang mga madamong lugar malapit sa bukid na pinagtataguan nila sa pagitan ng mga season.',
'"Bugburn": kulay orange hanggang mapula-pulang kayumanggi at natutuyong dahon, bansot na halaman, walang laman o kalahati lang ang laman ng butil, at mukhang nasunog ang buong bahagi ng bukid.',
'Sabay-sabay na pagtatanim kasama ang mga kalapit na bukid. Linisin ang madamong gilid at tanggalin ang mga damo. Gumamit ng light traps para i-monitor at bawasan ang adult na bug. Mag-crop rotation kung posible.'),

('golden_snail', 'pest', 'Golden Apple Snail', 'Kuhol', 'Pomacea canaliculata',
'Tubig-tabang na susô na may ginintuan hanggang kayumangging shell. Matakaw ito sa murang punla ng palay. Isa ito sa pinakamasamang invasive species sa mga palayan sa Pilipinas.',
'Dinala noon bilang pagkain, at kumalat sa mga irrigation canal. Dumadami sa binabahang bukid na may nakatigil na tubig, tulad ng transplanted o wet-seeded na palay.',
'Putol ang punla malapit sa ugat at lumulutang. May mga nawawalang halaman kaya nagkakaroon ng puwang sa hanay. May kulay rosas na kumpol ng itlog sa tangkay o pader ng kanal, sa itaas ng tubig.',
'Pumulot ng kuhol at ng mga itlog nito. Panatilihing mababaw ang tubig sa unang 2–3 linggo pagkatapos mag-transplant. Maglagay ng screen sa pasukan ng kanal. Magpasok ng bibe sa bukid kapag matatag na ang tanim. Gumamit ng molluscicide bilang huling opsyon lang.'),

('rice_bug', 'pest', 'Rice Bug', 'Kayumanggi', 'Leptocorisa oratorius',
'Payat, kayumanggi-berdeng bug na may matapang na amoy. Sumisipsip ito ng katas direkta mula sa mga butil ng palay habang nasa milky stage.',
'Naaakit sa namumulaklak na palay at sa mga damo sa paligid. Dumadami kapag magkakaiba ang oras ng pamumulaklak ng mga kalapit na bukid, dahil tuloy-tuloy ang pagkain nila.',
'May maitim o kayumangging batik ang butil, walang laman o kalahati lang ang laman ("pecky"), chaffy ang panicle, at mabaho sa paligid ng mga halamang maraming peste.',
'Pagsabayin ang petsa ng pagtatanim sa mga kalapit na bukid. Tanggalin ang mga damo at iba pang halamang tinutuluyan nila sa gilid ng bukid. Gumamit ng light trap o sweep-net para bilangin ang bug bago mag-spray.'),

('stem_borer', 'pest', 'Yellow Stem Borer', 'Uod sa Puno ng Palay', 'Scirpophaga incertulas',
'Larva ng isang gamu-gamo na bumubutas sa tangkay ng palay. Kumakain ito sa loob at pinuputol ang daloy ng sustansya papunta sa growing point o panicle.',
'Nangingitlog ang gamu-gamo sa dahon, napipisa ang larva, at pumapasok sa tangkay. Nabubuhay ang peste sa pagitan ng mga season dahil sa tuloy-tuloy na pagtatanim ng palay at sa mga natirang puno (stubble) sa bukid.',
'"Deadheart": nagiging kayumanggi at namamatay ang gitnang usbong sa vegetative stage. "Whitehead": pumuputi at nagiging walang laman ang buong panicle sa reproductive stage, at madaling mabunot kapag hinila.',
'I-araro o sunugin ang stubble pagkatapos ng ani para mapatay ang mga larva. Iwasan ang magkakaibang oras ng pagtatanim sa iisang lugar. Gumamit ng pheromone traps para i-monitor ang gamu-gamo. Magtanim ng resistant variety.'),

('leaffolder', 'pest', 'Rice Leaffolder', 'Tagapiko ng Dahon', 'Cnaphalocrocis medinalis',
'Uod na tinutupi at pinagdidikit ng sapot ang mga dahon ng palay. Kumakain ito sa ibabaw ng dahon sa loob ng tubong ginawa nito.',
'Paborito nito ang malago, siksik, at mabigat sa nitrogen na tanim, pati ang mga gamu-gamong galing sa madamo o maraming damong lugar. Mas dumadami ang gamu-gamo kapag mahalumigmig at maulap ang panahon.',
'Nakarolyo o nakatupi nang pahaba ang dahon na may sapot. May puti o transparent na guhit kung saan kinayod ng uod ang ibabaw ng dahon. Mula sa malayo, mukhang gula-gulanit at nasunog ang canopy.',
'Iwasan ang sobrang nitrogen. Panatilihing walang madamong damo ang gilid ng bukid. Alagaan ang natural na kalaban tulad ng gagamba at parasitic wasps. I-monitor, at gamutin lang kapag lumampas na sa economic threshold ang pinsala.'),

('armyworm', 'pest', 'Rice Armyworm', 'Uod na Hukbo', 'Mythimna separata',
'Uod na gumagalaw nang malalaking grupo ("hukbo"). Mabilis nitong hinuhubaran ng dahon ang palay, at sa malalang outbreak, buong halaman sa loob lang ng magdamag.',
'Madalas mag-outbreak pagkatapos ng malakas na ulan kasunod ng tagtuyot. Maaaring lumipad nang malayo ang mga gamu-gamo papasok sa bukid mula sa madamo o grain-crop na lugar.',
'Biglaan at matinding pagkain sa dahon, gula-gulanit o ubos ang gilid ng dahon, nagkukumpulan ang mga uod sa ilalim ng halaman kapag araw, at may mga patch ng hubad na tangkay na lumilitaw halos magdamag.',
'Regular na mag-scout sa bukid, lalo na pagkatapos ng malakas na ulan. Panatilihing malinis ang gilid ng bukid para mabawasan ang daanan ng mga gamu-gamo. Agad na magsagawa ng targeted control kapag nakita na ang grupo ng uod, dahil mabilis kumalat ang outbreak.'),

('mole_cricket', 'pest', 'Mole Cricket', 'Kamkam / Kuliglig sa Lupa', 'Gryllotalpa spp.',
'Insektong lumulungga sa lupa sa paligid ng punla. Nabubunot o naputol ang murang halaman habang gumagalaw ito sa lupa.',
'Gusto nito ang maluwag at basang lupa ng bagong tanim o bagong sabog na bukid. Mas aktibo ito sa gabi at sa panahon ng land preparation.',
'Nabunot o nakahilig na punla na magulo ang lupa sa paligid ng ugat, may butas ng lungga malapit sa nasirang halaman, at hindi pantay ang tubo ng tanim pagkatapos mag-transplant.',
'Patagin at patigasin nang mabuti ang lupa bago magtanim. Patuyuin sandali ang bukid kung may aktibong infestation. Gumamit ng light trap sa gabi para bantayan ang adult. Iwasang mag-iwan ng maluwag na organic debris sa lupa na umaakit sa kanila.'),

-- ── DISEASES ──
('blast', 'disease', 'Rice Blast', 'Blas', 'Magnaporthe oryzae (Pyricularia oryzae)',
'Sakit na dulot ng fungus na kayang umatake sa dahon, node, at panicle sa kahit anong yugto ng paglaki. Isa ito sa pinakamapaminsalang sakit ng palay sa buong mundo.',
'Kumakalat ang spores ng fungus sa hangin at talsik ng ulan. Pinapaboran ito ng mataas na humidity, matagal na pagkabasa ng dahon, malamig na gabi, at sobrang nitrogen fertilizer.',
'Hugis-diamante o hugis-suliran na sugat sa dahon na kulay abo ang gitna at kayumanggi ang gilid. Neck rot na nagpapabali at nagpapaputi/nagpapawalang-laman sa panicle. Kapag tinamaan ang node, nababali ang tangkay.',
'Gumamit ng resistant variety. Iwasan ang sobrang nitrogen. Siguraduhing tama ang drainage ng bukid. Iwasan ang siksik na pagtatanim. Mag-fungicide bilang pag-iwas sa mga lugar na madalas tamaan ng blast tuwing mahalumigmig na season.'),

('blb', 'disease', 'Bacterial Leaf Blight', 'Bacterial Leaf Blight (BLB)', 'Xanthomonas oryzae pv. oryzae',
'Sakit na dulot ng bacteria na nagdudulot ng basang guhit sa dahon na lumalaki hanggang maging malalaking tuyot na bahagi. Madalas itong pumapasok sa sugat o natural na butas ng dahon.',
'Kumakalat sa irrigation water, ulang tinatangay ng hangin, at kontaminadong kagamitan o binhi. Lumalala kapag may malakas na hangin/bagyo na nakakasugat sa dahon, at kapag sobra ang nitrogen.',
'Basang sugat na nagsisimula sa dulo o gilid ng dahon, nagiging dilaw, tapos kulay abong-puti habang lumalaki. "Kresek": nalalanta at namamatay ang buong punla sa matinding impeksyon.',
'Gumamit ng certified at walang sakit na binhi. Iwasan ang sobrang nitrogen. Panatilihin ang magandang drainage. Huwag magtrabaho sa bukid kapag basa ang dahon. Tanggalin at sirain ang mga nahawang tira ng halaman pagkatapos ng ani.'),

('tungro', 'disease', 'Rice Tungro Disease', 'Tungro', 'Rice tungro virus complex (RTBV + RTSV)',
'Sakit na dulot ng virus na eksklusibong ipinapasa ng green leafhopper. Nagdudulot ng matinding pagkabansot at pagkawala ng ani, at nagkaroon na ng malalaking outbreak sa Pilipinas noon.',
'Kumakalat lang sa pamamagitan ng pagkain ng green leafhopper, hindi sa binhi o lupa. Ang mga kalapit na nahawang bukid at tuloy-tuloy na host plants ang nagpapahintulot sa leafhopper na dalhin ang virus sa bawat pagtatanim.',
'Dilaw-kahel na kulay na nagsisimula sa dulo ng dahon, bansot at kaunti ang suwi, huli ang pamumulaklak, at baog o kalahati lang ang laman ng panicle.',
'Gumamit ng resistant variety. Pagsabayin ang pagtatanim sa mga kalapit na bukid para maputol ang tuloy-tuloy na pagkain ng leafhopper. Kontrolin agad ang green leafhopper. Agad na bunutin ang mga nahawang halaman (rogueing).'),

('sheath_blight', 'disease', 'Sheath Blight', 'Sheath Blight', 'Rhizoctonia solani',
'Sakit na dulot ng fungus na umaatake sa leaf sheath malapit sa linya ng tubig. Karaniwan ito sa siksik, mataas sa nitrogen, at mataas ang ani na tanim.',
'Nabubuhay ang fungus sa lupa at sa tira ng tanim sa pagitan ng mga season. Pinapaboran ito ng siksik na canopy, mataas na humidity sa loob ng tanim, at mabigat na paggamit ng nitrogen.',
'Hugis-itlog na sugat na kulay abo-berde hanggang kulay-dayami na may kayumangging gilid, sa leaf sheath malapit sa tubig. Nagsasama-sama at umaakyat sa halaman kapag malala. Nabubuwal (lodging) ang halaman sa advanced na impeksyon.',
'Iwasan ang sobrang siksik na pagtatanim. Maingat na pamahalaan ang nitrogen. Pagandahin ang drainage at daloy ng hangin sa bukid. Tanggalin at sirain ang stubble pagkatapos ng ani. Mag-rotate sa non-host crops kung posible.'),

('bakanae', 'disease', 'Bakanae Disease', 'Bakanae', 'Fusarium fujikuroi',
'Sakit na dulot ng fungus na dala ng binhi. Nagdudulot ito ng abnormal at sobrang pagtangkad ng mga nahawang punla, kaya mukha silang mas matangkad at mas payat kaysa sa malulusog na halaman.',
'Pangunahing naipapasa sa pamamagitan ng binhi. Nabubuhay din sa lupa at sa tira ng tanim. Mas madaling kumalat kapag kontaminado ang binhi at mahina ang seed treatment.',
'Sobrang tangkad, maputlang berde, at manipis na punla. Mapulang kulay sa ilalim ng tangkay. Mahina ang pagtubo ng ugat. Namamatay ang halaman bago o ilang sandali pagkatapos mag-transplant.',
'Gumamit ng certified at walang sakit na binhi. Gamutin ang binhi ng mainit na tubig o aprubadong fungicide bago maghasik. Agad na tanggalin at sirain ang mga nahawang punla. Huwag gamitin muli ang binhi mula sa nahawang tanim.'),

('false_smut', 'disease', 'False Smut', 'False Smut', 'Ustilaginoidea virens',
'Sakit na dulot ng fungus na ginagawang berdeng-dilaw hanggang itim na bola ng spores ang mga butil ng palay. Mas problema ito sa itsura at kalidad ng butil kaysa pamatay ng buong halaman.',
'Nahahawa ang mga bulaklak ng spores ng fungus sa flowering stage. Pinapaboran ito ng mataas na humidity, madalas na ulan habang namumulaklak, at sobrang paggamit ng nitrogen.',
'Napapalitan ang mga butil ng malambot na berdeng-dilaw na bola na umiitim habang tumatanda. Mas malaki kaysa normal ang apektadong butil. Bumababa ang kalidad at halaga ng ani sa merkado.',
'Iwasan ang sobrang nitrogen, lalo na ang huling aplikasyon malapit sa pamumulaklak. Gumamit ng resistant variety kung mayroon. Iwasang magtanim sa panahong inaasahan ang malakas na ulan sa flowering. Mag-fungicide bilang pag-iwas sa mga lugar na madalas tamaan ng sakit.');
