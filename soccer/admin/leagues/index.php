<?php

require_once('../../util/main.php');
require_once('../../model/league_db.php');

function loadLeagueListPage() {
    global $leagueList;

    $leagueList = get_league_list();
    include 'league_list.php';
    exit();
}

verify_admin();

$action = strtolower(filter_input(INPUT_POST, 'action'));
if ($action == NULL) {
    $action = strtolower(filter_input(INPUT_GET, 'action'));
    if ($action == NULL) {
        $action = 'list';
    }
}

switch ($action) {
    case 'list':
        loadLeagueListPage();
        break;


    default:
        display_error('Unknown league action: ' . $action);
        break;
}
?>