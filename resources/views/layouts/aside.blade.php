<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <a href="{{ route('dashboard') }}" class="text-primary">
      <img src="{{ asset('front-end/images/logo/logo-dark.png') }}"
           class="img-fluid logo-lg"
           alt="Adilisha"
           style="height: 50px; width: auto; padding: 5px 26px;">
    </a>

    <div class="navbar-content">
      <ul class="pc-navbar">

        <!-- Dashboard -->
        <li class="pc-item">
          <a href="{{ route('dashboard') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
            <span class="pc-mtext">Dashboard</span>
          </a>
        </li>

        <li class="pc-item">
          <a href="{{ route('admin.workshops.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-school"></i></span>
            <span class="pc-mtext">Workshops</span>
          </a>
        </li>

        <!-- About -->
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link">
            <span class="pc-micon"><i class="ti ti-info-circle"></i></span>
            <span class="pc-mtext">About</span>
            <span class="pc-arrow"><i class="ti ti-chevron-right"></i></span>
          </a>
          <ul class="pc-submenu">
            <li class="pc-item">
              <a href="{{ route('admin.team.index') }}" class="pc-link">
                <span class="pc-micon"><i class="ti ti-users"></i></span>
                <span class="pc-mtext">Team</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- Resources -->
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link">
            <span class="pc-micon"><i class="ti ti-book"></i></span>
            <span class="pc-mtext">Resources</span>
            <span class="pc-arrow"><i class="ti ti-chevron-right"></i></span>
          </a>

          <ul class="pc-submenu">

            <!-- Gallery -->
            <li class="pc-item pc-hasmenu">
              <a href="#!" class="pc-link">
                <span class="pc-micon"><i class="ti ti-photo"></i></span>
                <span class="pc-mtext">Gallery</span>
                <span class="pc-arrow"><i class="ti ti-chevron-right"></i></span>
              </a>
              <ul class="pc-submenu">
                <li class="pc-item">
                  <a href="{{ route('admin.gallery.index') }}" class="pc-link">
                    <span class="pc-micon"><i class="ti ti-camera"></i></span>
                    <span class="pc-mtext">Photos</span>
                  </a>
                </li>
                <li class="pc-item">
                  <a href="{{ route('admin.gallery-category.index') }}" class="pc-link">
                    <span class="pc-micon"><i class="ti ti-category"></i></span>
                    <span class="pc-mtext">Categories</span>
                  </a>
                </li>
              </ul>
            </li>

            <li class="pc-item">
              <a href="{{ route('admin.blog.index') }}" class="pc-link">
                <span class="pc-micon"><i class="ti ti-pencil"></i></span>
                <span class="pc-mtext">Blog</span>
              </a>
            </li>

            <li class="pc-item">
              <a href="{{ route('admin.reports.index') }}" class="pc-link">
                <span class="pc-micon"><i class="ti ti-file-text"></i></span>
                <span class="pc-mtext">Reports</span>
              </a>
            </li>

            <li class="pc-item">
              <a href="{{ route('admin.feedback.index') }}" class="pc-link">
                <span class="pc-micon"><i class="ti ti-message-dots"></i></span>
                <span class="pc-mtext">Feedback</span>
              </a>
            </li>

          </ul>
        </li>

        <!-- Impact -->
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link">
            <span class="pc-micon"><i class="ti ti-trophy"></i></span>
            <span class="pc-mtext">Impact</span>
            <span class="pc-arrow"><i class="ti ti-chevron-right"></i></span>
          </a>
          <ul class="pc-submenu">
            <li class="pc-item">
              <a href="{{ route('admin.impact.stories.index') }}" class="pc-link">
                <span class="pc-micon"><i class="ti ti-heart"></i></span>
                <span class="pc-mtext">Success Stories</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- Settings -->
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link">
            <span class="pc-micon"><i class="ti ti-settings"></i></span>
            <span class="pc-mtext">Settings</span>
            <span class="pc-arrow"><i class="ti ti-chevron-right"></i></span>
          </a>
          <ul class="pc-submenu">
            <li class="pc-item">
              <a href="{{ route('admin.users.index') }}" class="pc-link">
                <span class="pc-micon"><i class="ti ti-users"></i></span>
                <span class="pc-mtext">Users</span>
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>
