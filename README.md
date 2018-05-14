# Instagram-scraping
### A simple way to get data from a public Instagram account with PHP
```
<?php
    require "Instagram.php";
    $ig_username = "akhouadme"; // change this to your instagram username
    
    $ig = new Instagram($ig_username);
    
    // Followings count is stored in $ig->followings
    echo "<h2>Followings</h2>";
    echo $ig->followings;

    // Followers count is stored in $ig->followers
    echo "<h2>Followers</h2>";
    echo $ig->followers;

    // Profile photo is stored in $ig->photo
    echo "<h2>Profile Pic</h2>";
    echo $ig->photo;

    // Posts are stored in $this->posts
    echo "<h2>Latest Posts</h2>";
    echo '<pre>' . var_export($ig->posts, true) . '</pre>';
?>
```
