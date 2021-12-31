<?php
/* Component QueryBilder */
class QueryBilder
{
    protected $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /* Get all posts */
    public function getAll($table)
    {
        $statment = $this->pdo->prepare("SELECT  * FROM {$table}");
        $statment->execute();
        //Get Assoc. array in post
        $posts = $statment->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }

    //Get one record from a table
    public function getOne($table, $id){
        $statment = $this->pdo->prepare("SELECT * FROM {$table} WHERE id=:id");
        $statment->execute(['id' => $id]);
        $result = $statment->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    //Create record in table
    public function create($table, $data)
    {
        $keys = implode(',', array_keys($data));
        $tags = ":". implode(', :', array_keys($data));
        $statmet = $this->pdo->prepare("INSERT INTO {$table} ({$keys}) VALUES ({$tags})");
        $statmet->execute($data);

    }
    //Update a record in a table
    public function update($table, $data, $id)
    {
        $keys = array_keys($data);
        $string = '';
        foreach ($keys as $key){
            $string .= $key . "=:" . $key . ",";
        }
        $keys = rtrim($string, ',');
        $data['id'] = $id;

        $statmet = $this->pdo->prepare("UPDATE {$table} SET {$keys} WHERE id=:id");
        $statmet->execute($data);

    }
    //Delete a record in a table
    public function delete($table, $id){
        $statment = $this->pdo->prepare("DELETE FROM {$table} WHERE id=:id");
        $statment->execute(['id' => $id]);
    }
}