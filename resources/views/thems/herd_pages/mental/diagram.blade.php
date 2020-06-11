@extends('thems.layout.index')
@section('section')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">

                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            {{--                            <h4 class="card-title">Simple Dragula</h4>--}}
                            <div class="row">
                                <div class="col-md-12 h-100">
                                    <div class="bg-secondary p-4">
                                        <div id="profile-list-left" class="py-2">
                                            <div class="card rounded mb-2">
                                                <div class="card-body p-3">
                                                    <div class="media">
                                                        <div class="media-body">
                                                            <a href="{{route('file.mental',['testuuid'=>$testuuid,'user_uuid'=>$user_uuid,'datauser'=>$datauser,'file'=>1])}}">
                                                                <span class="mdi mdi-file-excel mdi-24px"></span> შედეგები ცხრილის სახით
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @php
                                                $raod=1;
                                            @endphp
                                            @foreach($diagrama as $diagramaitem)
                                                @php
                                                    $tar = explode('GMT+0400',$diagramaitem->date);
                                                $targamot = gmdate("Y-m-d H:i:s",strtotime($tar[0]));
                                                @endphp
                                                @if($targamot == $datauser)
                                                    @if(!empty($diagramaitem->id))
                                                        <div class="card rounded mb-2">
                                                            <div class="card-body p-3">
                                                                <div class="media">
                                                                    <div class="media-body">
                                                                        <a href="{{route('mental.pasuxfile',['testuuid'=>$testuuid,'diagramid'=>$diagramaitem->id])}}">
                                                                            @if($raod == 1)
                                                                                რეაქციის დრო როგორც სტიმულის სახის ფუნქცია დიაგრამა
                                                                            @elseif($raod == 2)
                                                                                სისწორე როგორც სტიმულის სახის ფუნქცია დიაგრამა
                                                                            @elseif($raod == 3)
                                                                                რეაქციის დრო როგორც ბრუნვის კუთხის ფუნქცია დიაგრამა
                                                                            @elseif($raod == 4)
                                                                                სისწორე როგორც ბრუნვის კუთხის ფუნქცია დიაგრამა
                                                                                @else
                                                                                დიაგრამა {{$raod}}
                                                                            @endif
{{--                                                                            დიაგრამა {{$raod}}--}}
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @php
                                                            $raod++;
                                                        @endphp
                                                    @endif
                                                @endif

                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{--                <a href="{{route('file.mental',['testuuid'=>$testuuid,'user_uuid'=>$user_uuid,'datauser'=>$datauser,'file'=>1])}}">File--}}
                {{--                    Dowloads</a>--}}
                {{--                --}}{{--                @php--}}
                {{--                --}}{{--                    $xdiagramrow = explode(',',$diagrama->xgerdz);--}}
                {{--                --}}{{--                    $ydiagramrow = explode(',',$diagrama->ygerdz);--}}
                {{--                --}}{{--                @endphp @dd($datauser)--}}

                {{--                @foreach($diagrama as $i => $diagramaitem)--}}
                {{--                    @php($tar = explode('GMT+0400',$diagramaitem->date))--}}
                {{--                    @php($targamot = gmdate("Y-m-d H:i:s",strtotime($tar[0])))--}}

                {{--                    @if($targamot == $datauser)--}}
                {{--                        @dump($targamot)--}}
                {{--                    @dump($datauser)--}}
                {{--                        @if(!empty($diagramaitem->id))--}}
                {{--                            <a href="{{route('mental.pasuxfile',['testuuid'=>$testuuid,'diagramid'=>$diagramaitem->id])}}">დიაგრამა {{$i + 1}}</a>--}}
                {{--                        @endif--}}
                {{--                    @endif--}}
                {{--                @endforeach--}}
            </div>
        </div>
    </div>
@endsection
