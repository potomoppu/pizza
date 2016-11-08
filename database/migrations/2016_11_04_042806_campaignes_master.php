<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CampaignesMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('campaigns_master', function (Blueprint $table) {
          $table->increments('id');//->primary();  //キャンペーンID
          $table->string('campaign_title'); //キャンペーンタイトル
          $table->string('campaign_image'); //キャンペーン画像
          $table->string('campaign_text');  //キャンペーン内容分
          $table->string('campaign_note');  //キャンペーン注意事項
          $table->string('campaign_subject'); //キャンペーン対象者
          $table->dateTime('campaign_start_day'); //キャンペーン開始日
          $table->dateTime('campaign_end_day')->nullable(); //キャンペーン終了日
          $table->timestamps(); //登録日時・更新日時
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaigns_master');
    }
}
