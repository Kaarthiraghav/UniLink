<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('private_chat_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('private_chat_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->text('message');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('private_chat_messages');
    }
};
