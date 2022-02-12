<?php

use App\Models\Transaction;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('user_name');
            $table->integer('coin_id');
            $table->string('coin_symbol');
            $table->string('transaction_hash')->nullable();
            $table->string('internal_id')->nullable();
            $table->string('transaction_url')->nullable();
            $table->string('price_per_coin')->nullable();
            $table->string('amount')->nullable();
            $table->string('amount_usd')->nullable();
            $table->string('transaction_status')->nullable();
            $table->boolean('transaction_confirmed')->default(false);
            $table->integer('confirmations_needed')->nullable();
            $table->integer('confirmations')->nullable();
            $table->timestamp('transaction_created_at')->nullable();
            $table->string('from_address')->nullable();
            $table->string('to_address')->nullable();
            $table->string('locked_rate')->nullable();
            $table->string('payout_amount')->nullable();
            $table->string('payout_usd_amount')->nullable();
            $table->string('payout_network')->nullable();
            $table->string('payout_number')->nullable();
            $table->boolean('info_confirmed')->default(false);
            $table->timestamp('info_confirmed_at')->nullable();
            $table->boolean('payment_complete')->default(false);
            $table->timestamp('paid_at')->nullable();
            $table->string('status')->default(Transaction::TRANSACTION_STATUS_PENDING);
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
        Schema::dropIfExists('transactions');
    }
}
