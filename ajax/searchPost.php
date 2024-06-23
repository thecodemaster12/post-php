<?php

include '../includes/helper-func.php';

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $sql = "SELECT * FROM posts WHERE post_status = 1 AND (post_title LIKE '%$name%' OR project_name LIKE '%$name%' OR post_by = (SELECT org_id FROM organizations WHERE org_name LIKE '$name%'))";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $count = 1;
    echo "<div class='w-100 overflow-auto'>  <table class='text-center table table-hover mb-0'>
        <thead>
            <tr>
                <th width='50px'>#</th>
                <th width='150px'>Post Title</th>
                <th width='150px'>Project Name</th>
                <th width='400px'>Post Details</th>
                <th width='150px'>Posted By</th>
                <th width='150px'>Attachment</th>
                <th width='100px'>Actions</th>
            </tr>
        </thead>";
        while ($row = mysqli_fetch_assoc($result)) {
            $postFIle = getFiles($row ['post_id'], $conn);
            echo "<tr>
            <th width='50px'>".$count."</th>
            <td width='150px'>".$row['post_title']."</td>
            <td width='150px'>".$row['project_name']."</td>
            <td width='400px'>".truncatePostContent($row['post_details'])."</td>
            <td width='150px'>".getOrgList($row ['post_by'], $conn)."</td>
            <td width='150px'>".mysqli_num_rows($postFIle)." files</td>
            <td width='100px'>
                <a class='d-inline-block bg-info text-white p-2 m-1 rounded-2' href='view-post-admin.php?postId=".$row ['post_id']."'>View</a>
                <a class='d-inline-block bg-primary text-white p-2 m-1 rounded-2' href='update-post.php?postId=".$row ['post_id']."'>Update</a>
                <a class='d-inline-block bg-danger text-white p-2 m-1 rounded-2' href='includes/delete-handel.php?deletePostId=".$row ['post_id']."'>Delete</a>
            </td>
        </tr>";
        $count++;
        } 
    echo "</table> </div>";
}
else {
    echo "<p class='text-center fs-4'>No posts found 😔</p>";
}
}