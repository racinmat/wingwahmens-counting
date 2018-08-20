<?php
require_once 'Database.php';

define('FILIP_RETURNED', 'Filip se vrátil');
define('FILIP_LEFT', 'Filip odešel');
define('TIME', 'TIME');
define('HISTORY', 'history');

$inputData = json_decode(file_get_contents("php://input"), true);
header("Content-type:application/json");


if ($inputData['data2'] === FILIP_LEFT) {
    addLeave($inputData['data1']);
}

if ($inputData['data2'] === FILIP_RETURNED) {
    addEntry();
}

if ($inputData['data1'] === TIME) {
    getMeTime();
}

if ($inputData['data1'] === HISTORY) {
    getEntries();
}

function getEntries() {
    $database = new Database();
    $entries = $database->getAllEntries();
    $result = '';

    foreach ($entries as $entry) {
        $newEntry = $entry['entry'];

        if (is_null($entry['leave'])) {
            $newLeave = '???';
        } else {
            $newLeave = $entry['leave'];
        }

        $result .= "<tr>
            <td>$newEntry</td>
            <td> ------------------ </td>
            <td>$newLeave</td>
        </tr>";
    }
    echo json_encode([0 => $result]);

}

function getMeTime() {
    $database = new Database();
    $time = $database->getTime();
    $array = explode('.', $time);
    $array2 = explode(' ', $array[2]);
    $array3 = explode(':', $array2[1]);
    echo json_encode([0 => $array[0], 1 => $array[1], 2 => $array2[0], 3 => $array3[0], 4 => $array3[1], 5 => $array3[2]]);
}

function addEntry() {
    $entry = date('d.m.Y H:i:s', time());
    $database = new Database();
    $database->addEntry($entry);
    $id = $database->getLastId();
    echo json_encode(['0' => FILIP_LEFT, '1' => $id]);

}

function addLeave(int $id) {
    $entry = date('d.m.Y H:i:s', time());
    $database = new Database();
    $database->addLeave($entry, $id);
    echo json_encode(['0' => FILIP_RETURNED]);

}





