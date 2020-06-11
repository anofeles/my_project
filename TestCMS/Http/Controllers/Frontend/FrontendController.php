<?php

namespace TestCMS\Http\Controllers\Frontend;

use TestCMS\Http\Controllers\Controller;

abstract class FrontendController extends Controller
{
    public $pasuxebi = array();

    public function __construct() {}


    function SignalDetecTest($swori,$raod,$chdilistart,$chdilifinish,$sworipasx_raod){
        if($swori >= $raod){
            if($sworipasx_raod == 2){
                $swori = 2;
            }
            elseif($sworipasx_raod == 1){
                $swori = 1;
            }
            else{
                $swori = rand(1, 2);
            }
        }
        else{
            $swori = 0;
        }
        $carieli = rand(1, 9);
        $araswori = rand(intval($chdilistart), intval($chdilifinish)) - $swori;
        $sul = $araswori + $swori;
        $procenti = $sul / 100 * 80;
        $raodenoba = $sul - 27 - $carieli;
        $pasuxebis_jami = 0;
        $procentijamis = "false";
        if($raodenoba <= 0 ){
            $procentijamis = "true";
            $pasuxebis_jami = $procenti;
        }
        else{
            $procentijamis = "false";
            if($raodenoba >= 27){
                $pasuxebis_jami = 27 - $carieli;
            }
            else{
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

        for ($i = 0; $i < 1; $i++) {
            $index = rand(0, strlen($characters) - 1);
            if($sworipas >= $raodenoba){
                $sworipasnax = intval($sworipas / 2);
//                echo $sworipasnax;
                if(lcfirst($randomStringbig) ==  lcfirst($characters[$index])){
                    $randomStringsmal .= $characters[$index];
                }
                else{
                    $randomStringsmal .= $randomStringbig;
                }
                if($raodenoba <= $sworipasnax){
                    if(ctype_upper($randomStringsmal)){
                        $randomStringsmal = mb_strtolower($randomStringsmal);
//                        echo "Верхний<br>";
                    }else{
                        $randomStringsmal = mb_strtoupper($randomStringsmal);
//                        echo "Нижний<br>";
                    }
                }
                $this->pasuxebi['persbigpass'] = 'true';
            }else{
                if(lcfirst($randomStringbig) !=  lcfirst($characters[$index])){
                    $randomStringsmal .= $characters[$index];
                }
                else{
                    for ($i = 0; $i < 1; $i++) {
                        $index = rand(0, strlen($characters) - 1);
                        $randomStringsmal .= $characters[$index];
                    }
                }
                $this->pasuxebi['persbigpass'] = "false";
            }
        }
        $this->pasuxebi['persbig'] = $randomStringbig;
        $this->pasuxebi['perssmol'] = $randomStringsmal;
        return $this->pasuxebi;
    }

    function strup($swori,$raod,$neitraluripas){
        $color = array('#ff0000','#0000ff','#009933','#ffff00');
        $colortext = array('წითელი','ლურჯი','მწვანე','ყვითელი');
        $neitraluri = array('სახლი','კარი','ხე','სკამი','ავტომობილი','ლარნაკი','საათი','თასი','ქვა','ფეხსაცმელი',
            'საინი','კიბე','კლიტე','სათვალე','თოხი','ჩანთა','წიგნი','გასაღები','ფანჯარა','თვითფრინავი',
            'შარვალი','მაისური','პიჯაკი','დოქი','ქარხანა','ქოლგა','თასმა','გაზეთი','ტახტი','კალამი',
            'ფანქარი','ბროშურა','აბრა','მატარებელი','ჭიკარტი','ჭაღი','ჭერი','იატაკი','ბორბალი','ბოძი',
            'შუშა','ღილი','ლურსმანი','ჰამაკი','ჯოხი','ბადე','ბურთი','აგური','ზღვა','გემი');
        $gilakebi = array('w','l','m','y');
        $colorindex = rand(0,3);
        $colortextindex = rand(0,3);
        $neitraluriindex = rand(0,49);
        $this->pasuxebi['strupcolor']=$color[$colorindex];
        if($swori >= $raod){
            $this->pasuxebi['strupcolorindex']=$colortext[$colorindex];
        }
        else{
            if($neitraluripas + $swori >= $raod){
                $this->pasuxebi['strupcolorindex'] = $neitraluri[$neitraluriindex];
            }
            else {
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
        $this->pasuxebi['gilaki'] = $gilakebi[$colorindex];
        return $this->pasuxebi;
    }

    function selec($raod,$rigit,$pirveli,$saoindex){
        $pirveliaso = [
            'H','Q','I','R','S','B','P','V','F','D'
        ];
        $meoreaso = [
            'S','L','O','K','M','Z','N','B','X','T'
        ];
        $meorenawili = intval(($raod-$pirveli)/2);
        $rigitgay = intval($pirveli/2);
        if($pirveli >= $rigit) {
            $this->pasuxebi['pirveliaso'] = $pirveliaso[$saoindex];
            $this->pasuxebi['meoreaso'] = $meoreaso[$saoindex];
            $rigitgaysamadpir = intval($rigitgay / 3);
            $rigitgaysamadmeo = intval($rigitgay-$rigitgaysamadpir);
            if($rigitgay >= $rigit) {
                $this->pasuxebi['pirvelivarian'] = 1;
                if($rigitgaysamadpir >= $rigit){
                    $shet1 = intval($rigitgaysamadpir / 2);
                    if($shet1 >= $rigit){
                        $this->pasuxebi['pirveliaso'] = $meoreaso[$saoindex];
                        $this->pasuxebi['meoreaso'] = $pirveliaso[$saoindex];
                    }
                    $this->pasuxebi['dashorebap'] = 1;
                }
                if($rigitgaysamadpir <= $rigit && $rigitgaysamadmeo >= $rigit) {
                    $shemo = intval(($rigitgaysamadmeo / 2) + (intval($rigitgaysamadpir / 2)));

                    if($rigitgaysamadpir <= $rigit && $shemo >= $rigit) {
                        $this->pasuxebi['pirveliaso'] = $meoreaso[$saoindex];
                        $this->pasuxebi['meoreaso'] = $pirveliaso[$saoindex];
                    }
                    $this->pasuxebi['dashorebap'] = 2;
                }
                if($rigitgaysamadpir <= $rigit && $rigitgaysamadmeo <= $rigit) {
                    $shema = (intval($rigitgaysamadpir / 2) + $rigitgaysamadmeo);
                    if($rigitgaysamadpir <= $rigit && $shema <= $rigit) {
                        $this->pasuxebi['pirveliaso'] = $meoreaso[$saoindex];
                        $this->pasuxebi['meoreaso'] = $pirveliaso[$saoindex];
                    }
                    $this->pasuxebi['dashorebap'] = 3;
                }
            }
            if($meorenawili >= $rigit && $rigitgay <= $rigit){
                $meoraod = $rigitgay + $rigitgaysamadpir;
                $meoraodmeore = $rigitgay + $rigitgaysamadmeo;
                if($rigitgay <= $rigit &&  $meoraod >= $rigit){
                    $shema = (intval($rigitgay / 2)+(intval($meoraod / 2)));
                    if($rigitgay <= $rigit &&  $shema >= $rigit){
                        $this->pasuxebi['pirveliaso'] = $meoreaso[$saoindex];
                        $this->pasuxebi['meoreaso'] = $pirveliaso[$saoindex];
                    }
                    $this->pasuxebi['dashorebam'] = 1;
                }
                elseif($rigitgay <= $rigit &&  $meoraodmeore >= $rigit){
                    $shema = ($meoraodmeore - intval($rigitgaysamadpir/2));
                    if($shema >= $rigit){
                        $this->pasuxebi['pirveliaso'] = $meoreaso[$saoindex];
                        $this->pasuxebi['meoreaso'] = $pirveliaso[$saoindex];
                    }
                    $this->pasuxebi['dashorebam'] = 2;
                }
                else{
                    $shema = ($meoraodmeore + intval($rigitgaysamadpir/2));
                    if($shema >= $rigit){
                        $this->pasuxebi['pirveliaso'] = $meoreaso[$saoindex];
                        $this->pasuxebi['meoreaso'] = $pirveliaso[$saoindex];
                    }
                    $this->pasuxebi['dashorebam'] = 3;
                }
                $this->pasuxebi['pirvelivarian'] = 2;
            }
        }
        if($pirveli <= $rigit) {
            $mesamedi = intval($raod/3*2);
            if($mesamedi <= $rigit){
                $this->pasuxebi['pirvelivarian']  = 4;
                $dash1 = intval((intval($mesamedi / 3)) / 2) + $mesamedi;
                $dash2 = intval((intval($mesamedi / 3))) + $mesamedi;
               if($dash1 >= $rigit){
                   $this->pasuxebi['dashorebabolo'] = 1;
               }
               elseif ($dash2 >= $rigit){
                   $this->pasuxebi['dashorebabolo'] = 2;
               }
               else{
                   $this->pasuxebi['dashorebabolo'] = 3;
               }
                $this->pasuxebi['pirveliaso'] = $meoreaso[$saoindex];
            }
            else{
                $this->pasuxebi['pirvelivarian']  = 3;
                $shema = intval($mesamedi/3*2);
                $dash = intval(($mesamedi/3) / 2) + $shema;
                if($shema >= $rigit){
                    $this->pasuxebi['dashorebames'] = 1;
                }
                elseif($dash >= $rigit){
                    $this->pasuxebi['dashorebames'] = 2;
                }
                else{
                    $this->pasuxebi['dashorebames'] = 3;
                }
                $this->pasuxebi['pirveliaso'] = $pirveliaso[$saoindex];
            }
            $characters = [
                'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'
            ];
            $mererand = rand(0,23);
            if($characters[$mererand] == $this->pasuxebi['pirveliaso']){
                $mererand1 = $mererand + 1;
                if($mererand1 == 24){
                    $mererand1 = $mererand - 1;
                }
                $this->pasuxebi['meoreaso'] = $characters[$mererand1];
            }
            else{
                $this->pasuxebi['meoreaso'] = $characters[$mererand];
            }
        }
        return $this->pasuxebi;
    }
}

