<?php
include 'includes/header.php';
?>


<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Add Organization</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Organization</a></li>
                        <li class="breadcrumb-item active">Add Organization</li>
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
                    <h4 class="card-title">Add Organization</h4>
                    <p class="card-title-desc text-center">
                    <?php
                            if (!empty($_SESSION['add-org-error'])) {
                                echo "<span class='text-danger'>".$_SESSION['add-org-error']."</span>";
                                unset($_SESSION['add-org-error']);
                            }
                            elseif(!empty($_SESSION['add-org-success'])){
                                echo "<span class='text-success'>".$_SESSION['add-org-success']."</span>";
                                unset($_SESSION['add-org-success']);
                            }
                        ?>
                    </p>

                    <form class="custom-validation" action="includes/add-organization-handel.php" method="post">
                        <div class="mb-3">
                            <label>Name of the Organization</label>
                            <input type="text" name="orgName" class="form-control" required placeholder="Organization Name"/>
                        </div>
                        <div class="mb-3">
                            <label>Address</label>
                            <input type="text" name="orgAddress" class="form-control" required placeholder="Address"/>
                        </div>
                        <div class="mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Submit
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