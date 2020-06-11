@extends('thems.layout.index')
@section('section')

    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">პერცეფტული შედარება</h4>
                <form class="form-sample" method="post" action="{{route('perceft.test.ass')}}">
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
                                <label class="col-sm-3 col-form-label">სწორი პასუხები</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="true"
                                           placeholder="სწორი პასუხები"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ცდების საერთო რაოდენობა</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="rov" placeholder="ცდების რაოდენობა"/>
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
                            <form method="post" action="{{route('add.percef')}}">
                                @csrf
                                <input type="hidden" name="title" value="{{$title}}">
                                <input type="hidden" name="desc" value="{{$desc}}">
                                <input type="hidden" name="time" value="{{$time}}">
                                <input type="hidden" name="fulltime" value="{{$fulltime}}">
                                <input type="hidden" name="true" value="{{$true}}">
                                <input type="hidden" name="row" value="{{$rov}}">
                                <input type="hidden" name="proc" value="{{$proc}}">
                                <input type="hidden" name="defic" value="{{$defic}}">
                                <table id="sortable-table-2" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="sortStyle">შწორი პასუხი<i class="mdi mdi-chevron-down"></i></th>
                                        <th class="sortStyle">მსგავსების ტიპი<i class="mdi mdi-chevron-down"></i></th>
                                        <th class="sortStyle">ზედა სიმბოლოა<i class="mdi mdi-chevron-down"></i></th>
                                        <th class="sortStyle">ქვედა სიმბოლო<i class="mdi mdi-chevron-down"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($swori as $i => $sworiitem)
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <td><input value="{{$sworiitem['persbigpass']}}" class="form-control" name="persbigpass[]"></td>
                                            <td><input value="{{$sworiitem['seqtorei']}}" class="form-control" name="seqtorei[]"></td>
                                            <td><input value="{{$sworiitem['persbig']}}" class="form-control"
                                                       name="persbig[]"></td>
                                            <td><input value="{{$sworiitem['perssmol']}}" class="form-control"
                                                       name="perssmol[]"></td>
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
