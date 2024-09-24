<?php
/**
 * ThemeRepo.php
 *

 * @created    2023-02-06 17:06:11
 * @modified   2023-02-06 17:06:11
 */

namespace Beike\Repositories;

use Illuminate\Support\Str;

class ThemeRepo
{
    public static function getAllThemes()
    {
        $path       = base_path('themes');
        $themePaths = glob($path . '/*');
        $themes     = [];
        foreach ($themePaths as $themePath) {
            $theme    = trim(str_replace($path, '', $themePath), '/');
            $themes[] = [
                'value' => $theme,
                'label' => Str::studly($theme),
            ];
        }

        return $themes;
    }
}
