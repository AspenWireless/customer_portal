<?php

use App\Services\LanguageService;
use Carbon\Carbon;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

/**
 * Get the user object from the session
 *
 * @return mixed|null
 */
function get_user()
{
    if (! Session::has('user')) {
        return null;
    }

    return Session::get('user');
}

/**
 * Convert bytes to gigabytes
 *
 * @return string
 */
function bytes_to_gigabytes($value)
{
    return round($value / 1000 ** 4, 2).'GB';
}

/**
 * Get the configured languages on the system
 *
 * @param  string  $language
 * @return array
 */
function getAvailableLanguages($language = 'en')
{
    $languages = [];
    $dirs = glob(base_path('lang/*'));
    foreach ($dirs as $dir) {
        $boom = explode('/', $dir);
        if (strlen($boom[count($boom) - 1]) === 2) {
            $languages[$boom[count($boom) - 1]] = trans('languages.'.$boom[count($boom) - 1], [], $language);
        }
    }

    return $languages;
}

/**
 * Returns a list of state codes
 *
 * @return array
 */
function getStateCodes()
{
    return explode("|", "AA|AE|AK|AL|AP|AR|AS|AZ|CA|CO|CT|DE|DC|FL|FM|GA|GU|HI|IA|ID|IL|IN|KS|KY|LA|MA|MD|ME|MH|MI|MN|MO|MP|MS|MT|NC|ND|NE|NH|NJ|NM|NV|NY|OH|OK|OR|PA|PR|PW|RI|SC|SD|TN|TX|UM|UT|VA|VI|VT|WA|WI|WV|WY");
}

/**
 * Get the selectable plans from .env file
 *
 * @return array
 */
function getSelectablePlans()
{
    // $envPlans = getenv('SELECTABLE_PLANS');
    $envPlans = "89:1:Little Nest 1 Gig;88:2:Soaing Eagle 10 Gig";

    $planArray = explode(";", $envPlans);

    $output = [];
    $output["88:2"] = "Soaring Eagle 10 Gig";
    $output["89:1"] = "Little Nest 1 Gig";
    return $output;
}

/**
 * Translate to the user language
 *
 * @param  $request
 */
function utrans(string $string, array $variables = [], $request = null): mixed
{
    /** @var LanguageService $languageService */
    $languageService = App::make(LanguageService::class);
    $language = $languageService->getUserLanguage($request);

    return trans($string, $variables, $language);
}

/**
 * Convert expiration date ("12/96") to year and month [12, 96]
 *
 * @returns list<string>
 */
function convertExpirationDateToYearAndMonth(string $date): array
{
    $date = trim($date);
    $boom = explode('/', $date);

    $month = rtrim($boom[0]);
    $year = ltrim($boom[1]);

    if (strlen($year) == 2) {
        $now = Carbon::now(config('app.timezone'));
        $year = substr((string)$now->year, 0, 2).$year;
    }

    return [$year, $month];
}
