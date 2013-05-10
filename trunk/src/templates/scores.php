<?php if ($_GET['show'] != 'all') { ?>
    <div class="hiring shadow-large span12">
        <div class="span6">
            <h1><?php echo $_SESSION["name"] . ","; ?></h1>
            <?php
            $scorepercentage = round(($scores[0]['score'] / $scores[0]['total_marks']) * 100, 0);
            if ($scorepercentage < 50) {
                ?><h1>Need Improvement</h1>    <?php
            } elseif ($scorepercentage < 70) {
                ?><h1>Fair</h1>    <?php
            } elseif ($scorepercentage < 80) {
                ?><h1>Good</h1>    <?php
            } elseif ($scorepercentage < 90) {
                ?><h1>Very Good</h1>    <?php
            } else {
                ?><h1>Excellent</h1>    <?php
            }
            ?>

            <h1 class="text-success">Total Score : <?php echo $scores[0]['score']; ?>/<?php echo $scores[0]['total_marks']; ?></h1>
            <h2 class="text-info">Score Percentage: <?php echo $scorepercentage; ?> % </h2>
            <?php if ($scores[0]['test_time'] > 0) {
                ?>
                <h2 class="text-info"> Time Taken
                    <?php
                    $scores[0]['test_time'] = gmdate("H:i:s", $scores[0]['test_time']);
                    echo $scores[0]['test_time'];
                    ?>
                </h2>
            <?php } ?>
        </div>
        <div class="span4">

            <?php
            if ($scorepercentage < 30) {
                ?>            <img src="src/img/cup.jpg" />    <?php
            } elseif ($scorepercentage < 50) {
                ?>            <img src="src/img/cup.jpg" />    <?php
            } elseif ($scorepercentage < 70) {
                ?>            <img src="src/img/cup.jpg" />    <?php
            } elseif ($scorepercentage < 90) {
                ?>            <img src="src/img/cup.jpg" />    <?php
            } else {
                ?>            <img src="src/img/cup.jpg" />    <?php
            }
            ?>
        </div>
    </div>
    <?php
} else {



    $cFormObj->data = $scores;

    $cFormObj->options['actioncolumn'] = false;
    $cFormObj->options['reporttable'] = true;
//    $cFormObj->options['crosstab'] = true;
//    $cFormObj->options['keep_columns'] = array("name", "correct_answers", "add_date");
//    $cFormObj->options['group_columns'] = array("username");
//    $cFormObj->options['value_columns'] = array("score", "test_time", "total_questions");
    $cFormObj->createHTable();
    $table = $cFormObj->html();
    $cFormObj->data = $scores;
    $cFormObj->options['id'] = "test";

    $cFormObj->options['chart_type'] = 'line';

    //$cFormObj->options['axis_x']['username'] = array('name' => "User", 'type' => "string", 'sort' => true, 'chart' => 'line', 'filter' => 'box');
    //$cFormObj->options['axis']['x']['username'] = array('name' => "User", 'type' => "string", 'sort' => true, 'chart' => 'line', 'filter' => 'box');
    if ($_SESSION['user_type'] > 1) {
        $cFormObj->options['title'] = "My Scores";
        $cFormObj->options['axis']['x']['name'] = array('name' => "Test", 'type' => "string", 'sort' => true, 'chart' => 'line', 'filter' => 'box');
        $cFormObj->options['axis']['y']['score'] = array('name' => "Score", 'type' => "number", 'sort' => true, 'chart' => 'line', "agg_function" => "sum", 'filter' => 'box');
    } elseif ($_GET['id']) {
        $cFormObj->options['title'] = "Number of Users attended VS Tests";
        $cFormObj->options['axis']['x']['username'] = array('name' => "User Name", 'type' => "string", 'sort' => true, 'chart' => 'line', 'filter' => 'box');
        $cFormObj->options['axis']['y']['score'] = array('name' => "Score", 'type' => "number", 'sort' => true, 'chart' => 'line', "agg_function" => "sum", 'filter' => 'box');
    } else {
        $cFormObj->options['title'] = "Number of Users attended VS Tests";
        $cFormObj->options['axis']['x']['name'] = array('name' => "Test", 'type' => "string", 'sort' => true, 'chart' => 'line', 'filter' => 'box');
        $cFormObj->options['axis']['y']['score'] = array('name' => "Score", 'type' => "number", 'sort' => true, 'chart' => 'line', "agg_function" => "count", 'filter' => 'box');
    }



    $cFormObj->createChart();
    echo $cFormObj->html();
    echo $table;
}
?>
