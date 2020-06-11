<?php


namespace TestCMS\Http\Controllers\Manager;


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use PHPExcel;
use PHPExcel_IOFactory;
use Ramsey\Uuid\Uuid;
use TestCMS\Repositories\TestsRepositories;
use TestCMS\Repositories\MentalRotaciaTestRepositories;
use TestCMS\Repositories\MentalRotaciaTestToAnyRepositories;
use TestCMS\Repositories\MentalRotaciaTestPartsRepositories;
use TestCMS\Repositories\RegisterUserToAnyRepositories;
use TestCMS\Repositories\TestsToAnyRepositories;
use TestCMS\Repositories\RegisterUserRepositories;
use TestCMS\Repositories\MentalRotaciaTestPasuxRepositories;
use TestCMS\Repositories\MentalRotaciaTestPasuxuserRepositories;
use TestCMS\Repositories\MentalRotaciaTestDiagramRepositories;
use TestCMS\Http\Requests\Manager\Request;

class mentalQuizeController extends ManagetController
{
    protected $TestsRepositories, $MentalRotaciaTestRepositories, $MentalRotaciaTestToAnyRepositories, $MentalRotaciaTestPartsRepositories, $RegisterUserToAnyRepositories,
        $TestsToAnyRepositories, $RegisterUserRepositories, $MentalRotaciaTestPasuxRepositories, $MentalRotaciaTestPasuxuserRepositories, $MentalRotaciaTestDiagramRepositories;

    function __construct(
        TestsRepositories $TestsRepositories,
        MentalRotaciaTestRepositories $MentalRotaciaTestRepositories,
        MentalRotaciaTestToAnyRepositories $MentalRotaciaTestToAnyRepositories,
        MentalRotaciaTestPartsRepositories $MentalRotaciaTestPartsRepositories,
        RegisterUserToAnyRepositories $RegisterUserToAnyRepositories,
        RegisterUserRepositories $RegisterUserRepositories,
        MentalRotaciaTestPasuxRepositories $MentalRotaciaTestPasuxRepositories,
        MentalRotaciaTestPasuxuserRepositories $MentalRotaciaTestPasuxuserRepositories,
        MentalRotaciaTestDiagramRepositories $MentalRotaciaTestDiagramRepositories,
        TestsToAnyRepositories $TestsToAnyRepositories
    )
    {
        $this->TestsRepositories = $TestsRepositories;
        $this->MentalRotaciaTestRepositories = $MentalRotaciaTestRepositories;
        $this->MentalRotaciaTestToAnyRepositories = $MentalRotaciaTestToAnyRepositories;
        $this->MentalRotaciaTestPartsRepositories = $MentalRotaciaTestPartsRepositories;
        $this->RegisterUserToAnyRepositories = $RegisterUserToAnyRepositories;
        $this->RegisterUserRepositories = $RegisterUserRepositories;
        $this->MentalRotaciaTestPasuxRepositories = $MentalRotaciaTestPasuxRepositories;
        $this->MentalRotaciaTestPasuxuserRepositories = $MentalRotaciaTestPasuxuserRepositories;
        $this->MentalRotaciaTestDiagramRepositories = $MentalRotaciaTestDiagramRepositories;
        $this->TestsToAnyRepositories = $TestsToAnyRepositories;

        view()->share('testquiz', $this->TestsRepositories->all());

    }

    function mentalQuize($local = 'ka')
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        $user = Auth::user();
        if ($user->status == 2) {
            $test = $this->TestsRepositories->where('key', '=', 'mental')->get();
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
                    $testviuv[] = $this->MentalRotaciaTestRepositories->where('uuid', '=', $reguseritem)->first();
                }

