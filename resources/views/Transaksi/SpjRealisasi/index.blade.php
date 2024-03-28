@include('Layout.Header')

<section class="nftmax-adashboard nftmax-show">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12 nftmax-main__column">
                <div class="nftmax-body">
                    <!-- Dashboard Inner -->
                    <div class="nftmax-dsinner">

                        <!-- Welcome CTA -->
                        <div class="welcome-cta mg-top-40">
                            <div class="welcome-cta__heading">
                                <h2 class="welcome-cta__title">SPJ dan Pemeriksaan</h2>
                                <p class="welcome-cta__text">Kelola SPJ beserta informasi pemeriksaan perencanaan, pelaksanaan dan penyelesaian</p>
                            </div>

                            <div class="welcome-cta__button">
                                     <label>Surat Tugas </label>
                                    <select id="suratTugas" class="form-select" aria-label="Default select">
                                            <option value="">Pilih</option>
                                                @foreach ($penugasans as $penugasan)
                                                    <option value="{{ $penugasan->id }}">{{ $penugasan->no_st }}</option>
                                                @endforeach
                                    </select>
                            </div>
                        </div>

                        <div class="nftmax__item" style="margin-top: -10px;">
                            <div class="row">
                                <div class="col-12">

                                    <div id="alertSuratTugas" class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <i class="fa fa-warning m-3"></i>  <!-- Icon warning -->
                                        Anda belum memilih Surat Tugas untuk ditampilkan.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>

                                    <div class="nftmax__item-box">
                                        <div class="row nftmax-pcolumn">
                                            <div class="col-xxl-6 col-lg-6 col-12 nftmax-pcolumn__one">
                                                <div class="nftmax__item-form--main">
                                                    <div class="nftmax__item-form--group">
                                                        <label class="nftmax__item-label">Nama Obyek Penugasan </label>
                                                        <input class="nftmax__item-input" type="text" id="namaObyek" name="namaObyek" placeholder="" required="required">
                                                    </div>

                                                    <div class="nftmax__item-form--group">
                                                        <label class="nftmax__item-label">Kegiatan Penugasan </label>
                                                        <input class="nftmax__item-input" type="text" id="kegiatanObyek" name="kegiatanObyek" placeholder="" required="required">
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-lg-6 col-12 nftmax-pcolumn__two">
                                                <div class="nftmax__item-form--main">



                                                    <div class="nftmax__item-form--group">
                                                        <label class="nftmax__item-label">Lokasi </label>
                                                        <input class="nftmax__item-input" type="text" id="lokasi" name="lokasi" placeholder="" required="required">
                                                    </div>

                                                    <div class="nftmax__item-form--group">
                                                        <label class="nftmax__item-label">Tahun Anggaran </label>
                                                        <input class="nftmax__item-input" type="text" id="tahunAnggaran" name="tahunAnggaran" placeholder="" required="required">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="nftmax__item mg-top-40" id="tabs" style="display: none;">
                            <div class="row">
                                <div class="col-12">
                                        <div class="nftmax-pcats">

                                        <!-- Profile Menu -->
                                        <div class="nftmax-pcats__bar">
                                            <div class="nftmax-pcats__list list-group " id="list-tab" role="tablist">
                                                <a class="list-group-item active" data-bs-toggle="list" href="#tab_1" role="tab" id="nav-kelola-spj">Kelola SPJ</a>
                                                <a class="list-group-item" data-bs-toggle="list" href="#tab_2" role="tab" id="nav-perencanaan">Pemeriksaan:  Perencanaan</a>
                                                <a class="list-group-item" data-bs-toggle="list" href="#tab_3" role="tab" id="nav-pelaksanaan">Pemeriksaan:  Pelaksanaan</a>
                                                <a class="list-group-item" data-bs-toggle="list" href="#tab_4" role="tab" id="nav-penyelesaian">Pemeriksaan:   Penyelesaian</a>
                                            </div>
                                        </div>
                                        <!-- End Profile Menu -->
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="nftmax__item mg-top-40" id="tab-content" style="display: none;">
                            <div class="row">
                                <div class="col-12">
                                    <div class="nftmax__item-box">

                                        <div class="tab-content" id="nav-tabContent">
                                            <!-- Single Tab -->
                                            <div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="nav-kelola-spj">

                                                            <div class="nftmax__item-heading">
                                                                <h2 class="nftmax__item-title nftmax__item-title--psingle">Rencana Pelaksanaan Kegiatan Harian</h2>
                                                                <p class="nftmax__item-text nftmax__item-text--single mb-2" id="subtitle-kelola-spj"></p>
                                                                <h4 class="nftmax__item-title nftmax__item-title--psingle"><span id="subtitle-no-st"></span> tanggal <span id="subtitle-tgl-st"></span></h4>


                                                            </div>
                                                            <form id="formSpj" class="form" action="{{ url('/realisasi/spj/' . $penugasan->id) }}" method="POST">
                                                                @csrf
                                                                 <!-- Tabel Perencanaan, Pelaksanaan, Penyelesaian -->
                                                                <div class="nftmax__item  mg-top-40">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="nftmax__item-box">
                                                                                <table class="table table-striped">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th scope="col">Perencanaan</th>
                                                                                            <th scope="col">Pelaksanaan</th>
                                                                                            <th scope="col">Penyelesaian</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td id="perencanaanHari">
                                                                                            <select class="form-select" name="hariPerencanaanMulai" required="required">
                                                                                                <option value="Senin">Senin</option>
                                                                                                <option value="Selasa">Selasa</option>
                                                                                                <option value="Rabu">Rabu</option>
                                                                                                <option value="Kamis">Kamis</option>
                                                                                                <option value="Jumat">Jumat</option>
                                                                                                <option value="Sabtu">Sabtu</option>
                                                                                                <option value="Minggu">Minggu</option>
                                                                                            </select> s.d  <select class="form-select" name="hariPerencanaanSelesai">
                                                                                                <option value="Senin">Senin</option>
                                                                                                <option value="Selasa">Selasa</option>
                                                                                                <option value="Rabu">Rabu</option>
                                                                                                <option value="Kamis">Kamis</option>
                                                                                                <option value="Jumat">Jumat</option>
                                                                                                <option value="Sabtu">Sabtu</option>
                                                                                                <option value="Minggu">Minggu</option>
                                                                                            </select>

                                                                                        </td>
                                                                                            <td id="pelaksanaanHari">
                                                                                                <select class="form-select" name="hariPelaksanaanMulai" required="required">
                                                                                                    <option value="Senin">Senin</option>
                                                                                                    <option value="Selasa">Selasa</option>
                                                                                                    <option value="Rabu">Rabu</option>
                                                                                                    <option value="Kamis">Kamis</option>
                                                                                                    <option value="Jumat">Jumat</option>
                                                                                                    <option value="Sabtu">Sabtu</option>
                                                                                                    <option value="Minggu">Minggu</option>
                                                                                                </select> s.d  <select class="form-select" name="hariPelaksanaanSelesai">
                                                                                                    <option value="Senin">Senin</option>
                                                                                                    <option value="Selasa">Selasa</option>
                                                                                                    <option value="Rabu">Rabu</option>
                                                                                                    <option value="Kamis">Kamis</option>
                                                                                                    <option value="Jumat">Jumat</option>
                                                                                                    <option value="Sabtu">Sabtu</option>
                                                                                                    <option value="Minggu">Minggu</option>
                                                                                                </select>
                                                                                            </td>
                                                                                            <td id="penyelesaianHari">
                                                                                                <select class="form-select" name="hariPenyelesaianMulai" required="required">
                                                                                                    <option value="Senin">Senin</option>
                                                                                                    <option value="Selasa">Selasa</option>
                                                                                                    <option value="Rabu">Rabu</option>
                                                                                                    <option value="Kamis">Kamis</option>
                                                                                                    <option value="Jumat">Jumat</option>
                                                                                                    <option value="Sabtu">Sabtu</option>
                                                                                                    <option value="Minggu">Minggu</option>
                                                                                                </select> s.d  <select class="form-select" name="hariPenyelesaianSelesai">
                                                                                                    <option value="Senin">Senin</option>
                                                                                                    <option value="Selasa">Selasa</option>
                                                                                                    <option value="Rabu">Rabu</option>
                                                                                                    <option value="Kamis">Kamis</option>
                                                                                                    <option value="Jumat">Jumat</option>
                                                                                                    <option value="Sabtu">Sabtu</option>
                                                                                                    <option value="Minggu">Minggu</option>
                                                                                                </select>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <label>Tanggal:</label>
                                                                                                <p  id="perencanaanTanggal"></p>
                                                                                            </td>
                                                                                            <td>
                                                                                                <label>Tanggal:</label>
                                                                                                <p id="pelaksanaanTanggal"></p>
                                                                                            </td>
                                                                                            <td>
                                                                                                <label>Tanggal:</label>
                                                                                                <p id="penyelesaianTanggal"></p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <label>Rencana Kegiatan:</label>
                                                                                                <p id="perencanaanRencanaKegiatan"></p>
                                                                                            </td>
                                                                                            <td>
                                                                                                <label>Rencana Kegiatan:</label>
                                                                                                <p id="pelaksanaanRencanaKegiatan"></p>
                                                                                            </td>
                                                                                            <td>
                                                                                                <label>Rencana Kegiatan:</label>
                                                                                                <p id="penyelesaianRencanaKegiatan"></p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <label>Tim:</label>
                                                                                                <p  id="perencanaanTim"></p>
                                                                                            </td>
                                                                                            <td>
                                                                                                <label>Tim:</label>
                                                                                                <p id="pelaksanaanTim"></p>
                                                                                            </td>
                                                                                            <td>
                                                                                                <label>Tim:</label>
                                                                                                <p id="penyelesaianTim"></p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <label>Realisasi Kegiatan:</label>
                                                                                                <p id="perencanaanRealisasiKegiatan"></p>
                                                                                            </td>
                                                                                            <td>
                                                                                                <label>Realisasi Kegiatan:</label>
                                                                                                <p id="pelaksanaanRealisasiKegiatan"></p>
                                                                                            </td>
                                                                                            <td>
                                                                                                <label>Realisasi Kegiatan:</label>
                                                                                                <p id="penyelesaianRealisasiKegiatan"></p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><label>Keterangan:</label>
                                                                                                <textarea class="nftmax__item-input nftmax__item-textarea"  id="perencanaanKeterangan" rows="3"></textarea></td>
                                                                                            <td><label>Keterangan:</label>
                                                                                                <textarea class="nftmax__item-input nftmax__item-textarea"  id="pelaksanaanKeterangan" rows="3"></textarea></td>
                                                                                            <td><label>Keterangan:</label>
                                                                                                <textarea class="nftmax__item-input nftmax__item-textarea"  id="penyelesaianKeterangan" rows="3"></textarea></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>

                                                                                <div class="nftmax__item-button--group">
                                                                                    <button class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered bg radius nftmax-item__btn mb-3" type="submit">Simpan</button>

                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </form>
                                            </div>

                                            <div class="tab-pane fade" id="tab_2" role="tabpanel" aria-labelledby="nav-perencanaan">
                                            </div>

                                            <div class="tab-pane fade" id="tab_3" role="tabpanel" aria-labelledby="nav-pelaksanaan">
                                            </div>

                                            <div class="tab-pane fade" id="tab_4" role="tabpanel" aria-labelledby="nav-penyelesaian">
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- End Dashboard Inner -->
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .form-select {
        width: auto;
        display: inline-block;
    }

