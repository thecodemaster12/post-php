<?php
include './includes/header-user.php';
?>

<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Dashboard</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- Code Here -->
     <p class="fw-bolder font-size-15"><?php echo date("D, d-M-Y");?></p>
    <h4 class='mb-4'>Hello <?php echo $userInfo['user_name']?>, <br> Welcome to Dashboard</h4>

    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-truncate font-size-14 mb-2">Total Posts</p>
                            <h4 class="mb-2">
                                <?php 
                                    $postList = getPostList($userInfo['user_org'], $conn);
                                    echo mysqli_num_rows($postList);
                                    mysqli_free_result($postList);
                                ?>
                            </h4>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-light text-primary rounded-3">
                                <i class="ri-edit-line font-size-24"></i>  
                            </span>
                        </div>
                    </div>                                            
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->

    </div><!-- end row -->


</div>

<?php
include './includes/footer.php';
?>