<?php

class database
{
    public function query($sql, $params = [])
    {
        try {
            // Defina as constantes DB_HOST, DB_NAME, DB_USER e DB_PASS antes de usar
            $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);

            $results = $stmt->fetchAll(PDO::FETCH_CLASS);
            return [
                'status' => 'success',
                'data' => $results
            ];
        } catch (\PDOException $err) {
            return [
                'status' => 'error',
                'data' => $err->getMessage()
            ];
        }
    }
}
?>