      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('AdminLTE/dist/img/cute.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Lina Cantik</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">

          <a href="{{ route ('home.index') }}" class="{{ (request()->segment(1) == '') ? 'nav-link active' : 'nav-link inactive' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>
          <li class="nav-header"></li>
          <li class="nav-item">
            <a href="{{ route ('product-index')}}" class="{{ (request()->segment(1) == 'barang') ? 'nav-link active' : 'nav-link inactive' }}">
                <i class="nav-icon fas fa-warehouse"></i>
                <p>
                  Inventory Master
                  <span class="badge badge-info right"></span>
                </p>
              </a>
            </li>
            <li class="nav-header"></li>
          <li class="nav-item">
          <a href="{{ route ('purchase-index')}}" class="{{ (request()->segment(1) == 'purchase') ? 'nav-link active' : 'nav-link inactive' }}">
              <i class="nav-icon fas fa-download"></i>
              <p>
                Incoming Item
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{ route ('sell-index')}}" class="{{ (request()->segment(1) == 'sell') ? 'nav-link active' : 'nav-link inactive' }}">
                <i class="nav-icon fas fa-upload"></i>
                <p>
                  Outcoming Item
                  <span class="badge badge-info right"></span>
                </p>
              </a>
            </li>
            <li class="nav-header"></li>
            <li class="nav-item">
            <a href="{{ route ('budgeting-index')}}" class="{{ (request()->segment(1) == 'budgeting') ? 'nav-link active' : 'nav-link inactive' }}">
                <i class="nav-icon fas fa-cart-plus"></i>
                <p>
                  Requistions
                  <span class="badge badge-info right"></span>
                </p>
              </a>
            </li>
          <li class="nav-item">
            <a href="{{ route ('laporan-index')}}" class="{{ (request()->segment(1) == 'laporan') ? 'nav-link active' : 'nav-link inactive' }}">
                <i class="nav-icon fas fa-file"></i>
                <p>
                  Report
                  <span class="badge badge-info right"></span>
                </p>
              </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->