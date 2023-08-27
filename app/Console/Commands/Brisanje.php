<?php

namespace App\Console\Commands;

use App\Models\Vest;
use Illuminate\Console\Command;

class Brisanje extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:Brisanje';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Brisanje vesti starijih od 7 dana';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Vest::where('Vreme_isteka','<',now())->delete();
        return Command::SUCCESS;
    }
}
