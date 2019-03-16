<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('posts', function (Blueprint $table) {
			$table->increments('id');
			$table->string('client_id');
			$table->string('client_email');
			$table->string('title');
			$table->string('slug');
			$table->string('category_name');
			$table->string('subcategory_name');
			$table->string('division_name');
			$table->string('citie_name');
			$table->integer('price')->nullable();
			$table->boolean('negotiation')->nullable();
			$table->string('image1');
			$table->string('image2')->default('');
			$table->string('image3')->default('');
			$table->boolean('featured')->default(0);
			$table->string('status');
			$table->text('body');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('posts');
	}
}
