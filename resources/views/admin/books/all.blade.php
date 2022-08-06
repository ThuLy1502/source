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
                                <th> Hình sách </th>
                                <th> Tên sách </th>
                                <th> Tác giả </th>
                                <th> Danh mục </th>
                                <th> Nhà xuất bản </th>
                                <th> Giá gốc </th>
                                <th> Kích hoạt </th>
                                <th> &nbsp; </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $key => $book)
                            <tr>
                                <td class="text-center"><img
                                        src="{{URL('storage/app/public/uploads-book/'.$book->book_thumb)}}" height="100"
                                        width="100">
                                <td> {{ $book->book_name }} </td>
                                <td>
                                    @foreach($authors as $author)
                                    <?php if ($book->book_id == $author->book_id) { ?>
                                         <span style="line-height: 1.8;"> {{ $author->author_name }} </span></br>
                                    <?php } ?>
                                    @endforeach
                                </td>
                                <td> {{ $book->menu->menu_name }} </td>
                                <td> {{ $book->publisher->publisher_name }} </td>
                                <td> {{ number_format($book->book_price_sale) . ' VNĐ' }} </td>
                                <td class="text-center"> {!! \App\Helpers\Helper::active($book->book_active) !!} </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a type="button" href="{{URL::to('/admin/books/edit/'.$book->book_id)}}"
                                            class="btn btn-success btn-sm btn-icon-text mr-3">

                                            <i class="typcn typcn-edit btn-icon-append"></i>
                                        </a>
                                        <a type="button"
                                            onclick="return confirm('Bạn có chắc muốn xóa Sách này không?')"
                                            href="{{URL::to('/admin/books/destroy/'.$book->book_id)}}"
                                            class="btn btn-danger btn-sm btn-icon-text">

                                            <i class="typcn typcn-trash btn-icon-append"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div style="margin-top: 20px; margin-left: 30px;">
                    <!-- Pagination -->
                    {{ $books->links('admin.paginate') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection