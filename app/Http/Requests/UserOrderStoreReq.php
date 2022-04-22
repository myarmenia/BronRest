<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserOrderStoreReq extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'restaurant_id' => 'required|integer',
            'floor_plane_id' => 'required|integer',
            'floor_plane_x' => 'required|integer',
            'floor_plane_y' => 'required|integer',
            'coming_date' => 'date',
            'people_nums' => 'nullable|integer',
            'menus.*' => 'nullable'
        ];
    }
}
