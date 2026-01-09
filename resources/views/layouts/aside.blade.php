
<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <a href="{{ route('dashboard') }}" class="text-primary">
          <img src="{{ asset('front-end/images/logo/logo-dark.png') }}" class="img-fluid logo-lg" alt="Adilisha" style="height: 50px; width: auto; padding: 5px 26px;">
        </a>

      <div class="navbar-content">
        <ul class="pc-navbar">
          <li class="pc-item">
            <a href="{{ route('dashboard') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
              <span class="pc-mtext">Dashboard</span>
            </a>
          </li>

          <li class="pc-item pc-hasmenu">
            <a href="#!" class="pc-link">
              <span class="pc-micon"><i class="ti ti-settings"></i></span>
              <span class="pc-mtext">About</span>
              <span class="pc-arrow"><i class="ti ti-chevron-right"></i></span>
            </a>
            <ul class="pc-submenu">
              <li class="pc-item">
                <a href="{{ route('admin.team.index') }}" class="pc-link">
                  <span class="pc-mtext">Team</span>
                </a>
              </li>
    
            </ul>
          </li>

          <li class="pc-item pc-hasmenu">
            <a href="#!" class="pc-link">
              <span class="pc-micon"><i class="ti ti-settings"></i></span>
              <span class="pc-mtext">Resources</span>
              <span class="pc-arrow"><i class="ti ti-chevron-right"></i></span>
            </a>
            <ul class="pc-submenu">
              <li class="pc-item pc-hasmenu">
                <a href="#!" class="pc-link">
                  <span class="pc-mtext">Gallery</span>
                  <span class="pc-arrow"><i class="ti ti-chevron-right"></i></span>
                </a>
                <ul class="pc-submenu">
                  <li class="pc-item">
                    <a href="{{ route('admin.gallery.index') }}" class="pc-link">
                      <span class="pc-mtext">Photos</span>
                    </a>
                  </li>
                  <li class="pc-item">
                    <a href="{{ route('admin.gallery-category.index') }}" class="pc-link">
                      <span class="pc-mtext">Categories</span>
                    </a>
                  </li>
                </ul>
              </li>
              
            </ul>
          </li>
    
          <li class="pc-item pc-hasmenu">
            <a href="#!" class="pc-link">
              <span class="pc-micon"><i class="ti ti-settings"></i></span>
              <span class="pc-mtext">Settings</span>
              <span class="pc-arrow"><i class="ti ti-chevron-right"></i></span>
            </a>
            <ul class="pc-submenu">
              <li class="pc-item">
                <a href="{{ route('admin.users.index') }}" class="pc-link">
                  <span class="pc-mtext">Users</span>
                </a>
              </li>
            </ul>
          </li>

        </ul>

      </div>
    </div>
  </nav>
