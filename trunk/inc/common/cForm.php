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

    function createHTable() {
        $dynamiccolumns = 0;
        $classoptions = $this->options['striped'] ? $this->options['striped'] : ' table-striped';
        $classoptions.=$this->options['border'] ? $this->options['border'] : ' table-bordered';
        $classoptions.=$this->options['hover'] ? $this->options['hover'] : ' table-hover';
        $classoptions.=$this->options['condensed'] ? $this->options['condensed'] : ' table-condensed';


        $columnNames = $this->options['header'] ? $this->options['header'] : array_keys($this->data[0]);

        $this->html.= '<table class="table ' . $classoptions . '" name="' . $this->options['name'] . '" id="' . $this->options['id'] . '">';
        $this->html.= '<thead>';
        $this->html.= '<tr>';
        if ($this->options['serialnocolumn'] === true) {
            $dynamiccolumns++;
            $this->html.= '<th> No.</th>';
        }

        foreach ($columnNames as $columnName) {

            $this->html.= '<th>' . $columnName . '</th>';
            $dynamiccolumns++;
        }

        if ($this->options['actioncolumn'] == true) {
            $dynamiccolumns++;
            $this->html.= '<th>Action</th>';
        }
        $this->html.= '</tr>';
        $this->html.= '</thead>';
        $this->html.= '<tbody>';
        $colcount = 1;
        if (is_array($this->data)) {
            foreach ($this->data as $row => $record) {
                $this->html.= '<tr>';
                if ($this->options['serialnocolumn'] === true) {

                    $this->html.= '<td> ' . $colcount . '</td>';
                    $colcount++;
                }
                foreach ($record as $columnname => $columnvalue) {


                    if ($this->options['column']['type'][$columnname] == 'date') {
                        $columnvalue = $this->formatDate($columnvalue, $this->options['column']['format'][$columnname]);
                    }
                    $columnvalue = $this->options['customcontrol'][$columnname][$columnvalue] ? str_replace("[columndata]", $columnvalue, $this->options['customcontrol'][$columnname][$columnvalue]) : $columnvalue;

                    $this->html.= '<td>' . $columnvalue . '</td>';
                }
                if ($this->options['actioncolumn'] == true) {

                    $this->html.= '<td>
            ' . $this->options['actioncolumnicons']
                    ;

                    $this->html.= '</td>';
                }
                $this->html.= '</tr>';
            }
        } else {
            $this->html.= '</tr><td colspan=' . ($dynamiccolumns) . '>No Data to display</td></tr>';
        }
        $this->html.= '</tbody>';
        $this->html.= '</table>';
        return $this;
    }

    function addAlert() {
        if ($this->options['alert']['data']) {
            $this->options['alert']['type'] = $this->options['alert']['type'] ? $this->options['alert']['type'] : "block";
            $this->html.='<div class="alert alert-' . $this->options['alert']['type'] . '">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h4>' . $this->options['alert']['title'] . '!</h4>
        ' . $this->options['alert']['data'] . '
        </div>';
        }
        return $this;
    }

    function createSelect() {
        $this->options['id'] = $this->options['id'] ? $this->options['id'] : $this->options['name'];
        $this->options['mandatory'] = $this->options['mandatory'] ? true : "";
        $this->html.='<select name = ' . $this->options['name'] . ' id = "' . $this->options['id'] . '" class="' . $this->options['class'] . '" ' . $this->options['mandatory'] . '>';
        if ($this->options['default'] !== false) {
            $this->options['default'] = $this->options['default'] ? $this->options['default'] : "--Select--";
            $this->html.='<option value="' . $key . '" >' . $this->options['default'] . '</option>';
        }

        foreach ($this->data as $key => $value) {
            $selected = ($this->options['selected'] == $key) ? "selected" : "";
            $this->html.='<option value="' . $key . '" ' . $selected . ' >' . $value . '</option>';
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

    function createLabel() {

    }

    function html() {
        $temp = $this->html;
        unset($this->html, $this->options, $this->data);
        return $temp;
    }

}

?>