                view()->share('testviuv', $testviuv);
            }
        }
        if ($user->status == 1) {
            view()->share('testviuv', $this->MentalRotaciaTestRepositories->all());
        }
        $usert = $this->RegisterUserRepositories->where('reg_user', '!=', 3)->get();
        $usertoauth = $this->RegisterUserToAnyRepositories->whereNull('test_user')->get();
        view()->share('usert', $usert);
        view()->share('usertoauth', $usertoauth);
        return view('thems.herd_pages.mental.mental');
    }

    function mentaladd($local = 'ka', Request $request)
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        if ($request->method() == 'POST') {
            for ($i = 1; $i <= $request->rov; $i++) {
                $this->mentaltest($request->brstart, $request->brsfinish, $request->brsrange);
                $pasux[] = $this->pasuxebi;
            }
            view()->share('swori', $pasux);

            view()->share('title', $request->title);
            view()->share('desc', $request->descript);
            view()->share('time', $request->time);
            view()->share('fulltime', $request->fulltime);
            view()->share('rov', $request->rov);
            view()->share('brstart', $request->brstart);
            view()->share('brsfinish', $request->brsfinish);
            view()->share('brsrange', $request->brsrange);
            view()->share('defic', $request->defic);
            view()->share('proc', $request->proc);
        }

        return view('thems.herd_pages.mental.mentaladd');
    }

    function mentaladdpart($local = 'ka', Request $request)
    {
        App::setLocale($local);
        $user = Auth::user();
        if ($request->method() == 'POST') {
            $addtest = [
                "uuid" => Uuid::uuid4(),
                "time" => $request->time,
                "timefull" => $request->fulltime,
                "rov" => $request->rov,
                "rotatestart" => $request->brstart,
                "rotatefinish" => $request->brsfinish,
                "rotaterange" => $request->brsrange,
                "proc" => $request->proc
            ];
            $testdam = $this->MentalRotaciaTestRepositories->makeRecord($addtest, true);
            $regadd = [
                'register_user_uuid' => $user->uuid,
                'row_uuid' => $testdam->uuid,
                'rype' => 1
            ];
            $this->RegisterUserToAnyRepositories->create($regadd);
            $testtoani = [
                'test_uuid' => 'c516da60-ecea-48ec-857f-c67c179e52b3',
                'row_uuid' => $testdam->uuid,
                'type' => 1
            ];
            $this->TestsToAnyRepositories->create($testtoani);
            foreach ($request->testaso as $i => $testaso) {
                $testpart = [
                    'uuid' => Uuid::uuid4(),
                    'testaso' => $request->testaso[$i],
                    'gradusi' => $request->kutxe[$i],
                    'revers' => $request->sarke[$i]
                ];
                $testpartadd = $this->MentalRotaciaTestPartsRepositories->makeRecord($testpart, true);
                $testtoani = [
                    'mental_rotacia_test' => $testdam->uuid,
                    'row_uuid' => $testpartadd->uuid,
                    'type' => 1
                ];
                $this->MentalRotaciaTestToAnyRepositories->create($testtoani);
            }
            $testdam->translateOrNew($local)->title = $request->title;
            $testdam->translateOrNew($local)->desc = $request->desc;
            $testdam->translateOrNew($local)->defic = $request->defic;
            $testdam->save();
        }
        return back();
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
            $testmentedit = $this->MentalRotaciaTestRepositories->makeRecord($updatetest, true);
            $testmentedit->translateOrNew($local)->title = $request->title;
            $testmentedit->translateOrNew($local)->desc = $request->descript;
            $testmentedit->translateOrNew($local)->defic = $request->defic;
            $testmentedit->save();
//            dd($testmentedit);
            foreach ($request->perpartid as $i => $perpartiditem) {
                $partupdate = [
                    'uuid' => $request->perpartid[$i],
                    'testaso' => $request->testaso[$i],
                    'gradusi' => $request->gradusi[$i],
                    'revers' => $request->revers[$i]
                ];
                $this->MentalRotaciaTestPartsRepositories->makeRecord($partupdate);
            }
        }
        $metsedit = $this->MentalRotaciaTestRepositories->find($upid);
