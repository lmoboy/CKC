<?php
// Izveidos savienojumu ar datu bāzi un šo to vēl...
function validateDate($date, $format = 'Y-m-d')
{
  $d = DateTime::createFromFormat($format, $date);
  // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
  return $d && $d->format($format) === $date;
}
class Database
{

  private $connection;

  public function __construct($config)
  {
    $connection_string = "mysql:" . http_build_query($config, "", ";");
    $this->connection = new PDO($connection_string);
    $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  }
  //Metode
  public function execute($query_string, $params)
  {
    // 1. Padot, sagatavot SQL vaicājumu
    $query = $this->connection->prepare($query_string);

    // 2. Izpildīt SQL vaicājumu
    $query->execute($params);

    // 3. Saņemt datus no mySQL uz PHP un nosūtīt tālāk
    return $query;
  }
}