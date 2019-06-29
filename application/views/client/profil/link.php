<ul class="nav nav-tabs">
					  <li class="nav-item">
					    <a class="nav-link <?= $this->uri->segment(1) == 'profil' && $this->uri->segment(2) == '' ? 'active': '' ?>" href="<?= base_url('profil'); ?>">Profil</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link <?= $this->uri->segment(2) == 'edit' ? 'active': '' ?>" href="<?= base_url('profil/edit'); ?>">Edit Profil</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link <?= $this->uri->segment(2) == 'change_password' ? 'active': '' ?>" href="<?= base_url('profil/change_password'); ?>">Ubah Sandi</a>
					  </li>
					</ul> 