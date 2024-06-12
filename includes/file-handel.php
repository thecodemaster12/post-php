<?php

// if ($_FILES['files']['name'][0] !== "") {
//     $postId = getPostId($postTitle,$postOrg,$conn);
//     uploadFiles($_FILES['files'],$postTitle, $postId ,$conn);
// }

$files = $_FILES['files'];
$hiddenFiles = $_FILES['hiddenFiles'];

highlight_string(var_export($files, true));
highlight_string(var_export($hiddenFiles, true));