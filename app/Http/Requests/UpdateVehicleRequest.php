<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateVehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->type===User::TYPE_COMPANY;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // dd($this->vehicle);
        return [
            'model'=>"required|string",
            // 'number'=>"required|string|unique:vehicles,number",
            'seating_capacity'=>"required|numeric",
            'rent_per_day'=>"required|numeric",
        ];
    }
}
