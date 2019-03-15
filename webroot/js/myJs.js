$(document).ready(function () {
     $('#hinhanhmoi').hide();
    if ($('#loaihang').val()& $('#chitietloaihang').attr('title')==='add') {
        if ($('#loaihang').val() !== 'chon') {
            loadlstchitietloaihang();
        }
    }

    $('#loaihang').change(function () {
        loadlstchitietloaihang();
    });
    
    $('#doianhmoi').click(function (){
        $('#doianhmoi').hide();
        $('#anh').hide();
        $('#hinhanhmoi').show();
    })
});
function loadlstchitietloaihang() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_csrfToken"]').val()
        }
    });
    $.ajax({
        method: 'post',
        url: "/logincakephp/Ajax/getlstchitietloaihang",
        data: {loaihang_id: $('#loaihang').val()}
    }).done(function (rp) {
        $('#chitietloaihang').removeAttr('disabled');
        $('#chitietloaihang').html(rp);
    }).fail(function () {
        alert('Fail load');
    });
}
function deletePhone(id) {
    var r = confirm("Xóa mặt hàng?");
    if (r == true) {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_csrfToken"]').val()
        }
        });
        $.ajax({
            method:'post',
            url:"/logincakephp/Ajax/deletemathang",
            data:{mathang_id:id}
        }).done(function (rq){            
             location.reload();
             alert('xóa thành công');
        }).fail(function (rq){
            alert('xóa không thành công');
        });
    }
}