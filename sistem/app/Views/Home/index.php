            <?php $this->extend('template'); ?>
            
            <?php $this->section('css'); ?>
            <?php $this->endSection(); ?>
            
            <?php $this->section('content'); ?>
            <div class="mb-4" style="padding-top: 110px;">
                <div class="container">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php $no = 0; foreach ($banner as $loop): ?>
                            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $no; ?>" <?= $no == 0 ? 'class="active"' : ''; ?>></li>
                            <?php $no++; endforeach ?>
                        </ol>
                        <div class="carousel-inner" style="border-radius: 10px;">
                            <?php $no = 1; foreach ($banner as $loop): ?>
                            <div class="carousel-item <?= $no == 1 ? 'active' : ''; ?>">
                                <img class="d-block w-100" src="<?= base_url(); ?>/assets/images/banner/<?= $loop['image']; ?>" alt="First slide">
                            </div>
                            <?php $no++; endforeach ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                    </div>
                    <div class="col-md-5">
                        <form action="" method="POST">
                            <div class="input-group">
                                <input type="text" class="form-control" autocomplete="off" placeholder="Mau topup games apa?" name="search" value="<?= $search; ?>">
                                <button class="btn btn-primary" type="submit">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <?php foreach ($games as $game): ?>
            <div class="container pt-4 pb-4" id="<?= url_title($game['category'], '-', true); ?>">
                <div class="row">
                    <div class="col-12 col-md-3 category">
                        <a id="<?= url_title($game['category'], '-', true); ?>" class="cursor-pointer active" onclick="select_tipe('mobile-legends');">
                            <img src="https://javagamestore.com/assets/tipe/1671701360_204521123dc06d4c9df8.png" alt="">
                            <?= $game['category']; ?> 
                        </a>
                    </div>
                </div>
            </div>
            <div class="pb-4">
                <div class="container">
                    <div class="row mb-3">
                        <?php foreach ($game['games'] as $loop): ?>
                        <?php if ($loop['status'] == 'On'): ?>
                            <div class="col-md-3 col-4 text-center">
                                <a href="<?= base_url(); ?>/games/<?= $loop['slug']; ?>" class="text-decoration-none mb-4 d-block">
                                    <img src="<?= base_url(); ?>/assets/images/games/<?= $loop['image']; ?>" alt="" class="w-100 rounded">
                                        <img src="<?= base_url(); ?>/assets/waves.png" alt="" class="w-100" style="margin-top: -30px;">
                                    <div style="background: var(--warna_2);margin-top: -22px;min-height: 64px;" class="rounded-bottom text-center py-2">
                                        <p class="mb-0 fs-14"> <?= $loop['games']; ?> </p>
                                    </div>
                                </a>
                            </div>
                        <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
            
            <!-- Modal PopUp -->
            
            <div class="modal fade" id="modal-popup" tabindex="-1" aria-labelledby="modal-popupLabel" aria-modal="true" role="dialog" style="display: block;">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 500px;">
                    <div class="modal-content" style="background: var(--warna_5);">
                    <div class="modal-body">
                        <p><img width="100%" alt="" src="https://i.postimg.cc/t43W42yt/cgames.png" style="height:100%; width:100%"></p>
                        <a id="promoClose" value="Close" href="#">×</a>
                    </div>
                    </div>
                </div>
            </div>
            
            <!-- End Modal PopUp -->
            
            <?php $this->endSection(); ?>
            
            <?php $this->section('js'); ?>
            <?php $this->endSection(); ?>