@extends('user.main')

@section('content')
<section id="popular-product" class="ecommerce">
    <div class="container">
        <!-- Shopping items content -->
        <div class="shopping-content">

            <!-- Block heading two -->
            <div class="block-heading-two text-center">
                <h3><span> {{ $title }} </span></h3>
            </div>

            <div class="row">
                @foreach($books as $book)
                <div class="col-md-3 col-sm-6">
                    <!-- Shopping items -->
                    <div class="shopping-item">
                        <!-- Image -->
                        <a href="{{URL('sach/'.$book->book_id. '.html')}}"><img class="img-responsive"
                                src="{{URL('storage/app/public/uploads-book/'.$book->book_thumb)}}" alt="" width="90"
                                height="120" /></a>
                        <!-- Shopping item name / Heading -->
                        <h4 class="name-style"><a
                                href="{{URL('sach/'.$book->book_id. '.html')}}">{{ $book->book_name }}</a><span
                                class="color pull-right">{{ number_format($book->book_price_sale) . ' VNĐ' }}</span>
                        </h4>
                        <div class="clearfix"></div>
                        <!-- Shopping item hover block & link -->
                        <div class="item-hover bg-color hidden-xs">
                            <a href="{{URL('sach/'.$book->book_id. '.html')}}"> Chi tiết </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            {{ $books->links('user.paginate') }}
            <!-- Pagination end-->

        </div>
    </div>
</section>
@endsection