@extends('thems.layout.index')
@section('section')

    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">მენტალური ხატების როტაცია</h4>
                <form class="form-sample" method="post" action="{{route('mental.test.add')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ექსპერიმენტის სახელწოდება</label>
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
                                <label class="col-sm-3 col-form-label">ცდების საერთო რაოდენობა</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="rov"
                                           placeholder="ტესტ რაოდენობა"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ბრუნვის კუთხის მინიმუმი</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="brstart" placeholder="ბრუნვის კუთხის მინიმუმი"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ბრუნვის კუთხის მაქსიმუმი</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="brsfinish"
                                           placeholder="ბრუნვის კუთხის მაქსიმუმი"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ბრუნვის გრადუსის დიაპაზონი</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="brsrange" placeholder="ბრუნვის გრადუსის რენჯი"/>
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
                            <form method="post" action="{{route('mental.testpart.add')}}">
                                @csrf
                                <input type="hidden" name="title" value="{{$title}}">
                                <input type="hidden" name="desc" value="{{$desc}}">
                                <input type="hidden" name="time" value="{{$time}}">
                                <input type="hidden" name="fulltime" value="{{$fulltime}}">
                                <input type="hidden" name="rov" value="{{$rov}}">
                                <input type="hidden" name="brstart" value="{{$brstart}}">
                                <input type="hidden" name="brsfinish" value="{{$brsfinish}}">
                                <input type="hidden" name="brsrange" value="{{$brsrange}}">
                                <input type="hidden" name="proc" value="{{$proc}}">
                                <input type="hidden" name="defic" value="{{$defic}}">
                                <table id="sortable-table-2" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="sortStyle">სატესტო სტიმული<i class="mdi mdi-chevron-down"></i></th>
                                        <th class="sortStyle">ბრუნვის კუთხე<i class="mdi mdi-chevron-down"></i></th>
                                        <th class="sortStyle">სტიმულის სახე<i class="mdi mdi-chevron-down"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($swori as $i => $sworiitem)
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <td><input value="{{$sworiitem['testaso']}}" class="form-control" name="testaso[]">
                                            </td>
                                            <td><input value="{{$sworiitem['kutxe']}}" class="form-control"
                                                       name="kutxe[]"></td>
                                            <td><input value="{{$sworiitem['sarke']}}" class="form-control"
                                                       name="sarke[]"></td>
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
