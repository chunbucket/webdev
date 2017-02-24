<!DOCTYPE html>
<html lang="en">
    <script type="text/javascript">
        function deleteField(fieldID) {
            if (confirm('Are you sure you would like to delete this field?')) {
                window.parent.parent.location.href = 'index.php?action=delete_field&field_id=' + fieldID;
            }
        }

    </script>
    <head>
        <title>Admin: fieldes</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

        <!-- Styles -->
        <link href="../../../shared/ss/main.css<?php echo(getVersionString()); ?>" rel="stylesheet">
        <link href="styles.css<?php echo(getVersionString()); ?>" rel="stylesheet">
    </head>

    <body>

        <header>
            <h1 class="title">Fields</h1>
        </header>
        <div style="text-align:center;padding-bottom:2vh;">
            <a href="index.php?action=show_add_field">
                <button style="cursor: pointer" class="s">Add New</button>
            </a>
            <a href="../index.php">
                <button style="cursor: pointer" class="b">Back</button>
            </a>
        </div>
        <nav class="navbar" style="">
            <div class="cell widecol">Field Name</div>
        </nav>


        <div class="list-container" style="">

            <?php foreach ($fieldList as $field) {
                $field_id = $field['field_id'];
                $field_name = $field['field_name'];
                ?>
                <div class="row">
                    <div class="wrapper">
                        <div class="clickable" onclick="javascript:location.href='./index.php?field_id=<?php echo $field_id ?>&action=show_modify_field'">
                            <div class="cell widecol"><?php echo $field_name; ?>&nbsp</div>
                        </div>
                        <div class="cell delcol">
                            <div class="del_icon" onclick="deleteField(<?php echo $field_id; ?>);">d</div>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>

        <script type="text/javascript" src="../../admin/js/jquery.min.js<?php echo(getVersionString()); ?>"></script>
        <script type="text/javascript" src="../../admin/js/jquery.easing.min.js<?php echo(getVersionString()); ?>"></script>
        <script type="text/javascript" src="../../admin/js/jquery.plusanchor.min.js<?php echo(getVersionString()); ?>"></script>
        <script type="text/javascript" src="../../admin/js/featherlight.min.js<?php echo(getVersionString()); ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('body').plusAnchor({
                    easing: 'easeInOutExpo',
                    speed: 700
                });
            });

            $('#fab-action').click(function () {
                $.featherlight($('<iframe width="1000" height="800" src="' + $(this).attr('trigger') + '"/>'))
            })

        </script>
    </body>
</html>