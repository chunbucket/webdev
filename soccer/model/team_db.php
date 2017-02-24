<?php

function get_team_list() {
    $query = 'SELECT team_id, name, CONCAT(coach_last_name,",",coach_first_name), league_name
              from team, coach, league
              where coach.coach_id=team.coach_id 
              and league.league_id = team.league_id
			  order by name';
    return get_list($query);
}

function get_team($team_id) {
    global $db;
    $query = 'select team_id, name
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

function add_team($name) {
    global $db;
    $query = 'INSERT INTO team
                 (name)
              VALUES
                 (:name)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        display_db_exception($e);
        exit();
    }
}


function modify_team($team_id, $name) {
    global $db;
    $query = 'update team set
                 name = :name,
                 where team_id = :team_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':team_id', $team_id);
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