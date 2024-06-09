<?php
include 'includes/header.php';
include 'includes/helper-func.php';
?>


<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Add Post</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Post</a></li>
                        <li class="breadcrumb-item active">Add Post</li>
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
                    <h4 class="card-title">Add Post</h4>
                    <p class="card-title-desc text-center">
                        <?php
                            if (!empty($_SESSION['add-post-error'])) {
                                echo "<span class='text-danger'>".$_SESSION['add-post-error']."</span>";
                                unset($_SESSION['add-post-error']);
                            }
                            elseif(!empty($_SESSION['add-post-success'])){
                                echo "<span class='text-success'>".$_SESSION['add-post-success']."</span>";
                                unset($_SESSION['add-post-success']);
                            }
                        ?>
                    </p>

                    <form class="custom-validation" action="includes/add-post-handel.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label>Post Title</label>
                            <input type="text" name="postTitle" class="form-control" required placeholder="Post title"/>
                        </div>

                        <div class="mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

</div>


<?php
include 'includes/footer.php';
?>

