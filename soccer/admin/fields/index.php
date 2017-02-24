<?php

require_once('../../util/main.php');
require_once('../../model/field_db.php');

function loadFieldListPage() {
    global $fieldList;

    $fieldList = get_field_list();
    include 'field_list.php';
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
        loadfieldListPage();
        break;

    case 'show_add_field':
        $field_name = '';
        include 'field_add.php';
        exit();
        break;

    case 'add_field':
        $choice = filter_input(INPUT_POST, 'choice');
        $field_name = filter_input(INPUT_POST, 'field_name');

        if ($choice == 'Add') {
            add_field($field_name);
        }
        loadfieldListPage();
        break;

    case 'show_modify_field';
        $field_id = filter_input(INPUT_GET, 'field_id');
        $field = get_field($field_id);
        $field_name = $field['field_name'];
        include 'field_modify.php';
        exit();
        break;

    case 'modify_field':
        $choice = filter_input(INPUT_POST, 'choice');
        $field_name = filter_input(INPUT_POST, 'field_name');
        $field_id = filter_input(INPUT_POST, 'field_id');
        if(filter_input(INPUT_POST, 'choice') == "Modify") {
            modify_field($field_id, $field_name);
        }

        loadFieldListPage();
        break;

    case 'delete_field':
        $field_id = filter_input(INPUT_GET, 'field_id');
        delete_field($field_id);

        loadFieldListPage();
        break;

    default:
        display_error('Unknown field action: ' . $action);
        break;
}
?>