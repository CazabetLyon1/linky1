<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class importFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import-files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importe les fichiers de données des utilisateurs';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        //for fichier temp
        var_dump(opendir(storage_path('app/temp/')));
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
    }
}
