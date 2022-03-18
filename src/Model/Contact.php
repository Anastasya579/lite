<?php

namespace Model;

use App\DB;

class Contact
    {
    public $namet;
    public $mail;
    public $mob;

   public function __construct(string $namet, string $mail, string $mob)
   {
   $this->namet = $namet;
   $this->mail = $mail;
   $this->mob = $mob;
 }

    public function save()
    {
    $db = DB::getInstance()->getDb();
    $stm = $db->prepare('INSERT INTO Contact(namet, mail, mob) VALUES(:namet, :mail, :mob)');
    $stm->bindParam(':namet', $this->namet, SQLITE3_TEXT);
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
namet TEXT NOT NULL,
mail TEXT,
mob TEXT)';
        return DB::getInstance()->getDb()->exec($sql);
    }
}
?>
