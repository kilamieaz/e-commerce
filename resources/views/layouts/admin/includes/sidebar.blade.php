<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><sup>The-</sup>Cloth</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Sales</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Options:</h6>
                <a class="collapse-item" href="#">Orders</a>
                <a class="collapse-item" href="#">Shipments</a>
            </div>
        </div>
    </li>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Catalog</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Options:</h6>
                <a class="collapse-item" href="{{route('product.index')}}">Products</a>
                <a class="collapse-item" href="{{route('category.index')}}">Categories</a>
                <a class="collapse-item" href="{{route('subcategory.index')}}">Sub Categories</a>
                {{-- <a class="collapse-item" href="{{route('product.index')}}">Atributes</a> --}}
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('user.index')}}" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-users"></i>
            <span>Customers</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Options:</h6>
                <a class="collapse-item" href="{{ route('user.index') }}">Customers</a>
                <a class="collapse-item" href="{{ route('comment.index') }}">Comments</a>
                <a class="collapse-item" href="{{ route('reply.index') }}">Reply</a>
                <a class="collapse-item" href="{{ route('cart.index') }}">Cart</a>
                <a class="collapse-item" href="{{ route('wishlist.index') }}">Wishlist</a>
                <a class="collapse-item" href="{{ route('transaction.index') }}">Transactions</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
            <a class="nav-link" href="tables.html">
              <i class="fas fa-fw fa-cogs"></i>
              <span>Settings</span></a>
          </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    {{-- <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block"> --}}

</ul>