<?php

namespace Modules\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Blog\Models\Post;

class EditPostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return static::baseRules($this->post);
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

    public static function baseRules(Post $post): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'string',
            'content' => 'required|string',
            'slug' => "required|string|max:256|unique:{$post->getTable()},slug," . $post->id,
            'published_at' => 'nullable|date',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keyword' => '',
            'photo' => 'nullable|image',
            'tags' => 'nullable|array',
        ];
    }
}
