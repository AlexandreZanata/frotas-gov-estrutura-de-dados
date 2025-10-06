<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('vehicle_transfer_histories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('vehicle_transfer_id')->constrained('vehicle_transfers')->cascadeOnDelete();
            $table->foreignUuid('user_id')->nullable()->constrained('users'); // Quem mudou o status

            $table->string('status'); // 'pending', 'approved', 'rejected', 'returned'
            $table->text('notes')->nullable();

            $table->timestamp('created_at')->useCurrent();
        });
    }
    public function down(): void { Schema::dropIfExists('vehicle_transfer_histories'); }
};
