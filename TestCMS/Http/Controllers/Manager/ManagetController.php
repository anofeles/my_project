<?php


namespace TestCMS\Http\Controllers\Manager;


use TestCMS\Http\Controllers\Controller;

class ManagetController extends Controller
{
    public $pasuxebi = array();


    function SignalDetecTest($swori, $raod, $chdilistart, $chdilifinish, $sworipasx_raod)
    {
        if ($swori >= $raod) {
            if ($sworipasx_raod == 2) {
                $swori = 2;
            } elseif ($sworipasx_raod == 1) {
                $swori = 1;
            } else {
                $swori = rand(1, 2);
            }
        } else {
            $swori = 0;
        }
        $carieli = rand(1, 9);
        $araswori = rand(intval($chdilistart), intval($chdilifinish)) - $swori;
        $sul = $araswori + $swori;
        $procenti = $sul / 100 * 80;
        $raodenoba = $sul - 27 - $carieli;
        $pasuxebis_jami = 0;
        $procentijamis = "false";
        if ($raodenoba <= 0) {
            $procentijamis = "true";
            $pasuxebis_jami = $procenti;
        } else {

            $procentijamis = "false";
            if ($raodenoba >= 27) {
                $pasuxebis_jami = 27 - $carieli;
            } else {
                $pasuxebis_jami = $raodenoba;
            }
        }
        $ganlageba = rand(1, 6);

        $this->pasuxebi['swori'] = $swori;
        $this->pasuxebi['araswori'] = $araswori;
        $this->pasuxebi['ganlageba'] = $ganlageba;
        $this->pasuxebi['procenti'] = $procentijamis;
        $this->pasuxebi['raodenoba'] = $pasuxebis_jami;
        return $this->pasuxebi;
    }

    function percept($swori, $raodenoba, $sworipas)
    {
        $charactersbig = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomStringbig = '';
        for ($i = 0; $i < 1; $i++) {
            $index = rand(0, strlen($charactersbig) - 1);
            $randomStringbig .= $charactersbig[$index];
        }

        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomStringsmal = '';
        $seqtorei = '';
        for ($i = 0; $i < 1; $i++) {
            $index = rand(0, strlen($characters) - 1);
            if ($sworipas >= $raodenoba) {
                $sworipasnax = intval($sworipas / 2);
                if ($raodenoba > $sworipasnax) {
                    $seqtorei .= "სახელწოდებით მსგავსება";
                }

                if (lcfirst($randomStringbig) == lcfirst($characters[$index])) {
                    $randomStringsmal .= $characters[$index];

                } else {
                    $randomStringsmal .= $randomStringbig;

                }
                if ($raodenoba <= $sworipasnax) {
                    $seqtorei .= "ფიზიკური მსგავსება";
                    if (ctype_upper($randomStringsmal)) {
                        $randomStringsmal = mb_strtolower($randomStringsmal);
                    } else {

                        $randomStringsmal = mb_strtoupper($randomStringsmal);
                    }
                }
                $this->pasuxebi['persbigpass'] = 'true';
            } else {
                $seqtorei .= "განსხვავებული";
                if (lcfirst($randomStringbig) != lcfirst($characters[$index])) {
                    $randomStringsmal .= $characters[$index];
                } else {
                    for ($i = 0; $i < 1; $i++) {
                        $index = rand(0, strlen($characters) - 1);
                        $randomStringsmal .= $characters[$index];
                    }
                }
                $this->pasuxebi['persbigpass'] = "false";
            }
        }
        $this->pasuxebi['seqtorei'] = $seqtorei;
        $this->pasuxebi['persbig'] = $randomStringbig;
        $this->pasuxebi['perssmol'] = $randomStringsmal;
        return $this->pasuxebi;
    }

    function strup($swori, $raod, $neitraluripas)
    {
        $kofiguration = '';
        $color = array('#ff0000', '#0000ff', '#009933', '#ffff00');
        $colortext = array('წითელი', 'ლურჯი', 'მწვანე', 'ყვითელი');
        $neitraluri = array('სახლი', 'კარი', 'ხე', 'სკამი', 'ავტომობილი', 'ლარნაკი', 'საათი', 'თასი', 'ქვა', 'ფეხსაცმელი',
            'საინი', 'კიბე', 'კლიტე', 'სათვალე', 'თოხი', 'ჩანთა', 'წიგნი', 'გასაღები', 'ფანჯარა', 'თვითფრინავი',
            'შარვალი', 'მაისური', 'პიჯაკი', 'დოქი', 'ქარხანა', 'ქოლგა', 'თასმა', 'გაზეთი', 'ტახტი', 'კალამი',
            'ფანქარი', 'ბროშურა', 'აბრა', 'მატარებელი', 'ჭიკარტი', 'ჭაღი', 'ჭერი', 'იატაკი', 'ბორბალი', 'ბოძი',
            'შუშა', 'ღილი', 'ლურსმანი', 'ჰამაკი', 'ჯოხი', 'ბადე', 'ბურთი', 'აგური', 'ზღვა', 'გემი');
        $gilakebi = array('w', 'l', 'm', 'y');
        $colorindex = rand(0, 3);
        $colortextindex = rand(0, 3);
        $neitraluriindex = rand(0, 49);
        $raodgay = $swori / 2;
        $this->pasuxebi['strupcolor'] = $color[$colorindex];
        if ($swori > intval($raod)) {

            if ($raod > $raodgay) {
                $colorindexchange = $colorindex + 1;
                if ($colorindexchange >= 4) {
                    $colorindexchange = $colorindex - 1;
                }
                $colorindex = $colorindexchange;
                $kofiguration .= 'ფერი არ ემთხვევა ტექსტ';
//                dump($colorindex);
            } else {
                $kofiguration .= 'ფერი ემთხვევა ტექსტ';
            }
            $this->pasuxebi['strupcolorindex'] = $colortext[$colorindex];
        }
//        elseif($swori < intval($raodgay) && $swori < $swori){
//            $sity = $colorindex + 1;
//            if($sity > 3){
//                $sity =   $colorindex + 1;
//            }
//            $this->pasuxebi['strupcolorindex'] = $colortext[$sity];
//        }
        else {
            $kofiguration .= 'ფერი და ტექსტი არა თავსებადი';
            if ($neitraluripas + $swori >= $raod) {
                $this->pasuxebi['strupcolorindex'] = $neitraluri[$neitraluriindex];
            } else {
                if ($colorindex == $colortextindex) {
                    if ($colortextindex + 1 == 4) {
                        $textper = $colortextindex - 1;
                    } else {
                        $textper = $colortextindex + 1;
                    }
                } else {
                    $textper = $colortextindex;
                }
                $this->pasuxebi['strupcolorindex'] = $colortext[$textper];
            }
        }
        $this->pasuxebi['kofiguration'] = $kofiguration;
        $this->pasuxebi['gilaki'] = $gilakebi[$colorindex];
        return $this->pasuxebi;
    }

