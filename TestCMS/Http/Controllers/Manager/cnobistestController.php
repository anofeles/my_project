<?php


namespace TestCMS\Http\Controllers\Manager;


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;
use TestCMS\Http\Requests\Manager\Request;
use TestCMS\Repositories\TestsRepositories;
use TestCMS\Repositories\RegisterUserRepositories;
use TestCMS\Repositories\RegisterUserToAnyRepositories;
use TestCMS\Repositories\TestsToAnyRepositories;
use TestCMS\Repositories\CnobistestTestRepositories;
use TestCMS\Repositories\CnobistestTestPartRepositories;
use TestCMS\Repositories\CnobistestTestToAnyRepositories;
use TestCMS\Repositories\CnobistestTestPasuxRepositories;
use TestCMS\Repositories\CnobistestTestPasuxuserRepositories;

class cnobistestController extends ManagetController
{
    protected $TestsRepositories,$RegisterUserRepositories,$RegisterUserToAnyRepositories,$TestsToAnyRepositories,
        $CnobistestTestRepositories,$CnobistestTestPartRepositories,$CnobistestTestToAnyRepositories,$CnobistestTestPasuxRepositories,$CnobistestTestPasuxuserRepositories;
    public function __construct(
        TestsRepositories $TestsRepositories,
        RegisterUserRepositories $RegisterUserRepositories,
        TestsToAnyRepositories $TestsToAnyRepositories,
        CnobistestTestRepositories $CnobistestTestRepositories,
        CnobistestTestPartRepositories $CnobistestTestPartRepositories,
        CnobistestTestToAnyRepositories $CnobistestTestToAnyRepositories,
        CnobistestTestPasuxRepositories $CnobistestTestPasuxRepositories,
        CnobistestTestPasuxuserRepositories $CnobistestTestPasuxuserRepositories,
        RegisterUserToAnyRepositories $RegisterUserToAnyRepositories
    )
    {
        $this->TestsRepositories = $TestsRepositories;
        $this->RegisterUserRepositories = $RegisterUserRepositories;
        $this->RegisterUserToAnyRepositories = $RegisterUserToAnyRepositories;
        $this->TestsToAnyRepositories = $TestsToAnyRepositories;
        $this->CnobistestTestRepositories = $CnobistestTestRepositories;
        $this->CnobistestTestPartRepositories = $CnobistestTestPartRepositories;
        $this->CnobistestTestToAnyRepositories = $CnobistestTestToAnyRepositories;
        $this->CnobistestTestPasuxRepositories = $CnobistestTestPasuxRepositories;
        $this->CnobistestTestPasuxuserRepositories = $CnobistestTestPasuxuserRepositories;

        view()->share('testquiz', $this->TestsRepositories->all());
    }

