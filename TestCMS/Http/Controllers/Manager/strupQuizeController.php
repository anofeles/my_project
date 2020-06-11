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
use TestCMS\Repositories\StrupEfeqtTestRepositories;
use TestCMS\Repositories\StrupEfeqtTestPartsRepositories;
use TestCMS\Repositories\StrupEfeqtTestToAnyRepositories;
use TestCMS\Repositories\StrupEfeqtTestPasuxRepositories;
use TestCMS\Repositories\StrupEfeqtTestPasuxuserRepositories;
use TestCMS\Repositories\StrupEfeqtTestDiagramRepositories;

class strupQuizeController extends ManagetController
{
    protected $TestsRepositories, $TestsToAnyRepositories, $RegisterUserToAnyRepositories, $StrupEfeqtTestRepositories,
        $StrupEfeqtTestPartsRepositories, $StrupEfeqtTestToAnyRepositories, $StrupEfeqtTestPasuxRepositories, $RegisterUserRepositories,
        $StrupEfeqtTestPasuxuserRepositories, $StrupEfeqtTestDiagramRepositories;

    function __construct(
        TestsRepositories $TestsRepositories,
        TestsToAnyRepositories $TestsToAnyRepositories,
        RegisterUserToAnyRepositories $RegisterUserToAnyRepositories,
        StrupEfeqtTestRepositories $StrupEfeqtTestRepositories,
        StrupEfeqtTestPartsRepositories $StrupEfeqtTestPartsRepositories,
        StrupEfeqtTestPasuxRepositories $StrupEfeqtTestPasuxRepositories,
        RegisterUserRepositories $RegisterUserRepositories,
        StrupEfeqtTestPasuxuserRepositories $StrupEfeqtTestPasuxuserRepositories,
        StrupEfeqtTestDiagramRepositories $StrupEfeqtTestDiagramRepositories,
        StrupEfeqtTestToAnyRepositories $StrupEfeqtTestToAnyRepositories
    )
    {
        $this->TestsRepositories = $TestsRepositories;
        $this->TestsToAnyRepositories = $TestsToAnyRepositories;
        $this->RegisterUserToAnyRepositories = $RegisterUserToAnyRepositories;
        $this->StrupEfeqtTestRepositories = $StrupEfeqtTestRepositories;
        $this->StrupEfeqtTestPartsRepositories = $StrupEfeqtTestPartsRepositories;
        $this->StrupEfeqtTestToAnyRepositories = $StrupEfeqtTestToAnyRepositories;
        $this->StrupEfeqtTestPasuxRepositories = $StrupEfeqtTestPasuxRepositories;
        $this->StrupEfeqtTestPasuxuserRepositories = $StrupEfeqtTestPasuxuserRepositories;
        $this->StrupEfeqtTestDiagramRepositories = $StrupEfeqtTestDiagramRepositories;
        $this->RegisterUserRepositories = $RegisterUserRepositories;

        view()->share('testquiz', $this->TestsRepositories->all());

    }

