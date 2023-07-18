<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ketetapan extends Model
{
 use HasFactory;
 protected $guarded = [];
 public function nop() {
  /**
 * Get the user that owns the phone.
 */
    return $this->belongsTo(Nop::class, 'nop', 'nop');
 }
}
