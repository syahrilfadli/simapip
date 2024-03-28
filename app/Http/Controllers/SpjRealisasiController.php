<?php

namespace App\Http\Controllers;

use App\Models\Transaksi\Penugasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Hash;
use Session;
use App\Models\Transaksi\Spj;
use Illuminate\Support\Facades\Auth;


class SpjRealisasiController extends Controller
{

    public function index()
    {
        $penugasans = Penugasan::select('id', 'no_st')->get(); // Ambil kolom id dan no_st di trans_penugasan

        return view('Transaksi.SpjRealisasi.index')->with('penugasans', $penugasans);
    }

    public function getStById($id)
    {
        setlocale(LC_TIME, 'id_ID');
        // Cari data penugasan berdasarkan ID yang diterima
        $penugasan = Penugasan::with('obyek')->findOrFail($id);

        if($penugasan){
            $penugasan->tanggal_st = strftime('%d %B %Y', strtotime($penugasan->tanggal_st));
        }
        // Kembalikan data penugasan dalam format JSON dengan with obyek
        return response()->json([
            'nama_obyek' => $penugasan->obyek->nama,
            'kegiatan' => $penugasan->nama_kegiatan,
            'lokasi' => $penugasan->obyek->alamat,
            'tahun_anggaran' => $penugasan->tahun_anggaran,
            'penugasan' => $penugasan,
        ]);
    }

    public function getSpj($id)
    {

         // Cari data penugasan berdasarkan ID yang diterima
         $penugasan = Penugasan::with('spj')->findOrFail($id);

         // Memproses properti spj
        $spj = $penugasan->spj;

        // Mengubah string JSON menjadi array PHP
        $perencanaan = json_decode($spj->perencanaan, true);
        $pelaksanaan = json_decode($spj->pelaksanaan, true);
        $penyelesaian = json_decode($spj->penyelesaian, true);

// echo $spj;
// echo $perencanaan;

        $response = [
            'perencanaan' => [
                'hari' => isset($perencanaan['hari']) ? $perencanaan['hari'] : null,
                'tanggal' => strftime('%d %B %Y', strtotime($penugasan->perencanaan_mulai)) . " s.d " . strftime('%d %B %Y', strtotime($penugasan->perencanaan_selesai)),
                'rencana_kegiatan' => 'Persiapan '.$penugasan->nama_kegiatan,
                'tim' => 'Inspektur s.d Anggota Tim',
                'realisasi_kegiatan' => 'Persiapan '.$penugasan->nama_kegiatan,
                'keterangan' => isset($perencanaan['keterangan']) ? $perencanaan['keterangan'] : null,
            ],
            'pelaksanaan' => [
                'hari' => isset($pelaksanaan['hari']) ? $pelaksanaan['hari'] : null,
                'tanggal' => strftime('%d %B %Y', strtotime($penugasan->pelaksanaan_mulai)) . " s.d " . strftime('%d %B %Y', strtotime($penugasan->pelaksanaan_selesai)),
                'rencana_kegiatan' => 'Pelaksanaan  '.$penugasan->nama_kegiatan,
                'tim' => 'Pengendali Teknis s.d Anggota Tim',
                'realisasi_kegiatan' => 'Pelaksanaan  '.$penugasan->nama_kegiatan,
                'keterangan' => isset($pelaksanaan['keterangan']) ? $pelaksanaan['keterangan'] : null,
            ],
            'penyelesaian' => [
                'hari' => isset($penyelesaian['hari']) ? $penyelesaian['hari'] : null,
                'tanggal' => strftime('%d %B %Y', strtotime($penugasan->pelaporan_mulai)) . " s.d " . strftime('%d %B %Y', strtotime($penugasan->pelaporan_selesai)),
                'rencana_kegiatan' => 'Penyelesaian Laporan  '.$penugasan->nama_kegiatan,
                'tim' => 'Inspektur s.d Anggota Tim',
                'realisasi_kegiatan' => 'Penyelesaian Laporan  '.$penugasan->nama_kegiatan,
                'keterangan' => isset($penyelesaian['keterangan']) ? $penyelesaian['keterangan'] : null,
            ]
        ];

        // echo $penugasan;

        // Menyediakan respon dalam format JSON
        return response()->json($response);
    }


