<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigrateInOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate_in_order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute the migrations in the order specified in the file app/Console/Comands/MigrateInOrder.php \n Drop all the table in db before execute the command.';

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
     * @return mixed
     */
    public function handle()
    {
       /** Specify the names of the migrations files in the order you want to 
        * loaded
        * $migrations =[ 
        *               'xxxx_xx_xx_000000_create_nameTable_table.php',
        *    ];
        */
        $migrations = [ 
                        '0001_01_01_000000_create_users_table.php',
                        '0001_01_01_000000_create_users_table.php',
                        '0001_01_01_000001_create_cache_table.php', 
                        '0001_01_01_000002_create_jobs_table.php', 
                        '2024_05_19_114613_create__customers.php', 
                        '2024_05_19_114620_create_kamar.php', 
                        '2024_05_19_114642_create_reservasi.php', 
                        '2024_05_19_114628_create_invoice.php', 
                        '2024_05_19_114635_create_hotel.php', 
                        '2024_05_19_114648_create_pembayaran.php',
        ];

//         $migrations = [ 
//             '0001_01_01_000000_create_users_table.php',
//             '0001_01_01_000000_create_users_table.php',
//             '0001_01_01_000001_create_cache_table.php', 
//             '0001_01_01_000002_create_jobs_table.php', 
//             '2024_05_19_114613_create__customers.php', 
//             '2024_05_19_114620_create_kamar.php', 
//             '2024_05_19_114628_create_invoice.php', 
//             '2024_05_19_114635_create_harga_hari_ini.php', 
//             '2024_05_19_114642_create_reservasi.php', 
//             '2024_05_19_114648_create_pembayaran.php',
//             '2014_10_12_000000_create_users_table.php',
//             '2014_10_12_100000_create_password_resets_table.php',
//             '2019_08_19_000000_create_failed_jobs_table.php'
// ];
        foreach($migrations as $migration)
        {
           $basePath = 'database/migrations/';          
           $migrationName = trim($migration);
           $path = $basePath.$migrationName;
           $this->call('migrate:refresh', [
            '--path' => $path ,            
           ]);
        }
    }
} 