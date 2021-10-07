    <?php if ($this->session->userdata('role') != 'administrator' && $this->session->userdata('role') != 'rw' ): ?>
        <a href="https://wa.me/6283140610636" style="position: fixed; bottom: 100px; right: 20px; border-radius: 50%; width: 65px; height: 65px; font-size: 26pt" class="btn btn-success"><i class="fa fa-whatsapp"></i></a>
    <?php endif ?>
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>
    <script>
    	$(document).ready( function () {
    		$('#table_data').DataTable();
    	});
    </script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            function filterData () {
                $('#example').DataTable().search(
                    $('#tgl_laporan').val()
                    ).draw();
            }
            $('#tgl_laporan').on('change', function () {
                filterData();
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.selectnamapengaju').select2();
        });
    </script>
    <script type="text/javascript">
    	$("#jenis_surat").change(function() {
    		if ($(this).val() == "surat kematian") {
    			$('#kematian').show();
    			$('#domisili').hide();
    			$('#dispensasi').hide();
    			$('#nama_yang_meninggal').attr('required', '');
    			$('#nama_yang_meninggal').attr('data-error', 'This field is required.');
    			$('#tanggal_kematian').attr('required', '');
    			$('#tanggal_kematian').attr('data-error', 'This field is required.');
    			$('#faktor_kematian').attr('required', '');
    			$('#faktor_kematian').attr('data-error', 'This field is required.');
    			$('#tanggal_dispensasi').removeAttr('required');
    			$('#tanggal_dispensasi').removeAttr('data-error');
    			$('#sampai_tanggal_dispensasi').removeAttr('required');
    			$('#sampai_tanggal_dispensasi').removeAttr('data-error');
    			$('#jumlah_hari').removeAttr('required');
    			$('#jumlah_hari').removeAttr('data-error');
    			$('#alasan_dispen').removeAttr('required');
    			$('#alasan_dispen').removeAttr('data-error');
    		} else if ($(this).val() == "surat dispensasi"){
    			$('#kematian').hide();
    			$('#domisili').hide();
    			$('#dispensasi').show();
    			$('#tanggal_dispensasi').attr('required', '');
    			$('#tanggal_dispensasi').attr('data-error', 'This field is required.');
    			$('#sampai_tanggal_dispensasi').attr('required', '');
    			$('#sampai_tanggal_dispensasi').attr('data-error', 'This field is required.');
    			$('#jumlah_hari').attr('required', '');
    			$('#jumlah_hari').attr('data-error', 'This field is required.');
    			$('#alasan_dispen').attr('required', '');
    			$('#alasan_dispen').attr('data-error', 'This field is required.');
    			$('#nama_yang_meninggal').removeAttr('required');
    			$('#nama_yang_meninggal').removeAttr('data-error');
    			$('#tanggal_kematian').removeAttr('required');
    			$('#tanggal_kematian').removeAttr('data-error');
    			$('#faktor_kematian').removeAttr('required');
    			$('#faktor_kematian').removeAttr('data-error');
    		} else if ($(this).val() == "surat domisili"){
    			$('#kematian').hide();
    			$('#domisili').show();
    			$('#dispensasi').hide();

    			$('#nama_yang_meninggal').removeAttr('required');
    			$('#nama_yang_meninggal').removeAttr('data-error');
    			$('#tanggal_kematian').removeAttr('required');
    			$('#tanggal_kematian').removeAttr('data-error');
    			$('#faktor_kematian').removeAttr('required');
    			$('#faktor_kematian').removeAttr('data-error');
    			
    			$('#tanggal_dispensasi').removeAttr('required');
    			$('#tanggal_dispensasi').removeAttr('data-error');
    			$('#sampai_tanggal_dispensasi').removeAttr('required');
    			$('#sampai_tanggal_dispensasi').removeAttr('data-error');
    			$('#jumlah_hari').removeAttr('required');
    			$('#jumlah_hari').removeAttr('data-error');
    			$('#alasan_dispen').removeAttr('required');
    			$('#alasan_dispen').removeAttr('data-error');
    		}
    	});
    	$("#jenis_surat").trigger("change");
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".add-more").click(function(){ 
                var html = $(".copy").html();
                $(".after-add-more").after(html);
            });

            $("body").on("click",".remove",function(){ 
                $(this).parents(".control-group").remove();
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(e) {
            $('.btnaddform').click(function(e) {
                e.preventDefault();

                $('.add-more').append('<div class="card-header" id="headingOne">'+
                    '<h2 class="mb-0" style="padding-top: 0px;">'+
                    '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">'+
                    'Data Anggota Keluarga'+
                    '</button>'+
                    '</h2>'+
                    '</div>'+

                    '<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">'+
                    '<div class="card-body">'+
                    '<div class="row">'+
                    '<div class="col-12">'+
                    '<div class="form-group">'+
                    '<label for="int">NIK <?php echo form_error("nik") ?></label>'+
                    '<input type="text" class="form-control" name="nik[]" id="nik[]" placeholder="NIK" value="<?php echo $nik; ?>" />'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="form-group">'+
                    '<label for="varchar">Nama Lengkap <?php echo form_error("nama_lengkap") ?></label>'+
                    '<input type="text" class="form-control" name="nama_lengkap[]" id="nama_lengkap[]" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" />'+
                    '</div>'+
                    '<div class="row">'+
                    '<div class="col-12 col-sm-4 col-md-4">'+
                    '<div class="form-group">'+
                    '<label for="char">Jenis Kelamin <?php echo form_error("jenis_kelamin") ?></label>'+
                    '<select name="jenis_kelamin[]" id="jenis_kelamin[]" class="form-control">'+
                    '<option value="L">Laki-laki</option>'+
                    '<option value="P">Perempuan</option>'+
                    '</select>'+
                    '</div>'+
                    '</div>'+
                    '<div class="col-6 col-sm-4 col-md-4">'+
                    '<div class="form-group">'+
                    '<label for="varchar">Tempat Lahir <?php echo form_error("tempat_lahir") ?></label>'+
                    '<input type="text" class="form-control" name="tempat_lahir[]" id="tempat_lahir[]" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />'+
                    '</div>'+
                    '</div>'+
                    '<div class="col-6 col-sm-4 col-md-4">'+
                    '<div class="form-group">'+
                    '<label for="date">Tanggal Lahir <?php echo form_error("tanggal_lahir") ?></label>'+
                    '<input type="date" class="form-control" name="tanggal_lahir[]" id="tanggal_lahir[]" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="row">'+
                    '<div class="col-12 col-sm-4 col-md-4">'+
                    '<div class="form-group">'+
                    '<label for="varchar">Status Perkawinan <?php echo form_error("status_perkawinan") ?></label>'+
                    '<select name="status_perkawinan[]" id="status_perkawinan[]" class="form-control">'+
                    '<option value="Belum Kawin">Belum Kawin</option>'+
                    '<option value="Kawin">Kawin</option>'+
                    '<option value="Cerai Hidup">Cerai Hidup</option>'+
                    '<option value="Cerai Mati">Cerai Mati</option>'+
                    '</select>'+
                    '</div>'+
                    '</div>'+
                    '<div class="col-12 col-sm-4 col-md-4">'+
                    '<div class="form-group">'+
                    '<label for="varchar">Agama <?php echo form_error("agama") ?></label>'+
                    '<select name="agama[]" id="agama[]" class="form-control">'+
                    '<option value="Islam">Islam</option>'+
                    '<option value="Hindu">Hindu</option>'+
                    '<option value="Kristen Khatolik">Kristen Khatolik</option>'+
                    '<option value="Budha">Budha</option>'+
                    '<option value="Konghucu">Konghucu</option>'+
                    '</select>'+
                    '</div>'+
                    '</div>'+
                    '<div class="col-12 col-sm-4 col-md-4">'+
                    '<div class="form-group">'+
                    '<label for="varchar">Warganegara <?php echo form_error("warganegara") ?></label>'+
                    '<select name="warganegara[]" id="warganegara[]" class="form-control">'+
                    '<option value="WNI">Warga Negara Indonesia</option>'+
                    '<option value="WNA">Warga Negara Asing</option>'+
                    '</select>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+

                    '<div class="form-group">'+
                    '<label for="varchar">Pendidikan <?php echo form_error("pendidikan") ?></label>'+
                    '<select name="pendidikan[]" id="pendidikan[]" class="form-control" required>'+
                    '<option value="Tidak Sekolah">Tidak Sekolah</option>'+
                    '<option value="SD dan Sederajat">SD dan Sederajat</option>'+
                    '<option value="SMP dan Sederajat">SMP dan Sederajat</option>'+
                    '<option value="SMA dan Sederajat">SMA dan Sederajat</option>'+
                    '<option value="Diploma 1-3">Diploma 1-3</option>'+
                    '<option value="S1 dan Sederajat">S1 dan Sederajat</option>'+
                    '<option value="S2 dan Sederajat">S2 dan Sederajat</option>'+
                    '<option value="S3 dan Sederajat">S3 dan Sederajat</option>'+
                    '<option value="Pesantren, Seminari, Wihara dan Sejenisnya">Pesantren, Seminari, Wihara dan Sejenisnya</option>'+
                    '<option value="Lainnya">Lainnya</option>'+
                    '</select>'+
                    '</div>'+
                    '<div class="row">'+
                    '<div class="col-6 col-sm-6 col-md-6">'+
                    '<div class="form-group">'+
                    '<label for="varchar">Kondisi Pekerjaan <?php echo form_error("kondisi_pekerjaan") ?></label>'+
                    '<select name="kondisi_pekerjaan[]" id="kondisi_pekerjaan[]" class="form-control" required>'+
                    '<option value="Bersekolah">Bersekolah</option>'+
                    '<option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>'+
                    '<option value="Tidak Bekerja">Tidak Bekerja</option>'+
                    '<option value="Sedang Mencari Pekerjaan">Sedang Mencari Pekerjaan</option>'+
                    '<option value="Bekerja">Bekerja</option>'+
                    '</select>'+
                    '</div>'+
                    '</div>'+
                    '<div class="col-6 col-sm-6 col-md-6">'+
                    '<div class="form-group">'+
                    '<label for="varchar">Pekerjaan Utama <?php echo form_error("pekerjaan_utama") ?></label>'+
                    '<select name="pekerjaan_utama[]" id="pekerjaan_utama[]" class="form-control" required>'+
                    '<option value="Petani Pemilik Lahan">Petani Pemilik Lahan</option>'+
                    '<option value="Petani Penyewa">Petani Penyewa</option>'+
                    '<option value="Buruh Tani">Buruh Tani</option>'+
                    '<option value="Nelayan Pemilik Kapal / Perahu">Nelayan Pemilik Kapal / Perahu</option>'+
                    '<option value="Nelayan Penyewa Perahu / Kapal">Nelayan Penyewa Perahu / Kapal</option>'+
                    '<option value="Buruh Nelayan">Buruh Nelayan</option>'+
                    '<option value="Guru">Guru</option>'+
                    '<option value="Guru Agama">Guru Agama</option>'+
                    '<option value="Pedagang">Pedagang</option>'+
                    '<option value="Pengolahan/Industri">Pengolahan/Industri</option>'+
                    '<option value="PNS">PNS</option>'+
                    '<option value="TNI/POLRI">TNI/POLRI</option>'+
                    '<option value="Perangkat Desa">Perangkat Desa</option>'+
                    '<option value="Pegawai Kantor Desa">Pegawai Kantor Desa</option>'+
                    '<option value="TKI">TKI</option>'+
                    '<option value="Pensiunan">Pensiunan</option>'+
                    '<option value="Lainnya">Lainnya</option>'+
                    '</select>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="form-group">'+
                    '<label for="varchar">Penghasilan <?php echo form_error("penghasilan") ?></label>'+
                    '<input type="text" class="form-control" name="penghasilan[]" id="penghasilan[]" placeholder="Penghasilan" value="<?php echo $penghasilan; ?>" />'+
                    '</div>'+
                    '<div class="row">'+
                    '<div class="col-6 col-sm-6 col-md-6">'+
                    '<div class="form-group">'+
                    '<label for="varchar">Jamsostek <?php echo form_error("jamsostek") ?></label>'+
                    '<select name="jamsostek[]" id="jamsostek[]" class="form-control">'+
                    '<option value="Peserta">Peserta</option>'+
                    '<option value="Bukan Peserta">Bukan Peserta</option>'+
                    '</select>'+
                    '</div>'+
                    '</div>'+
                    '<div class="col-6 col-sm-6 col-md-6">'+
                    '<div class="form-group">'+
                    '<label for="varchar">Jamsoskes <?php echo form_error("jamsoskes") ?></label>'+
                    '<select name="jamsoskes[]" id="jamsoskes[]" class="form-control">'+
                    '<option value="Peserta">Peserta</option>'+
                    '<option value="Bukan Peserta">Bukan Peserta</option>'+
                    '</select>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="form-group">'+
                    '<label for="varchar">RT <?php echo form_error("rt") ?></label>'+
                    '<select name="rt[]" id="rt[]" class="form-control" required>'+
                    '<option value="1">1</option>'+
                    '<option value="2">2</option>'+
                    '<option value="3">3</option>'+
                    '<option value="4">4</option>'+
                    '<option value="5">5</option>'+
                    '<option value="6">6</option>'+
                    '<option value="7">7</option>'+
                    '<option value="8">8</option>'+
                    '</select>'+
                    '</div>'+
                    '<div class="form-group">'+
                    '<label for="varchar">Status Keluarga <?php echo form_error("status_keluarga") ?></label>'+
                    '<select name="status_keluarga[]" id="status_keluarga[]" class="form-control">'+
                    '<option value="Kepala Keluarga">Kepala Keluarga</option>'+
                    '<option value="Istri">Istri</option>'+
                    '<option value="Anak">Anak</option>'+
                    '</select>'+
                    '</div>'+
                    '<hr>'+
                    '</div>'+
                    '</div>'
                    );
        });
    });
</script>
</body>

</html>