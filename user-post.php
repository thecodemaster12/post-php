<?php
include 'includes/header-user.php';
?>

<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-sm-0">Posts by <?php
                echo getOrgList($userInfo['user_org'], $conn);
            ?></h3>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Post</a></li>
                    <li class="breadcrumb-item active">Post List</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row g-3 mb-3">

    <?php
$postList = getPostList($userInfo['user_org'], $conn);

if (mysqli_num_rows($postList) > 0) {
while ($row = mysqli_fetch_assoc($postList)) {
echo "
<div class='col-12 col-sm-6 col-md-4'>
    <div class='card position-relative h-100'>
        <div class='card-body'>
            <h5 class='sr-card-title'>".$row['post_title']."</h5>
            <h6 class='sr-card-subtitle mb-3 text-body-secondary'>".$row['project_name']."</h6>
            <p class='card-text mb-5'>".truncatePostContent($row['post_details'])."</p>
            <a type='button' href='user-view-post.php?postId=".$row['post_id']."' class='btn btn-primary p-2 card-link sr-position-end'>View Post</a>
        </div>
    </div>
</div>
";
}
} else {
echo "<h3 class='text-center py-2 text-danger'>No Post Available</h3>";
}

?>

</div>

<?php
include 'includes/footer.php';
?>