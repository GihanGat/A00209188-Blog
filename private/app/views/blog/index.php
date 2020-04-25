<h1>Blog Posts</h1>
<div>
<p>
<ul>
    <?php
        foreach($posts as $post) {
            if ($post["category"] == "education") {
                echo("<li><label for='education'>Education</label><li>");
                echo("<ul style='list-style-type:none;'>");
                echo("<li><a href=\"\\blog\\read\\" . $post["slug"] . "\">" . $post["title"] . "</a> - <time>"
                    . $post["post_date"] . "</time>");
                echo("</ul>");
            }
            if ($post["category"] == "sports") {
                echo("<li><label for='sports'>Sports</label><li>");
                echo("<ul style='list-style-type:none;'>");
                echo("<li><a href=\"\\blog\\read\\" . $post["slug"] . "\">" . $post["title"] . "</a> - <time>"
                    . $post["post_date"] . "</time>");
                echo("</ul>");
            }
            if ($post["category"] == "entertainment") {
                echo("<li><label for='entertainment'>Entertainment</label><li>");
                echo("<ul style='list-style-type:none;'>");
                echo("<li><a href=\"\\blog\\read\\" . $post["slug"] . "\">" . $post["title"] . "</a> - <time>"
                    . $post["post_date"] . "</time>");
                echo("</ul>");
            }
            if ($post["health"] == "health") {
                echo("<li><label for='health'>Health</label><li>");
                echo("<ul style='list-style-type:none;'>");
                echo("<li><a href=\"\\blog\\read\\" . $post["slug"] . "\">" . $post["title"] . "</a> - <time>"
                    . $post["post_date"] . "</time>");
                echo("</ul>");
            }
            if ($post["food"] == "food") {
                echo("<li><label for='food'>Food</label><li>");
                echo("<ul style='list-style-type:none;'>");
                echo("<li><a href=\"\\blog\\read\\" . $post["slug"] . "\">" . $post["title"] . "</a> - <time>"
                    . $post["post_date"] . "</time>");
                echo("</ul>");
            }
        }
    ?>
</ul>
</p>
</div>>