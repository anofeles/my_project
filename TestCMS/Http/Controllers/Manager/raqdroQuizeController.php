<?php


namespace TestCMS\Http\Controllers\Manager;


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use PHPExcel;
use PHPExcel_IOFactory;
use Ramsey\Uuid\Uuid;
use TestCMS\Http\Requests\Manager\Request;
use TestCMS\Repositories\TestsRepositories;
use TestCMS\Repositories\ReaqciYuradgRepositories;
use TestCMS\Repositories\ReaqciYuradgPartRepositories;
use TestCMS\Repositories\ReaqciYuradgToAnyRepositories;
use TestCMS\Repositories\RegisterUserToAnyRepositories;
use TestCMS\Repositories\RegisterUserRepositories;
use TestCMS\Repositories\TestsToAnyRepositories;
use TestCMS\Repositories\ReaqciYuradgTestPasuxRepositories;
use TestCMS\Repositories\ReaqciYuradgTestPasuxuserRepositories;
use TestCMS\Repositories\ReaqciYuradgTestDiagramRepositories;


class raqdroQuizeController extends ManagetController
{

    protected $TestsRepositories, $ReaqciYuradgRepositories, $ReaqciYuradgPartRepositories, $ReaqciYuradgToAnyRepositories, $RegisterUserToAnyRepositories, $TestsToAnyRepositories,
        $RegisterUserRepositories, $ReaqciYuradgTestPasuxRepositories, $ReaqciYuradgTestPasuxuserRepositories, $ReaqciYuradgTestDiagramRepositories;

    function __construct(
        TestsRepositories $TestsRepositories,
        ReaqciYuradgRepositories $ReaqciYuradgRepositories,
        ReaqciYuradgPartRepositories $ReaqciYuradgPartRepositories,
        ReaqciYuradgToAnyRepositories $ReaqciYuradgToAnyRepositories,
        RegisterUserToAnyRepositories $RegisterUserToAnyRepositories,
        RegisterUserRepositories $RegisterUserRepositories,
        ReaqciYuradgTestPasuxRepositories $ReaqciYuradgTestPasuxRepositories,
        ReaqciYuradgTestPasuxuserRepositories $ReaqciYuradgTestPasuxuserRepositories,
        ReaqciYuradgTestDiagramRepositories $ReaqciYuradgTestDiagramRepositories,
        TestsToAnyRepositories $TestsToAnyRepositories
    )
    {
        $this->TestsRepositories = $TestsRepositories;
        $this->ReaqciYuradgRepositories = $ReaqciYuradgRepositories;
        $this->ReaqciYuradgPartRepositories = $ReaqciYuradgPartRepositories;
        $this->ReaqciYuradgToAnyRepositories = $ReaqciYuradgToAnyRepositories;
        $this->RegisterUserToAnyRepositories = $RegisterUserToAnyRepositories;
        $this->RegisterUserRepositories = $RegisterUserRepositories;
        $this->ReaqciYuradgTestPasuxRepositories = $ReaqciYuradgTestPasuxRepositories;
        $this->ReaqciYuradgTestPasuxuserRepositories = $ReaqciYuradgTestPasuxuserRepositories;
        $this->ReaqciYuradgTestDiagramRepositories = $ReaqciYuradgTestDiagramRepositories;
        $this->TestsToAnyRepositories = $TestsToAnyRepositories;


        view()->share('testquiz', $this->TestsRepositories->all());

    }

