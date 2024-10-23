<?php

use App\Models\Setting;
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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('label');
            $table->string('value')->nullable();
            $table->string('type');
            $table->timestamps();
        });

        Setting::create([
            'key' => 'site_name',
            'label' => 'Judul Situs',
            'value' => 'Kos Putri Pinurih',
            'type' => 'text',
        ]);

        Setting::create([
            'key' => 'location',
            'label' => 'Alamat',
            'value' => 'Jalan Dokter Wahidin Sudirohusodo Gang Manggis Nomor 2',
            'type' => 'text',
        ]);

        Setting::create([
            'key' => 'site_description',
            'label' => 'Site Description',
            'value' => 'Kos Strategis di Gang Manggis',
            'type' => 'text',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
