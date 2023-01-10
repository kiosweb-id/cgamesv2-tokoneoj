				<?php $this->extend('admin'); ?>
				
				<?php $this->section('css'); ?>
				<?php $this->endSection(); ?>
				
				<?php $this->section('content'); ?>
				<div class="content">
						    
						   	
						   
						    <div class="row">
                                 <div class="col-lg-10 mx-auto">
                                     <?= alert(); ?>
                                 <!-- Umum -->
                                 <div class="card shadow mb-4">
								    <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Umum</h6>
                                    </div>
									<div class="card-body">
										<form action="" method="POST" enctype="multipart/form-data">
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-dark">Nama Website</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $web['name']; ?>" name="name" autocomplete="off">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-dark">Judul</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $web['title']; ?>" name="title" autocomplete="off">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-dark">Logo</label>
												<div class="col-md-8">
													<img src="<?= base_url(); ?>/assets/images/<?= $web['logo']; ?>" alt="" class="mb-3 rounded" width="70">
													<div class="custom-file">
														<input type="file" class="custom-file-input" id="customFile" name="logo">
														<label class="custom-file-label" for="customFile">Choose file</label>
													</div>
													<small>Ukuran 512 x 512px</small>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-dark">Keywords</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $web['keywords']; ?>" name="keywords" autocomplete="off">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-dark">Deskripsi</label>
												<div class="col-md-8">
													<textarea name="descriptiona"><?= $web['description']; ?></textarea>
												</div>
											</div>
											<div class="text-right">
												<button class="btn text-dark" type="reset">Batal</button>
												<button class="btn btn-primary" type="submit" name="tombol" value="umum">Simpan</button>
											</div>
										</form>
									</div>
								</div>
							    </div>
					    	</div>
					    	
					    	<div class="row">
                                 <div class="col-lg-10 mx-auto">
                                 <!-- Banner -->
                                 <div class="card shadow mb-4">
								    <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Banner</h6>
                                    </div>
									<div class="card-body">
										<form action="" method="POST" enctype="multipart/form-data">
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-dark">Tambah Banner</label>
												<div class="col-md-8">
													<div class="custom-file">
														<input type="file" class="custom-file-input" id="customFile-banner" name="image">
														<label class="custom-file-label" for="customFile-banner">Choose file</label>
													</div>
													<small>Ukuran 1056 × 350px</small>
												</div>
											</div>
											<div class="text-right">
												<button class="btn text-dark" type="reset">Batal</button>
												<button class="btn btn-primary" type="submit" name="tombol" value="banner">Simpan</button>
											</div>
										</form>
									</div>
									<table class="table table-striped table-white m-0">
										<tr>
											<th>No</th>
											<th>Banner</th>
											<th>Action</th>
										</tr>
										<?php $no = 1; foreach ($banner as $loop): ?>
										<tr>
											<td><?= $no++; ?></td>
											<td>
												<img src="<?= base_url(); ?>/assets/images/banner/<?= $loop['image']; ?>" alt="" width="120">
											</td>
											<td>
												<button class="btn btn-danger btn-sm" onclick="hapus('<?= base_url(); ?>/admin/konfigurasi/banner/delete/<?= $loop['id']; ?>');">Hapus</button>
											</td>
										</tr>
										<?php endforeach ?>

										<?php if (count($banner) == 0): ?>
										<tr>
											<td colspan="3" align="center">Tidak ada banner</td>
										</tr>
										<?php endif ?>
									</table>
								</div>
								</div>
							</div>
							
							<div class="row">
                                 <div class="col-lg-10 mx-auto">
                                 <!-- DigiFlazz -->
                                 <div class="card shadow mb-4">
								    <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Digiflazz</h6>
                                    </div>
									<div class="card-body">
										<form action="" method="POST">
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-dark">Username</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $digi['user']; ?>" name="user" autocomplete="off">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-dark">Api Key</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $digi['key']; ?>" name="key" autocomplete="off">
												</div>
											</div>
											<div class="text-right">
												<button class="btn text-dark" type="reset">Batal</button>
												<button class="btn btn-primary" type="submit" name="tombol" value="digi">Simpan</button>
											</div>
										</form>
									</div>
								</div>
								</div>
							</div>
							
							<div class="row">
                                 <div class="col-lg-10 mx-auto">
                                 <!-- ApiGames -->
                                 <div class="card shadow mb-4">
								    <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Api Games</h6>
                                    </div>
									<div class="card-body">
										<form action="" method="POST">
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-dark">Merchant ID</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $ag['merchant']; ?>" name="merchant" autocomplete="off">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-dark">Secret Key</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $ag['secret']; ?>" name="secret" autocomplete="off">
												</div>
											</div>
											<div class="text-right">
												<button class="btn text-dark" type="reset">Batal</button>
												<button class="btn btn-primary" type="submit" name="tombol" value="ag">Simpan</button>
											</div>
										</form>
									</div>
								</div>
								</div>
							</div>
							
							<div class="row">
                                 <div class="col-lg-10 mx-auto">
                                 <!-- Tripay -->
                                 <div class="card shadow mb-4">
								    <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Tripay</h6>
                                    </div>
									<div class="card-body">
										<form action="" method="POST">
											<p>Silahkan arahkan Callback ke <code class="text-primary"><?= base_url(); ?>/sistem/callback/tripay</code></p>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-dark">Api Key</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $tripay['key']; ?>" name="key" autocomplete="off">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-dark">Private Key</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $tripay['private']; ?>" name="private" autocomplete="off">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-dark">Kode Merchant</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $tripay['merchant']; ?>" name="merchant" autocomplete="off">
												</div>
											</div>
											<div class="text-right">
												<button class="btn text-dark" type="reset">Batal</button>
												<button class="btn btn-primary" type="submit" name="tombol" value="tripay">Simpan</button>
											</div>
										</form>
									</div>
								</div>
								</div>
							</div>
							<div class="row">
                                 <div class="col-lg-10 mx-auto">
                                 <!-- Tripay -->
                                 <div class="card shadow mb-4">
								    <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">iPaymu</h6>
                                    </div>
									<div class="card-body">
										<form action="" method="POST">
											<p>Silahkan arahkan Callback ke <code class="text-primary"><?= base_url(); ?>/sistem/callback/ipaymu</code></p>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-dark">Api VA</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $ip['va']; ?>" name="ip_va" autocomplete="off">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-dark">Api Secret</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $ip['secret']; ?>" name="ip_secret" autocomplete="off">
												</div>
											</div>
											<div class="text-right">
												<button class="btn text-dark" type="reset">Batal</button>
												<button class="btn btn-primary" type="submit" name="tombol" value="ip">Simpan</button>
											</div>
										</form>
									</div>
								</div>
								</div>
							</div>
							<div class="row">
                                 <div class="col-lg-10 mx-auto">
                                 <!-- Tripay -->
                                 <div class="card shadow mb-4">
								    <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Cek Mutasi</h6>
                                    </div>
									<div class="card-body">
										<form action="" method="POST">
											<p>Silahkan arahkan Callback ke <code class="text-primary"><?= base_url(); ?>/sistem/callback/cekmutasi</code></p>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-dark">Api Key</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $cm['key']; ?>" name="cm_key" autocomplete="off">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-dark">Api Signature</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $cm['sign']; ?>" name="cm_sign" autocomplete="off">
												</div>
											</div>
											<div class="text-right">
												<button class="btn text-dark" type="reset">Batal</button>
												<button class="btn btn-primary" type="submit" name="tombol" value="cm">Simpan</button>
											</div>
										</form>
									</div>
								</div>
								</div>
							</div>
							
							<div class="row">
                                 <div class="col-lg-10 mx-auto">
                                 <!-- Tripay -->
                                 <div class="card shadow mb-4">
								    <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Cek Validasi</h6>
                                    </div>
									<div class="card-body">
										<form action="" method="POST">
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-dark">Token</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $kiosweb; ?>" name="kiosweb" autocomplete="off">
													<small>Hubungi <a href="https://wa.me/6285293026542">developer</a> untuk mendapatkan token</small>
												</div>
											</div>
											<div class="text-right">
												<button class="btn text-dark" type="reset">Batal</button>
												<button class="btn btn-primary" type="submit" name="tombol" value="kiosweb">Simpan</button>
											</div>
										</form>
									</div>
								</div>
								</div>
							</div>

							<div class="row">
                                 <div class="col-lg-10 mx-auto">
                                 <!-- Tripay -->
                                 <div class="card shadow mb-4">
								    <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Whatsapp Gateway Fonnte</h6>
                                    </div>
									<div class="card-body">
										<form action="" method="POST">
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-dark">Token</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $fonnte_token; ?>" name="fonnte_token" autocomplete="off">
													<small>Hubungi <a href="https://wa.me/6285293026542">developer</a> untuk mendapatkan token</small>
												</div>
											</div>
											<div class="text-right">
												<button class="btn text-dark" type="reset">Batal</button>
												<button class="btn btn-primary" type="submit" name="tombol" value="fonnte">Simpan</button>
											</div>
										</form>
									</div>
								</div>
								</div>
							</div>
							
							<div class="row">
                                 <div class="col-lg-10 mx-auto">
                                 <!-- Social Media -->
                                 <div class="card shadow mb-4">
								    <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Social Media</h6>
                                    </div>
									<div class="card-body">
										<form action="" method="POST">
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-dark">Whatsapp</label>
												<div class="col-md-8">
													<input type="url" class="form-control" value="<?= $sm['wa']; ?>" name="wa" autocomplete="off">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-dark">Instagram</label>
												<div class="col-md-8">
													<input type="url" class="form-control" value="<?= $sm['ig']; ?>" name="ig" autocomplete="off">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-dark">YouTube</label>
												<div class="col-md-8">
													<input type="url" class="form-control" value="<?= $sm['yt']; ?>" name="yt" autocomplete="off">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-dark">Facebook</label>
												<div class="col-md-8">
													<input type="url" class="form-control" value="<?= $sm['fb']; ?>" name="fb" autocomplete="off">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-dark">Twitter</label>
												<div class="col-md-8">
													<input type="url" class="form-control" value="<?= $sm['tw']; ?>" name="tw" autocomplete="off">
												</div>
											</div>
											<div class="text-right">
												<button class="btn text-dark" type="reset">Batal</button>
												<button class="btn btn-primary" type="submit" name="tombol" value="sm">Simpan</button>
											</div>
										</form>
									</div>
								</div>
								</div>
							</div>
							
							<div class="row">
                                 <div class="col-lg-10 mx-auto">
                                 <!-- SKU -->
                                <div class="card shadow mb-4">
								    <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Syarat & Ketentuan</h6>
                                    </div>
									<div class="card-body">
									    
										<form action="" method="POST">
											<div class="form-floating mb-3">
                                              <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="page_sk"><?= $page_sk; ?></textarea>
                                            </div>
											<div class="text-right">
												<button class="btn text-dark" type="reset">Batal</button>
												<button class="btn btn-primary" type="submit" name="tombol" value="sk">Simpan</button>
											</div>
										</form>
									</div>
								</div>
								</div>
							</div>
							
							</div>
						</div>
				</div>
				<?php $this->endSection(); ?>
				
				<?php $this->section('js'); ?>
				<script>
					$("#customFile").on("change", function() {
						var fileName = $(this).val().split("\\").pop();
						$(this).siblings("label[for=customFile]").addClass("selected").html(fileName);
					});

					$("#customFile-banner").on("change", function() {
						var fileName = $(this).val().split("\\").pop();
						$(this).siblings("label[for=customFile-banner]").addClass("selected").html(fileName);
					});

					CKEDITOR.replace('descriptiona');
					CKEDITOR.replace('page_sk', {
						height: 500,
					});
				</script>
				<?php $this->endSection(); ?>