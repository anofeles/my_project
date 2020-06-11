@extends('thems.layout.index')
@section('section')
    {{--    @dd($percad)--}}
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">მენტალური ხატების როტაცია</h4>

                <form class="form-sample" method="post" action="{{route('edit.infgadproc',['upid'=>$percad->id])}}">
                    @csrf
                    <input type="hidden" value="{{$percad->uuid}}" name="percuuid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ექსპერიმენტის სახელწოდება</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="title" value="{{$percad->title}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ინსტრუქცია</label>
                                <div class="col-sm-9">
                                    <textarea name="descript" class="form-control"
                                              rows="4">{!! $percad->desc !!}</textarea>
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
                                           value="{{$percad->time}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ექსპოზიციის ხანგრძლივობა პასუხით</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="fulltime"
                                           value="{{$percad->timefull}}"/>
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
                                           value="{{$percad->proc}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">აღწერილობა</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control"
                                              rows="4" name="defic">{{$percad->defic}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ბრუნვის კუთხის მინიმუმი</label>
                                <div class="col-sm-9">
                                    {{$percad->rotatestart}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ბრუნვის კუთხის მაქსიმუმი</label>
                                <div class="col-sm-9">
                                    {{$percad->rotatefinish}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ბრუნვის გრადუსის დიაპაზონი</label>
                                <div class="col-sm-9">
                                    {{$percad->rotaterange}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ცდების საერთო რაოდენობა</label>
                                <div class="col-sm-9">
                                    {{$percad->rov}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="table-sorter-wrapper col-lg-12 table-responsive">
                            @csrf
                            <table id="sortable-table-2" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="sortStyle">წინადადება<i class="mdi mdi-chevron-down"></i></th>
                                    <th class="sortStyle">სიის ვარიანტი<i class="mdi mdi-chevron-down"></i></th>
                                    <th class="sortStyle">კატეგორია<i class="mdi mdi-chevron-down"></i></th>
                                </tr>
                                </thead>
                                <tbody>
{{--                                @dd($sworiitem)--}}
                                @foreach($percpartviu as $i => $sworiitem)
                                    <input type="hidden" value="{{$sworiitem->uuid}}" name="perpartid[]">
                                    <tr>
                                        <td>{{$i+1}}</td>
                                        <td><input value="{{$sworiitem->winadadeba}}" class="form-control"
                                                   name="winadadeba[]"></td>
                                        <td><input value="{{$sworiitem->siis_var}}" class="form-control"
                                                   name="siis_var[]"></td>
                                        <td><input value="{{$sworiitem->categoria}}" class="form-control"
                                                   name="categoria[]"></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary mr-2">გენერაცია</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
