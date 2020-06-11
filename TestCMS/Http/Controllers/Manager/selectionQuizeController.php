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
use TestCMS\Repositories\SelectionTestRepositories;
use TestCMS\Repositories\SelectionTestPartsRepositories;
use TestCMS\Repositories\SelectionTestToAnyRepositories;
use TestCMS\Repositories\SelectionTestPasuxRepositories;
use TestCMS\Repositories\SelectionTestPasuxuserRepositories;
use TestCMS\Repositories\SelectionTestDiagramRepositories;


class selectionQuizeController extends ManagetController
{
    protected $TestsRepositories, $TestsToAnyRepositories, $RegisterUserToAnyRepositories, $SelectionTestRepositories, $SelectionTestPartsRepositories, $SelectionTestToAnyRepositories,
        $RegisterUserRepositories, $SelectionTestPasuxRepositories, $SelectionTestPasuxuserRepositories, $SelectionTestDiagramRepositories;

    function __construct(
        TestsRepositories $TestsRepositories,
        TestsToAnyRepositories $TestsToAnyRepositories,
        RegisterUserToAnyRepositories $RegisterUserToAnyRepositories,
        RegisterUserRepositories $RegisterUserRepositories,
        SelectionTestRepositories $SelectionTestRepositories,
        SelectionTestPartsRepositories $SelectionTestPartsRepositories,
        SelectionTestToAnyRepositories $SelectionTestToAnyRepositories,
        SelectionTestPasuxuserRepositories $SelectionTestPasuxuserRepositories,
        SelectionTestDiagramRepositories $SelectionTestDiagramRepositories,
        SelectionTestPasuxRepositories $SelectionTestPasuxRepositories
    )
    {
        $this->TestsRepositories = $TestsRepositories;
        $this->TestsToAnyRepositories = $TestsToAnyRepositories;
        $this->RegisterUserToAnyRepositories = $RegisterUserToAnyRepositories;
        $this->RegisterUserRepositories = $RegisterUserRepositories;
        $this->SelectionTestRepositories = $SelectionTestRepositories;
        $this->SelectionTestPartsRepositories = $SelectionTestPartsRepositories;
        $this->SelectionTestToAnyRepositories = $SelectionTestToAnyRepositories;
        $this->SelectionTestPasuxuserRepositories = $SelectionTestPasuxuserRepositories;
        $this->SelectionTestDiagramRepositories = $SelectionTestDiagramRepositories;
        $this->SelectionTestPasuxRepositories = $SelectionTestPasuxRepositories;

        view()->share('testquiz', $this->TestsRepositories->all());

    }

