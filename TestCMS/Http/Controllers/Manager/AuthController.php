<?php


namespace TestCMS\Http\Controllers\Manager;


use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use TestCMS\Http\Requests\Manager\Request;
use TestCMS\Models\User;
use TestCMS\Repositories\InfgadprocTestPartsRepositories;
use TestCMS\Repositories\InfgadprocTestPasuxRepositories;
use TestCMS\Repositories\InfgadprocTestRepositories;
use TestCMS\Repositories\PerceftCompareTestPartsRepositories;
use TestCMS\Repositories\PerceftCompareTestRepositories;
use TestCMS\Repositories\PerceftCompareTestToAnyRepositories;
use TestCMS\Repositories\RegisterUserRepositories;
use TestCMS\Repositories\RegisterUserToAnyRepositories;
use TestCMS\Repositories\SelectionTestPartsRepositories;
use TestCMS\Repositories\SelectionTestRepositories;
use TestCMS\Repositories\SelectionTestToAnyRepositories;
use TestCMS\Repositories\SignalDetecTestPartsRepositories;
use TestCMS\Repositories\SignalDetecTestRepositories;
use TestCMS\Repositories\SignalDetecTestToAnyRepositories;
use TestCMS\Repositories\SignalDetecTestPasuxRepositories;
use TestCMS\Repositories\StrupEfeqtTestPartsRepositories;
use TestCMS\Repositories\StrupEfeqtTestRepositories;
use TestCMS\Repositories\StrupEfeqtTestToAnyRepositories;
use TestCMS\Repositories\ReaqciYuradgRepositories;
use TestCMS\Repositories\ReaqciYuradgPartRepositories;
use TestCMS\Repositories\TestsRepositories;
use TestCMS\Repositories\TestsToAnyRepositories;
use TestCMS\Repositories\MentalRotaciaTestRepositories;
use TestCMS\Repositories\MentalRotaciaTestPartsRepositories;
use TestCMS\Repositories\PerceftCompareTestPasuxRepositories;
use TestCMS\Repositories\StrupEfeqtTestPasuxRepositories;
use TestCMS\Repositories\SelectionTestPasuxRepositories;
use TestCMS\Repositories\ReaqciYuradgTestPasuxRepositories;
use TestCMS\Repositories\MentalRotaciaTestPasuxRepositories;
use TestCMS\Repositories\SignalDetecTestPasuxuserRepositories;
use TestCMS\Repositories\PerceftCompareTestPasuxuserRepositories;
use TestCMS\Repositories\StrupEfeqtTestPasuxuserRepositories;
use TestCMS\Repositories\SelectionTestPasuxuserRepositories;
use TestCMS\Repositories\ReaqciYuradgTestPasuxuserRepositories;
use TestCMS\Repositories\MentalRotaciaTestPasuxuserRepositories;
use TestCMS\Repositories\MentalRotaciaTestDiagramRepositories;
use TestCMS\Repositories\PerceftCompareTestDiagramRepositories;
use TestCMS\Repositories\ReaqciYuradgTestDiagramRepositories;
use TestCMS\Repositories\SelectionTestDiagramRepositories;
use TestCMS\Repositories\SignalDetecTestDiagramRepositories;
use TestCMS\Repositories\StrupEfeqtTestDiagramRepositories;
use TestCMS\Repositories\UserRepositories;
use TestCMS\Repositories\CnobistestTestRepositories;
use TestCMS\Repositories\CnobistestTestPartRepositories;
use TestCMS\Repositories\CnobistestTestPasuxRepositories;
use TestCMS\Repositories\CnobistestTestPasuxuserRepositories;
use TestCMS\Repositories\LewsgadTestRepositories;
use TestCMS\Repositories\LewsgadTestPasuxRepositories;
use TestCMS\Repositories\LewsgadTestPartsRepositories;
use TestCMS\Repositories\LewsgadTestPasuxuserRepositories;

class AuthController extends ManagetController
{
    protected $SignalDetecTestRepositories, $SignalDetecTestPartsRepositories, $SignalDetecTestToAnyRepositories,
        $RegisterUserRepositories, $RegisterUserToAnyRepositories, $TestsToAnyRepositories, $TestsRepositories,
        $PerceftCompareTestRepositories, $PerceftCompareTestToAnyRepositories, $PerceftCompareTestPartsRepositories,
        $StrupEfeqtTestRepositories, $StrupEfeqtTestPartsRepositories, $StrupEfeqtTestToAnyRepositories,
        $SelectionTestRepositories, $SelectionTestToAnyRepositories, $SelectionTestPartsRepositories,
        $ReaqciYuradgRepositories, $ReaqciYuradgPartRepositories, $MentalRotaciaTestRepositories, $MentalRotaciaTestPartsRepositories,
        $UserRepositories, $SignalDetecTestPasuxRepositories, $PerceftCompareTestPasuxRepositories, $StrupEfeqtTestPasuxRepositories,
        $SelectionTestPasuxRepositories, $ReaqciYuradgTestPasuxRepositories, $MentalRotaciaTestPasuxRepositories, $SignalDetecTestPasuxuserRepositories,
        $PerceftCompareTestPasuxuserRepositories, $StrupEfeqtTestPasuxuserRepositories, $SelectionTestPasuxuserRepositories, $ReaqciYuradgTestPasuxuserRepositories,
        $MentalRotaciaTestPasuxuserRepositories, $MentalRotaciaTestDiagramRepositories, $PerceftCompareTestDiagramRepositories, $ReaqciYuradgTestDiagramRepositories, $SelectionTestDiagramRepositories,
        $SignalDetecTestDiagramRepositories, $StrupEfeqtTestDiagramRepositories, $CnobistestTestRepositories, $CnobistestTestPasuxRepositories, $CnobistestTestPartRepositories,
        $LewsgadTestRepositories, $LewsgadTestPartsRepositories, $LewsgadTestPasuxRepositories,$InfgadprocTestRepositories,$InfgadprocTestPartsRepositories,$InfgadprocTestPasuxRepositories,
        $CnobistestTestPasuxuserRepositories, $LewsgadTestPasuxuserRepositories;