    function selec($raod, $rigit, $pirveli, $saoindex)
    {
        $pirveliaso = [
            'H'/*, 'Q', 'I', 'R', 'S', 'B', 'P', 'V', 'F', 'D'*/
        ];
        $meoreaso = [
            'S'/*, 'L', 'O', 'K', 'M', 'Z', 'N', 'B', 'X', 'T'*/
        ];
        $meorenawili = intval(($raod - $pirveli) / 2);
        $rigitgay = intval($pirveli / 2);
        if ($pirveli >= $rigit) {
            $this->pasuxebi['pirveliaso'] = $pirveliaso[0];
            $this->pasuxebi['meoreaso'] = $meoreaso[0];
            $rigitgaysamadpir = intval($rigitgay / 3);
            $rigitgaysamadmeo = intval($rigitgay - $rigitgaysamadpir);
            if ($rigitgay >= $rigit) {
                $this->pasuxebi['pirvelivarian'] = 1;
                if ($rigitgaysamadpir >= $rigit) {
                    $shet1 = intval($rigitgaysamadpir / 2);
                    if ($shet1 >= $rigit) {
//                        $this->pasuxebi['pirveliaso'] = $meoreaso[0];
//                        $this->pasuxebi['meoreaso'] = $pirveliaso[0];
                    }
                    $this->pasuxebi['dashorebap'] = 1;
                }
                if ($rigitgaysamadpir <= $rigit && $rigitgaysamadmeo >= $rigit) {
                    $shemo = intval(($rigitgaysamadmeo / 2) + (intval($rigitgaysamadpir / 2)));

                    if ($rigitgaysamadpir <= $rigit && $shemo >= $rigit) {
//                        $this->pasuxebi['pirveliaso'] = $meoreaso[0];
//                        $this->pasuxebi['meoreaso'] = $pirveliaso[0];
                    }
                    $this->pasuxebi['dashorebap'] = 2;
                }
                if ($rigitgaysamadpir <= $rigit && $rigitgaysamadmeo <= $rigit) {
                    $shema = (intval($rigitgaysamadpir / 2) + $rigitgaysamadmeo);
                    if ($rigitgaysamadpir <= $rigit && $shema <= $rigit) {
//                        $this->pasuxebi['pirveliaso'] = $meoreaso[0];
//                        $this->pasuxebi['meoreaso'] = $pirveliaso[0];
                    }
                    $this->pasuxebi['dashorebap'] = 3;
                }
            }
            if ($meorenawili >= $rigit && $rigitgay <= $rigit) {
                $meoraod = $rigitgay + $rigitgaysamadpir;
                $meoraodmeore = $rigitgay + $rigitgaysamadmeo;
                if ($rigitgay <= $rigit && $meoraod >= $rigit) {

                    $shema = (intval($rigitgay / 2) + (intval($meoraod / 2)));
                    if ($rigitgay <= $rigit && $shema >= $rigit) {
                        $this->pasuxebi['pirveliaso'] = $meoreaso[0];
                        $this->pasuxebi['meoreaso'] = $pirveliaso[0];
                    }
                    $this->pasuxebi['dashorebam'] = 1;
                } elseif ($rigitgay <= $rigit && $meoraodmeore >= $rigit) {
                    $shema = ($meoraodmeore - intval($rigitgaysamadpir / 2));
                    if ($shema >= $rigit) {
                        $this->pasuxebi['pirveliaso'] = $meoreaso[0];
                        $this->pasuxebi['meoreaso'] = $pirveliaso[0];
                    }
                    $this->pasuxebi['dashorebam'] = 2;
                } else {
                    $shema = ($meoraodmeore + intval($rigitgaysamadpir / 2));
                    if ($shema >= $rigit) {
                        $this->pasuxebi['pirveliaso'] = $meoreaso[0];
                        $this->pasuxebi['meoreaso'] = $pirveliaso[0];
                    }
                    $this->pasuxebi['dashorebam'] = 3;
                }

                $this->pasuxebi['pirvelivarian'] = 2;
            }
        }
        if ($pirveli <= $rigit) {
            $mesamedi = intval($raod / 3 * 2);
            if ($mesamedi <= $rigit) {
                $this->pasuxebi['pirvelivarian'] = 4;
                $dash1 = intval((intval($mesamedi / 3)) / 2) + $mesamedi;
                $dash2 = intval((intval($mesamedi / 3))) + $mesamedi;
                if ($dash1 >= $rigit) {
                    $this->pasuxebi['dashorebabolo'] = 1;
                } elseif ($dash2 >= $rigit) {
                    $this->pasuxebi['dashorebabolo'] = 2;
                } else {
                    $this->pasuxebi['dashorebabolo'] = 3;
                }
                $this->pasuxebi['pirveliaso'] = $meoreaso[0];
            } else {
                $this->pasuxebi['pirvelivarian'] = 3;
                $shema = intval($mesamedi / 3 * 2);
                $dash = intval(($mesamedi / 3) / 2) + $shema;
                if ($shema >= $rigit) {
                    $this->pasuxebi['dashorebames'] = 1;
                } elseif ($dash >= $rigit) {
                    $this->pasuxebi['dashorebames'] = 2;
                } else {
                    $this->pasuxebi['dashorebames'] = 3;
                }
                $this->pasuxebi['pirveliaso'] = $pirveliaso[0];
            }
            $characters = [
                'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
            ];
            $mererand = rand(0, 23);
            if ($characters[$mererand] == $this->pasuxebi['pirveliaso']) {
                $mererand1 = $mererand + 1;
                if ($mererand1 == 24) {
                    $mererand1 = $mererand - 1;
                }
                $this->pasuxebi['meoreaso'] = $characters[$mererand1];
            } else {
                $this->pasuxebi['meoreaso'] = $characters[$mererand];
            }
        }
//        dump($this->pasuxebi);
        return $this->pasuxebi;
    }

