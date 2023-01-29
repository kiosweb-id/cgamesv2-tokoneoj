			<?php $this->extend('template'); ?>
			
			<?php $this->section('css'); ?>
			<style>
				#datatable_wrapper {
					padding: 0;
				}
				#datatable_wrapper .row:nth-child(1), #datatable_wrapper .row:nth-child(3) {
					padding: 20px 15px;
				}
				label {
					color: #fff;
				}
			</style>
			<?php $this->endSection(); ?>
			
			<?php $this->section('content'); ?>
			<div class="clearfix pt-5"></div>
			<div class="pt-5 pb-5">
			    <div class="container">
			        <div class="row justify-content-center pt-4">
			            <div class="col-lg-12">
			                <?php foreach ($price as $games): ?>
			                <div class="row mb-4">
			                	<div class="col-md-9">
			                		<div class="card">
										<h5><?= $games['games']; ?></h5>
			                		</div>
									<div class="card-body">
									<table class="table table-white">
			                				<tr>
			                					<th width="10">No.</th>
			                					<th width="50%">Produk</th>
			                					<th width="10%">Harga Member</th>
												<th width="10%">Harga Reseller</th>
												<th width="10%">Harga VIP</th>
			                					<th width="10" class="text-center">Status</th>
			                				</tr>
			                				<?php foreach ($games['product'] as $product): ?>
			                				<tr>
												<td><?= $no++; ?></td>
			                					<td><?= $product['product']; ?></td>
			                					<td>Rp <?= number_format($product['price'],0,',','.'); ?></td>
												<td>Rp <?= number_format($product['reseller_price'],0,',','.'); ?></td>
												<td>Rp <?= number_format($product['vip_price'],0,',','.'); ?></td>
			                					<td align="center"><?= $product['status']; ?></td>
			                				</tr>
			                				<?php endforeach ?>
			                			</table>
									</div>
			                	</div>
			                </div>
			                <?php endforeach ?>
			            </div>
			        </div>
			    </div>
			</div>
			<?php $this->endSection(); ?>
			
			<?php $this->section('js'); ?>
			<script>
				$("#datatable").DataTable({
					ordering: false,
				});
			</script>
			<?php $this->endSection(); ?>