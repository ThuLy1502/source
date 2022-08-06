@extends('admin.main')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Cập nhật Sách </h4>
            <p class="card-description">
                Mô tả
            </p>
            @include('admin.alert')
            <form class="forms-sample" action="" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1"> Tên sách </label>
                    <input type="text" class="form-control" name="book_name" value="{{ $books->book_name }}" placeholder="Nhập tên sách">
                </div>
                <div class="form-group">
                    <label>Hình sách</label>
                    <input type="file" name="book_thumb" value="{{ $books->book_thumb }}" class="form-control">
                    <img src="{{URL::to('storage/app/public/uploads-book/'.$books->book_thumb) }}" height="100" width="100">
                </div>

                <div class="form-group">
                    <label for="exampleSelectGender"> Tác giả </label>
                    <select class="form-control" name="author_id[]" multiple>
                        @foreach($authors as $author)
                        <?php if ($books->book_id ==  $author->book_id) { ?>
                            <option value="{{ $author->author_id }}" disabled="disabled">
                                {{ $author->author_name }}</option>
                        <?php } ?>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleSelectGender"> Danh mục </label>
                    <select class="form-control" name="menu_id">
                        @foreach($menus as $menu)
                        <option value="{{ $menu->menu_id }}"
                            {{ $books->menu_id ==  $menu->menu_id ? 'selected' : ''}}>
                            {{ $menu->menu_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleSelectGender"> Nhà xuất bản </label>
                    <select class="form-control" name="publisher_id">
                        @foreach($publishers as $publisher)
                            <option value="{{ $publisher->publisher_id }}"
                                {{ $books->publisher_id ==  $publisher->publisher_id ? 'selected' : ''}}>
                                {{ $publisher->publisher_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1"> Giá gốc </label>
                    <input type="number" min=0 class="form-control" name="book_price" value="{{ $books->book_price }}" placeholder="Nhập giá gốc">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1"> Giá giảm </label>
                    <input type="number" min=0 class="form-control" name="book_price_sale" value="{{ $books->book_price_sale }}" placeholder="Nhập giá giảm">
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Khổ sách </label>
                    <input type="text" class="form-control" name="book_format" value="{{ $books->book_format }}" placeholder="Nhập khổ sách">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1"> Số trang </label>
                    <input type="number" min=0 class="form-control" name="book_pages" value="{{ $books->book_pages }}" placeholder="Nhập số trang">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1"> Trọng lượng </label>
                    <input type="number" min=0 class="form-control" name="book_weight" value="{{ $books->book_weight }}" placeholder="Nhập trọng lượng">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1"> Năm xuất bản </label>
                    <input type="number" min=0 class="form-control" name="book_publishing_year" value="{{ $books->book_publishing_year }}" placeholder="Nhập năm xuất bản">
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Mô tả</label>
                    <textarea class="form-control" name="book_description" id="content" rows="4">{{ $books->book_description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Kích hoạt</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="book_active" id="active" value="1"
                            {{ $books->book_active == 1 ? 'checked=""' : '' }}>
                            Có
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="book_active" id="inactive" value="0" 
                            {{ $books->book_active == 0 ? 'checked=""' : '' }}>
                            Không
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2"> Cập nhật Sách</button>
            </form>
        </div>
    </div>
</div>
@endsection