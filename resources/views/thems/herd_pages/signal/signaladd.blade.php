@extends('thems.layout.index')
@section('section')

    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">სიგნალის შემჩნევის ექსპერიმენტი</h4>
                <form class="form-sample" method="post" action="{{route('signal.test.add')}}">
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
                                    <textarea name="descript" {{--class="form-control"--}} rows="4"></textarea>
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
                                <label class="col-sm-3 col-form-label">ცდების საერთო რაოდენობა</label>
                                <div class="col-sm-9">
                                    <input type="text" name="raod" class="form-control" placeholder="ცდების საერთო რაოდენობა"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ცდების რაოდენობა სიგნალით</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="true" placeholder="ცდების რაოდენობა სიგნალით"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">სავარჯიშო ტესტების ბარიერი</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="proc" placeholder="სავარჯიშო ტესტების ბარიერი"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">სიმბოლო ინტესივობის მინიმუმი</label>
                                <div class="col-sm-9">
                                    <input type="text" name="falsstart" class="form-control"
                                           placeholder="სიმბოლო ინტესივობის მინიმუმი"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">სიმბოლო ინტესივობის მაქსიმუმი</label>
                                <div class="col-sm-9">
                                    <input type="text" name="falsefin" class="form-control"
                                           placeholder="სიმბოლო ინტესივობის მაქსიმუმი"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">სიგნალის რაოდენობა</label>
                                <div class="col-sm-9">
                                    <select name="variant" class="form-control">
                                        <option value="0">ყველა</option>
                                        <option value="1">ერთი</option>
                                        <option value="2">ორი</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ექსპოზიციის ხანგრძლივობა პასუხით</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="timefull"
                                           placeholder="ექსპოზიციის ხანგრძლივობა პასუხით"/>
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
                            <form method="post" action="{{route('addbase')}}">
                                @csrf
                                <input type="hidden" name="title" value="{{$title}}">
                                <input type="hidden" name="desc" value="{{$desc}}">
                                <input type="hidden" name="time" value="{{$time}}">
                                <input type="hidden" name="raod" value="{{$raod}}">
                                <input type="hidden" name="true" value="{{$true}}">
                                <input type="hidden" name="falsstart" value="{{$falsstart}}">
                                <input type="hidden" name="falsefin" value="{{$falsefin}}">
                                <input type="hidden" name="variant" value="{{$variant}}">
                                <input type="hidden" name="timefull" value="{{$timefull}}">
                                <input type="hidden" name="proc" value="{{$proc}}">
                                <input type="hidden" name="defic" value="{{$defic}}">
                                <table id="sortable-table-2" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="sortStyle">სიგნალის რაოდენობა<i class="mdi mdi-chevron-down"></i></th>
                                        <th class="sortStyle">სიმბოლოების რაოდენბა<i class="mdi mdi-chevron-down"></i></th>
                                        <th class="sortStyle">სიმბოლოების მდებარეობა<i class="mdi mdi-chevron-down"></i></th>
                                        <th class="sortStyle">true & false<i class="mdi mdi-chevron-down"></i></th>
                                        <th class="sortStyle">კონცტრირებული სიმბოლოების რაოდება<i class="mdi mdi-chevron-down"></i>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($swori as $i => $sworiitem)
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <td><input value="{{$swori[$i]}}" class="form-control" name="sworigen[]">
                                            </td>
                                            <td><input value="{{$araswori[$i]}}" class="form-control"
                                                       name="arasworigen[]"></td>
                                            <td><input value="{{$ganlageba[$i]}}" class="form-control"
                                                       name="ganlagebagen[]"></td>
                                            <td><input value="{{$procenti[$i]}}" class="form-control"
                                                       name="procentigen[]"></td>
                                            <td><input value="{{intval($raodenoba[$i])}}" class="form-control"
                                                       name="raodenobagen[]"></td>
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
