<?php
/**
 *
 */

namespace App\Models\Blog;

/**
 * blog post model
 */
class Post extends \System\Model
{
    private $db;
    private $queries;

    public function __construct(\System\Database $db)
    {
        $this->db = $db;

        $this->initQueries();
    }

    private function initQueries()
    {
        $this->queries = array(
            "all" => "SELECT * FROM blog_post",
            "byId" => " WHERE id=:id",
            "searchTitle" => "title LIKE :pattern",
            "searchAuthor" => "author LIKE :pattern",
            "searchText" => "text LIKE :pattern",
        );
    }

    public function getById(int $id)
    {
        $query = $this->queries['all'] . $this->queries['byId'];
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        try {
            if($stmt->execute()) {
                return $stmt->fetch(\PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {

        }
        return false;
    }
}
