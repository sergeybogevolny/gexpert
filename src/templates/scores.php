<?php if ($_GET['show'] != 'all') { ?>
    <table border = "0" cellpadding = "1">
        <tbody>
            <tr>
                <td>
                    <h1 class="text-success">Total Score : <?php echo $scores[0]['score']; ?></h1>
                    <h2 class="text-info">Score Percentage: <?php echo round(($scores[0]['correct_answers'] / $scores[0]['total_questions']) * 100, 0); ?> %  </h2>
                    <h3>
                        No of correct answers
                        <span class="badge badge-success"><?php echo $scores[0]['correct_answers']; ?></span>
                        out of
                        <span class="badge badge-info"><?php echo $scores[0]['total_questions']; ?></span>
                    </h3>
                    <?php if ($scores[0]['test_time'] > 0) {
                        ?>
                        <h2 class="text-info">
                            Time Taken <?php
                            $scores[0]['test_time'] = ($scores[0]['test_time'] < 60) ? $scores[0]['test_time'] . " Seconds" : $scores[0]['test_time'] . " Minutes";
                            echo $scores[0]['test_time'];
                            ?>
                        </h2>
                    <?php } ?>
                </td>

            </tr>

        </tbody>
    </table>
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
    echo $cFormObj->html();
    $cFormObj->data = $scores;
    $cFormObj->options['id'] = "test";
    $cFormObj->options['title'] = "Sundar";
    $cFormObj->options['axis']['x']['name'] = array('name' => "Test", 'type' => "string", 'sort' => true, 'chart' => 'line', 'filter' => 'box');
    //$cFormObj->options['axis_x']['username'] = array('name' => "User", 'type' => "string", 'sort' => true, 'chart' => 'line', 'filter' => 'box');
    $cFormObj->options['axis']['y']['score'] = array('name' => "Score", 'type' => "number", 'sort' => true, 'chart' => 'line', 'filter' => 'box');


    $cFormObj->createChart();
    echo $cFormObj->html();
}?>