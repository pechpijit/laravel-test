<?php

use App\Models\FormDetailTable;
use App\Models\FormsTable;
use App\Models\ProductsTable;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create((new FormDetailTable())->getTable(), function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_id')->unsigned();
            $table->foreign('form_id')->references('id')->on((new FormsTable())->getTable());
            $table->unsignedBigInteger('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on((new ProductsTable())->getTable());
            $table->string('description')->nullable();
            $table->integer('type')->nullable();
            $table->string('other_name')->nullable();
            $table->decimal('other_price', 10, 2)->nullable();
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