    function raqdroQuize($local = 'ka')
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        $user = Auth::user();
        if ($user->status == 2) {
            $test = $this->TestsRepositories->where('key', '=', 'raqdro')->get();
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
            if (isset($reguser)) {
                foreach ($reguser as $reguseritem) {
                    $testviuv[] = $this->ReaqciYuradgRepositories->where('uuid', '=', $reguseritem)->first();
                }
                view()->share('testviuv', $testviuv);
            }
        }
        if ($user->status == 1) {
            view()->share('testviuv', $this->ReaqciYuradgRepositories->all());
        }
        $usert = $this->RegisterUserRepositories->where('reg_user', '!=', 3)->get();
        $usertoauth = $this->RegisterUserToAnyRepositories->whereNull('test_user')->get();
        view()->share('usert', $usert);
        view()->share('usertoauth', $usertoauth);
        return view('thems.herd_pages.raqdro.raqdro');
    }

    function raqdroadd($local = 'ka', Request $request)
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        if ($request->method() == "POST") {
//            $pir = rand(0,5);
//            $meor = rand(0,5);
//            $mesame = rand(0,5);
//            $meotze = rand(0,7);
//            for ($i=1;$i<=$request->rov;$i++){
//                $this->reqdrogen($i,$request->rovfirst,$request->rovsec,$request->rovthen,$pir,$meor,$mesame,$meotze);
//                $swori[] = $this->pasuxebi;
//            }
//            view()->share('swori',$swori);

            view()->share('title', $request->title);
            view()->share('desc', $request->descript);
            view()->share('time', $request->time);
            view()->share('fulltime', $request->fulltime);
            view()->share('rov', $request->rov);
            view()->share('first', $request->rovfirst);
            view()->share('second', $request->rovsec);
            view()->share('therd', $request->rovthen);
            view()->share('defic', $request->defic);
            view()->share('proc', $request->proc);

            view()->share('pirveliaso', mb_strtoupper($request->pirveliasomt, 'UTF-8'));
            view()->share('pirvelgilak', $request->pirvelgilakmt);

            view()->share('meoreiaso', mb_strtoupper($request->meoreiasomt, 'UTF-8'));
            view()->share('meoregilak', $request->meoregilakmt);

            view()->share('mesameaso', mb_strtoupper($request->mesameasomt, 'UTF-8'));
            view()->share('mesamegilak', $request->mesamegilakmt);

            view()->share('meotxeaso', mb_strtoupper($request->meotxeasomt, 'UTF-8'));
            view()->share('meotxegilak', $request->meotxegilakmt);

        }
        return view('thems.herd_pages.raqdro.raqdroadd');
    }

    function raqdroaddpart($local = 'ka', Request $request)
    {
        App::setLocale($local);
        $user = Auth::user();
        dd($_POST);
        if ($request->method() == 'POST') {
            $addreqdro = [
                'uuid' => Uuid::uuid4(),
                'raodenoba' => $request->rov,
                'pirveeliraod' => $request->first,
                'meoreraod' => $request->second,
                'mesamevar' => $request->therd,
                'time' => $request->time,
                'timefull' => $request->fulltime,
                'proc' => $request->proc
            ];
            $addreqdrotest = $this->ReaqciYuradgRepositories->makeRecord($addreqdro, true);
            $regadd = [
                'register_user_uuid' => $user->uuid,
                'row_uuid' => $addreqdrotest->uuid,
                'rype' => 1,
            ];
            $this->RegisterUserToAnyRepositories->create($regadd);
            $testadd = [
                'test_uuid' => '34148fc2-3ad1-4eb1-b50a-eff2a7f61fad',
                'row_uuid' => $addreqdrotest->uuid,
                'type' => 1
            ];
            $this->TestsToAnyRepositories->create($testadd);

            foreach ($request->pirveliaso as $i => $pirveliaso) {
                $addtestpart = [
                    'uuid' => Uuid::uuid4(),
                    'pirveliaso' => $request->pirveliaso[$i],
                    'pirvelgilak' => $request->pirvelgilak[$i],
                    'meoreiaso' => $request->meoreiaso[$i],
                    'meoregilak' => $request->meoregilak[$i],
                    'mesameaso' => $request->mesameaso[$i],
                    'mesamegilak' => $request->mesamegilak[$i],
                    'meotxeaso' => $request->meotxeaso[$i],
                    'meotxegilak' => $request->meotxegilak[$i],
                    'altraod' => $request->altraod[$i]
                ];
                $geqpart = $this->ReaqciYuradgPartRepositories->makeRecord($addtestpart, true);
                $geqparttoani = [
                    'reaqci_yuradg_test_uuid' => $addreqdrotest->uuid,
                    'row_uuid' => $geqpart->uuid,
                    'type' => 1
                ];
                $this->ReaqciYuradgToAnyRepositories->create($geqparttoani);
            }
            $addreqdrotest->translateOrNew($local)->title = $request->title;
            $addreqdrotest->translateOrNew($local)->desc = $request->desc;
            $addreqdrotest->translateOrNew($local)->defic = $request->defic;
            $addreqdrotest->save();
        }
        return back();
    }

    function editraqdro($upid = 0, $local = 'ka', Request $request)
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);

        if ($request->method() == 'POST') {
//            dump($request->method());
            $reaqadd = [
                'uuid' => $request->percuuid,
                'time' => $request->time,
                'timefull' => $request->fulltime,
                'proc' => $request->proc
            ];
            $reaqaddtest = $this->ReaqciYuradgRepositories->makeRecord($reaqadd, true);
            $reaqaddtest->translateOrNew($local)->title = $request->title;
            $reaqaddtest->translateOrNew($local)->desc = $request->descript;
            $reaqaddtest->translateOrNew($local)->defic = $request->defic;
            $reaqaddtest->save();
            for ($i = 0; $i < count($request->perpartid); $i++) {
                $reaqpart = [
                    'pirveliaso' => mb_strtoupper($request->pirveliaso[$i], 'UTF-8'),
                    'pirvelgilak' => $request->pirvelgilak[$i],
                    'meoreiaso' => mb_strtoupper($request->meoreiaso[$i], 'UTF-8'),
                    'meoregilak' => $request->meoregilak[$i],
                    'mesameaso' => mb_strtoupper($request->mesameaso[$i], 'UTF-8'),
                    'mesamegilak' => $request->mesamegilak[$i],
                    'meotxeaso' => mb_strtoupper($request->meotxeaso[$i], 'UTF-8'),
                    'meotxegilak' => $request->meotxegilak[$i]
                ];
                $this->ReaqciYuradgPartRepositories->update($reaqpart, $request->perpartid[$i]);
            }
        }
        $reaqtest = $this->ReaqciYuradgRepositories->find($upid);
        foreach ($this->ReaqciYuradgRepositories->ReaqciCompare($reaqtest->uuid)->get() as $signaturequeri) {
            foreach ($this->ReaqciYuradgPartRepositories->where('uuid', '=', $signaturequeri['pivot']->row_uuid)->get() as $TestParts) {
                $signal['quiz'][] = [
                    'id' => $TestParts->id,
                    'pirveliaso' => $TestParts->pirveliaso,
                    'pirvelgilak' => $TestParts->pirvelgilak,
                    'meoreiaso' => $TestParts->meoreiaso,
                    'meoregilak' => $TestParts->meoregilak,
                    'mesameaso' => $TestParts->mesameaso,
                    'mesamegilak' => $TestParts->mesamegilak,
                    'meotxeaso' => $TestParts->meotxeaso,
                    'meotxegilak' => $TestParts->meotxegilak,
                    'altraod' => $TestParts->altraod,
                ];
            }
        }

        view()->share('percpartviu', $signal);
        view()->share('percad', $reaqtest);
        return view('thems.herd_pages.raqdro.reaqedit');
    }

    function reaqdelete($upid = 0, $local = 'ka', Request $request)
    {
        App::setLocale($local);
        $reaq = $this->ReaqciYuradgRepositories->find($upid);
        $this->RegisterUserToAnyRepositories->where('row_uuid', '=', $reaq->uuid);
        $this->TestsToAnyRepositories->where('row_uuid', '=', $reaq->uuid);
        foreach ($this->ReaqciYuradgRepositories->ReaqciCompare($reaq->uuid)->get() as $signaturequeri) {
            $this->ReaqciYuradgPartRepositories->where('uuid', '=', $signaturequeri['pivot']->row_uuid)->delete();
        }
        $this->ReaqciYuradgToAnyRepositories->where('reaqci_yuradg_test_uuid', '=', $reaq->uuid)->delete();
        $this->ReaqciYuradgRepositories->delete($upid);
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
        $testuuid = $this->ReaqciYuradgRepositories->find($dellid);
        $pasux = $this->ReaqciYuradgTestPasuxRepositories->where('testuuid', '=', $testuuid->uuid)->first();
        $userpregist = $this->RegisterUserToAnyRepositories/*->where('rype', '=', $reguser->id)*/->where('test_user', '=', 3)->where('row_uuid', '=', $testuuid->uuid)->get();
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
                    'pirveliaso' => $request->pirveliaso,
                    'pirvelgilak' => $request->pirvelgilak,
                    'meoreaso' => $request->meoreaso,
                    'meoregilak' => $request->meoregilak,
                    'mesameaso' => $request->mesameaso,
                    'mesamegilak' => $request->mesamegilak,
                    'meotxeaso' => $request->meotxeaso,
                    'meotxegilak' => $request->meotxegilak,
                    'momxpasux' => $request->momxpasux,
                    'pasuxdro' => $request->pasuxdro,
                    'upasuxtuara' => $request->upasuxtuara,
                    'sworipasux' => $request->sworipasux,
                    'altraod' => $request->altraod,
                    'xgerdz' => $xger,
                    'ygerdz' => $yger,
                    'testuuid' => $testuuid->uuid
                ];
