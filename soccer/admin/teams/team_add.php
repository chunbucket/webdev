<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Team</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <!-- Styles -->
    <link href="../../../shared/ss/main.css<?php echo(getVersionString()); ?>" rel="stylesheet">
    <link href="styles_add_modify.css<?php echo(getVersionString()); ?>" rel="stylesheet">

</head>
<body>
<form action="" method="post">
    <input type="hidden" name="action" value="add_team">
    <div class="box">
        <div class="wrapper">
            <div class="columns">
                <h1 class="title">Add Team</h1>

                <input type="hidden" name="action" value="add_team">

                <div class="row">
                    <label>Team Name</label>
                    <input type="text" name="name" autofocus required>
                </div>
                
                <div class ="row">
                    <label>League</label>
                    <select name ="league_id" required> 
                        <option value="">Select a league</option>

                        <?php foreach ($leagueList as $league){ ?>
                            <option value="<?php echo $league['league_id']?>"><?php echo $league['league_name']?></option>
                        <?php }?>
                    </select>
                </div>
                <div class ="row">
                    <label>Coach</label>
                    <select name ="coach_id" required>
                        <option value="">Select a coach</option>

                        <?php foreach ($coachList as $coach){ ?>
                            <option value="<?php echo $coach['coach_id']?>"><?php echo $coach['name']?></option>
                        <?php }?>
                    </select>
                </div>
             
                
                

                <div class="button-div">
                    <button style="cursor: pointer" class="submit s" type="submit" name="choice" value="Add">Submit</button>
                    <button style="cursor: pointer" class="submit b" type="submit" name="choice" value="Back" formnovalidate>Cancel</button>
                </div>
            </div>
        </div>
</form>
</body>
</html>