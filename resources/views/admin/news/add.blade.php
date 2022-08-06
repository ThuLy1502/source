@extends('admin.main')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm Tin Tức Mới</h4>

            @include('admin.alert')
            <form class="forms-sample" action="{{URL::to('/admin/news/add')}}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1"> Tiêu đề tin tức </label>
                    <input type="text" class="form-control" name="new_title" placeholder="Nhập tiêu đề tin tức">
                </div>
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <input type="file" name="new_thumb" class="form-control">

                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Mô tả</label>
                    <textarea class="form-control" name="new_description" id="content" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Nội dung</label>
                    <textarea class="form-control" name="new_content" id="content-1" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Kích hoạt</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="new_active" id="active" value="1"
                                checked>
                            Có
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="new_active" id="inactive" value="0">
                            Không
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2"> Thêm tin tức</button>
            </form>
        </div>
    </div>
</div>
@endsection