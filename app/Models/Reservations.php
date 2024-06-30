<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'client_id', 'tax', 'price', 'slug', 'travellers'
    ];

    protected $appends = ['total_amount', 'slug'];



    public function getTotalAmountAttribute()
    {
        return $this->tax * $this->price;
    }

    public function getSlugAttribute()
    {
        return Str::slug("RT-" . $this->id);
    }


    public function origin(): BelongsTo
    {
        return $this->belongsTo(Origins::class, "origins_id");
    }

    public function destination(): BelongsTo
    {
        return $this->belongsTo(TopDestinations::class, "top_destinations_id");
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Clients::class, "clients_id");
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
