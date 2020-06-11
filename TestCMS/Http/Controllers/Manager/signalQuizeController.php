<?php


namespace TestCMS\Http\Controllers\Manager;


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use PHPExcel;
use PHPExcel_IOFactory;
use Ramsey\Uuid\Uuid;
use TestCMS\Http\Requests\Manager\Request;
use TestCMS\Repositories\TestsRepositories;
use TestCMS\Repositories\TestsToAnyRepositories;
use TestCMS\Repositories\RegisterUserToAnyRepositories;
use TestCMS\Repositories\SignalDetecTestRepositories;
use TestCMS\Repositories\SignalDetecTestPartsRepositories;
use TestCMS\Repositories\SignalDetecTestToAnyRepositories;
use TestCMS\Repositories\SignalDetecTestPasuxRepositories;
use TestCMS\Repositories\SignalDetecTestPasuxuserRepositories;
use TestCMS\Repositories\SignalDetecTestDiagramRepositories;
use TestCMS\Repositories\RegisterUserRepositories;

class signalQuizeController extends ManagetController
{
    protected $TestsRepositories, $TestsToAnyRepositories, $RegisterUserToAnyRepositories, $SignalDetecTestRepositories, $SignalDetecTestPartsRepositories,
        $SignalDetecTestToAnyRepositories, $RegisterUserRepositories, $SignalDetecTestPasuxRepositories, $SignalDetecTestPasuxuserRepositories, $SignalDetecTestDiagramRepositories;

    function __construct(
        TestsRepositories $TestsRepositories,
        TestsToAnyRepositories $TestsToAnyRepositories,
        RegisterUserToAnyRepositories $RegisterUserToAnyRepositories,
        SignalDetecTestRepositories $SignalDetecTestRepositories,
        SignalDetecTestPartsRepositories $SignalDetecTestPartsRepositories,
        SignalDetecTestToAnyRepositories $SignalDetecTestToAnyRepositories,
        SignalDetecTestPasuxRepositories $SignalDetecTestPasuxRepositories,
        SignalDetecTestPasuxuserRepositories $SignalDetecTestPasuxuserRepositories,
        SignalDetecTestDiagramRepositories $SignalDetecTestDiagramRepositories,
        RegisterUserRepositories $RegisterUserRepositories
    )
    {

        $this->TestsRepositories = $TestsRepositories;
        $this->TestsToAnyRepositories = $TestsToAnyRepositories;
        $this->RegisterUserToAnyRepositories = $RegisterUserToAnyRepositories;
        $this->SignalDetecTestRepositories = $SignalDetecTestRepositories;
        $this->SignalDetecTestPartsRepositories = $SignalDetecTestPartsRepositories;
        $this->SignalDetecTestToAnyRepositories = $SignalDetecTestToAnyRepositories;
        $this->SignalDetecTestPasuxRepositories = $SignalDetecTestPasuxRepositories;
        $this->SignalDetecTestPasuxuserRepositories = $SignalDetecTestPasuxuserRepositories;
        $this->SignalDetecTestDiagramRepositories = $SignalDetecTestDiagramRepositories;
        $this->RegisterUserRepositories = $RegisterUserRepositories;

        view()->share('testquiz', $this->TestsRepositories->all());

    }

