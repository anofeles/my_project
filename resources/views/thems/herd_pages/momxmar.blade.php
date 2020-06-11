@extends('thems.layout.index')
@section('section')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
{{--                <a href="{{route('raqdro.test.add')}}"> <span class="mdi mdi-plus mdi-48px mdi-dark"></span></a>--}}
                {{--                <h4 class="card-title">Data table</h4>--}}
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
                                                    სახელი
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                    rowspan="1" colspan="1" style="width: 173.117px;"
                                                    aria-label="Customer: activate to sort column ascending">
                                                    გვარი
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                    rowspan="1" colspan="1" style="width: 173.117px;"
                                                    aria-label="Customer: activate to sort column ascending">
                                                    ელ.ფოსტა
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                    rowspan="1" colspan="1" style="width: 173.117px;"
                                                    aria-label="Customer: activate to sort column ascending">
                                                    სტატუსი
                                                </th>
                                            </tr>
                                            </thead>
                                            @if(isset($momxmar))
                                                @foreach($momxmar as $momxmaritem)
                                                    <tbody>

                                                    <td>{{$momxmaritem->id}}</td>
                                                    <td>{{$momxmaritem->name}}</td>
                                                    <td>{{$momxmaritem->lname}}</td>
                                                    <td>{{$momxmaritem->email}}</td>
                                                    <td>
                                                        @if($momxmaritem->status == 1)
                                                            სუპერ ადმინი
                                                        @elseif($momxmaritem->status == 2)
                                                            ადმინი
                                                        @else
                                                            მომხმარებელი
                                                        @endif
                                                    </td>

                                                    </tbody>
                                                @endforeach
                                            @endif
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
