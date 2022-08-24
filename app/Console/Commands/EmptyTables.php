<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class EmptyTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'empty:tables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Empty Tables';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::table('floor_plane_tables')->update(['free'=>0]);
    }
}
