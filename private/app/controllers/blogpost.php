<?php

class BlogPost extends Controller{

    function __construct() {
        parent::__construct();
    }

    function Index()
    {
        // TODO: Implement Index() method.
        $this->model("BlogPostModel");
        $posts = $this->BlogPostModel->getAllBlogPosts();
        $input = Array("posts" => $posts);

        $this->view("template/header");
        $this->view("blog/index", $input);
        $this->view("template/footer");
    }

    function CreateBlogPost()
    {
        $this->model("BlogPostModel");
        // check if authenticated
        $is_auth = isset($_SESSION["username"]);
        // if no, redirect out
        if (!$is_auth) {
            header("location: /blog");
            return;
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $_POST["title"];
            $content = $_POST["content"];
            $author = $_SESSION["username"];
            $category = $_SESSION["category"];

            $verified = verifyAuthor($author);

            if ($verified) {
                $slug = $this->BlogPostModel->createBlogPost($title, $content, $author, $category);
            }else{
                echo("No Permission to Create Blog Posts");
                $this->Index();
            }

            $this->Read($slug);
        } else {
            // if yes, show blog create form
            $this->view("template/header");
            $this->view("blog/create");
            $this->view("template/footer");
        }
    }

    function verifyAuthor($author){
        $this->model("BlogPostModel");
        $success = $this->BlogPostModel->verifyAuthor($author);

        return $success;
    }

    function Read($postSlug) {
        // create blogModel
        $this->model("BlogPostModel");
        // lookup blog id
        // get blog details
        $blogpost = $this->BlogPostModel->getBlogPostBySlug($postSlug);
        $blogauthor = $this->BlogPostModel->getBlogPostAuthorBySlug($postSlug);
        // fill in template with record
        $this->view("blog/header", $blogpost);
        $this->view("blog/post", $blogpost);
        $this->view("blog/author", $blogauthor);
        $this->view("template/footer");
    }

    function ExpireBlogPost($expireSlug){
        $this->model("BlogPostModel");
        $this->BlogPostModel->expireBlogPostBySlug($expireSlug);

        $this->Index();
    }

    function UpdateBlogPost($updateSlug , $blogContent){
        $this->model("BlogPostModel");

        $this->BlogPostModel->updateBlogPostBySlug($updateSlug,$blogContent);

        $updatedblogpost = $this->BlogPostModel->getBlogPostBySlug($updateSlug);

        $this->view("blog/header", $updatedblogpost);
        $this->view("blog/post", $updatedblogpost);
        $this->view("template/footer");
    }

    function SearchBlog($keyWord){
        $this->model("BlogPostModel");
        $posts = $this->BlogPostModel->getAllBlogPostsByKeyWord($keyWord);
        $input = Array("posts" => $posts);
    }

    //To get the blogposts created by a author
    function AuthorBlogs($Author){
        $this->model("BlogPostModel");
        // lookup blog id
        // get blog details
        $blogposts = $this->BlogPostModel->getBlogPostsByAuthor($Author);
        // fill in template with record
        $authorblogposts = Array("posts" => $blogposts);
        $this->view("template/header");
        $this->view("blog/index", $authorblogposts);
        $this->view("template/footer");
    }

}

?>