    public function strupQuize($local = 'ka')
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        $user = Auth::user();
        if ($user->status == 2) {
            $test = $this->TestsRepositories->where('key', '=', 'strup')->get();
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
                    $testviuv[] = $this->StrupEfeqtTestRepositories->where('uuid', '=', $reguseritem)->first();
                }
                view()->share('testviuv', $testviuv);
            }
        }
        if ($user->status == 1) {
            view()->share('testviuv', $this->StrupEfeqtTestRepositories->all());
        }
        $usert = $this->RegisterUserRepositories->where('reg_user','!=',3)->get();
        $usertoauth = $this->RegisterUserToAnyRepositories->whereNull('test_user')->get();
        view()->share('usert', $usert);
        view()->share('usertoauth', $usertoauth);
        return view('thems.herd_pages.strup.datagrid');
    }

    function strupadd($local = 'ka', Request $request)
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        if ($request->method() == 'POST') {
            for ($i = 0; $i < $request->rov; $i++) {
                $this->strup($request->true, $i, $request->neitr);
                $swori[] = $this->pasuxebi;
            }
            view()->share('swori', $swori);

            view()->share('titleadd', $request->title);
            view()->share('descadd', $request->descript);
            view()->share('true', $request->true);
            view()->share('rov', $request->rov);
            view()->share('neitr', $request->neitr);
            view()->share('time', $request->time);
            view()->share('fulltime', $request->fulltime);
            view()->share('defic', $request->defic);
            view()->share('proc', $request->proc);
        }

        return view('thems.herd_pages.strup.strupadd');
    }

    function strupaddpart($local = 'ka', Request $request)
    {
        App::setLocale($local);
        $user = Auth::user();
        if ($request->method() == 'POST') {
            $strupadd = [
                'uuid' => Uuid::uuid4(),
                'raodenoba' => $request->rov,
                'swori' => $request->true,
                'neitraluri' => $request->neitr,
                'timetest' => $request->time,
                'fulltimetest' => $request->fulltime,
                'proc' => $request->proc
            ];
            $strup = $this->StrupEfeqtTestRepositories->makeRecord($strupadd, true);
            $registradd = [
                'register_user_uuid' => $user->uuid,
                'row_uuid' => $strup->uuid,
                'rype' => 1
            ];
            $this->RegisterUserToAnyRepositories->create($registradd);
            $testadd = [
                'test_uuid' => '33042654-9555-4971-91c0-10cdbc30a34a',
                'row_uuid' => $strup->uuid,
                'type' => 1
            ];
            $this->TestsToAnyRepositories->create($testadd);
            foreach ($request->strupcolor as $i => $strupcolor) {
                $sprittestadd = [
                    'uuid' => Uuid::uuid4(),
                    'color' => $request->strupcolor[$i],
                    'text' => $request->strupcolorindex[$i],
                    'kebord' => $request->gilaki[$i],
                    'kofiguration' => $request->kofiguration[$i]
                ];
                $tetsadd = $this->StrupEfeqtTestPartsRepositories->makeRecord($sprittestadd, true);
                $struptoani = [
                    'strup_efeqt_test_uuid' => $tetsadd->uuid,
                    'row_uuid' => $strup->uuid,
                    'type' => 1
                ];
                $this->StrupEfeqtTestToAnyRepositories->create($struptoani);
            }
            $strup->translateOrNew($local)->title = $request->titleadd;
            $strup->translateOrNew($local)->desc = $request->descadd;
            $strup->translateOrNew($local)->defic = $request->defic;
            $strup->save();
        }
        return back();
    }

    function editstrup($upid = 0, $local = 'ka', Request $request)
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        if ($request->method() == 'POST') {
            $strup = [
                'uuid' => $request->srid,
                'timetest' => $request->time,
                'fulltimetest' => $request->timefull,
                'proc' => $request->proc
            ];
            $sprutedit = $this->StrupEfeqtTestRepositories->makeRecord($strup, true);
            $sprutedit->translateOrNew($local)->title = $request->title;
            $sprutedit->translateOrNew($local)->desc = $request->desc;
            $sprutedit->translateOrNew($local)->defic = $request->defic;
            $sprutedit->save();
            foreach ($request->srpartid as $i => $srpartid) {
                $strupartedit = [
                    'color' => $request->sworigen[$i],
                    'text' => $request->arasworigen[$i],
                    'kebord' => $request->ganlagebagen[$i]
                ];
                $this->StrupEfeqtTestPartsRepositories->update($strupartedit, $srpartid);
            }
        }
        $sprutviu = $this->StrupEfeqtTestRepositories->find($upid);
        view()->share('sprutviu', $sprutviu);
        foreach ($this->StrupEfeqtTestRepositories->spruttoani($sprutviu->uuid)->get() as $signaturequeri) {
            foreach ($this->StrupEfeqtTestPartsRepositories->where('uuid', '=', $signaturequeri['pivot']->strup_efeqt_test_uuid)->get() as $TestParts) {
                $signal['quiz'][] = [
                    'id' => $TestParts->id,
                    'color' => $TestParts->color,
                    'text' => $TestParts->text,
                    'kebord' => $TestParts->kebord
                ];
            }
        }
        view()->share('signal', $signal);

        return view('thems.herd_pages.strup.strupedit');
    }

    function dellstrup($upid = 0, $local = 'ka')
    {
        App::setLocale($local);
        $strup = $this->StrupEfeqtTestRepositories->find($upid);
        $this->RegisterUserToAnyRepositories->where('row_uuid', '=', $strup->uuid)->delete();
        $this->TestsToAnyRepositories->where('row_uuid', '=', $strup->uuid)->delete();
        foreach ($this->StrupEfeqtTestRepositories->spruttoani($strup->uuid)->get() as $signaturequeri) {
            $this->StrupEfeqtTestPartsRepositories->where('uuid', '=', $signaturequeri['pivot']->strup_efeqt_test_uuid)->delete();
        }
        $this->StrupEfeqtTestToAnyRepositories->where('row_uuid', '=', $strup->uuid)->delete();
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
        $testuuid = $this->StrupEfeqtTestRepositories->find($dellid);
        $pasux = $this->StrupEfeqtTestPasuxRepositories->where('testuuid', '=', $testuuid->uuid)->first();
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
                    'color' => $request->color,
                    'text' => $request->text,
                    'kebord' => $request->kebord,
                    'momxpasux' => $request->momxpasux,
                    'pasuxdro' => $request->pasuxdro,
                    'upasuxtuara' => $request->upasuxtuara,
                    'sworipasux' => $request->sworipasux,
                    'kofiguration' => $request->kofiguration,
                    'xgerdz' => $xger,
                    'ygerdz' => $yger,
                    'testuuid' => $testuuid->uuid
                ];
