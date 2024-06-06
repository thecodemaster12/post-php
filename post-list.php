<?php
include 'includes/header.php';
include 'includes/helper-func.php';
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
                    
                    <?php
                        $postList =  getPostList(null, $conn);
                        if (mysqli_num_rows($postList) > 0) {
                            $count = 1;
                            echo "<table class='text-center table table-hover mb-0'>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Post Title</th>
                                        <th>Project Name</th>
                                        <th>Post Details</th>
                                        <th>Posted By</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>";
                                while ($row = mysqli_fetch_assoc($postList)) {
                                    echo "<tr>
                                    <th>".$count."</th>
                                    <td>".$row ['post_title']."</td>
                                    <td>".$row ['project_name']."</td>
                                    <td>".$row ['post_details']."</td>
                                    <td>".getOrgList($row ['post_by'], $conn)."</td>
                                    <td>
                                        <a href='".$row ['post_id']."'>Update</a>
                                        <a href='".$row ['post_id']."'>Delete</a>
                                    </td>
                                </tr>";
                                $count++;
                                } 
                            echo "</table>";
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