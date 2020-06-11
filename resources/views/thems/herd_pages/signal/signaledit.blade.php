@extends('thems.layout.index')
@section('section')

    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">სიგნალის შემჩნევის ექსპერიმენტი</h4>
                <form class="form-sample" method="post" action="{{route('editbase',['upid'=>$upid])}}">
                    @csrf
                    <input type="hidden" name="srid" value="{{$signalviu['uuid']}}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">სათაური</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="title"
                                           value="{{$signalviu['title']}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ინსტრუქცია</label>
                                <div class="col-sm-9">
                                    <textarea name="desc" class="form-control"
                                              rows="4">{{$signalviu['desc']}}</textarea>
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
                                           value="{{$signalviu['taim']}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ექსპოზიციის ხანგრძლივობა პასუხით</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="timefull"
                                           value="{{$signalviu['testtaim']}}"/>
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
                                           value="{{$signalviu['proc']}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">აღწერილობა</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control"
                                              rows="4" name="defic">{{$signalviu['defic']}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ცდების რაოდენობა სიგნალით</label>
                                <div class="col-sm-9">
                                    {{$signalviu['true']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">სიმბოლო ინტესივობის მინიმუმი</label>
                                <div class="col-sm-9">
                                    {{$signalviu['chdilistart']}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">სიმბოლო ინტესივობის მაქსიმუმი</label>
                                <div class="col-sm-9">
                                    {{$signalviu['chdilifinish']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">სიგნალის რაოდენობა</label>
                                <div class="col-sm-9">
                                    {{$signalviu['sworipasx_raod']}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ცდების საერთო რაოდენობა </label>
                                <div class="col-sm-9">
                                    {{$signalviu['row']}}
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
                                    <th class="sortStyle">სიგნალის რაოდენობა<i class="mdi mdi-chevron-down"></i></th>
                                    <th class="sortStyle">სიმბოლოების რაოდენბა<i class="mdi mdi-chevron-down"></i></th>
                                    <th class="sortStyle">სიმბოლოების მდებარეობა<i class="mdi mdi-chevron-down"></i></th>
                                    <th class="sortStyle">true & false<i class="mdi mdi-chevron-down"></i></th>
                                    <th class="sortStyle">კონცტრირებული სიმბოლოების რაოდენობა<i class="mdi mdi-chevron-down"></i>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $signalviu['quiz'] as $i => $sworiitem)
                                    <tr>
                                        <input type="hidden" name="srpartid[]" value="{{$sworiitem['id']}}">
                                        <td>{{$i+1}}</td>
                                        <td><input value="{{$sworiitem['Correct']}}" class="form-control"
                                                   name="sworigen[]">
                                        </td>
                                        <td><input value="{{$sworiitem['Wrong']}}" class="form-control"
                                                   name="arasworigen[]"></td>
                                        <td><input value="{{$sworiitem['arrangement']}}" class="form-control"
                                                   name="ganlagebagen[]"></td>
                                        <td><input value="{{$sworiitem['procenti']}}" class="form-control"
                                                   name="procentigen[]"></td>
                                        <td><input value="{{$sworiitem['Quantity']}}" class="form-control"
                                                   name="raodenobagen[]"></td>
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
