/**
 * Created by wim on 2017/7/5.
 */

//购物车js

$('a.user-name').on('mouseenter', function () {
//                alert($(this));
    $(this).parent().addClass('user-active').children('ul').css({'display': 'block'});

});

$('span.user').on('mouseleave', function () {
//                alert($(this));
    $(this).removeClass('user-active').children('ul').css({'display': 'none'});

});

total = 0;
$('#J_cartListBody').find('.J_cartGoods').each(function (i) {
    // var id = [];
    var t = $(this);

    t.on('click', 'i.J_itemCheckbox', function () {

        if ($(this).hasClass('icon-checkbox-selected')) {

            $(this).removeClass('icon-checkbox-selected');

            if ($('i.J_itemCheckbox').hasClass('icon-checkbox-selected')) {

                $('#J_goCheckout').removeClass('btn-disabled').addClass('btn-primary');

                $('#J_noSelectTip').addClass('hide');

            } else {

                $('#J_goCheckout').removeClass('btn-primary').addClass('btn-disabled');

                $('#J_noSelectTip').removeClass('hide');

            }

            var sum = parseInt($(this).parent().siblings('.col-total').text());

            total -= sum;

            $('em#J_cartTotalPrice').text(total);

        } else {

            $(this).addClass('icon-checkbox-selected');

            if ($('i.J_itemCheckbox').hasClass('icon-checkbox-selected')) {

                $('#J_goCheckout').removeClass('btn-disabled').addClass('btn-primary');
            // .attr('href', "address")
                $('#J_noSelectTip').addClass('hide');

            } else {

                $('#J_goCheckout').removeClass('btn-primary').addClass('btn-disabled');

                $('#J_noSelectTip').removeClass('hide');

            }

//                    console.log($(this).parent().siblings('.col-total').text());
            var sum = parseInt($(this).parent().siblings('.col-total').text());
//                    console.log(sum);

            total += sum;

            $('em#J_cartTotalPrice').text(total);
        }
    });

    t.on('click', 'a.J_plus', function () {
//                    alert(1);
        var num = $(this).prev().val();
//                console.log(num);
        var maxNum = parseInt($(this).prev().attr('data-buylimit'));
//                console.log(maxNum);
        if (num < maxNum) {
            num = parseInt(num) + 1;
//                    console.log(sum);
//                    console.log($('input.J_goodsNum'));
            $(this).prev().attr('value', num);

            var sum = $(this).prev().val();
//                    console.log(sum);
            var price = parseInt($(this).parent().parent().prev().text());
//                    console.log(sum * price + '元');
            $(this).parent().parent().next().text(sum * price + '元');

            if ($(this).parent().parent().siblings('.col-check').children('.J_itemCheckbox').hasClass('icon-checkbox-selected')) {
//                            alert(1);
                var addPrice = parseInt($(this).parent().parent().next().text());
//                            console.log(addPrice);



//                            console.log((sum-1)*price);
                tal = price;
                total = total + tal;
                $('em#J_cartTotalPrice').text(total);
            } else {

                $('em#J_cartTotalPrice').text(0);
            }

        } else {
            num = maxNum;
        }
    });

    t.on('click', 'a.J_minus', function () {
        var num = $(this).next().val();
//                console.log(num);
        if (num > 1) {

            num = parseInt(num) - 1;
//                    console.log($('input.J_goodsNum'));
            $(this).next().attr('value', num);

            var sum = $(this).next().val();
//                    console.log(sum);
            var price = parseInt($(this).parent().parent().prev().text());
//                    console.log(sum * price + '元');
            $(this).parent().parent().next().text(sum * price + '元');

            if ($(this).parent().parent().siblings('.col-check').children('.J_itemCheckbox').hasClass('icon-checkbox-selected')) {
//                            alert(1);
                var addPrice = parseInt($(this).parent().parent().next().text());
//                            console.log(addPrice);



//                            console.log((sum-1)*price);
                var tal = price;
                total = total - tal;
                $('em#J_cartTotalPrice').text(total);
            } else {

                $('em#J_cartTotalPrice').text(0);
            }
        }
    });

    t.on('click', 'a.J_delGoods', function () {
        // console.log(i);
        id = i;

        $('#J_modalAlert').addClass('in').css({'display': 'block'}).attr('aria-hidden', 'true');

    });



});

$('a.close, #J_alertCancel').on('click', function () {
    $('#J_modalAlert').removeClass('in').css({'display': 'none'}).attr('aria-hidden', 'false');
});




$('i#J_selectAll').on('click', function () {
    price = 0;
    if ($(this).hasClass('icon-checkbox-selected')) {
        $(this).removeClass('icon-checkbox-selected');
        $('i.J_itemCheckbox').removeClass('icon-checkbox-selected').attr('data-status', 0);
        $('#J_goCheckout').removeClass('btn-primary').addClass('btn-disabled');
        $('#J_noSelectTip').removeClass('hide');

        $('em#J_cartTotalPrice').text(0);

    } else {
        $(this).addClass('icon-checkbox-selected');
        $('i.J_itemCheckbox').addClass('icon-checkbox-selected').attr('data-status', 1);
        $('#J_goCheckout').removeClass('btn-disabled').addClass('btn-primary');
        $('#J_noSelectTip').addClass('hide');

//                    console.log($('div.item-row').children().siblings('.col-total').text());
//                    console.log($('.col-total').text());

        $('.col-total').not('#xiaoji').each( function (){
            price = parseInt($(this).text()) + price;
        } );
//                    console.log(price);

//                    $('em#J_cartTotalPrice').text(total);

    }
    $('em#J_cartTotalPrice').text(price);
});

$('#J_alertOk').on('click', function () {
    // console.log(id);
    $.ajax({
        url: "/delGoods/" + id,
        type: 'get',
        success: function (data) {

            if (data) {
                $('#' + id + 'item-box').remove();
                $('#J_modalAlert').removeClass('in').css({'display': 'none'}).attr('aria-hidden', 'false');
            }

        },
        dataType: 'json'
    });

});

$('#J_goCheckout').on('click', function () {


        var goodsId = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16];

        // ($('.icon-checkbox-selected').parent().parent().parent().parent().each(function (i) {
        //     // goodsId.push(parseInt($('.icon-checkbox-selected').parent().parent().parent().parent().eq(i).attr('id')));
        //
        // }));

    var i = $('.icon-checkbox-selected').length;

    goodsId = goodsId.slice(0,i);
    // console.log(goodsId);

        $.ajax({
            url: "/goBalance",
            type: 'post',
            data: {'goodsId': goodsId}, headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: function (data) {
                if (data == 1) {
                    window.location.href = "/address/";
                }
            },
            dataType: 'json'
        });


    });

