@extends('thems.layout.index')
@section('section')

    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">რეაქციის დრო და ყურადღება</h4>
                <form class="form-sample" method="post" action="{{route('raqdro.test.add')}}">
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
                                <label class="col-sm-3 col-form-label">ცდების საერთო რაოდენობა</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="rov"
                                           placeholder="ტესტების რაოდენობა"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ბლოკი ერთი ცდების რაოდენობა</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="rovfirst" placeholder="ბლოკი ერთი ცდების რაოდენობა"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ბლოკი ორი ცდების რაოდენობა</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="rovsec"
                                           placeholder="ბლოკი ორი ცდების რაოდენობა"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ბლოკი სამი ცდების რაოდენობა</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="rovthen" placeholder="ბლოკი სამი ცდების რაოდენობა"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">პირველი ასო</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="pirveliasomt"
                                           placeholder="პირველი ასო"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">პირველი ღილაკი</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="pirvelgilakmt" placeholder="პირველი ღილაკი"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">მეორე ასო</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="meoreiasomt"
                                           placeholder="მეორე ასო"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">მესამე ღილაკი</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="meoregilakmt" placeholder="მესამე ღილაკი"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">მესამე ასო</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="mesameasomt"
                                           placeholder="სწორი პასუხები"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">მესამე ღილაკი</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="mesamegilakmt" placeholder="მესამე ღილაკი"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">მეოთხე ასოა</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="meotxeasomt"
                                           placeholder="მეოთხე ასოა"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">მეოთხე ღილაკი</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="meotxegilakmt" placeholder="მეოთხე ღილაკი"/>
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

                @if(isset($pirveliaso) && !empty($pirveliaso))

                    <div class="row">
                        <div class="table-sorter-wrapper col-lg-12 table-responsive">
                            <form method="post" action="{{route('raqdro.testpart.add')}}">
                                @csrf
                                <input type="hidden" name="title" value="{{$title}}">
                                <input type="hidden" name="desc" value="{{$desc}}">
                                <input type="hidden" name="time" value="{{$time}}">
                                <input type="hidden" name="fulltime" value="{{$fulltime}}">
                                <input type="hidden" name="rov" value="{{$rov}}">
                                <input type="hidden" name="first" value="{{$first}}">
                                <input type="hidden" name="second" value="{{$second}}">
                                <input type="hidden" name="therd" value="{{$therd}}">
                                <input type="hidden" name="proc" value="{{$proc}}">
                                <input type="hidden" name="defic" value="{{$defic}}">
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
                                        <th class="sortStyle">ალტერნატივობის რაოდენობა <i class="mdi mdi-chevron-down"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @for($i=1;$i<=$rov; $i++)
                                        <tr>
                                            <td>{{$i}}</td>
                                            @if($i <= $first)
                                                <td><input value="{{$pirveliaso}}" class="form-control"
                                                       name="pirveliaso[]"></td>
                                                <td><input value="{{$pirvelgilak}}" class="form-control"
                                                           name="pirvelgilak[]"></td>

                                                <td><input value="{{$meoreiaso}}" class="form-control"
                                                           name="meoreiaso[]"></td>
                                                <td><input value="{{$meoregilak}}" class="form-control"
                                                           name="meoregilak[]"></td>

                                                <td><input  class="form-control"
                                                           name="mesameaso[]"></td>
                                                <td><input class="form-control"
                                                           name="mesamegilak[]"></td>

                                                <td><input  class="form-control"
                                                           name="meotxeaso[]"></td>
                                                <td><input  class="form-control"
                                                           name="meotxegilak[]"></td>
                                                <td><input  class="form-control" value="2"
                                                            name="altraod[]"></td>
                                                @elseif($i > $first && $i <= $first+$second)
                                                <td><input  class="form-control"
                                                           name="pirveliaso[]"></td>
                                                <td><input class="form-control"
                                                           name="pirvelgilak[]"></td>

                                                <td><input  class="form-control"
                                                           name="meoreiaso[]"></td>
                                                <td><input  class="form-control"
                                                           name="meoregilak[]"></td>

                                                <td><input value="{{$mesameaso}}" class="form-control"
                                                           name="mesameaso[]"></td>
                                                <td><input value="{{$mesamegilak}}" class="form-control"
                                                           name="mesamegilak[]"></td>

                                                <td><input value="{{$meotxeaso}}" class="form-control"
                                                           name="meotxeaso[]"></td>
                                                <td><input value="{{$meotxegilak}}" class="form-control"
                                                           name="meotxegilak[]"></td>
                                                <td><input value="2" class="form-control"
                                                           name="altraod[]"></td>
                                                @else
                                                <td><input value="{{$pirveliaso}}" class="form-control"
                                                           name="pirveliaso[]"></td>
                                                <td><input value="{{$pirvelgilak}}" class="form-control"
                                                           name="pirvelgilak[]"></td>

                                                <td><input value="{{$meoreiaso}}" class="form-control"
                                                           name="meoreiaso[]"></td>
                                                <td><input value="{{$meoregilak}}" class="form-control"
                                                           name="meoregilak[]"></td>

                                                <td><input value="{{$mesameaso}}" class="form-control"
                                                           name="mesameaso[]"></td>
                                                <td><input value="{{$mesamegilak}}" class="form-control"
                                                           name="mesamegilak[]"></td>

                                                <td><input value="{{$meotxeaso}}" class="form-control"
                                                           name="meotxeaso[]"></td>
                                                <td><input value="{{$meotxegilak}}" class="form-control"
                                                           name="meotxegilak[]"></td>
                                                <td><input value="4" class="form-control"
                                                           name="altraod[]"></td>
                                            @endif
                                        </tr>
                                    @endfor
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
