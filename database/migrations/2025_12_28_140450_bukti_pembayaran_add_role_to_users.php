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
        Schema::table('users', function (Blueprint $table) {
    $table->enum('role', ['admin', 'agen', 'customer'])->default('customer');
});
    }

    /**
     * Reverse the migrations.
     */
    public function handle($request, Closure $next, $role)
{
    if (auth()->user()->role !== $role) {
        abort(403);
    }
    return $next($request);
}

};
