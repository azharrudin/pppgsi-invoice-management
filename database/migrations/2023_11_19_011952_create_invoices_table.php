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
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments("id");
            $table->string("invoice_number");
            $table->unsignedInteger("tenant_id");
            $table->foreign('tenant_id')->references('id')->on('tenants');
            $table->unsignedInteger("grand_total");
            $table->date("invoice_date");
            $table->date("invoice_due_date");
            $table->string("status", 255);
            $table->text("opening_paragraph");
            $table->string("contract_number", 15);
            $table->date("contract_date");
            $table->string("addendum_number", 15);
            $table->date("addendum_date");
            $table->string("grand_total_spelled");
            $table->date("materai_date")->nullable();
            $table->mediumText("materai_image")->nullable();
            $table->string("materai_name")->nullable();
            $table->text("term_and_conditions");
            $table->unsignedInteger("bank_id");
            $table->foreign('bank_id')->references('id')->on('banks');
            $table->timestamps();
            $table->date("deleted_at")->nullable();
        });

        Schema::create('invoice_details', function (Blueprint $table) {
            $table->unsignedInteger("invoice_id");
            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->string('item');
            $table->text('description');
            $table->integer("price");
            $table->unsignedInteger("tax_id");
            $table->foreign('tax_id')->references('id')->on('taxes');
            $table->integer("total_price");
            $table->timestamps();
            $table->date("deleted_at")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
        Schema::dropIfExists('invoice_details');
    }
};