    function index($local='ka')
    {
        $user = Auth::user();
        if (isset($user->status) && $user->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        if ($user->status == 2) {
            $test = $this->TestsRepositories->where('key', '=', 'cnobistest')->get();
            foreach ($test as $testite) {
                $toani['test_quiz'] = $this->TestsToAnyRepositories->where('test_uuid', '=', $testite->uuid)->get();
            }
            foreach ($toani['test_quiz'] as $test_quizitem) {
                $usertoani = $this->RegisterUserToAnyRepositories->where('register_user_uuid', '=', $user->uuid)->get();
                foreach ($usertoani as $usertoaniite) {
                    if ($test_quizitem->row_uuid == $usertoaniite->row_uuid) {
                        $reguser[] = $usertoaniite->row_uuid;
                    }
                }
            }
        }
        if ($user->status == 1) {
            view()->share('testviuv', $this->CnobistestTestRepositories->all());
        }
        $usert = $this->RegisterUserRepositories->where('reg_user', '!=', 3)->get();
        $usertoauth = $this->RegisterUserToAnyRepositories->whereNull('empti')->get();
        view()->share('usert', $usert);
        view()->share('usertoauth', $usertoauth);
        return view('thems.herd_pages.cnobistest.cnobistest');
    }

    function cnobistestadd($local = 'ka', Request $request){
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        if ($request->method() == 'POST') {
            for ($i = 1; $i <= $request->rov; $i++) {
                $this->cnobistest($i, $request->rov);
                $pasux[] = $this->pasuxebi;
            }
            view()->share('swori', $pasux);

            view()->share('title', $request->title);
            view()->share('desc', $request->descript);
            view()->share('time', $request->time);
            view()->share('fulltime', $request->fulltime);
            view()->share('rov', $request->rov);
            view()->share('defic', $request->defic);
            view()->share('proc', $request->proc);
        }

        return view('thems.herd_pages.cnobistest.cnobisdd');
    }
    function cnobistestaddpart($local='ka',Request $request){
        App::setLocale($local);
        $user = Auth::user();
        if ($request->method() == 'POST') {
            $addtest = [
                "uuid" => Uuid::uuid4(),
                "time" => $request->time,
                "timetest" => $request->fulltime,
                "row" => $request->rov,
                "proc" => $request->proc
            ];
            $testdam = $this->CnobistestTestRepositories->makeRecord($addtest, true);
            $regadd = [
                'register_user_uuid' => $user->uuid,
                'row_uuid' => $testdam->uuid,
                'test_user' => $user->status,
                'rype' => 1
            ];
            $this->RegisterUserToAnyRepositories->create($regadd);
            $testtoani = [
                'test_uuid' => '1278c184-cb64-48a0-a083-acea9d6be1d9',
                'row_uuid' => $testdam->uuid,
                'type' => 1
            ];
            $this->TestsToAnyRepositories->create($testtoani);
            foreach ($request->gamosacnobi as $i => $testaso) {
                $testpart = [
                    'uuid' => Uuid::uuid4(),
                    'gamosacnobi' => $request->gamosacnobi[$i],
                    'dasamaxsovrebeli' => $request->dasamaxsovrebeli[$i]
                ];
                $testpartadd = $this->CnobistestTestPartRepositories->makeRecord($testpart, true);
                $testtoani = [
                    'cnobistest_test' => $testdam->uuid,
                    'row_uuid' => $testpartadd->uuid,
                    'type' => 1
                ];
                $this->CnobistestTestToAnyRepositories->create($testtoani);
            }
            $testdam->translateOrNew($local)->title = $request->title;
            $testdam->translateOrNew($local)->desc = $request->desc;
            $testdam->translateOrNew($local)->defic = $request->defic;
            $testdam->save();
        }
        return back();
    }

    function userbase($dellid = 0, $local = 'ka', Request $request)
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        $reguser = Auth::user();
        $user = $this->RegisterUserRepositories->where('status', '=', 3)->get();
        $testuuid = $this->CnobistestTestRepositories->find($dellid);
        $pasux = $this->CnobistestTestPasuxRepositories->where('testuuid', '=', $testuuid->uuid)->first();
        $userpregist = $this->RegisterUserToAnyRepositories/*->where('rype','=',$reguser->id)*/ ->where('test_user', '=', 3)->where('row_uuid', '=', $testuuid->uuid)->get();
        view()->share('pasux', $pasux);
        view()->share('users', $user);
        view()->share('userpregist', $userpregist);
        if ($request->method() == 'POST') {

            if ($request->user != null) {
                $this->RegisterUserToAnyRepositories->where('rype', '=', $reguser->id)->where('row_uuid', '=', $testuuid->uuid)->where('test_user', '=', '3')->delete();
                foreach ($request->user as $useritem) {
                    $regadduser = [
                        'register_user_uuid' => $useritem,
                        'row_uuid' => $testuuid->uuid,
                        'rype' => $reguser->id,
                        'test_user' => 3
                    ];
//                    dd($regadduser);
                    $this->RegisterUserToAnyRepositories->create($regadduser);
                }
            }
            if (
                $request->variant != null ||
                $request->dashoreba != null ||
                $request->pirveliaso != null ||
                $request->meoreaso != null ||
                $request->momxpasux != null ||
                $request->upasuxtuara != null ||
                $request->sworipasux != null ||
                $request->pasuxdro != null) {
                $xger = "";
                $yger = "";
                if (!empty($request->xgerdzi[0]) && !empty($request->ygerdzi[0])) {
                    foreach ($request->xgerdzi as $i => $xgerdzi) {
                        $xger .= $request->xgerdzi[$i] . ',';
                        $yger .= $request->ygerdzi[$i] . ',';
                    }
                }
                if (!empty($request->pasux)) {
                    $pasuuid = $request->pasux;
                } else {
                    $pasuuid = Uuid::uuid4();
                }
                $testpasux = [
                    'uuid' => $pasuuid,
                    'testaso' => $request->testaso,
                    'gradusi' => $request->gradusi,
                    'revers' => $request->revers,
                    'momxpasux' => $request->momxpasux,
                    'pasuxdro' => $request->pasuxdro,
                    'upasuxtuara' => $request->upasuxtuara,
                    'sworipasux' => $request->sworipasux,
                    'xgerdz' => $xger,
                    'ygerdz' => $yger,
                    'testuuid' => $testuuid->uuid
                ];
//                dd($testpasux);
                $signal = $this->CnobistestTestPasuxRepositories->makeRecord($testpasux);
            }
        }
        return view('thems.herd_pages.cnobistest.percektuser');
    }

