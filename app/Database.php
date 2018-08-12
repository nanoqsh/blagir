<?

class Database
{
    private $connection;
    private static $instance;
    
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "blagir";

    private function __construct()
    {
        $this->connection = new mysqli(
            $this->host,
            $this->username, 
            $this->password,
            $this->database
        );
        
        if (mysqli_connect_error())
            trigger_error("MySQL fail: " . mysqli_connect_error(), E_USER_ERROR);
    }
    
    // Получение экземпляра Database
    public static function getInstance()
    {
        return !self::$instance ? self::$instance = new self() : self::$instance;
    }
    
    // Защита от клонирования
    private function __clone() {}

    public function getConnection()
    {
        return $this->connection;
    }

    // Выполнить sql запрос (с возвращением данных)
    public function fetch(string $sql)
    {
        $result = [];
        $query_result = $this->connection->query($sql);

        if ($query_result === FALSE)
            trigger_error("MySQL fail: " . $this->connection->error, E_USER_ERROR);
        
        while ($row = $query_result->fetch_assoc())
            $result[] = $row;
        
        return $result;
    }

    // Выполнить sql запрос (без возвращения данных)
    public function execute(string $sql)
    {
        if (!$this->connection->query($sql) === TRUE)
            trigger_error("MySQL fail: " . $this->connection->error, E_USER_ERROR);
    }
}

?>