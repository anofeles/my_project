@extends('thems.layout.index')
@section('section')

    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">სელექციური ყურადღება ექსპერიმენტი</h4>
                <form class="form-sample" method="post" action="{{route('selection.test.add')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">სათაური</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="title" placeholder="სათაური"/>
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
                                <label class="col-sm-3 col-form-label">სტიმულების თავსებადობა</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="first"
                                           placeholder="სწორი პასუხები"/>
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
                            <form method="post" action="{{route('add.selection')}}">
                                @csrf
                                <input type="hidden" name="title" value="{{$title}}">
                                <input type="hidden" name="desc" value="{{$desc}}">
                                <input type="hidden" name="time" value="{{$time}}">
                                <input type="hidden" name="fulltime" value="{{$fulltime}}">
                                <input type="hidden" name="first" value="{{$first}}">
                                <input type="hidden" name="row" value="{{$rov}}">
                                <input type="hidden" name="proc" value="{{$proc}}">
                                <input type="hidden" name="defic" value="{{$defic}}">
                                <table id="sortable-table-2" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="sortStyle">სამიზნე სტიმული<i class="mdi mdi-chevron-down"></i></th>
                                        <th class="sortStyle">დისტრაქტორი სტიმული<i class="mdi mdi-chevron-down"></i></th>
                                        <th class="sortStyle">პირველი ვარიანტი<i class="mdi mdi-chevron-down"></i></th>
                                        <th class="sortStyle">დაშორება<i class="mdi mdi-chevron-down"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($swori as $i => $sworiitem)
{{--                                    @dd($sworiitem)--}}
                                    @if($sworiitem['pirvelivarian'] == 1)
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <td><input value="{{$sworiitem['pirveliaso']}}" class="form-control" name="pirveliaso[]">
                                            </td>
                                            <td><input value="{{$sworiitem['meoreaso']}}" class="form-control"
                                                       name="meoreaso[]"></td>
                                            <td><input value="{{$sworiitem['pirvelivarian']}}" class="form-control"
                                                       name="pirvelivarian[]"></td>
                                            <td><input value="{{$sworiitem['dashorebap']}}" class="form-control"
                                                       name="dashorebap[]"></td>
                                        </tr>
                                        @endif
                                    @if($sworiitem['pirvelivarian'] == 2)
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <td><input value="{{$sworiitem['pirveliaso']}}" class="form-control" name="pirveliaso[]">
                                            </td>
                                            <td><input value="{{$sworiitem['meoreaso']}}" class="form-control"
                                                       name="meoreaso[]"></td>
                                            <td><input value="{{$sworiitem['pirvelivarian']}}" class="form-control"
                                                       name="pirvelivarian[]"></td>
                                            <td><input value="{{$sworiitem['dashorebam']}}" class="form-control"
                                                       name="dashorebap[]"></td>
                                        </tr>
                                    @endif
                                    @if($sworiitem['pirvelivarian'] == 3)
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <td><input value="{{$sworiitem['pirveliaso']}}" class="form-control" name="pirveliaso[]">
                                            </td>
                                            <td><input value="{{$sworiitem['meoreaso']}}" class="form-control"
                                                       name="meoreaso[]"></td>
                                            <td><input value="{{$sworiitem['pirvelivarian']}}" class="form-control"
                                                       name="pirvelivarian[]"></td>
                                            <td><input value="{{$sworiitem['dashorebames']}}" class="form-control"
                                                       name="dashorebap[]"></td>
                                        </tr>
                                    @endif
                                    @if($sworiitem['pirvelivarian'] == 4)
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <td><input value="{{$sworiitem['pirveliaso']}}" class="form-control" name="pirveliaso[]">
                                            </td>
                                            <td><input value="{{$sworiitem['meoreaso']}}" class="form-control"
                                                       name="meoreaso[]"></td>
                                            <td><input value="{{$sworiitem['pirvelivarian']}}" class="form-control"
                                                       name="pirvelivarian[]"></td>
                                            <td><input value="{{$sworiitem['dashorebabolo']}}" class="form-control"
                                                       name="dashorebap[]"></td>
                                        </tr>
                                    @endif
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
