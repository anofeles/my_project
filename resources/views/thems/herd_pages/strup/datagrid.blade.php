@extends('thems.layout.index')
@section('section')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <a href="{{route('strup.test.add')}}"> <span class="mdi mdi-plus mdi-48px mdi-dark"></span></a>
{{--                                <h4 class="card-title">სტრუპის ეფექტი</h4>--}}
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <div id="order-listing_wrapper"
                                 class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="order-listing" class="table dataTable no-footer" role="grid"
                                               aria-describedby="order-listing_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                    rowspan="1" colspan="1" style="width: 142.017px;"
                                                    aria-label="Order #: activate to sort column ascending">#
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                    rowspan="1" colspan="1" style="width: 230.8px;"
                                                    aria-label="Purchased On: activate to sort column ascending">
                                                    ექსპერიმენტის სახელწოდება
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                    rowspan="1" colspan="1" style="width: 173.117px;"
                                                    aria-label="Customer: activate to sort column ascending">აღწერილობა
                                                </th>

                                                <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                    rowspan="1" colspan="1" style="width: 173.117px;"
                                                    aria-label="Customer: activate to sort column ascending"> ავტორი
                                                </th>


                                                <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                    rowspan="1" colspan="1" style="width: 185.567px;"
                                                    aria-label="Base Price: activate to sort column ascending">ცდების საერთო რაოდენობა
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="order-listing"
                                                    rowspan="1" colspan="1" style="width: 137.4px;"
                                                    aria-label="Status: activate to sort column descending"
                                                    aria-sort="ascending">მომხმარებლები
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="order-listing"
                                                    rowspan="1" colspan="1" style="width: 137.4px;"
                                                    aria-label="Status: activate to sort column descending"
                                                    aria-sort="ascending">პასუხები
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="order-listing"
                                                    rowspan="1" colspan="1" style="width: 137.4px;"
                                                    aria-label="Status: activate to sort column descending"
                                                    aria-sort="ascending">რედაქტირება
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                    rowspan="1" colspan="1" style="width: 144.217px;"
                                                    aria-label="Actions: activate to sort column ascending">წაშლა
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(isset($testviuv))
                                                @foreach($testviuv as $testviuvitem)
                                                    <tr role="row" class="odd">
                                                        <td class="">{{$testviuvitem->id}}</td>
                                                        <td class="">{{$testviuvitem->title}}</td>
                                                        <td class="">{!! $testviuvitem->defic !!}</td>
                                                        <td>
                                                            @foreach($usertoauth as $usertoauthitem)
                                                                @if($usertoauthitem->row_uuid == $testviuvitem->uuid)
                                                                    @foreach($usert as $usertitem)

                                                                        @if($usertitem->uuid == $usertoauthitem->register_user_uuid)
                                                                            {{$usertitem->name}} {{$usertitem->lname}}
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                        </td>

                                                        <td class="">{{$testviuvitem->raodenoba}}</td>
                                                        <td class="sorting_1">
                                                            <a href="{{route('strup.user',['upid'=>$testviuvitem->id])}}">
                                                                <button type="button"
                                                                        class="btn btn-primary btn-rounded btn-fw"><span
                                                                        class="mdi mdi-file-document-edit"></span>
                                                                    მომხმარებლები
                                                                </button>
                                                            </a>
                                                        </td>
                                                        <td class="sorting_1">
                                                            <a href="{{route('user.strup',['upid'=>$testviuvitem->id])}}">
                                                                <button type="button"
                                                                        class="btn btn-primary btn-rounded btn-fw"><span
                                                                        class="mdi mdi-file-document-edit"></span>
                                                                    პასუხები
                                                                </button>
                                                            </a>
                                                        </td>
                                                        <td class="sorting_1">
                                                            <a href="{{route('edit.strup',['upid'=>$testviuvitem->id])}}">
                                                                <button type="button"
                                                                        class="btn btn-primary btn-rounded btn-fw"><span
                                                                        class="mdi mdi-file-document-edit"></span>
                                                                    რედაქტირება
                                                                </button>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="{{route('dell.strup',['upid'=>$testviuvitem->id])}}">
                                                                <button type="button"
                                                                        class="btn btn-danger btn-rounded btn-fw"><span
                                                                        class="mdi mdi-delete"></span> წაშლა
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
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
    </div>
@endsection
