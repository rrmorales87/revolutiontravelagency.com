<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Reservations extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'client_id', 'tax','price','slug','travellers'
    ];

    protected $appends = ['total_amount'];

    protected static function boot() {
        parent::boot();

        static::creating(function ($table) {
            $table->slug = Str::slug("RT-");
            // add other column as well
        });

        static::updating(function ($table) {
            $table->slug = Str::slug("RT-");
            // add other column as well
        });

    }

    public function getTotalAmountAttribute(){
        return $this->tax * $this->price;
    }

}
