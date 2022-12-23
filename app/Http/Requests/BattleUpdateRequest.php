<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BattleUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
            'character_1_id' => ['required'],
            'character_2_id' => ['required'],
            'vote_1' => [],
            'vote_2' => [],
            'date_start' => ['required','date'],
            'date_end' => ['required','date'],
        ];
    }
}
