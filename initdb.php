<?php
class Konekcija
{
    private $connection;
    function __construct()
    {
        //povezujemo se bez baze jer hocemo da napravimo novu ako ne postoji 
        $this->connection = new mysqli('localhost', 'root', '');
        if ($this->connection->error) {
            die("Greska pri povezivanju: $this->connection->error");
        }

        //kreiramo bazu ako ne postoji
        $this->connection->query("CREATE DATABASE IF NOT EXISTS `properties`");
        $this->connection->query("CREATE DATABASE IF NOT EXISTS `reservations`");

        //selektujemo bazu da bi smo radili sa njom
        $this->connection->select_db('properties');

        //kreiramo tabelu user ako ne postoji
        $this->connection->query("CREATE TABLE IF NOT EXISTS `user` ( `id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(50) NOT NULL , `password` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`), UNIQUE `uname` (`username`(50))) ENGINE = innoDB;");
        //INSERT IGNORE ignorise duplikate za UNIQUE kolonu (username), tako da nece biti ponavljanja admina u tabeli
        $this->connection->query("INSERT IGNORE INTO `user`(`username`,`password`) VALUES ('admin@admin','adminpass')");

        $this->connection->query("CREATE TABLE IF NOT EXISTS `location` ( `id` INT NOT NULL AUTO_INCREMENT , `grad` VARCHAR(50) NOT NULL , `drzava` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;");
        $this->connection->query("INSERT IGNORE INTO `location`(`id`,`grad`,`drzava`) VALUES (1,'Nis','Srbija'),(2,'Beograd','Srbija'),(3,'Pariz','Francuska'),(4,'Madrid','Spanija'),(5,'Berlin','Nemacka')");


        $this->connection->query("CREATE TABLE IF NOT EXISTS `bookings` ( `id` INT NOT NULL AUTO_INCREMENT , `start_date` DATE NOT NULL , `end_date` DATE NOT NULL , PRIMARY KEY (`id`)) ENGINE = innoDB;");
    }

    private function prepareSelectUser()
    {
        return $this->connection->prepare("SELECT * FROM `user` WHERE `password`=? AND `username`=?");
    }

    function proveriKorisnika($user, $pass): bool
    {
        $prepared = $this->prepareSelectUser();
        $prepared->bind_param("ss", $pass, $user);
        $prepared->execute();
        return $prepared->get_result()->num_rows == 1;
    }

    function nizLokacija()
    {
        $query_res = $this->connection->query("SELECT * FROM `location`");
        $result = [];
        foreach ($query_res as $row) {
            array_push($result, [$row['id'], $row['start_date'], $row['end_date']]);
        }
        return $result;
    }
}
$connection = new Konekcija();
