<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Permits extends Migration {

	public function up()
	{
		/* Tabel grades*/
		Schema::create('grades', function (Blueprint $table)
		{
			$table->increments('id');
			$table->integer('uid');
			$table->date('masuk_kerja')->nullable();
			$table->string('nilai', 500);
			$table->integer('jumlah_nilai');
			$table->string('comments', 2000)->nullable();
			$table->string('kelebihan', 500)->nullable();
			$table->string('peningkatan', 500)->nullable();
			$table->string('note', 500)->nullable();
			$table->string('rencana_peningkatan', 500)->nullable();
			$table->string('voter_comments', 500)->nullable();
			$table->integer('voter_uid');
			$table->timestamps();
		});

		/* Tabel notifications*/
		Schema::create('notifications', function (Blueprint $table)
		{
			$table->increments('id');
			$table->integer('recepient_id')->nullable();
			$table->integer('sender_id')->nullable();
			$table->string('activity', 50)->nullable();
			$table->string('object', 50)->nullable();
			$table->integer('object_id')->nullable();
			$table->smallInteger('status')->nullable();
			$table->timestamp('created_at');
		});

		/* Tabel rules*/
		Schema::create('rules', function (Blueprint $table)
		{
			$table->increments('id');
			$table->integer('uid')->nullable();
			$table->integer('parent_uid')->nullable();
		});

		/* Tabel logevents*/
		Schema::create('logevents', function (Blueprint $table)
		{
			$table->increments('id');
			$table->integer('uid')->nullable();
			$table->string('ip', 50)->nullable();
			$table->string('object_type', 20)->nullable();
			$table->string('object_action', 20)->nullable();
			$table->string('object_id', 20)->nullable();
			$table->string('object_value', 20)->nullable();
			$table->string('status', 50)->nullable();
			$table->timestamp('created_at');
		});

		/* Tabel permits */
		Schema::create('permits', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('types', 50); /* Jenis */
			$table->integer('uid'); /* User id */
			$table->integer('propose_uid')->nullable(); /* Yang diajukan */
			$table->dateTime('start_date'); /* Tanggal mulai */
			$table->dateTime('finish_date')->nullable(); /* Tanggal selesai */
			$table->string('task', 500); /* Tugas / jenis cuti */
			$table->string('venue', 100)->nullable(); /* Tempat/lokasi */
			$table->string('note', 500)->nullable(); /* Catatan */

			$table->integer('auth_uid')->nullable(); /* User id yang diberi wewenang */
			
			$table->string('address', 300)->nullable(); /* Alamat lengkap selama cuti/libur (tugas lembur)*/
			$table->string('hak_cuti', 50)->nullable();
			$table->string('sisa_cuti', 50)->nullable();
			$table->date('start_work')->nullable(); /* Mulai kerja (cuti) */

			$table->string('transportasi', 50)->nullable(); /* Uang transportasi (lembur)*/
			$table->string('makan', 50)->nullable(); /* Uang makan (lembur)*/
			$table->boolean('lintas_divisi')->nullable(); /* Lintas divisi (lembur)*/
			$table->string('auth_task', 500)->nullable(); /* Tugas yang dialihkan (dinas)*/
			$table->timestamps();
		});

		/* Table User */
		Schema::create('users', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 200);
			$table->string('username', 200)->unique();
			$table->string('email', 200)->unique();
			$table->string('phone', 200)->nullable();
			$table->string('division', 100)->nullable();
			$table->string('position', 100)->nullable();
			$table->smallInteger('level');
			$table->smallInteger('status');
			$table->string('parent_uid', 500)->nullable();
			$table->string('child_uid', 500)->nullable();
			$table->string('password', 100);
			$table->string('remember_token', 100)->nullable();
			$table->string('activate_key', 100)->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('grades');
		Schema::drop('notifications');
		Schema::drop('rules');
		Schema::drop('logevents');
		Schema::drop('permits');
		Schema::drop('users');
	}

}
