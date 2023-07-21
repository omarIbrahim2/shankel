<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class StartEndTimeRule implements Rule
{
    public $startDate , $endDate , $starTime , $endTime;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($startDate , $endDate , $starTime , $endTime)
    {

        $this->startDate = $startDate;

        $this->endDate = $endDate;

        $this->starTime = $starTime;

        $this->endTime = $endTime;

    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $date1 = Carbon::createFromFormat('Y-m-d', $this->startDate);
        $date2 = Carbon::createFromFormat('Y-m-d', $this->endDate);
        $timeStart = Carbon::createFromFormat('H:i:s', $this->starTime);
        $timeEnd =   Carbon::createFromFormat('H:i:s', $this->endTime);

        if ($date1->eq($date2) && $timeEnd < $timeStart ) {

            return false;
        }


        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans("validation.startEndTime");
    }
}
