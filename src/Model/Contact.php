<?php

namespace Model;

use App\DB;

class Contact
{
    public $name;
    public $mail;
    public $mob;

    public function __construct(string $name, string $mail, int $mob)
    {
        $this->name = $name;
        $this->mail = $mail;
        $this->mob = $mob;
    }

    public function save()
    {
        $db = DB::getInstance()->getDb();
        $stm = $db->prepare('INSERT INTO Contact (name, mail, mob) VALUES(:name, :mail, :mob)');
        $stm->bindParam(':name', $this->name, SQLITE3_TEXT);
        $stm->bindParam(':mail', $this->mail, SQLITE3_TEXT);
        $stm->bindParam(':mob', $this->mob, SQLITE3_TEXT);
        $stm->execute();
    }

    public static function getAll(): array
    {
        $db = DB::getInstance()->getDb();
        $dbRes = $db->query('SELECT * FROM Contact');
        $result = [];
        while($item = $dbRes->fetchArray(SQLITE3_ASSOC)) {
            $result[] = $item;
        }
        return $result;
    }

    public static function createTable()
    {
        $sql = 'CREATE TABLE Contact (
id INTEGER PRIMARY KEY,
name TEXT NOT NULL,
mail TEXT,
mob INTEGER DEFAULT 1)';
        return DB::getInstance()->getDb()->exec($sql);
    }
}

