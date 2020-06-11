<?php


namespace TestCMS\Http\Controllers\Manager;


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use PHPExcel;
use PHPExcel_IOFactory;
use Ramsey\Uuid\Uuid;
use TestCMS\Http\Requests\Manager\Request;
use TestCMS\Repositories\RegisterUserToAnyRepositories;
use TestCMS\Repositories\RegisterUserRepositories;
use TestCMS\Repositories\TestsRepositories;
use TestCMS\Repositories\TestsToAnyRepositories;
use TestCMS\Repositories\PerceftCompareTestRepositories;
use TestCMS\Repositories\PerceftCompareTestPartsRepositories;
use TestCMS\Repositories\PerceftCompareTestToAnyRepositories;
use TestCMS\Repositories\PerceftCompareTestPasuxRepositories;
use TestCMS\Repositories\PerceftCompareTestPasuxuserRepositories;
use TestCMS\Repositories\PerceftCompareTestDiagramRepositories;

class perceftQuizeController extends ManagetController
{
    protected $TestsRepositories, $TestsToAnyRepositories, $RegisterUserToAnyRepositories, $PerceftCompareTestRepositories,
        $PerceftCompareTestPartsRepositories, $PerceftCompareTestToAnyRepositories, $RegisterUserRepositories, $PerceftCompareTestPasuxRepositories,
        $PerceftCompareTestPasuxuserRepositories, $PerceftCompareTestDiagramRepositories;

    function __construct(
        TestsRepositories $TestsRepositories,
        TestsToAnyRepositories $TestsToAnyRepositories,
        RegisterUserToAnyRepositories $RegisterUserToAnyRepositories,
        PerceftCompareTestRepositories $PerceftCompareTestRepositories,
        PerceftCompareTestPartsRepositories $PerceftCompareTestPartsRepositories,
        PerceftCompareTestToAnyRepositories $PerceftCompareTestToAnyRepositories,
        PerceftCompareTestPasuxRepositories $PerceftCompareTestPasuxRepositories,
        PerceftCompareTestPasuxuserRepositories $PerceftCompareTestPasuxuserRepositories,
        PerceftCompareTestDiagramRepositories $PerceftCompareTestDiagramRepositories,
        RegisterUserRepositories $RegisterUserRepositories
    )
    {
        $this->TestsRepositories = $TestsRepositories;
        $this->TestsToAnyRepositories = $TestsToAnyRepositories;
        $this->RegisterUserToAnyRepositories = $RegisterUserToAnyRepositories;
        $this->PerceftCompareTestRepositories = $PerceftCompareTestRepositories;
        $this->PerceftCompareTestPartsRepositories = $PerceftCompareTestPartsRepositories;
        $this->PerceftCompareTestToAnyRepositories = $PerceftCompareTestToAnyRepositories;
        $this->PerceftCompareTestPasuxRepositories = $PerceftCompareTestPasuxRepositories;
        $this->PerceftCompareTestPasuxuserRepositories = $PerceftCompareTestPasuxuserRepositories;
        $this->PerceftCompareTestDiagramRepositories = $PerceftCompareTestDiagramRepositories;
        $this->RegisterUserRepositories = $RegisterUserRepositories;
        view()->share('testquiz', $this->TestsRepositories->all());

    }

