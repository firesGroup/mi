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
        $('div #J_invoiceCompanyCode').removeClass('hide');
    } else {
        $('div #J_invoiceCompanyCode').addClass('hide');
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
    $('div #J_modalEditAddress').css({"display": "block"}).attr('aria-hidden', 'false');
});

$('#closeAddAddress').on('click', function () {
    $('div #J_modalEditAddress').css({"display": "none"}).attr('aria-hidden', 'true');
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
        url: "/chooseAddress",
        type: 'get',
        data: {'id': id},
        success: function (data) {
//                        console.log(data);
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
                    url: "/cities",
                    type: 'get',
                    data: {'id': citiesId},
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

    $('div #J_modalEditAddress').css({"display": "none"}).attr('aria-hidden', 'true');

    var id = "{{$UserAdd->member_id}}";

    $.ajax({
        url: "/addAddress",
        type: 'get',
        data: {'arr': arr, 'id': id},
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

$('input[name=user_phone]').on('blur', function () {
//                console.log($(this).val());

    var phone = $(this).val();

    if (!/^1[3578]\d{9}$/.test(phone)) {
        layer.msg('手机号不符合');
        $(this).after('<p class="msg msg-error">请输入正确的手机号</p>').parent().addClass('form-section-error');
    } else {
        $(this).next().remove().parent().removeClass('form-section-error');
    }

});

$('#J_addressList').on('click', '.J_addressItem', function () {
//                console.log($(this));

    $('div.fr').children('#J_ToPay').remove();
    $(this).addClass('selected').siblings().removeClass('selected');

    $('div.fr').children('#J_checkoutToPay').remove();
    $('div.fr').append('<a href="javascript:;" class="btn btn-primary" id="J_ToPay">立即下单</a>');

    uname = $(this).children('dl').children('dt').text();
    uphone = $(this).children('dl').children('dd.utel').text();
    uaddress = $(this).children('dl').children('dd.uaddress').text();
//                console.log(uphone);
    $('#J_confirmAddress').removeClass('hide').html(uname+'&nbsp;&nbsp;&nbsp;&nbsp;'+uphone+'<br/>'+uaddress);

});

$('#J_addressList').on('click', 'a.J_addressModify', function () {
    if ($('input.input-text').val()) {
        $('div.form-section').addClass('form-section-valid form-section-active');
    }
    $('div #J_modalEditAddress').css({"display": "block"}).attr('aria-hidden', 'false');
});

var test = function () {
    layer.open({
        type: 1
        ,
        title: '发票常见问题'
        ,
        closeBtn: false
        ,
        area: ['600px', '600px']
        ,
        shade: 0.8
        ,
        id: 'LAY_layuipro' //设定一个id，防止重复弹出
        ,
        btn: ['知道啦']
        ,
        moveType: 1 //拖拽模式，0或者1
        ,
        content: '<div style="padding: 50px; line-height: 22px; background-color: white; color: #2F4056; font-weight: 300;"><h4>1.为什么当我选择开具单位抬头发票时，需要填写纳税⼈识别号？纳税⼈识别号哪⾥获取？</h4><p>根据国家税务总局公告2017年第16号第⼀条规定：⾃2017年7⽉1⽇起，购买⽅为企业的，索取增值税普通发票时，应向销售⽅提供纳税⼈识别号或统⼀社会信⽤代码；销售⽅为其开具增值税普通发票时，应在“购买⽅纳税⼈识别号”栏填写购买⽅的纳税⼈识别号或统⼀社会信⽤代码。不符合规定的发票，不得作为税收凭证。纳税⼈识别号有两种⽅式获取：①联系公司财务咨询开票信息；②登录全国组织代码管理中⼼查询。<span style="color:#FF600C">（*⼩米商城⽬前使⽤的纸质发票类型属于通⽤机打发票，不在公告规定范畴内，发票规格本⾝⽆法添加税号，⽆需添加税号即可报销使⽤，所以暂不⽀持纸质发票填写单位企业税号。）</span> </p> <h4>2.非个人用户抬头的电子发票是否需要填写单位名称和纳税人识别号？</h4> <p>需要填写。国家税务总局要求，不符合规定的发票，不得作为税收凭证。</p> <h4>3.填写税号付款后是否可修改？</h4> <p>暂不支持修改，请认真确认后付款。</p> <h4>4.发票的类型有哪些？</h4> <p>⽬前可以开具电⼦增值税普通发票(简称“电⼦发票”)、纸质增值税普通发票(简称“纸质发票”)、以及增值税专⽤发票(简称“专⽤发票”)。</p> <h4>5.发票⾦额包含优惠券、礼品卡吗？</h4> <p>发票⾦额为实际⽀付⾦额，不包含优惠券、礼品卡等。</p> <h4>6.什么是电⼦发票？</h4> <p>电⼦发票是指在购销商品、提供或者接受服务以及从事其他经营活动中，开具、收取的以电⼦⽅式存储的收付款凭证。⼩米⽹开具的电⼦发票均为真实有效的合法发票，与传统纸质发票具有同等法律效⼒，可作为⽤户维权、保修的有效凭据。</p> <h4>7.电⼦发票什么时候开具？</h4> <p>订单在⽤户确认收货，订单完成后开具电⼦发票。</p> <h4>8.电⼦发票在订单完成后，可在哪⾥查看？</h4> <p>发票⾦额为实际⽀付⾦额，不包含优惠券、礼品卡等。</p> <h4>9.电⼦发票如何验证？</h4> <p>电⼦发票下载成功后，客户可凭借电⼦发票上所标⽰的发票代码、发票号码、防伪码在国税局授权的发票服务平台或北京市国家税局⽹站进⾏查询验证。</p> <h4>10.选择开具电⼦发票的顾客申请部分退货，发票如何处理？</h4> <p>开具电⼦发票的订单申请部分退货，原电⼦发票会通过系统⾃动冲红（原电⼦发票显⽰⽆效），并对未发⽣退货的商品重新⾃动开具电⼦发票。如整单退货，则我司将原电⼦发票做冲红处理（原电⼦发票显⽰⽆效）。</p> <h4>11.遇到质量问题，电⼦发票是否能作为维权的依据？</h4> <p>根据北京市国家税务局、北京市地⽅税务局、北京市商务委员会、北京市⼯商⾏政管理局《关于电⼦发票应⽤试点若⼲事项的公告》（2013年第8号）、《关于扩⼤电⼦发票应⽤试点范围若⼲事项的公告》（2013年第18号⽂），电⼦发票与纸质发票具有相同法律效⼒，可作为售后、维权凭据。</p></div>'
        ,
        success: function (layero) {

        }
    });
}
