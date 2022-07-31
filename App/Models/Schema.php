<?php

namespace Root\App\Models;

class Schema
{

    /**
     */
    public function __construct()
    {
    }

    public $admin = [
        "id" => "_id",
        "name" => "_names",
        "email" => "_email",
        "password" => "_password",
        "recordDate" => "_record_date",
        "recordTime" => "_record_time",
        "status" => "_status",
    ];
    public $posts = [
        "id" => "_id",
        "title" => "_title",
        "author" => "_author",
        "content" => "_content",
        "file" => "_file",
        "type" => "_type",
        "recordDate" => "_record_date",
        "recordTime" => "_record_time",
        "thumbnail" => "_thumbnail",
        "status" => "_status",
    ];
    public $comments = [
        "id" => "_id",
        "postId" => "_post_id",
        "name" => "_username",
        "email" => "_email",
        "content" => "_content",
        "recordDate" => "_record_date",
        "recordTime" => "_record_time"
    ];

    public $table_schema = [
        "admin" => "_admins",
        "posts" => "_posts",
        "comments" => "_comments"
    ];
    
}