    public function perceftQuize($local = 'ka')
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        $user = Auth::user();
        if ($user->status == 2) {
            $test = $this->TestsRepositories->where('key', '=', 'perceft')->get();
            foreach ($test as $testite) {
                $toani['test_quiz'] = $this->TestsToAnyRepositories->where('test_uuid', '=', $testite->uuid)->get();
            }

            if (isset($toani['test_quiz'][0])) {
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
                        $testviuv[] = $this->PerceftCompareTestRepositories->where('uuid', '=', $reguseritem)->first();
                    }
                    view()->share('testviuv', $testviuv);
                }
            }
        }
        if ($user->status == 1) {
            view()->share('testviuv', $this->PerceftCompareTestRepositories->all());
        }
        $usert = $this->RegisterUserRepositories->where('reg_user', '!=', 3)->get();
        $usertoauth = $this->RegisterUserToAnyRepositories->whereNull('test_user')->get();
        view()->share('usert', $usert);
        view()->share('usertoauth', $usertoauth);
        return view('thems.herd_pages.perceft.datagrid');
    }

    function perceftadd($local = 'ka', Request $request)
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        if ($request->method() == 'POST') {
            for ($i = 0; $i < $request->rov; $i++) {
                $this->percept($request->rov, $i, $request->true);
                $swori[] = $this->pasuxebi;
            }
            if (isset($swori)) {
                view()->share('swori', $swori);

                view()->share('title', $request->title);
                view()->share('desc', $request->descript);
                view()->share('time', $request->time);
                view()->share('fulltime', $request->fulltime);
                view()->share('true', $request->true);
                view()->share('rov', $request->rov);
                view()->share('defic', $request->defic);
                view()->share('proc', $request->proc);
            }
        }
        return view('thems.herd_pages.perceft.percadd');
    }

    function percefadd($local = 'ka', Request $request)
    {
        App::setLocale($local);
        $user = Auth::user();
        if ($request->method() == 'POST') {
            $padd = [
                'uuid' => Uuid::uuid4(),
                'raodenoba' => $request->row,
                'swori' => $request->true,
                'timetest' => $request->time,
                'fulltime' => $request->fulltime,
                'proc' => $request->proc
            ];
            $perctest = $this->PerceftCompareTestRepositories->makeRecord($padd, true);
            $adduser = [
                'register_user_uuid' => $user->uuid,
                'row_uuid' => $perctest->uuid,
                'rype' => 1
            ];
            $this->RegisterUserToAnyRepositories->create($adduser);
            $addtest = [
                'test_uuid' => '2e8f08fc-8663-453a-92db-39384063eeb5',
                'row_uuid' => $perctest->uuid,
                'type' => 1
            ];
            $this->TestsToAnyRepositories->create($addtest);
            foreach ($request->persbigpass as $i => $persbigpass) {
                $testpart = [
                    'uuid' => Uuid::uuid4(),
                    'persbig' => $request->persbig[$i],
                    'perssmol' => $request->perssmol[$i],
                    'persbigpass' => $request->persbigpass[$i],
                    'seqtorei' => $request->seqtorei[$i]
                ];
                $testpartadd = $this->PerceftCompareTestPartsRepositories->makeRecord($testpart, true);
                $testparttoani = [
                    'perceft_compare_test_uuid' => $testpartadd->uuid,
                    'row_uuid' => $perctest->uuid,
                    'type' => 1
                ];
                $this->PerceftCompareTestToAnyRepositories->create($testparttoani);
            }
            $perctest->translateOrNew($local)->title = $request->title;
            $perctest->translateOrNew($local)->desc = $request->descript;
            $perctest->translateOrNew($local)->defic = $request->defic;
            $perctest->save();
        }
        return back();
    }

    function editpercef($upid = 0, $local = 'ka', Request $request)
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        if ($request->method() == 'POST') {
            $padd = [
                'uuid' => $request->percuuid,
//                'raodenoba' => $request->rov,
//                'swori' => $request->true,
                'timetest' => $request->time,
                'fulltime' => $request->fulltime,
                'proc' => $request->proc
            ];
            $perctest = $this->PerceftCompareTestRepositories->makeRecord($padd, true);
            $perctest->translateOrNew($local)->title = $request->title;
            $perctest->translateOrNew($local)->desc = $request->descript;
            $perctest->translateOrNew($local)->defic = $request->defic;
            $perctest->save();
            foreach ($request->perpartid as $i => $perpartiditem) {
                $testpart = [
                    'persbig' => $request->persbig[$i],
                    'perssmol' => $request->perssmol[$i],
                    'persbigpass' => $request->persbigpass[$i]
                ];
                $this->PerceftCompareTestPartsRepositories->update($testpart, $perpartiditem);
            }
        }
        $percad = $this->PerceftCompareTestRepositories->find($upid);
        foreach ($this->PerceftCompareTestRepositories->PerceftCompareJoin($percad->uuid)->get() as $perctoani) {
            foreach ($this->PerceftCompareTestPartsRepositories->where('uuid', '=', $perctoani['pivot']->perceft_compare_test_uuid)->get() as $percpart) {
                $percpartviu[] = $percpart;
            }
        }
        view()->share('percad', $percad);
        view()->share('percpartviu', $percpartviu);
        return view('thems.herd_pages.perceft.percedit');
    }

    function dellpercef($upid = 0, $local = 'ka')
    {
        App::setLocale($local);
        $perc = $this->PerceftCompareTestRepositories->find($upid);
        $this->RegisterUserToAnyRepositories->where('row_uuid', '=', $perc->uuid)->delete();
        $this->TestsToAnyRepositories->where('row_uuid', '=', $perc->uuid)->delete();
        foreach ($this->PerceftCompareTestRepositories->PerceftCompareJoin($perc->uuid)->get() as $percpaty) {
            $this->PerceftCompareTestPartsRepositories->where('uuid', '=', $percpaty['pivot']->perceft_compare_test_uuid)->delete();
        }
        $this->PerceftCompareTestToAnyRepositories->where('row_uuid', '=', $perc->uuid)->delete();
        $this->PerceftCompareTestRepositories->delete($upid);
        return back();
    }

    function usergamot($sigid = 0, $local = 'ka')
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        $user = Auth::user();
        $test = $this->PerceftCompareTestRepositories->find($sigid);
        $usertoani = $this->RegisterUserToAnyRepositories->where('row_uuid', '=', $test->uuid)->where('test_user', '=', 3)->get();
        foreach ($usertoani as $usertoaniitem) {
            $usergamot[] = $this->RegisterUserRepositories->where('uuid', '=', $usertoaniitem->register_user_uuid)/*->where(function ($query) use ($user) {
                $query->where('uuid', '=', $user->uuid)
                    ->orWhere('reg_user', '=', $user->uuid);
            })*/->get();
        }
        if (isset($usergamot[0][0]->uuid) && !empty($usergamot[0][0]->uuid)) {
            foreach ($usergamot as $i => $usergamotitem) {
                $filerov[] = $this->PerceftCompareTestPasuxuserRepositories
                    ->where('user_uuid', '=', $usergamotitem[$i]->uuid)
                    ->where('testuuid', '=', $test->uuid)
                    ->select('user_uuid', 'datauser', 'testuuid')
                    ->groupBy('user_uuid', 'datauser', 'testuuid')
                    ->get();
            }

            view()->share('filerov', $filerov);
            view()->share('usertoani', $usergamot);
        }
        return view('thems.herd_pages.perceft.usepasux');
    }

    function pasuxfile($testuuid = 0, $user_uuid = 0, $datauser = 0, $file = 0, $local = 'ka')
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        $dataform = gmdate("D M j Y G:i:s ", strtotime($datauser)) . "GMT+0400 (Georgia Standard Time)";
        $fileval = $this->PerceftCompareTestPasuxuserRepositories
            ->where('testuuid', '=', $testuuid)
            ->where('user_uuid', '=', $user_uuid)
            ->where('datauser', '=', $dataform)
            ->get();
        $diagrama = $this->PerceftCompareTestDiagramRepositories
            ->where('testuuid', '=', $testuuid)
            ->first();
        view()->share('diagrama', $diagrama);
        view()->share('testuuid', $testuuid);
        view()->share('user_uuid', $user_uuid);
        view()->share('datauser', $datauser);

        if ($file > 0) {
            $customer_array[] = array('persbig', 'persbigpass', 'momxpasux', 'pasuxdro', 'upasuxtuara', 'sworipasux');
            foreach ($fileval as $filevalitem) {
                $exelfile[] = array(
                    'persbig' => $filevalitem->persbig,
                    'persbigpass' => $filevalitem->persbigpass,
                    'momxpasux' => $filevalitem->momxpasux,
                    'pasuxdro' => $filevalitem->pasuxdro,
                    'upasuxtuara' => $filevalitem->upasuxtuara,
                    'sworipasux' => $filevalitem->sworipasux,
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
                    $active_sheet->setCellValue('A' . 1, 'პირველი სიმბოლო');
                    $active_sheet->setCellValue('A' . $row_next, $tabledataitem['persbig']);
                    $active_sheet->setCellValue('B' . 1, 'მეორე სიმბოლო ');
                    $active_sheet->setCellValue('B' . $row_next, $tabledataitem['persbigpass']);
                    $active_sheet->setCellValue('C' . 1, 'მსგავსების ტიპი ');
                    $active_sheet->setCellValue('C' . $row_next, $tabledataitem['seqtorei']);
                    $active_sheet->setCellValue('D' . 1, 'რეაქციის დრო ');
                    $active_sheet->setCellValue('D' . $row_next, $tabledataitem['pasuxdro']);
                    $active_sheet->setCellValue('E' . 1, 'უპასუხა თუ არა');
                    if($tabledataitem['upasuxtuara'] == 'true')
                    {$active_sheet->setCellValue('E' . $row_next, 1);}
                    else
                    {$active_sheet->setCellValue('E' . $row_next, 0);}
                    $active_sheet->setCellValue('F' . 1, 'სისწორე ');
                    if($tabledataitem['sworipasux'] == 'true')
                    {$active_sheet->setCellValue('F' . $row_next, 1);}
                    else
                    {$active_sheet->setCellValue('F' . $row_next, 0);}
                    $i++;
                }
            }

            header("Content-Type:application/vnb.ms-excel");
            header("Content-Disposition:attachment;filename='signal.xls'");

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
            return back();
        } else {
            return view('thems.herd_pages.perceft.diagram');
        }
    }

    function userbase($dellid = 0, $local = 'ka', Request $request)
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        $reguser = Auth::user();
        $user = $this->RegisterUserRepositories->where('status', '=', 3)->get();
        $testuuid = $this->PerceftCompareTestRepositories->find($dellid);
        $pasux = $this->PerceftCompareTestPasuxRepositories->where('testuuid', '=', $testuuid->uuid)->first();
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
                $request->sworipasux != null ||
                $request->upasuxtuara != null ||
                $request->pasuxdro != null ||
                $request->momxpasux != null ||
                $request->persbig != null ||
                $request->persbigpass != null) {
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
                    'sworipasux' => $request->sworipasux,
                    'upasuxtuara' => $request->upasuxtuara,
                    'pasuxdro' => $request->pasuxdro,
                    'momxpasux' => $request->momxpasux,
                    'persbig' => $request->persbig,
                    'persbigpass' => $request->persbigpass,
                    'xgerdz' => $xger,
                    'ygerdz' => $yger,
                    'testuuid' => $testuuid->uuid
                ];
//                dd($testpasux);
                $signal = $this->PerceftCompareTestPasuxRepositories->makeRecord($testpasux);
            }
        }
        return view('thems.herd_pages.perceft.percektuser');
    }

    function diagrama($testuuid = 0, $diagramid = 0, $local = 'ka')
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
//        $fileval = $this->PerceftCompareTestPasuxuserRepositories
//            ->where('testuuid', '=', $testuuid)
//            ->where('user_uuid', '=', $user_uuid)
//            ->where('datauser', '=', $datauser)
//            ->get();
        $fileval = $this->PerceftCompareTestDiagramRepositories->find($diagramid);
        $diagramx = explode(',', $fileval->diagrama_x);
        $diagramy = explode(',', $fileval->diagrama_y);
        foreach ($diagramx as $i => $filevalitem) {
            $xdgr[] = $diagramx[$i];
            $ydgr[] = $diagramy[$i];
        }
//dd($ydgr);
        view()->share('xdgr', $xdgr);
        view()->share('ydgr', $ydgr);
        return view('thems.herd_pages.signal.phpchart');
    }
}
