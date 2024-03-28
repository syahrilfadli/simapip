<div class="welcome-cta">
    <div class="welcome-cta__heading">
        <h2 class="welcome-cta__title">Program Kerja Pemeriksaan</h2>
        <p class="welcome-cta__text">Uraian Tujuan dan Prosedur Pemeriksaan</p>
    </div>
</div>

<form id="formSpj" class="form" action="{{ url('/realisasi/pelaksanaan/' . $penugasan->id) }}" method="POST">
    @csrf
     <!-- Tabel Perencanaan, Pelaksanaan, Penyelesaian -->
    <div class="nftmax__item  mg-top-40">
        <div class="row">
            <div class="col-12">
                <div class="nftmax__item-heading">
                    <h2 class="nftmax__item-title nftmax__item-title--psingle" style="font-size: 24px;">II. Pelaksanaan</h2>
                    <h2 class="nftmax__item-title nftmax__item-title--psingle">1. Tujuan:</h2>
                    <span style="margin-left: 18px;">Melaksanakan {{$penugasan->nama_kegiatan}} periode tahun {{$penugasan->tahun_anggaran}}</span>
                </div>

                <div class="nftmax__item-heading">
                    <h2 class="nftmax__item-title nftmax__item-title--psingle">2. Langkah Kerja:</h2>
                </div>

                 <!-- Tambahkan Multiple Langkah Kerja -->
                <div class="multiple-langkah-kerja">
                    <input type="text" class="nftmax__item-input mb-2" name="langkahKerja[]" placeholder="Langkah Kerja">
                </div>

                <!-- Tombol Tambah Langkah Kerja -->
                <button type="button" class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered bg radius nftmax-item__btn  mt-2" id="tambahLangkahKerja">Tambah</button>

                <div class="nftmax__item-box">
                    <table class="table table-striped table-border radius mg-top-30">
                        <thead>
                            <tr>
                                <th scope="col" colspan="2">Rencana</th>
                                <th scope="col" colspan="3">Relisasi</th>
                                <th scope="col" rowspan="2">Keterangan</th>
                            </tr>
                            <tr>
                                <th scope="col">Dilaksanakan Oleh</th>
                                <th scope="col">Anggaran Waktu</th>
                                <th scope="col">Dilaksanakan Oleh</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Ref KKA.</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($penugasan->alokasiWaktu as $alokasi)
                            <tr>
                                <td>
                                    @if($alokasi->role_id == 2)
                                        Penanggung Jawab
                                    @elseif($alokasi->role_id == 3)
                                        Pengendali Teknis
                                    @elseif($alokasi->role_id == 4)
                                        Ketua Tim
                                    @elseif($alokasi->role_id == 5)
                                        Anggota Tim
                                    @else
                                        Unknown Role
                                    @endif
                                </td>
                                <td>{{ $alokasi->pelaksanaan*6.5 }}</td>
                                <td>
                                    @if($alokasi->role_id == 2)
                                        Penanggung Jawab
                                    @elseif($alokasi->role_id == 3)
                                        Pengendali Teknis
                                    @elseif($alokasi->role_id == 4)
                                        Ketua Tim
                                    @elseif($alokasi->role_id == 5)
                                        Anggota Tim
                                    @else
                                        Unknown Role
                                    @endif
                                </td>
                                <td>{{ $alokasi->pelaksanaan*6.5 }}</td>
                                <td>
                                    <input type="number" class="nftmax__item-input mb-2" style="max-width: 100px;" name="refKKA[]" placeholder="Ref KKA">
                                </td>
                                <td>
                                    <textarea class="nftmax__item-input nftmax__item-textarea" name="komentar[]"></textarea>
                                </td>
                            </tr>
                            @endforeach
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


<script>
    $(document).ready(function() {
         // Handler untuk tombol tambah langkah kerja
         $('#tambahLangkahKerja').click(function() {
            // Buat input field baru
            var newInput = '<div class="input-group mb-2"><input type="text" class="form-control langkah-kerja" name="langkahKerja[]" placeholder="Langkah Kerja"><button type="button" class="btn btn-danger hapus-langkah-kerja">Hapus</button></div>';
            // Tambahkan input field baru ke dalam div multiple-langkah-kerja
            $('.multiple-langkah-kerja').append(newInput);
        });

        // Handler untuk tombol hapus langkah kerja
        $(document).on('click', '.hapus-langkah-kerja', function() {
            var button = $(this);
            // Tampilkan konfirmasi penghapusan dengan SweetAlert
            swal({
                title: "Konfirmasi",
                text: "Apakah Anda yakin ingin menghapus langkah kerja ini?",
                icon: "warning",
                buttons: ["Batal", "Ya"],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    // Hapus div input group yang berisi langkah kerja
                    button.closest('.input-group').remove();
                    // Tampilkan pesan sukses dengan SweetAlert
                    swal("Langkah kerja berhasil dihapus.", {
                        icon: "success",
                    });
                }
            });
        });
    });
</script>
