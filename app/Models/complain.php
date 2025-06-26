<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class complain extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function jenisComplain()
    {
        return $this->belongsTo(jeniscomplain::class, 'jeniscomplain_id');
    }
}