//        dd($this->MentalRotaciaTestRepositories->MentalComparetoani($metsedit->uuid)->get());
        foreach ($this->MentalRotaciaTestRepositories->MentalComparetoani($metsedit->uuid)->get() as $mentpartitem) {

            foreach ($this->MentalRotaciaTestPartsRepositories->where('uuid', '=', $mentpartitem['pivot']->row_uuid)->get() as $partitem) {
                $pasi[] = $partitem;
            }
        }
        view()->share('percad', $metsedit);
        view()->share('percpartviu', $pasi);

        return view('thems.herd_pages.mental.mentaledit');
    }

    function mentaldelete($upid = 0, $local = 'ka', Request $request)
    {
        App::setLocale($local);
        $testment = $this->MentalRotaciaTestRepositories->find($upid);
        $this->RegisterUserToAnyRepositories->where('row_uuid', '=', $testment->uuid)->delete();
        $this->TestsToAnyRepositories->where('row_uuid', '=', $testment->uuid)->delete();
        foreach ($this->MentalRotaciaTestRepositories->MentalComparetoani($testment->uuid)->get() as $mentpartitem) {
            $this->MentalRotaciaTestPartsRepositories->where('uuid', '=', $mentpartitem['pivot']->row_uuid)->delete();
        }
        $this->MentalRotaciaTestToAnyRepositories->where('mental_rotacia_test', '=', $testment->uuid)->delete();
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
        $testuuid = $this->MentalRotaciaTestRepositories->find($dellid);
        $pasux = $this->MentalRotaciaTestPasuxRepositories->where('testuuid', '=', $testuuid->uuid)->first();
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
                $signal = $this->MentalRotaciaTestPasuxRepositories->makeRecord($testpasux);
            }
        }
        return view('thems.herd_pages.mental.percektuser');
    }

    function usergamot($sigid = 0, $local = 'ka')
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        $user = Auth::user();
        $test = $this->MentalRotaciaTestRepositories->find($sigid);

        $usertoani = $this->RegisterUserToAnyRepositories->where('row_uuid', '=', $test->uuid)/*->where('test_user','=',3)*/ ->get();

        foreach ($usertoani as $usertoaniitem) {
            $usergamot[] = $this->RegisterUserRepositories->where('uuid', '=', $usertoaniitem->register_user_uuid)/*->where(function ($query) use ($user){
                $query->where('uuid', '=', $user->uuid)
                    ->orWhere('reg_user', '=', $user->uuid);
            })*/
            ->get();
        }
        if (isset($usergamot[0][0]->uuid) && !empty($usergamot[0][0]->uuid)) {

            foreach ($usergamot as $i => $usergamotitem) {
                $filerov[] = $this->MentalRotaciaTestPasuxuserRepositories
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
        return view('thems.herd_pages.mental.usepasux');
    }

    function pasuxfile($testuuid = 0, $user_uuid = 0, $datauser = 0, $file = 0, $local = 'ka')
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        $dataform = gmdate("D M j Y G:i:s ", strtotime($datauser)) . "GMT+0400 (Georgia Standard Time)";
        $fileval = $this->MentalRotaciaTestPasuxuserRepositories
            ->where('testuuid', '=', $testuuid)
            ->where('user_uuid', '=', $user_uuid)
//            ->where('datauser','=',$dataform)
            ->get();
        $diagrama = $this->MentalRotaciaTestDiagramRepositories
            ->where('testuuid', '=', $testuuid)
            ->get();
        view()->share('diagrama', $diagrama);
        view()->share('testuuid', $testuuid);
        view()->share('user_uuid', $user_uuid);
        view()->share('datauser', $datauser);
        if ($file > 0) {
            $customer_array[] = array('testaso', 'gradusi', 'revers', 'momxpasux', 'pasuxdro', 'upasuxtuara', 'sworipasux');
            foreach ($fileval as $filevalitem) {
                $exelfile[] = array(
                    'testaso' => $filevalitem->testaso,
                    'gradusi' => $filevalitem->gradusi,
                    'revers' => $filevalitem->revers,
                    'momxpasux' => $filevalitem->momxpasux,
                    'pasuxdro' => $filevalitem->pasuxdro,
                    'upasuxtuara' => $filevalitem->upasuxtuara,
                    'sworipasux' => $filevalitem->sworipasux,
                    'datauser' => $filevalitem->datauser

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
                    $tar = explode('GMT+0400', $tabledataitem['datauser']);
                    $datauser = gmdate("Y-m-d H:i:s", strtotime($tar[0]));
                    if ($datauser == $datauser) {
                        $row_next = $row_start + $i;
                        $active_sheet->setCellValue('A' . 1, 'სატესტო სტიმული');
                        $active_sheet->setCellValue('A' . $row_next, $tabledataitem['testaso']);
                        $active_sheet->setCellValue('B' . 1, 'ბრუნვის კუთხე ');
                        $active_sheet->setCellValue('B' . $row_next, $tabledataitem['gradusi']);
                        $active_sheet->setCellValue('C' . 1, 'სტიმულის სახე');
                        $active_sheet->setCellValue('C' . $row_next, $tabledataitem['revers']);
                        $active_sheet->setCellValue('D' . 1, 'მომხმარებლის პასუხი');
                        $active_sheet->setCellValue('D' . $row_next, $tabledataitem['momxpasux']);
                        $active_sheet->setCellValue('E' . 1, 'რეაქციის დრო');
                        $active_sheet->setCellValue('E' . $row_next, $tabledataitem['pasuxdro']);
                        $active_sheet->setCellValue('F' . 1, 'უპასუხა თუ არა');
                        if ($tabledataitem['upasuxtuara'] == 'true') {
                            $active_sheet->setCellValue('F' . $row_next, 1);
                        } else {
                            $active_sheet->setCellValue('F' . $row_next, 0);
                        }
                        $active_sheet->setCellValue('G' . 1, 'სისწორე');
                        if ($tabledataitem['sworipasux'] == 'true') {
                            $active_sheet->setCellValue('G' . $row_next, 1);
                        } else {
                            $active_sheet->setCellValue('G' . $row_next, 0);
                        }
                        $i++;
                    }
                }
            }

            header("Content-Type:application/vnb.ms-excel");
            header("Content-Disposition:attachment;filename=signal.xls");

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
            return back();
        } else {
            return view('thems.herd_pages.mental.diagram');
        }
    }

    function diagrama($testuuid = 0, $diagramid = 0, $local = 'ka')
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
//        $fileval = $this->MentalRotaciaTestPasuxuserRepositories
//            ->where('testuuid','=',$testuuid)
//            ->where('user_uuid','=',$user_uuid)
//            ->where('datauser','=',$datauser)
//            ->get();
        $fileval = $this->MentalRotaciaTestDiagramRepositories->find($diagramid);
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
