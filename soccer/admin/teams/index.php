<?php

require_once('../../util/main.php');
require_once('../../model/team_db.php');

function loadTeamListPage() {
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
        loadTeamListPage();
        break;

    case 'show_add_team':
        $team_name = '';
        include 'team_add.php';
        exit();
        break;

    case 'add_team':
        $choice = filter_input(INPUT_POST, 'choice');
        $team_name = filter_input(INPUT_POST, 'team_name');

        if ($choice == 'Add') {
            add_team($team_name);
        }
        loadteamListPage();
        break;

    case 'show_modify_team';
        $team_id = filter_input(INPUT_GET, 'team_id');
        $team = get_team($team_id);
        $team_name = $team['team_name'];
        

        include 'team_modify.php';
        exit();
        break;

    case 'modify_team':
        $choice = filter_input(INPUT_POST, 'choice');
        $team_name = filter_input(INPUT_POST, 'team_name');
        $team_id = filter_input(INPUT_POST, 'team_id');

        if(filter_input(INPUT_POST, 'choice') == "Modify") {
            modify_team($team_id, $team_name);
        }

        loadTeamListPage();
        break;

    case 'delete_team':
        $team_id = filter_input(INPUT_GET, 'team_id');
        delete_team($team_id);

        loadTeamListPage();
        break;

    default:
        display_error('Unknown team action: ' . $action);
        break;
}
?>