    function reqdrogen($raod, $pirv, $meore, $mesam, $pir, $meor, $mesame, $meotze)
    {
        $piraso = [
            'A', 'B', 'C', 'D', 'E', 'F'
        ];
        $meoraso = [
            'G', 'H', 'I', 'J', 'K', 'L'
        ];
        $mesamaso = [
            'M', 'N', 'O', 'P', 'Q', 'R'
        ];
        $meotxaso = [
            'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
        ];
        $kebors = [
            'N', 'M', 'Z', 'X'
        ];

        if ($raod <= $pirv) {
            $this->pasuxebi['pirveli'] = $piraso[$pir];
            $this->pasuxebi['pirvelikei'] = $kebors[0];
            $this->pasuxebi['meore'] = $meoraso[$meor];
            $this->pasuxebi['meorekei'] = $kebors[1];
        }
        if ($raod <= $meore) {
            $this->pasuxebi['mesame'] = $mesamaso[$mesame];
            $this->pasuxebi['mesamekey'] = $kebors[2];
            $this->pasuxebi['meotxe'] = $meotxaso[$meotze];
            $this->pasuxebi['meotxekey'] = $kebors[3];
        }
        return $this->pasuxebi;
    }

    function mentaltest($start, $finish, $range)
    {
        $kutxe = range(intval($start), intval($finish), intval($range));
        $kutxrand = rand(0, count($kutxe) - 1);
        $sarke = rand(0, 1);
        $characters = [
            'B', 'C', 'D', 'E', 'F', 'G', 'J', 'L', 'N', 'P', 'Q', 'R', 'Z'
        ];
        $mererand = rand(0, 12);

        if ($kutxe[$kutxrand] == 180) {
            $sarke = 0;
        }
        $this->pasuxebi['testaso'] = $characters[$mererand];
        $this->pasuxebi['kutxe'] = $kutxe[$kutxrand];
        $this->pasuxebi['sarke'] = $sarke;
        return $this->pasuxebi;
    }

    function cnobistest($rand, $rov)
    {
        $gay = intval($rov / 6);
        if ($rand <= $gay) {
            $prand = rand(1, 9);
            $ars = rand(1, 9);
            $this->pasuxebi['gamosacnobi'] = $ars;
            $this->pasuxebi['dasamaxsovrebeli'] = $prand;
            $this->pasuxebi['rov'] = $gay;
        } elseif ($this->pasuxebi['rov'] + $gay >= $rand) {
            $ars = rand(1, 9);
            $prand = rand(10, 99);
            $this->pasuxebi['gamosacnobi'] = $ars;
            $this->pasuxebi['dasamaxsovrebeli'] = $prand;
            $this->pasuxebi['rov1'] = $gay + $gay;
        } elseif ($this->pasuxebi['rov1'] + $gay >= $rand) {
            $ars = rand(1, 9);
            $prand = rand(100, 999);
            $this->pasuxebi['gamosacnobi'] = $ars;
            $this->pasuxebi['dasamaxsovrebeli'] = $prand;
            $this->pasuxebi['rov2'] = $gay + $gay + $gay;
        } elseif ($this->pasuxebi['rov2'] + $gay >= $rand) {
            $ars = rand(1, 9);
            $prand = rand(1000, 9999);
            $this->pasuxebi['gamosacnobi'] = $ars;
            $this->pasuxebi['dasamaxsovrebeli'] = $prand;
            $this->pasuxebi['rov3'] = $gay + $gay + $gay + $gay;
        } elseif ($this->pasuxebi['rov3'] + $gay >= $rand) {
            $ars = rand(1, 9);
            $prand = rand(10000, 99999);
            $this->pasuxebi['gamosacnobi'] = $ars;
            $this->pasuxebi['dasamaxsovrebeli'] = $prand;
        } else {
            $ars = rand(1, 9);
            $prand = rand(100000, 999999);
            $this->pasuxebi['gamosacnobi'] = $ars;
            $this->pasuxebi['dasamaxsovrebeli'] = $prand;
        }


        return $this->pasuxebi;
    }

