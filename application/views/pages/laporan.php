<div class="row mt-3">
    <?php if($nama_peserta != "") :?>
    <!-- data kelas  -->
        <div class="col-12 mb-3">
            <ul class="list-group shadow">
                <li class="list-group-item list-group-item-warning">Laporan KBM Peserta</li>
                <li class="list-group-item"><i class="fa fa-user"></i> <?= $nama_peserta?></li>
                <li class="list-group-item"><i class="fa fa-user-tie"></i> <?= $nama_kpq?></li>
                <li class="list-group-item"><i class="fa fa-book"></i> <?= $program?></li>
                <?php foreach ($jadwal as $jadwal) :?>
                    <li class="list-group-item"><i class="fa fa-clock"></i> <?= $jadwal['hari']?>, <?= $jadwal['jam']?></li>
                <?php endforeach;?>
                <li class="list-group-item d-flex justify-content-center">
                    <a href="javascript:void(0)" class="btn btn-md btn-secondary mr-1" id="btnTahsin">tahsin</a>
                    <a href="javascript:void(0)" class="btn btn-md btn-secondary mr-1" id="btnTahfidz">tahfidz</a>
                    <a href="javascript:void(0)" class="btn btn-md btn-secondary mr-1" id="btnArab">b.arab</a>
                    
                    <!-- <a href="http://localhost/tar-q/peserta/laporan/tahsin/<?=md5($no_peserta)?>" class="btn btn-md btn-primary mr-1" id="btnTahsin">tahsin</a>
                    <a href="http://localhost/tar-q/peserta/laporan/tahfidz/<?=md5($no_peserta)?>" class="btn btn-md btn-secondary mr-1" id="btnTahfidz">tahfidz</a>
                    <a href="http://localhost/tar-q/peserta/laporan/b_arab/<?=md5($no_peserta)?>" class="btn btn-md btn-secondary mr-1" id="btnArab">b.arab</a> -->
                </li>
            </ul>
        </div>
        <!-- data kelas -->

        <div class="col-12 mb-3" id="listPeserta">
            <div class="laporan-tahfidz">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-success mb-3">Laporan Tahfidz Peserta</li>
                    <?php 
                        if($setoran['tahfidz']) :
                            foreach ($setoran['tahfidz'] as $tahfidz) :?>
                            <ul class="list-group mb-3">
                                <li class="list-group-item"><strong><?= $tahfidz['jenis']?></strong></li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>
                                        <strong><?= date('d-M-Y', strtotime($tahfidz['tgl_setor']))?></strong>
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <b>Pengajar :</b> <?= $tahfidz['nama_kpq']?> <br>
                                    <b>Setoran :</b> <?= substr(str_replace("###", ", ", $tahfidz['setoran']), 0, -2)?> <br> <b>catatan :</b> <?= $tahfidz['keterangan']?>
                                </li>
                            </ul>
                        <?php endforeach;?>
                    <?php else :?>
                        <div class="alert alert-warning"><i class="fa fa-exclamation-circle text-warning"></i> list setoran kosong</div>
                    <?php endif;?>
                </ul>
            </div>
            
            <div class="laporan-tahsin">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-success mb-3">Laporan Tahsin Peserta</li>
                    <?php 
                        if($setoran['tahsin']) :
                            foreach ($setoran['tahsin'] as $tahsin) :?>
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>
                                        <strong><?= date('M(y)', strtotime($tahsin['tgl_awal'])) . " - " . date('M(y)', strtotime($tahsin['tgl_akhir']))?></strong>
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <b>Pengajar :</b> <?= $tahsin['nama_kpq']?> <br>
                                    <b>Program :</b> <?= $tahsin['program']?> <br>
                                    <b>Tilawah :</b> <?= $tahsin['tilawah']?> <br>
                                    <b>Materi :</b> <?= $tahsin['materi']?> <br>
                                    <b>Catatan :</b> <?= $tahsin['keterangan']?> <br>
                                </li>
                            </ul>
                        <?php endforeach;?>
                    <?php else :?>
                        <div class="alert alert-warning"><i class="fa fa-exclamation-circle text-warning"></i> list laporan kosong</div>
                    <?php endif;?>
                </ul>
            </div>
            
            <div class="laporan-barab">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-success mb-3">Laporan Bahasa Arab Peserta</li>
                    <?php 
                        if($setoran['barab']) :
                            foreach ($setoran['barab'] as $barab) :?>
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>
                                        <strong><?= date('M(y)', strtotime($barab['tgl_awal'])) . " - " . date('M(y)', strtotime($barab['tgl_akhir']))?></strong>
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <b>Pengajar :</b> <?= $barab['nama_kpq']?> <br>
                                    <b>Program :</b> <?= $barab['program']?> <br>
                                    <b>Nilai :</b> <?= $barab['nilai']?> <br>
                                    <b>Catatan :</b> <?= $barab['keterangan']?> <br>
                                </li>
                            </ul>
                        <?php endforeach;?>
                    <?php else :?>
                        <div class="alert alert-warning"><i class="fa fa-exclamation-circle text-warning"></i> list laporan kosong</div>
                    <?php endif;?>
                </ul>
            </div>
        </div>
    <?php else :?>
        <div class="col-12">
            <ul class="list-group mb-3">
                <li class="list-group-item list-group-item-warning"><i class="fa fa-exclamation-circle"></i> <strong>Data Kosong</strong></li>
            </ul>
        </div>
    <?php endif;?>    
</div>

<script>
    
    $(".laporan-tahfidz").hide();
    $(".laporan-tahsin").hide();
    $(".laporan-barab").hide();

    $("#btnTahsin").click(function(){
        $("#btnTahsin").addClass("btn-primary")
        $("#btnTahsin").removeClass("btn-secondary")
        $("#btnTahfidz").removeClass("btn-primary")
        $("#btnTahfidz").addClass("btn-secondary")
        $("#btnArab").removeClass("btn-primary")
        $("#btnArab").addClass("btn-secondary")

        $(".laporan-tahsin").show();
        $(".laporan-tahfidz").hide();
        $(".laporan-barab").hide();
    })
    
    $("#btnTahfidz").click(function(){
        $("#btnTahsin").removeClass("btn-primary")
        $("#btnTahsin").addClass("btn-secondary")
        $("#btnTahfidz").addClass("btn-primary")
        $("#btnTahfidz").removeClass("btn-secondary")
        $("#btnArab").removeClass("btn-primary")
        $("#btnArab").addClass("btn-secondary")

        $(".laporan-tahsin").hide();
        $(".laporan-tahfidz").show();
        $(".laporan-barab").hide();
    })
    
    $("#btnArab").click(function(){
        $("#btnTahsin").removeClass("btn-primary")
        $("#btnTahsin").addClass("btn-secondary")
        $("#btnTahfidz").removeClass("btn-primary")
        $("#btnTahfidz").addClass("btn-secondary")
        $("#btnArab").addClass("btn-primary")
        $("#btnArab").removeClass("btn-secondary")

        $(".laporan-tahsin").hide();
        $(".laporan-tahfidz").hide();
        $(".laporan-barab").show();
    })
</script>