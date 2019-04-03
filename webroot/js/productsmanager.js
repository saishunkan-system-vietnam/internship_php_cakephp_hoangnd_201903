$(document).ready(function () {
    showbtn();
    $("input[name='addimg']").change(function () {
        var fd = new FormData();
        var countfile = $("input[name='addimg']")[0].files.length;
        for (var i = 0; i < countfile; i++) {
            var file = $("input[name='addimg']")[0].files[i];
            fd.append('file[]', file);
        }
        var add = ($("input[name='addimg']").attr('add')) ? 'add' : '';
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
    $(document).on('click', '.removeImgInRam', function () {
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
});
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