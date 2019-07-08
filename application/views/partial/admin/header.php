<header id="header" class="header bg-dark">
            <div class="top-left bg-dark">
                <div class="navbar-header bg-dark ">
                    <a class="navbar-brand" href="<?= base_url('admin/dashboard'); ?>"><img src="<?= base_url('vendor_assets/img/logo.png'); ?>" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right bg-dark">
                <div class="header-menu bg-dark">
                    <div class="header-left">
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="image-roll user-avatar rounded-circle" src="<?= base_url('upload/administrator/'.$this->session->userdata('foto'));?>" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <!-- <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a> -->

                            <a class="nav-link" href="<?= base_url('logout'); ?>"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>