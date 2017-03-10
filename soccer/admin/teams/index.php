<?php

require_once('../../util/main.php');
require_once('../../model/team_db.php');

function loadteamListPage() {
    global $teamList;

    $teamList = get_team_list();
    include 'team_list.php';
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
        loadteamListPage();
        break;

    case 'delete_team':
        $team_id = filter_input(INPUT_GET, 'team_id');
        delete_team($team_id);

        loadteamListPage();
        break;

    case 'show_add_team':
        $team_name = '';
        $league_id = '';
        $coach_id = '';
        $leagueList = get_league_list();
        $coachList = get_coach_list();
        include 'team_add.php';
        exit();
        break;

    case 'add_team':
        $choice = filter_input(INPUT_POST, 'choice');
        $team_name = filter_input(INPUT_POST, 'name');
        $league_id = filter_input(INPUT_POST, 'league_id');
        $coach_id = filter_input(INPUT_POST, 'coach_id');

        if ($choice == 'Add') {
            add_team($team_name, $league_id, $coach_id);
        }
        loadteamListPage();
        break;




    default:
        display_error('Unknown team action: ' . $action);
        break;
}
?>