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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('ip', 45)->nullable();          // supports IPv6
            $table->string('page')->nullable();             // page title  e.g. "Home"
            $table->string('url')->nullable();              // full URL path e.g. "/products/42"
            $table->text('user_agent')->nullable();
            $table->string('browser', 50)->nullable();      // Chrome, Firefox …
            $table->string('platform', 50)->nullable();     // Windows, Mac, Linux …
            $table->string('device', 20)->nullable();       // desktop / mobile / tablet
            $table->string('referer')->nullable();          // where they came from
            $table->string('country', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('session_id', 100)->nullable();  // Laravel session ID
            $table->foreignId('user_id')->nullable()
                  ->constrained()->nullOnDelete();          // if logged in
            $table->timestamps();
 
            /* Indexes for common dashboard queries */
            $table->index('ip');
            $table->index('created_at');
            $table->index(['created_at', 'ip']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
