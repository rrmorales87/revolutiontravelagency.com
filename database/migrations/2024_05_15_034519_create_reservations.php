<?php

use App\Models\Clients;
use App\Models\Origins;
use App\Models\TopDestinations;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id()->startingValue(1000000);
            $table->timestamps();
            $table->foreignIdFor(Clients::class)->constrained();
            $table->foreignIdFor(Origins::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(TopDestinations::class)->constrained();
            $table->double('tax')->nullable();
            $table->double('price')->nullable();
            $table->string('status', 10);
            $table->integer('travellers')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
