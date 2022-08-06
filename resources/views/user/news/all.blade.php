@extends('user.main')

@section('content')
<div class="container" style="padding: 40px;">
    <!-- blog content -->
    <div class="mainpanel">
        <div class="contentpanel">
            <div id="bloglist" class="row">
                @foreach($news as $new)
                <div class="col-xs-6 col-sm-4 col-md-3">
                    <div class="blog-item">
                        <a href="{{URL('tin-tuc/' . $new->new_id . '.html')}}" class="blog-img">
                            <img src="{{URL('storage/app/public/uploads-new/'.$new->new_thumb)}}" class="img-responsive"
                                alt="" width="100%" height="150" />
                        </a>
                        <div class="blog-details">
                            <h4 class="blog-title">
                                <a href="{{URL('tin-tuc/' . $new->new_id . '.html')}}"> {{ $new->new_title}} </a>
                            </h4>
                            <ul class="blog-meta">
                                <li>Cập nhật ngày: <a href="{{URL('tin-tuc/' . $new->new_id . '.html')}}">
                                        {{ date_format($new->updated_at,"d/m/Y") }} </a></li>
                            </ul>
                            <div class="blog-summary">
                                <p> {!! $new->new_description !!} </p>
                                <a href="{{URL('tin-tuc/' . $new->new_id . '.html')}}" class="btn btn-sm btn-white"> Đọc
                                    thêm </a>
                            </div>
                        </div>
                    </div><!-- blog-item -->
                </div><!-- col-xs-6 -->
                @endforeach
            </div><!-- row -->

            <!-- Pagination -->
            {{ $news->links('user.paginate') }}
            <!-- Pagination end-->

        </div><!-- contentpanel -->

    </div><!-- mainpanel -->
    <!-- end blog content -->
</div>

@endsection