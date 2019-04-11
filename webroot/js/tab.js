$(document).ready(function () {
        tabLinkClick(0);
    });
    var dem = $('.tab_content').length - 1;
    function addTabClick() {
        var tab = $('.tab_link')[dem].outerHTML;
        var tabContent = $('.tab_content');
        $('.tab_link').eq(dem).after(tab);
        $('.tab_link').eq(dem + 1).attr('onclick', 'tabLinkClick(' + (dem + 1) + ')');
        $('.tab_link').eq(dem + 1).text('Options ' + (dem + 1));
        tabContent.eq(dem).after(tabContent[dem].outerHTML);
        $('.tab_content').eq(dem + 1).children('h3').text('Options ' + (dem + 1) + ':');
        for (var i = 0, max = tabContent.length; i < max; i++) {
            tabContent.eq(i).css('display', 'none');
            $('.tab_link').eq(i).css('background-color', 'silver');
        }
        tabLinkClick(dem+1);
        dem++;
    }

    function tabLinkClick(id) {
        var tabContent = $('.tab_content');
        for (var i = 0, max = tabContent.length; i < max; i++) {
            tabContent.eq(i).css('display', 'none');
            $('.tab_link').eq(i).css('background-color', 'silver');
        }
        tabContent.eq(id).css('display', 'block');
        $('.tab_link').eq(id).css('background-color', 'white');
    }

    function validateForm() {
        var name = $('input[name="name"]');
        var quantity = $('input[name="quantity"]');
        var price = $('input[name="price[]"]');
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
        for (var i = 0, max = price.length; i < max; i++) {
            if (price.eq(i).val() == "" || quantity.eq(i).val() < 0) {
                alert('Product price must be number greater than or equal to 0.');
                tabLinkClick(i);
                price.eq(i).css('border', '1px soild red ');
                price.eq(i).focus();
                return false;
            }
        }
    }