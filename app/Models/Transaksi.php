<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $fillable = [
    //     'produsen_id',
    //     'reseller_id',
    //     'product_id',
    //     'jumlah_pembelian',
    //     'total',
    // ];

    public function userreseller(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reseller_id');
    }

    public function userprodusen(): BelongsTo
    {
        return $this->belongsTo(User::class, 'produsen_id');
    }

    /**
     * Get all of the detailTransaksi for the Transaksi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

     /**
      * Get the product that owns the Transaksi
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function product(): BelongsTo
     {
         return $this->belongsTo(Product::class, 'product_id');
     }
}