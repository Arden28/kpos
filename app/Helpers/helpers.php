<?php

// if (!function_exists('module')) {
//     function module() {
//         $module = Nwidart\Modules\Facades\Module::find('Pos');

//         return $module;
//     }
// }

// Cache Pos Session

use Bpuig\Subby\Models\Plan;
use Bpuig\Subby\Models\PlanSubscription;
use Illuminate\Support\Facades\Auth;

if (!function_exists('pos')) {
    function pos() {
        $pos = cache()->remember('pos', 24*60, function () {
            return \Modules\Pos\Entities\Pos::find(session('pos_session'))
            ->where('company_id', Auth::user()->currentCompany->id)
            ->first();
        });

        return $pos;
    }
}

if (!function_exists('standard')) {
    function standard() {

        // Get the plan you want to check for
        $standardMonth = Plan::find(1);
        $standardYear = Plan::find(2);

        $mediumMonth = Plan::find(3);
        $mediumYear = Plan::find(4);

        // Get the subscription for the authenticated user and plan
        $standard = PlanSubscription::where('subscriber_id', Auth::user()->team->id)
        ->whereIn('plan_id', [$standardMonth->id, $standardYear->id, $mediumMonth->id, $mediumYear->id])
        ->first();

        return $standard;

    };


}

if (!function_exists('medium')) {
    function medium() {

        // Get the plan you want to check for
        $mediumMonth = Plan::find(3);
        $mediumYear = Plan::find(4);

        $enterpriseMonth = Plan::find(5);
        $enterpriseYear = Plan::find(6);

        // Get the subscription for the authenticated user and plan
        $medium = PlanSubscription::where('subscriber_id', Auth::user()->team->id)
        ->whereIn('plan_id', [$mediumMonth->id, $mediumYear->id, $enterpriseMonth->id, $enterpriseYear->id])
        ->first();

        return $medium;

    };


}

if (!function_exists('enterprise')) {
    function enterprise() {

        // Get the plan you want to check for
        $standardMonth = Plan::find(1);
        $standardYear = Plan::find(2);

        $mediumMonth = Plan::find(3);
        $mediumYear = Plan::find(4);

        $enterpriseMonth = Plan::find(5);
        $enterpriseYear = Plan::find(6);

        // Get the subscription for the authenticated user and plan
        $enterprise = PlanSubscription::where('subscriber_id', Auth::user()->team->id)
        ->whereIn('plan_id', [$standardMonth->id, $standardYear->id, $mediumMonth->id, $mediumYear->id, $enterpriseMonth->id, $enterpriseYear->id])
        ->first();

        return $enterprise;

    };

}


// Penser à mettre les information sur l'entreprise en cache, afin de permettre un chargement rapide

if (!function_exists('settings')) {
    function settings() {
        $settings = cache()->remember('settings', 24*60, function () {
            return \Modules\Setting\Entities\Setting::where('company_id', Auth::user()->currentCompany->id)
            ->first();
        });

        return $settings;
    }
}

if (!function_exists('format_currency')) {
    function format_currency($value, $format = true) {
        if (!$format) {
            return $value;
        }

        $settings = settings();
        $position = $settings->default_currency_position;
        $symbol = $settings->currency->symbol;
        $decimal_separator = $settings->currency->decimal_separator;
        $thousand_separator = $settings->currency->thousand_separator;

        if ($position == 'prefix') {
            $formatted_value = $symbol . number_format((float) $value, 2, $decimal_separator, $thousand_separator);
        } else {
            $formatted_value = number_format((float) $value, 2, $decimal_separator, $thousand_separator) . $symbol;
        }

        return $formatted_value;
    }
}

if (!function_exists('make_reference_id')) {
    function make_reference_id($prefix, $number) {
        $padded_text = $prefix . '-' . str_pad($number, 5, 0, STR_PAD_LEFT);

        return $padded_text;
    }
}

if (!function_exists('array_merge_numeric_values')) {
    function array_merge_numeric_values() {
        $arrays = func_get_args();
        $merged = array();
        foreach ($arrays as $array) {
            foreach ($array as $key => $value) {
                if (!is_numeric($value)) {
                    continue;
                }
                if (!isset($merged[$key])) {
                    $merged[$key] = $value;
                } else {
                    $merged[$key] += $value;
                }
            }
        }

        return $merged;
    }
}
