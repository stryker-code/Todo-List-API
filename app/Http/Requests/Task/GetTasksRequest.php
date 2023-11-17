<?php

namespace App\Http\Requests\Task;

use App\Enums\TaskPriority;
use App\Enums\TaskStatus;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class GetTasksRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'search' => 'nullable|string|max:1000',
            'priority' => [new Enum(TaskPriority::class)],
            'status' => [new Enum(TaskStatus::class)],
            'created_at' => 'nullable|in:asc,desc',
            'completed_at' => 'nullable|in:asc,desc'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'created_at' => $this->created_at ?? 'asc',
            'completed_at' => $this->completed_at ?? 'asc'
        ]);
    }
}
