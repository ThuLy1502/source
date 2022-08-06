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
                                <th class="ml-5">Mã</th>
                                <th>Tên NXB </th>
                                <th class="text-center">Kích hoạt </th>
                                <th>Ngày cập nhật </th>
                                <th> &nbsp; </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($publishers as $key => $pub)
                            <tr>
                                <td> {{ $pub->publisher_id }}</td>
                                <td> {{ $pub->publisher_name }} </td>
                                <td class="text-center"> {!! \App\Helpers\Helper::active($pub->publisher_active) !!}
                                </td>
                                <td> {{ $pub->updated_at }} </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a type="button"
                                            href="{{URL::to('/admin/publishers/edit/' . $pub->publisher_id)}}"
                                            class="btn btn-success btn-sm btn-icon-text mr-3">
                                            Sửa
                                            <i class="typcn typcn-edit btn-icon-append"></i>
                                        </a>
                                        <a type="button" onclick="return confirm('Bạn có chắc muốn xóa NXB này không?')"
                                            href="{{URL::to('/admin/publishers/destroy/' . $pub->publisher_id)}}"
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
                {{ $publishers->links('admin.paginate') }}
            </div>
        </div>
    </div>
</div>
@endsection