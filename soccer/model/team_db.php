<?php

function get_team_list() {
    $query = 'SELECT team_id, team_name
              from team
			  order by team_name';
    return get_list($query);
}

function get_team($team_id) {
    global $db;
    $query = 'select team_id, team_name
              from team 
              where team_id = :team_id';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':team_id', $team_id);
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

function add_team($team_name) {
    global $db;
    $query = 'INSERT INTO team
                 (team_name)
              VALUES
                 (:team_name)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':team_name', $team_name);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        display_db_exception($e);
        exit();
    }
}


function modify_team($team_id, $team_name) {
    global $db;
    $query = 'update team set
                 team_name = :team_name,
                 where team_id = :team_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':team_name', $team_name);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        display_db_exception($e);
        exit();
    }
}


function delete_team($team_id){
    global $db;
    $query = 'delete from team
              where team_id = :team_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':team_id', $team_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        display_db_exception($e);
        exit();
    }
}

?>