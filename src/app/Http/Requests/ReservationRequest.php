<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "number_of_people_booked" => ["required"],
            "date" => ["required","after_or_equal:today"],
            "time" => ["required"],
        ];

    }

    public function messages()
    {
        return[
            "number_of_people_booked.required" => "人数は必ず指定してください。",
            "date.after_or_equal" => "日付には、今日以降の日付を指定してください。",
        ];
    }
}