    public function selectionQuize($local = 'ka')
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        $user = Auth::user();
        if ($user->status == 2) {
            $test = $this->TestsRepositories->where('key', '=', 'selection')->get();
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
                    $testviuv[] = $this->SelectionTestRepositories->where('uuid', '=', $reguseritem)->first();
                }
                view()->share('testviuv', $testviuv);
            }
        }
        if ($user->status == 1) {
            view()->share('testviuv', $this->SelectionTestRepositories->all());
        }
        $usert = $this->RegisterUserRepositories->where('reg_user','!=',3)->get();
        $usertoauth = $this->RegisterUserToAnyRepositories->whereNull('test_user')->get();
        view()->share('usert', $usert);
        view()->share('usertoauth', $usertoauth);
        return view('thems.herd_pages.selection.datagrid');
    }

    function selectionadd($local = 'ka', Request $request)
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        if ($request->method() == 'POST') {
            $raod = $request->rov;
            $pirveli = $request->first;
            $saoindex = rand(0, 9);
            for ($i = 1; $i <= $raod; $i++) {
                $this->selec($raod, $i, $pirveli, $saoindex);
                $swori[] = $this->pasuxebi;
            }
            view()->share('swori', $swori);

            view()->share('title', $request->title);
            view()->share('desc', $request->descript);
            view()->share('time', $request->time);
            view()->share('fulltime', $request->fulltime);
            view()->share('first', $request->first);
            view()->share('rov', $request->rov);
            view()->share('defic', $request->defic);
            view()->share('proc', $request->proc);
        }
        return view('thems.herd_pages.selection.selectionadd');
    }

    function selectiondam($local = 'ka', Request $request)
    {
        App::setLocale($local);
        $user = Auth::user();
        if ($request->method() == 'POST') {

            $addsection = [
                'uuid' => Uuid::uuid4(),
                'row' => $request->row,
                'first' => $request->first,
                'time' => $request->time,
                'timetest' => $request->fulltime,
                'proc' => $request->proc
            ];
            $select = $this->SelectionTestRepositories->makeRecord($addsection, true);
            $regadd = [
                'register_user_uuid' => $user->uuid,
                'row_uuid' => $select->uuid,
                'rype' => 1
            ];
            $this->RegisterUserToAnyRepositories->create($regadd);
            $testadd = [
                'test_uuid' => '848b5a84-3101-4097-a8c3-9c7eee3aaa53',
                'row_uuid' => $select->uuid,
                'type' => 1
            ];
            $this->TestsToAnyRepositories->create($testadd);
            foreach ($request->pirveliaso as $i => $pirveliasoitem) {
                $selecpart = [
                    'uuid' => Uuid::uuid4(),
                    'variant' => $request->pirvelivarian[$i],
                    'dashoreba' => $request->dashorebap[$i],
                    'pirveliaso' => $request->pirveliaso[$i],
                    'meoreaso' => $request->meoreaso[$i]
                ];
                $selectpart = $this->SelectionTestPartsRepositories->makeRecord($selecpart, true);
                $selecttoani = [
                    'uuid' => Uuid::uuid4(),
                    'selection_test_uuid' => $select->uuid,
                    'row_uuid' => $selectpart->uuid,
                    'type' => 1
                ];
                $this->SelectionTestToAnyRepositories->makeRecord($selecttoani, true);
            }
            $select->translateOrNew($local)->title = $request->title;
            $select->translateOrNew($local)->desc = $request->desc;
            $select->translateOrNew($local)->defic = $request->defic;
            $select->save();
        }
        return back();
    }

    function editselection($upid = 0, $local = 'ka', Request $request)
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        if ($request->method() == 'POST') {
            $selectupd = [
                'uuid' => $request->srid,
                'time' => $request->time,
                'timetest' => $request->timefull,
                'proc' => $request->proc
            ];
            $selectupdate = $this->SelectionTestRepositories->makeRecord($selectupd, true);
            foreach ($request->srpartid as $i => $srpartiditem) {
                $selectpartupdate = [
                    'variant' => $request->variant[$i],
                    'dashoreba' => $request->dashoreba[$i],
                    'pirveliaso' => $request->pirveliaso[$i],
                    'meoreaso' => $request->meoreaso[$i]
                ];
                $this->SelectionTestPartsRepositories->update($selectpartupdate, $srpartiditem);
            }
            $selectupdate->translateOrNew($local)->title = $request->title;
            $selectupdate->translateOrNew($local)->desc = $request->desc;
            $selectupdate->translateOrNew($local)->defic = $request->defic;
            $selectupdate->save();
        }
        $selection = $this->SelectionTestRepositories->find($upid);
        foreach ($this->SelectionTestRepositories->Selectiontoani($selection->uuid)->get() as $selectionrov) {
            foreach ($this->SelectionTestPartsRepositories->where('uuid', '=', $selectionrov['pivot']->row_uuid)->get() as $selectionpart) {
                $signal['quiz'][] = $selectionpart;
            }
        }
        view()->share('signal', $signal);
        view()->share('selection', $selection);
        return view('thems.herd_pages.selection.selectionedit');
    }

    function dellselection($upid = 0, $local = 'ka', Request $request)
    {
        App::setLocale($local);
        $select = $this->SelectionTestRepositories->find($upid);
        $this->RegisterUserToAnyRepositories->where('row_uuid', '=', $select->uuid)->delete();
        $this->TestsToAnyRepositories->where('row_uuid', '=', $select->uuid)->delete();
        foreach ($this->SelectionTestRepositories->Selectiontoani($select->uuid)->get() as $selectionrov) {
            $this->SelectionTestPartsRepositories->where('uuid', '=', $selectionrov['pivot']->row_uuid)->delete();
        }
        $this->SelectionTestToAnyRepositories->where('selection_test_uuid', '=', $select->uuid)->delete();
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
        $testuuid = $this->SelectionTestRepositories->find($dellid);
        $pasux = $this->SelectionTestPasuxRepositories->where('testuuid', '=', $testuuid->uuid)->first();
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
                    'variant' => $request->variant,
                    'dashoreba' => $request->dashoreba,
                    'pirveliaso' => $request->pirveliaso,
                    'meoreaso' => $request->meoreaso,
                    'momxpasux' => $request->momxpasux,
                    'pasuxdro' => $request->pasuxdro,
                    'upasuxtuara' => $request->upasuxtuara,
                    'sworipasux' => $request->sworipasux,
                    'xgerdz' => $xger,
                    'ygerdz' => $yger,
                    'testuuid' => $testuuid->uuid
                ];
