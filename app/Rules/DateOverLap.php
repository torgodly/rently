<?php

namespace App\Rules;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DateOverLap implements ValidationRule
{
    protected $record;

    public function __construct($record)
    {
        $this->record = $record;
    }

    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $unavailableDates = $this->record->getUnavailableDatesAttribute();
        $dates = $this->getDatesFromRange($value);
        foreach ($dates as $date) {
            if (in_array($date, $unavailableDates)) {
                $fail(__("The selected date range overlaps with unavailable dates."));
                return;
            }
        }
    }

    protected function getDatesFromRange($value)
    {
        // Assuming $value is in the format "01/07/2024 - 31/07/2024"
        list($start, $end) = explode(' - ', $value);

        $startDate = Carbon::createFromFormat('d/m/Y', trim($start));
        $endDate = Carbon::createFromFormat('d/m/Y', trim($end));
        $period = CarbonPeriod::create($startDate, $endDate);

        // Convert the period to an array of date strings in the same format as unavailable dates
        return array_map(function ($date) {
            return $date->format('Y-m-d');
        }, iterator_to_array($period));
    }
}
