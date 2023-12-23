<?php

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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->increments("id");
            $table->string("purchase_order_number");
            $table->unsignedInteger("vendor_id");
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->string("about");
            $table->unsignedInteger("grand_total");
            $table->date("purchase_order_date");
            $table->string("status");
            $table->unsignedInteger("tenant_id");
            $table->foreign('tenant_id')->references('id')->on('tenants');
            $table->text("note");
            $table->unsignedInteger("subtotal");
            $table->unsignedInteger("tax");
            $table->string("grand_total_spelled");
            $table->text("term_and_conditions");
            $table->mediumText("signature");
            $table->string("signature_name");
            $table->timestamps();
            $table->date("deleted_at")->nullable();
        });

        Schema::create('purchase_order_details', function (Blueprint $table) {
            $table->unsignedInteger("purchase_order_id");
            $table->foreign('purchase_order_id')->references('id')->on('purchase_orders');
            $table->integer("number");
            $table->string("name");
            $table->string("specification")->nullable();
            $table->integer("quantity");
            $table->string("units");
            $table->unsignedInteger("price");
            $table->string("tax");
            $table->unsignedInteger("total_price");
            $table->timestamps();
            $table->date("deleted_at")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
        Schema::dropIfExists('purchase_order_details');
    }
};
