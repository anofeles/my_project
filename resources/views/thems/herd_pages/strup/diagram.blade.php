@extends('thems.layout.index')
@section('section')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <a href="{{route('file.strup',['testuuid'=>$testuuid,'user_uuid'=>$user_uuid,'datauser'=>$datauser,'file'=>1])}}">
                    <span class="mdi mdi-file-excel mdi-24px"></span> შედეგები ცხრილის სახით
                </a>
                {{--                @php--}}
                {{--                    $xdiagramrow = explode(',',$diagrama->xgerdz);--}}
                {{--                    $ydiagramrow = explode(',',$diagrama->ygerdz);--}}
                {{--                @endphp--}}
                @foreach($diagrama as $i => $diagramaitem)
                    @php($tar = explode('GMT+0400',$diagramaitem->date))
                    @php($targamot = gmdate("Y-m-d H:i:s",strtotime($tar[0])))
                    @if($targamot == $datauser)
                        @if(!empty($diagramaitem->id))
                            <a href="{{route('strup.pasuxfile',['testuuid'=>$testuuid,'diagramid'=>$diagramaitem->id])}}">დიაგრამა {{$i + 1}}</a>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
