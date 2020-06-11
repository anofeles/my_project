@extends('thems.layout.index')
@section('section')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            {{--                            <h4 class="card-title">Striped Sortable Table</h4>--}}
                            {{--                            <p class="page-description">Add class <code>.table-striped</code> for table</p>--}}
                            <div class="row">
                                <div class="table-sorter-wrapper col-lg-12 table-responsive">
                                    <table id="sortable-table-2" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th class="sortStyle">სახელი<i class="mdi mdi-chevron-down"></i></th>
                                            <th class="sortStyle">გვარი<i class="mdi mdi-chevron-down"></i></th>
                                            <th class="sortStyle">ელ.ფოსტა<i class="mdi mdi-chevron-down"></i></th>
                                            <th class="sortStyle">მომხმარებელი<i class="mdi mdi-chevron-down"></i></th>
                                            <th class="sortStyle">იხილეთ პასუხები<i class="mdi mdi-chevron-down"></i></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @if(isset($usertoani))
                                            @foreach($usertoani as $i => $usertoaniitem)
                                                @if(isset($usertoaniitem[0]->id))
                                                    <tr>
                                                        <td>{{$usertoaniitem[0]->id}}</td>
                                                        <td>{{$usertoaniitem[0]->name}}</td>
                                                        <td>{{$usertoaniitem[0]->lname}}</td>
                                                        <td>{{$usertoaniitem[0]->email}}</td>
                                                        <td>{{$usertoaniitem[0]->user}}</td>
                                                        <td class="jsgrid-cell">
                                                            @if(isset($filerov[0]))
                                                                @foreach($filerov as $i => $filerovitem)
                                                                    @foreach($filerovitem as $filerovitemitem)

                                                                        @if(isset($filerovitemitem->testuuid) && !empty($filerovitemitem->testuuid))
{{--                                                                            @dump($filerovitemitem->user_uuid)--}}
{{--                                                                            @dump($usertoaniitem)--}}
                                                                            @if($filerovitemitem->user_uuid == $usertoaniitem[0]->uuid)
                                                                                @php($tar = explode('GMT+0400',$filerovitemitem->datauser))
                                                                                @if(isset($tar[0]) && !empty($tar[0]))
                                                                                    @php($targamot = gmdate("Y-m-d H:i:s",strtotime($tar[0])))
                                                                                    <a href="{{route('file.lewsgad',['testuuid'=>$filerovitemitem->testuuid,'user_uuid'=>$filerovitemitem->user_uuid,'datauser'=>$targamot,'file'=>0])}}">
                                                                                        {{$targamot}}
                                                                                    </a>
                                                                                    <br>
                                                                                @endif
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
