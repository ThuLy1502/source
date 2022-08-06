@extends('admin.main')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            @include('admin.alert')
            <div class="card">
                <div class="table-responsive pt-3">
                    <table class="table table-striped project-orders-table">
                        <thead>
                            <tr>
                                <th class="ml-5"> Mã </th>
                                <th> Tên danh mục </th>
                                <th> Kích hoạt </th>
                                <th> Ngày cập nhật </th>
                                <th> &nbsp; </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($menus as $key => $menu)
                            <?php
                                $menu_id = '';
                                if ($menu->menu_parent_id == 0) {
                                    $menu_id = $menu->menu_id;
                            ?>
                            <tr>
                                <td> {{ $menu->menu_id }} </td>
                                <td> {{ $menu->menu_name }} </td>
                                <td> {!! \App\Helpers\Helper::active($menu->menu_active) !!} </td>
                                <td> {{ $menu->updated_at }} </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a type="button" href="{{URL::to('/admin/menus/edit/' . $menu->menu_id)}}"
                                            class="btn btn-success btn-sm btn-icon-text mr-3">
                                            Sửa
                                            <i class="typcn typcn-edit btn-icon-append"></i>
                                        </a>

                                        <a type="button"
                                            onclick="return confirm('Bạn có chắc muốn xóa Danh mục này không?')"
                                            href="{{URL::to('/admin/menus/destroy/' . $menu->menu_id)}}"
                                            class="btn btn-danger btn-sm btn-icon-text">
                                            Xóa
                                            <i class="typcn typcn-delete-outline btn-icon-append"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            @foreach($menus as $key => $menu)
                            <?php
                                if ($menu->menu_parent_id == $menu_id) {
                            ?>
                            <tr>
                                <td> {{ $menu->menu_id }} </td>
                                <td> {{ '|--' . $menu->menu_name }} </td>
                                <td> {!! \App\Helpers\Helper::active($menu->menu_active) !!} </td>
                                <td> {{ $menu->updated_at }} </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a type="button" href="{{URL::to('/admin/menus/edit/' . $menu->menu_id)}}"
                                            class="btn btn-success btn-sm btn-icon-text mr-3">
                                            Sửa
                                            <i class="typcn typcn-edit btn-icon-append"></i>
                                        </a>

                                        <a type="button"
                                            onclick="return confirm('Bạn có chắc muốn xóa Danh mục này không?')"
                                            href="{{URL::to('/admin/menus/destroy/' . $menu->menu_id)}}"
                                            class="btn btn-danger btn-sm btn-icon-text">
                                            Xóa
                                            <i class="typcn typcn-delete-outline btn-icon-append"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                            @endforeach
                            <?php
                                }
                            ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div style="margin-top: 20px; margin-left: 30px;">
                <!-- Pagination -->
                {{ $menus->links('admin.paginate') }}
            </div>
        </div>
    </div>
</div>
@endsection