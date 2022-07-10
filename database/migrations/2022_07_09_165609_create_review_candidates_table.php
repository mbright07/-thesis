<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_candidates', function (Blueprint $table) {
            $table->id();
            $table->integer('rating');
            $table->text('comment');
            $table->bigInteger('recruitment_job_id')->nullable()->unsigned();
            $table->timestamps();
            $table->foreign('recruitment_job_id')->references('id')->on('recruitment_jobs')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review_candidates');
    }
}
