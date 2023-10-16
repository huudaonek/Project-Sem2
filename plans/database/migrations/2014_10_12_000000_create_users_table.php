<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('FullName', 100)->default('')->nullable();
        $table->string('UserName', 100)->default('')->unique();
        $table->string('Phone', 20)->nullable()->unique();
        $table->string('Address', 20)->nullable();
        $table->string('Email', 100)->unique();
        $table->string('Password', 100);
        $table->enum('role', ['user','admin'])->default('user');
        $table->timestamps();
    });
    $this->insertPackageData();
}

    public function down()
    {
        Schema::dropIfExists('users');
    }
    protected function insertPackageData()
    {
        $sampleData = [
            [
                'FullName' => 'User1',
                'UserName' => 'User1',
                'Phone' => '0312659982',
                'Address' => 'Hà Nội',
                'Email' => 'User1@gmail.com',
                'Password' => Hash::make('User11'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'FullName' => 'User2',
                'UserName' => 'User2',
                'Phone' => '0312659972',
                'Address' => 'Hà Nội',
                'Email' => 'User2@gmail.com',
                'Password' => Hash::make('User11'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'FullName' => 'User4',
                'UserName' => 'User4',
                'Phone' => '0312759972',
                'Address' => 'Hà Nội',
                'Email' => 'User4@gmail.com',
                'Password' => Hash::make('User11'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'FullName' => 'User5',
                'UserName' => 'User5',
                'Phone' => '0212659972',
                'Address' => 'Hà Nội',
                'Email' => 'User5@gmail.com',
                'Password' => Hash::make('User11'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'FullName' => 'User6',
                'UserName' => 'User6',
                'Phone' => '0912669972',
                'Address' => 'Hà Nội',
                'Email' => 'User6@gmail.com',
                'Password' => Hash::make('User11'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'FullName' => 'User3',
                'UserName' => 'User3',
                'Phone' => '0712655872',
                'Address' => 'Hà Tây',
                'Email' => 'User3@gmail.com',
                'Password' => Hash::make('User11'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'FullName' => 'User7',
                'UserName' => 'User7',
                'Phone' => '0212674972',
                'Address' => 'Hà Nội',
                'Email' => 'User7@gmail.com',
                'Password' => Hash::make('User11'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'FullName' => 'User8',
                'UserName' => 'User8',
                'Phone' => '0612656972',
                'Address' => 'Hà Nội',
                'Email' => 'User8@gmail.com',
                'Password' => Hash::make('User11'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'FullName' => 'User9',
                'UserName' => 'User9',
                'Phone' => '0112659972',
                'Address' => 'Hà Nội',
                'Email' => 'User9@gmail.com',
                'Password' => Hash::make('User11'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'FullName' => 'admin1',
                'UserName' => 'admin1',
                'Phone' => '0372659972',
                'Address' => 'Hà Nội',
                'Email' => 'admin1@gmail.com',
                'Password' => Hash::make('admin1'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        DB::table('users')->insert($sampleData);
    }
}
