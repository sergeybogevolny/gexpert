<?php

/**
 * Description of cForm
 *
 * @author mgovindan
 */
include_once 'cUtil.php';

class cForm extends cUtil {

    public $data = "";
    public $html = "";
    public $options = "";

    public function __construct() {
        parent::__construct();
    }

    /*     * *
     *
     * $this->options['serialnocolumn']=t/f
     * $this->options['column']['columnname']=array('name'=>displayname,'type'=>number,date,string,'format'=>dateformat or number format,'data'=>array of data,'filter'=>t/f,'sort'=>t/f,display=>t/f,) maximum options
     * $this->options['name']
     * $this->options['id']
     * $this->options['actioncolumn']
     * $this->options['actioncolumnicons']
     */

    function createHTable() {
        $columns = 1;
        $classoptions = $this->options['striped'] ? $this->options['striped'] : ' table-striped';
        $classoptions.=$this->options['border'] ? $this->options['border'] : ' table-bordered';
        $classoptions.=$this->options['hover'] ? $this->options['hover'] : ' table-hover';
        $classoptions.=$this->options['condensed'] ? $this->options['condensed'] : ' table-condensed';
        $this->createFilter();
        $this->options['id'] = $this->options['id'] ? $this->options['id'] : rand();
        $this->html.= '<table class="table ' . $classoptions . '" name="' . $this->options['name'] . '" id="' . $this->options['id'] . '">';
        $this->html.= '<thead>';
        $this->html.= '<tr>';
        if ($this->options['serialnocolumn'] === true) {
            $columns++;
            $this->html.= '<th> No.</th>';
        }

        $columnorder = array();
        foreach ($this->options['column'] as $columnname => $columnDetails) {
            $columnorder[$columnname] = $columnDetails['index'];
        }
        array_multisort($columnorder, SORT_ASC, $this->options['column']);

        foreach ($this->options['column'] as $columnname => $columnDetails) {
            $columns++;
            if ($columnDetails['index'] > 0) {

                $this->html.= '<th>' . $columnDetails['name'];
                if ($this->options['column'][$columnname]['filter_html'] && $columnDetails['filter'] == 'inline') {

                    $this->html.='<div class="span3">' . $this->options['column'][$columnname]['filter_html'] . '</div>';
                }
                $this->html.='</th>';
            } else {
                $this->html.='<th class="hide"></th>';
            }
            if ($this->options['column'][$columnname]['filter_html'] && $columnDetails['filter'] == 'box') {
                $boxfilter .= '<span class="report-filter"> <span class="report-filter-title">' . $columnDetails['name'] . ' : </span>' . $this->options['column'][$columnname]['filter_html'] . "</span>";
            }
        }
        if ($boxfilter != '') {
            $this->html = '<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#filtercontainer" data-toggle-text="Hide">
                            Show/Hide Filter(s)
                          </button>
                          <div id="filtercontainer" class="collapse in" ><div class="report-filters" id="reportfilters">' . $boxfilter . '</div></div>' . $this->html;
        }

        if ($this->options['actioncolumn'] == true) {
            $columns++;
            $this->html.= '<th>Action</th>';
        }
        $this->html.= '</tr>';
        $this->html.= '</thead>';
        $this->html.= '<tbody>';

        if (is_array($this->data)) {
            foreach ($this->data as $row => $record) {
                $this->html.= '<tr>';
                if ($this->options['serialnocolumn'] === true) {
                    $this->html.= '<td> ' . $row + 1 . '</td>';
                }
                foreach ($this->options['column'] as $columnname => $columnDetails) {
                    $columnvalue = $record[$columnname];
                    $class = '';
                    if ($columnDetails['index'] < 0) {
                        $class = " hide ";
                    }
                    if ($columnDetails['type'] == 'date') {
                        $columnvalue = $this->formatDate($columnvalue, $columnDetails['format']);
                    } elseif ($this->options['column'][$columnname]['type'] == 'string' && is_array($columnDetails['data'])) {
                        $columnvalue = $columnDetails['data'][$columnvalue];
                    }
                    $this->html.= '<td class="' . $class . '">' . $columnvalue . '</td>';
                }
                if ($this->options['actioncolumn'] == true) {
                    $this->html.= '<td>' . $this->options['actioncolumnicons'] . '</td>';
                }
                $this->html.= '</tr>';
            }
        }
//         else {
//            //$this->html.= '</tr><td colspan="' . $columns - 1 . '">No Data to display</td></tr>';
//        }
        $this->html.= '</tbody>';
        $this->html.= '</table>';

        $this->html.='<script>$(document).ready(function(){
            $("#' . $this->options['id'] . '").dataTable({

   "sDom": "<\'row\'<\'span6\'><\'span6\'>r>t<\'row\' <\'span3\' l><\'span5\'i ><\'span4\'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page"
		}

});
$(".filter_type,.filterdata").click(function(e){ e.stopPropagation();}).keydown(function (e){
                        if(e.keyCode == 13){

                            $("#' . $this->options['id'] . '").parents("form").submit();
                                e.stopPropagation();
                        }
                    });
                    $(".filter_type").change(function(e){


});
            $(".calendar").daterangepicker(
                            {
                                ranges: {
                                    "This Month": [Date.today().moveToFirstDayOfMonth(), Date.today().moveToLastDayOfMonth()],
                                    "Next Month": [Date.today().moveToFirstDayOfMonth().add({months: 1}), Date.today().moveToLastDayOfMonth().add({months: 1})],
                                    "Last Month": [Date.today().moveToFirstDayOfMonth().add({months: -1}), Date.today().moveToLastDayOfMonth().add({months: -1})],
                                    "Last Year": [Date.parse("jan").moveToFirstDayOfMonth().add({years:-1}), Date.parse("dec").moveToLastDayOfMonth().add({years:-1}) ],
                                    "This Year": [Date.parse("jan").moveToFirstDayOfMonth(), Date.parse("dec").moveToLastDayOfMonth()],
                                    "Next Year": [Date.parse("jan").moveToFirstDayOfMonth().add({years:1}), Date.parse("dec").moveToLastDayOfMonth().add({years:1})],
                                    "Today": ["today", "today"],
                                    "Tomorrow": ["tomorrow", "tomorrow"],
                                    "Yesterday": ["yesterday", "yesterday"]
                                }
                            },
                    function(start, end) {
                        $(".calendar span").html(start.toString("MMMM d, yyyy") + " - " + end.toString("MMMM d, yyyy"));
                        $(".calendar input").val(start.toString("yyyy-MM-dd") + " ~ " + end.toString("yyyy-MM-dd"));
                        console.log($(this));
            $("#' . $this->options['id'] . '").parents("form").submit();
                    }
                  );
                          });

