$(document).ready(function () {
    if ($("select[name='producer']") && $("select[name='producer']").attr('add')) {
        getSubproducer();
    }
    $("select[name='producer']").change(function () {
        getSubproducer();
    });
    showbtn();

    $("input[name='addimg']").change(function () {
        var fd = new FormData();
        var file = $("input[name='addimg']")[0].files[0];
        var add = ($("input[name='addimg']").attr('add')) ? 'add' : '';
        fd.append('file', file);
        fd.append('add', add);
        $.ajax({
            url: '/shopdienthoai/manager/saveimagesinram',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            cache: false
        }).done(function (rp) {
            $("input[name='addimg']").attr('add', 'add');
            $('#img').html(rp);
            showbtn();            
        });

    });

    $(document).on('click', '.remove-icon', function () {
        var t = $(this).parent('.col-md-3');
        t.remove();
        $.ajax({
            headers: {'X-CSRF-Token': $('meta[name="csrfToken"]').attr('content')},
            url: '/shopdienthoai/manager/removeimageinram',
            type: 'post',
            data: {imgName: $(this).attr('imgName')}
        }).done(function () {
            t.remove();
            showbtn();
        });
    });

    $(document).on('click','button[name="save"]',function (){
         $.ajax({
            headers: {'X-CSRF-Token': $('meta[name="csrfToken"]').attr('content')},
            url: '/shopdienthoai/manager/saveimages',
            type: 'post'
        }).done(function (rp) {
            alert(rp);
        });
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

function showbtn() {
    if ($('#img')) {
        var count = $("#img .image").length;
        if (count > 0) {
            $('input[name="save"]').show();
            $('input[name="removeall"]').show();
        } else {
            $('input[name="save"]').hide();
            $('input[name="removeall"]').hide();
        }
    }
}