<?php
namespace App\Validators\Posts;

class CreatePostsValidator extends \App\Validators\Base\BaseValidator
{

    protected array $errors = [
        'title_category_error' => 'Name category is not valid',
        'title_name_error' => 'Name post is not valid',
        'description_error' => 'Description is not valid'
    ];

    protected array $rules = [
        'title_category' => '/[\w\s\t\r\n]{5,100}/',
        'title_name' => '/[\w\s\t\r\n]{5,100}/',
        'description' => '/[\w\s\t\r\n]{10,}/'
    ];
}