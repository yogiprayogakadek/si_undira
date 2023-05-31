<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <div class="navigation-left">
            <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-item-hold" href="{{ route('dashboard.index') }}">
                    <i class="nav-icon i-Bar-Chart"></i>
                    <span class="nav-text">Dashoard</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ Request::is('pasien') ? 'active' : '' }}">
                <a class="nav-item-hold" href="{{ route('pasien.index') }}">
                    <i class="nav-icon i-Administrator"></i>
                    <span class="nav-text">Pasien</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ Request::is('kunjungan') ? 'active' : '' }}">
                <a class="nav-item-hold" href="{{ route('kunjungan.index') }}">
                    <i class="nav-icon i-Medicine"></i>
                    <span class="nav-text">Kunjungan</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ Request::is('retensi/aktif') ? 'active' : (Request::is('retensi/tidak-aktif') ? 'active' : '') }}" data-item="retensi">
                <a class="nav-item-hold" href="javascript:void(0)">
                    <i class="nav-icon i-Hospital"></i>
                    <span class="nav-text">Retensi</span>
                </a>
                <div class="triangle"></div>
            </li>
        </div>
    </div>

    <div class="sidebar-left-secondary rtl-ps-none ps" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <!-- Submenu Dashboards -->
        <ul class="childNav" data-parent="retensi" style="display: block;">
            <li class="nav-item">
                <a class="{{ Request::is('retensi/aktif') ? 'open' : ''}}" href="{{route('retensi.aktif')}}">
                    <i class="nav-icon i-Clock-3"></i>
                    <span class="item-name">Aktif</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Request::is('retensi/tidak-aktif') ? 'open' : ''}}" href="{{route('retensi.tidak-aktif')}}">
                    <i class="nav-icon i-Clock-4"></i>
                    <span class="item-name">Tidak Aktif</span>
                </a>
            </li>
        </ul>

        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
        </div>
    </div>

    <div class="sidebar-overlay"></div>
</div>
