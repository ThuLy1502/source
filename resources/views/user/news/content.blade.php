@extends('user.main')

@section('content')
<div class="container" style="padding: 40px;">
    <div class="contentpanel">
        <div class="row blog-content">
            <div class="col-sm-9">
                <div class="panel panel-default panel-blog">
                    <div class="panel-body-content">
                        <h2 class="blogsingle-title"> {{ $new->new_title }} </h2>

                        <ul class="blog-meta">
                            <li> Cập nhật ngày: <a href="#"> {{ date_format($new->updated_at,"d/m/Y") }} </a></li>
                        </ul>

                        <h4 class="blogsingle-title"> {!! $new->new_description !!} </h4>

                        <div class="blog-img"><img src="{{URL('storage/app/public/uploads-new/'.$new->new_thumb)}}"
                                class="img-responsive" alt="" /></div>
                        <div class="p30"></div>

                        <p> {!! $new->new_content !!} </p>

                    </div><!-- panel-body -->
                </div><!-- panel -->
            </div><!-- col-sm-8 -->

            <div class="col-sm-3">
                <div class="blog-sidebar">
                    <h5 class="subtitle"> Các tin tức khác </h5>
                    <ul class="sidebar-list">
                        @foreach($news as $new)
                            <li>
                                <a href="{{URL('tin-tuc/' . $new->new_id . '.html')}}">
                                    <i class="fa fa-angle-right"></i> 
                                    {{ $new->new_title}} - {{ date_format($new->updated_at,"d/m/Y") }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div><!-- blog-sidebar -->

            </div><!-- col-sm-4 -->

        </div><!-- row -->

    </div>
</div>

@endsection