<?php

use App\Models\FormDetailTable;
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
        Schema::create((new FormDetailTable())->getTable(), function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on((new ProductsTable())->getTable());
            $table->string('description')->nullable();
            $table->integer('amount');
            $table->integer('type')->default(1);
            $table->string('other_detail')->nullable();
            $table->string('other_price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_detail_tables');
    }
};
