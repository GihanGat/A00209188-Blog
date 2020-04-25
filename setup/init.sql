USE blog;

CREATE TABLE authors (
  email VARCHAR(128) NOT NULL PRIMARY KEY,
  passwd_hash VARCHAR(255) NOT NULL,
  first_name VARCHAR(50) NOT NULL,
  middle_name VARCHAR(50) NULL DEFAULT NULL,
  last_name VARCHAR(50) NULL DEFAULT NULL,
  display_name VARCHAR(50) NULL DEFAULT NULL,
  mobile VARCHAR(15) NULL,
  registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  last_login TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  intro TINYTEXT NOT NULL,
  profile TEXT NULL DEFAULT NULL
);

INSERT INTO `authors`(`email`, 
                    `passwd_hash`, 
                    `first_name`, 
                    `middle_name`, 
                    `last_name`, 
                    `display_name`, 
                    `mobile`, 
                    `intro`, 
                    `profile`)
 VALUES ("gihanmadurangasl@gmail.com",
        "*2470C0C06DEE42FD1618BB99005ADCA2EC9D1E19",
        "Gihan",
        "Maduranga",
        "Gat",
        "GMad",
        "653356346",
        "test site intro",
        "test site bio");


CREATE TABLE blog_posts (
    slug VARCHAR(128) NOT NULL PRIMARY KEY
    , title VARCHAR(255) NOT NULL
    , content TEXT
    , author VARCHAR(128) NOT NULL
    , category VARCHAR(128)
    , create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    , modified_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    , is_active BOOLEAN DEFAULT TRUE
    , view_count INTEGER
    , INDEX (author)
    , FOREIGN KEY (author)
        REFERENCES authors (email)
);

INSERT INTO `blog_posts` (  `slug`,
                            `title`,
                            `content`,
                            `author`)
    VALUES ("post-a",
            "Post A",
            "<article><h2>Test Article</h2><section><p>This is a basic test article for the blog post.</p></section></article>",
            "gihanmadurangasl@gmail.com");


