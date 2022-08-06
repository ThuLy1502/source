@extends('user.main')

@section('content')
<section id="popular-product" class="ecommerce">
    <div class="container">
        <!-- Shopping items content -->
        <div class="shopping-content">

            <!-- Block heading two -->
            <div class="block-heading-two text-center">
                <h3><span> TÁC GIẢ </span></h3>
            </div>

            <div class="row">
                @foreach($authors as $author)
                <div class="col-md-3 col-sm-6">
                    <!-- Shopping items -->
                    <div class="shopping-item">
                        <!-- Image -->
                        <a href="{{URL('tac-gia/'.$author->author_id. '.html')}}"><img class="img-responsive"
                                src="{{URL('storage/app/public/uploads-author/'.$author->author_thumb)}}" alt=""
                                width="70%" height="150" /></a>
                        <!-- Shopping item name / Heading -->
                        <h4 class="name-style text-center"><a
                                href="{{URL('tac-gia/'.$author->author_id. '.html')}}">{{ $author->author_name }}</a>
                        </h4>
                        <div class="clearfix"></div>
                        <!-- Shopping item hover block & link -->
                        <div class="item-hover bg-color hidden-xs">
                            <a href="{{URL('tac-gia/'.$author->author_id. '.html')}}"> Chi tiết </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            {{ $authors->links('user.paginate') }}
            <!-- Pagination end-->

        </div>
    </div>
</section>
@endsection