    function lewsgad($raod, $row)
    {
        $nawili = intval($row / 3);
        $shinmsgavs = [
            'თითი-ფრჩხილი',
'რკო-საბანი',
'ყაყაჩო-წითელი',
'ხმალი-ფოლადი',
'რეცხვა-საპონი',
'თევზი - წყალი',
'პოეტი - ლექსი',
'ქება - ძაგება',
'ჭიქა - ლამბაქი',
'ბუზი - კოღო',
'ხელოვნება - მუსიკა',
'ნიჭი - წარმატება',
'მტევანი - ვაზი',
'ლამაზი - მახინჯი',
'კიტრი - ბოსტნეული',
'საათი - ისარი',
'შაქარი - ტკბილი',
'ცული - წინდა',
'სურა - თიხა',
'დასვენება - სავარძელი',
'თაფლი - ფიჭა',
'მჭედელი - ნალი',
'დაჯილდოება - დასჯა',
'ფანჯრები - კარები',
'წერა - კითხვა',
'გაზი - აზოტი',
'დინამიტი - აფეთქება',
'გუგა -თვალი',
'ნათელი - ბნელი',
'კვადრატი - ფიგურა',
'წიგნი - გვერდი',
'ლიმონი - ყვითელი',
'სარკე - ნამგალი',
'ტყავი - ფეხსაცმელი',
'კერვა - ნემსი',
'მაწონი - ქილა',
'დურგალი - ავეჯი',
'უძრაობა - მოძრაობა',
'ნიჩაბი - ნავი',
'ფიჭვი - ნაძვი',
'სპორტი - ტენისი',
'ცეცხლი - სითბო',
'ფრთა- მერცხალი',
'მაღალი - დაბალი',
'ჭიანჭველა - მწერი',
'სახლი - სახურავი',
'ბალახი - მწვანე',
'ნაბადი - ფირფიტა',
'სკამი - ხე',
'თხრა - ბარი',
'ბაყაყი - ჭაობი',
'რძე - ყველი',
'სიყვარული - სიძულვილი',
'ქარხანა - მილი',
'მატარებელი - გემი',
'ლითონი - რკინა',
'დარტყმა - ყვირილი',
'სახელო - ხალათი',
'ბლაგვი - მახვილი',
'ტილო - მატერია',
'თავი - წვერი',
'სამართებელი - ბარსი',
'სანთელი - ხალიჩა',
'ფქვილი - პური',
'თიბვა - ცელი',
'ბორანი - მდინარე',
'მხატვარი - სურათი',
'გამარჯვება - დამარცხება',
'დაფა - ცარცი',
'რვეული - ჟურნალი',
        ];
        $shinardamtx = [
            'ტყე-ზარი',
'ქინძისთავი - ღრუბელი',
'ნაცარი - ასო',
'ნაყოფი - კალამი',
'საღებავი - აზრი',
'ყური - ბორცვი',
'აუდიტორია - ზეთი',
'კუნძული - ტვირთი',
'სამკუთხედი - მარილი',
'ზღვა - ლურსმანი',
'ქაღალდი - ვაკე',
'ნისლი- დოქი',
'ასანთი - რუკა',
'წერაქვი - ფარდა',
'ბუხარი - ლენტი',
'ჩრდილოეთი - ზეწარი',
'წესი - კვამლი',
'ყურადღება - ეკალი',
'მინდორი- დანა',
'მარმარილო - ევოლუცია',
'ტბა - ცომი',
'თოხი - ღიმილი',
'ბრძანება - ნისკარტი',
'ქვა- ავტორი',
'თმა - რადიო',
'იარაღი- მცენარე',
'მოგება - ცოტა',
'ნაჭუჭი - დრამა',
'მაგარი - თებერვალი',
'ფიზიკა - დამსახურება',
'გასაღები - სასმელი',
'ნახშირი - ბაქანი',
'იალქანი - სისულელე',
'ბოთლი - სასახლე',
'ყიდვა - ცა',
'ჯეჯილი - თოფი',
'ცხვარი - აბრეშუმი',
'სიმამაცე - რიგი',
'კედელი - მძიმე',
'კურდღელი - ჯიბე',
'ტანსაცმელი - ქვეწარმავალი',
'საწამლავი - პატარა',
'ინგლისი - აივანი',
'მოკლე- დასველება',
'ქალაქი - ცოცხი',
'ბურთი - ყავა',
'ბეჭედი - აბლაბუდა',
'ხორბალი - ბოროტება',
'ოპტიმიზმი - სკოლა',
'ქათამი - ბანკი',
'ღერო - წამალი',
'მთვარე - სპილენძი',
'მუშა - მჭადი',
'კასრი - სიმი',
'სწორი - მჟავე',
'ბიძა - პლანეტა',
'როიალი - მსხვილი',
'ბუმბული - შენობა',
'ჭიდაობა - ავადმყოფობა',
'ცოდნა - ქინძი',
'დათვი - თვალი',
'სიზარმაცე - იხვი',
'ყურძენი - სიბეჯით',
'დურბინდი - ღვინო',
'ბატი - სწავლა',
'მწვანილი - ბუნაგი',
'გაცივება - გვიმრა',
'სართული - საქანელა',
'დედამიწა - ონკანი',
'ჩონგური - ნათესავი'
        ];
        $ushishubars = ['ყიდვა - ბიგვა',
'ჯეჯილი - მეხალი',
'ფული - ფუმბი',
'მინდორი - სიკნოლი',
'ჭერი - ტესი',
'კედელი - მედგენი',
'კურდღელი - ბურტყონი',
'ციყვი - ბროყი',
'პალტო - სპოლკი',
'შარფი - ჩალპი',
'ჭკუა - ჯპოა',
'წვიმა - ცვეპა',
'სიკეთე - მიქეტა',
'მუშა - ლუჩა',
'მჭადი - ბრატე',
'კასრი -მაზრი',
'სიმი - პილი',
'სწორი -ზორკი',
'მჟავე - მზაკი',
'ბიძა -ბიჟღა',
'პლანეტა - ფლატება',
'როიალი - რიოელა',
'მსხვილი - ბსხრილი',
'ბუმბული  -პუმპილი',
'შენობა - ჩემაპა',
'ჭიდაობა - ჯინჭაობა',
'ავადმყოფობა - ანვაყოფოლი',
'ცოდნა - სოტნა',
'ქინძი - კიმზი',
'დათვი - თათხო',
'თვალი - ტვომი',
'სიზარმაცე  - საზარბაწი',
'იხვი - იხბი',
'ყურძენი - ბურზინი',
'სიბეჯითე - სიმეძიტი',
'დურბინდი - დარბუნტი',
'ღვინო - გვენუ',
'ბატი - პათი',
'სწავლა - სწაპრი',
'მწვანილი - წნავიმი',
'ბუნაგი - ბუნგარი',
'გაცივება - გასიბობა',
'გვიმრა - გრიმლა',
'სართული -მალთური',
'საქანელა -საქლელა',
'დედამიწა - დედებისა',
'ონკანი - ოქნანი',
'ჩონგური - შანგული',
'ნათესავი - ნამესაბი',
'ქუჩა - ქუშე',
'ფესვი - ნესბი',
'მზე - ბძე',
'რეზინი - მეზილი',
'ცოცხი - ფორცხე',
'ჭაობი - ჩაომპი',
'ტენისი - ტონიზი',
'ოქრო- ორპო',
'ჩაი - შაე',
'კაკალი - პაპანი',
'ხომალდი - ჰოფოლტი',
'მედია- ნეთია',
'ქოთანი - კომანი',
'კამა - ქაპა',
'მადუღარა - სადღუარა',
'ინტერნეტი - ინეტრტენი',
'ჯამი - ჩამპი',
'ნისლი - ისვლი',
'ფარი -ფლალი',
'რაცია - ბრასია',
'ლიმონი - მილონი',
];
        $uazro = [
            'გთანი',
'კირბონი',
'რუდრე',
'დიკშერი',
'სერსოტი',
'მაჭესი',
'ვისპერი',
'ფარზენდი',
'რიქშა',
'დრუგი',
'ედეზი',
'ევოლი',
'პიმი',
'საგუნი',
'ჯგუპრი',
'იალქმავი',
'ცარსი',
'ზარკუ',
'წესქბილი',
'ათწვირადი',
        ];
        $random = rand(0,69);
        $randomuazr = rand(0,19);
        if ($raod <= $nawili) {
            $this->pasuxebi['nomer'] = $raod;
            $pirgay = intval($nawili/3);
            if($raod <= $pirgay){
                $gaysity = explode('-',$ushishubars[$random]);
                $this->pasuxebi['zeda'] = $gaysity[0];
                $this->pasuxebi['qveda'] = $gaysity[1];
                $this->pasuxebi['rovga'] = $pirgay + $pirgay;
                $this->pasuxebi['varinat'] = 1;//zeda uazro
            }
            elseif($raod <= $this->pasuxebi['rovga']){
                $gaysity = explode('-',$ushishubars[$random]);
                $this->pasuxebi['zeda'] = $gaysity[1];
                $this->pasuxebi['qveda'] = $gaysity[0];
                $this->pasuxebi['varinat'] = 2;//qveda uazro
            }
            else{
                $gaysity = explode('-',$ushishubars[$random]);
                $this->pasuxebi['zeda'] = $uazro[$randomuazr];
                $this->pasuxebi['qveda'] = $gaysity[1];
                $this->pasuxebi['varinat'] = 3;//orive uazro
            }
            $this->pasuxebi['rov'] = $nawili;
        }
        elseif($this->pasuxebi['rov'] + $nawili <= $raod){
            $gaysity = explode('-',$shinardamtx[$random]);
            $this->pasuxebi['zeda'] = $gaysity[1];
            $this->pasuxebi['qveda'] = $gaysity[0];
            $this->pasuxebi['rov1'] = $nawili + $nawili;
            $this->pasuxebi['varinat'] = 4;//shinarisi ara msgavsi
        }
        else{
            $gaysity = explode('-',$shinmsgavs[$random]);
            $this->pasuxebi['zeda'] = $gaysity[1];
            $this->pasuxebi['qveda'] = $gaysity[0];
            $this->pasuxebi['varinat'] = 5;//shinarsiani msgavsi
        }
    }

