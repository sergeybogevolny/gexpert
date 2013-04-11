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


    $cFormObj->options['column']['name'] = array('name' => "Test", 'type' => "string", 'sort' => true, 'index' => 1, 'filter' => 'box');
    $cFormObj->options['column']['username'] = array('name' => "User", 'type' => "string", 'sort' => true, 'index' => 2, 'filter' => 'box');
    $cFormObj->options['column']['score'] = array('name' => "Score", 'type' => "number", 'sort' => true, 'index' => 3, 'filter' => 'box');
    $cFormObj->options['column']['test_time'] = array('name' => "Test Time", 'type' => "string", 'sort' => true, 'index' => 4, 'filter' => 'box');
    $cFormObj->options['column']['total_questions'] = array('name' => "Total Questions", 'type' => "string", 'sort' => true, 'index' => 5);
    $cFormObj->options['column']['correct_answers'] = array('name' => "Correct Answers", 'type' => "string", 'sort' => true, 'index' => 6);
    $cFormObj->options['column']['add_date'] = array("name" => 'Score Date', 'type' => "date", 'format' => AppDateFormatPhp, 'sort' => true, 'index' => 7, 'filter' => 'box');


    $cFormObj->data = $scores;

    $cFormObj->options['actioncolumn'] = false;


    $cFormObj->options['reporttable'] = true;
    $cFormObj->createHTable();
    echo $cFormObj->html();
}?>