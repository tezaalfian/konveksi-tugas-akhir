    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="<?php echo $this->uri->segment(2) == 'dashboard' ? 'active': '' ?>">
                        <a href="<?= base_url('admin/dashboard'); ?>"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Transaksi</li><!-- /.menu-title -->
                    <li class="<?php echo $this->uri->segment(2) == 'pemesanan' ? 'active': '' ?>">
                        <a href="#"> <i class="menu-icon fa fa-shopping-cart"></i>Pemesanan</a>
                    </li>
                    <li class="<?php echo $this->uri->segment(2) == 'pengiriman' ? 'active': '' ?>">
                        <a href="#"> <i class="menu-icon fa fa-shipping-fast"></i>Pengiriman</a>
                    </li>
                    <li class="<?php echo $this->uri->segment(2) == 'pembayaran' ? 'active': '' ?>">
                        <a href="#"> <i class="menu-icon fa fa-coins"></i>Pembayaran</a>
                    </li>

                    <li class="menu-title">Master Data</li><!-- /.menu-title -->
                    <li class="<?php echo $this->uri->segment(2) == 'produk' ? 'active': '' ?>">
                        <a href="<?= base_url('admin/produk'); ?>"> <i class="menu-icon fa fa-shopping-bag"></i>Produk</a>
                    </li>
                    <li class="<?php echo $this->uri->segment(2) == 'pelanggan' ? 'active': '' ?>"> 
                        <a href="widgets.html"> <i class="menu-icon fa fa-user"></i>Pelanggan</a>
                    </li>
                    <li class="<?php echo $this->uri->segment(2) == 'pegawai' ? 'active': '' ?>">
                        <a href="widgets.html"> <i class="menu-icon fa fa-user-tie"></i>Pegawai</a>
                    </li>

                    <li class="menu-title">Admin</li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user-cog"></i>Admin</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-user-plus"></i><a href="page-login.html">&nbsp;Tambah Admin</a></li>
                            <li><i class="menu-icon fa fa-user-cog"></i><a href="page-register.html">&nbsp;Daftar Admin</a></li>
                            <li><i class="menu-icon fa fa-unlock-alt"></i><a href="pages-forget.html">&nbsp;Ubah Sandi</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>