<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Multipleuploads extends Model
{
    protected $table ='multipleuploads';
    protected $primaryKey = 'id';
    protected $fillable = [
    'pelanggan_id',
    'filename',
];
public function pelanggan()
{
    return $this->belongsTo(Pelanggan::class, 'pelanggan_id', 'pelanggan_id');
}
}
