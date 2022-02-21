<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
               
                <div class="sidebar-brand-text mx-3"><img src="assets_bootslander/img/jasain_logo2.png" alt="" class="img-fluid"></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>

           
          
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_portofolio') }}">
                    <i class="fas fa-file-alt"></i>
                    <span>Portofolio</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_layanan') }}">
                    <i class="fas fa-hand-holding"></i>
                    <span>Layanan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_team') }}">
                    <i class="fas fa-users"></i>
                    <span>Team</span></a>
            </li>

             <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_galeri') }}">
                    <i class="fas fa-image"></i>
                    <span>Galeri</span></a>
            </li>

             <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_testimoni') }}">
                    <i class="fas fa-comment"></i>
                    <span>Testimoni</span></a>
            </li>

             <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_visi_misi') }}">
                    <i class="fas fa-file"></i>
                    <span>Visi Misi</span></a>
            </li>

            


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

          
        </ul>