//                dd($testpasux);
                $signal = $this->StrupEfeqtTestPasuxRepositories->makeRecord($testpasux);
            }
        }
        return view('thems.herd_pages.strup.percektuser');
    }

    function usergamot($sigid = 0, $local = 'ka')
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        $user = Auth::user();
        $test = $this->StrupEfeqtTestRepositories->find($sigid);
        $usertoani = $this->RegisterUserToAnyRepositories->where('row_uuid', '=', $test->uuid)->where('test_user', '=', 3)->get();
        foreach ($usertoani as $usertoaniitem) {
            $usergamot[] = $this->RegisterUserRepositories->where('uuid','=',$usertoaniitem->register_user_uuid)/*->where(function ($query) use ($user){
                $query->where('uuid', '=', $user->uuid)
                    ->orWhere('reg_user', '=', $user->uuid);
            })*/->get();
        }
        if (isset($usergamot[0][0]->uuid) && !empty($usergamot[0][0]->uuid)) {
            foreach ($usergamot as $i => $usergamotitem) {
                    $filerov[] = $this->StrupEfeqtTestPasuxuserRepositories
                        ->where('user_uuid', '=', $usergamotitem[$i]->uuid)
                        ->where('testuuid', '=', $test->uuid)
                        ->select('user_uuid', 'datauser', 'testuuid')
                        ->groupBy('user_uuid', 'datauser', 'testuuid')
                        ->get();
            }

            view()->share('filerov', $filerov);
            view()->share('usertoani', $usergamot);
        }
        return view('thems.herd_pages.strup.usepasux');
    }

    function pasuxfile($testuuid = 0, $user_uuid = 0, $datauser = 0, $file = 0, $local = 'ka')
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        $dataform =  gmdate("D M j Y G:i:s ",strtotime($datauser))."GMT+0400 (Georgia Standard Time)";
        $fileval = $this->StrupEfeqtTestPasuxuserRepositories
            ->where('testuuid', '=', $testuuid)
            ->where('user_uuid', '=', $user_uuid)
            ->where('datauser', '=', $dataform)
            ->get();
        $diagrama = $this->StrupEfeqtTestDiagramRepositories
            ->where('testuuid', '=', $testuuid)
            ->first();
        view()->share('diagrama', $diagrama);
        view()->share('testuuid', $testuuid);
        view()->share('user_uuid', $user_uuid);
        view()->share('datauser', $datauser);
        if ($file > 0) {
            $customer_array[] = array('color', 'text', 'kebord', 'momxpasux', 'pasuxdro', 'upasuxtuara', 'sworipasux', 'kofiguration');
            foreach ($fileval as $filevalitem) {
                $exelfile[] = array(
                    'color' => $filevalitem->color,
                    'text' => $filevalitem->text,
                    'kebord' => $filevalitem->kebord,
                    'momxpasux' => $filevalitem->momxpasux,
                    'pasuxdro' => $filevalitem->pasuxdro,
                    'upasuxtuara' => $filevalitem->upasuxtuara,
                    'sworipasux' => $filevalitem->sworipasux,
                    'kofiguration' => $filevalitem->kofiguration,
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
                    $active_sheet->setCellValue('A' . 1, 'ფერი');
                    $active_sheet->setCellValue('A' . $row_next, $tabledataitem['color']);
                    $active_sheet->setCellValue('B' . 1, 'სიტყვა');
                    $active_sheet->setCellValue('B' . $row_next, $tabledataitem['text']);
                    $active_sheet->setCellValue('C' . 1, 'კონგულეტურობა ');
                    $active_sheet->setCellValue('C' . $row_next, $tabledataitem['kofiguration']);
                    $active_sheet->setCellValue('D' . 1, 'მომხმარებლის პასუხი ');
                    $active_sheet->setCellValue('D' . $row_next, $tabledataitem['momxpasux']);
                    $active_sheet->setCellValue('E' . 1, 'პასუხის დრო');
                    $active_sheet->setCellValue('E' . $row_next, $tabledataitem['pasuxdro']);
                    $active_sheet->setCellValue('F' . 1, 'უპასუხა თუ არა');
                    if($tabledataitem['upasuxtuara'] == 'true')
                    {$active_sheet->setCellValue('F' . $row_next, 1);}
                    else
                    {$active_sheet->setCellValue('F' . $row_next, 0);}
                    $active_sheet->setCellValue('G' . 1, 'ტესტის სწორი პასუხი');
                    if($tabledataitem['sworipasux'] == 'true')
                    {$active_sheet->setCellValue('G' . $row_next, 1);}
                    else
                    {$active_sheet->setCellValue('G' . $row_next, 0);}
                    $i++;
                }
            }

            header("Content-Type:application/vnb.ms-excel");
            header("Content-Disposition:attachment;filename='signal.xls'");

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
            return back();
        } else {
            return view('thems.herd_pages.strup.diagram');
        }
    }

    function diagrama($testuuid = 0, $diagramid = 0, $local = 'ka')
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
//        $fileval = $this->StrupEfeqtTestPasuxuserRepositories
//            ->where('testuuid', '=', $testuuid)
//            ->where('user_uuid', '=', $user_uuid)
//            ->where('datauser', '=', $datauser)
//            ->get();
        $fileval = $this->StrupEfeqtTestDiagramRepositories->find($diagramid);
        $diagramx = explode(',',$fileval->diagrama_x);
        $diagramy = explode(',',$fileval->diagrama_y);
        foreach ($diagramx as $i => $filevalitem){
            $xdgr[] = $diagramx[$i];
            $ydgr[] = $diagramy[$i];
        }
        view()->share('xdgr', $xdgr);
        view()->share('ydgr', $ydgr);
        return view('thems.herd_pages.signal.phpchart');
    }

}
