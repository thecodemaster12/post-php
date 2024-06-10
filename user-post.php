<?php
include 'includes/header-user.php';
?>

<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Posts</h4>

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

<div class="row">
    <div class="col-12">
        <!-- Left sidebar -->


        <!-- Right Sidebar -->
        <div class="email-rightbar m-0 mb-3">
            
            <div class="card">
                <!-- 
                    /*
                        !Buttons
                    */
                 -->
                <!-- <div class="btn-toolbar p-3" role="toolbar">
                    <div class="btn-group me-2 mb-2 mb-sm-0">
                        <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-exclamation-circle"></i></button>
                        <button type="button" class="btn btn-primary waves-light waves-effect"><i class="far fa-trash-alt"></i></button>
                    </div>
                    <div class="btn-group me-2 mb-2 mb-sm-0">
                        <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-folder"></i> <i class="mdi mdi-chevron-down ms-1"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Updates</a>
                            <a class="dropdown-item" href="#">Social</a>
                            <a class="dropdown-item" href="#">Team Manage</a>
                        </div>
                    </div>
                    <div class="btn-group me-2 mb-2 mb-sm-0">
                        <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-tag"></i> <i class="mdi mdi-chevron-down ms-1"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Updates</a>
                            <a class="dropdown-item" href="#">Social</a>
                            <a class="dropdown-item" href="#">Team Manage</a>
                        </div>
                    </div>

                    <div class="btn-group me-2 mb-2 mb-sm-0">
                        <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            More <i class="mdi mdi-dots-vertical ms-2"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Mark as Unread</a>
                            <a class="dropdown-item" href="#">Mark as Important</a>
                            <a class="dropdown-item" href="#">Add to Tasks</a>
                            <a class="dropdown-item" href="#">Add Star</a>
                            <a class="dropdown-item" href="#">Mute</a>
                        </div>
                    </div>
                </div> -->

                <?php
                    $postList = getPostList($userInfo['user_org'],$conn);

                    if (mysqli_num_rows($postList) > 0) {
                        echo "<ul class='py-4 px-0 m-0'>
                                <li class='post-list-grid m-0'>
                                    <div class='word-wrap'>Post Title</div>
                                    <div class='word-wrap'>Project Title</div>
                                    <div class='word-wrap'>Post Details</div>
                                    <div class='word-wrap'>Date</div>
                                </li>
                        ";
                        while ($row = mysqli_fetch_assoc($postList)) {
                            echo "
                            <a class='text-secondary user-post-list' href='user-view-post.php?postId=".$row['post_id']."'>
                                <li class='post-list-grid'>
                                    <div class='word-wrap'>".$row['post_title']."</div>
                                    <div class='word-wrap'>".$row['project_name']."</div>
                                    <div class='word-wrap'>".$row['post_details']."</div>
                                    <div class='word-wrap'>".$row['post_date']."</div>
                                </li>
                            </a>
                            ";
                        }
                        echo "</ul>";
                    }
                    else
                        echo "<p class='text-center py-2 text-danger'>No Post Available</p>";
                ?>
                
                <!-- <ul class='p-0'>
                    <a href="text-inherit">
                        <li class="post-list-grid">
                                <div class="word-wrap">Post Title Here</div>
                                <div class="word-wrap">Post Title Here</div>
                                <div class="word-wrap">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt veniam iure ut iste accusamus perspiciatis harum rerum, iusto voluptates doloremque modi fuga, facilis, vero omnis dignissimos sunt tempore unde tenetur! Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt veniam iure ut iste accusamus perspiciatis harum rerum, iusto voluptates doloremque modi fuga, facilis, vero omnis dignissimos sunt tempore unde tenetur!Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt veniam iure ut iste accusamus perspiciatis harum rerum, iusto voluptates doloremque modi fuga, facilis, vero omnis dignissimos sunt tempore unde tenetur!</div>
                                <div class="word-wrap">06-June-2024</div>
                            </li>
                    </a>
                </ul> -->

            </div> <!-- card -->

            <div class="row">
                <div class="col-7">
                    Showing 1 - 20 of 1,524
                </div>
                <div class="col-5">
                    <div class="btn-group float-end">
                        <button type="button" class="btn btn-sm btn-success waves-effect"><i class="fa fa-chevron-left"></i></button>
                        <button type="button" class="btn btn-sm btn-success waves-effect"><i class="fa fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>

        </div> <!-- end Col-9 -->

    </div>

</div><!-- End row -->


</div>

<?php
include 'includes/footer-user.php';
?>