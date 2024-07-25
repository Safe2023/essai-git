<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

   /*  public function fournisseur() {
        return $this->belongsTo(Fournisseur::class);
    }
    
    public function client() {
        return $this->belongsTo(client::class);
    } */
}
