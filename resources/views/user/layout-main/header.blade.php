<!-- Header One Starts -->
<div class="header-1">
    <!-- Container -->
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <!-- Logo section -->
                <div class="logo">
                    <h1><a href="{{URL('/')}}"><i class="fa fa-book"></i> Book Website</a></h1>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-2 col-sm-5 col-sm-offset-3 hidden-xs">
                <!-- Search Form -->
                <div class="header-search">
                    <form class="pt-3" action="{{URL::to('/tim-kiem')}}"  method="GET">
                        <!-- Input Group -->
                        <div class="input-group">
                            <input type="text" id="keyword_id" name="keyword" class="form-control"
                                placeholder="Nhập từ khóa muốn tìm">
                            <span class="input-group-btn">
                                <button class="btn btn-color" type="submit">Tìm kiếm</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation starts -->

    <div class="navi">
        <div class="container">
            <div class="navy">
                <ul>
                    <!-- Main menu -->
                    <li>
                        <a href="{{URL('trang-chu.html')}}"> Trang Chủ </a>
                    </li>

                    <li>
                        <a href="{{URL('tu-sach.html')}}"> Tủ Sách </a>
                    </li>

                    <li>
                        <a href="{{URL('tac-gia.html')}}"> Tác giả </a>
                    </li>

                    <li>
                        <a href="#"> Danh Mục </a>
                        <ul>
                            @foreach($menus as $key => $menu)
                            <?php
                                $menu_id = '';
                                if ($menu->menu_parent_id == 0) {
                                    $menu_id = $menu->menu_id;
                            ?>
                            <li><a href="{{URL('danh-muc/'. $menu->menu_id .'.html')}}"> {{ $menu->menu_name }} </a>

                                @foreach($menus as $key => $menu)
                                <?php if ($menu->menu_parent_id == $menu_id) { ?>
                                <ul>
                                    @foreach($menus as $key => $menu)
                                    <?php if ($menu->menu_parent_id == $menu_id) { ?>
                                    <li>
                                        <a href="{{URL('danh-muc/'. $menu->menu_id .'.html')}}">
                                            {{ $menu->menu_name }}</a>
                                    </li>
                                    <?php } ?>
                                    @endforeach
                                </ul>
                                <?php } ?>
                                @endforeach
                            </li>
                            <?php } ?>
                            @endforeach
                        </ul>
                    </li>

                    <li><a href="#"> Nhà Xuất Bản </a>
                        <ul>
                            @foreach($publishers as $publisher)
                            <li><a href="{{URL('nha-xuat-ban/'.$publisher->publisher_id.'.html')}}"><span>
                                        {{ $publisher->publisher_name }} </span></a></li>
                            @endforeach
                        </ul>
                    </li>

                    <li>
                        <a href="{{URL('tin-tuc.html')}}"> Tin Tức</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- <script type="text/javascript">
    $('#keyword').keyup(function() {
        var query = $(this).val();
        if (query != '') {
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: "{{url('/autocomplete-ajax')}}",
                method: "POST",
                data: {
                    query: query,
                    _token: _token
                },
                success: function(data) {
                    $('#search_ajax').fadeIn();
                    $('#search_ajax').html(data);
                }
            });
        } else {
            $('#search_ajax').fadeOut();
        }
    });

    $(document).on('click', '.li_search_ajax', function() {
        $('#keyword').val($(this).text());
        $('#search_ajax').fadeOut();
    });
</script> -->