<?php

function get_field_list() {
    $query = 'SELECT field_id, field_name
              from field
			  order by field_name';
    return get_list($query);
}

function get_field($field_id) {
    global $db;
    $query = 'select field_id, field_name
              from field 
              where field_id = :field_id';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':field_id', $field_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    }
    catch (PDOException $e) {
        display_db_exception($e);
        exit();
    }
}

function add_field($field_name) {
    global $db;
    $query = 'INSERT INTO field
                 (field_name)
              VALUES
                 (:field_name)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':field_name', $field_name);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        display_db_exception($e);
        exit();
    }
}


function modify_field($field_id, $field_name) {
    global $db;
    $query = 'update field set
                 field_name = :field_name,
                 where field_id = :field_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':field_name', $field_name);
        $statement->bindValue(':field_id', $field_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        display_db_exception($e);
        exit();
    }
}


function delete_field($field_id){
    global $db;
    $query = 'delete from field
              where field_id = :field_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':field_id', $field_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        display_db_exception($e);
        exit();
    }
}

?>