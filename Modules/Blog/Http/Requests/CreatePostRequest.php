<?php

namespace Modules\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return static::baseRules();
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public static function baseRules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'string',
            'content' => 'required|string',
            'slug' => 'required|string|max:255',
            'published_at' => 'nullable|date',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keyword' => '',
            'selectedCategories' => 'required|array',
            'photo' => 'nullable|image',
            'tags' => 'nullable|array',
        ];
    }
}
