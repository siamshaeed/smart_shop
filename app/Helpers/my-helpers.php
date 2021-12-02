<?php
//image upload
function imageUpload($image, $directory)
{
    $name = $image->getClientOriginalName();
    $image->move($directory, $name);
    return $directory . $name;
}
