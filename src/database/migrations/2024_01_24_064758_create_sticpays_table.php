<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSticpaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sticpays', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('type')->nullable()->comment("0 => Deposit, 1 => Withdraw, 2 => Refund");
            $table->bigInteger('client_id')->nullable();
            $table->string('txn_id')->unique()->nullable();
            $table->decimal('amount')->nullable();
            $table->string('payment_currency')->nullable();
            $table->string('ip_address', 255)->nullable();
            $table->string('interface_version')->nullable();
            $table->text('product_info_json')->nullable();
            $table->text('response_json')->nullable();
            $table->text('status')->default(0)->comment("0 => Pending, 1 => Processing, 2 => Success, 3 => Failed, 4 => Cancelled");
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
        Schema::dropIfExists('sticpays');
    }
}
