<?php

include_once(AppRoot . AppController . "cTestController.php");

$cTestControllerObj = new cTestController();
if ($_POST) {
    $data = $cTestControllerObj->getTestDetails($_POST["test_id"]);
    $questionDetails = $cTestControllerObj->getQuestionDetails($data[0]["id"]);
    foreach ($questionDetails as $key => $value) {
        $question_numbers[] = $value[id];
    }
 //   shuffle($question_numbers);
}
if ($_GET['type'] == 'ajax' && $_GET["index"] != 'undefined') {
    $questionDetails = $cTestControllerObj->getQuestion($_GET["index"]);
    $cTestControllerObj->questionId = $questionDetails[0]["id"];
    $cTestControllerObj->questionType = $questionDetails[0]["question_type"];
    $html = "<h4>" . $questionDetails[0]["question"] . "</h4></br>";
    $options = $cTestControllerObj->getOptions($questionDetails[0]["id"]);
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
        default:
            break;
    }

    echo $html . "<input name='answer_type' class='answer_type' id='answer_type_".$cTestControllerObj->questionId."' value='" . $cTestControllerObj->questionType . "' type='hidden' />";
    exit;
}
?>
