<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Content</th>
        <th scope="col">Created at</th>
        <th scope="col">Thumbnail</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>


    <?php foreach ($posts as $post): ?>
        <tr>
            <th scope="row"><?= $post->id ?></th>
            <td><?= $post->title ?></td>
            <td><?= mb_substr($post->content, 0, 40) ?></td>
            <td><?= $post->created_at ?></td>
            <td><?php $post->thumbnail;?>
                <a href="<?= IMG_URL . $post->thumbnail ?>"><img src="<?= IMG_URL . $post->thumbnail ?>" title="asd" width="100px" height="100px"/>
                </a>

            <td>

                <a href="<?= url("admin/posts/{$post->id}/edit") ?>" class="btn btn-info">Edit</a>
                <form action="<?= url("admin/posts/{$post->id}/destroy") ?>" method="post">
                    <button class="btn btn-danger">Remove</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
