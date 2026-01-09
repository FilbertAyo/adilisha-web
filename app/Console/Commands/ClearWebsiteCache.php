<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class ClearWebsiteCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'website:clear-cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all website caches (application, routes, views, config)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🧹 Clearing all website caches...');
        $this->newLine();

        // Clear application cache
        $this->info('Clearing application cache...');
        Cache::flush();
        Artisan::call('cache:clear');
        $this->info('✅ Application cache cleared');

        // Clear config cache
        $this->info('Clearing config cache...');
        Artisan::call('config:clear');
        $this->info('✅ Config cache cleared');

        // Clear route cache
        $this->info('Clearing route cache...');
        Artisan::call('route:clear');
        $this->info('✅ Route cache cleared');

        // Clear view cache
        $this->info('Clearing view cache...');
        Artisan::call('view:clear');
        $this->info('✅ View cache cleared');

        // Clear compiled classes
        $this->info('Clearing compiled classes...');
        Artisan::call('clear-compiled');
        $this->info('✅ Compiled classes cleared');

        $this->newLine();
        $this->info('✨ All caches cleared successfully!');
        $this->comment('💡 Tip: Run "php artisan website:optimize" to re-optimize for production');
        $this->newLine();

        return Command::SUCCESS;
    }
}
