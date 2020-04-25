<?php


class BlogPostModel
{
    function __construct() {
        parent::__construct();
    }

    function getAllPosts() {
        $sql = "SELECT slug, title, author, category , post_date FROM blog_posts WHERE is_active = TRUE ORDER BY category ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    function getBlogPostBySlug($postSlug) {
        $sql = "SELECT title, content, author,category, post_date FROM blog_posts WHERE slug = ? ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(Array($postSlug));

        return $stmt->fetch();
    }

    function getBlogPostAuthorBySlug($postSlug){
        $sql = "SELECT author FROM blog_posts WHERE slug = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(Array($postSlug));

        $blogauthor = $stmt -> fetch_assoc();

        $sql = "SELECT email, display_name, intro, profile FROM authors WHERE email = ? ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(Array($blogauthor["author"]));

        return $stmt->fetch();
    }

    function createBlogPost($title,  $content , $author , $category) {
        $slug = get_new_slug($title);

        $sql = "INSERT INTO blog_posts (slug, title, content, author , category) values (?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(Array($slug, $title, $content, $author , $category));

        return $slug;
    }

    function get_new_slug($string){
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
        return $slug;
    }

    function expireBlogPostBySlug($expireSlug){
        $sql = "UPDATE blog_posts SET is_active = :is_active , modified_date = :modified_date  WHERE slug = :slug";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':is_active', FALSE);
        $stmt->bindValue(':modified_date', CURRENT_TIMESTAMP());
        $stmt->bindValue(':slug', $expireSlug);
        $stmt->execute();
    }

     function updateBlogPost($updateSlug , $blogContent){
         $sql = "UPDATE blog_posts SET content = :content , modified_date = :modified_date  WHERE slug = :slug";

         $stmt = $this->db->prepare($sql);
         $stmt->bindParam(':content', $blogContent);
         $stmt->bindValue(':modified_date', CURRENT_TIMESTAMP());
         $stmt->bindValue(':slug', $updateSlug);
         $stmt->execute();

     }

     function getAllBlogPostsByKeyWord($keyWord){
         $sql = "SELECT DISTINCT  title, content, author,category, post_date FROM blog_posts WHERE title LIKE CONCAT('%',?, '%') OR category = ? AND is_active = TRUE";
         $stmt = $this->db->prepare($sql);
         $stmt->execute(Array($keyWord, $keyWord));

         return $stmt->fetchAll();
     }

     function getBlogPostsByAuthor($author){
         $sql = "SELECT title, content, author,category, post_date FROM blog_posts WHERE author = ? ";
         $stmt = $this->db->prepare($sql);
         $stmt->execute(Array($author));

         return $stmt->fetchAll();
     }


    function verifyAuthor($author){
        $sql = "SELECT email FROM authors WHERE email = ? ";
        $stmt = $this->db->prepare($sql);
        $results  = $stmt->execute(Array($author));
        $success = false;
        if ($results)
        {
            $success = true;
        }
        return $success;
    }

}