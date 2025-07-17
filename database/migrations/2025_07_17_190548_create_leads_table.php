<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();

            // Optional profile link (client profile)
            $table->foreignId('profile_id')->nullable()->constrained('profiles')->nullOnDelete();

            // Source of the lead: Website, Referral, Matrimonial App, etc.
            $table->string('source')->nullable();

            // Status of the lead
            $table->enum('status', ['New', 'Contacted', 'Qualified', 'Lost'])->default('New');

            // Notes by admin/employee
            $table->text('notes')->nullable();

            // Follow-up reminder
            $table->dateTime('follow_up')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
