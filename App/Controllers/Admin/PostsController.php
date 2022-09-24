<?php

namespace App\Controllers\Admin;


use App\Models\Category;
use App\Models\Post;
use App\Validators\Posts\CreatePostsValidator;
use App\Services\FileUploaderService;
use Core\View;
use PhpOption\LazyOption;

class PostsController extends BaseController
{

    public function index()
    {
        $posts = Post::all()->get();
        View::render('admin/posts/index', compact('posts')); // ['categories' => $categories]
    }

    public function create()
    {
        View::render('admin/posts/create');
    }

    public function edit (int $id)
    {
        $posts = Post::find($id);
        View::render('admin/posts/edit', compact('posts'));
    }
    public function store()
    {
        $fields = filter_input_array(INPUT_POST, $_POST, true);

        $validator = new CreatePostsValidator();
        if (!$validator->validate($fields)) {
            $validator->getErrors();
        }
        $id = $_SESSION['user_data']['id'];

        extract($fields, EXTR_SKIP);

        $arr_category_id = Category::select(['id'])->where("title", '=', "'$title_category'")->get();

        foreach ($arr_category_id as $value) {
            $category_id = $value->id;
        }

        unset($fields['title_category']);
        $fields += ['author_id' => $id, 'category_id' => $category_id];

        if (!empty($_FILES['image'])) {
            $fields['thumbnail'] = FileUploaderService::upload($_FILES['image']);
        }

        if (Post::create($fields)) {
            redirect('admin/posts');
        } else {
            $_SESSION['posts']['create']['error'] = 'Oops something went wrong';
            redirectBack();
        }
    }

    public function update(int $id)
    {

      $posts = Post::find($id);

        $fields = filter_input_array(INPUT_POST, $_POST, true);

        $posts-> update($fields);
        redirect("admin/posts");


    }
    public function delete($id)
    {

        Post::delete($id);
        redirectBack();
    }
}



