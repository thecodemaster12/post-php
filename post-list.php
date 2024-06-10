<?php
include 'includes/header.php';
include 'includes/helper-func.php';

if (isset($_GET['postId'])) {
    deletePost($_GET['postId'], $conn);
}
?>


<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Post List</h4>

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

    <!-- Code Here -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Post List</h4>
                    <p class="card-title-desc">Some Text</p>
                    <div class="text-end">
                        <?php
                        $trashList = getTrashList($conn);
                            if (mysqli_num_rows($trashList) > 0) {
                                echo "<a href='trash.php?trash=post' class='d-inline-block bg-danger text-white p-2 rounded-2'>Trash (".mysqli_num_rows($trashList)." items)</a>";
                            }
                        ?>
                    </div>    
                    
                    <?php
                        $postList =  getPostList(null, $conn);
                        if (mysqli_num_rows($postList) > 0) {
                            $count = 1;
                            echo "<div class='w-100 overflow-auto'>  <table class='text-center table table-hover mb-0'>
                                <thead>
                                    <tr>
                                        <th width='50px'>#</th>
                                        <th width='150px'>Post Title</th>
                                        <th width='150px'>Project Name</th>
                                        <th width='400px'>Post Details</th>
                                        <th width='150px'>Posted By</th>
                                        <th width='100px'>Actions</th>
                                    </tr>
                                </thead>";
                                while ($row = mysqli_fetch_assoc($postList)) {
                                    echo "<tr>
                                    <th width='50px'>".$count."</th>
                                    <td width='150px'>".$row['post_title']."</td>
                                    <td width='150px'>".$row['project_name']."</td>
                                    <td width='400px'>".truncatePostContent($row['post_details'])."</td>
                                    <td width='150px'>".getOrgList($row ['post_by'], $conn)."</td>
                                    <td width='100px'>
                                        <a class='d-inline-block bg-info text-white p-2 m-1 rounded-2' href='view-post-admin.php?postId=".$row ['post_id']."'>View</a>
                                        <a class='d-inline-block bg-primary text-white p-2 m-1 rounded-2' href='update-post.php?postId=".$row ['post_id']."'>Update</a>
                                        <a class='d-inline-block bg-danger text-white p-2 m-1 rounded-2' href='".htmlspecialchars($_SERVER['PHP_SELF'])."?postId=".$row ['post_id']."'>Delete</a>
                                    </td>
                                </tr>";
                                $count++;
                                } 
                            echo "</table> </div>";
                        }
                        else {
                            echo "<p class='text-center fs-4'>No posts 😔</p>";
                        }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

</div>


<?php
include 'includes/footer.php';
?>