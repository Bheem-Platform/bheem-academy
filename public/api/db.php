<?php
// Database connection helper
class Database {
    private static $conn = null;
    
    public static function getConnection() {
        if (self::$conn === null) {
            $host = '65.109.167.218';
            $port = '5432';
            $dbname = 'bheem_academy_staging';
            $user = 'postgres';
            $password = 'Bheem924924.@';
            
            $connString = sprintf(
                "host=%s port=%s dbname=%s user=%s password=%s",
                $host, $port, $dbname, $user, $password
            );
            
            self::$conn = pg_connect($connString);
            
            if (!self::$conn) {
                throw new Exception('Database connection failed');
            }
        }
        
        return self::$conn;
    }
    
    public static function query($sql, $params = []) {
        $conn = self::getConnection();
        
        if (empty($params)) {
            $result = pg_query($conn, $sql);
        } else {
            $result = pg_query_params($conn, $sql, $params);
        }
        
        if (!$result) {
            throw new Exception('Query failed: ' . pg_last_error($conn));
        }
        
        return $result;
    }
    
    public static function fetchAll($result) {
        $rows = [];
        while ($row = pg_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
    
    public static function fetchOne($result) {
        return pg_fetch_assoc($result);
    }
}
