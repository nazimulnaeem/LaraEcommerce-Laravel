

 <!-- partial:partials/_sidebar.html -->
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="{{ asset('/images/faces/face1.jpg') }}" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">Richard V.Welsh</p>
                  <div>
                    <small class="designation text-muted">Manager</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              <button class="btn btn-success btn-block">New Project
                <i class="mdi mdi-plus"></i>
              </button>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.index') }}">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.product') }}">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Manage Product</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.orders') }}">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Manage Orders</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.categories') }}">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Manage Category</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.brands') }}">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Manage Brand</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.divisions') }}">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Manage Division</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.districts') }}">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Manage District</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.sliders') }}">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Manage Slider</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">
              <form action="{{ route('admin.logout') }}" method="post">
                @csrf
                <input type="submit" value="Logout Now" class="btn btn-danger ml-2">
              </form>
            </a>
          </li>
       
        </ul>
      </nav>