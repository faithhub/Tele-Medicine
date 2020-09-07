<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  @if (Auth::user()->role == 'Admin')
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
          <a class="navbar-brand" href="javascript:void(0)">
            <img src="{{ asset('images/logo/'.$logo2)}}" class="navbar-brand-img" alt="...">
          </a>
        </div>
        <div class="navbar-inner">
          <!-- Collapse -->
          <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Nav items -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" href="{{ url('admin/index') }}">
                  <i class="ni ni-tv-2 text-primary"></i>
                  <span class="nav-link-text">Dashboard</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/prescriptions') }}">
                  <i class="ni ni-planet text-orange"></i>
                  <span class="nav-link-text">Prescription</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/appointments') }}">
                  <i class="ni ni-pin-3 text-primary"></i>
                  <span class="nav-link-text">Appointment</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/doctors')}}">
                  <i class="ni ni-single-02 text-yellow"></i>
                  <span class="nav-link-text">All Doctors</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/patients')}}">
                  <i class="ni ni-single-02 text-yellow"></i>
                  <span class="nav-link-text">All Patients</span>
                </a>
              </li>             
              <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/payments') }}">
                  <i class="ni ni-money-coins text-default"></i>
                  <span class="nav-link-text">Payment History</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/web_settings') }}">
                  <i class="ni ni-bullet-list-67 text-default"></i>
                  <span class="nav-link-text">Web Settings</span>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link" href="tables.html">
                  <i class="ni ni-bullet-list-67 text-default"></i>
                  <span class="nav-link-text">My Profile</span>
                </a>
              </li> --}}
              <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/password') }}">
                  <i class="ni ni-circle-08 text-pink"></i>
                  <span class="nav-link-text">Change Password</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('logout')}}">
                  <i class="ni ni-send text-dark"></i>
                  <span class="nav-link-text">Logout</span>
                </a>
              </li>
            </ul>
            <!-- Divider -->
            {{-- <hr class="my-3"> --}}
            <!-- Heading -->
            {{-- <h6 class="navbar-heading p-0 text-muted">
              <span class="docs-normal">Documentation</span>
            </h6> --}}
            <!-- Navigation -->
            {{-- <ul class="navbar-nav mb-md-3">
              <li class="nav-item">
                <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html" target="_blank">
                  <i class="ni ni-spaceship"></i>
                  <span class="nav-link-text">Getting started</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html" target="_blank">
                  <i class="ni ni-palette"></i>
                  <span class="nav-link-text">Foundation</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html" target="_blank">
                  <i class="ni ni-ui-04"></i>
                  <span class="nav-link-text">Components</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/plugins/charts.html" target="_blank">
                  <i class="ni ni-chart-pie-35"></i>
                  <span class="nav-link-text">Plugins</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active active-pro" href="upgrade.html">
                  <i class="ni ni-send text-dark"></i>
                  <span class="nav-link-text">Upgrade to PRO</span>
                </a>
              </li>
            </ul> --}}
          </div>
        </div>
      </div>
        
    @endif
  </nav>