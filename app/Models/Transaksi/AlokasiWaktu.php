<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Log;
use App\Traits\ColumnFilterer;
use App\Traits\ColumnSorter;
use Illuminate\Database\Eloquent\Model;

class AlokasiWaktu extends Model
{
    use Log;
    use HasFactory;
    use ColumnSorter;
    use ColumnFilterer;


    protected $table = 'trans_alokasi_waktu';

    protected $fillable = [
            'trans_penugasan_id',
            'role_id',
            'perencanaan',
            'pelaksanaan',
            'penyelesaian'
        ];


     /**
     * Get the penugasan.
     */
    public function penugasan()
    {
        return $this->belongsTo(Penugasan::class, 'trans_penugasan_id', 'id');
    }

}
