<?php

include_once(AppRoot . AppController . "cTestController.php");

$cTestControllerObj = new cTestController();

if (is_array($_POST) && $_POST["test_id"] == '' && $_GET['type'] != 'ajax') {
    header("Location:" . $cFormObj->createLinkUrl(array("f" => "survey_list")));
    exit;
}
echo "sdfsdfsdf";
if ($_POST["test_id"]) {

    $data = $cTestControllerObj->getTestDetails($_POST["test_id"]);
    $questionDetails = $cTestControllerObj->getQuestionDetails($data[0]["id"]);

    if ($_POST['answers'] != '') {
        $answers = json_decode(stripslashes($_POST['answers']));
        $scores = 0;
        $totalanswers = 0;
        $correctanswercnt = array();

        foreach ($questionDetails as $key => $value) {
            $correctanswers = $cTestControllerObj->getCorrectAnswers($value["id"], $value['question_type']);
            $current_answer = $answers->{$value["id"]};
            $totalanswers+=count($correctanswers);
            $userdata[$value["id"]]['question'] = $value['question'];
            $userdata[$value["id"]]['score'] = 0;
            switch ($value['question_type']) {
                case 0:
                    $is_correct = false;
                    if ($current_answer == $correctanswers[0]['id']) {
                        $scores+=1;
                        $userdata[$value["id"]]['score'] +=1;
                        $correctanswercnt[$value["id"]]++;
                        $selectedAnswerText = $cTestControllerObj->getOption($current_answer);
                        $is_correct = true;
                    }
                    $userdata[$value["id"]]['answers'][$selectedAnswerText[0]['answer']] = $is_correct;

                    break;
                case 1:

                    $selected_array = json_decode(stripslashes($current_answer));
                    $answercnt = count($correctanswers);
                    $is_scored = false;
                    if (count($selected_array) == $answercnt) {
                        foreach ($correctanswers as $key1 => $value1) {
                            $selectedAnswerText = $cTestControllerObj->getOption($value1['id']);
                            if (is_array($selected_array)) {
                                if (in_array($value1['id'], $selected_array)) {
                                    $userdata[$value["id"]]['answers'][$selectedAnswerText[0]['answer']] = true;
                                    $is_scored = true;
                                } else {
                                    $is_scored = false;
                                    $userdata[$value["id"]]['answers'][$selectedAnswerText[0]['answer']] = false;
                                }
                            }
                        }
                    }
                    if ($is_scored !== false) {
                        $scores+=1;
                        $userdata[$value["id"]]['score'] +=1;
                        $correctanswercnt[$value["id"]]++;
                    }
                    break;
                case 5:

                    break;
                case 6:

                    break;
                case 7:

                    break;
                case 8:

                    break;
                case 9:

                    break;
                case 10:

                    break;
            }
        }

        if ($data[0]['time_taken'] > 0) {

            $testtimeremaining = explode(",", $_POST['test_time']);
            $timetaken = ($data[0]['time_taken'] * 60) - (($testtimeremaining[5] * 60) + $testtimeremaining[6]);
        }

        $scoredata['user_id'] = $_SESSION['user_id'];
        $scoredata['score'] = $scores;
        $scoredata['test_id'] = $_POST["test_id"];
        $scoredata['correct_answers'] = count($correctanswercnt);
        $scoredata['total_questions'] = count($questionDetails);
        $scoredata['test_time'] = $timetaken;
        $scoredata['status'] = 1;
        $scoredata['answers'] = json_encode($userdata);
        $cTestControllerObj->updateScores($scoredata);
        //exit;
        header("Location:" . $cFormObj->createLinkUrl(array("f" => "scores", "id" => $_POST["test_id"], 'user_id' => $_SESSION['user_id'])));
        exit;
    } else {
        foreach ($questionDetails as $key => $value) {
            $question_numbers[] = $value['id'];
        }
        // shuffle($question_numbers);
    }
}
if ($_GET['type'] == 'ajax' && $_GET["index"] != 'undefined') {
    $questionDetails = $cTestControllerObj->getQuestion($_GET["index"]);
    $cTestControllerObj->questionId = $questionDetails[0]["id"];
    $cTestControllerObj->questionType = $questionDetails[0]["question_type"];
    $html = "<h4>" . $questionDetails[0]["question"] . "</h4></br>";
    $options = $cTestControllerObj->getOptions($questionDetails[0]["id"]);


    switch ($cTestControllerObj->questionType) {
        case 0:
            $options = $cFormObj->shuffleAssoc($options);
            foreach ($options as $key => $value) {
                $cFormObj->options["name"] = $cTestControllerObj->questionId;
                $cFormObj->options["id"] = $value["id"];
                $cFormObj->options["class"] = "answer";
                $cFormObj->data = $value["answer"];
                $cFormObj->createOption();
                $html .= $cFormObj->html();
            }

            break;
        case 1:
            $options = $cFormObj->shuffleAssoc($options);
            foreach ($options as $key => $value) {
                $cFormObj->options["name"] = $cTestControllerObj->questionId;
                $cFormObj->options["id"] = $value["id"];
                $cFormObj->options["class"] = "answer";
                $cFormObj->data = $value["answer"];
                $cFormObj->createCheckBox();
                $html .= $cFormObj->html();
            }
            break;

        case 6:
            //Matrix Options
            $answer = explode("\n", $options['answer']);
            $match_answer = explode("\n", $options['match_answer']);
            $html = "<table><tr><td></td>";
            foreach ($match_answer as $value1) {
                $html .= "<td>" . $value1 . "</td>";
            }
            $html .= "</tr>";
            foreach ($answer as $value) {
                $html .= "<tr><td>" . $value . "</td>";
                foreach ($match_answer as $value1) {

                    $cFormObj->options["name"] = $cTestControllerObj->questionId . "_" . $value;
                    $cFormObj->options["id"] = $value . "_" . $value1;
                    $cFormObj->options["class"] = "answer";
                    $cFormObj->createOption();

                    $html .= "<td>" . $cFormObj->html() . "</td>";
                }
                $html .= "</tr>";
            }
            $html .="</table>";



            break;
        case 7:
            $options = $cFormObj->shuffleAssoc($options);
            foreach ($options as $key => $value) {

            }
            break;
        case 8:
            $options = $cFormObj->shuffleAssoc($options);
            foreach ($options as $key => $value) {

            }
            break;
        case 9:
            $options = $cFormObj->shuffleAssoc($options);
            foreach ($options as $key => $value) {

            }
            break;
        case 10:
            $options = $cFormObj->shuffleAssoc($options);
            foreach ($options as $key => $value) {

            }
            break;
    }

    echo $html . "<input name='answer_type' class='answer_type' id='answer_type_" . $cTestControllerObj->questionId . "' value='" . $cTestControllerObj->questionType . "' type='hidden' />";
    exit;
}
$pagename = "Questions";
$pagedescription = "Questions may be of Choose, Multiple Answers, True or False, Match The following and Sequencing";
?>