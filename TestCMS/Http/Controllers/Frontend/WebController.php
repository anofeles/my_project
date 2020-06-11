<?php

namespace TestCMS\Http\Controllers\Frontend;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use Keygen;
use TestCMS\Http\Requests\Manager\Request;
use TestCMS\Models\User;
use TestCMS\Repositories\SignalDetecTestRepositories;
use TestCMS\Repositories\SignalDetecTestPartsRepositories;
use TestCMS\Repositories\SignalDetecTestToAnyRepositories;
use TestCMS\Repositories\RegisterUserRepositories;
use TestCMS\Repositories\RegisterUserToAnyRepositories;
use TestCMS\Repositories\TestsToAnyRepositories;
use TestCMS\Repositories\TestsRepositories;
use TestCMS\Repositories\PerceftCompareTestRepositories;
use TestCMS\Repositories\PerceftCompareTestToAnyRepositories;
use TestCMS\Repositories\PerceftCompareTestPartsRepositories;
use TestCMS\Repositories\StrupEfeqtTestRepositories;
use TestCMS\Repositories\StrupEfeqtTestPartsRepositories;
use TestCMS\Repositories\StrupEfeqtTestToAnyRepositories;
use TestCMS\Repositories\SelectionTestRepositories;
use TestCMS\Repositories\SelectionTestToAnyRepositories;
use TestCMS\Repositories\SelectionTestPartsRepositories;
use TestCMS\Repositories\UserRepositories;


class WebController extends FrontendController
{

//    protected $SignalDetecTestRepositories, $SignalDetecTestPartsRepositories, $SignalDetecTestToAnyRepositories,
//        $RegisterUserRepositories, $RegisterUserToAnyRepositories, $TestsToAnyRepositories, $TestsRepositories,
//        $PerceftCompareTestRepositories, $PerceftCompareTestToAnyRepositories, $PerceftCompareTestPartsRepositories,
//        $StrupEfeqtTestRepositories, $StrupEfeqtTestPartsRepositories, $StrupEfeqtTestToAnyRepositories,
//        $SelectionTestRepositories, $SelectionTestToAnyRepositories, $SelectionTestPartsRepositories,
//        $UserRepositories;
//
//    public function __construct(
//        SignalDetecTestRepositories $SignalDetecTestRepositories,
//        SignalDetecTestPartsRepositories $SignalDetecTestPartsRepositories,
//        RegisterUserRepositories $RegisterUserRepositories,
//        RegisterUserToAnyRepositories $RegisterUserToAnyRepositories,
//        TestsToAnyRepositories $TestsToAnyRepositories,
//        TestsRepositories $TestsRepositories,
//        PerceftCompareTestRepositories $PerceftCompareTestRepositories,
//        PerceftCompareTestToAnyRepositories $PerceftCompareTestToAnyRepositories,
//        PerceftCompareTestPartsRepositories $PerceftCompareTestPartsRepositories,
//        StrupEfeqtTestRepositories $StrupEfeqtTestRepositories,
//        StrupEfeqtTestPartsRepositories $StrupEfeqtTestPartsRepositories,
//        StrupEfeqtTestToAnyRepositories $StrupEfeqtTestToAnyRepositories,
//        SelectionTestRepositories $SelectionTestRepositories,
//        SelectionTestToAnyRepositories $SelectionTestToAnyRepositories,
//        SelectionTestPartsRepositories $SelectionTestPartsRepositories,
//        SignalDetecTestToAnyRepositories $SignalDetecTestToAnyRepositories,
//        UserRepositories $UserRepositories
//    )
//    {
//        $this->SignalDetecTestRepositories = $SignalDetecTestRepositories;
//        $this->SignalDetecTestPartsRepositories = $SignalDetecTestPartsRepositories;
//        $this->SignalDetecTestToAnyRepositories = $SignalDetecTestToAnyRepositories;
//        $this->RegisterUserRepositories = $RegisterUserRepositories;
//        $this->RegisterUserToAnyRepositories = $RegisterUserToAnyRepositories;
//        $this->TestsToAnyRepositories = $TestsToAnyRepositories;
//        $this->TestsRepositories = $TestsRepositories;
//        $this->PerceftCompareTestRepositories = $PerceftCompareTestRepositories;
//        $this->PerceftCompareTestToAnyRepositories = $PerceftCompareTestToAnyRepositories;
//        $this->PerceftCompareTestPartsRepositories = $PerceftCompareTestPartsRepositories;
//        $this->StrupEfeqtTestRepositories = $StrupEfeqtTestRepositories;
//        $this->StrupEfeqtTestPartsRepositories = $StrupEfeqtTestPartsRepositories;
//        $this->StrupEfeqtTestToAnyRepositories = $StrupEfeqtTestToAnyRepositories;
//        $this->SelectionTestRepositories = $SelectionTestRepositories;
//        $this->SelectionTestToAnyRepositories = $SelectionTestToAnyRepositories;
//        $this->SelectionTestPartsRepositories = $SelectionTestPartsRepositories;
//        $this->UserRepositories = $UserRepositories;
//    }

//    public function index()
//    {
//        $hashed_random_password = Hash::make('1234');
//        echo $hashed_random_password.'<br>';
//        $check = Hash::check('1234', $hashed_random_password);
//        echo $check;
//        echo '<br>';

//        return view('thems.herd_pages.index');
//    }

//    function registration($locale = 'ka',Request $request){
//        App::setLocale($locale);
//        if($request->method() == 'POST') {
//            $request->validate([
//                'email' => 'required|email|unique:users',
//                'pass' => 'required|min:6',
//            ],
//                [
//                    'email.unique' => 'We`re sorry. This mail is already registered.',
//                ]
//            );
//            $pass = Hash::make($request->pass);
//            $addiser = [
//                'uuid' => Uuid::uuid4(),
//                'user' => $request->user,
//                'status' => 1,
//                'password' => $pass,
//            ];
//            $reg = $this->RegisterUserRepositories->makeRecord($addiser, true);
//            $adduser = [
//              'uuid' => $reg->uuid,
//              'name' => $request->name,
//              'email' => $request->email,
//              'status' => $reg->status,
//              'ip' => '*',
//                'password' =>$reg->password
//            ];
//            $this->UserRepositories->makeRecord($adduser,true);
//            $reg->translateOrNew($locale)->name = $request->name;
//            $reg->translateOrNew($locale)->lname = $request->lname;
//            $reg->translateOrNew($locale)->email = $request->email;
//            $reg->save();
//        }
//        return view('thems.common.registration');
//    }

