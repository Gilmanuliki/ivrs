<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar " style="background-color: rgb(7, 11, 58)">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2 ">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("admin.home") ? "active" : "" }}" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/permissions*") ? "active" : "" }} {{ request()->is("admin/roles*") ? "active" : "" }} {{ request()->is("admin/users*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('visitor_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/stations*") ? "menu-open" : "" }} {{ request()->is("admin/totals*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/stations*") ? "active" : "" }} {{ request()->is("admin/totals*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.visitor.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('station_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.stations.index") }}" class="nav-link {{ request()->is("admin/stations") || request()->is("admin/stations/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-">

                                        </i>
                                        <p>
                                            {{ trans('cruds.station.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('total_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.totals.index") }}" class="nav-link {{ request()->is("admin/totals") || request()->is("admin/totals/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-chalkboard-">

                                        </i>
                                        <p>
                                            {{ trans('cruds.total.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('income_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/sources*") ? "menu-open" : "" }} {{ request()->is("admin/add-incomes*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/sources*") ? "active" : "" }} {{ request()->is("admin/add-incomes*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-hand-holding-usd">

                            </i>
                            <p>
                                {{ trans('cruds.income.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('source_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.sources.index") }}" class="nav-link {{ request()->is("admin/sources") || request()->is("admin/sources/*") ? "active" : "" }}">
                                        <i class="fa-f nav-icon fas fa-briefca">

                                        </i>
                                        <p>
                                            {{ trans('cruds.source.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('add_income_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.add-incomes.index") }}" class="nav-link {{ request()->is("admin/add-incomes") || request()->is("admin/add-incomes/*") ? "active" : "" }}">
                                        <i class="fa-f nav-icon fab fa-cc-amazon-p">

                                        </i>
                                        <p>
                                            {{ trans('cruds.addIncome.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('report_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/income-reports*") ? "menu-open" : "" }} {{ request()->is("admin/visitors-reports*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/income-reports*") ? "active" : "" }} {{ request()->is("admin/visitors-reports*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-book-open">

                            </i>
                            <p>
                                {{ trans('cruds.report.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('income_report_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.income-reports.index") }}" class="nav-link {{ request()->is("admin/income-reports") || request()->is("admin/income-reports/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-invoice-dolr">

                                        </i>
                                        <p>
                                            {{ trans('cruds.incomeReport.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('visitors_report_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.visitors-reports.index") }}" class="nav-link {{ request()->is("admin/visitors-reports") || request()->is("admin/visitors-reports/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-us">

                                        </i>
                                        <p>
                                            {{ trans('cruds.visitorsReport.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>