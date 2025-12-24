<?php
require_once "db.php";

$page = $_GET['page'] ?? 'login';

$public = ['login','register'];

if (!isset($_SESSION['user_id']) && !in_array($page, $public)) {
    header("Location: index.php?page=login");
    exit;
}

switch ($page) {
    case 'login': require "auth/login.php"; break;
    case 'register': require "auth/register.php"; break;
    case 'logout': require "auth/logout.php"; break;

    case 'posts': require "posts/posts.php"; break;
    case 'add_post': require "posts/add_post.php"; break;
    case 'messages': require "messages/messages.php"; break;
    case 'friends': require "friends/friends.php"; break;
    case 'groups': require "groups/groups.php"; break;
    case 'themes': require "themes/themes.php"; break;
    case 'notifications': require "notifications/notifications.php"; break;
    case 'users_posts': require "posts/users_posts.php"; break;


    default: echo "404";
}
