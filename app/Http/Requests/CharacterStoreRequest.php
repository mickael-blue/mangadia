<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CharacterStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:100'],
            'manga_id' => ['required'],
            'biography' => ['max:255'],
            'picture' => ['image'],
            'picture_path' => ['max:255'],
        ];
    }
}
