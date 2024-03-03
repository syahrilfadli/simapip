<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use EvoMark\LaravelIdObfuscator\Traits\Obfuscatable;

class Pegawai extends Model
{
    use CreatedUpdatedBy, SoftDeletes, Obfuscatable;

    protected $table = 'pegawai';

}