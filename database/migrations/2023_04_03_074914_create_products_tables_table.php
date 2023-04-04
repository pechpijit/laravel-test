<?php

use App\Models\ProductCategoryTable;
use App\Models\ProductsTable;
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
        Schema::create((new ProductsTable())->getTable(), function (Blueprint $table) {
            $table->id();
            $table->string('ProductName');
            $table->decimal('ProductPrice',10,2);
            $table->integer('ProductStatus')->default(1);
            $table->unsignedBigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on((new ProductCategoryTable())->getTable());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_tables');
    }
};
