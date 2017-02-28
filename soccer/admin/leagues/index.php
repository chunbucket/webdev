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
    case 'show_add_league':
        $league_name = '';
        include 'league_add.php';
        exit();
        break;
    case 'add_league':
        $choice = filter_input(INPUT_POST, 'choice');
        $league_name = filter_input(INPUT_POST, 'league_name');

        if ($choice == 'Add') {
            add_league($league_name);
        }
        loadLeagueListPage();
        break;

    default:
        display_error('Unknown league action: ' . $action);
        break;
}
?>