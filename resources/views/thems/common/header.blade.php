<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, user-scalable=yes"/>
<meta name="HandheldFriendly" content="true"/>
<meta name="apple-mobile-web-app-capable" content="YES"/>
<base/>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<meta name="author" content="Super User"/>
<meta name="generator" content="Joomla! - Open Source Content Management"/>
<title>Project Objectives</title>
<link href="" rel="canonical"/>
{{--<link href="{{asset('assets/media/images/favicon.ico')}}" rel="shortcut icon" type="image/vnd.microsoft.icon"/>--}}
{{--<link rel="stylesheet" href="{{asset('assets/templates/system/css/system.css')}}" type="text/css"/>--}}

{{--<link rel="stylesheet" href="{{assets('vendors/iconfonts/mdi/font/css/materialdesignicons.min.css')}}">--}}
{{--<link rel="stylesheet" href="{{assets('vendors/css/vendor.bundle.base.css')}}">--}}
{{--<link rel="stylesheet" href="{{assets('vendors/css/vendor.bundle.addons.css')}}">--}}
<!-- endinject -->
<!-- plugin css for this page -->
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="{{assets('css/vertical-layout-light/style.css')}}">
<link rel="stylesheet" href="{{assets('css/styles.css')}}">
<!-- endinject -->
<link rel="shortcut icon" href="{{assets('images/favicon.png')}}" />

<link href="{{assets('css/materialdesignicons.min.css')}}" media="all" rel="stylesheet" type="text/css" />

<script src="https://cdn.jsdelivr.net/npm/apexcharts?fbclid=IwAR1QD5PHOn47dfkXK_psGOsiTJea8oeW7MaJ7g5fjgY_h57gJyXEVf3zLFc"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{assets('js/tinymce/tinymce.min.js')}}"></script>
<script>
    tinymce.init({
        selector: 'textarea'
    });
</script>
<script type="text/javascript">
    function selectAll(){

        var items=document.getElementsByName('user[]');
        for(var i=0; i<items.length; i++){
            if(items[i].type=='checkbox')
                items[i].checked=true;
        }
    }

    function UnSelectAll(){
        var items=document.getElementsByName('user[]');
        for(var i=0; i<items.length; i++){
            if(items[i].type=='checkbox')
                items[i].checked=false;
        }
    }
</script>