    function infgadproc ($sul,$raod){
        $avejswormagal = [
            'სკამი ავეჯია',
            'კარადა ავეჯია',
            'მაგიდა ავეჯია',
            'საწოლი ავეჯია',
        ];
        $avejsworsashval = [
            'ტორშერი ავეჯია',
            'მერხი ავეჯია',
            'ტელევიზორი ავეჯია',
            'ტაბურეტი ავეჯია',
        ];
        $avejswordabal = [
            'ხალიჩა ავეჯია',
            'ღუმელი ავეჯია',
            'დახლი ავეჯია',
            'ვენტილატორი ავეჯია',
        ];
        $xiliswormagal = [
            'ვაშლი ხილია',
            'მსხალი ხილია',
            'ფორთოხალი ხილია',
            'ბანანი ხილია',
        ];
        $xilisworsashval = [
            'გრეიფურტი ხილი',
            'მარწყვი ხილია',
            'ანანასი ხილია',
            'ალუბალი ხილია',
        ];
        $xiliswordabal = [
            'ნესვი ხილია',
            'თბილი ხილია',
            'ლიმონი ხილია',
            'მაყვალი ხილია',
        ];
        $transswormagal = [
            'ავტომობილი ტრანსპორტია',
            'სატვირთო ავტომობილი ტრანსპორტია',
            'ავტობუსი ტრანსპორტია',
            'სასწრაფოს მანქანა ტრანსპორტია',
        ];
        $transsworsashval = [
            'თვითმფრინავი ტრანსპორტია',
            'ველოსიპედი ტრანსპორტია',
            'ტრამვაი ტრანსპორტია',
            'ნავი ტრანსპორტია',
        ];
        $transswormart = [
            'მარხილი ტრანსპორტია',
            'ეტლი ტრანსპორტია',
            'ვაგონი ტრანსპორტია',
            'ტრაქტორი ტრანსპორტია',
        ];
        $iaragswormagal = [
            'პისტოლეტი იარაღია',
            'ხმალი იარაღია',
            'დანა იარაღია',
            'თოფი იარაღია',
        ];
        $iaragsworsashval = [
            'რაკეტა იარაღია',
            'ისარი იარაღია',
            'ქვემეხი იარაღია',
            'ხელკეტი იარაღია',
        ];
        $iaragswordabal = [
            'მათრახი იარაღია',
            'შურდული იარაღია',
            'მშვილდი იარაღია',
            'მუშტი იარაღია',
        ];
        $bostswormagal = [
            'ჭარხალი ბოსტნეულია',
            'სტაფილო ბოსტნეულია',
            'კომბოსტო ბოსტნეულია',
            'კიტრი ბოსტნეულია',
        ];
        $bostsworsashval = [
            'ნიახური ბოსტნეულია',
            'ბოლოკი ბოსტნეულია',
            'პომიდორი ბოსტნეულია',
            'ლობიო ბოსტნეულია',
        ];
        $bostswordabal = [
            'სოკო ბოსტნეულია',
            'სიმინდი ბოსტნეულია',
            'მწვანე ხახვი',
            'გოგრა ბოსტნეულია',
        ];
        $samiaragswormagali = [
            'ჩაქუჩი სამუშაო იარაღია',
            'ცული  სამუშაო იარაღია',
            'ლურსმანი სამუშაო იარაღია',
            'ხერხი სამუშაო იარაღია',
        ];
        $samiaragsworsashval = [
            'სახრახნისი სამუშაო იარაღია',
            'ჭანჭიკი სამუშაო იარაღია',
            'კიბე სამუშაო იარაღია',
            'სარჩილავი სამუშაო იარაღია',
        ];
        $samiaragswordabal = [
            'გრდემლი სამუშაო იარაღია',
            'მაკრატელი სამუშაო იარაღია',
            'ფიცარი სამუშაო იარაღია',
            'პინცეტი სამუშაო იარაღია',
        ];
        $frinvepswormagal = [
            'ბეღურა ფრინველია',
            'მერცხალი ფრინველია',
            'შოშია ფრინველია',
            'იადონი ფრინველია',
        ];
        $frinvepsworsashval = [
            'თუთიყუში ფრინველია',
            'არწივი ფრინველია',
            'ბუ ფრინველია',
            'ქორი ფრინველია',
        ];
        $frinvepswordabal = [
            'პინგვინი ფრინველია',
            'ინდაური ფრინველია',
            'ფარშევანგი ფრინველია',
            'წიწილა ფრინველია',
        ];
        $sportswormagal = [
            'ფეხბურთი სპორტია',
            'კალათბურთი სპორტია',
            'ცურვა სპორტია',
            'ტენისი სპორტია',
        ];
        $sportsworsahsvalo = [
            'მშვილდოსნობა სპორტია',
            'ჭოკით ხტომა სპორტია',
            'ფარიკაოა სპორტია',
            'პინგ-პონგი სპორტია',
        ];
        $sportswordabal = [
            'ჭადრაკი სპორტია',
            'ცხენოსნობა სპორტია',
            'თევზაობა სპორტია',
            'ნადირობა სპორტია',
        ];
        $tansswormagal = [
            'შარვალი ტანსაცმელია',
            'კაბა ტანსაცმელია',
            'მაისური ტანსაცმელია',
            'ქურთუკი ტანსაცმელია',
        ];
        $tanssworsahs = [
            'წინდა ტანსაცმელია',
            'საცუროა კოსტიუმი ტანსაცმელია',
            'საწვიმარი ტანსაცმელია',
            'კეპი ტანსაცმელია',
        ];
        $tansswordabal = [
            'თმის სამაგრი ტანსაცმელია',
            'ყელსაბამი ტანსაცმელია',
            'ხელთათამანი ტანსაცმელია',
            'ცხვირსახოცი ტანსაცმელია',
        ];
        $cxovswormagal = [
            'ძაღლი ცხოველია',
            'ლომი ცხოველია',
            'დათვი ცხოველია',
            'ვეფხვი ცხოველია',
        ];
        $cxovsworsash = [
            'აქლემი ცხოველია',
            'ენოტი ცხოველია',
            'მარტორქა ცხოველია',
            'კენგურუ ცხოველია',
        ];
        $cxovswordabal = [
            'კუ ცხოველია',
            'ბაყაყი ცხოველია',
            'მაიმუნი ცხოველია',
            'ნიანგი ცხოველია',
        ];

        $randswor = rand(0,3);

        $avejaraswor = [
            'ბორბალი არის ავეჯი',
            'მაგალითი არის ავეჯი',
            'სიტყვა არის ავეჯი',
            'ვირთხა არის ავეჯი',
            'ქვა არის ავეჯი',
            'სტრუქტურა არის ავეჯი',
            'ბრინჯი არის ავეჯი',
            'ენა არის ავეჯი',
            'სისტემა არის ავეჯი',
            'ქოთანი არის ავეჯი',
            'ფეხი არის ავეჯი',
        ];
        $xiliaraswor = [
            'მარილი არის ხილი',
            'ნისლი არის ხილი',
            'ნამცხვარი არის ხილი',
            'თვალი არის ხილი',
            'გასაღები არის ხილი',
            'გველი არის ხილი',
            'იატაკი არის ხილი',
            'შეკითხვა არის ხილი',
            'საღებავი არის ხილი',
            'კალათა არის ხილი',
            'ბუჩქი არის ხილი',
            'ლანგარი არის ხილი',
        ];
        $transaraswor = [
            'კლუბი არის ტრანსპორტი',
            'არკა არის ტრანსპორტი',
            'მაღაზია არის ტრანსპორტი',
            'დრო არის ტრანსპორტი',
            'ფერი არის ტრანსპორტი',
            'ნათურა არის ტრანსპორტი',
            'კუთხე არის ტრანსპორტი',
            'სუბსტანცია არის ტრანსპორტი',
            'ძროხა არის ტრანსპორტი',
            'ჯაგრისი არის ტრანსპორტი',
            'ხმა არის ტრანსპორტი',
            'ექიმი არის ტრანსპორტი',
        ];
        $iaragaraswor = [
            'მინდორი არის იარაღი',
            'და არის იარაღი',
            'სუნთქვა არის იარაღი',
            'მაისური არის იარაღი',
            'ბავშვი არის იარაღი',
            'კონტროლი არის იარაღი',
            'მხარე არის იარაღი',
            'ლოკოკინა არის იარაღი',
            'ხეები არის იარაღი',
            'ჭიანჭველა არის იარაღი',
            'რეაქცია არის იარაღი',
            'მეილბოქსი არის იარაღი',
        ];
        $bostaraswori = [
            'ძაფი არის ბოსტნეული',
            'ზამთარი არის ბოსტნეული',
            'ტრანსპორტი არის ბოსტნეული',
            'შაქარი არის ბოსტნეული',
            'სურვილი არის ბოსტნეული',
            'სამუშაო არის ბოსტნეული',
            'ღუმელი არის ბოსტნეული',
            'მელანი არის ბოსტნეული',
            'ღობე არის ბოსტნეული',
            'სინანული არის ბოსტნეული',
            'კაცი არის ბოსტნეული',
            'წიწილა არის ბოსტნეული',
        ];
        $samiaragaraswor = [
            'ექსპერტი არის სამუშაო იარაღი',
            'სასმელი არის სამუშაო იარაღი',
            'მატარებელი არის სამუშაო იარაღი',
            'ბომბი არის სამუშაო იარაღი',
            'სახელი არის სამუშაო იარაღი',
            'ამინდი არის სამუშაო იარაღი',
            'არგუმენტი არის სამუშაო იარაღი',
            'კალენდარი არის სამუშაო იარაღი',
            'ჩანთა არის სამუშაო იარაღი',
            'კარტი არის სამუშაო იარაღი',
            'კომპანია არის სამუშაო იარაღი',
            'კონსერვი არის სამუშაო იარაღი',
        ];
        $frinaraswor = [
            'დედამიწა არის ფრინველი',
            'ქუდი არის ფრინველი',
            'კარი არის ფრინველი',
            'ოქრო არის ფრინველი',
            'გაზაფხული არის ფრინველი',
            'საზღვარი არის ფრინველი',
            'სადგური არის ფრინველი',
            'რძე არის ფრინველი',
            'ყურძენი არის ფრინველი',
            'ზომა არის ფრინველი',
            'კუნთი არის ფრინველი ',
            'ჩანაწერი არის ფრინველი',
        ];
        $sportaraswor = [
            'ირემი არის სპორტი',
            'ქარი არის სპორტი',
            'შანსი არის სპორტი',
            'წყალი არის სპორტი',
            'მკურნალობა არის სპორტი',
            'კედელი არის სპორტი',
            'დაბინძურება არის სპორტი',
            'ცხვირი არის სპორტი',
            'ჩრდილი არის სპორტი',
            'სიმღერა არის სპორტი',
            'ცოდნა არის სპორტი',
            'კვამლი არის სპორტი',
        ];
        $tansaraswor = [
            'რჩევა არის ტანსაცმელი',
            'მეხსირება არის ტანსაცმელი',
            'ეფექტი არის ტანსაცმელი',
            'სხივი არის ტანსმაცმელი',
            'იმპულსი არის ტანსაცმელი',
            'ლითონი არის ტანსაცმელი',
            'დივანი არის ტანსაცმელი',
            'ცხენი არის ტანსაცმელი',
            'სადილი არის ტანსაცმელი',
            'ქალი არის ტანსაცმელი',
            'შემოსავალი არის ტანსაცმელი',
            'ზარი არის ტანსაცმელი',
        ];
        $cxovelaraswor = [
            'ძვალი არის ცხოველი',
            'დონე არის ცხოველი',
            'არსებობა არის ცხოველი',
            'რკინიგზა არის ცხოველი',
            'საპონი არის ცხოველი',
            'რწმენა არის ცხოველი',
            'ბოთლი არის ცხოველი',
            'ჟელე არის ცხოველი',
            'ყველი არის ცხოველი',
            'დილა არის ცხოველი',
            'სუნი არის ცხოველი',
            'სათამაშო არის ცხოველი',
        ];

        $arasworrand = rand(0,9);

        $meated = $sul / 10;
        $sworaraswor = intval(($meated/2));
        if($raod <= $meated){
            $this->pasuxebi['part_row0'] = $meated;
            $this->pasuxebi['part_row'] = $meated+$meated;
            $this->pasuxebi['variant']=1;
            $swara = intval($meated / 2);
            if($raod <= $swara){
                $sworday = intval($swara / 3);
                if($raod <= $sworday){
                    $this->pasuxebi['pasux'] = $avejswormagal[$randswor];
                    $this->pasuxebi['var'] = 1;
                    $this->pasuxebi['sworday'] = $sworday+$sworday;
                }
                elseif($raod <= $this->pasuxebi['sworday']){
                    $this->pasuxebi['pasux'] = $avejsworsashval[$randswor];
                    $this->pasuxebi['var'] = 2;
                }
                else{
                    $this->pasuxebi['pasux'] = $avejswordabal[$randswor];
                    $this->pasuxebi['var'] = 3;
                }
            }
            else{
                $this->pasuxebi['var'] = 4;
                $this->pasuxebi['pasux'] = $avejaraswor[$arasworrand];
            }
        }
        elseif($raod <= $this->pasuxebi['part_row']){
            $this->pasuxebi['part_row1'] = $meated+$meated+$meated;
            $this->pasuxebi['variant']=2;
            $swara = intval($this->pasuxebi['part_row1'] / 2);
            if($raod <= $swara){
                $sworday = intval(($this->pasuxebi['part_row'] - $swara) / 3);
                $this->pasuxebi['sworday1'] = $sworday+$sworday;
                if($raod <= $sworday+$this->pasuxebi['part_row0']){
                    $this->pasuxebi['pasux'] = $xiliswormagal[$randswor];
                    $this->pasuxebi['var'] = 1;
                }
                elseif($raod <= $this->pasuxebi['sworday1']+$this->pasuxebi['part_row0']){
                    $this->pasuxebi['pasux'] = $xilisworsashval[$randswor];
                    $this->pasuxebi['var'] = 2;
                }
                else{
                    $this->pasuxebi['pasux'] = $xiliswordabal[$randswor];
                    $this->pasuxebi['var'] = 3;
                }
            }
            else{
                $this->pasuxebi['var'] = 4;
                $this->pasuxebi['araswor'] = $xiliaraswor[$arasworrand];
            }
        }
        elseif($raod <= $this->pasuxebi['part_row1']){
            $this->pasuxebi['part_row2'] = $meated+$meated+$meated+$meated;
            $this->pasuxebi['variant']=3;
            $swara = intval($this->pasuxebi['part_row'] + $sworaraswor);
            if($raod <=$swara){
                $sworday = intval(($this->pasuxebi['part_row1']-$swara) / 3);
                $this->pasuxebi['sworday2'] = $sworday+$sworday;
                if($raod <= $sworday +$this->pasuxebi['part_row']){
                    $this->pasuxebi['pasux'] = $transswormagal[$randswor];
                    $this->pasuxebi['var'] = 1;

                }
                elseif($raod <= $this->pasuxebi['sworday2']+$this->pasuxebi['part_row']){
                    $this->pasuxebi['pasux'] = $transsworsashval[$randswor];
                    $this->pasuxebi['var'] = 2;
                }
                else{
                    $this->pasuxebi['pasux'] = $transswormart[$randswor];
                    $this->pasuxebi['var'] = 3;
                }
            }
            else{
                $this->pasuxebi['var'] = 4;
                $this->pasuxebi['araswor'] = $transaraswor[$arasworrand];
            }
        }
        elseif($raod <= $this->pasuxebi['part_row2']){
            $this->pasuxebi['part_row3'] = $meated+$meated+$meated+$meated+$meated;
            $this->pasuxebi['variant']=4;
            $swara = intval($this->pasuxebi['part_row1']  + $sworaraswor);
            if($raod <=$swara){
                $sworday = intval(($this->pasuxebi['part_row2']-$swara) / 3);$this->pasuxebi['sworday3'] = $sworday+$sworday;

                if($raod <= $sworday+$this->pasuxebi['part_row1']){
                    $this->pasuxebi['pasux'] = $iaragswormagal[$randswor];
                    $this->pasuxebi['var'] = 1;

                }
                elseif($raod <= $this->pasuxebi['sworday3']+$this->pasuxebi['part_row1']){
                    $this->pasuxebi['pasux'] = $iaragsworsashval[$randswor];
                    $this->pasuxebi['var'] = 2;
                }
                else{
                    $this->pasuxebi['pasux'] = $iaragswordabal[$randswor];
                    $this->pasuxebi['var'] = 3;
                }
            }
            else{
                $this->pasuxebi['var'] = 4;
                $this->pasuxebi['araswor'] = $iaragaraswor[$arasworrand];
            }
        }
        elseif($raod <= $this->pasuxebi['part_row3']){
            $this->pasuxebi['part_row4'] = $meated+$meated+$meated+$meated+$meated+$meated;
            $this->pasuxebi['variant']=5;
            $swara = intval($this->pasuxebi['part_row2'] + $sworaraswor);
            if($raod <=$swara){
                $sworday = intval(($this->pasuxebi['part_row3']-$swara) / 3);$this->pasuxebi['sworday4'] = $sworday+$sworday;
                if($raod <= $sworday+$this->pasuxebi['part_row2']){
                    $this->pasuxebi['pasux'] = $bostswormagal[$randswor];
                    $this->pasuxebi['var'] = 1;

                }
                elseif($raod <= $this->pasuxebi['sworday4']+$this->pasuxebi['part_row2']){
                    $this->pasuxebi['pasux'] = $bostsworsashval[$randswor];
                    $this->pasuxebi['var'] = 2;
                }
                else{
                    $this->pasuxebi['pasux'] = $bostswordabal[$randswor];
                    $this->pasuxebi['var'] = 3;
                }
            }
            else{
                $this->pasuxebi['var'] = 4;
                $this->pasuxebi['araswor'] = $bostaraswori[$arasworrand];
            }
        }
        elseif($raod <= $this->pasuxebi['part_row4']){
            $this->pasuxebi['part_row5'] = $meated+$meated+$meated+$meated+$meated+$meated+$meated;
            $this->pasuxebi['variant']=6;
            $swara = intval($this->pasuxebi['part_row3'] + $sworaraswor);
            if($raod <=$swara){
                $sworday = intval(($this->pasuxebi['part_row4']-$swara) / 3);$this->pasuxebi['sworday5'] = $sworday+$sworday;
                if($raod <= $sworday+$this->pasuxebi['part_row3']){
                    $this->pasuxebi['pasux'] = $samiaragswormagali[$randswor];
                    $this->pasuxebi['var'] = 1;

                }
                elseif($raod <= $this->pasuxebi['sworday5']+$this->pasuxebi['part_row3']){
                    $this->pasuxebi['pasux'] = $samiaragsworsashval[$randswor];
                    $this->pasuxebi['var'] = 2;
                }
                else{
                    $this->pasuxebi['pasux'] = $samiaragswordabal[$randswor];
                    $this->pasuxebi['var'] = 3;
                }
            }
            else{
                $this->pasuxebi['var'] = 4;
                $this->pasuxebi['araswor'] = $samiaragaraswor[$arasworrand];
            }
        }
        elseif($raod <= $this->pasuxebi['part_row5']){
            $this->pasuxebi['part_row6'] = $meated+$meated+$meated+$meated+$meated+$meated+$meated+$meated;
            $this->pasuxebi['variant']=7;
            $swara = intval($this->pasuxebi['part_row4'] + $sworaraswor);
            if($raod <=$swara){
                $sworday = intval(($this->pasuxebi['part_row5']-$swara) / 3);$this->pasuxebi['sworday6'] = $sworday+$sworday;
                if($raod <= $sworday+$this->pasuxebi['part_row4']){
                    $this->pasuxebi['pasux'] = $frinvepswormagal[$randswor];
                    $this->pasuxebi['var'] = 1;

                }
                elseif($raod <= $this->pasuxebi['sworday6']+$this->pasuxebi['part_row4']){
                    $this->pasuxebi['pasux'] = $frinvepsworsashval[$randswor];
                    $this->pasuxebi['var'] = 2;
                }
                else{
                    $this->pasuxebi['pasux'] = $frinvepswordabal[$randswor];
                    $this->pasuxebi['var'] = 3;
                }
            }
            else{
                $this->pasuxebi['var'] = 4;
                $this->pasuxebi['araswor'] = $frinaraswor[$arasworrand];
            }
        }
        elseif($raod <= $this->pasuxebi['part_row6']){
            $this->pasuxebi['part_row7'] = $meated+$meated+$meated+$meated+$meated+$meated+$meated+$meated+$meated;
            $this->pasuxebi['variant']=8;
            $swara = intval($this->pasuxebi['part_row5'] + $sworaraswor);
            if($raod <=$swara){
                $sworday = intval(($this->pasuxebi['part_row6']-$swara) / 3);$this->pasuxebi['sworday7'] = $sworday+$sworday;
                if($raod <= $sworday+$this->pasuxebi['part_row5']){
                    $this->pasuxebi['pasux'] = $sportswormagal[$randswor];
                    $this->pasuxebi['var'] = 1;

                }
                elseif($raod <= $this->pasuxebi['sworday7']+$this->pasuxebi['part_row5']){
                    $this->pasuxebi['pasux'] = $sportsworsahsvalo[$randswor];
                    $this->pasuxebi['var'] = 2;
                }
                else{
                    $this->pasuxebi['pasux'] = $sportswordabal[$randswor];
                    $this->pasuxebi['var'] = 3;
                }
            }
            else{
                $this->pasuxebi['var'] = 4;
                $this->pasuxebi['araswor'] = $sportaraswor[$arasworrand];
            }
        }
        elseif($raod <= $this->pasuxebi['part_row7']){
            $this->pasuxebi['part_row8'] = $meated+$meated+$meated+$meated+$meated+$meated+$meated+$meated+$meated+$meated;
            $this->pasuxebi['variant']=9;
            $swara = intval($this->pasuxebi['part_row6'] + $sworaraswor);
            if($raod <=$swara){
                $sworday = intval(($this->pasuxebi['part_row7']-$swara) / 3);$this->pasuxebi['sworday8'] = $sworday+$sworday;
                if($raod <= $sworday+$this->pasuxebi['part_row6']){
                    $this->pasuxebi['pasux'] = $tansswormagal[$randswor];
                    $this->pasuxebi['var'] = 1;

                }
                elseif($raod <= $this->pasuxebi['sworday8']+$this->pasuxebi['part_row6']){
                    $this->pasuxebi['pasux'] = $tanssworsahs[$randswor];
                    $this->pasuxebi['var'] = 2;
                }
                else{
                    $this->pasuxebi['pasux'] = $tansswordabal[$randswor];
                    $this->pasuxebi['var'] = 3;
                }
            }
            else{
                $this->pasuxebi['var'] = 4;
                $this->pasuxebi['araswor'] = $tansaraswor[$arasworrand];
            }
        }
        else{
            $this->pasuxebi['part_row9'] = $meated+$meated+$meated+$meated+$meated+$meated+$meated+$meated+$meated+$meated+$meated;
            $swara = intval($this->pasuxebi['part_row7'] + $sworaraswor);
            $this->pasuxebi['variant']=10;
            if($raod <=$swara){
                $sworday = intval(($this->pasuxebi['part_row8']-$swara) / 3); $this->pasuxebi['sworday9'] = $sworday+$sworday;
                if($raod <= $sworday+$this->pasuxebi['part_row7']){
                    $this->pasuxebi['pasux'] = $cxovswormagal[$randswor];
                    $this->pasuxebi['var'] = 1;

                }
                elseif($raod <= $this->pasuxebi['sworday9']+$this->pasuxebi['part_row7']){
                    $this->pasuxebi['pasux'] = $cxovsworsash[$randswor];
                    $this->pasuxebi['var'] = 2;
                }
                else{
                    $this->pasuxebi['pasux'] = $cxovswordabal[$randswor];
                    $this->pasuxebi['var'] = 3;
                }
            }
            else{
                $this->pasuxebi['var'] = 4;
                $this->pasuxebi['araswor'] = $cxovelaraswor[$arasworrand];
            }
        }
    }

}
