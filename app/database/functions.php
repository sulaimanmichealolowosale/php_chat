<?php
include 'db.php';

function executequery($sql, $data)
{
    global $conn;
    $stmt = $conn->prepare($sql);
    $values = array_values($data);
    $type = str_repeat('s', count($data));
    $stmt->bind_param($type, ...$values);
    $stmt->execute();
    return $stmt;
}

function insert($table, $data)
{
    global $conn;
    $sql = "INSERT INTO $table SET ";
    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " $key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;
    }
    $stmt = executequery($sql, $data);
    $id = $stmt->insert_id;
    return $id;
}


function update($table, $data, $id)
{
    global $conn;
    $sql = "UPDATE $table SET ";
    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " $key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;
    }
    $sql = $sql . " WHERE id=?";
    $data['id'] = $id;
    $stmt = executequery($sql, $data);
    $id = $stmt->insert_id;
    return $id;
}

function select_one($table, $conditions)
{
    global $conn;
    $sql = "SELECT * FROM $table ";
    $i = 0;
    foreach ($conditions as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " WHERE $key=?";
        } else {
            $sql = $sql . " AND $key=?";
        }
        $i++;
    }
    $sql = $sql . " LIMIT 1";
    $stmt = executequery($sql, $conditions);
    $result = $stmt->get_result()->fetch_assoc();
    return $result;
}


function select_all($table, $conditions = [])
{
    global $conn;
    $sql = "SELECT * FROM $table";
    if (empty($conditions)) {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    } else {
        $sql = "SELECT * FROM $table ";
        $i = 0;
        foreach ($conditions as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " WHERE $key=?";
            } else {
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }
        $sql = $sql . " LIMIT 1";
        $stmt = executequery($sql, $conditions);
        $result = $stmt->get_result()->fetch_assoc();
        return $result;
    }
}


function delete($table, $id)
{
    global $conn;
    $sql = "DELETE FROM $table WHERE id=?";
    $stmt = executequery($sql, ['id' => $id]);
    return $stmt->affected_rows;
}

function search($term)
{
    global $conn;
    $term = $_POST['search'];
    $match = '%' . $term . '%';
    $sql = "SELECT * FROM users WHERE username LIKE ? OR country LIKE ?";
    $stmt = executequery($sql, ['username' => $match, 'country' => $match]);
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $result;
}

// $search = search('germany');
// echo $search;

// delete('users', 2);

// $user = select_all('users');
// print_r($user);

// foreach ($user as $key => $users) {
//     echo $users['username'];
// }


// $user = select_one('users', ['id' => 4, 'username' => 'mike']);
// print_r($user);


// $data = [
//     'password' => 'mike',
//     'country' => 'none',
//     'status' => 'mike',
//     'password_answer' => 'none'
// ];

// update('users', $data, 3);
