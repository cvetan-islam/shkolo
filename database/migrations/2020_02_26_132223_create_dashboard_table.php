<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDashboardTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('dashboard', function (Blueprint $table) {
      $table->engine = 'MyISAM';
      $table->charset = 'utf8';
      $table->collation = 'utf8_unicode_ci';
      $table->bigIncrements('id');
      $table->string('title')->nullable(false)->unique();
      $table->string('link')->nullable(false)->default('');
      $table->unsignedTinyInteger('color')->nullable(false)->default(0);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('dashboard');
  }
}
