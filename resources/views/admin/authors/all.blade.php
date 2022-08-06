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
                                <th class="text-center"> Hình tác giả </th>
                                <th> Tên tác giả </th>
                                <th class="text-center">Kích hoạt </th>
                                <th>Ngày cập nhật </th>
                                <th> &nbsp; </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($authors as $key => $author)
                            <tr>
                                <td class="text-center"><img
                                        src="{{URL('storage/app/public/uploads-author/'.$author->author_thumb)}}"
                                        height="100" width="100">
                                <td> {{ $author->author_name }} </td>
                                <td class="text-center"> {!! \App\Helpers\Helper::active($author->author_active) !!}
                                </td>
                                <td> {{ $author->updated_at }} </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a type="button" href="{{URL::to('/admin/authors/edit/' . $author->author_id)}}"
                                            class="btn btn-success btn-sm btn-icon-text mr-3">
                                            Sửa
                                            <i class="typcn typcn-edit btn-icon-append"></i>
                                        </a>
                                        <a type="button"
                                            onclick="return confirm('Bạn có chắc muốn xóa Tác giả này không?')"
                                            href="{{URL::to('/admin/authors/destroy/' . $author->author_id)}}"
                                            class="btn btn-danger btn-sm btn-icon-text">
                                            Xóa
                                            <i class="typcn typcn-delete-outline btn-icon-append"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div style="margin-top: 20px;">
                <!-- Pagination -->
                {{ $authors->links('admin.paginate') }}
            </div>
        </div>
    </div>
</div>
@endsection