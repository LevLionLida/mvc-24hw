<?php Core\View::render('layout/header', ['admin' => true]);
use App\Models\Category;
?>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="card w-50 mt-5">
                    <h5 class="card-header">Create new post</h5>
                    <div class="card-body">
                        <form action="<?= url('admin/posts/store') ?>" method="POST" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="title"
                                       placeholder="Post name">
                            </div>
                            <div class="mb-3">
                                <label for="title_category" class="form-label">Category</label>

                                <?php $arrCategory=Category::findIn('title' );?>
                                <select multiple class="form-control" id="title_category" name="title_category">
                                   <?php
                                    foreach ($arrCategory as $key =>$value){
                                        ?>    <option><?php echo $value ?> </option> <?php
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Description</label>
                                <textarea name="content" id="content" cols="30" rows="10" class="form-control"
                                          placeholder="Description"></textarea>
                            </div>
                            <div class="mb-3">
                                <input type="file" name="image" class="form-control" id="image">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
Core\View::render('layout/footer');
