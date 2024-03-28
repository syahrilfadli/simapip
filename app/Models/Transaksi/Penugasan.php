<?php

namespace App\Models\Transaksi;

use App\Models\Obyek;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Log;
use App\Traits\ColumnFilterer;
use App\Traits\ColumnSorter;
use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\SoftDeletes;
use EvoMark\LaravelIdObfuscator\Traits\Obfuscatable;
use Illuminate\Database\Eloquent\Model;

class Penugasan extends Model
{
    use Log;
    use HasFactory;
    use ColumnSorter;
    use ColumnFilterer;
    use CreatedUpdatedBy, SoftDeletes, Obfuscatable;


    protected $table = 'trans_penugasan';

    protected $fillable = [
            'obyek_id',
            'rencana_kegiatan',
            'irban',
            'nama_kegiatan',
            'tahun_anggaran',
            'sasaran_penugasan',
            'tujuan_penugasan',
            'laporan_ditujukan',
            'jenis_pengawasan_id',
            'no_st',
            'tanggal_st',
            'penerbit_st',
            'penerbit_st_instansi',
            'perencanaan_mulai',
            'perencanaan_selesai',
            'perencanaan_detail',
            'perencanaan_jml',
            'pelaksanaan_mulai',
            'pelaksanaan_selesai',
            'pelaksanaan_detail',
            'pelaksanaan_jml',
            'pelaporan_mulai',
            'pelaporan_selesai',
            'pelaporan_detail',
            'pelaporan_jml',

        ];


    /**
     * Get the penugasan.
     */
    public function obyek()
    {
        return $this->belongsTo(Obyek::class, 'obyek_id', 'id');
    }

     /**
     * Get the penugasan.
     */
    public function spj()
    {
        return $this->hasOne(Spj::class, 'trans_penugasan_id', 'id');
    }

    public function alokasiWaktu()
    {
        return $this->hasMany(AlokasiWaktu::class, 'trans_penugasan_id', 'id');
    }

}
