<?

require_once 'Database.php';

class Post
{
    public static function get(Array $filter)
    {
        $where = '';

        if ($filter['search'])
            $where .= "AND text LIKE %'" . $filter['search'] . "%' ";

        if ($filter['author'])
            $where .= "AND author = '" . $filter['author'] . "' ";

        if ($filter['tag'])
            $where .= "AND '" . $filter['tag'] . "' IN tags ";

        $query = "SELECT posts.id, posts.text, users.name AS author, posts.created, "
            . "GROUP_CONCAT(images.path) AS images, GROUP_CONCAT(tags.tag) AS tags "
            . "FROM posts "
            . "LEFT JOIN images "
            . "ON images.post = posts.id "
            . "LEFT JOIN tags "
            . "ON tags.post = posts.id "
            . "LEFT JOIN users "
            . "ON users.id = posts.author "
            . "GROUP BY posts.id ";

        echo $query . '<br>';
        
        $db = Database::getInstance();
        return $db->fetch($query);
    }
}

?>