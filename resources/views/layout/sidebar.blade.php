<div class="sidebar-wrapper">
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text">
            E-COMPLAIN PUSKESMAS DADOK TUNGGUL HITAM
        </a>
    </div>
    <ul class="nav">
        <li class="nav-item  {{ Request::is('/home') ? 'active' : '' }} ">
            <a class="nav-link" href="{{ url('/home') }}">
                <i class="nc-icon nc-chart-pie-35"></i>
                <p>Dashboard</p>
            </a>
        </li>
        @auth
            <li class=" {{ Request::is('ecomplain') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('ecomplain') }}">
                    <i class="nc-icon nc-pin-3"></i>
                    <p>Complain</p>
                </a>
            </li>
            <li class=" {{ Request::is('review-complain') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('review-complain') }}">
                    <i class="nc-icon nc-notes"></i>
                    <p>Review Complain</p>
                </a>
            </li>
        @endauth

    </ul>
</div>
