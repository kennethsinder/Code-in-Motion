<?php
/**
 * Created by PhpStorm.
 * User: Kenneth
 * Date: 2015-11-12
 * Time: 12:15 PM
 */

namespace App\Http\Requests;


class ProjectRequest extends Request
{
    public function authorize() { return true; }
    public function rules()
    {
        return [
            'image' => 'mimes:png,jpeg,gif,x-ms-bmp',
            'name' => 'required|min:4',
            'excerpt' => 'required|min:4',
            'description' => 'required|min:4',
            'github' => '',
            'date_created' => 'required|date'
        ];
    }
}