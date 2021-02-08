
            <div class="row mt-3">
                <?php if($nama_peserta != "") :?>
                <!-- data kelas  -->
                    <div class="col-12 mb-3">
                        <ul class="list-group shadow">
                            <li class="list-group-item"><i class="fa fa-user"></i> <?= $nama_peserta?></li>
                            <li class="list-group-item"><i class="fa fa-user-tie"></i> <?= $nama_kpq?></li>
                            <li class="list-group-item"><i class="fa fa-book"></i> <?= $program?></li>
                            <?php foreach ($jadwal as $jadwal) :?>
                                <li class="list-group-item"><i class="fa fa-clock"></i> <?= $jadwal['hari']?>, <?= $jadwal['jam']?></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <!-- data kelas -->

                    <div class="col-12 mb-3" id="listPeserta">
                        <ul class="list-group mb-3">
                            <li class="list-group-item list-group-item-success"><strong>Laporan Peserta</strong></li>
                        </ul>
                        <?php 
                            if($setoran) :
                                foreach ($setoran as $setoran) :?>
                                <ul class="list-group mb-3">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>
                                            <strong><?= date('M(y)', strtotime($setoran['tgl_awal'])) . " - " . date('M(y)', strtotime($setoran['tgl_akhir']))?></strong>
                                        </span>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Pengajar :</b> <?= $setoran['nama_kpq']?> <br>
                                        <b>Program :</b> <?= $setoran['program']?> <br>
                                        <b>Nilai :</b> <?= $setoran['nilai']?> <br>
                                        <b>Catatan :</b> <?= $setoran['keterangan']?> <br>
                                    </li>
                                </ul>
                            <?php endforeach;?>
                        <?php else :?>
                            <div class="alert alert-warning"><i class="fa fa-exclamation-circle text-warning"></i> list laporan kosong</div>
                        <?php endif;?>
                    </div>
                <?php else :?>
                    <div class="col-12">
                        <ul class="list-group mb-3">
                            <li class="list-group-item list-group-item-warning"><i class="fa fa-exclamation-circle"></i> <strong>Data Kosong</strong></li>
                        </ul>
                    </div>
                <?php endif;?>
                
            </div>