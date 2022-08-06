<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="typcn typcn-th-menu"></span>
            </button>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
                    <img src="{{URL('public/admin/images/avatar.png')}}" alt="profile" />
                    <span class="nav-profile-name">
                    <?php
                        $name = Session::get('admin_name');
                        if($name){
                            echo $name;
                        }
                    ?>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="{{URL::to('/admin/logout')}}">
                        <i class="typcn typcn-eject text-primary"></i>
                        Đăng xuất
                    </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="typcn typcn-th-menu"></span>
        </button>
    </div>
</nav>