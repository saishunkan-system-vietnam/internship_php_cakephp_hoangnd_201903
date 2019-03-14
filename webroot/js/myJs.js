$(document).ready(function () {
    if($('#loaihang').val()!=='chon'){
        loadlstchitietloaihang();
    }
    $('#loaihang').change(function () {
        loadlstchitietloaihang();
    });
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