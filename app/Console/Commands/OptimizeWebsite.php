<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class OptimizeWebsite extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'website:optimize';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimize website for production (cache routes, views, config)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🚀 Optimizing website for production...');
        $this->newLine();

        // Clear all caches first
        $this->info('🧹 Clearing existing caches...');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        $this->info('✅ Caches cleared');
        $this->newLine();

        // Cache configurations
        $this->info('⚙️  Caching configuration...');
        Artisan::call('config:cache');
        $this->info('✅ Configuration cached');
        $this->newLine();

        // Cache routes
        $this->info('🛣️  Caching routes...');
        Artisan::call('route:cache');
        $this->info('✅ Routes cached');
        $this->newLine();

        // Cache views
        $this->info('👁️  Caching views...');
        Artisan::call('view:cache');
        $this->info('✅ Views cached');
        $this->newLine();

        // Optimize autoloader
        $this->info('📦 Optimizing autoloader...');
        exec('composer dump-autoload -o 2>&1', $output, $returnCode);
        if ($returnCode === 0) {
            $this->info('✅ Autoloader optimized');
        } else {
            $this->warn('⚠️  Could not optimize autoloader (composer may not be in PATH)');
        }
        $this->newLine();

        $this->info('✨ Website optimization complete!');
        $this->newLine();
        
        $this->comment('📝 Additional recommendations:');
        $this->comment('   - Enable OPcache in PHP configuration');
        $this->comment('   - Use a CDN for static assets');
        $this->comment('   - Enable Gzip compression in web server');
        $this->comment('   - Set up Redis for cache driver (optional)');
        $this->newLine();

        return Command::SUCCESS;
    }
}
