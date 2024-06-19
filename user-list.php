<?php
include 'includes/header.php';
include 'includes/helper-func.php';

if (isset($_GET['userId'])) {
    deleteUser($_GET['userId'],$conn);
}
?>


<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">User List</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                        <li class="breadcrumb-item active">User List</li>
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
                    <h4 class="card-title">User List</h4>   
                    <div class="text-center py-4">
                        <input type="text" name="searchUser" placeholder="Search users..." id="searchItem">
                    </div>

                    <div id='showData'>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

</div>



<?php
include 'includes/footer.php';
?>