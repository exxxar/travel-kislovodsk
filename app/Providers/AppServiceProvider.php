<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // dd(Auth::user());

        /*Blade::directive('customVite', function (...$expressions) {

            $path = public_path() . "\\build\\manifest.json";

            $jsonData = (array)json_decode(file_get_contents($path));

            $type = str_ends_with($expression, '.css') ? 'css' : 'js';

            $css = [];

            if (isset($jsonData[$expression]->css)) {
                foreach ($jsonData[$expression]->css as $item)
                    array_push($css, $item);
            }
            $resultLink = $jsonData[$expression]->file;

            if ($type==='css')
                $resultLink = `<link rel="stylesheet" href="$resultLink"/>`;

            dd($resultLink);
            return "<?php echo $resultLink; ?>";
        });*/
    }
}
