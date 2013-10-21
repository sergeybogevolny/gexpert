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
    private $filters = "";
    private $__loadedjs = array();
    private $__loadedcss = array();

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
        if ($this->options['reporttable'] == true) {
            $this->createFilter();
        }

        $this->options['id'] = $this->options['id'] ? $this->options['id'] : rand();
        $this->html.= '<table class="table ' . $classoptions . '" name="' . $this->options['name'] . '" id="' . $this->options['id'] . '">';
        $this->html.= '<thead>';
        $this->html.= '<tr>';
        if ($this->options['serialnocolumn'] === true) {
            $this->html.= '<th> No.</th>';
        }

        $columnorder = array();
        $rowno = 1;
        foreach ($this->options['column'] as $columnname => $columnDetails) {
            $columnorder[$columnname] = $columnDetails['index'];
        }
        array_multisort($columnorder, SORT_ASC, $this->options['column']);
        if ($this->options['crosstab'] == true && count($this->data) > 0) {
            $this->createCrossTabArray();
            $this->createCrossTabHeader();
        } else {
$filtergroup=2;
            foreach ($this->options['column'] as $columnname => $columnDetails) {

                if ($columnDetails['index'] > 0) {

                    $this->html.= '<th>' . $columnDetails['name'];
                    if ($this->options['column'][$columnname]['filter_html'] && $columnDetails['filter'] == 'inline') {

                        $this->html.='<div class="span3">' . $this->options['column'][$columnname]['filter_html'] . '</div>';
                    }
                    $this->html.='</th>';
                } else {
                    $this->html.='<th class="hide ' . $columnname . '">' . $columnname . '</th>';
                }
                if ($this->options['column'][$columnname]['filter_html'] && $columnDetails['filter'] == 'box') {
                    $filtergroup=$filtergroup==0?2:$filtergroup;
					$filters[$filtergroup].= '<div class="control-group report-filter">
											<label for="textfield" class="control-label report-filter-title">' . $columnDetails['name'] . '</label>
											<div class="controls">
										' . $this->options['column'][$columnname]['filter_html'] . "</div></div>";
				$filtergroup--;
                }
            }
			
			$this->filters='<div class="span6">'.implode('</div><div class="span6">',$filters).'</div>';
        }

        if ($this->filters != '') {
            $this->html = '<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#filtercontainer" data-toggle-text="Hide">
                            Show/Hide Filter(s)
                          </button>
                          <div id="filtercontainer" class="collapse in" ><div class="report-filters" id="reportfilters">' . $this->filters . '</div></div>' . $this->html;
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
                    $this->html.= '<td> ' . ($row + 1) . '</td>';
                }
                foreach ($this->options['column'] as $columnname => $columnDetails) {
                    $columnvalue = $record[$columnname];
                    $class = '';
                    if ($columnDetails['index'] < 0) {
                        $class = " hide $columnname ";
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
        if ($this->options['reporttable'] == true) {


            $this->html.='<script>$(document).ready(function(){
            $("#' . $this->options['id'] . '").dataTable({

   ';
            if ($this->options['exportoptions'] === true) {

                $tablettools = "T";
                $this->html.='  "oTableTools": {
            "sSwfPath": "' . AppTableToolsUrl . 'copy_csv_xls_pdf.swf"

        },';
            }
            $this->html.='"sDom": "' . $tablettools . '<\'row-fluid\'<\'span6\'><\'span4\'>r>t <\'row\' <\'span3\' l><\'span2\' ><\'span2\'i ><\'span4\'p>>",
		"sPaginationType": "full_numbers",
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page"
		}});
$(".filter_type,.filterdata").click(function(e){ e.stopPropagation();}).keydown(function (e){
                        if(e.keyCode == 13){

                            $("#' . $this->options['id'] . '").parents("form").submit();
                                e.stopPropagation();
                        }
                    });

            $(".calendar").daterangepicker(
                            {
                                ranges: {
                                    "This Month": [Date.today().moveToFirstDayOfMonth(), Date.today().moveToLastDayOfMonth()],
                                    "Next Month": [Date.today().moveToFirstDayOfMonth().add({months: 1}), Date.today().add({months: 1}).moveToLastDayOfMonth()],
                                    "Last Month": [Date.today().moveToFirstDayOfMonth().add({months: -1}), Date.today().add({months: -1}).moveToLastDayOfMonth()],
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
        }
        if ($this->options['having_form'] === false)
            $this->html = '<form name="' . $this->options['id'] . '_form" method="post" class="form-horizontal form-column form-bordered" style=\"padding:15px\">' . $this->html . '</form>';

        return $this;
    }

    function createChart() {

        if ($this->__loadedjs['jqplot']['core'] == false) {
            $this->html .= "<script src='" . AppJsURL . "jquery.jqplot.js'></script>";
            $this->__loadedjs['jqplot']['core'] = true;
        }
        if ($this->__loadedjs['jqplot']['CategoryAxisRenderer'] == false) {
            $this->html .= "<script src='" . AppJsURL . "jqplot_plugins/jqplot.categoryAxisRenderer.js'></script>";
            $this->__loadedjs['jqplot']['CategoryAxisRenderer'] = true;
        }
        if ($this->__loadedjs['jqplot']['BarRenderer'] == false) {
            $this->html .= "<script src='" . AppJsURL . "jqplot_plugins/jqplot.BarRenderer.js'></script>";
            $this->__loadedjs['jqplot']['BarRenderer'] = true;
        }
        if ($this->__loadedcss['jqplot'] == false) {
            $this->html .= '<link rel="stylesheet" href="' . AppCssURL . 'jquery.jqplot.css">';
            $this->__loadedcss['jqplot'] = true;
        }
        $this->formatChartData();
        $this->html .= "<div id='" . $this->options['id'] . "_container' style=\"padding:15px\"><div id='" . $this->options['id'] . "' ></div></div><script>
    $(document).ready(function() {
     $.jqplot.config.enablePlugins = true;
    var plot1 = $.jqplot (
            '" . $this->options['id'] . "',
         [" . json_encode($this->data['y']) . "],
         {
         animate: !$.jqplot.use_excanvas,
         animateReplot: true,
         cursor: {
            show: true,
            zoom: true,
            looseZoom: true,
            showTooltip: true
        },
        title: {
        text: '" . $this->options['title'] . "',   // title for the plot,
        show: true,
    }, seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true }
            },
 axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: " . json_encode($this->data['x']) . "


                }
            }

         }
         );

if (!$.jqplot.use_excanvas) {
        $('div.jqplot-target').each(function(){
            var outerDiv = $(document.createElement('div'));
            var header = $(document.createElement('div'));
            var div = $(document.createElement('div'));

            outerDiv.append(header);
            outerDiv.append(div);

            outerDiv.addClass('jqplot-image-container');
            outerDiv.addClass('modal');
            header.addClass('jqplot-image-container-header');
            header.addClass('modal-header');
            div.addClass('jqplot-image-container-content');
            div.addClass('modal-body');

            header.html('Right Click to Save Image As...');

            var close = $(document.createElement('button'));
            close.addClass('jqplot-image-container-close');
            close.html('Close');
            close.attr('href', '#');
            close.click(function() {
                $(this).parents('div.jqplot-image-container').hide(500);
            })
            header.append('<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>');
$('table').on({
    'click': function () {
        $(this).parents('.modal').hide();
            }
            }, '.close ');
            $(this).after(outerDiv);
            outerDiv.hide();

            outerDiv = header = div = close = null;

            if (!$.jqplot._noToImageButton) {
                var btn = $('<button type=\"button\" class=\"jqplot-image-button btn btn-primary\" >Export Chart Image</button>');

                btn.bind('click', {chart: $(this)}, function(evt) {
                    var imgelem = evt.data.chart.jqplotToImageElem();
                    var div = $(this).nextAll('div.jqplot-image-container').first();
                    div.children('div.jqplot-image-container-content').empty();
                    div.children('div.jqplot-image-container-content').append(imgelem);
                    div.show(500);
                    div = null;
                });

                $(this).before(btn);
                btn.after('<br />');
                btn = null;
            }
        });
    }

    });</script>";
    }

    function formatChartData() {
        $result = array();
		if(is_array($this->data)){
		
        foreach ($this->data as $record) {
            foreach ($this->options['axis']['x'] as $xcolumnname => $xvalue) {
                //print_r($columnname);
                foreach ($this->options['axis']['y'] as $ycolumnname => $yvalue) {
                    switch ($yvalue['agg_function']) {
                        case 'count':

                            $result[$record[$xcolumnname]]++;
                            break;

                        default:
                            $result[$record[$xcolumnname]]+= $record[$ycolumnname];
                            break;
                    }
                }
            }
        }


        $this->data['x'] = array_keys($result);
        $this->data['y'] = array_values($result);
        //print_r(json_encode((array) $result));
		}
    }

    function createFilterCondition($filtertype, $filterdata) {

        $filtercondition = array();
        $conditionString = array();
        if (is_array($filtertype)) {
            foreach ($filtertype as $column_name => $type) {
                switch ($type) {
                    case 'is':
                        if ($filterdata[$column_name] != '') {
                            if ($this->options['column'][$column_name]['type'] == 'date') {
                                list($filterdata[$column_name]) = explode("~", $filterdata[$column_name]);
                            }
                            $filtercondition[] = $column_name . "='" . $filterdata[$column_name] . "'";
                        }

                        break;
                    case 'is_not':
                        if ($filterdata[$column_name] != '') {
                            if ($this->options['column'][$column_name]['type'] == 'date') {
                                list($filterdata[$column_name]) = explode("~", $filterdata[$column_name]);
                            }
                            $filtercondition[] = $column_name . "<>'" . $filterdata[$column_name] . "'";
                        }
                        break;

                    case 'less_than': case 'is_before':
                        if ($filterdata[$column_name] != '') {
                            if ($this->options['column'][$column_name]['type'] == 'date') {
                                list($filterdata[$column_name]) = explode("~", $filterdata[$column_name]);
                            }
                            $filtercondition[] = $column_name . "<'" . $filterdata[$column_name] . "'";
                        }
                        break;
                    case 'greater_than': case 'is_after':
                        if ($filterdata[$column_name] != '') {
                            if ($this->options['column'][$column_name]['type'] == 'date') {
                                list($filterdata[$column_name]) = explode("~", $filterdata[$column_name]);
                            }
                            $filtercondition[] = $column_name . ">'" . $filterdata[$column_name] . "'";
                        }
                        break;
                    case 'between':
                        if ($filterdata[$column_name] != '') {
                            if ($this->options['column'][$column_name]['type'] == 'date') {
                                list($fromdate, $todate) = explode("~", $filterdata[$column_name]);
                                $filterdata[$column_name] = $fromdate . "' And '" . $todate;
                            }
                            $filtercondition[] = "date(" . $column_name . ") between '" . $filterdata[$column_name] . "'";
                        }
                        break;
                    case 'not_between':
                        if ($filterdata[$column_name] != '') {
                            if ($this->options['column'][$column_name]['type'] == 'date') {
                                list($fromdate, $todate) = explode("~", $filterdata[$column_name]);
                                $filterdata[$column_name] = $fromdate . "' And '" . $todate;
                            }
                            $filtercondition[] = $column_name . " not between '" . $filterdata[$column_name] . "'";
                        }

                        break;
                    case 'in':
                        if ($filterdata[$column_name] != '') {
                            $filtercondition[] = $column_name . " in (" . $filterdata[$column_name] . ")";
                        }
                        break;
                    case 'not_in':
                        if ($filterdata[$column_name] != '') {
                            $filtercondition[] = $column_name . " not in (" . $filterdata[$column_name] . ")";
                        }
                        break;
                    case 'empty':

                        $filtercondition[] = $column_name . " =''";
                        break;
                    case 'not_empty':
                        $filtercondition[] = $column_name . " <>''";
                        break;
                    case 'contains':
                        if ($filterdata[$column_name] != '') {
                            $filtercondition[] = 'lower(' . $column_name . ') like ' . "'%" . strtolower($filterdata[$column_name]) . "%'";
                        }
                        break;
                    case 'not_contains':

                        if ($filterdata[$column_name] != '') {
                            $filtercondition[] = 'lower(' . $column_name . ') Not like ' . "'%" . strtolower($filterdata[$column_name]) . "%'";
                        }
                        break;
                    case 'starts_with':
                        if ($filterdata[$column_name] != '') {
                            $filtercondition[] = 'lower(' . $column_name . ') like ' . "'" . strtolower($filterdata[$column_name]) . "%'";
                        }
                        break;
                    case 'ends_with':
                        if ($filterdata[$column_name] != '') {
                            $filtercondition[] = 'lower(' . $column_name . ') Not like ' . "'%" . strtolower($filterdata[$column_name]) . "'";
                        }
                        break;


                    //TODO Add relative date filter
                }
            }
            return $filtercondition;
        }
    }

    function createCrossTabHeader() {
        $valuesep = '::';
        $groupsep = "~~";
        $tabbed_header = array_splice($this->data[0], count($this->options['keep_columns']));
        foreach ($tabbed_header as $columnname => $value) {
            list($prefix, $value_column) = explode($valuesep, $columnname);
            $spanArray[$prefix][$value_column]++;
            //$this->html.= '<th colspan="' . count($this->options['value_columns']) . '">' . 'Abc' . '</td>';
        }

        foreach ($this->options['keep_columns'] as $columnname) {


            $this->html.= '<th rowspan="2">' . $this->options['column'][$columnname]['name'];
            if ($this->options['column'][$columnname]['filter_html'] && $this->options['column'][$columnname]['filter'] == 'inline') {

                $this->html.='<div class="span3">' . $this->options['column'][$columnname]['filter_html'] . '</div>';
            }
            $this->html.='</th>';

            if ($this->options['column'][$columnname]['filter_html'] && $this->options['column'][$columnname]['filter'] == 'box') {
                $this->filters .= '<span class="report-filter"> <span class="report-filter-title">' . $this->options['column'][$columnname]['name'] . ' : </span>' . $this->options['column'][$columnname]['filter_html'] . "</span>";
            }
        }



        foreach ($spanArray as $key => $value) {
            $this->html.="<th colspan='" . count($value) . "'>" . $key . "</th>";
        }
        $this->html.="</tr><tr>";
        foreach ($spanArray as $key => $value) {
            foreach ($value as $key1 => $value1) {
                $this->html.="<th>" . $key1 . "</th>";
            }
        }
    }

