/**
 * Created by wim on 2017/7/6.
 */

//收货地址js


$('a.user-name').on('mouseenter', function () {
//                alert($(this));
    $(this).parent().addClass('user-active').children('ul').css({'display': 'block'});

});

$('span.user').on('mouseleave', function () {
//                alert($(this));
    $(this).removeClass('user-active').children('ul').css({'display': 'none'});

});

$('ul li.J_option').on('click', function () {
//                console.log($(this));
    $(this).addClass('selected').siblings().removeClass('selected');
//                console.log($(this).attr('data-invoice-mode'));//获取属性为data-invoice-mode里面的值
    if ($(this).attr('data-invoice-mode') === 'company') {
//                    console.log(1);
        $('div#J_invoiceCompanyCode').removeClass('hide');
    } else {
        $('div#J_invoiceCompanyCode').addClass('hide');
    }

});

$('i.icon-qa ').on('click', function () {
    test();
});

$('.more dd a').on('click', function () {
    test();
});

$('#J_newAddress').on('click', function () {

//                console.log($(this));
//                console.log($('#J_modalEditAddress'));
    if ($('input.input-text').val()) {
        $('div.form-section').addClass('form-section-valid form-section-active');
    }
    $('div#J_modalEditAddress').css({"display": "block"}).attr('aria-hidden', 'false');
});

$('#closeAddAddress').on('click', function () {
    $('div#J_modalEditAddress').css({"display": "none"}).attr('aria-hidden', 'true');
});

$('div.form-section').on('click', function () {
    $(this).addClass('form-section-valid form-section-focus form-section-active');
//                console.log($(this).children('.four_address').length);
    if ($(this).children('.four_address').length) {
        $('#J_selectAddressWrapper').removeClass('hide');
    }

});

$('div.form-section').on('focusout', function () {

//                console.log($(this).children('.input-text').val());
    var value = $(this).children('.input-text').val();
    if (value) {
        $(this).removeClass('form-section-focus');
    } else {
        $(this).removeClass('form-section-valid form-section-focus form-section-active');
    }

});

$('span.select-address-close').on('click', function () {
    $('#J_selectAddressWrapper').addClass('hide');
});

$('div.switch-type').on('click', function () {
//                alert(1);

    $('div.four-address-wrapper').removeClass('hide');
    $('div.search-address-wrapper').addClass('hide');
});

$('ul li.option').on('click', function () {
//                console.log($(this).val());

    var id = $(this).val();
    var address = $(this).text();
//                console.log(address);
//                console.log($('div.select-first'));
    $('div.select-first').addClass('active').text(address).next('.select-item').removeClass('hide').text('选择城市/地区');

    $.ajax({
        url: "chooseAddress",
        type: 'get',
        data: {'_token': '{{csrf_token()}}', 'id': id},
        success: function (data) {
                       console.log(data);
//                        console.log($('ul li.option').parent());
            for (var i = 0; i < data.length; i++) {
//                            console.log(data);
                var arr = data[i];
                $('ul li.option').parent().addClass('hide').next('.options-list').removeClass('hide').append("<li class='J_option cities' value='" + arr.id + "'>" + arr.name + "</li>");
            }

//                         console.log($('ul li.cities'));
            $('ul li.cities').on('click', function () {
//                             alert(1);
//                             console.log($(this).val());

                var citiesId = $(this).val();
                var cities = $(this).text();

                $('div.select-first').next().text(cities).next().removeClass('hide').text('选择区县');

                $.ajax({
                    url: "cities",
                    type: 'get',
                    data: {'_token': '{{csrf_token()}}', 'id': citiesId},
                    success: function (data) {
                        for (var i = 0; i < data.length; i++) {
                            var arr = data[i];

                            $('ul li.option').parent().next().addClass('hide').next().removeClass('hide').append("<li class='J_option area' value='" + arr.id + "'>" + arr.name + "</li>");
                        }

                        $('ul li.area').on('click', function () {
                            var prov = $('div.select-first').text();
                            var city = $('div.select-first').next().text();
                            var area = $(this).text();

                            var addr = prov + city + area;
//                                        console.log(addr);
                            $('#J_selectAddressWrapper').addClass('hide');
                            $('#J_selectAddressTrigger').attr('value', addr);
                        });

                    },
                    dataType: 'json'
                });

            });
        },
        dataType: 'json'
    });


});

