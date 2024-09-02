<?php

include __DIR__ . '/src/Framework/Database.php';

use Framework\Database;

$db = new Database('mysql', [
    'host' => 'localhost',
    'port' => 3306,
    'dbname' => 'phpiggy'
], 'root', '');

try {
    $db->connection->beginTransaction();

    $db->connection->query("INSERT INTO products VALUES(99,'Gloves')");

    $search = "Hats";
    $query = "SELECT * FROM products WHERE name=:name";

    $stmt = $db->connection->prepare($query);

    $stmt->bindValue('name', 'Gloves', PDO::PARAM_STR);

    $stmt->execute([
        'name' => $search
    ]);

    var_dump($stmt->fetchAll(PDO::FETCH_OBJ));

    $db->connection->commit();
} catch (Exception $error) {
    if ($db->connection->inTransaction()) {
        $db->connection->rollBack();
    }


    echo "Transaction Failed!";
}
