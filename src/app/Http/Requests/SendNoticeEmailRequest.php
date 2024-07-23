<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendNoticeEmailRequest extends FormRequest
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
            "email" => ["required"],
            "subject" => ["required","string"],
            "text-body" => ["required","string"],
        ];
    }

    public function messages()
    {
        return [
            "email.required" => "送り先は必ず指定してください。",
            "subject.required" => "件名は必ず指定してください。",
            "text-body.required" => "メール本文は必ず指定してください。",
        ];
    }
}
