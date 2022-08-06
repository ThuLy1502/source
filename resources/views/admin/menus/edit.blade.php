@extends('admin.main')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Cập nhật Danh Mục</h4>
            <p class="card-description">
                Mô tả
            </p>
            @include('admin.alert')
            <form class="forms-sample" action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Tên danh mục</label>
                    <input type="text" class="form-control" name="menu_name" value="{{ $menu->menu_name }}"
                        placeholder="Nhập tên danh mục">
                </div>
                <div class="form-group">
                    <label for="exampleSelectGender">Danh mục cha</label>
                    <select class="form-control" name="menu_parent_id">
                        <option value="0" {{ $menu->menu_parent_id ==  0 ? 'selected' : ''}}> Danh mục cha</option>
                        @foreach($menus as $menuParent)
                        <option value="{{ $menuParent->menu_id }}"
                            {{ $menu->menu_parent_id ==  $menuParent->menu_id ? 'selected' : ''}}>
                            {{ $menuParent->menu_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Mô tả</label>
                    <textarea class="form-control" name="menu_description" id="content"
                        rows="4">{{ $menu->menu_description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Kích hoạt</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="menu_active" id="active" value="1"
                                {{ $menu->menu_active == 1 ? 'checked=""' : '' }}>
                            Có
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="menu_active" id="inactive" value="0"
                                {{ $menu->menu_active == 0 ? 'checked=""' : '' }}>
                            Không
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Cập nhật Danh mục</button>
        </div>
    </div>
</div>
@endsection