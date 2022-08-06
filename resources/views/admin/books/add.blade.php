@extends('admin.main')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm Sách Mới</h4>

            @include('admin.alert')
            <form class="forms-sample" action="{{URL::to('/admin/books/add')}}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1"> Tên sách </label>
                    <input type="text" class="form-control" name="book_name" placeholder="Nhập tên sách">
                </div>
                <div class="form-group">
                    <label>Hình sách</label>
                    <input type="file" name="book_thumb" id="upload" class="form-control">
                </div>

                <div class="form-group">
                    <label for="exampleSelectGender"> Tác giả </label>
                    <select class="form-control" name="author_id[]" multiple>
                        @foreach($authors as $author)
                        <option value="{{ $author->author_id }}">{{ $author->author_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleSelectGender"> Danh mục </label>
                    <select class="form-control" name="menu_id">
                        @foreach($menus as $menu)
                        <option value="{{ $menu->menu_id }}">{{ $menu->menu_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleSelectGender"> Nhà xuất bản </label>
                    <select class="form-control" name="publisher_id">
                        @foreach($publishers as $publisher)
                        <option value="{{ $publisher->publisher_id }}">{{ $publisher->publisher_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Giá gốc </label>
                    <input type="number" min=0 class="form-control" name="book_price" placeholder="Giá gốc">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1"> Giá giảm </label>
                    <input type="number" min=0 class="form-control" name="book_price_sale" placeholder="Giá giảm">
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Khổ sách </label>
                    <input type="text" class="form-control" name="book_format" placeholder="Khổ sách">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1"> Số trang </label>
                    <input type="number" min=0 class="form-control" name="book_pages" placeholder="Số trang">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1"> Trọng lượng </label>
                    <input type="number" min=0 class="form-control" name="book_weight" placeholder="Trọng lượng">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1"> Năm xuất bản </label>
                    <input type="number" min=0 class="form-control" name="book_publishing_year"
                        placeholder="Năm xuất bản">
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">Mô tả</label>
                    <textarea class="form-control" name="book_description" id="content" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Kích hoạt</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="book_active" id="active" value="1"
                                checked>
                            Có
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="book_active" id="inactive" value="0">
                            Không
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2"> Thêm sách</button>
            </form>
        </div>
    </div>
</div>
@endsection