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
                    <p class="card-title-desc">Some Text</p>    
                    
                    <?php
                        $userList =  getUserList(null, $conn);
                        if (mysqli_num_rows($userList) > 0) {
                            $count = 1;
                            echo "<div class='w-100 overflow-auto'> <table class='text-center table overflow-y-auto table-hover mb-0'>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Organization</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>";
                                while ($row = mysqli_fetch_assoc($userList)) {
                                    echo "<tr>
                                    <th>".$count."</th>
                                    <td>".$row ['user_name']."</td>
                                    <td>".$row ['user_email']."</td>
                                    <td>".getOrgList($row['user_org'],$conn)."</td>
                                    <td>
                                        <a class='d-inline-block bg-primary text-white p-2 m-1 rounded-2' href='update-post.php?userId=".$row ['user_id']."'>Update</a>
                                        <a class='d-inline-block bg-danger text-white p-2 m-1 rounded-2' href='".htmlspecialchars($_SERVER['PHP_SELF'])."?userId=".$row ['user_id']."'>Delete</a>
                                    </td>
                                </tr>";
                                $count++;
                                } 
                            echo "</table> </div>";
                        }
                        else {
                            echo "<p class='text-center fs-4'>No users 😔</p>";
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