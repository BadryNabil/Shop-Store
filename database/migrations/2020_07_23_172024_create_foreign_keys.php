<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('ClientProduct', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('ClientProduct', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('ClientProduct', function(Blueprint $table) {
			$table->dropForeign('ClientProduct_product_id_foreign');
		});
		Schema::table('ClientProduct', function(Blueprint $table) {
			$table->dropForeign('ClientProduct_client_id_foreign');
		});
	}
}