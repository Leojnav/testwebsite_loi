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
		Schema::create('newsitems', function (Blueprint $table) {
			$table->id();
			$table->foreignId('user_id')->constrained()->onDelete('cascade');
			$table->string('title', 100);
			$table->string('tags', 100);
			$table->longText('content', 100);
			$table->string('image')->nullable();
			$table->string('author')->nullable();
			$table->string('email')->unique();
			$table->string('website', 100);
			$table->string("websiteName", 100);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('newsitems');
	}
};
