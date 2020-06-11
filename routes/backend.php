<?php

use Illuminate\Support\Facades\Auth;

Route::group(['middleware' => ['auth', /*'checkRoleOrSuperadmin',*/ 'XSS'/*, 'Cors'*/]], function () {

    Route::get('/', function ($locale = 'ka') {
        if (Auth::user()->status == 3) {
            return redirect()->route('userfront');
        }
        App::setLocale($locale);
        view()->share('local', $locale);
        view()->share('testquiz', \TestCMS\Models\Tests::all());
        return view('thems.herd_pages.index');
    });

    Route::group(['prefix' => '/studenti', 'namespace' => '\TestCMS\Http\Controllers\Manager'], function () {
        Route::any('/userfront', 'UserController@userfront')->name('userfront');
        Route::get('/tocken', 'AuthController@tocken')->name('tocken');
        Route::get('/authuser', 'AuthController@authuser')->name('authuser');
    });


    Route::group(['prefix' => '/diagram', 'namespace' => '\TestCMS\Http\Controllers\Manager'], function () {
        Route::any('/mentaldiagram', 'AuthController@mentaldiagram')->name('mentaldiagram');
        Route::any('/percdiagram', 'AuthController@percdiagram')->name('percdiagram');
        Route::any('/reaqdiagram', 'AuthController@reaqdiagram')->name('reaqdiagram');
        Route::any('/selectdiagram', 'AuthController@selectdiagram')->name('selectdiagram');
        Route::any('/signaldiagram', 'AuthController@signaldiagram')->name('signaldiagram');
        Route::any('/strupdiagram', 'AuthController@strupdiagram')->name('strupdiagram');

    });

    Route::group(['prefix' => '/answer', 'namespace' => '\TestCMS\Http\Controllers\Manager'], function () {
        Route::any('/signalanswer', 'AuthController@signalpas')->name('signalanswer');
        Route::any('/percanswer', 'AuthController@percpas')->name('percanswer');
        Route::any('/strupanswer', 'AuthController@struppas')->name('strupanswer');
        Route::any('/selectanswer', 'AuthController@selectpas')->name('selectanswer');
        Route::any('/reaqtanswer', 'AuthController@reaqtpas')->name('reaqtanswer');
        Route::any('/mentalanswer', 'AuthController@mentaltpas')->name('mentalanswer');
        Route::any('/cnobisanswer', 'AuthController@cnobisanswer')->name('cnobisanswer');
    });

    Route::group(['prefix' => '/postadd', 'namespace' => '\TestCMS\Http\Controllers\Manager'], function () {
        Route::any('/signalPost', 'AuthController@signalPost')->name('signalPost');
        Route::any('/percPost', 'AuthController@percPost')->name('percPost');
        Route::any('/strupPost', 'AuthController@strupPost')->name('strupPost');
        Route::any('/seleqcPost', 'AuthController@seleqcPost')->name('seleqcPost');
        Route::any('/reaqPost', 'AuthController@reaqPost')->name('reaqPost');
        Route::any('/mentPost', 'AuthController@mentPost')->name('mentPost');
        Route::any('/cnobisPost', 'AuthController@cnobisPost')->name('cnobisPost');
        Route::any('/lewsgadPost', 'AuthController@lewsgadPost')->name('lewsgadPost');
    });

    Route::group(['prefix' => '/user', 'namespace' => '\TestCMS\Http\Controllers\Manager'], function () {

        Route::any('/index', 'AuthController@index')->name('admin.index');
        Route::any('/signal', 'AuthController@signalJson')->name('signalJson');
        Route::any('/percJson', 'AuthController@percJson')->name('percJson');
        Route::any('/strupJson', 'AuthController@strupJson')->name('strupJson');
        Route::any('/seleqcJson', 'AuthController@seleqcJson')->name('seleqcJson');
        Route::any('/reaqJson', 'AuthController@reaqJson')->name('reaqJson');
        Route::any('/mentJson', 'AuthController@mentJson')->name('mentJson');
        Route::any('/cnobisJson', 'AuthController@cnobisJson')->name('cnobisJson');
        Route::any('/lewsgadJson', 'AuthController@lewsgadJson')->name('lewsgadJson');
        Route::any('/InfgadprocJson', 'AuthController@InfgadprocJson')->name('InfgadprocJson');
        Route::any('/testpost', 'AuthController@testpost')->name('testpost');
        Route::any('/registration', 'AuthController@registration')->name('registration');
        Route::any('/momxmar', 'AuthController@momxmar')->name('momxmar');
    });

    Route::group(['prefix' => '/test/signal', 'namespace' => '\TestCMS\Http\Controllers\Manager'], function () {

        Route::get('/', 'signalQuizeController@signalQuize')->name('signal.add');
        Route::any('/add', 'signalQuizeController@signaladd')->name('signal.test.add');
        Route::post('/add/base', 'signalQuizeController@addbase')->name('addbase');
        Route::any('/edit/base/{upid}', 'signalQuizeController@editbase')->name('editbase');
        Route::any('/dell/base/{dellid}', 'signalQuizeController@dellbase')->name('delltbase');

        Route::any('/add/addpasux', 'signalQuizeController@addpasux')->name('addpasux');
        Route::any('/file/pasuxfile/{testuuid}/{user_uuid}/{datauser}/{file}', 'signalQuizeController@pasuxfile')->name('file.pasuxfile');
        Route::any('/diagrama/pasuxfile/{testuuid}/{diagramid}', 'signalQuizeController@diagrama')->name('diagrama.pasuxfile');
        Route::any('/user/usergamot/{sigid}', 'signalQuizeController@usergamot')->name('user.usergamot');

        Route::any('/user/base/{dellid}', 'signalQuizeController@userbase')->name('signal.user');
    });

    Route::group(['prefix' => '/test/perceft', 'namespace' => '\TestCMS\Http\Controllers\Manager'], function () {
        Route::get('/', 'perceftQuizeController@perceftQuize')->name('perceft.add');
        Route::any('/add', 'perceftQuizeController@perceftadd')->name('perceft.test.ass');
        Route::post('/add/percef', 'perceftQuizeController@percefadd')->name('add.percef');
        Route::any('/edit/{upid}', 'perceftQuizeController@editpercef')->name('edit.percef');
        Route::any('/dell/{upid}', 'perceftQuizeController@dellpercef')->name('dell.percef');

        Route::any('/user/usergamot/{sigid}', 'perceftQuizeController@usergamot')->name('user.base');
        Route::any('/file/perceft/{testuuid}/{user_uuid}/{datauser}/{file}', 'perceftQuizeController@pasuxfile')->name('file.perceft');
        Route::any('/diagrama/perceft/{testuuid}/{diagramid}', 'perceftQuizeController@diagrama')->name('perceft.pasuxfile');
        Route::any('/user/base/{dellid}', 'perceftQuizeController@userbase')->name('perceft.user');
    });

    Route::group(['prefix' => '/test/strup', 'namespace' => '\TestCMS\Http\Controllers\Manager'], function () {
        Route::get('/', 'strupQuizeController@strupQuize')->name('strup.add');
        Route::any('/add', 'strupQuizeController@strupadd')->name('strup.test.add');
        Route::post('/add/strup', 'strupQuizeController@strupaddpart')->name('add.strup');
        Route::any('/edit/{upid}', 'strupQuizeController@editstrup')->name('edit.strup');
        Route::any('/dell/{upid}', 'strupQuizeController@dellstrup')->name('dell.strup');

        Route::any('/user/strup/{dellid}', 'strupQuizeController@userbase')->name('strup.user');
        Route::any('/user/strup/usergamot/{sigid}', 'strupQuizeController@usergamot')->name('user.strup');
        Route::any('/file/strup/{testuuid}/{user_uuid}/{datauser}/{file}', 'strupQuizeController@pasuxfile')->name('file.strup');
        Route::any('/diagrama/strup/{testuuid}/{diagramid}', 'strupQuizeController@diagrama')->name('strup.pasuxfile');
    });

    Route::group(['prefix' => '/test/selection', 'namespace' => '\TestCMS\Http\Controllers\Manager'], function () {
        Route::get('/', 'selectionQuizeController@selectionQuize')->name('selection.add');
        Route::any('/add', 'selectionQuizeController@selectionadd')->name('selection.test.add');
        Route::post('/add/selection', 'selectionQuizeController@selectiondam')->name('add.selection');
        Route::any('/edit/{upid}', 'selectionQuizeController@editselection')->name('edit.selection');
        Route::any('/dell/{upid}', 'selectionQuizeController@dellselection')->name('dell.selection');

        Route::any('/user/selection/{dellid}', 'selectionQuizeController@userbase')->name('selection.user');
        Route::any('/user/selection/usergamot/{sigid}', 'selectionQuizeController@usergamot')->name('user.selection');
        Route::any('/file/selection/{testuuid}/{user_uuid}/{datauser}/{file}', 'selectionQuizeController@pasuxfile')->name('file.selection');
        Route::any('/diagrama/selection/{testuuid}/{diagramid}', 'selectionQuizeController@diagrama')->name('selection.pasuxfile');
    });

    Route::group(['prefix' => '/test/raqdro', 'namespace' => '\TestCMS\Http\Controllers\Manager'], function () {
        Route::get('/', 'raqdroQuizeController@raqdroQuize')->name('raqdro.add');
        Route::any('/add', 'raqdroQuizeController@raqdroadd')->name('raqdro.test.add');
        Route::post('/add/testpart', 'raqdroQuizeController@raqdroaddpart')->name('raqdro.testpart.add');
        Route::any('/edit/{upid}', 'raqdroQuizeController@editraqdro')->name('edit.raqdro');
        Route::any('/dell/{upid}', 'raqdroQuizeController@reaqdelete')->name('dell.raqdro');

        Route::any('/user/raqdro/{dellid}', 'raqdroQuizeController@userbase')->name('raqdro.user');
        Route::any('/user/raqdro/usergamot/{sigid}', 'raqdroQuizeController@usergamot')->name('user.raqdro');
        Route::any('/file/raqdro/{testuuid}/{user_uuid}/{datauser}/{file}', 'raqdroQuizeController@pasuxfile')->name('file.raqdro');
        Route::any('/diagrama/raqdro/{testuuid}/{diagramid}', 'raqdroQuizeController@diagrama')->name('raqdro.pasuxfile');
    });

    Route::group(['prefix' => '/test/mental', 'namespace' => '\TestCMS\Http\Controllers\Manager'], function () {
        Route::get('/', 'mentalQuizeController@mentalQuize')->name('mental.add');
        Route::any('/add', 'mentalQuizeController@mentaladd')->name('mental.test.add');
        Route::post('/add/testpart', 'mentalQuizeController@mentaladdpart')->name('mental.testpart.add');
        Route::any('edit/{upid}', 'mentalQuizeController@mentaldro')->name('edit.mental');
        Route::any('/dell/{upid}', 'mentalQuizeController@mentaldelete')->name('dell.mental');

        Route::any('/user/mental/{dellid}', 'mentalQuizeController@userbase')->name('mental.user');
        Route::any('/user/mental/usergamot/{sigid}', 'mentalQuizeController@usergamot')->name('user.mental');
        Route::any('/file/mental/{testuuid}/{user_uuid}/{datauser}/{file}', 'mentalQuizeController@pasuxfile')->name('file.mental');
        Route::any('/diagrama/mental/{testuuid}/{diagramid}', 'mentalQuizeController@diagrama')->name('mental.pasuxfile');
    });

    Route::group(['prefix' => '/test/cnobistest', 'namespace' => '\TestCMS\Http\Controllers\Manager'], function () {
        Route::get('/', 'cnobistestController@index')->name('cnobistest.add');
        Route::any('/add', 'cnobistestController@cnobistestadd')->name('cnobistest.test.add');
        Route::post('/add/testpart', 'cnobistestController@cnobistestaddpart')->name('cnobistest.testpart.add');
        Route::any('/user/usergamot/{sigid}', 'cnobistestController@usergamot')->name('cnobistest.user.usergamot');
        Route::any('edit/{upid}', 'cnobistestController@mentaldro')->name('edit.cnobistest');
        Route::any('/dell/{upid}', 'cnobistestController@cnobistestdelete')->name('cnobistest.dell.mental');

        Route::any('/user/cnobistest/{dellid}', 'cnobistestController@userbase')->name('cnobistest.user');
    });

    Route::group(['prefix' => '/test/lewsgad', 'namespace' => '\TestCMS\Http\Controllers\Manager'], function () {
        Route::get('/', 'lewsgadController@index')->name('lewsgad.add');
        Route::any('/add', 'lewsgadController@lewsgadadd')->name('lewsgad.test.add');
        Route::post('/add/testpart', 'lewsgadController@lewsgadddpart')->name('lewsgad.testpart.add');
        Route::any('edit/{upid}', 'lewsgadController@mentaldro')->name('edit.lewsgad');
        Route::any('/dell/{upid}', 'lewsgadController@lewsgaddelete')->name('dell.lewsgad');

        Route::any('/user/lewsgad/{dellid}', 'lewsgadController@userbase')->name('lewsgad.user');
        Route::any('/user/lewsgad/usergamot/{sigid}', 'lewsgadController@usergamot')->name('user.lewsgad');
    });

    Route::group(['prefix' => '/test/infgadproc', 'namespace' => '\TestCMS\Http\Controllers\Manager'], function (){
        Route::get('/', 'infgadprocController@index')->name('infgadproc.add');
        Route::any('/add', 'infgadprocController@infgadprocadd')->name('infgadproc.test.add');
        Route::post('/add/infgadproc', 'infgadprocController@infgadprocaddpart')->name('infgadproc.testpart.add');
        Route::any('/dell/{upid}', 'infgadprocController@infgadprocdelete')->name('dell.infgadproc');
        Route::any('edit/{upid}', 'infgadprocController@mentaldro')->name('edit.infgadproc');

        Route::any('/user/infgadproc/{dellid}', 'infgadprocController@userbase')->name('infgadproc.user');
        Route::any('/user/infgadproc/usergamot/{sigid}', 'infgadprocController@usergamot')->name('user.infgadproc');
        Route::any('/file/infgadproc/{testuuid}/{user_uuid}/{datauser}/{file}', 'infgadprocController@pasuxfile')->name('file.lewsgad');
    });
    Route::get('/logout', 'AuthController@logout')->name('logout');
});