</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Menambahkan CSRF token ke setiap permintaan AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        function setInitialValues(response) {
        $('#perencanaanTanggal').text(response.perencanaan.tanggal);
        $('#perencanaanHari select[name="hariPerencanaanMulai"]').val(response.perencanaan.hari[0]);
        $('#perencanaanHari select[name="hariPerencanaanSelesai"]').val(response.perencanaan.hari[1]);

        $('#pelaksanaanTanggal').text(response.pelaksanaan.tanggal);
        $('#pelaksanaanHari select[name="hariPelaksanaanMulai"]').val(response.pelaksanaan.hari[0]);
        $('#pelaksanaanHari select[name="hariPelaksanaanSelesai"]').val(response.pelaksanaan.hari[1]);

        $('#penyelesaianTanggal').text(response.penyelesaian.tanggal);
        $('#penyelesaianHari select[name="hariPenyelesaianMulai"]').val(response.penyelesaian.hari[0]);
        $('#penyelesaianHari select[name="hariPenyelesaianSelesai"]').val(response.penyelesaian.hari[0]);
    }

        $('#suratTugas').change(function() {
            var penugasanId = $(this).val();
            if (penugasanId) {
                // Menyembunyikan alert jika Surat Tugas telah dipilih
                $('#alertSuratTugas').hide();
                // Menampilkan tab jika Surat Tugas telah dipilih
                $('#tabs').show();
                $('#tab-content').show();
                // Kirim permintaan AJAX untuk mendapatkan data penugasan berdasarkan ID yang dipilih
                $.ajax({
                    url: '/realisasi/selectSt/' + penugasanId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        $('#namaObyek').val(response.nama_obyek);
                        $('#kegiatanObyek').val(response.kegiatan);
                        $('#subtitle-kelola-spj').html(response.kegiatan);
                        $('#subtitle-no-st').html(response.penugasan?.no_st);
                        $('#subtitle-tgl-st').html(response.penugasan?.tanggal_st);
                        $('#lokasi').val(response.lokasi);
                        $('#tahunAnggaran').val(response.tahun_anggaran);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });

                // Default untuk SPJ aktif
                var penugasanId = $(this).val();
                    // Menggunakan AJAX untuk mengambil data dari backend
                    $.ajax({
                        url: '/realisasi/spj/' + penugasanId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            // Mengisi data ke dalam tabel
                            setInitialValues(response);
                            // $('#perencanaanHari').text(response.perencanaan.hari);
                            $('#perencanaanTanggal').text(response.perencanaan.tanggal);
                            $('#perencanaanRencanaKegiatan').text(response.perencanaan.rencana_kegiatan);
                            $('#perencanaanTim').text(response.perencanaan.tim);
                            $('#perencanaanRealisasiKegiatan').text(response.perencanaan.realisasi_kegiatan);
                            $('#perencanaanKeterangan').val(response.perencanaan.keterangan);

                            // $('#pelaksanaanHari').text(response.pelaksanaan.hari);
                            $('#pelaksanaanTanggal').text(response.pelaksanaan.tanggal);
                            $('#pelaksanaanRencanaKegiatan').text(response.pelaksanaan.rencana_kegiatan);
                            $('#pelaksanaanTim').text(response.pelaksanaan.tim);
                            $('#pelaksanaanRealisasiKegiatan').text(response.pelaksanaan.realisasi_kegiatan);
                            $('#pelaksanaanKeterangan').val(response.pelaksanaan.keterangan);

                            // $('#penyelesaianHari').text(response.penyelesaian.hari);
                            $('#penyelesaianTanggal').text(response.penyelesaian.tanggal);
                            $('#penyelesaianRencanaKegiatan').text(response.penyelesaian.rencana_kegiatan);
                            $('#penyelesaianTim').text(response.penyelesaian.tim);
                            $('#penyelesaianRealisasiKegiatan').text(response.penyelesaian.realisasi_kegiatan);
                            $('#penyelesaianKeterangan').val(response.penyelesaian.keterangan);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });

            } else {
                // Menampilkan alert jika Surat Tugas belum dipilih
                $('#alertSuratTugas').show();
                $('#tabs').hide();
                $('#tab-konten').hide();

            }
        });

        $('a[data-bs-toggle="list"]').click(function(e) {
            e.preventDefault(); // Mencegah perilaku default dari tautan
            // Menghapus kelas 'active' dari semua tab
            $('a[data-bs-toggle="list"]').removeClass('active');
            $('.tab-pane').removeClass('show active');
            // Menambahkan kelas 'active' ke tab yang diklik
            $(this).addClass('active');
            // Mendapatkan id tab yang sesuai dari href
            var targetTabId = $(this).attr('href');
            // Menampilkan tab yang sesuai
            $(targetTabId).addClass('show active');
            var penugasanId = $('#suratTugas option:selected').val();
            if (targetTabId === '#tab_2' || targetTabId === '#tab_3' || targetTabId === '#tab_4') {
                var path="perencanaan";
                if(targetTabId === '#tab_3'){
                    path="pelaksanaan";
                }else if(targetTabId === '#tab_4'){
                    path="penyelesaian";
                }
                $.ajax({
                    url: '/realisasi/'+path+'/'+penugasanId,
                    type: 'GET',
                    success: function(response) {
                        // Memperbarui konten tab dengan response dari server
                        $(targetTabId).html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }

        });


        function showToast(message, type) {
            // Mengatur warna latar belakang toast berdasarkan tipe
            var bgColor = type === 'success' ? '#28a745' : '#dc3545';

            // Menampilkan toast menggunakan Toastify
            Toastify({
                text: message,
                duration: 3000, // Durasi toast dalam milidetik
                close: true, // Menampilkan tombol tutup pada toast
                backgroundColor: bgColor // Warna latar belakang toast
            }).showToast();
        }

        // Fungsi untuk mengirim data ke backend sesuai dengan format formulir
        function sendDataToBackend(data) {
            var penugasanId = $('#suratTugas option:selected').val();
            $.ajax({
                url: '/realisasi/spj/' + penugasanId,
                type: 'PATCH',
                contentType: 'application/json',
                data: JSON.stringify(data),
                success: function(response) {
                    // Tampilkan toast dengan pesan sukses
                    // showToast('Data berhasil disimpan!', 'success');
                    Swal.fire({
                        title: 'Success',
                        text: 'Data berhasil disimpan!',
                        icon: 'success', // success, error, warning, info, atau question
                        toast: true,
                        position: 'center-end',
                        showConfirmButton: false,
                        timer: 3000 // Waktu tampilan toast (dalam milidetik)
                    });

                    console.log('Data berhasil dikirim ke backend:', response);
                },
                error: function(xhr, status, error) {
                    // Tangani kesalahan jika ada
                    console.error('Kesalahan dalam mengirim data ke backend:', error);
                    // Tampilkan toast dengan pesan kesalahan
                    Swal.fire({
                        title: 'Error',
                        text: 'Gagal menyimpan data. Silakan coba lagi!',
                        icon: 'error', // success, error, warning, info, atau question
                        toast: true,
                        position: 'center-end',
                        showConfirmButton: false,
                        timer: 3000 // Waktu tampilan toast (dalam milidetik)
                    });
                    // showToast('Gagal menyimpan data. Silakan coba lagi!', 'error');
                }
            });
        }

        function gatherFormData() {
                var data = {
                    perencanaan: {
                        hari: [
                            $('#perencanaanHari select[name="hariPerencanaanMulai"]').val()
                        ],
                        keterangan: $('#perencanaanKeterangan').val()
                    },
                    pelaksanaan: {
                        hari: [
                            $('#pelaksanaanHari select[name="hariPelaksanaanMulai"]').val()
                        ],
                        keterangan: $('#pelaksanaanKeterangan').val()
                    },
                    penyelesaian: {
                        hari: [
                            $('#penyelesaianHari select[name="hariPenyelesaianMulai"]').val()
                        ],
                        keterangan: $('#penyelesaianKeterangan').val()
                    }
                };

                // Memeriksa apakah nilai "mulai" dan "selesai" berbeda
                if ($('#perencanaanHari select[name="hariPerencanaanMulai"]').val() !== $('#perencanaanHari select[name="hariPerencanaanSelesai"]').val()) {
                    data.perencanaan.hari.push($('#perencanaanHari select[name="hariPerencanaanSelesai"]').val());
                }

                if ($('#pelaksanaanHari select[name="hariPelaksanaanMulai"]').val() !== $('#pelaksanaanHari select[name="hariPelaksanaanSelesai"]').val()) {
                    data.pelaksanaan.hari.push($('#pelaksanaanHari select[name="hariPelaksanaanSelesai"]').val());
                }

                if ($('#penyelesaianHari select[name="hariPenyelesaianMulai"]').val() !== $('#penyelesaianHari select[name="hariPenyelesaianSelesai"]').val()) {
                    data.penyelesaian.hari.push($('#penyelesaianHari select[name="hariPenyelesaianSelesai"]').val());
                }

                return data;
            }

    // Handler saat formulir disubmit
    $('#formSpj').submit(function(e) {
        e.preventDefault();

        var formData = gatherFormData();

        // Kirim data ke backend
        sendDataToBackend(formData);
    });

    });
</script>


@include('Layout.Footer')
