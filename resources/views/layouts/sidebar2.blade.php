<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <h3>DASHBOARD</h3>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
            <span class="hide-menu">Home</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{route ('dashboard')}}" aria-expanded="false">
              <span>
                <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6">hayoo</iconify-icon>
              </span>
              <span class="hide-menu">Dashboard</span>
            </a>
          </li>
          {{-- <li class="sidebar-item">
            <a class="sidebar-link" href="{{route ('barang.index')}}" aria-expanded="false">
              <span>
                <iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
              </span>
              <span class="hide-menu">Barang</span>
            </a>
          </li> --}}
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{route('kasir.transaksi.new')}}" aria-expanded="false">
              <span>
                <iconify-icon icon="solar:text-field-focus-bold-duotone" class="fs-6"></iconify-icon>
              </span>
              <span class="hide-menu">Transaksi</span>
            </a>
        </li>
          {{-- <li class="nav-small-cap">
            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-6" class="fs-6"></iconify-icon>
            <span class="hide-menu">AUTH</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
              <span>
                <iconify-icon icon="solar:login-3-bold-duotone" class="fs-6"></iconify-icon>
              </span>
              <span class="hide-menu">Login</span>
            </a>
          </li>
          <li class="sidebar-item">
             <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
              <span>
                <iconify-icon icon="solar:user-plus-rounded-bold-duotone" class="fs-6"></iconify-icon>
              </span>
              <span class="hide-menu">Register</span>
            </a> --}}
        <div class="unlimited-access hide-menu bg-primary-subtle position-relative mb-7 mt-7 rounded-3">
          <div class="d-flex">
            <div class="unlimited-access-title me-3">
              <h6 class="fw-semibold fs-4 mb-6 text-dark w-75">Letsgo</h6>
              <a href="#" target="_blank"
                class="btn btn-primary fs-2 fw-semibold lh-sm">Buy Pro</a>
            </div>
            <div class="unlimited-access-img">
              <img src="../assets/images/backgrounds/rocket.png" alt="" class="img-fluid">
            </div>
          </div>
        </div>
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>
  <!--  Sidebar End -->