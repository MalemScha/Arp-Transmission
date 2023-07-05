<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="{{route('dashboard')}}">
            <div class="logo-img">
               <img height="30" src="{{ asset('img/logo_white.png')}}" class="header-brand-img" > 
            </div>
        </a>
        <div class="sidebar-action"><i class="ik ik-arrow-left-circle"></i></div>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    @php
        $segment1 = request()->segment(1);
        $segment2 = request()->segment(2);
    @endphp
    
    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item {{ ( ($segment1 == 'user' && $segment2 == 'create') || $segment1 == 'users' || $segment1 == 'dashboard' || $segment1 == 'towers' || $segment1 == 'tower' || $segment1 == 'lines' || $segment1 == 'line') ? 'active' : '' }}">
                    <a href="{{route('dashboard')}}"><i class="ik ik-bar-chart-2"></i><span>{{ __('Dashboard')}}</span></a>
                </div>
                <div class="nav-item {{ (  $segment1 == 'threshold' || $segment1 == 'recipients' || ($segment1 == 'email' && $segment2 == 'schedule')  || $segment1 == 'roles'||$segment1 == 'permission' ) ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-settings"></i><span>{{ __('Settings')}}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        @can('manage_user')
                        {{-- <a href="{{url('users')}}" class="menu-item {{ ($segment1 == 'users') ? 'active' : '' }}">{{ __('Users')}}</a>
                        <a href="{{url('user/create')}}" class="menu-item {{ ($segment1 == 'user' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add User')}}</a>
                        <a href="{{url('line')}}" class="menu-item {{ ($segment1 == 'line')  ? 'active' : '' }}">{{ __('Lines')}}</a>
                        <a href="{{url('lines')}}" class="menu-item {{ ($segment1 == 'lines')  ? 'active' : '' }}">{{ __('Add Line')}}</a>
                        <a href="{{url('tower')}}" class="menu-item {{ ($segment1 == 'tower') ? 'active' : '' }}">{{ __('Towers')}}</a>
                        <a href="{{url('towers')}}" class="menu-item {{ ($segment1 == 'towers') ? 'active' : '' }}">{{ __('Add Tower')}}</a> --}}
                        <a href="{{url('threshold')}}" class="menu-item {{ ($segment1 == 'threshold')  ? 'active' : '' }}">{{ __('Threshold')}}</a>
                        <a href="{{url('recipients')}}" class="menu-item {{ ($segment1 == 'recipients')  ? 'active' : '' }}">{{ __('Email Recipients')}}</a>
                        <a href="{{url('email/schedule')}}" class="menu-item {{ ($segment1 == 'email' && $segment2 == 'schedule') ? 'active' : '' }}">{{ __('Email Schedule')}}</a>
                         @endcan
                         <!-- only those have manage_role permission will get access -->
                        @can('manage_roles')
                        <a href="{{url('roles')}}" class="menu-item {{ ($segment1 == 'roles') ? 'active' : '' }}">{{ __('Roles')}}</a>
                        @endcan
                        <!-- only those have manage_permission permission will get access -->
                        @can('manage_permission')
                        <a href="{{url('permission')}}" class="menu-item {{ ($segment1 == 'permission') ? 'active' : '' }}">{{ __('Permission')}}</a>
                        @endcan
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>