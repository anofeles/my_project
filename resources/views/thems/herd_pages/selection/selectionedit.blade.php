@extends('thems.layout.index')
@section('section')

    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">სელექციური ყურადღება</h4>
                <form class="form-sample" method="post" action="">
                    @csrf
                    <input type="hidden" name="srid" value="{{$selection->uuid}}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ექსპერიმენტის სახელწოდება</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="title"
                                           value="{{$selection->title}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ინსტრუქცია</label>
                                <div class="col-sm-9">
                                    <textarea name="desc" class="form-control"
                                              rows="4">{{$selection->desc}}</textarea>
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
                                           value="{{$selection->time}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ექსპოზიციის ხანგრძლივობა პასუხით</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="timefull"
                                           value="{{$selection->timetest}}"/>
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
                                           value="{{$selection->proc}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">აღწერილობა</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control"
                                              rows="4" name="defic">{{$selection->defic}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">სტიმულების თავსებადობა</label>
                                <div class="col-sm-9">
                                    {{$selection->first+1}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ცდების საერთო რაოდენობა </label>
                                <div class="col-sm-9">
                                    {{$selection->row}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="table-sorter-wrapper col-lg-12 table-responsive">
                            <table id="sortable-table-2" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="sortStyle">ვარიანტი<i class="mdi mdi-chevron-down"></i></th>
                                    <th class="sortStyle">დაშორება<i class="mdi mdi-chevron-down"></i></th>
                                    <th class="sortStyle">პირველი ასო<i class="mdi mdi-chevron-down"></i></th>
                                    <th class="sortStyle">მეორე ასო<i class="mdi mdi-chevron-down"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $signal['quiz'] as $i => $sworiitem)
                                    <tr>
                                        <input type="hidden" name="srpartid[]" value="{{$sworiitem->id}}">
                                        <td>{{$i+1}}</td>
                                        <td><input value="{{$sworiitem->variant}}" class="form-control"
                                                   name="variant[]">
                                        </td>
                                        <td><input value="{{$sworiitem->dashoreba}}" class="form-control"
                                                   name="dashoreba[]"></td>
                                        <td><input value="{{$sworiitem->pirveliaso}}" class="form-control"
                                                   name="pirveliaso[]"></td>
                                        <td><input value="{{$sworiitem->meoreaso}}" class="form-control"
                                                   name="meoreaso[]"></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">გენერაცია</button>
                </form>
            </div>
        </div>
    </div>
@endsection
