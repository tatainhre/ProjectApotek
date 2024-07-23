<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Obat extends Model
{
    use HasFactory;

    // protected $table = 'obats';
    
    // protected $primarykey = 'kode_obat';

    // protected $keytype = 'string';

    protected $fillable = [
        'kode_obat',
        'nama_obat',
        'stok',
        'harga',
        'id_kategori',
    ];


    public function kategori(): BelongsTo    
    {
        return $this->belongsTo(Kategori::class);
    }
}