$('div.select-first').on('click', function () {
//                alert(1);
    $('ul li.option').parent().removeClass('hide').nextAll('.options-list').addClass('hide').children().remove();
    $(this).text('选择省份/自治区').nextAll().addClass('hide');
});

$('a.btn-gray').on('click', function () {

    $('div#J_modalEditAddress').css({"display": "none"}).attr('aria-hidden', 'true');
});
$('input[name=user_phone]').on('blur', function () {
//                console.log($(this).val());

    var phone = $(this).val();

    if (!/^1[3578]\d{9}$/.test(phone)) {
        layui.use('layer', function () {
            layer.msg('手机号不符合');
            $(this).after('<p class="msg msg-error">请输入正确的手机号</p>').parent().addClass('form-section-error');
            return false;
        });
    } else {
        $(this).next().remove().parent().removeClass('form-section-error');
    }


});


$('#J_editAddressSave').on('click', function () {
    var arr = new Array();
//                console.log($('input.J_addressInput'));
    var input = $('.J_addressInput');
//                console.log(input);
    for (var i = 0; i < input.length; i++) {
        arr.push(input[i].value);
//                    console.log(input[i]);
    }
//                console.log(arr);

    $('div#J_modalEditAddress').css({"display": "none"}).attr('aria-hidden', 'true');

    var id = "{{$UserAdd->member_id}}";

    $.ajax({
        url: "addAddress",
        type: 'get',
        data: {'_token': '{{csrf_token()}}', 'arr': arr, 'id': id},
        success: function (data) {
//                        console.log(1);
            if (data == 1) {
                var buy_user = $('input[name=user_name]').val();
                var buy_phone = $('input[name=user_phone]').val();
                var address = $('input[name=four_address]').val() + $('textarea[name=user_address]').val();

//                            console.log(address);

                $('#J_newAddress').before("<div class='address-item J_addressItem'><dl><dt><span class='tag'></span><em class='uname'>"+buy_user+"</em></dt><dd class='utel'>"+buy_phone+"</dd><dd class='uaddress'>"+address+"</dd></dl><div class='actions'><a href='javascript:;' class='modify J_addressModify'>修改</a></div> </div>");
            }

        },
        dataType: 'json'
    });


});



$('#J_addressList').on('mouseover', '.J_addressItem', function () {
//                console.log($(this));
    $(this).addClass('selected').siblings().removeClass('selected');

    $('div.fr').children('#J_checkoutToPay').text('立即下单');

    var uname = $(this).children('dl').children('dt').text();
    var uphone = $(this).children('dl').children('dd.utel').text();
    var uaddress = $(this).children('dl').children('dd.uaddress').text();
//                console.log(uphone);
//     $('#J_confirmAddress').removeClass('hide').html(uname+'&nbsp;&nbsp;&nbsp;&nbsp;'+uphone+'<br/>'+uaddress);

});

$('#J_addressList').on('mouseout', '.J_addressItem', function () {
//                console.log($(this));
    $(this).removeClass('selected').siblings().removeClass('selected');

    $('div.fr').children('#J_checkoutToPay').text('立即下单');

    var uname = $(this).children('dl').children('dt').text();
    var uphone = $(this).children('dl').children('dd.utel').text();
    var uaddress = $(this).children('dl').children('dd.uaddress').text();
//                console.log(uphone);
//     $('#J_confirmAddress').removeClass('hide').html(uname+'&nbsp;&nbsp;&nbsp;&nbsp;'+uphone+'<br/>'+uaddress);

});

//

$('#J_addressList').on('click', 'a.J_addressModify', function () {
    if ($('input.input-text').val()) {
        $('div.form-section').addClass('form-section-valid form-section-active');
    }
    $('div#J_modalEditAddress').css({"display": "block"}).attr('aria-hidden', 'false');
});



