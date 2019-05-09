<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <link type="text/css" media="screen" href="timeclock.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Time Clock</title>
    <link rel="stylesheet" type="text/css" href="calendar.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <form method="post">
        <input type="submit" name="clockIn" id="clockIn" value="Clock In" /><br/>
    </form>
    <form method="post">
        <input type="submit" name="clockOut" id="clockOut" value="Clock Out" /><br/>
    </form>
    <?php 
        include 'calendar.php';
        ?>
    <?php 
        $test = new Timeclock();
        /*if(array_key_exists('clockIn', $_POST)){
            $test->clockIn();
        }
        if(array_key_exists('clockOut', $_POST)){
            $test->clockOut();
        }
        */
        $test->clockIn();
        $test->calculateWorkTime();
        $test->clockOut();
        $test->calculateWorkTime();
        ?>
</body>
</html>