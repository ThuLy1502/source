@extends('admin.main')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm NXB Mới</h4>

            @include('admin.alert')
            <form class="forms-sample" action="{{URL::to('/admin/publishers/add')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Tên nhà xuất bản</label>
                    <input type="text" class="form-control" name="publisher_name" placeholder="Nhập tên nhà xuất bản">
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Mô tả</label>
                    <textarea class="form-control" name="publisher_description" id="content" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Kích hoạt</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="publisher_active" id="active" value="1"
                                checked>
                            Có
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="publisher_active" id="inactive"
                                value="0">
                            Không
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Tạo danh mục</button>
        </div>
    </div>
</div>
@endsection