			<?php $this->extend('template'); ?>
			
			<?php $this->section('css'); ?>
			<?php $this->endSection(); ?>
			
			<?php $this->section('content'); ?>
			<div class="clearfix pt-5"></div>
			<div class="pt-5 pb-5">
			    <div class="container">
			        <div class="row justify-content-center">
					    <div class="col-lg-9">
					    	<div class="pt-3 pb-4">
					            <h5>Detail Pesanan</h5>
					            <span class="strip-primary"></span>
					        </div>
					        <div class="pb-3">
					            <div class="section">
					                <div class="card-body">
					                    <h4>Terima Kasih</h4> Pesanan anda berhasil dibuat. Masa berlaku untuk No. Transaksi ini 24 jam, segera lakukan pembayaran agar pesanan segera diproses. <br>
					                    <br> Simpan No. Transaksi anda untuk Cek Status Pesanan!
					                </div>
					            </div>
					        </div>
					        <div class="pb-3">
					            <div class="section">
					                <div class="card-body">
					                    <div class="row">
					                        <div class="col-sm-6">
					                            <div class="pb-4"> Waktu Transaksi
					                            	<h5><?= $orders['date_create']; ?></h5>
					                            </div>
					                            <div class="pb-4"> Metode Pembayaran
					                            	<h5><?= $orders['method']; ?></h5>
					                            </div>
					                            <?php if ($orders['status'] == 'Pending'): ?>
					                            <div class="pb-4"> Kode Pembayaran / No. Virtual Account <br>
					                                <?php if (filter_var($orders['payment_code'], FILTER_VALIDATE_URL)): ?>
					                                <img src="<?= $orders['payment_code']; ?>" width="180" class="mt-3">
					                                <?php else: ?>
					                                <?php if (strlen($orders['payment_code']) > 250): ?>
					                                <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?= $orders['payment_code']; ?>" width="260">
					                                <?php else: ?>
					                                <b class="d-block mt-2"><?= $orders['payment_code']; ?></b>
					                                <?php endif; ?>
					                                <?php endif ?>
					                            </div>
					                            <?php else: ?>
					                            <div class="border p-2 rounded">Status : <b><?= $orders['status']; ?></b></div>
					                            <?php endif ?>
					                        </div>
					                        <div class="col-sm-6">
					                            <div class="pb-4"> No. Transaksi 
					                            	<h5>
					                            		<?= $orders['order_id']; ?> <i class="fa fa-clone pl-2 clip" onclick="copy_trx()" data-clipboard-text="<?= $orders['order_id']; ?>"></i>
					                                </h5>
					                            </div>
					                            <div class="pb-4"> Jumlah Pembayaran 
									<h5>
										Rp. <?= number_format($orders['price'],0,',','.'); ?> <i class="fa fa-clone pl-2 clip" onclick="copy_price()" data-clipboard-text="<?= $orders['price']; ?>"></i>
									</h5>
					                            </div>
					                            <div class="pb-4"> Rincian Pesanan <h5><?= $orders['games']; ?> - <?= $orders['product']; ?></h5>
					                                <p>
					                                <?php 
					                                if ($orders['zone_id'] == 'joki') {
    					                                echo '<i>**Data_Protected**</i>';
    					                            } else {
    					                                echo $orders['user_id'];
    
    					                                if (!empty($orders['zone_id']) AND $orders['zone_id'] !== '1') {
    					                                	echo ' ('.$orders['zone_id'].') ';
    					                                }
    
    					                                if (!empty($orders['nickname'])) {
    					                                	echo $orders['nickname'];
    					                                }
    					                            }
					                                ?>
					                                </p>
					                            </div>
					                        </div>
					                    </div>
					                </div>
					            </div>
					        </div>
					        <?php if ($orders['status'] == 'Pending'): ?>
					        <div class="pb-3">
					            <div class="section">
					                <div class="card-body">
					                    <h4>Informasi Cara Pembayaran</h4>
					                    <?= htmlspecialchars_decode($orders['instruksi']); ?>
					                </div>
					            </div>
					        </div>
					        <?php endif ?>
					    </div>
					</div>
			    </div>
			</div>
			<?php $this->endSection(); ?>
			
			<?php $this->section('js'); ?>
			<script>
				function copy_trx() {
					navigator.clipboard.writeText('<?= $orders['order_id']; ?>');

					Swal.fire('Berhasil', 'No Transaksi berhasil di salin', 'success');
				}
				function copy_price() {
					navigator.clipboard.writeText('<?= $orders['price']; ?>');

					Swal.fire('Berhasil', 'Jumlah Pembayaran berhasil di salin', 'success');
				}
			</script>
			<?php $this->endSection(); ?>