//$this->data, $keep_columns_array, $group_column, $value_column, $need_percentage_column = "", $need_row_total = 't', $need_column_total = 't', $need_individual_column_percentage_array = array(), $is_sort = FALSE, $data_type_array = array()
    function createCrossTabArray() {
        // Declarations
        $value_separator = "::";
        $group_separator = "~~";
        $keep_column_separator = "\t";
        // form an array and fetch distinct values of keep columns group column ,and value Columns
        //Eg:array[keep_column_data][group_column1~~group_column2.....~~group_columnn::value_column1].....
        //array[keep_column_data][group_column1~~group_column2.....~~group_columnn::value_columnn]
        foreach ($this->data as $key => $value) {
            //creating Keep column String by appending all the keep columns as one data column
            $keep_columns_value = '';
            foreach ($this->options['keep_columns'] as $value1) {
                $keep_columns_value.=($value[$value1]) ? $value[$value1] : "--";
                $keep_columns_value.=$keep_column_separator;
            }
            $keep_columns_value = rtrim($keep_columns_value, $keep_column_separator);

            //creating Group column String by appending all the group columns as one data column
            $group_column_value = "";
            foreach ($this->options['group_columns'] as $group_column_name) {
                $group_column_value.=$value[$group_column_name] . $group_separator;
                unset($this->options['column'][$group_column_name]);
            }
            $group_column_value = rtrim($group_column_value, $group_separator);
            //creating Value column String by appending all the Value columns as one data column
            foreach ($this->options['value_columns'] as $value_column_name) {
                $group_column_value_and_value_column = $group_column_value . $value_separator . $value_column_name;
                if ($this->options['column'][$value_column_name]['type'] == 'numeric')
                    $formated_data_array[$keep_columns_value][$group_column_value_and_value_column]+=$value[$value_column_name];
                else
                    $formated_data_array[$keep_columns_value][$group_column_value_and_value_column] = $value[$value_column_name];

                $row_to_column[$group_column_value_and_value_column]++;
            }
        }
        $row = 0;
        $columns = 0;
        $result_data_array = array();

        //push the keep columns name in to the first record of the result array
        foreach ($this->options['keep_columns'] as $keep_column_name) {
            $result_array[$row][$keep_column_name] = $keep_column_name;
        }
        $row_to_column = array_keys($row_to_column);
        if ($is_sort)
            natcasesort($row_to_column);


        // push group_column distinct values into the first record of the result array
        foreach ($row_to_column as $group_column_name) {
            $result_array[$row][$group_column_name] = $group_column_name;
        }
        $row++;


        $keep_column_data_array = array_keys($formated_data_array);
        if ($is_sort)
            natcasesort($keep_column_data_array);

        // push the data of keep columns and the value column into the result array
        foreach ($keep_column_data_array as $key => $keep_column_data) {

            $is_master_data = str_replace(array("\t", "--"), "", $keep_column_data);
            if ($is_master_data) {
                $columns = 0;
                $keep_column_data_splited = explode($keep_column_separator, $keep_column_data);

                foreach ($keep_column_data_splited as $key => $value) {
                    $result_array[$row][$columns] = $value;
                    $group_column[$columns] = $columns;
                    $columns++;
                }
                foreach ($row_to_column as $key => $value) {
                    //Add column values for each row data
                    list($prefix, $value_column_name) = explode($value_separator, $value);
                    if (is_array($need_individual_column_percentage_array))

                    //Add Individual Percent tage to the column data
                        $column_value_percent = (in_array($value_column_name, $need_individual_column_percentage_array) && $formated_data_array[$keep_column_data][$value] > 0 && $result_array[$row][$position] > 0) ? "(" . (round($formated_data_array[$keep_column_data][$value] / $result_array[$row][$position] * 100, 2)) . "&nbsp;%)&nbsp;" : "";
                    $result_array[$row][$columns] = $formated_data_array[$keep_column_data][$value] . $column_value_percent;
                    //Increase the column count
                    $columns++;
                    $row_total_arrays[$row][$value_column_name]+=$formated_data_array[$keep_column_data][$value];
                    //Add column values for each column data
                    $column_total_arrays[$columns]+=$formated_data_array[$keep_column_data][$value];
                }
                $row++;
            }
        }


        $this->data = $result_array;
//Call Function to convert the number array to normal db array
        $this->convertNumberArrayToAssosiavtiveArray();
    }

    function convertNumberArrayToAssosiavtiveArray() {
        $value_separator = "::";
        $key_set = array_keys($this->data[0]);
        unset($this->data[0]);
        $resultant_array = array();
        $totalkeepcolumns = count($this->options['keep_columns']);
        foreach ($this->data as $key => $value) {
            foreach ($value as $key1 => $value1) {
                $column_name = $key_set[$key1];
                if ($key == 1) {
                    if (strstr($column_name, $value_separator)) {
                        list($prefix, $value_column_name) = explode($value_separator, $column_name);
                        $display_name = $this->options['column'][$value_column_name]['name'];
                        $unsetcolumns[] = $value_column_name;
                        $this->options['column'][$column_name]['name'] = $prefix . $value_separator . $display_name;
                        $this->options['column'][$column_name]['index'] = ($totalkeepcolumns + $key);
                    }
                }
                $this->data[$key - 1][$column_name] = ($value1) ? $value1 : $fill_string;
            }
        }
        foreach ($unsetcolumns as $valuecolumnname) {
            unset($this->options['column'][$valuecolumnname]);
        }
//        $this->data = $resultant_array;
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
                        $this->options['class'] .=' number input-mini';
                        $this->options['type'] = 'number';
                        $this->createInput();
                        $filter_data = $this->html;
                        $this->data = $numberFilterTypeData;
                        $this->options['selected'] = 'is';
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
                        $this->options['selected'] = 'between';
                        break;
                    default:

                        $this->options['type'] = 'text';
                        $this->options['class'] .= ' input-small ';
                        $this->createInput();
                        $filter_data = $this->html;
                        $this->data = $stringFilterData;
                        $this->options['selected'] = 'contains';
                        break;
                }

                $this->options['id'] = "filter_type[" . $columnname . "]";
                $this->options['name'] = "filter_type[" . $columnname . "]";
                $this->options['default'] = "-- All --";
                $this->options['selected'] = $_POST['filter_type'][$columnname] ? $_POST['filter_type'][$columnname] : $this->options['selected'];
                $this->options['class'] = 'filter_type';
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
