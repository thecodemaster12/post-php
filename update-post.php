<?php
include 'includes/header.php';
include 'includes/helper-func.php';

?>

<!-- For Post Edit -->
<?php 
    if (isset($_GET['postId'])) {
        $postId = $_GET['postId'];
        ?>
<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Update Post</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Post</a></li>
                        <li class="breadcrumb-item active">Update Post</li>
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
                <p class="card-title-desc text-center">
                        <?php
                            if (!empty($_SESSION['update-success'])) {
                                echo "<span class='text-success'>".$_SESSION['update-success']."</span>";
                                unset($_SESSION['update-success']);
                            }
                        ?>
                    </p>
                    <?php
                        $post =  getPost($postId, $conn);
                        if (mysqli_num_rows($post) > 0) {
                            while ($row = mysqli_fetch_assoc($post)) {
                            ?>
                    <form class="custom-validation" action="includes/update-handel.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="updatePostId" value="<?php echo $row['post_id']?>">
                        <div class="mb-3">
                            <label>Post Title</label>
                            <input type="text" value="<?php echo $row['post_title'] ?>" name="postTitle" class="form-control" required placeholder="Post title"/>
                        </div>

                        <div class="mb-3">
                            <label>Project Name</label>
                            <input type="text" value="<?php echo $row['project_name'] ?>" name="projectName" class="form-control" required placeholder="Project title"/>
                        </div>

                        <div class="mb-3">
                            <label>Post Details</label>
                            <div>
                                <textarea name="postDetails" required class="form-control" rows="5"><?php echo trim($row['post_details']) ?></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label>Organization</label>
                            <div>
                                <?php
                                    $orgList =  getOrgList(null, $conn);
                                    if (mysqli_num_rows($orgList) > 0) {
                                        echo "<select class='form-select' name='postOrg' aria-label='Default select example'>";
                                        while ($org = mysqli_fetch_assoc($orgList)) {
                                            if ($org['org_id'] == $row['post_by']) {
                                                echo "<option selected value='".$org['org_id']."'>".$org['org_name']."</option>";
                                            }
                                            else
                                                echo "<option value='".$org['org_id']."'>".$org['org_name']."</option>";
                                        }
                                        echo "</select>";
                                    }
                                    else {
                                        echo "No Org Found";
                                    }
                                    
                                ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label>Files</label>
                            <div>
                            <?php
                            if (isset($_GET['postFileId'])) {
                                deletePostFile($_GET['postFileId'], $conn);
                                unlink(dirname(__FILE__) . "/uploads/" . $_GET['postFileName']);
                            }
                                $postFiles = getFiles($_GET['postId'], $conn);
                                if (mysqli_num_rows($postFiles) > 0) {
                                    while ($row = mysqli_fetch_assoc($postFiles) ) {
                                        // echo "<a class='d-inline-block m-1' href='uploads/".$row['post_files_names']."'>".$row['post_files_names']."</a> <button type='button' class='btn btn-danger'>X</button><br>";
                                        echo "<div class='d-flex justify-content-between align-items-center mb-2'><a href='uploads/".$row['post_files_names']."'>".$row['post_files_names']."</a> <a href='".$_SERVER['PHP_SELF']."?postFileId=".$row['post_files_id']."&postId=".$postId."&postFileName=".$row['post_files_names']."' type='button' class='btn btn-danger'>X</a></div>";
                                    }
                                }
                                else
                                    echo "No was File Attached";
                            ?>
                            </div>
                        </div>
                        

                        <div id="fileInputArea" class="row mb-3">
                            <label>Files</label>
                        </div>
                        <div class="mb-3">
                            <button type="button" id="addInputFile" class='btn btn-info'>Add Files</button>
                        </div>

                        <div class="mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                            <?php
                            }
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
}
?>

<!-- For User Edit -->
<?php
    if (isset($_GET['userId'])) {
        $userId = $_GET['userId'];
        $user = getUserList($userId, $conn);
        while ($row = mysqli_fetch_assoc($user)) {
            
        ?>
<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Add User</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                        <li class="breadcrumb-item active">Add User</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <!-- 
        /* 
        ! Code Here
        */
    -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add User</h4>
                    <p class="card-title-desc text-center ">
                        <?php
                            if (!empty($_SESSION['update-error'])) {
                                echo "<span class='text-danger'>".$_SESSION['update-error']."</span>";
                                unset($_SESSION['update-error']);
                            }
                        ?>
                    </p>

                    <!-- 
                        /* 
                            TODO Form Start
                        */
                    -->
                    <form class="custom-validation" action="includes/update-handel.php" method="post">
                        <input type="hidden" name="updateUserId" value="<?php echo $row['user_id']?>">
                        <div class="mb-3">
                            <label>User Name</label>
                            <input type="text" value="<?php echo $row['user_name']?>" name="userName" class="form-control" required placeholder="Name"/>
                        </div>

                        <div class="mb-3">
                            <label>E-Mail</label>
                            <div>
                                <input type="email" value="<?php echo $row['user_email']?>" name="userEmail" class="form-control" required parsley-type="email" placeholder="Enter a valid e-mail"/>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <div>
                                <input type="password" value="<?php echo $row['user_pass']?>" name="userPass" id="pass2" class="form-control" required placeholder="Password"/>
                            </div>
                            <div class="mt-2">
                                <input type="password" value="<?php echo $row['user_pass']?>" name="userConfPass" class="form-control" required data-parsley-equalto="#pass2" placeholder="Re-Type Password"/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label>Organization</label>
                            <div>
                                <?php
                                    $orgList =  getOrgList(null, $conn);
                                    if (mysqli_num_rows($orgList) > 0) {
                                        echo "<select class='form-select' name='userOrg' aria-label='Default select example'>";
                                        while ($org = mysqli_fetch_assoc($orgList)) {
                                            if ($row['user_org'] == $org['org_id']) {
                                                echo "<option selected value='".$org['org_id']."'>".$org['org_name']."</option>";
                                            }
                                            else
                                                echo "<option value='".$org['org_id']."'>".$org['org_name']."</option>";
                                        }
                                        echo "</select>";
                                    }
                                    else {
                                        echo "No Org Found";
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>

                                        <!-- 
                        /* 
                            TODO Form End
                        */
                    -->

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

</div>
        <?php
        }
    }
?>

<!-- For Organization Edit -->
<?php
if (isset($_GET['orgId'])) {
    $orgId = $_GET['orgId'];
    $sql = "SELECT * FROM organizations WHERE org_id = $orgId";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
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

                    <form class="custom-validation" action="includes/update-handel.php" method="post">
                        <input type="hidden" name="updateOrgId" value="<?php echo $row['org_id']?>">
                        <div class="mb-3">
                            <label>Name of the Organization</label>
                            <input type="text" value="<?php echo $row['org_name']?>" name="orgName" class="form-control" required placeholder="Organization Name"/>
                        </div>
                        <div class="mb-3">
                            <label>Address</label>
                            <input type="text" value="<?php echo $row['org_address']?>" name="orgAddress" class="form-control" required placeholder="Address"/>
                        </div>
                        <div class="mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Update
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
}
?>



<?php
    include 'includes/footer.php';
?>