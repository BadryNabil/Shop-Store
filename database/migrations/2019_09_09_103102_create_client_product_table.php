<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientProductTable extends Migration {

	public function up()
	{
		Schema::create('ClientProduct', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('product_id')->unsigned();
			$table->integer('client_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('ClientProduct');
	}
}