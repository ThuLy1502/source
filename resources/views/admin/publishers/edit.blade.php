@extends('admin.main')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Cập nhật NXB</h4>
            <p class="card-description">
                Mô tả
            </p>
            @include('admin.alert')
            <form class="forms-sample" action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Tên nhà xuất bản</label>
                    <input type="text" class="form-control" name="publisher_name"
                        value="{{ $publisher->publisher_name }}" placeholder="Nhập tên nhà xuất bản">
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Mô tả</label>
                    <textarea class="form-control" name="publisher_description" id="content"
                        rows="4">{{ $publisher->publisher_description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Kích hoạt</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="publisher_active" id="active" value="1"
                                {{ $publisher->publisher_active == 1 ? 'checked=""' : '' }}>
                            Có
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="publisher_active" id="inactive" value="0"
                                {{ $publisher->publisher_active == 0 ? 'checked=""' : '' }}>
                            Không
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Cập nhật NXB</button>
        </div>
    </div>
</div>
@endsection