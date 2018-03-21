<?php

namespace App\Console\Commands;

use App\Parser\FilePaser;
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
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $path = storage_path('app/temp/');
        if (is_dir($path)) {
            if ($dh = opendir($path)) {
                while (($file = readdir($dh)) !== false) {
                    if(filetype($path . $file)=="file"){
                        if(strpos($file,'-')===false) {
                            $filetab = explode('.', $file);
                            rename($path . $file, $path . '-' . $file);
                            $parser = new FilePaser();
                            $parser->loadFile('-'.$file, $path, $filetab[0]);
                            unlink($path . '-' . $file);
                        }
                    }
                }
                closedir($dh);
            }
        }
    }
}