    function admin($locale = 'ka'){

        $user = Auth::user();
        App::setLocale($locale);
//        dd($user);
        if(isset($user->email) && !empty($user->email)){
            return redirect('/backend/user/index');
        }
        else{
            return view('thems.common.admin');
        }
    }

    public function logout()
    {
        $user = Auth::user();
        $user = User::find($user->id);
        Auth::login($user);
        return redirect('/');
    }

//    function signalAdd($locale = 'ka', Request $request)
//    {
//        App::setLocale($locale);
//
//        $user = $this->RegisterUserRepositories->Registertoanirepo(1)->get();
//        $signfirst = $this->SignalDetecTestRepositories->where('uuid', '=', $user[0]['pivot']->row_uuid)->get();
//        $raodswori = 0;
//        $sabolooswori = 0;
//        for ($i = 0; $i < $signfirst[0]->row; $i++) {
//            $raodswori++;
//            $chdilistart = $signfirst[0]->chdilistart;//minimum 40
//            $chdilifinish = $signfirst[0]->chdilifinish;// maximum 70
//            $sworipasx_raod = $signfirst[0]->sworipasx_raod;
//            $this->SignalDetecTest(intval($signfirst[0]->true), $raodswori, $chdilistart, $chdilifinish, $sworipasx_raod);
//
//
////            echo 'swori: '.$this->pasuxebi['swori'].' araswori: '.$this->pasuxebi['araswori'].' procenti:
////            '.$this->pasuxebi['procenti'].' ganlageba: '.$this->pasuxebi['ganlageba'].' raodenoba: '.$this->pasuxebi['raodenoba']."<br>";
//
//            if (intval($signfirst[0]->true) < intval($raodswori)) {
//                $swori = 0;
//            } else {
//                $swori = $this->pasuxebi['swori'];
//            }
//            $addquery = [
//                'uuid' => Uuid::uuid4(),
//                'Correct' => $this->pasuxebi['swori'],
//                'Wrong' => $this->pasuxebi['araswori'],
//                'procenti' => $this->pasuxebi['procenti'],
//                'arrangement' => $this->pasuxebi['ganlageba'],
//                'Quantity' => $this->pasuxebi['raodenoba']
//            ];
////            dump($addquery);
//            $addquiz = $this->SignalDetecTestPartsRepositories->makeRecord($addquery, true);
//            $addqueryElemnt = [
//                'Signal_detec_test_uuid' => $signfirst[0]->uuid,
//                'row_uuid' => $addquiz->uuid
//            ];
//            $this->SignalDetecTestToAnyRepositories->create($addqueryElemnt);
//            $addquiz->save();
//        }
//    }
//
////    function signalJson(Request $request)
////    {
////        App::setLocale($request->local);
////        $signal = array();
////        foreach ($this->RegisterUserRepositories->Registertoanirepo(4)->get() as $signalheaditem) {
////            foreach ($this->SignalDetecTestRepositories->where('uuid', '=', $signalheaditem['pivot']->row_uuid)->get() as $signlaitem) {
////                $signal = [
////                    'title' => $signlaitem->title,
////                    'desc' => $signlaitem->desc,
////                    'taim' => $signlaitem->time,
////                    'testtaim' => $signlaitem->timetest
////                ];
////                foreach ($this->SignalDetecTestRepositories->Signaltoanijoin($signlaitem->uuid)->get() as $signaturequeri) {
////                    foreach ($this->SignalDetecTestPartsRepositories->where('uuid', '=', $signaturequeri['pivot']->row_uuid)->get() as $TestParts) {
////                        $signal['quiz'][] = [
////                            'id' => $TestParts->id,
////                            'Correct' => $TestParts->Correct,
////                            'Wrong' => $TestParts->Wrong,
////                            'procenti' => $TestParts->procenti,
////                            'arrangement' => $TestParts->arrangement,
////                            'Quantity' => $TestParts->Quantity
////                        ];
////                    }
////                }
////            }
////        }
////        return response()->json($signal);
////    }
//
//    function testname($locale = 'ka')
//    {
//        App::setlocale($locale);
//        $testAdd = [
//            'uuid' => Uuid::uuid4(),
//            'key' => 'strupi'
//        ];
////        $testuuid = $this->RegisterUserRepositories->where('id','=',1)->first();
//        $test = $this->TestsRepositories->makeRecord($testAdd, true);
////        $testtoany = [
////            'test_uuid' => $test->uuid,
////            'row_uuid' => $testuuid->uuid
////        ];
////        $this->TestsToAnyRepositories->create($testtoany);
//        $test->translateOrNew($locale)->value = 'სტრუპის ეფექტი';
//        $test->save();
//
//        return view('thems.herd_pages.index');
//    }
//
//    function addsign($locale = 'ka')
//    {
//        App::setLocale($locale);
//        $signadd = [
//            'uuid' => Uuid::uuid4(),
//            'time' => 1000,
//            'row' => 150,
//            'true' => 100,
//            'false' => 50
//        ];
//        $signtest = $this->SignalDetecTestRepositories->makeRecord($signadd, true);
//        $signtest->translateOrNew($locale)->title = 'first';
//        $signtest->translateOrNew($locale)->desc = 'first desc';
//        $signtest->save();
//    }
//
//    function perctesttest($locale = 'ka')
//    {
//        App::setLocale($locale);
//        $user = $this->RegisterUserRepositories->Registertoanirepo(1)->first();
//        $test = $this->TestsRepositories->where('key', '=', 'strupi')->first();
//        $addperc = [
//            'uuid' => Uuid::uuid4(),
//            'raodenoba' => 150,
//            'swori' => 50,
//            'neitraluri' => 50
//        ];
//        $perc = $this->StrupEfeqtTestRepositories->makeRecord($addperc, true);
//        $userperc = [
//            'register_user_uuid' => $user->uuid,
//            'row_uuid' => $perc->uuid
//        ];
//        $this->RegisterUserToAnyRepositories->create($userperc);
//        $testperc = [
//            'test_uuid' => $test->uuid,
//            'row_uuid' => $perc->uuid
//        ];
//        $this->TestsToAnyRepositories->create($testperc);
//        $perc->translateOrNew($locale)->title = 'სტრუპის ეფექტი';
//        $perc->translateOrNew($locale)->desc = 'სტრუპის ეფექტი მოკლე აღწერილობა';
//        $perc->save();
//    }
//
//    /*******percept***********/
//    function perctest($testid = 0, $locale = 'ka')
//    {
//        $percuuid = $this->PerceftCompareTestRepositories->find($testid);
//
////        $damt = 0;
//        $raodenoba = $percuuid->raodenoba;
//        $swori = $percuuid->swori;
//        for ($i = 1; $i <= $raodenoba; $i++) {
//            $this->percept($raodenoba, $i, $swori);
//            $addquiz = [
//                'uuid' => Uuid::uuid4(),
//                'persbig' => $this->pasuxebi['persbig'],
//                'perssmol' => $this->pasuxebi['perssmol'],
//                'persbigpass' => $this->pasuxebi['persbigpass']
//            ];
//            $addpercquiz = $this->PerceftCompareTestPartsRepositories->makeRecord($addquiz, true);
//            $addperctoani = [
//                'perceft_compare_test_uuid' => $addpercquiz->uuid,
//                'row_uuid' => $percuuid->uuid
//            ];
//            $this->PerceftCompareTestToAnyRepositories->create($addperctoani);
//        }
//    }
//
//    /*************strup*********************/
//    function strupviu($strupid, $locale = 'ka')
//    {
//        App::setLocale($locale);
//        $stroptest = $this->StrupEfeqtTestRepositories->find($strupid);
//        if (isset($stroptest->uuid)) {
//            $swori = $stroptest->swori;
//            $neitraluri = intval($stroptest->neitraluri);
//            $raodenoba = $stroptest->raodenoba;
//            for ($i = 1; $i <= $raodenoba; $i++) {
//                $this->strup($swori, $i, $neitraluri);
//                $add = [
//                    'uuid' => Uuid::uuid4(),
//                    'color' => $this->pasuxebi['strupcolor'],
//                    'text' => $this->pasuxebi['strupcolorindex'],
//                    'kebord' => $this->pasuxebi['gilaki']
//                ];
//                $struptest = $this->StrupEfeqtTestPartsRepositories->makeRecord($add, true);
//                $addtoany = [
//                    'strup_efeqt_test_uuid' => $struptest->uuid,
//                    'row_uuid' => $stroptest->uuid
//                ];
//                $this->StrupEfeqtTestToAnyRepositories->create($addtoany);
//                $struptest->save();
//                //echo '<p style="color: ' . $this->pasuxebi['strupcolor'] . '; background-color: #000">' . $this->pasuxebi['strupcolorindex'] . ' / ' . $this->pasuxebi['gilaki'] . '</p>';
//            }
//        }
//    }
//
//    /************selection_test*************/
//
//    function selectiontest($locale = 'ka')
//    {
//        App::setLocale($locale);
//        $raod = 150;
//        $pirveli = 50;
//        $time = 100;
//        $timetest = 1000;
////        $saoindex = rand(0, 9);
//        $add = [
//            'uuid' => Uuid::uuid4(),
//            'row' => $raod,
//            'first' => $pirveli,
//            'time' => $time,
//            'timetest' => $timetest
//        ];
//        $user = $this->RegisterUserRepositories->Registertoanirepo(1)->first();
//        $test = $this->TestsRepositories->where('key', '=', 'selection')->first();
//        $selectadd = $this->SelectionTestRepositories->makeRecord($add,true);
//        $userperc = [
//            'register_user_uuid' => $user->uuid,
//            'row_uuid' => $selectadd->uuid
//        ];
//        $this->RegisterUserToAnyRepositories->create($userperc);
//        $testperc = [
//            'test_uuid' => $test->uuid,
//            'row_uuid' => $selectadd->uuid
//        ];
//        $this->TestsToAnyRepositories->create($testperc);
//        $selectadd->translateOrNew($locale)->title = 'სელექციური ყურადღება';
//        $selectadd->translateOrNew($locale)->desc = 'სელექციური ყურადღება მოკლე აღწერილობა';
//        $selectadd->save();
//    }
//
//    function selection($locale = 'ka')
//    {
//        App::setLocale($locale);
//        $selection = $this->SelectionTestRepositories->find(1);
//
//        $raod = $selection->row;
//        $pirveli = $selection->first;
//        $saoindex = rand(0, 9);
//
//        for ($i = 1; $i <= $raod; $i++) {
//            $this->selec($raod, $i, $pirveli, $saoindex);
//            if (isset($this->pasuxebi['pirvelivarian']) && $this->pasuxebi['pirvelivarian'] == 1) {
//                if ($this->pasuxebi['dashorebap'] == 1) { $dash = 1;}
//                if ($this->pasuxebi['dashorebap'] == 2) { $dash = "&nbsp;&nbsp;&nbsp;"; }
//                if ($this->pasuxebi['dashorebap'] == 3) { $dash = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
//                if (isset($dash)) {
//                    echo $this->pasuxebi['meoreaso'] . $dash . $this->pasuxebi['pirveliaso'] . "<br>";
//                }
//            }
//            if (isset($this->pasuxebi['pirvelivarian']) && $this->pasuxebi['pirvelivarian'] == 2) {
//                if ($this->pasuxebi['dashorebam'] == 1) { $dash1 = "&nbsp;"; }
//                if ($this->pasuxebi['dashorebam'] == 2) { $dash1 = "&nbsp;&nbsp;&nbsp;"; }
//                if ($this->pasuxebi['dashorebam'] == 3) { $dash1 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
//                if (isset($dash1)) {
//                    echo $this->pasuxebi['meoreaso'] . $dash1 . $this->pasuxebi['pirveliaso'] . $dash1 . $this->pasuxebi['meoreaso'] . "<br>";
//                }
//            }
//            if (isset($this->pasuxebi['pirvelivarian']) && $this->pasuxebi['pirvelivarian'] == 3) {
//                if ($this->pasuxebi['dashorebames'] == 1) { $dash1 = "&nbsp;"; }
//                if ($this->pasuxebi['dashorebames'] == 2) { $dash1 = "&nbsp;&nbsp;&nbsp;"; }
//                if ($this->pasuxebi['dashorebames'] == 3) { $dash1 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
//                if (isset($dash1)) {
//                    echo $this->pasuxebi['meoreaso'] . $dash1 . $this->pasuxebi['pirveliaso'] . $dash1 . $this->pasuxebi['meoreaso'] . "<br>";
//                }
//            }
//            if (isset($this->pasuxebi['pirvelivarian']) && $this->pasuxebi['pirvelivarian'] == 4) {
//                if ($this->pasuxebi['dashorebabolo'] == 1) { $dash1 = "&nbsp;"; }
//                if ($this->pasuxebi['dashorebabolo'] == 2) { $dash1 = "&nbsp;&nbsp;&nbsp;"; }
//                if ($this->pasuxebi['dashorebabolo'] == 3) { $dash1 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
//                if (isset($dash1)) {
//                    echo $this->pasuxebi['meoreaso'] . $dash1 . $this->pasuxebi['pirveliaso'] . $dash1 . $this->pasuxebi['meoreaso'] . "<br>";
//                }
//            }
//        }
//    }
//
//
//    function token()
//    {
//        $signal = [
//            'token' => csrf_token(),
//        ];
//        return response()->json($signal);
//    }
}

