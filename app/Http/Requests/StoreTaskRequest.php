<?php
namespace App\Http\Requests;

use App\Rules\MaxPendingTasks;
use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'company_id' => 'required|integer|exists:companies,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'user_id' => [
                'required',
                'integer',
                'exists:users,id',
                new MaxPendingTasks(5),
                ]
            ];
    }
}
