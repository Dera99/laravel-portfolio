<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class History extends Model
{
    use HasFactory;
    protected $table = "histories";
    protected $fillable = ['title', 'type', 'start_date', 'end_date', 'info1', 'info2', 'info3', 'content'];

    protected $appends = ['tgl_mulai_indo', 'tgl_selesai_indo'];

    public function getTglMulaiIndoAttribute()
    {
        return Carbon::parse($this->attributes['start_date'])->translatedFormat('d F Y');
    }
    public function getTglSelesaiIndoAttribute()
    {
        if ($this->attributes['end_date'] == null) {
            return "Present";
        } else {
            return Carbon::parse($this->attributes['end_date'])->translatedFormat('d F Y');
        }
    }
}