    function usergamot($sigid=0,$local='ka'){
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        $user = Auth::user();
        $test = $this->CnobistestTestRepositories->find($sigid);
        $usertoani = $this->RegisterUserToAnyRepositories->where('row_uuid','=',$test->uuid)->where('test_user','=',3)->get();
        foreach ($usertoani as $usertoaniitem){
            $usergamot[] = $this->RegisterUserRepositories->where('uuid','=',$usertoaniitem->register_user_uuid)/*->where(function ($query) use ($user){
                $query->where('uuid', '=', $user->uuid)
                    ->orWhere('reg_user', '=', $user->uuid);
            })*/->get();
        }
        if(isset($usergamot[0][0]->uuid) && !empty($usergamot[0][0]->uuid)) {
            foreach ($usergamot as $i => $usergamotitem) {
                if(isset($usergamotitem[$i]->uuid)) {
                    $filerov[] = $this->CnobistestTestPasuxuserRepositories
                        ->where('user_uuid', '=', $usergamotitem[$i]->uuid)
                        ->where('testuuid', '=', $test->uuid)
                        ->select('user_uuid', 'datauser', 'testuuid')
                        ->groupBy('user_uuid', 'datauser', 'testuuid')
                        ->get();
                }
                else{
                    $filerov[] = null;
                }
            }
            view()->share('filerov',$filerov);
            view()->share('usertoani',$usergamot);
        }
        return view('thems.herd_pages.cnobistest.usepasux');
    }

    function mentaldro($upid = 0, $local = 'ka', Request $request)
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        $pasi = null;
        if ($request->method() == "POST") {

            $updatetest = [
                'uuid' => $request->percuuid,
                'time' => $request->time,
                'timefull' => $request->fulltime,
                'proc' => $request->proc
            ];
            $testmentedit = $this->CnobistestTestRepositories->makeRecord($updatetest, true);
            $testmentedit->translateOrNew($local)->title = $request->title;
            $testmentedit->translateOrNew($local)->desc = $request->descript;
            $testmentedit->translateOrNew($local)->defic = $request->defic;
            $testmentedit->save();
//            dd($testmentedit);
            foreach ($request->perpartid as $i => $perpartiditem) {
                $partupdate = [
                    'uuid' => $request->perpartid[$i],
                    'gamosacnobi' => $request->gamosacnobi[$i],
                    'dasamaxsovrebeli' => $request->dasamaxsovrebeli[$i]
                ];
                $this->CnobistestTestPartRepositories->makeRecord($partupdate);
            }
        }
        $metsedit = $this->CnobistestTestRepositories->find($upid);
//        dd($this->MentalRotaciaTestRepositories->MentalComparetoani($metsedit->uuid)->get());
        foreach ($this->CnobistestTestRepositories->cnobistest($metsedit->uuid)->get() as $mentpartitem) {

            foreach ($this->CnobistestTestPartRepositories->where('uuid', '=', $mentpartitem['pivot']->row_uuid)->get() as $partitem) {
                $pasi[] = $partitem;
            }
        }
        view()->share('percad', $metsedit);
        view()->share('percpartviu', $pasi);

        return view('thems.herd_pages.cnobistest.cnobistestedit');
    }

    function cnobistestdelete($upid = 0,$local = 'ka'){
        App::setLocale($local);
        $testment = $this->CnobistestTestRepositories->find($upid);
        $this->RegisterUserToAnyRepositories->where('row_uuid', '=', $testment->uuid)->delete();
        $this->TestsToAnyRepositories->where('row_uuid', '=', $testment->uuid)->delete();
        foreach ($this->CnobistestTestRepositories->cnobistest($testment->uuid)->get() as $mentpartitem) {
            $this->CnobistestTestPartRepositories->where('uuid', '=', $mentpartitem['pivot']->row_uuid)->delete();
        }
        $this->CnobistestTestToAnyRepositories->where('cnobistest_test', '=', $testment->uuid)->delete();
        $this->CnobistestTestRepositories->find($upid)->delete();
        return back();
    }
}
