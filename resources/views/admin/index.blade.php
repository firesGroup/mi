@extends('admin.master.master')

@section('content')
<div class="clearfix">
    <div class="admincp-container-left col-md-1">
        <div id="admincpNavTabs_system" class="nav-tabs">
            <dl>

                <dd class="sub-menu ico-system-4">
                    <ul>
                        <li><a href="{{url('admin/user')}}" data-param="index|Admin">管理员列表</a></li>
                        <li><a href="javascript:void(0);" data-param="role|Admin">角色管理</a></li>
                        <li><a href="javascript:void(0);" data-param="right_list|System">权限资源列表</a></li>
                        <li><a href="javascript:void(0);" data-param="log|Admin">管理员日志</a></li>
                        <li><a href="javascript:void(0);" data-param="supplier|Admin">供应商列表</a></li>
                    </ul>
                </dd>
            </dl>
        </div>
    </div>


    <div class="col-md-11 clearfix">
        <table class="layui-table col-md-11 ">
            @yield('admin')
        </table>

    </div>

</div>
<div class="pagination center-block">
    {{$data->links()}}
</div>


@endsection