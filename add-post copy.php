<?php
include 'includes/header.php';
include 'includes/helper-func.php';
?>


<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Copy</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Post</a></li>
                        <li class="breadcrumb-item active">Copy</li>
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
                    <h4 class="card-title">Copy Post</h4>
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

                    <form class="custom-validation" action="includes/check.php" method="post" enctype="multipart/form-data">


                        <div id="fileInputArea" class="row mb-3">
                            <label>Files</label>
                        </div>
                        <div class="mb-3">
                            <button type="button" id="addInputFile" class='btn btn-info'>Add Files</button>
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