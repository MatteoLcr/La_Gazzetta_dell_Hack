<?php

use App\Models\Country;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $countries = [
        'Abruzzo',
        'Basilicata',
        'Calabria',
        'Campania',
        'Romagna',
        'Friuli',
        'Lazio',
        'Liguria',
        'Lombardia',
        'Marche',
        'Molise',
        'Piemonte',
        'Puglia',
        'Sardegna',
        'Sicilia',
        'Toscana',
        'Trentino',
        'Umbria',
        'Aosta',
        'Veneto'
        ];

        foreach ($countries as $cat) {
           Country::create([
               'name' => $cat
           ]);
       }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
