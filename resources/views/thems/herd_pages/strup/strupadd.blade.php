@extends('thems.layout.index')
@section('section')

    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">სტრუპის ეფექტი</h4>
                <form class="form-sample" method="post" action="{{route('strup.test.add')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ექსპერიმენტის სახელწოდება</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="title" placeholder="ექსპერიმენტის სახელწოდება"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ინსტრუქცია</label>
                                <div class="col-sm-9">
                                    <textarea name="descript" class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ექსპოზიციის ხანგრძლივობა</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="time"
                                           placeholder="ექსპოზიციის ხანგრძლივობა"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ექსპოზიციის ხანგრძლივობა პასუხით</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="fulltime" placeholder="ექსპოზიციის ხანგრძლივობა პასუხით"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">სიტყვა-ფერის რაოდენობა</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="true"
                                           placeholder="სიტყვა-ფერის რაოდენობა"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ცდების საერთო რაოდენობა</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="rov" placeholder="ტესტების რაოდენობა"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ნეიტრალური სიტყვების რაოდენობა</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="neitr"
                                           placeholder="ნეიტრალური სიტყვების რაოდენობა<"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">სავარჯიშო ტესტების ბარიერი</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="proc"
                                           placeholder="სავარჯიშო ტესტების ბარიერი"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">აღწერილობა</label>
                                <div class="col-sm-9">
                                    <textarea name="defic" class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">გენერაცია</button>
                </form>

                @if(isset($swori[0]) && !empty($swori[0]))
                    <div class="row">
                        <div class="table-sorter-wrapper col-lg-12 table-responsive">
                            <form method="post" action="{{route('add.strup')}}">
                                @csrf
                                <input type="hidden" name="titleadd" value="{{$titleadd}}">
                                <input type="hidden" name="descadd" value="{{$descadd}}">
                                <input type="hidden" name="true" value="{{$true}}">
                                <input type="hidden" name="rov" value="{{$rov}}">
                                <input type="hidden" name="neitr" value="{{$neitr}}">
                                <input type="hidden" name="time" value="{{$time}}">
                                <input type="hidden" name="fulltime" value="{{$fulltime}}">
                                <input type="hidden" name="proc" value="{{$proc}}">
                                <input type="hidden" name="defic" value="{{$defic}}">
                                <table id="sortable-table-2" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="sortStyle">ფერი<i class="mdi mdi-chevron-down"></i></th>
                                        <th class="sortStyle">სიტყვა<i class="mdi mdi-chevron-down"></i></th>
                                        <th class="sortStyle">ღილაკი<i class="mdi mdi-chevron-down"></i></th>
                                        <th class="sortStyle">კონფიგურაცია<i class="mdi mdi-chevron-down"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($swori as $i => $sworiitem)
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <td><input value="{{$swori[$i]['strupcolor']}}" class="form-control" name="strupcolor[]">
                                            </td>
                                            <td><input value="{{$swori[$i]['strupcolorindex']}}" class="form-control"
                                                       name="strupcolorindex[]"></td>
                                            <td><input value="{{$swori[$i]['gilaki']}}" class="form-control"
                                                       name="gilaki[]"></td>
                                            <td><input value="{{$swori[$i]['kofiguration']}}" class="form-control"
                                                       name="kofiguration[]"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary mr-2">შენახვა</button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
