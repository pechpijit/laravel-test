<?php

use App\Models\ProductCategoryTable;
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
        Schema::create((new ProductCategoryTable())->getTable(), function (Blueprint $table) {
            $table->id();
            $table->string('CategoryName');
            $table->integer('CategoryMaxRequest')->default(1);
            $table->integer('CategoryStatus')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_category_tables');
    }
};
