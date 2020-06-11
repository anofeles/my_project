@extends('thems.layout.index')
@section('section')
    <div class="main-panel">
        <div class="content-wrapper">
            <form method="post" action="">
                @csrf
                @if(isset($pasux->uuid))
                    <input type="hidden" value="{{$pasux->uuid}}" name="pasux">
                @endif
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
                                                <th class="sortStyle">მომხმარებელი<i class="mdi mdi-chevron-down"></i>
                                                </th>
                                                <th class="sortStyle">მომხმარებლის მიმაგრება
                                                    <br>
                                                    <input type="button" onclick='selectAll()' value="Select All"/>
                                                    <input type="button" onclick='UnSelectAll()' value="Unselect All"/>
                                                    <i class="mdi mdi-chevron-down"></i></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $usersitem)
                                                <tr>
                                                    <td>{{$usersitem->id}}</td>
                                                    <td>{{$usersitem->name}}</td>
                                                    <td>{{$usersitem->lname}}</td>
                                                    <td>{{$usersitem->email}}</td>
                                                    <td>{{$usersitem->user}}</td>
                                                    <td class="jsgrid-cell">
                                                        <div class="form-check mt-0">
                                                            <label class="form-check-label">
                                                                <input name="user[]" value="{{$usersitem->uuid}}"
                                                                       type="checkbox" class="form-check-input"
                                                                       @foreach ($userpregist as $userpregistuser)
                                                                       @if($userpregistuser->register_user_uuid == $usersitem->uuid)
                                                                       checked="checked"
                                                                    @endif
                                                                    @endforeach
                                                                >
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card px-3">
                            <div class="card-body">
                                <h4 class="card-title">პასუხის ველები</h4>
                                <div class="list-wrapper">
                                    <ul class="d-flex flex-column-reverse todo-list">
                                        <li>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="checkbox" type="checkbox" name="sworipasux"
                                                           @if(isset($pasux->sworipasux) && $pasux->sworipasux == 'on')
                                                           checked="checked"
                                                        @endif
                                                    >
                                                    სისწორე
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="checkbox" type="checkbox" name="upasuxtuara"
                                                           @if(isset($pasux->upasuxtuara) && $pasux->upasuxtuara == 'on')
                                                           checked="checked"
                                                        @endif
                                                    >
                                                    უპასუხა თუ არა
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="checkbox" type="checkbox" name="pasuxdro"
                                                           @if(isset($pasux->pasuxdro) && $pasux->pasuxdro == 'on')
                                                           checked="checked"
                                                        @endif
                                                    >
                                                    რეაქციის დრო
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="checkbox" type="checkbox" name="momxpasux"
                                                           @if(isset($pasux->momxpasux) && $pasux->momxpasux == 'on')
                                                           checked="checked"
                                                        @endif
                                                    >
                                                    მსგავსების ტიპი
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="checkbox" type="checkbox" name="persbig"
                                                           @if(isset($pasux->persbig) && $pasux->persbig == 'on')
                                                           checked="checked"
                                                        @endif
                                                    >
                                                    პირველი სიმბოლო
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="checkbox" type="checkbox" name="persbigpass"
                                                           @if(isset($pasux->persbigpass) && $pasux->persbigpass == 'on')
                                                           checked="checked"
                                                        @endif
                                                    >
                                                    მეორე სიმბოლო
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card px-3">
                            <div class="card-body">
                                <div class="add-graph">
                                    <button type="button" class="add-couples btn btn-primary mr-2">დამატება</button>
                                    {{--                                        <button class="add-couples" type="button">damateba</button>--}}
                                    <div class="couples-holder">
                                        <div class="couples">
                                            <div class="form-group">
                                                <span class="axis-text">x-ღერძი</span>
                                                <select name="xgerdzi[]">
                                                    <option value=""></option>
                                                    <option value="sworipasux">სისწორე</option>
                                                    <option value="upasuxtuara">უპასუხა თუ არა</option>
                                                    <option value="pasuxdro">რეაქციის დრო</option>
                                                    <option value="momxpasux">მსგავსების ტიპი</option>
                                                    <option value="persbig">პირველი სიმბოლო</option>
                                                    <option value="persbigpass">მეორე სიმბოლო</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <span class="axis-text">y-ღერძი</span>
                                                <select name="ygerdzi[]">
                                                    <option value=""></option>
                                                    <option value="sworipasux">სისწორე</option>
                                                    <option value="upasuxtuara">უპასუხა თუ არა</option>
                                                    <option value="pasuxdro">რეაქციის დრო</option>
                                                    <option value="momxpasux">მსგავსების ტიპი</option>
                                                    <option value="persbig">პირველი სიმბოლო</option>
                                                    <option value="persbigpass">მეორე სიმბოლო</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        $('.add-couples').click(function () {
                                            let childElement1 = '<div class="form-group">\n' +
                                                '<span class="axis-text">x-ღერძი</span>\n' +
                                                '<select name="xgerdzi[]">\n' +
                                                '<option value=""></option>\n' +
                                                '<option value="sworipasux">სისწორე</option>\n' +
                                                '<option value="upasuxtuara">უპასუხა თუ არა</option>\n' +
                                                '<option value="pasuxdro">რეაქციის დრო</option>\n' +
                                                '<option value="momxpasux">მსგავსების ტიპი</option>\n' +
                                                '<option value="persbig">პირველი სიმბოლო</option>\n' +
                                                '<option value="persbigpass">მეორე სიმბოლო</option>\n' +
                                                '</select>\n' +
                                                '</div>';
                                            let childElement2 = '<div class="form-group">\n' +
                                                '<span class="axis-text">y-ღერძი</span>\n' +
                                                '<select name="ygerdzi[]">\n' +
                                                '<option value=""></option>\n' +
                                                '<option value="sworipasux">სისწორე</option>\n' +
                                                '<option value="upasuxtuara">უპასუხა თუ არა</option>\n' +
                                                '<option value="pasuxdro">რეაქციის დრო</option>\n' +
                                                '<option value="momxpasux">მსგავსების ტიპი</option>\n' +
                                                '<option value="persbig">პირველი სიმბოლო</option>\n' +
                                                '<option value="persbigpass">მეორე სიმბოლო</option>\n' +
                                                '</select>\n' +
                                                '</div>';
                                            $('.couples-holder').append(childElement1, childElement2);
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="add-couples btn btn-primary mr-2">დამატება</button>
            </form>
        </div>
    </div>
@endsection
