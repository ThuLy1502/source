<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{URL::to('/admin/main')}}">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#menus" aria-expanded="false" aria-controls="ui-basic">
            <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Danh Mục</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="menus">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('/admin/menus/add')}}">Thêm Danh mục</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('/admin/menus/all')}}">Danh sách Danh mục</a></li>
              </ul>
            </div>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#publishers" aria-expanded="false" aria-controls="tables">
              <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Nhà Xuất Bản</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="publishers">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('/admin/publishers/add')}}">Thêm NXB  </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('/admin/publishers/all')}}">Danh sách NXB</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#authors" aria-expanded="false" aria-controls="icons">
              <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title"> Tác giả </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="authors">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('/admin/authors/add')}}"> Thêm Tác giả </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('/admin/authors/all')}}"> Danh sách Tác giả </a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#books" aria-expanded="false" aria-controls="auth">
            <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Sách</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="books">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('/admin/books/add')}}"> Thêm Sách </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('/admin/books/all')}}"> Danh sách Sách </a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#news" aria-expanded="false" aria-controls="error">
            <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Tin Tức</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="news">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('/admin/news/add')}}"> Thêm Tin tức </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('/admin/news/all')}}"> Danh sách Tin tức </a></li>
              </ul>
            </div>
          </li>

        </ul>
      </nav>