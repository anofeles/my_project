@extends('thems.layout.index')
@section('section')
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">რეაქციის დრო და ყურადღება</h4>
                <form class="form-sample" method="post" action="">
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
                                    <textarea name="descript" class="form-control" rows="4">{!! $percad->desc !!}</textarea>
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
                                <label class="col-sm-3 col-form-label">პირველი ორი ასო</label>
                                <div class="col-sm-9">
                                    {{$percad->pirveeliraod}}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">მეორე ორი ასო</label>
                                <div class="col-sm-9">
                                    {{$percad->meoreraod}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ოთხი ასო</label>
                                <div class="col-sm-9">
                                    {{$percad->mesamevar}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ცდების საერთო რაოდენობა </label>
                                <div class="col-sm-9">
                                    {{$percad->raodenoba}}
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
                                    <th class="sortStyle">პირველი ასო<i class="mdi mdi-chevron-down"></i></th>
                                    <th class="sortStyle">პირველი ღილაკი<i class="mdi mdi-chevron-down"></i></th>
                                    <th class="sortStyle">მეორე ასო<i class="mdi mdi-chevron-down"></i></th>
                                    <th class="sortStyle">მეორე ღილაკი<i class="mdi mdi-chevron-down"></i></th>
                                    <th class="sortStyle">მესამე ასო<i class="mdi mdi-chevron-down"></i></th>
                                    <th class="sortStyle">მესამე ღილაკი<i class="mdi mdi-chevron-down"></i></th>
                                    <th class="sortStyle">მეოთხე ასო<i class="mdi mdi-chevron-down"></i></th>
                                    <th class="sortStyle">მეოთხე ღილაკი<i class="mdi mdi-chevron-down"></i></th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($percpartviu['quiz'] as $i => $sworiitem)
                                    <input type="hidden" value="{{$sworiitem['id']}}" name="perpartid[]">
                                    <tr>
                                        <td>{{$i+1}}</td>
                                        <td><input value="{{$sworiitem['pirveliaso']}}" class="form-control"
                                                   name="pirveliaso[]"></td>
                                        <td><input value="{{$sworiitem['pirvelgilak']}}" class="form-control"
                                                   name="pirvelgilak[]"></td>

                                        <td><input value="{{$sworiitem['meoreiaso']}}" class="form-control"
                                                   name="meoreiaso[]"></td>
                                        <td><input value="{{$sworiitem['meoregilak']}}" class="form-control"
                                                   name="meoregilak[]"></td>

                                        <td><input value="{{$sworiitem['mesameaso']}}" class="form-control"
                                                   name="mesameaso[]"></td>
                                        <td><input value="{{$sworiitem['mesamegilak']}}" class="form-control"
                                                   name="mesamegilak[]"></td>

                                        <td><input value="{{$sworiitem['meotxeaso']}}" class="form-control"
                                                   name="meotxeaso[]"></td>
                                        <td><input value="{{$sworiitem['meotxegilak']}}" class="form-control"
                                                   name="meotxegilak[]"></td>
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