</script>';
        return $this;
    }

    function createFilterCondition($filtertype, $filterdata) {

        $filtercondition = array();
        $conditionString = array();
        if (is_array($filtertype)) {
            foreach ($filtertype as $column_name => $type) {
                switch ($type) {
                    case 'is':
                        if ($this->options['column'][$column_name]['type'] == 'date') {
                            list($filterdata[$column_name]) = explode("~", $filterdata[$column_name]);
                        }
                        $filtercondition[] = $column_name . "='" . $filterdata[$column_name] . "'";


                        break;
                    case 'is_not':
                        if ($this->options['column'][$column_name]['type'] == 'date') {
                            list($filterdata[$column_name]) = explode("~", $filterdata[$column_name]);
                        }
                        $filtercondition[] = $column_name . "<>'" . $filterdata[$column_name] . "'";
                        break;

                    case 'less_than': case 'is_before':
                        if ($this->options['column'][$column_name]['type'] == 'date') {
                            list($filterdata[$column_name]) = explode("~", $filterdata[$column_name]);
                        }
                        $filtercondition[] = $column_name . "<'" . $filterdata[$column_name] . "'";
                        break;
                    case 'greater_than': case 'is_after':
                        if ($this->options['column'][$column_name]['type'] == 'date') {
                            list($filterdata[$column_name]) = explode("~", $filterdata[$column_name]);
                        }
                        $filtercondition[] = $column_name . ">'" . $filterdata[$column_name] . "'";
                        break;
                    case 'between':
                        if ($this->options['column'][$column_name]['type'] == 'date') {
                            list($fromdate, $todate) = explode("~", $filterdata[$column_name]);
                            $filterdata[$column_name] = $fromdate . "' And '" . $todate;
                        }
                        $filtercondition[] = $column_name . " between '" . $filterdata[$column_name] . "'";
                        break;
                    case 'not_between':

                        if ($this->options['column'][$column_name]['type'] == 'date') {
                            list($fromdate, $todate) = explode("~", $filterdata[$column_name]);
                            $filterdata[$column_name] = $fromdate . "' And '" . $todate;
                        }
                        $filtercondition[] = $column_name . " not between '" . $filterdata[$column_name] . "'";

                        break;
                    case 'in':
                        $filtercondition[] = $column_name . " in (" . $filterdata[$column_name] . ")";
                        break;
                    case 'not_in':
                        $filtercondition[] = $column_name . " not in (" . $filterdata[$column_name] . ")";
                        break;
                    case 'empty':
                        $filtercondition[] = $column_name . " =''";
                        break;
                    case 'not_empty':
                        $filtercondition[] = $column_name . " <>''";
                        break;
                    case 'contains':
                        $filtercondition[] = 'lower(' . $column_name . ') like ' . "'%" . strtolower($filterdata[$column_name]) . "%'";
                        break;
                    case 'not_contains':
                        $filtercondition[] = 'lower(' . $column_name . ') Not like ' . "'%" . strtolower($filterdata[$column_name]) . "%'";
                        break;
                    case 'starts_with':
                        $filtercondition[] = 'lower(' . $column_name . ') like ' . "'" . strtolower($filterdata[$column_name]) . "%'";
                        break;
                    case 'ends_with':
                        $filtercondition[] = 'lower(' . $column_name . ') Not like ' . "'%" . strtolower($filterdata[$column_name]) . "'";
                        break;


                    //TODO Add relative date filter
                }
            }
            return $filtercondition;
        }
    }

    function createFilter() {
        if (is_array($this->data)) {
//TODO select box with values for Filter
//            foreach ($this->data as $recordkey => $record) {
//                foreach ($record as $columnname => $value) {
//                    if ($this->options['column'][$columnname]['filter']) {
//                        $data[$columnname][$value]++;
//                    }
//                }
//            }
        }
        //For number
        $numberFilterTypeData['is'] = "Is";
        $numberFilterTypeData['is_not'] = "Is Not";
        $numberFilterTypeData['less_than'] = "Less than";
        $numberFilterTypeData['greater_than'] = "Greater Than";
        $numberFilterTypeData['between'] = "Between";
        $numberFilterTypeData['not_between'] = 'Not Between';
        $numberFilterTypeData['in'] = 'In';
        $numberFilterTypeData['not_in'] = 'Not In';
        $numberFilterTypeData['empty'] = 'Empty';
        $numberFilterTypeData['not_empty'] = "Not Empty";
        //For String
        $stringFilterData['contains'] = "Contains";
        $stringFilterData['not_contains'] = "Not Contains";
        $stringFilterData['is'] = "Is";
        $stringFilterData['is_not'] = "Is Not";
        $stringFilterData['in'] = "In";
        $stringFilterData['not_in'] = "Not In";
        $stringFilterData['starts_with'] = "Starts With";
        $stringFilterData['ends_with'] = "Ends With";
        $stringFilterData['empty'] = "Empty";
        $stringFilterData['not_empty'] = "Not Empty";
        //For Date
        $dateFilterData[""]['is'] = "Is";
        $dateFilterData[""]['is_not'] = "Is Not";
        $dateFilterData[""]['is_before'] = "Is Before";
        $dateFilterData[""]['is_after'] = "Is After";
        $dateFilterData[""]['between'] = "Between";
        $dateFilterData[""]['not_between'] = "Not Between";
        $dateFilterData[""]['empty'] = "Empty";
        $dateFilterData[""]['not_empty'] = "Not Empty";
        //Relative
//        $dateFilterData["Year"]['current_year'] = "Current Year";
//        $dateFilterData["Year"]['next_year'] = "Next Year";
//        $dateFilterData["Year"]['last_year'] = "Last Year";
//        $dateFilterData["Quarter"]['current_quarter'] = "Current Quarter";
//        $dateFilterData["Quarter"]['previous_quarter'] = "Previous Quarter";
//        $dateFilterData["Quarter"]['next_quarter'] = "Next Quarter";
//        $dateFilterData["Quarter"]['nth_quarter'] = "Nth Quarter";
//        $dateFilterData["Quarter"]['previous_nth_quarter'] = "Previous Nth Quarter";
//        $dateFilterData["Quarter"]['next_nth_quarter'] = "Next Nth Quarter";
//        $dateFilterData["Month"]['current_month'] = "Current Month";
//        $dateFilterData["Month"]['last_month'] = "Last Month";
//        $dateFilterData["Month"]['next_month'] = "Next Month";
//        $dateFilterData["Month"]['last_n_months'] = "Last N months";
//        $dateFilterData["Month"]["Month"]['next_n_months'] = "Next N Months";
//        $dateFilterData["Week"]['current_week'] = "Current Week";
//        $dateFilterData["Week"]['previous_week'] = "Previous Week";
//        $dateFilterData["Week"]['next_week'] = "Next Week";
//        $dateFilterData["Week"]['next_n_weeks'] = "Next N Weeks";
//        $dateFilterData["Week"]['previous_n_weeks'] = "Previous N Weeks";
//        $dateFilterData["Week"]['weekday_is'] = "Week Day Is";
//        $dateFilterData["Week"]['weekday_is_not'] = "Weekday is not";
//        $dateFilterData["Day"]['today'] = "Today";
//        $dateFilterData["Day"]['yesterday'] = "Yesterday";
//        $dateFilterData["Day"]['tommorrow'] = "Tommorrow";
//        $dateFilterData["Day"]['next_n_days'] = "Next N Days";s
//        $dateFilterData["Day"]['last_n_days'] = "Last N Days";

        $datejsScript = '';
        foreach ($this->options['column'] as $column => $details) {

            if ($details['filter']) {
                $options_temp = $this->options;
                $data_temp = $this->data;
                $html_temp = $this->html;

                $columnname = $details['dbcolumn'] ? $details['dbcolumn'] : $column;
                $this->options['id'] = "filter_data[" . $columnname . "]";
                $this->options['name'] = "filter_data[" . $columnname . "]";
                $this->options['class'] = 'filterdata ' . $details['type'];
                $this->options['value'] = $_POST['filter_data'][$columnname];
                $this->options['type'] = $details['type'] == 'number' ? 'number' : 'text';

                $filter_data = '';
                $filter_type = '';

                switch ($details['type']) {
                    case 'number':
                        $this->options['class'] .=' number input-small';
                        $this->options['type'] = 'number';
                        $this->createInput();
                        $filter_data = $this->html;
                        $this->data = $numberFilterTypeData;
                        break;
                    case 'date':

                        $this->options['class'] .=' date';
                        $this->options['type'] = 'hidden';
                        $this->createInput();
                        $filter_data = $this->html;
                        $filter_data = '
                            <span class="calendar">
                                <i class="icon-calendar icon-large"></i>
                                <span>' . $_POST['filter_data'][$columnname] . '</span>
                                ' . $filter_data . '
                                <b class="caret" style="vertical-align: middle"></b>
                            </span>';
                        $this->data = $dateFilterData;
                        break;
                    default:

                        $this->options['type'] = 'text';
                        $this->createInput();
                        $filter_data = $this->html;
                        $this->data = $stringFilterData;
                        break;
                }

                $this->options['id'] = "filter_type[" . $columnname . "]";
                $this->options['name'] = "filter_type[" . $columnname . "]";
                $this->options['default'] = "-- All --";
                $this->options['selected'] = $_POST['filter_type'][$columnname];
                $this->options['class'] = 'span1 filter_type';
                $this->createSelect();
                $filter_type = $this->html;

                $this->options = $options_temp;
                $this->options['column'][$column]['filter_html'] = $filter_type . $filter_data;
                $this->data = $data_temp;
                $this->html = $html_temp;
            }
        }
    }

    function createInput() {
        $this->html = '<input type="' . $this->options['type'] . '" class="' . $this->options['class'] . '" id="' . $this->options['id'] . '" name="' . $this->options['name'] . '" value="' . $this->options['value'] . '" />';
        return $this;
    }

    function addAlert() {
        if ($this->options['alert']['data']) {
            $this->options['alert']['type'] = $this->options['alert']['type'] ? $this->options['alert']['type'] : "block";
            $this->html.='<div class="alert alert-' . $this->options['alert']['type'] . '">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h4>' . $this->options['alert']['title'] . '</h4>
        ' . $this->options['alert']['data'] . '
        </div>';
        }
        return $this;
    }

    function createSelect() {
        $this->options['id'] = $this->options['id'] ? $this->options['id'] : $this->options['name'];
        $this->options['mandatory'] = $this->options['mandatory'] ? true : "";
        $this->html = '<select name = ' . $this->options['name'] . ' id = "' . $this->options['id'] . '" class="' . $this->options['class'] . '" ' . $this->options['mandatory'] . '>';
        if ($this->options['default'] !== false) {
            $this->options['default'] = $this->options['default'] ? $this->options['default'] : "--Select--";
            $this->html.='<option value="' . $key . '" >' . $this->options['default'] . '</option>';
        }
        foreach ($this->data as $key => $value) {
            if (is_array($value)) {
                if ($key != '') {
                    $this->html.='<optgroup label="' . $key . '" >';
                }

                foreach ($value as $key1 => $value1) {
                    $selected = ($this->options['selected'] == $key1) ? "selected" : "";
                    $this->html.='<option value="' . $key1 . '" ' . $selected . ' >' . $value1 . '</option>';
                }
                $this->html.='</optgroup>';
            } else {
                $selected = ($this->options['selected'] == $key) ? "selected" : "";
                $this->html.='<option value="' . $key . '" ' . $selected . ' >' . $value . '</option>';
            }
        }
        $this->html.='</select>';
        return $this;
    }

    function createOption() {
        $this->html.='<div class = "controls">
        <label class = "radio">
        <input type = "radio" name = "' . $this->options['name'] . '" id = "' . $this->options['id'] . '" class="' . $this->options['class'] . '" ' . $this->options['mandatory'] . '>
         ' . $this->data . '
        </label>
        </div>';
        return $this;
    }

    function createCheckBox() {
        $this->html.='<div class = "controls">
        <label class = "checkbox">
        <input type = "checkbox" name = ' . $this->options['name'] . ' id = "' . $this->options['id'] . '" class="' . $this->options['class'] . '" ' . $this->options['mandatory'] . '>
         ' . $this->data . '
        </label>
        </div>';
        return $this;
    }

    function createInformationLabel() {
        if ($_GET['m'] != "") {
            $_GET['mc'] = $_GET['mc'] ? $_GET['mc'] : 'alert-error';
            echo '<div class="alert ' . $_GET['mc'] . '">
                ' . $_GET['m'] . '
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>';
        }
    }

    function html() {
        $temp = $this->html;
        unset($this->html, $this->options, $this->data);
        return $temp;
    }

}

?>
