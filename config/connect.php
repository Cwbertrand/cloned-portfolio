<?php

require_once 'db.php';

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($mysqli->connect_error) {
    die('connection failed : '.$mysqli->connect_error);
}

/**
 * Crud READ SQL.
 *
 * @param string $sql comment
 *
 * @return array
 */
function query(string $sql, bool $unique = false): array
{
    global $mysqli;

    $results = [];

    if ($result = $mysqli->query($sql)) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($results, $row);
            }
        }
        $result->close();
    }

    return $unique === true && !empty($results) ? $results[0] : $results;
}


if (!isset($_SESSION['user']) && isset($_COOKIE['remember'])) {
    $sql = "SELECT * FROM users WHERE security='".$_COOKIE['remember']."'";

    if ($result = $mysqli->query($sql)) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION['user'] = $row;
                redirectToRoute();
            }
        }
    }
}
