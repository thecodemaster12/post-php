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
                    <div class="text-center py-4">
                        <input class='sr-search' type="text" name="searchUser" placeholder="Search users..." id="searchItem">
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

<script>
    // for users
$(document).ready(function () {
    $.ajax({
        url: "ajax/showdata.php",
        method: 'POST',
        // data:{show:show},

        success: function (data) {
            $("#showData").html(data);
        }
    });
    $("#searchItem").keyup(function () {
        var name = $(this).val();
        // alert(name);

        if (name != '') {
            $.ajax({
                url: "ajax/livesearch.php",
                method: 'POST',
                data: { name: name },

                success: function (data) {
                    $("#showData").html(data);
                }
            });
        }
        else {
            $.ajax({
                url: "ajax/showdata.php",
                method: 'POST',
                // data:{show:show},

                success: function (data) {
                    $("#showData").html(data);
                }
            });
        }
    });
});
</script>