    public function postSpj(Request $request, $id)
    {
        // if ($request->ajax() && csrf_token() !== $request->_token) {
        //     return response()->json(['success' => false, 'message' => 'Token CSRF tidak valid.'], 403);
        // }

        if (!$id) {
            return response()->json(['success' => false, 'message' => 'ID tidak valid.'], 400);
        }


        $request->validate([
            'perencanaan' => 'required',
            'pelaksanaan' => 'required',
            'penyelesaian' => 'required',
        ]);


        $spj = Spj::firstOrNew(['trans_penugasan_id' => $id]);
        $spj->fill([
            'perencanaan' => json_encode($request->input('perencanaan')),
            'pelaksanaan' => json_encode($request->input('pelaksanaan')),
            'penyelesaian' => json_encode($request->input('penyelesaian')),
            'trans_penugasan_id' => $id,
        ]);

        $spj->save();

        return response()->json(['success' => true, 'message' => 'Data berhasil disimpan.']);
    }

    // Perencanaan
    public function showPerencanaan($id)
    {
        $penugasans = Penugasan::with('alokasiWaktu')->findOrFail($id); // Ambil kolom id dan no_st di trans_penugasan

        return view('Transaksi.Perencanaan.index')->with('penugasan', $penugasans);
    }


     // Pelaksanaan
     public function showPelaksanaan($id)
     {
         $penugasans = Penugasan::with('alokasiWaktu')->findOrFail($id); // Ambil kolom id dan no_st di trans_penugasan

         return view('Transaksi.Pelaksanaan.index')->with('penugasan', $penugasans);
     }

     // Penyelesaian
     public function showPenyelesaian($id)
     {
         $penugasans = Penugasan::with('alokasiWaktu')->findOrFail($id); // Ambil kolom id dan no_st di trans_penugasan

         return view('Transaksi.Penyelesaian.index')->with('penugasan', $penugasans);
     }

    public function listObyek(Request $request)
    {
        $data = SpjRealisasi::where(function ($q) use ($request) {
                if ($request->has('search') && $request->search != "") {
                    $q->whereRaw('LOWER(nama) LIKE ?', ['%' . trim(strtolower($request->search)) . '%']);
                    $q->orWhereRaw('LOWER(email) LIKE ?', ['%' . trim(strtolower($request->search)) . '%']);
                    $q->orWhereRaw('LOWER(kode) LIKE ?', ['%' . trim(strtolower($request->search)) . '%']);
                }
            })
            ->when($request->has('ja') && $request->ja != "all" && !empty($request->ja), function ($q) use ($request) {
                if ($request->ja == "NOA") {
                    $q->whereNull('kode');
                } else
                    $q->where('kode', $request->ja);
            })
            ->paginate($request->pageSize);

        return $this->returnJsonSuccess("Userlist retrieved successfully", $data);
    }


    public function create()
    {
        return view('obyek.create');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|string|max:10',
            'nama' => 'required|string|max:100',
            'alamat' => 'required',
            'no_telp' => 'required|min:10|unique:ref_obyek,no_telp',
            'email' => 'required|email|unique:ref_obyek,email',
            'website' => 'required',
            'pimpinan' => 'required',
            'nip_pimpinan' => 'required|numeric|unique:ref_obyek,nip_pimpinan',
        ], [
            'no_telp.unique' => 'Nomor Telephone Sudah Terdaftar / Tidak Valid.',
            'email.unique' => 'Email Sudah Terdaftar / Tidak Valid.',
            'nip_pimpinan' => 'NIP Sudah Terdaftar / Tidak Valid.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            SpjRealisasi::create([
                'kode' => $request->kode,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'email' => $request->email,
                'website' => $request->website,
                'pimpinan' => $request->pimpinan,
                'nip_pimpinan' => $request->nip_pimpinan,
            ]);

            return Redirect::to('/obyek')->with('success', 'Berhasil mengubah data!');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Menampilkan pesan error pada pengecualian
            return redirect()->back()->with('error', 'Gagal menambahkan data SpjRealisasi: ' . $e->getMessage());
        }

    }


    public function show(ObyekController $obyekController)
    {
        //
    }


    public function edit(Obyek $obyekEdit, $id)
    {
        $obyekEdit = SpjRealisasi::find($id);
        //atau $medicine = Medicine::wehre('id', $id)->first();

        return view('obyek.edit', compact('obyekEdit'));
    }

    public function update(Request $request, SpjRealisasiController $obyekController, $id)
    {
        $request->validate([
            'kode' => 'required|string|max:10',
            'nama' => 'required|string|max:100',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'pimpinan' => 'required',
            'nip_pimpinan' => 'required|numeric',
        ]);

        SpjRealisasi::where('id', $id)->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'website' => $request->website,
            'pimpinan' => $request->pimpinan,
            'nip_pimpinan' => $request->nip_pimpinan,
        ]);

        return Redirect::to('/obyek')->with('success', 'Berhasil mengubah data!');
    }

    public function destroy(Obyek $obyekController, $id)
    {
        SpjRealisasi::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }
}
