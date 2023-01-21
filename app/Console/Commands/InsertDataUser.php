<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class InsertDataUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert Data ke Users Tabel';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 10; $i++){
            DB::table('users_tabel')->insert([
                'nama' => $faker->name,
                'email' => $faker->Unique()->safeEmail(),
                'password' => Hash::make($faker->name),
            ]);
        }

        $this->info('| Data berhasil ditambahkan |');

    }    
}
