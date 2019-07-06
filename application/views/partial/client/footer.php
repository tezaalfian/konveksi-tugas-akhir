 <!-- Footer -->
 	<div id="sticky-footer" >
 		<footer class="bg-gray">
	        <div class="container py-5">
	            <div class="row">
	              	<div class="col-md-4">
	              		<h5 class="text-white"><b>Tentang Kami</b></h5>
	              			<?php foreach($medsos as $key) :?>
	              				<li style="list-style-type:none;" class="text-white">
	              					<i class="<?= $key->kode ?> py-2"></i>&nbsp;<?= $key->nama ?>
	              				</li>
	              			<?php endforeach; ?>
	              	</div>
	              	<div class="col-md-4">
	              		<h5 class="text-white"><b>Alamat</b></h5>
	              		<li style="list-style-type:none;" class="text-white">
	              			Jl. Merbabu RT.02/10, Kec. Gunung Puyuh, Kota Sukabumi
	              		</li>
	              	</div>
	              	<div class="col-md-4">
	              		<a href="https://goo.gl/maps/E9F5uUKhQ3mjD6DV8" target="_blank"><h5 class="text-white"><b>Peta Lokasi</b></h5></a>
	              		<li style="list-style-type:none;" class="text-white">
	              			Go to Link!
	              		</li>
	              		<!-- <iframe src="https://goo.gl/maps/E9F5uUKhQ3mjD6DV8" width="100%" height="150px"></iframe> -->
	              	</div>
	            </div>
	        </div>
    	</footer>
        <footer class=" bg-dark flex-shrink-0 sticky-bottom">
            <div class="container py-3">
              <strong class="text-white">Copyright &copy;&nbsp;<a href="<?=base_url();?>" class="text-info"><?php echo SITE_NAME ." ". Date('Y') ?></a>.</strong> <span class="text-white">All rights reserved.</span>
            </div>
        </footer>
    </div>