<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "event";

    protected $fillable = [
        'namaevent','waktu','htm','image','deskripsi','lokasi','maps','kategori'
    ];
}