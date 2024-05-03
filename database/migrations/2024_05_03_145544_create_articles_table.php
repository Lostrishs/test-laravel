<?php

use App\Enums\Database\ArticleEnum;
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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId(ArticleEnum::USER_ID->value)
                ->constrained(table: 'users', indexName: 'user_id_article1')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->enum(
                ArticleEnum::STATUS->value,
                [
                    ArticleEnum::STATUS_REVIEW->value,
                    ArticleEnum::STATUS_PUBLISHED->value,
                    ArticleEnum::STATUS_DECLINED->value,
                ]
            )->default(ArticleEnum::STATUS_REVIEW->value);
            $table->text(ArticleEnum::TEXT->value);
            $table->text(ArticleEnum::TITLE->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
