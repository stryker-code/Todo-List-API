<?php

namespace App\Http\Requests\Task;

use App\Enums\TaskPriority;
use App\Enums\TaskStatus;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateTaskRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'status' => [new Enum(TaskStatus::class)],
        ];

        if ($this->getMethod() !== 'PATCH') {
            $rules['title'] = 'required|string|max:255';
            $rules['description'] = 'required|string|max:1000';
            $rules['priority'] = [new Enum(TaskPriority::class)];
        }

        return $rules;
    }
}
