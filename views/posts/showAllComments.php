<?php if (isset($allComments) && is_array($allComments) && count($allComments) !== 0) : ?>
    <h5 class="card-post">Post Title: <?= $allComments[0]['post_title']; ?></h5>

    <?php foreach ($allComments as $Comment) : ?>
        <div class="card card-post">
            <div class="card-header">
                <small class="text-muted">Created on <?= $Comment['date_created']; ?>
                    by <?= $Comment['first_name']; ?> <?= $Comment['last_name']; ?></small>
            </div>
            <div class="card-body">
                <p class="card-text post-text"><?= $Comment['comment_content']; ?></p>
                <!--    only comment author or post_author can delete the post-->
                <?php if (isset($_SESSION['user_id']) && ($_SESSION['user_id'] === $Comment['comment_author'] ||
                        $_SESSION['user_id'] === $Comment['post_author'])) : ?>

                    <div class="btn-group-sm" role="group" aria-label="Basic example">
                        <a class="btn btn-secondary"
                           href='?controller=Comment&action=delete&comment_id=<?= $Comment['comment_id']; ?>'>
                            DELETE
                        </a>
                    </div>
                <?php endif ?>
            </div>
            
        </div>

    <?php endforeach; ?>

<?php else : ?>
    <div class="alert alert-info">This post does not have any comments yet</div>
<?php endif ?>

<div class="btn-group-sm" style="text-align: center;" role="group" aria-label="Create a comment">
    <a class="btn btn-secondary"
       href='?controller=Post&action=read&post_id=<?= $Comment['post_id']; ?>'>
        BACK TO THE POST
    </a>
    <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id']) : ?>
        <a class="btn btn-secondary"
           href='?controller=Comment&action=create&post_id=<?= $_GET['post_id']; ?>'>
            ADD A COMMENT
        </a>
    <?php endif ?>
</div>


