<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
 {
     public function up()
     {
         Schema::create('products', function (Blueprint $table) {
             $table->id();
             $table->string('name');
             $table->integer('price');
             $table->string('description');
             $table->string('available');
             $table->enum('category', ['bonsai', 'indoor-plants', 'outdoor-plants', 'tools']);
             $table->timestamps();
   });
   $this->insertPackageData();

}
 protected function insertPackageData()
{
    $sampleData = [];

    for ($i = 1; $i <= 20; $i++) {
        $sampleData[] = [
            'name' => 'bonsai' . $i,
            'price' => rand(50, 100),
            'description' => 'Đây là sản phẩm của Bonsai '. $i,
            'category' => 'bonsai',
            'available' => rand(20,100).' có sẵn',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    for ($i = 1; $i <= 20; $i++) {
        $sampleData[] = [
            'name' => 'indoor-plants' . $i,
            'price' => rand(50, 100),
            'description' => 'Đây là sản phẩm của Bonsai '. $i,
            'category' => 'indoor-plants',
            'available' => rand(20,100).' có sẵn',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    for ($i = 1; $i <= 20; $i++) {
        $sampleData[] = [
            'name' => 'outdoor-plants' . $i,
            'price' => rand(50, 100),
            'description' => 'Đây là sản phẩm của Bonsai '. $i,
            'category' => 'outdoor-plants',
            'available' => rand(20,100).' có sẵn',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    for ($i = 1; $i <= 20; $i++) {
        $sampleData[] = [
            'name' => 'tools' . $i,
            'price' => rand(50, 100),
            'description' => 'Đây là sản phẩm của Bonsai '. $i,
            'category' => 'tools',
            'available' => rand(20,100).' có sẵn',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
    DB::table('products')->insert($sampleData);
}


     public function down()
         {
        Schema::dropIfExists('products');
    }
}