//                dd($testpasux);
                $signal = $this->ReaqciYuradgTestPasuxRepositories->makeRecord($testpasux);
            }
        }
        return view('thems.herd_pages.raqdro.percektuser');
    }

    function usergamot($sigid = 0, $local = 'ka')
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        $test = $this->ReaqciYuradgRepusergamotositories->find($sigid);
        $usertoani = $this->RegisterUserToAnyRepositories->where('row_uuid', '=', $test->uuid)->where('test_user', '=', 3)->get();
        foreach ($usertoani as $usertoaniitem) {
            $usergamot[] = $this->RegisterUserRepositories->where('uuid', '=', $usertoaniitem->register_user_uuid)->get();
        }
        if (isset($usergamot[0][0]->uuid) && !empty($usergamot[0][0]->uuid)) {
            foreach ($usergamot as $i => $usergamotitem) {
                $filerov[] = $this->ReaqciYuradgTestPasuxuserRepositories
                    ->where('user_uuid', '=', $usergamotitem[$i]->uuid)
                    ->where('testuuid', '=', $test->uuid)
                    ->select('user_uuid', 'datauser', 'testuuid')
                    ->groupBy('user_uuid', 'datauser', 'testuuid')
                    ->get();
            }

            view()->share('filerov', $filerov);
            view()->share('usertoani', $usergamot);
        }
        return view('thems.herd_pages.raqdro.usepasux');
    }

    function pasuxfile($testuuid = 0, $user_uuid = 0, $datauser = 0, $file = 0, $local = 'ka')
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        $fileval = $this->ReaqciYuradgTestPasuxuserRepositories
            ->where('testuuid', '=', $testuuid)
            ->where('user_uuid', '=', $user_uuid)
            ->where('datauser', '=', $datauser)
            ->get();
        $diagrama = $this->ReaqciYuradgTestDiagramRepositories
            ->where('testuuid', '=', $testuuid)
            ->first();
        view()->share('diagrama', $diagrama);
        view()->share('testuuid', $testuuid);
        view()->share('user_uuid', $user_uuid);
        view()->share('datauser', $datauser);
        if ($file > 0) {
            $customer_array[] = array('pirveliaso', 'pirvelgilak', 'meoreaso', 'meoregilak', 'mesameaso', 'mesamegilak', 'meotxeaso', 'meotxegilak', 'momxpasux', 'pasuxdro', 'upasuxtuara', 'sworipasux', 'altraod');
            foreach ($fileval as $filevalitem) {
                $exelfile[] = array(
                    'pirveliaso' => $filevalitem->pirveliaso,
                    'pirvelgilak' => $filevalitem->pirvelgilak,
                    'meoreaso' => $filevalitem->meoreaso,
                    'meoregilak' => $filevalitem->meoregilak,
                    'mesameaso' => $filevalitem->mesameaso,
                    'mesamegilak' => $filevalitem->mesamegilak,
                    'meotxeaso' => $filevalitem->meotxeaso,
                    'meotxegilak' => $filevalitem->meotxegilak,
                    'momxpasux' => $filevalitem->momxpasux,
                    'pasuxdro' => $filevalitem->pasuxdro,
                    'upasuxtuara' => $filevalitem->upasuxtuara,
                    'altraod' => $filevalitem->altraod,
                    'sworipasux' => $filevalitem->sworipasux
                );
            }
            require_once 'TestCMS/Http/Controllers/Classes/PHPExcel.php';
            $objPHPExcel = new PHPExcel();
            $objPHPExcel->setActiveSheetIndex(0);
            $active_sheet = $objPHPExcel->getActiveSheet();
            $row_start = 1;
            $i = 1;
            if (isset($exelfile)) {
                foreach ($exelfile as $tabledataitem) {
                    $row_next = $row_start + $i;
                    $active_sheet->setCellValue('A' . 1, 'პირველი ასო');
                    $active_sheet->setCellValue('A' . $row_next, $tabledataitem['pirveliaso']);
                    $active_sheet->setCellValue('B' . 1, 'მეორე ასო');
                    $active_sheet->setCellValue('B' . $row_next, $tabledataitem['meoreaso']);
                    $active_sheet->setCellValue('C' . 1, 'მესამე ასო');
                    $active_sheet->setCellValue('C' . $row_next, $tabledataitem['mesameaso']);
                    $active_sheet->setCellValue('D' . 1, 'მეოთხე ასო');
                    $active_sheet->setCellValue('D' . $row_next, $tabledataitem['meotxeaso']);
                    $active_sheet->setCellValue('F' . 1, 'მომხმარებლის პასუხი');
                    $active_sheet->setCellValue('F' . $row_next, $tabledataitem['momxpasux']);
                    $active_sheet->setCellValue('F' . 1, 'რეაქციის დრო');
                    $active_sheet->setCellValue('G' . $row_next, $tabledataitem['pasuxdro']);
                    $active_sheet->setCellValue('G' . 1, 'უპასუხა თუ არა');
                    if($tabledataitem['upasuxtuara'] == 'true')
                    {$active_sheet->setCellValue('H' . $row_next, 1);}
                    else
                    {$active_sheet->setCellValue('H' . $row_next, 0);}
                    $active_sheet->setCellValue('H' . 1, 'ტესტის სწორი პასუხი');
                    if($tabledataitem['sworipasux'] == 'true')
                    {$active_sheet->setCellValue('H' . $row_next, 1);}
                    else
                    {$active_sheet->setCellValue('H' . $row_next, 0);}
//                    $active_sheet->setCellValue('J' . 1, 'სისწორე');
//                    $active_sheet->setCellValue('J' . $row_next, $tabledataitem['altraod']);
                    $i++;
                }
            }

            header("Content-Type:application/vnb.ms-excel");
            header("Content-Disposition:attachment;filename='signal.xls'");

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
            return back();
        } else {
            return view('thems.herd_pages.raqdro.diagram');
        }
    }

    function diagrama($testuuid = 0, $diagramid = 0, $local = 'ka')
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
//        $fileval = $this->ReaqciYuradgTestPasuxuserRepositories
//            ->where('testuuid', '=', $testuuid)
//            ->where('user_uuid', '=', $user_uuid)
//            ->where('datauser', '=', $datauser)
//            ->get();

        $fileval = $this->ReaqciYuradgTestDiagramRepositories->find($diagramid);
        $diagramx = explode(',', $fileval->diagrama_x);
        $diagramy = explode(',', $fileval->diagrama_y);
        foreach ($diagramx as $i => $filevalitem) {
            $xdgr[] = $diagramx[$i];
            $ydgr[] = $diagramy[$i];
        }

        view()->share('xdgr', $xdgr);
        view()->share('ydgr', $ydgr);
        return view('thems.herd_pages.signal.phpchart');
    }
}