    public function signalQuize($local = 'ka')
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        $user = Auth::user();
        if ($user->status == 2) {
            $test = $this->TestsRepositories->where('key', '=', 'signal')->get();
            foreach ($test as $testite) {
                $toani['test_quiz'] = $this->TestsToAnyRepositories->where('test_uuid', '=', $testite->uuid)->get();
            }
            if ($user->status == 2) {
                foreach ($toani['test_quiz'] as $test_quizitem) {
                    $usertoani = $this->RegisterUserToAnyRepositories->where('register_user_uuid', '=', $user->uuid)->get();
                    foreach ($usertoani as $usertoaniite) {
                        if ($test_quizitem->row_uuid == $usertoaniite->row_uuid) {
                            $reguser[] = $usertoaniite->row_uuid;
                        }
                    }
                }
            } else {
                foreach ($toani['test_quiz'] as $test_quizitem) {
                    $reguser[] = $test_quizitem->row_uuid;
                }
            }
            if (isset($reguser)) {
                foreach ($reguser as $reguseritem) {
                    $testviuv[] = $this->SignalDetecTestRepositories->where('uuid', '=', $reguseritem)->first();
                }
                view()->share('testviuv', $testviuv);
            }
        }
        if ($user->status == 1) {
            view()->share('testviuv', $this->SignalDetecTestRepositories->all());
        }
        $usert = $this->RegisterUserRepositories->where('reg_user','!=',3)->get();
        $usertoauth = $this->RegisterUserToAnyRepositories->whereNull('test_user')->get();
        view()->share('usert', $usert);
        view()->share('usertoauth', $usertoauth);
        return view('thems.herd_pages.signal.datagrid');
    }

    function signaladd($local = 'ka', Request $request)
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);

        if ($request->method() == 'POST') {
            $raodswori = 0;
            for ($i = 1; $i <= $request->raod; $i++) {
                $raodswori++;
                $this->SignalDetecTest($request->true, $raodswori, $request->falsstart, $request->falsefin, $request->variant);
                $swori[] = $this->pasuxebi['swori'];
                $araswori[] = $this->pasuxebi['araswori'];
                $ganlageba[] = $this->pasuxebi['ganlageba'];
                $procenti[] = $this->pasuxebi['procenti'];
                $raodenoba[] = $this->pasuxebi['raodenoba'];
            }
            view()->share('title', $request->title);
            view()->share('desc', $request->descript);
            view()->share('time', $request->time);
            view()->share('raod', $request->raod);
            view()->share('true', $request->true);
            view()->share('falsstart', $request->falsstart);
            view()->share('falsefin', $request->falsefin);
            view()->share('variant', $request->variant);
            view()->share('timefull', $request->timefull);
            view()->share('defic', $request->defic);
            view()->share('proc', $request->proc);
            if (!empty($swori)) {
                view()->share('swori', $swori);
                view()->share('araswori', $araswori);
                view()->share('ganlageba', $ganlageba);
                view()->share('procenti', $procenti);
                view()->share('raodenoba', $raodenoba);
            }
        }
        return view('thems.herd_pages.signal.signaladd');
    }

    function addbase($local = 'ka', Request $request)
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        $user = Auth::user();
        if ($request->method() == 'POST') {
            $addsignal = [
                'uuid' => Uuid::uuid4(),
                'time' => $request->time,
                'row' => $request->raod,
                'true' => $request->true,
                'false' => 0,
                'chdilistart' => $request->falsstart,
                'chdilifinish' => $request->falsefin,
                'sworipasx_raod' => $request->variant,
                'timetest' => $request->timefull,
                'proc' => $request->proc
            ];
            $signaladd = $this->SignalDetecTestRepositories->makeRecord($addsignal, true);
            $adduser = [
                'register_user_uuid' => $user->uuid,
                'row_uuid' => $signaladd->uuid,
                'rype' => 1
            ];
            $this->RegisterUserToAnyRepositories->create($adduser);
            $addtest = [
                'test_uuid' => '65dbc9d8-912f-4bcf-a302-c4f490249d1b',
                'row_uuid' => $signaladd->uuid,
                'type' => 1
            ];
            $this->TestsToAnyRepositories->create($addtest);
            foreach ($request->sworigen as $i => $item) {
                $addtestquiz = [
                    'uuid' => Uuid::uuid4(),
                    'Correct' => $request->sworigen[$i],
                    'Wrong' => $request->arasworigen[$i],
                    'procenti' => $request->procentigen[$i],
                    'arrangement' => $request->ganlagebagen[$i],
                    'Quantity' => $request->raodenobagen[$i],
                ];
                $testpart = $this->SignalDetecTestPartsRepositories->makeRecord($addtestquiz, true);
                $testtoani = [
                    'uuid' => Uuid::uuid4(),
                    'Signal_detec_test_uuid' => $signaladd->uuid,
                    'row_uuid' => $testpart->uuid
                ];
                $this->SignalDetecTestToAnyRepositories->create($testtoani);
            }
            $signaladd->translateOrNew($local)->title = $request->title;
            $signaladd->translateOrNew($local)->desc = $request->desc;
            $signaladd->translateOrNew($local)->defic = $request->defic;
            $signaladd->save();
        }
        return back();
    }

    function editbase($upid = 0, $local = 'ka', Request $request)
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);

        view()->share('upid', $upid);
        if ($request->method() == 'POST') {
            $signalviuedit = [
                'uuid' => $request->srid,
                'time' => $request->time,
                'timetest' => $request->timefull,
                'proc' => $request->proc
            ];
            $signaledit = $this->SignalDetecTestRepositories->makeRecord($signalviuedit, true);
            $signaledit->translateOrNew($local)->title = $request->title;
            $signaledit->translateOrNew($local)->desc = $request->desc;
            $signaledit->translateOrNew($local)->defic = $request->defic;
            $signaledit->save();
            foreach ($request->srpartid as $i => $srparitem) {
                $signalviupartedit = [
                    'Correct' => $request->sworigen[$i],
                    'Wrong' => $request->arasworigen[$i],
                    'procenti' => $request->ganlagebagen[$i],
                    'arrangement' => $request->procentigen[$i],
                    'Quantity' => $request->raodenobagen[$i]
                ];
                $this->SignalDetecTestPartsRepositories->update($signalviupartedit, $srparitem);
            }
        }
        $signal = $this->SignalDetecTestRepositories->find($upid);
        $signalviu = [
            'uuid' => $signal->uuid,
            'title' => $signal->title,
            'desc' => $signal->desc,
            'taim' => $signal->time,
            'testtaim' => $signal->timetest,
            'defic' => $signal->defic,
            'row' => $signal->row,

            'sworipasx_raod' => $signal->sworipasx_raod,
            'chdilistart' => $signal->chdilistart,
            'chdilifinish' => $signal->chdilifinish,
            'true' => $signal->true,

            'proc' => $signal->proc
        ];
        $signaltoani = $this->SignalDetecTestRepositories->Signaltoanijoin($signal->uuid)->get();
        foreach ($signaltoani as $signaltoaniitem) {
            foreach ($this->SignalDetecTestPartsRepositories->where('uuid', '=', $signaltoaniitem['pivot']->row_uuid)->get() as $TestParts) {

                $signalviu['quiz'][] = [
                    'id' => $TestParts->id,
                    'Correct' => $TestParts->Correct,
                    'Wrong' => $TestParts->Wrong,
                    'procenti' => $TestParts->procenti,
                    'arrangement' => $TestParts->arrangement,
                    'Quantity' => $TestParts->Quantity
                ];
            }
        }
        view()->share('signalviu', $signalviu);
        return view('thems.herd_pages.signal.signaledit');
    }

    function dellbase($dellid = 0, $local = 'ka', Request $request)
    {
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        $signal = $this->SignalDetecTestRepositories->find($dellid);
        $this->RegisterUserToAnyRepositories->where('row_uuid', '=', $signal->uuid)->delete();
        $this->TestsToAnyRepositories->where('row_uuid', '=', $signal->uuid)->delete();
        foreach ($this->SignalDetecTestToAnyRepositories->where('Signal_detec_test_uuid', '=', $signal->uuid)->get() as $toaniitem) {
            $this->SignalDetecTestPartsRepositories->where('uuid', '=', $toaniitem->row_uuid)->delete();
        }
        $this->SignalDetecTestRepositories->delete($dellid);
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
        $testuuid = $this->SignalDetecTestRepositories->find($dellid);
        $pasux = $this->SignalDetecTestPasuxRepositories->where('testuuid','=',$testuuid->uuid)->first();
        $userpregist = $this->RegisterUserToAnyRepositories/*->where('rype','=',$reguser->id)*/->where('test_user','=',3)->where('row_uuid','=',$testuuid->uuid)->get();
        view()->share('pasux',$pasux);
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
                        'test_user' => '3'
                    ];
                    $this->RegisterUserToAnyRepositories->create($regadduser);
                }
            }
            if (
                $request->sworpasux != null ||
                $request->saertoraod != null ||
                $request->ganlageba != null ||
                $request->ganlraod != null ||
                $request->momxpasux != null ||
                $request->pasxdro != null ||
                $request->upasuxatuara != null ||
                $request->testissworpas != null) {
                $xger = "";
                $yger = "";
                if (!empty($request->xgerdzi[0]) && !empty($request->ygerdzi[0])) {
                    foreach ($request->xgerdzi as $i => $xgerdzi){
                        $xger .= $request->xgerdzi[$i].',';
                        $yger .= $request->ygerdzi[$i].',';
                    }
                }
                if(!empty($request->pasux)){
                    $pasuuid = $request->pasux;
                }else{
                    $pasuuid=Uuid::uuid4();
                }
                $testpasux = [
                    'uuid'=>$pasuuid,
                    'sworpasux'=>$request->sworpasux,
                    'saertoraod'=>$request->saertoraod,
                    'ganlageba'=>$request->ganlageba,
                    'ganlraod'=>$request->ganlraod,
                    'momxpasux'=>$request->momxpasux,
                    'pasxdro'=>$request->pasxdro,
                    'upasuxatuara'=>$request->upasuxatuara,
                    'testissworpas'=>$request->testissworpas,
                    'xgerdzi'=>$xger,
                    'ygerdzi'=>$yger,
                    'testuuid'=>$testuuid->uuid
                ];
                $signal = $this->SignalDetecTestPasuxRepositories->makeRecord($testpasux);
            }
        }
        return view('thems.herd_pages.signal.signaluser');
    }

    function addpasux($local = 'ka',Request $request){
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        if($request->method() == 'POST'){
            $signaluuid = $this->SignalDetecTestRepositories->find($request->id);
            $testpasux = [
                'sworpasux'=>$request->sworpasux,
                'saertoraod'=>$request->saertoraod,
                'ganlageba'=>$request->ganlageba,
                'ganlraod'=>$request->ganlraod,
                'momxpasux'=>$request->momxpasux,
                'pasxdro'=>$request->pasxdro,
                'upasuxatuara'=>$request->upasuxatuara,
                'testissworpas'=>$request->testissworpas,
                'testuuid'=>$signaluuid->uuid
            ];
            $this->SignalDetecTestPasuxuserRepositories->create($testpasux);
        }
    }

    function usergamot($sigid=0,$local='ka'){
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        $user = Auth::user();
        $test = $this->SignalDetecTestRepositories->find($sigid);
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
                    $filerov[] = $this->SignalDetecTestPasuxuserRepositories
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
        return view('thems.herd_pages.signal.usepasux');
    }

    function pasuxfile($testuuid=0,$user_uuid=0,$datauser=0,$file=0,$local='ka'){
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
        $dataform =  gmdate("D M j Y G:i:s ",strtotime($datauser))."GMT+0400 (Georgia Standard Time)";
        $fileval = $this->SignalDetecTestPasuxuserRepositories
            ->where('testuuid','=',$testuuid)
            ->where('user_uuid','=',$user_uuid)
            ->where('datauser','=',$dataform)
            ->get();
        $diagrama = $this->SignalDetecTestDiagramRepositories
            ->where('testuuid','=',$testuuid)
            ->first();
        view()->share('diagrama',$diagrama);
        view()->share('testuuid',$testuuid);
        view()->share('user_uuid',$user_uuid);
        view()->share('datauser',$datauser);


        if($file > 0) {
            $customer_array[] = array('sworpasux', 'saertoraod', 'ganlageba', 'ganlraod', 'momxpasux', 'pasxdro', 'upasuxatuara', 'testissworpas');
            foreach ($fileval as $filevalitem) {
                $exelfile[] = array(
                    'sworpasux' => $filevalitem->sworpasux,
                    'saertoraod' => $filevalitem->saertoraod,
                    'ganlageba' => $filevalitem->ganlageba,
                    'ganlraod' => $filevalitem->ganlraod,
                    'momxpasux' => $filevalitem->momxpasux,
                    'pasxdro' => $filevalitem->pasxdro,
                    'upasuxatuara' => $filevalitem->upasuxatuara,
                    'testissworpas' => $filevalitem->testissworpas,
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
                    $active_sheet->setCellValue('A' . 1, 'სისწორე ');
                    $active_sheet->setCellValue('A' . $row_next, $tabledataitem['sworpasux']);
                    $active_sheet->setCellValue('B' . 1, 'სიმბოლოების რაოდენობა');
                    $active_sheet->setCellValue('B' . $row_next, $tabledataitem['saertoraod']);
                    $active_sheet->setCellValue('C' . 1, 'სიმბოლოების მდებარეობა');
                    $active_sheet->setCellValue('C' . $row_next, $tabledataitem['ganlageba']);
                    $active_sheet->setCellValue('D' . 1, 'სიგნალის ალბათობა');
                    $active_sheet->setCellValue('D' . $row_next, $tabledataitem['ganlraod']);
                    $active_sheet->setCellValue('E' . 1, 'მომხმარებლის პასუხი');
                    $active_sheet->setCellValue('E' . $row_next, $tabledataitem['momxpasux']);
                    $active_sheet->setCellValue('F' . 1, 'რეაქციის დრო');
                    $active_sheet->setCellValue('F' . $row_next, $tabledataitem['pasxdro']);
                    $active_sheet->setCellValue('G' . 1, 'უპასუხა თუ არა');
                    if($tabledataitem['upasuxatuara'] == 'true')
                    {$active_sheet->setCellValue('G' . $row_next, 1);}
                    else
                    {$active_sheet->setCellValue('G' . $row_next, 0);}
                    $active_sheet->setCellValue('H' . 1, 'სიგნალის რაოდენობა');
                    if($tabledataitem['testissworpas'] == 'true')
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
        }
        else{
            return view('thems.herd_pages.signal.diagram');
        }
    }

    function diagrama($testuuid=0,$diagramid=0,$local='ka'){
        if (isset(Auth::user()->status) && Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
//        $fileval = $this->SignalDetecTestPasuxuserRepositories
//            ->where('testuuid','=',$testuuid)
//            ->where('user_uuid','=',$user_uuid)
//            ->where('datauser','=',$datauser)
//            ->get();
        $fileval = $this->ReaqciYuradgTestDiagramRepositories->find($diagramid);
        $diagramx = explode(',',$fileval->diagrama_x);
        $diagramy = explode(',',$fileval->diagrama_y);
        foreach ($diagramx as $i => $filevalitem){
            $xdgr[] = $diagramx[$i];
            $ydgr[] = $diagramy[$i];
        }
        view()->share('xdgr',$xdgr);
        view()->share('ydgr',$ydgr);
        return view('thems.herd_pages.signal.phpchart');
    }
}
