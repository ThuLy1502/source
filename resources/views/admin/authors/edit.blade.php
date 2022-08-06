@extends('admin.main')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Cập Nhật Tác Giả Mới</h4>

            @include('admin.alert')
            <form class="forms-sample" action="" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1"> Tên tác giả </label>
                    <input type="text" class="form-control" name="author_name" value="{{ $authors->author_name }}" placeholder="Nhập tên tác giả">
                </div>
                <div class="form-group">
                    <label>Hình tác giả</label>
                    <input type="file" name="author_thumb" value="{{ $authors->author_thumb }}" class="form-control">
                    <img src="{{URL::to('storage/app/public/uploads-author/' . $authors->author_thumb) }}" height="100" width="100">
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Mô tả</label>
                    <textarea class="form-control" name="author_description" id="content" rows="4">{{ $authors->author_description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Kích hoạt</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="author_active" id="active" value="1"
                            {{ $authors->author_active == 1 ? 'checked=""' : '' }}>
                            Có
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="author_active" id="inactive" value="0" 
                            {{ $authors->author_active == 0 ? 'checked=""' : '' }}>
                            Không
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2"> Cập nhật tác giả</button>
            </form>
        </div>
    </div>
</div>
@endsection