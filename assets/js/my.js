$('.img').click(function () {
    $id = $(this).attr('data-object-id');
    $url = $(this).attr('data-url');
    $model = $(this).attr('data-model');
    $date = {
        id:$id,
        model:$model
    };
    post($url,$date,tablePopup,failHandler);
});

$('.post').click(function () {
    $id = $(this).getAttributeNode('data-object-id');
    $url = $(this).getAttributeNode('data-url');
    $model = $(this).getAttributeNode('data-model');
    $date = {
        id:$id,
        model:$model
    };

    post($url,$date,tablePopup,failHandler);
});

function over(id) {
    document.getElementById(id).style.display = "block";
}

function out(id) {
    document.getElementById(id).style.display = "none";
}
