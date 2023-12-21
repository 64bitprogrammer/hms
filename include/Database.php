<?php
require_once 'credentials.php';
/**
 * Class Database to perform database operation
 * @method Database connect() private
 * @method Database disconnect()
 * @method Database select()
 * @method Database insert()
 * @method Database update()
 * @method Database delete()
 */
class Database
{
    private $connection;

    private const HOST = SERVER;
    private const USERNAME = USERNAME;
    private const PASSWORD = PASSWORD;
    private const DATABASE = DATABASE;

    public function __destruct()
    {
        $this->disconnect();
    }

    private function connect()
    {

        try {
            $this->connection = new PDO("mysql:host=" . self::HOST . ";dbname=" . self::DATABASE, self::USERNAME, self::PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    private function disconnect()
    {
        $this->connection = null;
    }

    public function select($query, $params = [])
    {

        $this->connect();
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    public function update($query, $params = [])
    {

        $this->connect();
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            $rowCount = $statement->rowCount();
            return $rowCount;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    public function delete($query, $params = [])
    {

        $this->connect();
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            $rowCount = $statement->rowCount();
            return $rowCount;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    public function insert($query, $params = [])
    {

        $this->connect();
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            $rowCount = $statement->rowCount();
            return $rowCount;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    public function bulk_insert($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $this->connection->beginTransaction();

            foreach ($params as $param) {
                $statement->execute($param);
            }

            $this->connection->commit();
            $rowCount = $statement->rowCount();
            return $rowCount;
        } catch (PDOException $e) {
            $this->connection->rollBack();
            die("Bulk insert failed: " . $e->getMessage());
        }
    }

    public function bulk_delete($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $this->connection->beginTransaction();

            foreach ($params as $param) {
                $statement->execute($param);
            }

            $this->connection->commit();
            $rowCount = $statement->rowCount();
            return $rowCount;
        } catch (PDOException $e) {
            $this->connection->rollBack();
            die("Bulk delete failed: " . $e->getMessage());
        }
    }

    public function bulk_update($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $this->connection->beginTransaction();

            foreach ($params as $param) {
                $statement->execute($param);
            }

            $this->connection->commit();
            $rowCount = $statement->rowCount();
            return $rowCount;
        } catch (PDOException $e) {
            $this->connection->rollBack();
            die("Bulk update failed: " . $e->getMessage());
        }
    }
}
?>