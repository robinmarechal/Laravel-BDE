<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
            $table->rememberToken();
			$table->string('first_name', 255);
			$table->string('last_name', 255);
			$table->string('password', 60);
			$table->tinyInteger('level')->unsigned()->index()->default('0');
			$table->string('email', 255)->unique();
			$table->tinyInteger('school_year')->nullable();
			$table->integer('department_id')->unsigned();
			$table->boolean('validated')->default(0);
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}