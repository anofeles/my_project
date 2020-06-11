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
use TestCMS\Repositories\LewsgadTestRepositories;
use TestCMS\Repositories\LewsgadTestPartsRepositories;
use TestCMS\Repositories\LewsgadTestToAnyRepositories;
use TestCMS\Repositories\LewsgadTestPasuxRepositories;
use TestCMS\Repositories\LewsgadTestPasuxuserRepositories;

class lewsgadController extends ManagetController
{
    protected $TestsRepositories,$RegisterUserRepositories,$RegisterUserToAnyRepositories,$TestsToAnyRepositories,
$LewsgadTestRepositories, $LewsgadTestPartsRepositories, $LewsgadTestToAnyRepositories, $LewsgadTestPasuxRepositories,$LewsgadTestPasuxuserRepositories;
    function __construct(
        TestsRepositories $TestsRepositories,
        RegisterUserToAnyRepositories $RegisterUserToAnyRepositories,
        TestsToAnyRepositories $TestsToAnyRepositories,
        LewsgadTestRepositories $LewsgadTestRepositories,
        LewsgadTestPartsRepositories $LewsgadTestPartsRepositories,
        LewsgadTestToAnyRepositories $LewsgadTestToAnyRepositories,
        LewsgadTestPasuxRepositories $LewsgadTestPasuxRepositories,
        LewsgadTestPasuxuserRepositories $LewsgadTestPasuxuserRepositories,
        RegisterUserRepositories $RegisterUserRepositories
    )
    {
        $this->TestsRepositories = $TestsRepositories;
        $this->RegisterUserRepositories = $RegisterUserRepositories;
        $this->RegisterUserToAnyRepositories = $RegisterUserToAnyRepositories;
        $this->TestsToAnyRepositories = $TestsToAnyRepositories;
        $this->LewsgadTestRepositories = $LewsgadTestRepositories;
        $this->LewsgadTestPartsRepositories = $LewsgadTestPartsRepositories;
        $this->LewsgadTestToAnyRepositories = $LewsgadTestToAnyRepositories;
        $this->LewsgadTestPasuxRepositories = $LewsgadTestPasuxRepositories;
        $this->LewsgadTestPasuxuserRepositories = $LewsgadTestPasuxuserRepositories;


        view()->share('testquiz', $this->TestsRepositories->all());
    }

    function index($local = 'ka'){
        $user = Auth::user($local);
        if (isset($user->status) && $user->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        if ($user->status == 2) {
            $test = $this->TestsRepositories->where('key', '=', 'lewsgad')->get();
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
            view()->share('testviuv', $this->LewsgadTestRepositories->all());
        }
        $usert = $this->RegisterUserRepositories->where('reg_user', '!=', 3)->get();
        $usertoauth = $this->RegisterUserToAnyRepositories->whereNull('empti')->get();
        view()->share('usert', $usert);
        view()->share('usertoauth', $usertoauth);
        return view('thems.herd_pages..lewsgad.lewsgad');
    }

    function lewsgadadd($local = 'ka',Request $request){
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        if ($request->method() == 'POST') {
            for ($i = 1; $i <= $request->rov; $i++) {
                $this->lewsgad($i, $request->rov);
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
        return view('thems.herd_pages.lewsgad.lewsgadd');
    }

    function lewsgadddpart($local = 'ka',Request $request){
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
            $testdam = $this->LewsgadTestRepositories->makeRecord($addtest, true);
            $regadd = [
                'register_user_uuid' => $user->uuid,
                'row_uuid' => $testdam->uuid,
                'test_user' => $user->status,
                'rype' => 1
            ];
            $this->RegisterUserToAnyRepositories->create($regadd);
            $testtoani = [
                'test_uuid' => '53a6dee2-79ea-40de-bc3a-118f297d6327',
                'row_uuid' => $testdam->uuid,
                'type' => 1
            ];
            $this->TestsToAnyRepositories->create($testtoani);
            foreach ($request->zeda as $i => $testaso) {
                $testpart = [
                    'uuid' => Uuid::uuid4(),
                    'zeda' => $testaso,
                    'qveda' => $request->qveda[$i],
                    'varinat' => $request->varinat[$i]
                ];
                $testpartadd = $this->LewsgadTestPartsRepositories->makeRecord($testpart, true);
                $testtoani = [
                    'lewsgad_test' => $testdam->uuid,
                    'row_uuid' => $testpartadd->uuid,
                    'type' => 1
                ];
                $this->LewsgadTestToAnyRepositories->create($testtoani);
            }
            $testdam->translateOrNew($local)->title = $request->title;
            $testdam->translateOrNew($local)->desc = $request->desc;
            $testdam->translateOrNew($local)->defic = $request->defic;
            $testdam->save();
        }
        return back();
    }

    function userbase($dellid = 0, $local = 'ka', Request $request){
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        $reguser = Auth::user();
        $user = $this->RegisterUserRepositories->where('status', '=', 3)->get();
        $testuuid = $this->LewsgadTestRepositories->find($dellid);
        $pasux = $this->LewsgadTestPasuxRepositories->where('testuuid', '=', $testuuid->uuid)->first();
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
                $signal = $this->LewsgadTestPasuxRepositories->makeRecord($testpasux);
            }
        }
        return view('thems.herd_pages.lewsgad.percektuser');
    }

