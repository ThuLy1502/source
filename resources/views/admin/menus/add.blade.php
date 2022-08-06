@extends('admin.main')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm Danh Mục Mới</h4>

            @include('admin.alert')
            <form class="forms-sample" action="{{URL::to('/admin/menus/add')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Tên danh mục</label>
                    <input type="text" class="form-control" name="menu_name" placeholder="Nhập tên danh mục">
                </div>
                <div class="form-group">
                    <label for="exampleSelectGender">Danh mục cha</label>
                    <select class="form-control" name="menu_parent_id">
                        <option value="0"> Danh mục cha</option>
                        @foreach($menus as $menu)
                        <option value="{{ $menu->menu_id }}">{{ $menu->menu_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Mô tả</label>
                    <textarea class="form-control" name="menu_description" id="content" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Kích hoạt</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="menu_active" id="active" value="1"
                                checked>
                            Có
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="menu_active" id="inactive" value="0">
                            Không
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Tạo danh mục</button>
        </div>
    </div>
</div>
@endsection