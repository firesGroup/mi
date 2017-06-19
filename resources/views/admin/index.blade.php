@extends('admin.master.master')

@section('content')

    <div style="width:100px;height:900px;text-align:center"><dt>会员</dt>
        <dd class=""><a href="{{url('admin/member')}}" data-param="index|User">会员列表</a><i class="fa fa-check-square-o"></i></dd>
        <dd class=""><a href="javascript:void(0);" data-param="levelList|User">会员等级</a><i class="fa fa-check-square-o"></i></dd>
        <dd class=""><a href="javascript:void(0);" data-param="recharge|User">充值记录</a><i class="fa fa-check-square-o"></i></dd>
        <dd class=""><a href="javascript:void(0);" data-param="withdrawals|User">提现申请</a><i class="fa fa-check-square-o"></i></dd>
        <dd class=""><a href="javascript:void(0);" data-param="remittance|User">汇款记录</a><i class="fa fa-check-square-o"></i></dd>
    </div>

@endsection