    function usergamot($sigid = 0, $local = 'ka')
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        $user = Auth::user();
        $test = $this->LewsgadTestRepositories->find($sigid);

        $usertoani = $this->RegisterUserToAnyRepositories->where('row_uuid', '=', $test->uuid)/*->where('test_user','=',3)*/ ->get();

        foreach ($usertoani as $usertoaniitem) {
            $usergamot[] = $this->RegisterUserRepositories->where('uuid', '=', $usertoaniitem->register_user_uuid)
                /*->where(function ($query) use ($user){
                $query->where('uuid', '=', $user->uuid)
                    ->orWhere('reg_user', '=', $user->uuid);
            })*/
            ->get();
        }
        if (isset($usergamot[0][0]->uuid) && !empty($usergamot[0][0]->uuid)) {

            foreach ($usergamot as $i => $usergamotitem) {
                $filerov[] = $this->LewsgadTestPasuxuserRepositories
//                        ->where('user_uuid', '=', $usergamotitem[0]->uuid)
                    ->where('testuuid', '=', $test->uuid)
                    ->where('user_uuid', '=', $usergamotitem[0]->uuid)
                    ->select('user_uuid', 'datauser', 'testuuid')
                    ->groupBy('user_uuid', 'datauser', 'testuuid')
                    ->get();
            }
//dd($filerov);
            view()->share('filerov', $filerov);
            view()->share('usertoani', $usergamot);
        }
        return view('thems.herd_pages.lewsgad.usepasux');
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
            $testmentedit = $this->LewsgadTestRepositories->makeRecord($updatetest, true);
            $testmentedit->translateOrNew($local)->title = $request->title;
            $testmentedit->translateOrNew($local)->desc = $request->descript;
            $testmentedit->translateOrNew($local)->defic = $request->defic;
            $testmentedit->save();
//            dd($testmentedit);
            foreach ($request->perpartid as $i => $perpartiditem) {
                $partupdate = [
                    'uuid' => $request->perpartid[$i],
                    'zeda' => $request->zeda[$i],
                    'qveda' => $request->qveda[$i]
                ];
                $this->LewsgadTestPartsRepositories->makeRecord($partupdate);
            }
        }
        $metsedit = $this->LewsgadTestRepositories->find($upid);
//        dd($this->MentalRotaciaTestRepositories->MentalComparetoani($metsedit->uuid)->get());
        foreach ($this->LewsgadTestRepositories->Lewsgadtest($metsedit->uuid)->get() as $mentpartitem) {

            foreach ($this->LewsgadTestPartsRepositories->where('uuid', '=', $mentpartitem['pivot']->row_uuid)->get() as $partitem) {
                $pasi[] = $partitem;
            }
        }
        view()->share('percad', $metsedit);
        view()->share('percpartviu', $pasi);

        return view('thems.herd_pages.lewsgad.lewsgadedit');
    }

    function lewsgaddelete($upid = 0,$local = 'ka'){
        App::setLocale($local);
        $testment = $this->LewsgadTestRepositories->find($upid);
        $this->RegisterUserToAnyRepositories->where('row_uuid', '=', $testment->uuid)->delete();
        $this->TestsToAnyRepositories->where('row_uuid', '=', $testment->uuid)->delete();
        foreach ($this->LewsgadTestRepositories->Lewsgadtest($testment->uuid)->get() as $mentpartitem) {
            $this->LewsgadTestPartsRepositories->where('uuid', '=', $mentpartitem['pivot']->row_uuid)->delete();
        }
        $this->LewsgadTestToAnyRepositories->where('lewsgad_test', '=', $testment->uuid)->delete();
        $this->LewsgadTestRepositories->find($upid)->delete();
        return back();
    }
}
