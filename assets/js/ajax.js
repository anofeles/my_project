function post(url,data, successHandler , failHandler){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        dataType: 'json',
        type: "POST",
        data: data,
        success: successHandler,
        error: failHandler
    })
}

function tablePopup(rov) {
/*    var result = JSON.stringify(rov);
    var parse = JSON.parse("[" + result + "]");*/
    // location.reload();
}

function failHandler(jqXHR) {
    // location.reload();
    // var msg = '';
    // if (jqXHR.status === 0) {
    //     msg = 'Not connect.\n Verify Network.';
    // } else if (jqXHR.status == 404) {
    //     msg = 'Requested page not found. [404]';
    // } else if (jqXHR.status == 500) {
    //     msg = 'Internal Server Error [500].';
    // } else if (exception === 'parsererror') {
    //     msg = 'Requested JSON parse failed.';
    // }else if (exception === 'timeout') {
    //     msg = 'Time out error.';
    // } else if (exception === 'abort') {
    //     msg = 'Ajax request aborted.';
    // } else {
    //     msg = 'Uncaught Error.\n' + jqXHR.responseText;
    // }
    // alert(msg);
}
