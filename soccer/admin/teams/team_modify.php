<!DOCTYPE html>
<html lang="en">
<head>
    <title>Modify Team</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <!-- Styles -->
    <link href="../../../shared/ss/main.css<?php echo(getVersionString()); ?>" rel="stylesheet">
    <link href="styles_add_modify.css<?php echo(getVersionString()); ?>" rel="stylesheet">

</head>
<body>
<form action="" method="post">
    <input type="hidden" name="action" value="modify_team">
    <div class="box">
        <div class="wrapper">
            <div class="columns">
                <h1 class="title">Modify team</h1>

                <input type="hidden" name="action" value="modify_team">
                <input type="hidden" name="team_id" value="<?php echo htmlspecialchars($team_id); ?>">

                <div class="row">
                    <label>team Name</label>
                    <input type="text" name="name" value="<?php echo htmlspecialchars($name);?>" autofocus required>
                </div>

                <div class="button-div">
                    <button style="cursor: pointer" class="submit s" type="submit" name="choice" value="Modify">Submit</button>
                    <button style="cursor: pointer" class="submit b" type="submit" name="choice" value="Back" formnovalidate>Cancel</button>
                </div>
            </div>
        </div>
</form>
</body>
</html>