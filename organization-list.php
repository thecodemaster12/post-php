<?php
include 'includes/header.php';
include 'includes/helper-func.php';
?>


<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Organization List</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Organization</a></li>
                        <li class="breadcrumb-item active">Organization List</li>
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
                    <h4 class="card-title">Organization List</h4>
                    <p class="card-title-desc">Some Text</p>    
                    
                    <?php
                        $orgList =  getOrgList(null, $conn);
                        if (mysqli_num_rows($orgList) > 0) {
                            $count = 1;
                            echo "<table class='text-center table table-hover mb-0'>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>";
                                while ($row = mysqli_fetch_assoc($orgList)) {
                                    echo "<tr>
                                    <th>".$count."</th>
                                    <td>".$row ['org_name']."</td>
                                    <td>".$row ['org_address']."</td>
                                    <td>
                                        <a href='".$row ['org_id']."'>Update</a>
                                        <a href='".$row ['org_id']."'>Delete</a>
                                    </td>
                                </tr>";
                                $count++;
                                } 
                            echo "</table>";
                        }
                        else {
                            echo "<p class='text-center fs-4'>No organizations 😔</p>";
                        }

                        mysqli_free_result($orgList);
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