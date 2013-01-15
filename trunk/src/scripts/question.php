<?php

include_once(AppRoot . AppController . "cTestController.php");

$cTestControllerObj = new cTestController();

if (is_array($_POST) && $_POST["test_id"] == '' && $_GET['type'] != 'ajax') {
    header("Location:" . $cFormObj->createLinkUrl(array("f" => "tests")));
    exit;
}
if ($_POST["test_id"]) {

    $data = $cTestControllerObj->getTestDetails($_POST["test_id"]);
    $questionDetails = $cTestControllerObj->getQuestionDetails($data[0]["id"]);

    if ($_POST['answers'] != '') {
        $answers = json_decode($_POST['answers']);
        $scores = 0;
        $correctanswercnt = array();
        foreach ($questionDetails as $key => $value) {
            $correctanswers = $cTestControllerObj->getCorrectAnswers($value["id"]);
            $current_answer = $answers->{$value["id"]};
            switch ($value['question_type']) {
                case 0:
                    //   print_r($correctanswers);
                    if ($current_answer == $correctanswers[0]['id']) {
                        $scores+=1;
                        $correctanswercnt[$value["id"]]++;
                    }

                    break;
                case 1:
                    $selected_array = json_decode($current_answer);
                    $answercnt = count($correctanswers);
                    foreach ($correctanswers as $key1 => $value1) {
                        if (in_array($value1['id'], $selected_array)) {
                            $scores+=(1 / $answercnt);
                            $correctanswercnt[$value["id"]]++;
                        }
                    }
                    break;
                case 2:
                    //     echo $value['question_type'];
                    if ($correctanswers[0]['answer'] == $current_answer) {
                        $scores+=1;
                        $correctanswercnt[$value["id"]]++;
                    }

                    break;
                case 3:
//                    print_r($answers);
//                    print_r($current_answer);
                    break;
                case 4:
//                    echo $value['question_type'];
//                    print_r($current_answer);
//                    print_r($correctanswers);
                    foreach ($correctanswers as $key1 => $value1) {
                        if ($current_answer[$key1] == $value1['id']) {
                            $scores+=1;
                            $correctanswercnt[$value["id"]]++;
                        }
                    }
                    break;
                case 5:

                    foreach ($correctanswers as $key1 => $value1) {
                        if ($current_answer[$key1] == $value1['id']) {
                            $scores+=1;
                            $correctanswercnt[$value["id"]]++;
                        }
                    }
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
        $cTestControllerObj->updateScores($scoredata);

        header("Location:" . $cFormObj->createLinkUrl(array("f" => "scores")));
        exit;
    } else {
        foreach ($questionDetails as $key => $value) {
            $question_numbers[] = $value['id'];
        }
        shuffle($question_numbers);
    }
}
if ($_GET['type'] == 'ajax' && $_GET["index"] != 'undefined') {
    $questionDetails = $cTestControllerObj->getQuestion($_GET["index"]);
    $cTestControllerObj->questionId = $questionDetails[0]["id"];
    $cTestControllerObj->questionType = $questionDetails[0]["question_type"];
    $html = "<h4>" . $questionDetails[0]["question"] . "</h4></br>";
    $options = $cTestControllerObj->getOptions($questionDetails[0]["id"]);
    $options = $cFormObj->shuffleAssoc($options);
    switch ($cTestControllerObj->questionType) {
        case 0:
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
            foreach ($options as $key => $value) {
                $cFormObj->options["name"] = $cTestControllerObj->questionId;
                $cFormObj->options["id"] = $value["id"];
                $cFormObj->options["class"] = "answer";
                $cFormObj->data = $value["answer"];
                $cFormObj->createCheckBox();
                $html .= $cFormObj->html();
            }
            break;
        case 2:
            $html.='<div class = "btn-group" data-toggle = "buttons-radio">
            <button name = "' . $cTestControllerObj->questionId . '" type = "button" class = "answer btn btn-success active" value = "1">
            <i class = "icon-ok icon-white"></i>
            </button>
            <button name = "' . $cTestControllerObj->questionId . '" type = "button" class = "answer btn" value = "0"><i class = "icon-remove"></i></button>
            </div >';

            break;
        case 3:
            foreach ($options as $key => $value) {
                $cFormObj->options["name"] = $cTestControllerObj->questionId;
                $cFormObj->options["id"] = $value["id"];
                $cFormObj->options["class"] = "answer";
                $cFormObj->data = $value["answer"];
                $cFormObj->createOption();
                $html .= $cFormObj->html();
            }
            break;
        case 4:
            $html.="<div class='row-fluid'>";
            $html_match_left.="<ul class=\"match span5\" id=\"match_" . $cTestControllerObj->questionId . "\">";
            $html_match_right.="<ul class=\"sortable span5\" id=\"answer_" . $cTestControllerObj->questionId . "\">";
            foreach ($options as $key => $value) {
                $html_match_left.= "<li class=\"ui-state-default fill answer\" id=\"" . $value["id"] . "\">" . $value["answer"] . "</li>";
            }
            $options = $cFormObj->shuffleAssoc($options);
            foreach ($options as $key => $value) {
                $html_match_right.= "<li class=\"ui-state-highlight fill answer\" id=\"" . $value["id"] . "\">" . $value["match_answer"] . "</li>";
            }
            $html_match_left.="</ul>";
            $html_match_right.="</ul>";
            $html.=$html_match_left . "" . $html_match_right;
            $html.="</div>";
//            $html.="<input />";
            break;
        case 5:
            $html.="<div class='row-fluid'>";
            $html.="<ul class=\"sortable span9\" id=\"" . $cTestControllerObj->questionId . "\">";
            foreach ($options as $key => $value) {
                $html .= "<li class=\"ui-state-highlight answer\" id=\"" . $value["id"] . "\">" . $value["answer"] . "</li>";
            }
            $html.="</ul>";
            $html.="</div>";
            break;
    }

    echo $html . "<input name='answer_type' class='answer_type' id='answer_type_" . $cTestControllerObj->questionId . "' value='" . $cTestControllerObj->questionType . "' type='hidden' />";
    exit;
}
?>