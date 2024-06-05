<?php
include 'includes/header.php';
include 'includes/helper-func.php';
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
                        $userList =  getUserList($conn);
                        if (mysqli_num_rows($userList) > 0) {
                            $count = 1;
                            echo "<table class='text-center table table-hover mb-0'>
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
                                        <a href='".$row ['user_id']."'>Update</a>
                                        <a href='".$row ['user_id']."'>Delete</a>
                                    </td>
                                </tr>";
                                $count++;
                                } 
                            echo "</table>";
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