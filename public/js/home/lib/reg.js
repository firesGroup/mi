$( '#username' ).on( 'blur', function(){
    var v = $( this ).val(),
        th = $( this );
    if( v != '' ){
        if( !isNaN( v ) ){
            //判断为数字 则使用手机正则匹配是否为正确的手机号
            var re = /^1[3-9][\d]{9}$/
            if( !re.test( v ) ){
                layer.msg('请输入正确的手机号码', {time: 2000, icon:5});
                th.addClass( 'input-error' );
                $( '#sub' ).attr('disabled','true');
            }else{
                th.attr( 'name','phone' );
                th.removeClass( 'input-error' ).addClass( 'input-success' );
                $( '#sub' ).removeAttr('disabled');
            }
        }else if( v.indexOf('@') >=0 ) {
            var re = /^([a-zA-Z0-9]+[\_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[\_|\-|\.]?)*[a-zA-Z0-9]+.[a-zA-Z]{2,3}$/gi;
            if( !re.test( v ) ){
                layer.msg('请输入正确的邮箱地址', {time: 2000, icon:5});
                th.addClass( 'input-error' );
                $( '#sub' ).attr('disabled','true');
            }else{
                th.attr( 'name', 'email' );
                th.removeClass( 'input-error' ).addClass( 'input-success' );
                $( '#sub' ).removeAttr('disabled');
            }
        }else{
            layer.msg('请输入正确的手机号码或邮箱地址', {time: 2000, icon:5});
            th.addClass( 'input-error' );
            $( '#sub' ).attr('disabled','true');
        }
    }
} );