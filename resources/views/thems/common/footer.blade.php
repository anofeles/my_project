

<!-- plugins:js -->
<script src="{{assets('vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{assets('vendors/js/vendor.bundle.addons.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{assets('js/off-canvas.js')}}"></script>
<script src="{{assets('js/hoverable-collapse.js')}}"></script>
<script src="{{assets('js/template.js')}}"></script>
<script src="{{assets('js/settings.js')}}"></script>
<script src="{{assets('js/todolist.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{assets('js/dashboard.js')}}"></script>

{{--<script>--}}
{{--    $.ajax({--}}
{{--        headers: {--}}
{{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--        },--}}
{{--        url: 'signal',--}}
{{--        dataType: 'json',--}}
{{--        type: "POST",--}}
{{--        data: {--}}
{{--            'local': 'ka',--}}
{{--            'regid': 1--}}
{{--        },--}}
{{--        success: addProgramJSON,--}}
{{--        success: addProgramJSON,--}}
{{--        error: (e) => {--}}
{{--            console.log(e);--}}
{{--        }--}}
{{--    });--}}
{{--    function addProgramJSON(rov) {--}}
{{--        let result = JSON.stringify(rov);--}}
{{--        let parse = JSON.parse("[" + result + "]");--}}
{{--        console.log(parse[0]);--}}
{{--    }--}}
{{--</script>--}}
{{--<script src="{{asset('assets/js/my.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{asset('assets/js/myajax.js')}}" type="text/javascript"></script>--}}
