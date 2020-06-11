@extends('thems.layout.index')
@section('section')
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">პერცეფტული შედარება</h4>
                <form class="form-sample" method="post" action="{{route('edit.percef',['upid'=>$percad->id])}}">
                    @csrf
                    <input type="hidden" value="{{$percad->uuid}}" name="percuuid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"> ექსპერიმენტის სახელწოდება</label>
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
                                           value="{{$percad->timetest}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ექსპოზიციის ხანგრძლივობა პასუხით</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="fulltime"
                                           value="{{$percad->fulltime}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">სავარჯიშო ტესტების ბარიერი</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="proc" value="{{$percad->proc}}"/>
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
                                <label class="col-sm-3 col-form-label">სწორი პასუხები</label>
                                <div class="col-sm-9">
                                    {{$percad->swori}}
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
                                    <th class="sortStyle">შწორი პასუხი<i class="mdi mdi-chevron-down"></i></th>
                                    <th class="sortStyle">საერთო რაოდენობა<i class="mdi mdi-chevron-down"></i></th>
                                    <th class="sortStyle">განლაგება<i class="mdi mdi-chevron-down"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($percpartviu as $i => $sworiitem)
                                    <input type="hidden" value="{{$sworiitem->id}}" name="perpartid[]">
                                    <tr>
                                        <td>{{$i+1}}</td>
                                        <td><input value="{{$sworiitem->persbigpass}}" class="form-control"
                                                   name="perssmol[]"></td>
                                        <td><input value="{{$sworiitem->persbig}}" class="form-control"
                                                   name="persbig[]"></td>
                                        <td><input value="{{$sworiitem->perssmol}}" class="form-control"
                                                   name="persbigpass[]">
                                        </td>
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
