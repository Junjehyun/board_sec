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
        // boards 테이블 생성 : 'board' 테이블은 게시물에 관련된 정보를 저장한다.
        Schema::create('boards', function (Blueprint $table) {
            $table->id(); // 기본키 PK (필수)

            // 사용자 ID에 대한 외래 키 제약 조건 추가
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('title'); // 게시물 제목을 저장하는 문자열 컬럼

            $table->text('content'); // 게시물 내용을 저장하는 텍스트 클럼

            $table->timestamps(); // create_at, updated_at 자동으로 관리 하는 컬럼

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 테이블 삭제
        Schema::dropIfExists('boards');
    }
};
