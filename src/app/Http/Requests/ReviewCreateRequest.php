<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewCreateRequest extends FormRequest
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
            "shop_id" => ["required", "exists:regions,id"],
            "rating" => ["required"],
            "comment" => ["required", "string"],
        ];
    }

    public function messages()
    {
        return [
            "shop_id.required" => "店名は必ず指定してください。",
            "rating.required" => "評価は必ず指定してください。",
            "comment.required" => "コメントは必ず指定してください。",
        ];
    }
}
