<?php include "assets/header.html"; ?>
<div class="catalog">
    <?php
    $conn = mysqli_connect("localhost", "root", "root", "web-php");

    $page = empty($_GET['page']) ? 1 : $_GET['page'];

    $page = $page * 3 - 3;

    $posts_list = mysqli_query($conn, "SELECT * FROM posts LIMIT $page,3");


    while ($post = mysqli_fetch_array($posts_list)) {
        echo "<div class='card'>", "<div class='card-title'>" . $post["title"] . "</div>",
            "<div class='card-text'>" . $post["text"] . "</div>", "<img src='" . $post["image"] . "' width = '100px'>",
        "</div>";
    }
    ?>
</div>
<div class="pagination">
    <?php
    $count_posts = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) FROM posts "));
    $count_posts = ceil($count_posts[0] / 3);

    for ($i = 1; $i <= $count_posts; $i++) {
        echo "<li><a href='?page=$i'>$i</a></li>";
    }
    ?>
</div>

</body>
</html>



