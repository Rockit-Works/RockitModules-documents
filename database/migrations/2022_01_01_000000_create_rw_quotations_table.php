<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRwQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rw_quotations', function (Blueprint $table) {
            $table->id();
            $table->nullableMorphs('invoiceable');

            $table->string('receiver_mail')->nullable();

            $table->string('file_path')->nullable();
            $table->json('invoice_data')->nullable(); 
            $table->string('invoice_number')->nullable();
            $table->string('payment_status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
