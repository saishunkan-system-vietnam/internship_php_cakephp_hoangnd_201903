$(document).ready(function () {
    tabLinkClick(0);
});
var id = $('.tab_link').length;
function addTabClick() {
    var tabEnd = $('.tab_link');
    var tabContentEnd = $('.tab_content');
    var tabCount = tabEnd.length;
    tabEnd.eq(tabCount - 1).after(tabEnd[0].outerHTML);
    $('.tab_link').eq(tabCount).html('Options ' + (id + 1) + tabEnd.children('div')[0].outerHTML);
    $('.tab_link').eq(tabCount).children('div').attr('onclick', 'removeTab(' + (id) + ')');
    $('.tab_link').eq(tabCount).attr('id', 'tabLink' + id);
    $('.tab_link').eq(tabCount).attr('onclick', 'tabLinkClick(' + id + ')');

    tabContentEnd.eq(tabCount - 1).after(tabContentEnd[0].outerHTML);
    $('.tab_content').eq(tabCount).children('h3').text('Option ' + (id + 1) + ' :');
    $('.tab_content').eq(tabCount).attr('id', 'tabContent' + id);

    for (var i = 0, max = tabContentEnd.length; i < max; i++) {
        tabContentEnd.eq(i).css('display', 'none');
        $('.tab_link').eq(i).css('background-color', 'silver');
    }
    tabLinkClick(id);
    id++;
}
function removeTab(id) {
    var tabContent = $('.tab_content');
    if (tabContent.length > 1) {
        var products_id = $('#tabLink' + id).attr('products_id');
        var options = $('#tabLink' + id).attr('options');
        if (products_id && options) {

//            $.ajax({
//                headers: {'X-CSRF-Token': $('meta[name="csrfToken"]').attr('content')},
//                url: '/shopdienthoai/manager/removeoption',
//                type: 'post',
//                data: {products_id: products_id, options: options}
//            }).done(function (rp) {
//                $('#tabLink' + id).remove();
//                $('#tabContent' + id).remove();
//            });
        }
//        var dem = $('.inputOptionRemove').length;
//        var newInputRemove = $('.inputOptionRemove');
//        newInputRemove.eq(0).removeAttr('disabled');
//        $('.inputOptionRemove').eq(dem - 1).after(newInputRemove[0].outerHTML);
//        $('.inputOptionRemove').eq(dem).val(options);
//        newInputRemove.eq(0).attr('disabled', 'disabled');
//        dem++;
        $('#tabLink' + id).remove();
        $('#tabContent' + id).remove();
    }
}
function tabLinkClick(id) {
    var tabContent = $('.tab_content');
    for (var i = 0, max = tabContent.length; i < max; i++) {
        tabContent.eq(i).css('display', 'none');
        $('.tab_link').eq(i).css('background-color', 'silver');
    }
    $('#tabContent' + id).css('display', 'block');
    $('#tabLink' + id).css('background-color', 'white');
}

function validateForm() {
    var name = $('input[name="name"]');
    var quantity = $('input[name="quantity"]');
    var options = $('.options');
    if (name) {
        if (name.val() == "") {
            alert('Product name must be different null.');
            return false;
        }
    }
    if (quantity) {
        if (quantity.val() == "" || quantity.val() < 0) {
            alert('Product quantity must be number greater than or equal to 0.');
            return false;
        }
    }

    for (var i = 0, max = options.length; i < max; i++) {
        if (options.eq(i).val() == "") {
            alert('Product options must be different null.');
            options.eq(i).focus();
            return false;
        }
    }

//    if (options) {
//        for (var i = 0, max = options.length; i < max; i++) {
//            if (options.eq(i).val() == "" || quantity.eq(i).val() < 0) {
//                alert('Product price must be number greater than or equal to 0.');
//                tabLinkClick(i);
//                options.eq(i).css('border', '1px soild red ');
//                options.eq(i).focus();
//                return false;
//            }
//        }
//    }
}