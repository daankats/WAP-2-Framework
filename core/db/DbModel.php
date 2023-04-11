<?php

namespace app\core\db;

use app\core\Model;
use app\core\App;
use app\models\User;
/**
 * Summary of DbModel
 */
abstract class DbModel extends Model{
    abstract public static function tableName(): string;
    abstract public function attributes(): array;
    abstract public function primaryKey(): string;
    
        public function save()
        {
            $tableName = $this->tableName();
            $attributes = $this->attributes();
            $params = array_map(fn($attr) => ":$attr", $attributes);
            $statement = self::prepare("INSERT INTO $tableName (".implode(',', $attributes).") VALUES (".implode(',', $params).")");
            foreach ($attributes as $attribute) {
                $statement->bindValue(":$attribute", $this->{$attribute});
            }
            if (!$statement->execute()) {
                throw new \Exception("Failed to save record to the database.");
            }
            return true;
        }
    
        /**
         * Summary of findOne
         * @param mixed $where
         * @return bool|object
         */
        public static function findOne($where)
        {
            $tableName = static::tableName();
            $attributes = array_keys($where);
            $sql = implode(" AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
            $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
            foreach ($where as $key => $item) {
                $statement->bindValue(":$key", $item);
            }
            $statement->execute();
            $record = $statement->fetchObject(static::class);
            return $record !== false ? $record : null;
        }
        

    
        public static function prepare($sql)
        {
            return App::$app->db->pdo->prepare($sql);
        }

        public function beforeSave(){
            return true;
        }
        
}