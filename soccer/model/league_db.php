<?php

function get_league_list() {
    $query = 'SELECT league_id, league_name
              from league
			  order by league_name';
    return get_list($query);
}

?>