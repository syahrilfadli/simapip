@include('Layout.Header')
<!-- NFTmax Dashboard -->
<section class="nftmax-adashboard nftmax-show">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12 nftmax-main__column">
                <div class="nftmax-body">
                    <!-- Dashboard Inner -->
                    <div class="nftmax-dsinner">
                        <!-- All Notification Heading -->
                        <div class="nftmax-inner__heading">
                            <h2 class="nftmax-inner__page-title">Tambah Unit Kerja Baru</h2>
                        </div>
                        <!-- End All Notification Heading -->

                        <div class="nftmax__item">
                            <div class="nftmax__item-heading">
                                <h2 class="nftmax__item-title nftmax__item-title--psingle">Silahkan Inputkan Data yang
                                    Sesuai dengan Unit Kerja</h2>
                                <p class="nftmax__item-text nftmax__item-text--single">Mohon Input Data Yang Valid!</p>
                            </div>


                            <form action="{{ url('/unit-kerja/store') }}" method="post">
                                @csrf
                                <div class="nftmax__item-form--group">
                                    <label class="nftmax__item-label">Kode <span class="text-danger">*</span></label>
                                    <input class="nftmax__item-input" type="number"
                                        placeholder="Inputkan kode yang sesuai!" required="required" name="kode">
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="nftmax__item-form--group">
                                            <label class="nftmax__item-label">Nama Unit <span
                                                    class="text-danger">*</span></label>
                                            <input class="nftmax__item-input" type="text"
                                                placeholder="Inputkan nama unit yang sesuai!" required="required"
                                                name="nama_unit">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="nftmax__item-form--group">
                                            <label class="nftmax__item-label">Nama Singkatan</label>
                                            <input class="nftmax__item-input" type="text"
                                                placeholder="Inputkan nama singkatan yang sesuai!"
                                                name="nama_singkatan">
                                        </div>
                                    </div>
                                </div>

                                <div class="nftmax__item-form--group">
                                    <label class="nftmax__item-label">Alamat</label>
                                    <input class="nftmax__item-input" type="text"
                                        placeholder="Inputkan alamat yang sesuai!" name="alamat">
                                </div>

                                <div class="nftmax__item-form--group">
                                    <label class="nftmax__item-label">Pimpinan</label>
                                    <input class="nftmax__item-input" type="text"
                                        placeholder="Inputkan pimpinan yang sesuai!" name="pimpinan">
                                </div>

                                <div class="nftmax__item-form--group">
                                    <label class="nftmax__item-label">No. Telepon</label>
                                    <input class="nftmax__item-input" type="text"
                                        placeholder="Inputkan kode yang sesuai!" name="no_telp">
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="nftmax__item-form--group">
                                            <label class="nftmax__item-label">Email</label>
                                            <input class="nftmax__item-input" type="text"
                                                placeholder="Inputkan email yang sesuai!" name="email">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">~
                                        <div class="nftmax__item-form--group">
                                            <label class="nftmax__item-label">Website</label>
                                            <input class="nftmax__item-input" type="text"
                                                placeholder="Inputkan website yang sesuai!" name="website">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="nftmax__item-form--group">
                                            <label class="nftmax__item-label">No. Urut <span
                                                    class="text-danger">*</span></label>
                                            <input class="nftmax__item-input" type="text"
                                                placeholder="Inputkan no urut yang sesuai!" required="required"
                                                name="nomor_urut">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="nftmax__item-form--group">
                                            <label class="nftmax__item-label">Unit Kerja Kode</label>
                                            <input class="nftmax__item-input" type="text"
                                                placeholder="Inputkan unit kerja kode yang sesuai!" required="required"
                                                name="unitKerja_Kode">
                                        </div>
                                    </div>
                                </div>

                                <div class="nftmax__item-button--group">
                                    <a class="nftmax__item-button--single nftmax__item-button--cancel"
                                        href="{{ url('/unit-kerja') }}">Batal</a>
                                    <button
                                        class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered bg radius "
                                        type="submit">Tambah
                                    </button>
                                </div>
                            </form>


                        </div>

                    </div>
                    <!-- End Dashboard Inner -->
                </div>
            </div>
        </div>
    </div>
</section>
@include('Layout.Template.Footer')