    public function __construct(
        SignalDetecTestRepositories $SignalDetecTestRepositories,
        SignalDetecTestPartsRepositories $SignalDetecTestPartsRepositories,
        RegisterUserRepositories $RegisterUserRepositories,
        RegisterUserToAnyRepositories $RegisterUserToAnyRepositories,
        TestsToAnyRepositories $TestsToAnyRepositories,
        TestsRepositories $TestsRepositories,
        PerceftCompareTestRepositories $PerceftCompareTestRepositories,
        PerceftCompareTestToAnyRepositories $PerceftCompareTestToAnyRepositories,
        PerceftCompareTestPartsRepositories $PerceftCompareTestPartsRepositories,
        StrupEfeqtTestRepositories $StrupEfeqtTestRepositories,
        StrupEfeqtTestPartsRepositories $StrupEfeqtTestPartsRepositories,
        StrupEfeqtTestToAnyRepositories $StrupEfeqtTestToAnyRepositories,
        SelectionTestRepositories $SelectionTestRepositories,
        SelectionTestToAnyRepositories $SelectionTestToAnyRepositories,
        SelectionTestPartsRepositories $SelectionTestPartsRepositories,
        SignalDetecTestToAnyRepositories $SignalDetecTestToAnyRepositories,
        ReaqciYuradgRepositories $ReaqciYuradgRepositories,
        ReaqciYuradgPartRepositories $ReaqciYuradgPartRepositories,
        MentalRotaciaTestRepositories $MentalRotaciaTestRepositories,
        MentalRotaciaTestPartsRepositories $MentalRotaciaTestPartsRepositories,
        SignalDetecTestPasuxRepositories $SignalDetecTestPasuxRepositories,
        PerceftCompareTestPasuxRepositories $PerceftCompareTestPasuxRepositories,
        StrupEfeqtTestPasuxRepositories $StrupEfeqtTestPasuxRepositories,
        SelectionTestPasuxRepositories $SelectionTestPasuxRepositories,
        ReaqciYuradgTestPasuxRepositories $ReaqciYuradgTestPasuxRepositories,
        MentalRotaciaTestPasuxRepositories $MentalRotaciaTestPasuxRepositories,
        SignalDetecTestPasuxuserRepositories $SignalDetecTestPasuxuserRepositories,
        PerceftCompareTestPasuxuserRepositories $PerceftCompareTestPasuxuserRepositories,
        StrupEfeqtTestPasuxuserRepositories $StrupEfeqtTestPasuxuserRepositories,
        SelectionTestPasuxuserRepositories $SelectionTestPasuxuserRepositories,
        ReaqciYuradgTestPasuxuserRepositories $ReaqciYuradgTestPasuxuserRepositories,
        MentalRotaciaTestPasuxuserRepositories $MentalRotaciaTestPasuxuserRepositories,
        MentalRotaciaTestDiagramRepositories $MentalRotaciaTestDiagramRepositories,
        PerceftCompareTestDiagramRepositories $PerceftCompareTestDiagramRepositories,
        ReaqciYuradgTestDiagramRepositories $ReaqciYuradgTestDiagramRepositories,
        SelectionTestDiagramRepositories $SelectionTestDiagramRepositories,
        SignalDetecTestDiagramRepositories $SignalDetecTestDiagramRepositories,
        StrupEfeqtTestDiagramRepositories $StrupEfeqtTestDiagramRepositories,
        CnobistestTestRepositories $CnobistestTestRepositories,
        CnobistestTestPasuxRepositories $CnobistestTestPasuxRepositories,
        CnobistestTestPartRepositories $CnobistestTestPartRepositories,
        CnobistestTestPasuxuserRepositories $CnobistestTestPasuxuserRepositories,
        LewsgadTestRepositories $LewsgadTestRepositories,
        LewsgadTestPartsRepositories $LewsgadTestPartsRepositories,
        LewsgadTestPasuxRepositories $LewsgadTestPasuxRepositories,
        LewsgadTestPasuxuserRepositories $LewsgadTestPasuxuserRepositories,


        InfgadprocTestRepositories $InfgadprocTestRepositories,
        InfgadprocTestPartsRepositories $InfgadprocTestPartsRepositories,
        InfgadprocTestPasuxRepositories $InfgadprocTestPasuxRepositories,
        UserRepositories $UserRepositories
    )
    {
        $this->SignalDetecTestRepositories = $SignalDetecTestRepositories;
        $this->SignalDetecTestPartsRepositories = $SignalDetecTestPartsRepositories;
        $this->SignalDetecTestToAnyRepositories = $SignalDetecTestToAnyRepositories;
        $this->RegisterUserRepositories = $RegisterUserRepositories;
        $this->RegisterUserToAnyRepositories = $RegisterUserToAnyRepositories;
        $this->TestsToAnyRepositories = $TestsToAnyRepositories;
        $this->TestsRepositories = $TestsRepositories;
        $this->PerceftCompareTestRepositories = $PerceftCompareTestRepositories;
        $this->PerceftCompareTestToAnyRepositories = $PerceftCompareTestToAnyRepositories;
        $this->PerceftCompareTestPartsRepositories = $PerceftCompareTestPartsRepositories;
        $this->StrupEfeqtTestRepositories = $StrupEfeqtTestRepositories;
        $this->StrupEfeqtTestPartsRepositories = $StrupEfeqtTestPartsRepositories;
        $this->StrupEfeqtTestToAnyRepositories = $StrupEfeqtTestToAnyRepositories;
        $this->SelectionTestRepositories = $SelectionTestRepositories;
        $this->SelectionTestToAnyRepositories = $SelectionTestToAnyRepositories;
        $this->SelectionTestPartsRepositories = $SelectionTestPartsRepositories;
        $this->ReaqciYuradgRepositories = $ReaqciYuradgRepositories;
        $this->ReaqciYuradgPartRepositories = $ReaqciYuradgPartRepositories;
        $this->MentalRotaciaTestRepositories = $MentalRotaciaTestRepositories;
        $this->MentalRotaciaTestPartsRepositories = $MentalRotaciaTestPartsRepositories;
        $this->SignalDetecTestPasuxRepositories = $SignalDetecTestPasuxRepositories;
        $this->PerceftCompareTestPasuxRepositories = $PerceftCompareTestPasuxRepositories;
        $this->StrupEfeqtTestPasuxRepositories = $StrupEfeqtTestPasuxRepositories;
        $this->SelectionTestPasuxRepositories = $SelectionTestPasuxRepositories;
        $this->ReaqciYuradgTestPasuxRepositories = $ReaqciYuradgTestPasuxRepositories;
        $this->MentalRotaciaTestPasuxRepositories = $MentalRotaciaTestPasuxRepositories;
        $this->SignalDetecTestPasuxuserRepositories = $SignalDetecTestPasuxuserRepositories;
        $this->PerceftCompareTestPasuxuserRepositories = $PerceftCompareTestPasuxuserRepositories;
        $this->StrupEfeqtTestPasuxuserRepositories = $StrupEfeqtTestPasuxuserRepositories;
        $this->SelectionTestPasuxuserRepositories = $SelectionTestPasuxuserRepositories;
        $this->ReaqciYuradgTestPasuxuserRepositories = $ReaqciYuradgTestPasuxuserRepositories;
        $this->MentalRotaciaTestPasuxuserRepositories = $MentalRotaciaTestPasuxuserRepositories;
        $this->MentalRotaciaTestDiagramRepositories = $MentalRotaciaTestDiagramRepositories;
        $this->PerceftCompareTestDiagramRepositories = $PerceftCompareTestDiagramRepositories;
        $this->ReaqciYuradgTestDiagramRepositories = $ReaqciYuradgTestDiagramRepositories;
        $this->SelectionTestDiagramRepositories = $SelectionTestDiagramRepositories;
        $this->SignalDetecTestDiagramRepositories = $SignalDetecTestDiagramRepositories;
        $this->StrupEfeqtTestDiagramRepositories = $StrupEfeqtTestDiagramRepositories;
        $this->CnobistestTestRepositories = $CnobistestTestRepositories;
        $this->UserRepositories = $UserRepositories;
        $this->CnobistestTestPasuxRepositories = $CnobistestTestPasuxRepositories;
        $this->CnobistestTestPartRepositories = $CnobistestTestPartRepositories;
        $this->CnobistestTestPasuxuserRepositories = $CnobistestTestPasuxuserRepositories;
        $this->LewsgadTestRepositories = $LewsgadTestRepositories;
        $this->LewsgadTestPartsRepositories = $LewsgadTestPartsRepositories;
        $this->LewsgadTestPasuxRepositories = $LewsgadTestPasuxRepositories;
        $this->LewsgadTestPasuxuserRepositories = $LewsgadTestPasuxuserRepositories;

        $this->InfgadprocTestRepositories = $InfgadprocTestRepositories;
        $this->InfgadprocTestPartsRepositories = $InfgadprocTestPartsRepositories;
        $this->InfgadprocTestPasuxRepositories = $InfgadprocTestPasuxRepositories;

        view()->share('testquiz', $this->TestsRepositories->all());

    }

