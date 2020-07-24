<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('price');
			$table->text('image')->nullable();
			$table->string('color');
			$table->string('store_size');
			$table->text('description');
			$table->integer('category_id')->unsigned();

		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}