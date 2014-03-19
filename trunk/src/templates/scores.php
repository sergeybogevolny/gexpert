<?php if ($_GET['show'] != 'all') { ?>
    <div class="hiring shadow-large span12">
        <div class="span8">
            <div class="box box-color box-bordered">
                <div class="box-title">
                    <i class="icon-certificate"></i>&nbsp;<h3><?php echo $_SESSION["name"] . " "; ?>Score</h3>
                </div>
                <div class="box-content">
                    <div class="span7">
                        <?php
                        $scorepercentage = round(($scores[0]['score'] / $scores[0]['total_marks']) * 100, 0);
                        if ($scorepercentage < 50) {
                            ?><h3>Need Improvement</h3>    <?php
                        } elseif ($scorepercentage < 70) {
                            ?><h3>Fair</h3>    <?php
                        } elseif ($scorepercentage < 80) {
                            ?><h3>Good</h3>    <?php
                        } elseif ($scorepercentage < 90) {
                            ?><h3>Very Good</h3>    <?php
                        } else {
                            ?><h3>Excellent</h3>    <?php
                        }
                        ?>


                        <h3 class="text-success">Total Score : <?php echo $scores[0]['score']; ?>/<?php echo $scores[0]['total_marks']; ?></h3>
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
            </div>


            <div class="accordion" id="accordion2">
                <?php
                foreach ($answersReview as $key => $value) {
                    ?><div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#a<?php echo $key; ?>"> <?php echo $value['question'] . "- Score (" . $value['score'] . ")"; ?> </a>
                        </div>
                        <div id="a<?php echo $key; ?>" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <table>
                                    <?php
                                    foreach ($value['answers'] as $key1 => $value1) {
                                        ?><tr>
                                            <td><?php echo $key1; ?></td>
                                            <? if ($value['match_answer'][$key1] != '')  ?>
                                            <td><?php echo $value['match_answer'][$key1]; ?></td>
                                            <td><?php echo $value1 === true ? '<i class="cus-accept"></i>' : '<i class="cus-delete"></i>'; ?></td>
                                        </tr>

                                        <?php
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>

        </div>




    </div>
    <br/>

    <?php
} else {



    $cFormObj->data = $scores;

    $cFormObj->options['actioncolumn'] = false;
    $cFormObj->options['reporttable'] = true;
    $cFormObj->options['exportoptions'] = true;
    $cFormObj->options['having_form'] = false;
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
