<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        config(['app.locale' => 'id']);
        \Carbon\Carbon::setLocale('id');

        Str::macro('limitParagraph', function ($value, $limit = 100, $end = '...') {
            $excerpt = Str::limit($value, $limit, $end);
    
            // Find the position of the last paragraph
            $lastParagraphPos = strrpos($excerpt, "</p>");
    
            if ($lastParagraphPos !== false) {
                // Include the last paragraph's closing tag
                $excerpt = substr($excerpt, 0, $lastParagraphPos + 4);
            }
    
            return $excerpt;
        });
    }
}
