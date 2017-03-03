<?php

function get_league_list() {
    $query = 'SELECT league_id, league_name
              from league
			  order by league_name';
    return get_list($query);
}

function get_league($league_id) {
    global $db;
    $query = 'select league_id, league_name
              from league 
              where league_id = :league_id';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':league_id', $league_id);
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


function modify_league($league_id, $league_name) {
    global $db;
    $query = 'update league set
                 league_name = :league_name,
                 where league_id = :league_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':league_name', $league_name);
        $statement->bindValue(':league_id', $league_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        display_db_exception($e);
        exit();
    }
}

function delete_league($league_id){
    global $db;
    $query = 'delete from league
              where league_id = :league_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':league_id', $league_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        display_db_exception($e);
        exit();
    }
}

function add_league($league_name) {
    global $db;
    $query = 'INSERT INTO league
                 (league_name)
              VALUES
                 (:league_name)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':league_name', $league_name);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        display_db_exception($e);
        exit();
    }
}




?>