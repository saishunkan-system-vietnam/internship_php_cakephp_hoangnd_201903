$(document).ready(function () {
    if ($("select[name='producer']") && $("select[name='producer']").attr('add')) {
        getSubproducer();
    }
    $("select[name='producer']").change(function () {
        getSubproducer();
    });
    $("input[name='addimg']").change(function () {
        var fd = new FormData();
        var file = $("input[name='addimg']")[0].files[0];
        var add=($("input[name='addimg']").attr('add'))?'add':'';
        fd.append('file', file);
        $.ajax({
            url: '/shopdienthoai/manager/saveimagesinram',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            cache: false
        }).done(function (rp) {
            alert(rp);
        });
    });
    $("input[name='addimg']").onclose(function (){
        alert('dong');
    });
});
function getSubproducer() {
    csrf = $('meta[name="csrfToken"]').attr('content');
    $.ajax({
        headers: {'X-CSRF-Token': csrf},
        method: 'post',
        url: '/shopdienthoai/manager/getsubproducer',
        data: {producer_id: $("select[name='producer']").val()}
    }).done(function (res) {
        $('select[name="categories_id"]').html(res);
    }).fail(function () {
        alert('load fail');
    });
}