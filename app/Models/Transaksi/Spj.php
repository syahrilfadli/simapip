<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Log;
use App\Traits\ColumnFilterer;
use App\Traits\ColumnSorter;
use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\SoftDeletes;
use EvoMark\LaravelIdObfuscator\Traits\Obfuscatable;
use Illuminate\Database\Eloquent\Model;

class Spj extends Model
{
    use Log;
    use HasFactory;
    use ColumnSorter;
    use ColumnFilterer;
    use CreatedUpdatedBy, SoftDeletes, Obfuscatable;


    protected $table = 'trans_spj';

    protected $fillable = [
            'trans_penugasan_id',
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
