@extends('admin.main')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div
                        class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                        <div>
                            <p class="mb-2 text-md-center text-lg-left"> Danh Mục </p>
                            <h1 class="mb-0"> {{ $menus }} </h1>
                        </div>
                        <i class="typcn typcn-th-menu-outline icon-xl text-secondary"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div
                        class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                        <div>
                            <p class="mb-2 text-md-center text-lg-left"> Nhà Xuất Bản</p>
                            <h1 class="mb-0"> {{ $publishers }} </h1>
                        </div>
                        <i class="typcn typcn-chart-bar-outline icon-xl text-secondary"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div
                        class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                        <div>
                            <p class="mb-2 text-md-center text-lg-left"> Tác Giả </p>
                            <h1 class="mb-0"> {{ $authors }} </h1>
                        </div>
                        <i class="typcn typcn-user-outline icon-xl text-secondary"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div
                        class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                        <div>
                            <p class="mb-2 text-md-center text-lg-left"> Sách </p>
                            <h1 class="mb-0"> {{ $books }} </h1>
                        </div>
                        <i class="typcn typcn-book icon-xl text-secondary"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div
                        class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                        <div>
                            <p class="mb-2 text-md-center text-lg-left"> Tin Tức </p>
                            <h1 class="mb-0"> {{ $news }} </h1>
                        </div>
                        <i class="typcn typcn-news icon-xl text-secondary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection