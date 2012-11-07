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

        $classoptions = $this->options['striped'] ? $this->options['striped'] : ' table-striped';
        $classoptions.=$this->options['border'] ? $this->options['border'] : ' table-bordered';
        $classoptions.=$this->options['hover'] ? $this->options['hover'] : ' table-hover';
        $classoptions.=$this->options['condensed'] ? $this->options['condensed'] : ' table-condensed';


        $columnNames = $this->options['header'] ? $this->options['header'] : array_keys($this->data[0]);

        $this->html.= '<table class="table ' . $classoptions . '">';
        $this->html.= '<thead>';
        $this->html.= '<tr>';
        if ($this->options['serialnocolumn'] != false)
            $this->html.= '<th> No.</th>';

        foreach ($columnNames as $columnName) {

            $this->html.= '<th>' . $columnName . '</th>';
        }

        if ($this->options['actioncolumn'] == true)
            $this->html.= '<th>Action</th>';
        $this->html.= '</tr>';
        $this->html.= '</thead>';
        $this->html.= '<tbody>';

        foreach ($this->data as $row => $record) {
            $this->html.= '<tr>';
            foreach ($record as $columnname => $columnvalue) {
                if ($this->options['column']['type'][$columnname] == 'date') {
                    $columnvalue = $this->formatDate($columnvalue, $this->options['column']['format'][$columnname]);
                }
                $columnvalue = $this->options['customcontrol'][$columnname][$columnvalue] ? str_replace("[columndata]", $columnvalue, $this->options['customcontrol'][$columnname][$columnvalue]) : $columnvalue;

                $this->html.= '<td>' . $columnvalue . '</td>';
            }
            if ($this->options['actioncolumn'] == true) {
                $this->html.= '<td>
            <i class="icon-edit"></i>
            <i class="icon-trash"></i>
            <i class="icon-ok"></i>';
                $this->html.= '</td>';
            }
            $this->html.= '</tr>';
        }

        $this->html.= '</tbody>';
        $this->html.= '</table>';
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
    }

    function html() {
        $temp = $this->html;
        unset($this->html,  $this->options,  $this->data);
        return $temp;
    }

}
?>
