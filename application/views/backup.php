<div class="row py-3">
                <div class="col-lg-8">
                    <h4 class="text-dark"><b>Checkout</b></h4>
                    <h5 class="text-dark">Alamat Pengiriman</h5><hr>
                    <form action="<?= base_url('home/pengiriman/'.$pemesanan[0]->id_pemesanan) ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="pemesanan_id" value="<?= $pemesanan[0]->id_pemesanan?>">
                        <div class="form-group">
                            <label for="harga">Label Alamat</label>
                            <input class="form-control" type="text" name="label" placeholder="Alamat Rumah, Alamat Kantor, dll">
                            <div class="invalid-feedback">
                                <?php echo form_error('label')?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="harga">Nama Penerima</label>
                                    <input class="form-control" type="text" name="nama_penerima" value="<?= $pemesanan[0]->username ?>">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nama_penerima')?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="harga">Nomor Telpon Penerima</label>
                                    <input class="form-control" type="text" name="no_hp" value="<?= $pemesanan[0]->no_hp ?>">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('no_hp')?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="pelanggan">Provinsi</label>
                                    <select name="provinsi" id="provinsi" class="form-control"></select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="pelanggan">Kota / Kabupaten</label>
                                    <select name="kota" id="kota" class="form-control"></select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="pelanggan">Kode Pos</label>
                                    <input name="kode_pos" id="kode_pos" class="form-control">
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="pelanggan">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control"></textarea>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('alamat')?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="pelanggan">Kurir</label>
                                    <select id="kurir" class="form-control"></select>
                                    <input type="hidden" name="kurir" id="kurir_paket">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-4 d-flex  align-items-start justify-content-end">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title text-dark"><b>Ringkasan Belanja</b></h5>
                            <div class="row py-2">
                                <div class="col-auto">Jenis Barang :</div>
                                <div class="col text-right"><?= $pemesanan[0]->nama ?></div>
                            </div>
                            <div class="row py-2">
                                <div class="col-auto">Total Harga :&nbsp;(<?= $pemesanan[0]->jumlah ?>&nbsp;item)</div>
                                <div class="col text-right">Rp.&nbsp;<?= $pemesanan[0]->tagihan ?></div>
                            </div>
                            <div class="row py-2">
                                <div class="col-auto">Berat :</div>
                                <div class="col text-right"><?= $pemesanan[0]->berat ?>&nbsp;gram</div>
                            </div>
                            <div class="row">
                                <div class="col-auto">
                                    <label for="ongkir" class="col-form-label">Ongkos Kirim :</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" class="form-control-plaintext" name="ongkir" id="ongkir" readonly>
                                </div>
                            </div><hr>
                            <div class="row">
                                <div class="col-6">
                                    <label for="total_tagihan" class="col-form-label"><b>Total Tagihan :</b></label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control-plaintext" name="total_tagihan" id="total_tagihan" readonly>
                                </div>
                            </div><br>
                            <button class="btn btn-info btn-block" type="submit">Lanjut ke Pembayaran</button>
                        </div>
                    </div>
                    </form>
                </div>