<ul class="nav">
    @foreach($testquiz as $testquizitem)
        <li class="nav-item">
            <a class="nav-link" href="{{route(''.$testquizitem->key.'.add')}}">
                <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
                <span class="menu-title">{{$testquizitem->value}}</span>
            </a>
        </li>

    @endforeach
            <li class="nav-item">
                <a class="nav-link" href="{{route('momxmar')}}" target="_blank">
                    <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
                    <span class="menu-title">დარეგისტრირრებული მომხმარებლები</span>
                </a>
            </li>
    <li class="nav-item">
        <a class="nav-link" href="{{assets('frontbild/')}}" target="_blank">
            <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
            <span class="menu-title">ტესტის ჩვენება</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('registration')}}">
            <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
            <span class="menu-title">რეგისტრაცია</span>
        </a>
    </li>
</ul>
