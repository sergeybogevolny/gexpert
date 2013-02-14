<?php if (count($scores) > 0) { ?>


    <table border = "0" cellpadding = "1">

        <tbody>
            <tr>
                <td >
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
                <td>
                    <a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'cert001', 'id' => $_GET['id'])); ?>">Certificate</a>
                    <!--<img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px; " src="">-->

                </td>
            </tr>

        </tbody>
    </table>
    <?php
} else {
    echo "No Scores for this test yet. Please attened the test to check the scores !!!";
}?>