    public function index($local = 'ka', Request $request)
    {
        $user = Auth::user();
//        dump($user);
        if (!isset(Auth::user()->status)) {
            $url = 'http://psychologytest.tsu.ge/';
            return Redirect($url);
        }
        if (Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($local);
//        dd($this->TestsRepositories->all());
        view()->share('testquiz', $this->TestsRepositories->all());
        return view('thems.herd_pages.index');
    }


    public function testpost(Request $request)
    {
        if (Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        dd($request->joni);
    }


    function signalJson(Request $request)
    {
        App::setLocale("ka");
        $signal = array();
        $user = Auth::user();
        $authuser = $this->RegisterUserRepositories->where('uuid', '=', $user->uuid)->first();
        foreach ($this->RegisterUserRepositories->Registertoanirepo($authuser->id)->get() as $signalheaditem) {
            foreach ($this->SignalDetecTestRepositories->where('uuid', '=', $signalheaditem['pivot']->row_uuid)->get() as $signlaitem) {
                $signal[$signlaitem->id] = [
                    'title' => $signlaitem->title,
                    'desc' => $signlaitem->desc,
                    'taim' => $signlaitem->time,
                    'testtaim' => $signlaitem->timetest,
                    'proc' => $signlaitem->proc
                ];

                foreach ($this->SignalDetecTestRepositories->Signaltoanijoin($signlaitem->uuid)->get() as $signaturequeri) {
                    foreach ($this->SignalDetecTestPartsRepositories->where('uuid', '=', $signaturequeri['pivot']->row_uuid)->get() as $TestParts) {
                        $signal[$signlaitem->id]['quiz'][] = [
                            'id' => $TestParts->id,
                            'Correct' => $TestParts->Correct,
                            'Wrong' => $TestParts->Wrong,
                            'procenti' => $TestParts->procenti,
                            'arrangement' => $TestParts->arrangement,
                            'Quantity' => $TestParts->Quantity
                        ];
                    }
                }
                $pasuxgrap = $this->SignalDetecTestPasuxRepositories->where('testuuid', '=', $signlaitem->uuid)->first();
                if (isset($pasuxgrap->uuid) && !empty($pasuxgrap->uuid)) {
                    $signal[$signlaitem->id]['pasux'] = [
                        'uuidpas' => $pasuxgrap->uuid,
                        'isUserAnswerCorrect' => $pasuxgrap->sworpasux,
                        'totalNumber' => $pasuxgrap->saertoraod,
                        'arrangement' => $pasuxgrap->ganlageba,
                        'arrangementNumber' => $pasuxgrap->ganlraod,
                        'userAnswer' => $pasuxgrap->momxpasux,
                        'answerTime' => $pasuxgrap->pasxdro,
                        'answered' => $pasuxgrap->upasuxatuara,
                        'correctAnswer' => $pasuxgrap->testissworpas,
                    ];
                    if (!empty($pasuxgrap->xgerdzi)) {
                        $xdiagram = explode(',', $pasuxgrap->xgerdzi);
                        $ydiagram = explode(',', $pasuxgrap->ygerdzi);
                        foreach ($xdiagram as $i => $xdiagramitem) {
                            if (!empty($xdiagram[$i])) {
                                $x[] = $xdiagram[$i];
                                $y[] = $ydiagram[$i];
                            }
                        }
                        $signal[$signlaitem->id]['diagram'] = [
                            'x' => $x,
                            'y' => $y,
                        ];
                    }
                }
            }
        }
        return response()->json($signal);
    }

    function percJson(Request $request)
    {
        App::setLocale("ka");
        $signal = array();
        $user = Auth::user();
        $authuser = $this->RegisterUserRepositories->where('uuid', '=', $user->uuid)->first();
        foreach ($this->RegisterUserRepositories->Registertoanirepo($authuser->id)->get() as $signalheaditem) {
            foreach ($this->PerceftCompareTestRepositories->where('uuid', '=', $signalheaditem['pivot']->row_uuid)->get() as $signlaitem) {
                $signal[$signlaitem->id] = [
                    'title' => $signlaitem->title,
                    'desc' => $signlaitem->desc,
                    'raodenoba' => $signlaitem->raodenoba,
                    'swori' => $signlaitem->swori,
                    'timetest' => $signlaitem->timetest,
                    'fulltime' => $signlaitem->fulltime,
                    'proc' => $signlaitem->proc
                ];
                foreach ($this->PerceftCompareTestRepositories->PerceftCompareJoin($signlaitem->uuid)->get() as $signaturequeri) {
                    foreach ($this->PerceftCompareTestPartsRepositories->where('uuid', '=', $signaturequeri['pivot']->perceft_compare_test_uuid)->get() as $TestParts) {
                        $signal[$signlaitem->id]['quiz'][] = [
                            'id' => $TestParts->id,
                            'persbig' => $TestParts->persbig,
                            'perssmol' => $TestParts->perssmol,
                            'persbigpass' => $TestParts->persbigpass,
                            'seqtorei' => $TestParts->seqtorei
                        ];
                    }

                }
                $pasuxgrap = $this->PerceftCompareTestPasuxRepositories->where('testuuid', '=', $signlaitem->uuid)->first();
                if (isset($pasuxgrap->uuid) && !empty($pasuxgrap->uuid)) {
                    $signal[$signlaitem->id]['pasux'] = [
                        'uuidpas' => $pasuxgrap->uuid,
                        'persbig' => $pasuxgrap->persbig,
                        'persbigpass' => $pasuxgrap->persbigpass,
                        'userAnswer' => $pasuxgrap->momxpasux,
                        'answerTime' => $pasuxgrap->pasuxdro,
                        'answered' => $pasuxgrap->upasuxtuara,
                        'isUserAnswerCorrect' => $pasuxgrap->sworipasux
                    ];
                    if (!empty($pasuxgrap->xgerdz)) {
                        $xdiagram = explode(',', $pasuxgrap->xgerdz);
                        $ydiagram = explode(',', $pasuxgrap->ygerdz);
                        foreach ($xdiagram as $i => $xdiagramitem) {
                            if (!empty($xdiagram[$i])) {
                                $x[] = $xdiagram[$i];
                                $y[] = $ydiagram[$i];
                            }
                        }
                        $signal[$signlaitem->id]['diagram'] = [
                            'x' => $x,
                            'y' => $y,
                        ];
                    }
                }
            }
        }
        return response()->json($signal);
    }

    function strupJson(Request $request)
    {
        App::setLocale("ka");
        $signal = array();
        $user = Auth::user();
        $authuser = $this->RegisterUserRepositories->where('uuid', '=', $user->uuid)->first();
        foreach ($this->RegisterUserRepositories->Registertoanirepo($authuser->id)->get() as $signalheaditem) {
            foreach ($this->StrupEfeqtTestRepositories->where('uuid', '=', $signalheaditem['pivot']->row_uuid)->get() as $signlaitem) {
                $signal[$signlaitem->id] = [
                    'title' => $signlaitem->title,
                    'desc' => $signlaitem->desc,
                    'taim' => $signlaitem->timetest,
                    'testtaim' => $signlaitem->fulltimetest,
                    'proc' => $signlaitem->proc
                ];
                foreach ($this->StrupEfeqtTestRepositories->spruttoani($signlaitem->uuid)->get() as $signaturequeri) {
                    foreach ($this->StrupEfeqtTestPartsRepositories->where('uuid', '=', $signaturequeri['pivot']->strup_efeqt_test_uuid)->get() as $TestParts) {
                        $signal[$signlaitem->id]['quiz'][] = [
                            'id' => $TestParts->id,
                            'color' => $TestParts->color,
                            'text' => $TestParts->text,
                            'kebord' => $TestParts->kebord,
                            'kofiguration' => $TestParts->kofiguration
                        ];
                    }
                }
                $pasuxgrap = $this->StrupEfeqtTestPasuxRepositories->where('testuuid', '=', $signlaitem->uuid)->first();
                if (isset($pasuxgrap->uuid) && !empty($pasuxgrap->uuid)) {
                    $signal[$signlaitem->id]['pasux'] = [
                        'uuidpas' => $pasuxgrap->uuid,
                        'color' => $pasuxgrap->color,
                        'text' => $pasuxgrap->text,
                        'kebord' => $pasuxgrap->kebord,
                        'momxpasux' => $pasuxgrap->momxpasux,
                        'pasuxdro' => $pasuxgrap->pasuxdro,
                        'upasuxtuara' => $pasuxgrap->upasuxtuara,
                        'sworipasux' => $pasuxgrap->sworipasux
                    ];
                    if (!empty($pasuxgrap->xgerdz)) {
                        $xdiagram = explode(',', $pasuxgrap->xgerdz);
                        $ydiagram = explode(',', $pasuxgrap->ygerdz);
                        foreach ($xdiagram as $i => $xdiagramitem) {
                            if (!empty($xdiagram[$i])) {
                                $x[] = $xdiagram[$i];
                                $y[] = $ydiagram[$i];
                            }
                        }
                        $signal[$signlaitem->id]['diagram'] = [
                            'x' => $x,
                            'y' => $y,
                        ];
                    }
                }
            }
        }
        return response()->json($signal);
    }

    function seleqcJson(Request $request)
    {
        App::setLocale("ka");
        $signal = array();
        $user = Auth::user();
        $authuser = $this->RegisterUserRepositories->where('uuid', '=', $user->uuid)->first();
        foreach ($this->RegisterUserRepositories->Registertoanirepo($authuser->id)->get() as $signalheaditem) {
            foreach ($this->SelectionTestRepositories->where('uuid', '=', $signalheaditem['pivot']->row_uuid)->get() as $signlaitem) {
                $signal[$signlaitem->id] = [
                    'title' => $signlaitem->title,
                    'desc' => $signlaitem->desc,
                    'taim' => $signlaitem->time,
                    'testtaim' => $signlaitem->timetest,
                    'proc' => $signlaitem->proc
                ];
                foreach ($this->SelectionTestRepositories->Selectiontoani($signlaitem->uuid)->get() as $signaturequeri) {
                    foreach ($this->SelectionTestPartsRepositories->where('uuid', '=', $signaturequeri['pivot']->row_uuid)->get() as $TestParts) {
                        $signal[$signlaitem->id]['quiz'][] = [
                            'id' => $TestParts->id,
                            'variant' => $TestParts->variant,
                            'dashoreba' => $TestParts->dashoreba,
                            'pirveliaso' => $TestParts->pirveliaso,
                            'meoreaso' => $TestParts->meoreaso
                        ];
                    }
                }
                $pasuxgrap = $this->SelectionTestPasuxRepositories->where('testuuid', '=', $signlaitem->uuid)->first();
                if (isset($pasuxgrap->uuid) && !empty($pasuxgrap->uuid)) {
                    $signal[$signlaitem->id]['pasux'] = [
                        'uuidpas' => $pasuxgrap->uuid,
                        'variant' => $pasuxgrap->variant,
                        'dashoreba' => $pasuxgrap->dashoreba,
                        'pirveliaso' => $pasuxgrap->pirveliaso,
                        'meoreaso' => $pasuxgrap->meoreaso,
                        'momxpasux' => $pasuxgrap->momxpasux,
                        'pasuxdro' => $pasuxgrap->pasuxdro,
                        'upasuxtuara' => $pasuxgrap->upasuxtuara,
                        'sworipasux' => $pasuxgrap->sworipasux
                    ];
                    if (!empty($pasuxgrap->xgerdz)) {
                        $xdiagram = explode(',', $pasuxgrap->xgerdz);
                        $ydiagram = explode(',', $pasuxgrap->ygerdz);
                        foreach ($xdiagram as $i => $xdiagramitem) {
                            if (!empty($xdiagram[$i])) {
                                $x[] = $xdiagram[$i];
                                $y[] = $ydiagram[$i];
                            }
                        }
                        $signal[$signlaitem->id]['diagram'] = [
                            'x' => $x,
                            'y' => $y,
                        ];
                    }
                }
            }
        }
        return response()->json($signal);
    }

    function reaqJson(Request $reques)
    {
        App::setLocale("ka");
        $signal = array();
        $user = Auth::user();
        $authuser = $this->RegisterUserRepositories->where('uuid', '=', $user->uuid)->first();
        foreach ($this->RegisterUserRepositories->Registertoanirepo($authuser->id)->get() as $signalheaditem) {
            foreach ($this->ReaqciYuradgRepositories->where('uuid', '=', $signalheaditem['pivot']->row_uuid)->get() as $signlaitem) {
                $signal[$signlaitem->id] = [
                    'title' => $signlaitem->title,
                    'desc' => $signlaitem->desc,
                    'taim' => $signlaitem->time,
                    'testtaim' => $signlaitem->timefull,
                    'proc' => $signlaitem->proc
                ];
                foreach ($this->ReaqciYuradgRepositories->ReaqciCompare($signlaitem->uuid)->get() as $signaturequeri) {
                    foreach ($this->ReaqciYuradgPartRepositories->where('uuid', '=', $signaturequeri['pivot']->row_uuid)->get() as $TestParts) {
                        $signal[$signlaitem->id]['quiz'][] = [
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
                $pasuxgrap = $this->ReaqciYuradgTestPasuxRepositories->where('testuuid', '=', $signlaitem->uuid)->first();
                if (isset($pasuxgrap->uuid) && !empty($pasuxgrap->uuid)) {
                    $signal[$signlaitem->id]['pasux'] = [
                        'uuidpas' => $pasuxgrap->uuid,
                        'pirveliaso' => $pasuxgrap->pirveliaso,
                        'pirvelgilak' => $pasuxgrap->pirvelgilak,
                        'meoreaso' => $pasuxgrap->meoreaso,
                        'meoregilak' => $pasuxgrap->meoregilak,
                        'mesameaso' => $pasuxgrap->mesameaso,
                        'mesamegilak' => $pasuxgrap->mesamegilak,
                        'meotxeaso' => $pasuxgrap->meotxeaso,
                        'meotxegilak' => $pasuxgrap->meotxegilak,
                        'momxpasux' => $pasuxgrap->momxpasux,
                        'pasuxdro' => $pasuxgrap->pasuxdro,
                        'upasuxtuara' => $pasuxgrap->upasuxtuara,
                        'altraod' => $pasuxgrap->altraod,
                        'sworipasux' => $pasuxgrap->sworipasux
                    ];
                    if (!empty($pasuxgrap->xgerdz)) {
                        $xdiagram = explode(',', $pasuxgrap->xgerdz);
                        $ydiagram = explode(',', $pasuxgrap->ygerdz);
                        foreach ($xdiagram as $i => $xdiagramitem) {
                            if (!empty($xdiagram[$i])) {
                                $x[] = $xdiagram[$i];
                                $y[] = $ydiagram[$i];
                            }
                        }
                        $signal[$signlaitem->id]['diagram'] = [
                            'x' => $x,
                            'y' => $y,
                        ];
                    }
                }
            }
        }
        return response()->json($signal);
    }

    function mentJson(Request $reques)
    {
        App::setLocale("ka");
        $signal = array();
        $user = Auth::user();
        $authuser = $this->RegisterUserRepositories->where('uuid', '=', $user->uuid)->first();
        foreach ($this->RegisterUserRepositories->Registertoanirepo($authuser->id)->get() as $signalheaditem) {
            foreach ($this->MentalRotaciaTestRepositories->where('uuid', '=', $signalheaditem['pivot']->row_uuid)->get() as $signlaitem) {
                $signal[$signlaitem->id] = [
                    'title' => $signlaitem->title,
                    'desc' => $signlaitem->desc,
                    'taim' => $signlaitem->time,
                    'testtaim' => $signlaitem->timefull,
                    'proc' => $signlaitem->proc
                ];
                foreach ($this->MentalRotaciaTestRepositories->MentalComparetoani($signlaitem->uuid)->get() as $signaturequeri) {
                    foreach ($this->MentalRotaciaTestPartsRepositories->where('uuid', '=', $signaturequeri['pivot']->row_uuid)->get() as $TestParts) {
                        $signal[$signlaitem->id]['quiz'][] = [
                            'id' => $TestParts->id,
                            'testaso' => $TestParts->testaso,
                            'gradusi' => $TestParts->gradusi,
                            'revers' => $TestParts->revers
                        ];
                    }
                }
                $pasuxgrap = $this->MentalRotaciaTestPasuxRepositories->where('testuuid', '=', $signlaitem->uuid)->first();
                if (isset($pasuxgrap->uuid) && !empty($pasuxgrap->uuid)) {
                    $signal[$signlaitem->id]['pasux'] = [
                        'uuidpas' => $pasuxgrap->uuid,
                        'testaso' => $pasuxgrap->testaso,
                        'gradusi' => $pasuxgrap->gradusi,
                        'revers' => $pasuxgrap->revers,
                        'momxpasux' => $pasuxgrap->momxpasux,
                        'pasuxdro' => $pasuxgrap->pasuxdro,
                        'upasuxtuara' => $pasuxgrap->upasuxtuara,
                        'sworipasux' => $pasuxgrap->sworipasux
                    ];
                    if (!empty($pasuxgrap->xgerdz)) {
                        $xdiagram = explode(',', $pasuxgrap->xgerdz);
                        $ydiagram = explode(',', $pasuxgrap->ygerdz);
                        foreach ($xdiagram as $i => $xdiagramitem) {
                            if (!empty($xdiagram[$i])) {
                                $x[] = $xdiagram[$i];
                                $y[] = $ydiagram[$i];
                            }
                        }
                        $signal[$signlaitem->id]['diagram'] = [
                            'x' => $x,
                            'y' => $y,
                        ];
                    }
                }
            }
        }
        return response()->json($signal);
    }

    function cnobisJson(Request $reques)
    {
        App::setLocale("ka");
        $signal = array();
        $user = Auth::user();
        $authuser = $this->RegisterUserRepositories->where('uuid', '=', $user->uuid)->first();
        foreach ($this->RegisterUserRepositories->Registertoanirepo($authuser->id)->get() as $signalheaditem) {
            foreach ($this->CnobistestTestRepositories->where('uuid', '=', $signalheaditem['pivot']->row_uuid)->get() as $signlaitem) {
                $signal[$signlaitem->id] = [
                    'title' => $signlaitem->title,
                    'desc' => $signlaitem->desc,
                    'taim' => $signlaitem->time,
                    'testtaim' => $signlaitem->timefull,
                    'proc' => $signlaitem->proc
                ];
                foreach ($this->CnobistestTestRepositories->cnobistest($signlaitem->uuid)->get() as $signaturequeri) {
                    foreach ($this->CnobistestTestPartRepositories->where('uuid', '=', $signaturequeri['pivot']->row_uuid)->get() as $TestParts) {

                        $signal[$signlaitem->id]['quiz'][] = [
                            'id' => $TestParts->id,
                            'gamosacnobi' => $TestParts->gamosacnobi,
                            'dasamaxsovrebeli' => $TestParts->dasamaxsovrebeli
                        ];
                    }
                }
                $pasuxgrap = $this->CnobistestTestPasuxRepositories->where('testuuid', '=', $signlaitem->uuid)->first();
                if (isset($pasuxgrap->uuid) && !empty($pasuxgrap->uuid)) {
                    $signal[$signlaitem->id]['pasux'] = [
                        'uuidpas' => $pasuxgrap->uuid,
                        'testaso' => $pasuxgrap->testaso,
                        'gradusi' => $pasuxgrap->gradusi,
                        'revers' => $pasuxgrap->revers,
                        'momxpasux' => $pasuxgrap->momxpasux,
                        'pasuxdro' => $pasuxgrap->pasuxdro,
                        'upasuxtuara' => $pasuxgrap->upasuxtuara,
                        'sworipasux' => $pasuxgrap->sworipasux
                    ];
                    if (!empty($pasuxgrap->xgerdz)) {
                        $xdiagram = explode(',', $pasuxgrap->xgerdz);
                        $ydiagram = explode(',', $pasuxgrap->ygerdz);
                        foreach ($xdiagram as $i => $xdiagramitem) {
                            if (!empty($xdiagram[$i])) {
                                $x[] = $xdiagram[$i];
                                $y[] = $ydiagram[$i];
                            }
                        }
                        $signal[$signlaitem->id]['diagram'] = [
                            'x' => $x,
                            'y' => $y,
                        ];
                    }
                }
            }
        }
        return response()->json($signal);
    }

    function lewsgadJson(Request $reques)
    {
        App::setLocale("ka");
        $signal = array();
        $user = Auth::user();
        $authuser = $this->RegisterUserRepositories->where('uuid', '=', $user->uuid)->first();
        foreach ($this->RegisterUserRepositories->Registertoanirepo($authuser->id)->get() as $signalheaditem) {
            foreach ($this->LewsgadTestRepositories->where('uuid', '=', $signalheaditem['pivot']->row_uuid)->get() as $signlaitem) {
                $signal[$signlaitem->id] = [
                    'title' => $signlaitem->title,
                    'desc' => $signlaitem->desc,
                    'taim' => $signlaitem->time,
                    'testtaim' => $signlaitem->timefull,
                    'proc' => $signlaitem->proc
                ];
                foreach ($this->LewsgadTestRepositories->Lewsgadtest($signlaitem->uuid)->get() as $signaturequeri) {

                    foreach ($this->LewsgadTestPartsRepositories->where('uuid', '=', $signaturequeri['pivot']->row_uuid)->get() as $TestParts) {

                        $signal[$signlaitem->id]['quiz'][] = [
                            'id' => $TestParts->id,
                            'zeda' => $TestParts->zeda,
                            'qveda' => $TestParts->qveda,
                            'varinat' => $TestParts->varinat
                        ];
                    }
                }
                $pasuxgrap = $this->LewsgadTestPasuxRepositories->where('testuuid', '=', $signlaitem->uuid)->first();
                if (isset($pasuxgrap->uuid) && !empty($pasuxgrap->uuid)) {
                    $signal[$signlaitem->id]['pasux'] = [
                        'uuidpas' => $pasuxgrap->uuid,
                        'testaso' => $pasuxgrap->testaso,
                        'gradusi' => $pasuxgrap->gradusi,
                        'revers' => $pasuxgrap->revers,
                        'momxpasux' => $pasuxgrap->momxpasux,
                        'pasuxdro' => $pasuxgrap->pasuxdro,
                        'upasuxtuara' => $pasuxgrap->upasuxtuara,
                        'sworipasux' => $pasuxgrap->sworipasux
                    ];
                    if (!empty($pasuxgrap->xgerdz)) {
                        $xdiagram = explode(',', $pasuxgrap->xgerdz);
                        $ydiagram = explode(',', $pasuxgrap->ygerdz);
                        foreach ($xdiagram as $i => $xdiagramitem) {
                            if (!empty($xdiagram[$i])) {
                                $x[] = $xdiagram[$i];
                                $y[] = $ydiagram[$i];
                            }
                        }
                        $signal[$signlaitem->id]['diagram'] = [
                            'x' => $x,
                            'y' => $y,
                        ];
                    }
                }
            }
        }
        return response()->json($signal);
    }


    function registration($locale = 'ka', Request $request)
    {
        App::setLocale($locale);
        $user = Auth::user();
        view()->share('user', $user);

        if ($request->method() == 'POST') {
//            dd($request->status);
            $request->validate([
                'email' => 'required|email|unique:users',
                'pass' => 'required|min:6',
            ],
                [
                    'email.unique' => 'We`re sorry. This mail is already registered.',
                ]
            );
            $pass = Hash::make($request->pass);
            $addiser = [
                'uuid' => Uuid::uuid4(),
                'user' => $request->user,
                'status' => $request->status,
                'reg_user' => $user->uuid,
                'password' => $pass,
            ];
            $reg = $this->RegisterUserRepositories->makeRecord($addiser, true);
            $adduser = [
                'uuid' => $reg->uuid,
                'name' => $request->name,
                'email' => $request->email,
                'status' => $request->status,
                'ip' => '*',
                'password' => $reg->password
            ];
            $this->UserRepositories->makeRecord($adduser, true);
            $reg->translateOrNew($locale)->name = $request->name;
            $reg->translateOrNew($locale)->lname = $request->lname;
            $reg->translateOrNew($locale)->email = $request->email;
            $reg->save();

            if (isset($reg->id)) {
                view()->share('pas', $reg->id);
            }
        }
        return view('thems.common.registration');
    }


    function signalPost(Request $request)
    {
        $user = Auth::user();
        for ($i = 0; $i <= count($request->pas); $i++) {
            if (isset($request->pas[$i]['id']) && !empty($request->pas[$i]['id'])) {
                $signaluuid = $this->SignalDetecTestRepositories->find($request->pas[$i]['id']);
                $testpasux = [
                    'sworpasux' => $request->pas[$i]['sworpasux'],
                    'saertoraod' => $request->pas[$i]['saertoraod'],
                    'ganlageba' => $request->pas[$i]['ganlageba'],
                    'ganlraod' => $request->pas[$i]['ganlraod'],
                    'momxpasux' => $request->pas[$i]['momxpasux'],
                    'pasxdro' => $request->pas[$i]['pasxdro'],
                    'upasuxatuara' => $request->pas[$i]['upasuxatuara'],
                    'testissworpas' => $request->pas[$i]['testissworpas'],

                    'user_uuid' => $user->uuid,
                    'datauser' => $request->pas[$i]['datauser'],
                    'testuuid' => $signaluuid->uuid
                ];
                $this->SignalDetecTestPasuxuserRepositories->create($testpasux);
            }
        }
    }

    function percPost(Request $request)
    {
        $user = Auth::user();
        for ($i = 0; $i <= count($request->pas); $i++) {
            if (isset($request->pas[$i]['id']) && !empty($request->pas[$i]['id'])) {
                $signaluuid = $this->PerceftCompareTestRepositories->find($request->pas[$i]['id']);
                $testpasux = [
                    'persbig' => $request->pas[$i]['persbig'],
                    'persbigpass' => $request->pas[$i]['persbigpass'],
                    'momxpasux' => $request->pas[$i]['momxpasux'],
                    'pasuxdro' => $request->pas[$i]['pasuxdro'],
                    'upasuxtuara' => $request->pas[$i]['upasuxtuara'],
                    'sworipasux' => $request->pas[$i]['sworipasux'],
                    'seqtorei' => $request->pas[$i]['seqtorei'],
                    'similarityType' => $request->pas[$i]['similarityType'],

                    'user_uuid' => $user->uuid,
                    'datauser' => $request->pas[$i]['datauser'],
                    'testuuid' => $signaluuid->uuid
                ];
                $this->PerceftCompareTestPasuxuserRepositories->create($testpasux);
            }
        }
    }

    function strupPost(Request $request)
    {
        $user = Auth::user();
        for ($i = 0; $i <= count($request->pas); $i++) {
            if (isset($request->pas[$i]['id']) && !empty($request->pas[$i]['id'])) {
                $signaluuid = $this->StrupEfeqtTestRepositories->find($request->pas[$i]['id']);
                $testpasux = [
                    'color' => $request->pas[$i]['color'],
                    'text' => $request->pas[$i]['text'],
                    'kebord' => $request->pas[$i]['kebord'],
                    'momxpasux' => $request->pas[$i]['momxpasux'],
                    'pasuxdro' => $request->pas[$i]['pasuxdro'],
                    'upasuxtuara' => $request->pas[$i]['upasuxtuara'],
                    'sworipasux' => $request->pas[$i]['sworipasux'],
                    'kofiguration' => $request->pas[$i]['kofiguration'],

                    'datauser' => $request->pas[$i]['datauser'],
                    'user_uuid' => $user->uuid,
                    'testuuid' => $signaluuid->uuid
                ];
                $this->StrupEfeqtTestPasuxuserRepositories->create($testpasux);
            }
        }
    }

    function seleqcPost(Request $request)
    {
        $user = Auth::user();
        for ($i = 0; $i <= count($request->pas); $i++) {
            if (isset($request->pas[$i]['id']) && !empty($request->pas[$i]['id'])) {
                $signaluuid = $this->SelectionTestRepositories->find($request->pas[$i]['id']);
                $testpasux = [
                    'variant' => $request->pas[$i]['variant'],
                    'dashoreba' => $request->pas[$i]['dashoreba'],
                    'pirveliaso' => $request->pas[$i]['pirveliaso'],
                    'meoreaso' => $request->pas[$i]['meoreaso'],
                    'momxpasux' => $request->pas[$i]['momxpasux'],
                    'pasuxdro' => $request->pas[$i]['pasuxdro'],
                    'upasuxtuara' => $request->pas[$i]['upasuxtuara'],
                    'aimStimul' => $request->pas[$i]['aimStimul'],
                    'distractor' => $request->pas[$i]['distractor'],
                    'distractorType' => $request->pas[$i]['distractorType'],
                    'sworipasux' => $request->pas[$i]['sworipasux'],

                    'datauser' => $request->pas[$i]['datauser'],
                    'user_uuid' => $user->uuid,
                    'testuuid' => $signaluuid->uuid
                ];
                $this->SelectionTestPasuxuserRepositories->create($testpasux);
            }
        }
    }

    function reaqPost(Request $request)
    {
        $user = Auth::user();
        for ($i = 0; $i <= count($request->pas); $i++) {
            if (isset($request->pas[$i]['id']) && !empty($request->pas[$i]['id'])) {
                $signaluuid = $this->ReaqciYuradgRepositories->find($request->pas[$i]['id']);
                $testpasux = [
                    'pirveliaso' => $request->pas[$i]['pirveliaso'],
                    'pirvelgilak' => $request->pas[$i]['pirvelgilak'],
                    'meoreaso' => $request->pas[$i]['meoreaso'],
                    'meoregilak' => $request->pas[$i]['meoregilak'],
                    'mesameaso' => $request->pas[$i]['mesameaso'],
                    'mesamegilak' => $request->pas[$i]['mesamegilak'],
                    'meotxeaso' => $request->pas[$i]['meotxeaso'],
                    'meotxegilak' => $request->pas[$i]['meotxegilak'],
                    'momxpasux' => $request->pas[$i]['momxpasux'],
                    'pasuxdro' => $request->pas[$i]['pasuxdro'],
                    'upasuxtuara' => $request->pas[$i]['upasuxtuara'],
                    'sworipasux' => $request->pas[$i]['sworipasux'],
                    'altraod' => $request->pas[$i]['altraod'],
                    'type' => $request->pas[$i]['type'],
                    'stimul' => $request->pas[$i]['stimul'],

                    'datauser' => $request->pas[$i]['datauser'],
                    'user_uuid' => $user->uuid,
                    'testuuid' => $signaluuid->uuid
                ];
                $this->ReaqciYuradgTestPasuxuserRepositories->create($testpasux);
            }
        }
    }

    function mentPost(Request $request)
    {
        $user = Auth::user();
//        dump(count($request->pas));
        for ($i = 0; $i <= count($request->pas); $i++) {
            if (isset($request->pas[$i]['id']) && !empty($request->pas[$i]['id'])) {
                $signaluuid = $this->MentalRotaciaTestRepositories->find($request->pas[$i]['id']);
                $testpasux = [
                    'testaso' => $request->pas[$i]['testaso'],
                    'gradusi' => $request->pas[$i]['gradusi'],
                    'revers' => $request->pas[$i]['revers'],
                    'momxpasux' => $request->pas[$i]['momxpasux'],
                    'pasuxdro' => $request->pas[$i]['pasuxdro'],
                    'upasuxtuara' => $request->pas[$i]['upasuxtuara'],
                    'sworipasux' => $request->pas[$i]['sworipasux'],
                    'testuuid' => $signaluuid->uuid,
                    'datauser' => $request->pas[$i]['datauser'],
                    'user_uuid' => $user->uuid
                ];
                $this->MentalRotaciaTestPasuxuserRepositories->create($testpasux);
            }
        }
    }

    function cnobisPost(Request $request){
//        dd($request->pas);
        $user = Auth::user();
        for ($i = 0; $i <= count($request->pas); $i++) {
            if (isset($request->pas[$i]['id']) && !empty($request->pas[$i]['id'])) {
                $signaluuid = $this->CnobistestTestRepositories->find($request->pas[$i]['id']);
                $testpasux = [
                    'userAnswer' => $request->pas[$i]['userAnswer'],
                    'answerTime' => $request->pas[$i]['answerTime'],
                    'isUserAnswerCorrect' => $request->pas[$i]['isUserAnswerCorrect'],
                    'answered' => $request->pas[$i]['answered'],
                    'sequence' => $request->pas[$i]['sequence'],
                    'realAnswer' => $request->pas[$i]['realAnswer'],
                    'symbol' => $request->pas[$i]['symbol'],
                    'datauser' => $request->pas[$i]['datauser'],
//                    'showtimetext' => $request->pas[$i]['showTimeText'],
                    'testuuid' => $signaluuid->uuid,
                    'user_uuid' => $user->uuid
                ];
                $this->CnobistestTestPasuxuserRepositories->create($testpasux);
            }
        }
    }

    function lewsgadPost(Request $request){
        $user = Auth::user();
        for ($i = 0; $i <= count($request->userAnswer); $i++) {
            if (isset($request->pas[$i]['id']) && !empty($request->pas[$i]['id'])) {
                $signaluuid = $this->LewsgadTestRepositories->find($request->pas[$i]['id']);
                $testpasux = [
                    'userAnswer' => $request->pas[$i]['userAnswer'],
                    'answerTime' => $request->pas[$i]['answerTime'],
                    'isUserAnswerCorrect' => $request->pas[$i]['isUserAnswerCorrect'],
                    'answered' => $request->pas[$i]['answered'],
                    'zeda' => $request->pas[$i]['zeda'],
                    'qveda' => $request->pas[$i]['qveda'],
                    'varinat' => $request->pas[$i]['varinat'],
                    'showTimeText' => $request->pas[$i]['showTimeText'],
                    'testuuid' => $signaluuid->uuid,
                    'user_uuid' => $user->uuid
                ];
                $this->LewsgadTestPasuxuserRepositories->create($testpasux);
            }
        }
    }


    function signalpas(Request $request)
    {
        $signal = $this->SignalDetecTestRepositories->find($request->id);
        $user = Auth::user();

        if (isset($signal->uuid)) {
//            $pasux = $this->SignalDetecTestPasuxuserRepositories->where('user_uuid', '=', $user->uuid)->where('testuuid', '=', $signal->uuid)->get();
            $tar = $this->SignalDetecTestPasuxuserRepositories
                ->where('user_uuid', '=', $user->uuid)->where('testuuid', '=', $signal->uuid)
                ->select('testuuid', 'user_uuid', 'datauser')
                ->groupBy('testuuid', 'user_uuid', 'datauser')
                ->get();

            foreach ($tar as $taritem) {
                $pasux = $this->SignalDetecTestPasuxuserRepositories
                    ->where('datauser', '=', $taritem->datauser)
                    ->where('user_uuid', '=', $user->uuid)
                    ->where('testuuid', '=', $signal->uuid)
                    ->get();
                $pasuxi[$taritem->datauser] = $pasux;
            }
        } else {
            $pasuxi = null;
        }
        return response()->json($pasuxi);
    }

    function percpas(Request $request)
    {

        $signal = $this->PerceftCompareTestRepositories->find($request->id);
        $user = Auth::user();
        if (isset($signal->uuid)) {
//            $pasux = $this->PerceftCompareTestPasuxuserRepositories->where('user_uuid', '=', $user->uuid)->where('testuuid', '=', $signal->uuid)->get();
            $tar = $this->PerceftCompareTestPasuxuserRepositories
                ->where('user_uuid', '=', $user->uuid)->where('testuuid', '=', $signal->uuid)
                ->select('testuuid', 'user_uuid', 'datauser')
                ->groupBy('testuuid', 'user_uuid', 'datauser')
                ->get();
            foreach ($tar as $taritem) {
                $pasux = $this->PerceftCompareTestPasuxuserRepositories
                    ->where('datauser', '=', $taritem->datauser)
                    ->where('user_uuid', '=', $user->uuid)
                    ->where('testuuid', '=', $signal->uuid)
                    ->get();
                $pasuxi[$taritem->datauser] = $pasux;
            }
        } else {
            $pasuxi = null;
        }
        return response()->json($pasuxi);
    }

    function struppas(Request $request)
    {

        $signal = $this->StrupEfeqtTestRepositories->find($request->id);
        $user = Auth::user();
        if (isset($signal->uuid)) {
//            $pasux = $this->StrupEfeqtTestPasuxuserRepositories->where('user_uuid', '=', $user->uuid)->where('testuuid', '=', $signal->uuid)->get();
            $tar = $this->StrupEfeqtTestPasuxuserRepositories
                ->where('user_uuid', '=', $user->uuid)->where('testuuid', '=', $signal->uuid)
                ->select('testuuid', 'user_uuid', 'datauser')
                ->groupBy('testuuid', 'user_uuid', 'datauser')
                ->get();
            foreach ($tar as $taritem) {
                $pasux = $this->StrupEfeqtTestPasuxuserRepositories
                    ->where('datauser', '=', $taritem->datauser)
                    ->where('user_uuid', '=', $user->uuid)
                    ->where('testuuid', '=', $signal->uuid)
                    ->get();
                $pasuxi[$taritem->datauser] = $pasux;
            }
        } else {
            $pasuxi = null;
        }
        return response()->json($pasuxi);
    }

    function selectpas(Request $request)
    {

        $signal = $this->SelectionTestRepositories->find($request->id);
        $user = Auth::user();
        if (isset($signal->uuid)) {
//            $pasux = $this->SelectionTestPasuxuserRepositories->where('user_uuid', '=', $user->uuid)->where('testuuid', '=', $signal->uuid)->get();
            $tar = $this->SelectionTestPasuxuserRepositories
                ->where('user_uuid', '=', $user->uuid)
                ->where('testuuid', '=', $signal->uuid)
                ->select('testuuid', 'user_uuid', 'datauser')
                ->groupBy('testuuid', 'user_uuid', 'datauser')
                ->get();
            foreach ($tar as $taritem) {
                $pasux = $this->SelectionTestPasuxuserRepositories
                    ->where('datauser', '=', $taritem->datauser)
                    ->where('user_uuid', '=', $user->uuid)
                    ->where('testuuid', '=', $signal->uuid)
                    ->get();
                $pasuxi[$taritem->datauser] = $pasux;

            }
        } else {
            $pasuxi = null;
        }
        if (isset($pasuxi) && !empty($pasuxi)) {
            return response()->json($pasuxi);
        } else {
            return response()->json(null);
        }
    }

    function reaqtpas(Request $request)
    {

        $signal = $this->ReaqciYuradgRepositories->find($request->id);
        $user = Auth::user();
        if (isset($signal->uuid)) {
            $tar = $this->ReaqciYuradgTestPasuxuserRepositories
                ->where('user_uuid', '=', $user->uuid)
                ->where('testuuid', '=', $signal->uuid)
                ->select('testuuid', 'user_uuid', 'datauser')
                ->groupBy('testuuid', 'user_uuid', 'datauser')
                ->get();
            foreach ($tar as $taritem) {
                $pasux = $this->ReaqciYuradgTestPasuxuserRepositories
                    ->where('datauser', '=', $taritem->datauser)
                    ->where('user_uuid', '=', $user->uuid)
                    ->where('testuuid', '=', $signal->uuid)
                    ->get();
                $pasuxi[$taritem->datauser] = $pasux;
            }
        } else {
            $pasuxi = null;
        }
        if (!isset($pasuxi) || !empty($pasuxi)) {
            $pasuxi = null;
        }
        return response()->json($pasuxi);
    }

    function mentaltpas(Request $request)
    {
//        dd($request->id);
        $signal = $this->MentalRotaciaTestRepositories->find($request->id);
        $user = Auth::user();
//        $pasuxi = array();
        if (isset($signal->uuid)) {
            $tar = $this->MentalRotaciaTestPasuxuserRepositories
                ->where('user_uuid', '=', $user->uuid)->where('testuuid', '=', $signal->uuid)
                ->select('testuuid', 'user_uuid', 'datauser')
                ->groupBy('testuuid', 'user_uuid', 'datauser')
                ->get();

            foreach ($tar as $taritem) {
                $pasux = $this->MentalRotaciaTestPasuxuserRepositories
                    ->where('datauser', '=', $taritem->datauser)
                    ->where('user_uuid', '=', $user->uuid)
                    ->where('testuuid', '=', $signal->uuid)
                    ->get();
                $pasuxi[$taritem->datauser] = $pasux;
            }
        } else {
            $pasuxi = null;
        }
        if (!isset($pasuxi) && empty($pasuxi)) {
            $pasuxi = null;
        }

        return response()->json($pasuxi);
    }

    function cnobisanswer(Request $request)
    {
//        dd($request->id);
        $signal = $this->CnobistestTestRepositories->find($request->id);
        $user = Auth::user();
//        $pasuxi = array();
        if (isset($signal->uuid)) {
            $tar = $this->CnobistestTestPasuxuserRepositories
                ->where('user_uuid', '=', $user->uuid)->where('testuuid', '=', $signal->uuid)
                ->select('testuuid', 'user_uuid','datauser')
                ->groupBy('testuuid', 'user_uuid','datauser')
                ->get();

            foreach ($tar as $taritem) {
                $pasux = $this->CnobistestTestPasuxuserRepositories
                    ->where('datauser', '=', $taritem->datauser)
                    ->where('user_uuid', '=', $user->uuid)
                    ->where('testuuid', '=', $signal->uuid)
                    ->get();
                $pasuxi[$taritem->datauser] = $pasux;
            }
        } else {
            $pasuxi = null;
        }
        if (!isset($pasuxi) && empty($pasuxi)) {
            $pasuxi = null;
        }

        return response()->json($pasuxi);
    }


    function mentaldiagram(Request $request)
    {
        $user = Auth::user();
//dd($request->id);
        $signaluuid = $this->MentalRotaciaTestRepositories->find($request->id);
        if (isset($signaluuid->uuid)) {
            $testpasux = [
                'uuid' => Uuid::uuid4(),
                'testuuid' => $signaluuid->uuid,
                'diagrama_x' => $request->diagramx,
                'diagrama_y' => $request->diagramy,
                'date' => $request->date,
                'user_uuid' => $user->uuid
            ];
//dd($testpasux);
            $this->MentalRotaciaTestDiagramRepositories->create($testpasux);
        }
    }

    function percdiagram(Request $request)
    {
        $user = Auth::user();
//dd($request->input());
        $signaluuid = $this->PerceftCompareTestRepositories->find($request->id);
        if (isset($signaluuid->uuid)) {
            $testpasux = [
                'uuid' => Uuid::uuid4(),
                'testuuid' => $signaluuid->uuid,
                'diagrama_x' => $request->diagramx,
                'diagrama_y' => $request->diagramy,
                'date' => $request->date,
                'user_uuid' => $user->uuid
            ];
//dd($testpasux);
            $this->PerceftCompareTestDiagramRepositories->create($testpasux);
        }
    }

    function reaqdiagram(Request $request)
    {
        $user = Auth::user();
//dd($request->input());
        $signaluuid = $this->ReaqciYuradgPartRepositories->find($request->id);
        if (isset($signaluuid->uuid)) {
            $testpasux = [
                'uuid' => Uuid::uuid4(),
                'testuuid' => $signaluuid->uuid,
                'diagrama_x' => $request->diagramx,
                'diagrama_y' => $request->diagramy,
                'date' => $request->date,
                'user_uuid' => $user->uuid
            ];
//dd($testpasux);
            $pas = $this->ReaqciYuradgTestDiagramRepositories->create($testpasux);
        }
    }

    function selectdiagram(Request $request)
    {
        $user = Auth::user();
//dd($request->input());
        $signaluuid = $this->SelectionTestRepositories->find($request->id);
        if (isset($signaluuid->uuid)) {
            $testpasux = [
                'uuid' => Uuid::uuid4(),
                'testuuid' => $signaluuid->uuid,
                'diagrama_x' => $request->diagramx,
                'diagrama_y' => $request->diagramy,
                'date' => $request->date,
                'user_uuid' => $user->uuid
            ];
//dd($testpasux);
            $this->SelectionTestDiagramRepositories->create($testpasux);
        }
    }

    function signaldiagram(Request $request)
    {
        $user = Auth::user();
//dd($request->input());
        $signaluuid = $this->SignalDetecTestRepositories->find($request->id);
        if (isset($signaluuid->uuid)) {
            $testpasux = [
                'uuid' => Uuid::uuid4(),
                'testuuid' => $signaluuid->uuid,
                'diagrama_x' => $request->diagramx,
                'diagrama_y' => $request->diagramy,
                'date' => $request->date,
                'user_uuid' => $user->uuid
            ];
//dd($testpasux);
            $this->SignalDetecTestDiagramRepositories->create($testpasux);
        }
    }

    function InfgadprocJson(Request $reques)
    {
        App::setLocale("ka");
        $signal = array();
        $user = Auth::user();
        $authuser = $this->RegisterUserRepositories->where('uuid', '=', $user->uuid)->first();
        foreach ($this->RegisterUserRepositories->Registertoanirepo($authuser->id)->get() as $signalheaditem) {
            foreach ($this->InfgadprocTestRepositories->where('uuid', '=', $signalheaditem['pivot']->row_uuid)->get() as $signlaitem) {
                $signal[$signlaitem->id] = [
                    'title' => $signlaitem->title,
                    'desc' => $signlaitem->desc,
                    'taim' => $signlaitem->time,
                    'testtaim' => $signlaitem->timefull,
                    'proc' => $signlaitem->proc
                ];
                foreach ($this->InfgadprocTestRepositories->Infgadproctest($signlaitem->uuid)->get() as $signaturequeri) {

                    foreach ($this->InfgadprocTestPartsRepositories->where('uuid', '=', $signaturequeri['pivot']->row_uuid)->get() as $TestParts) {

                        $signal[$signlaitem->id]['quiz'][] = [
                            'id' => $TestParts->id,
                            'winadadeba' => $TestParts->winadadeba,
                            'siis_var' => $TestParts->siis_var,
                            'categoria' => $TestParts->categoria
                        ];
                    }
                }
                $pasuxgrap = $this->InfgadprocTestPasuxRepositories->where('testuuid', '=', $signlaitem->uuid)->first();
                if (isset($pasuxgrap->uuid) && !empty($pasuxgrap->uuid)) {
                    $signal[$signlaitem->id]['pasux'] = [
                        'uuidpas' => $pasuxgrap->uuid,
                        'testaso' => $pasuxgrap->testaso,
                        'gradusi' => $pasuxgrap->gradusi,
                        'revers' => $pasuxgrap->revers,
                        'momxpasux' => $pasuxgrap->momxpasux,
                        'pasuxdro' => $pasuxgrap->pasuxdro,
                        'upasuxtuara' => $pasuxgrap->upasuxtuara,
                        'sworipasux' => $pasuxgrap->sworipasux
                    ];
                    if (!empty($pasuxgrap->xgerdz)) {
                        $xdiagram = explode(',', $pasuxgrap->xgerdz);
                        $ydiagram = explode(',', $pasuxgrap->ygerdz);
                        foreach ($xdiagram as $i => $xdiagramitem) {
                            if (!empty($xdiagram[$i])) {
                                $x[] = $xdiagram[$i];
                                $y[] = $ydiagram[$i];
                            }
                        }
                        $signal[$signlaitem->id]['diagram'] = [
                            'x' => $x,
                            'y' => $y,
                        ];
                    }
                }
            }
        }
        return response()->json($signal);
    }

    function strupdiagram(Request $request)
    {
        $user = Auth::user();
//dd($request->input());
        $signaluuid = $this->StrupEfeqtTestRepositories->find($request->id);
        if (isset($signaluuid->uuid)) {
            $testpasux = [
                'uuid' => Uuid::uuid4(),
                'testuuid' => $signaluuid->uuid,
                'diagrama_x' => $request->diagramx,
                'diagrama_y' => $request->diagramy,
                'date' => $request->date,
                'user_uuid' => $user->uuid
            ];
//dd($testpasux);
            $this->StrupEfeqtTestDiagramRepositories->create($testpasux);
        }
    }

    public function tocken()
    {
        $tocken = csrf_token();
        $pasuxi = [
            'token' => $tocken
        ];
        return response()->json($pasuxi);
    }

    public function authuser()
    {
        $user = Auth::user();
        $pasuxi = [
            'user' => $user
        ];
        return response()->json($pasuxi);
    }

    public function momxmar($local = 'ka')
    {
        App::setLocale($local);
        view()->share('momxmar', $this->RegisterUserRepositories->all());
        return view('thems.herd_pages.momxmar');
    }

    public function logout()
    {
        Auth::logout();
        $url = 'http://psychologytest.tsu.ge/';
        return Redirect($url);
//        $user = Auth::user();
//        $user = User::find($user->id);
//        Auth::login($user);
//        return redirect('/');
    }
}