//                dd($testpasux);
                $signal = $this->SelectionTestPasuxRepositories->makeRecord($testpasux);
            }
        }
        return view('thems.herd_pages.selection.percektuser');
    }

    function usergamot($sigid = 0, $local = 'ka')
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        $user = Auth::user();
        $test = $this->SelectionTestRepositories->find($sigid);
        $usertoani = $this->RegisterUserToAnyRepositories->where('row_uuid', '=', $test->uuid)->where('test_user', '=', 3)->get();
        foreach ($usertoani as $usertoaniitem) {
            $usergamot[] = $this->RegisterUserRepositories->where('uuid','=',$usertoaniitem->register_user_uuid)/*->orWhere('reg_user', '=', $user->uuid)*/->get();
        }

        if (isset($usergamot[0][0]->uuid) && !empty($usergamot[0][0]->uuid)) {
            foreach ($usergamot as $i => $usergamotitem) {
                $filerov[] = $this->SelectionTestPasuxuserRepositories
                    ->where('user_uuid', '=', $usergamotitem[0]->uuid)
                    ->where('testuuid', '=', $test->uuid)
                    ->select('user_uuid', 'datauser', 'testuuid')
                    ->groupBy('user_uuid', 'datauser', 'testuuid')
                    ->get();
            }
            view()->share('filerov', $filerov);
            view()->share('usertoani', $usergamot);
        }
        return view('thems.herd_pages.selection.usepasux');
    }

    function pasuxfile($testuuid = 0, $user_uuid = 0, $datauser = 0, $file = 0, $local = 'ka')
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        $dataform =  gmdate("D M j Y G:i:s ",strtotime($datauser))."GMT+0400 (Georgia Standard Time)";
//        dd($dataform);
        $fileval = $this->SelectionTestPasuxuserRepositories
            ->where('testuuid', '=', $testuuid)
            ->where('user_uuid', '=', $user_uuid)
//            ->where('datauser', '=', $dataform)
            ->get();
        $diagrama = $this->SelectionTestDiagramRepositories
            ->where('testuuid', '=', $testuuid)
            ->first();
        view()->share('diagrama', $diagrama);
        view()->share('testuuid', $testuuid);
        view()->share('user_uuid', $user_uuid);
        view()->share('datauser', $datauser);
        if ($file > 0) {
            $customer_array[] = array('color', 'text', 'kebord', 'momxpasux', 'pasuxdro', 'upasuxtuara', 'sworipasux');
            foreach ($fileval as $filevalitem) {
                $exelfile[] = array(
                    'variant' => $filevalitem->variant,
                    'dashoreba' => $filevalitem->dashoreba,
                    'pirveliaso' => $filevalitem->pirveliaso,
                    'meoreaso' => $filevalitem->meoreaso,
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
                    $active_sheet->setCellValue('A' . 1, 'დისტრაქტორის სტიმულის ტიპი');
                    $active_sheet->setCellValue('A' . $row_next, $tabledataitem['variant']);
                    $active_sheet->setCellValue('B' . 1, 'დაშორება');
                    $active_sheet->setCellValue('B' . $row_next, $tabledataitem['dashoreba']);
                    $active_sheet->setCellValue('C' . 1, 'პირველი ასო');
                    $active_sheet->setCellValue('C' . $row_next, $tabledataitem['pirveliaso']);
                    $active_sheet->setCellValue('D' . 1, 'მეორე ასო');
                    $active_sheet->setCellValue('D' . $row_next, $tabledataitem['meoreaso']);
                    $active_sheet->setCellValue('E' . 1, 'მომხმარებლის პასუხი');
                    $active_sheet->setCellValue('E' . $row_next, $tabledataitem['momxpasux']);
                    $active_sheet->setCellValue('F' . 1, 'რეაქციის დრო');
                    $active_sheet->setCellValue('F' . $row_next, $tabledataitem['pasuxdro']);
                    $active_sheet->setCellValue('G' . 1, 'უპასუხა თუ არა');
                    if($tabledataitem['upasuxtuara'] == 'true')
                    {$active_sheet->setCellValue('G' . $row_next, 1);}
                    else
                    {$active_sheet->setCellValue('G' . $row_next, 0);}
                    $active_sheet->setCellValue('H' . 1, 'სისწორე');
                    if($tabledataitem['sworipasux'] == 'true')
                    {$active_sheet->setCellValue('H' . $row_next, 1);}
                    else
                    {$active_sheet->setCellValue('H' . $row_next, 0);}
                    $i++;
                }
            }

            header("Content-Type:application/vnb.ms-excel");
            header("Content-Disposition:attachment;filename='signal.xls'");

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
            return back();
        } else {
            return view('thems.herd_pages.selection.diagram');
        }
    }

    function diagrama($testuuid = 0, $diagramid = 0, $local = 'ka')
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
//        $fileval = $this->SelectionTestPasuxuserRepositories
//            ->where('testuuid', '=', $testuuid)
//            ->where('user_uuid', '=', $user_uuid)
//            ->where('datauser', '=', $datauser)
//            ->get();
        $fileval = $this->SelectionTestDiagramRepositories->find($diagramid);
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
