<!DOCTYPE html>
<html lang="en">
    <script type="text/javascript">
        function deleteLeague(leagueID) {
            if (confirm('Are you sure you would like to delete this league?')) {
                window.parent.parent.location.href = 'index.php?action=delete_league&league_id=' + leagueID;
            }
        }

    </script>
    <head>
        <title>Admin: Leagues</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

        <!-- Styles -->
        <link href="../../../shared/ss/main.css<?php echo(getVersionString()); ?>" rel="stylesheet">
        <link href="styles.css<?php echo(getVersionString()); ?>" rel="stylesheet">
    </head>

    <body>

        <header>
            <h1 class="title">Leagues</h1>
        </header>
        <div style="text-align:center;padding-bottom:2vh;">
            <a href="index.php?action=show_add_league"
                <button style="cursor: pointer" class="s">Add New</button>
            </a>
            <a href="../index.php">
                <button style="cursor: pointer" class="b">Back</button>
            </a>
        </div>
        <nav class="navbar" style="">
            <div class="cell widecol">Name</div>
        </nav>


        <div class="list-container" style="">

            <?php foreach ($leagueList as $league) {
                ?>
                <div class="row">
                    <div class="wrapper">
                        <div class="clickable" onclick="javascript:location.href='./index.php?league_id=<?php echo ['$league_id'] ?>&action=show_modify_league'">
                            <div class="cell widecol"><?php echo $league['league_name']; ?>&nbsp</div>
                        </div>
                        <div class="cell delcol">
                            <div class="del_icon" onclick="deleteLeague(<?php echo $league['league_id']; ?>);">d</div>
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