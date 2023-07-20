<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Triggers\Trigger;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('unqiue_client_id', 100)->unique();
            $table->foreignId('client_type_id');
            $table->string('email')->unique();
            $table->string('primary_contact_name', 150);
            $table->string('primary_contact_number', 20)->unique();
            $table->string('otp_verifiction_code', 10);
            $table->string('address_line_1', 100);
            $table->string('address_line_2', 100)->nullable();
            $table->foreignId('plan_id')->nullable();
            $table->text('logo')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });

        // trigger_{TABLE}_{TIME}_{EVENT}// Trigger name format

        Trigger::table('clients')->beforeInsert(function () {
            $sql="SET NEW.unqiue_client_id = CONCAT('EVSCH',SUBSTRING(FLOOR(RAND() * 999 + 1000), 2) ,(SELECT count(clients.id) FROM clients)+1), New.otp_verifiction_code=FLOOR(RAND() * 999 + 1000);";
            return $sql;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
