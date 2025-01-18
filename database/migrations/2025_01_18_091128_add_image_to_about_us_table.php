<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToAboutUsTable extends Migration
{
    public function up()
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->string('image')->nullable()->after('description'); // Kolom gambar opsional
        });
    }

    public function down()
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
}
