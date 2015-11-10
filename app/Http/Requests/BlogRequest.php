<?php
/**
 * Created by PhpStorm.
 * User: Kenneth
 * Date: 2015-11-05
 * Time: 10:04 AM
 */

namespace App\Http\Requests;
use App\Http\Requests\Request;

class BlogRequest extends Request
{
    public function authorize() { return true; }
    public function rules()
    {
        return [
            'title' => 'required|min:3',
            'body' => 'required',
            'published_at' => 'required|date',
            'image' => 'mimes:png,jpeg,gif,x-ms-bmp'
        ];
    }
}