<div id="main-menu" class="main-menu collapse navbar-collapse">
    <ul class="nav navbar-nav">
        <li class="active">
            <a href="{{URL('home')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
        </li>
        <h3 class="menu-title">Menu</h3><!-- /.menu-title -->
        <li class="menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Master</a>
            <ul class="sub-menu children dropdown-menu">
                <li><i class="fa fa-users"></i><a href="{{URL('admin/account')}}">Customer Monitoring</a></li>
            </ul>
        </li>
        <li class="menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Deposit Cash</a>
            <ul class="sub-menu children dropdown-menu">
                <li><i class="fa fa-location-arrow"></i><a href="{{URL('admin/deposit')}}">New Customer</a></li>
                <li><i class="fa fa-location-arrow"></i><a href="{{route('deposit.create')}}">Existing Customer</a></li>
            </ul>
        </li>
    </ul>
</div><!-- /.navbar-collapse -->
