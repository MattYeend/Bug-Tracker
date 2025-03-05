<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBugRequest extends FormRequest
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
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('bugs', 'title')->where('project_id', $this->project_id),
            ],
            'description' => 'required|string|max:5000', // Limiting to 5000 characters
            'status' => 'required|in:open,in_progress,resolved',
            'project_id' => 'required|exists:projects,id',
            'user_id' => [
                'required',
                'exists:users,id',
                Rule::exists('project_users', 'user_id')->where('project_id', $this->project_id),
            ],
            'created_by' => 'nullable|exists:users,id',
            'updated_by' => 'nullable|exists:users,id',
        ];
    }
}
