<?php
    require "Instagram.php";
    $ig_username = "akhouadme";
    
    $ig = new Instagram($ig_username);
    echo "<h2>Followings</h2>";
    echo $ig->followings;

    echo "<h2>Posts</h2>";
    echo $ig->followers;

    echo "<h2>Profile Pic</h2>";
    echo $ig->photo;

    echo "<h2>Latest Posts</h2>";
    echo '<pre>' . var_export($ig->posts, true) . '</pre>';
?>