<?php
/**
 * Created by PhpStorm.
 * User: castrilu
 * Date: 13/07/2016
 * Time: 08:51 AM
 */

ini_set('display_errors', '1');
error_reporting(E_ALL);

class LoadLogs{
    protected $strPath = null;

    public function __construct($strPath)
    {
        $this->strPath = $strPath;
    }

    public function getArrFiles()
    {
        $directory = new \RecursiveDirectoryIterator($this->strPath);
        $iterator = new \RecursiveIteratorIterator($directory);
        $files = array();
        foreach ($iterator as $info) {
            $files[] = realpath($info->getPathname());
        }
        return $files;
    }

    public function getRowsFiles($arrLikeErrors, $strPregDateTime)
    {
        $arrFiles = $this->getArrFiles();
        $strPreg = "/^(" . $strPregDateTime . ").+(" . implode("|", $arrLikeErrors) . ")/";
        $strPregDateTime = "/^(" . $strPregDateTime . ")/";
        $arrTotals = array();

        set_time_limit(5 * 60);

        foreach ($arrFiles as $strPathFile){
            $arrLines = file($strPathFile);
            foreach ($arrLines as $strLine){
                preg_match($strPreg, $strLine, $output_array);
                if(isset($output_array[2])){
                    $arrTotals[$output_array[2]] = 1 + (isset($arrTotals[$output_array[2]]) ? $arrTotals[$output_array[2]] : 0);
                }else{
                    preg_match($strPregDateTime, $strLine, $output_array);
                    if(isset($output_array[1])){
                        $arrTotals['Other'] = 1 + (isset($arrTotals['Other']) ? $arrTotals['Other'] : 0);
                    }
                }
            }
        }
        return $arrTotals;
    }

}

require_once ('Param.php');
$objLoadLog = new LoadLogs(Param::PATHLOGS);
$arrTotal = $objLoadLog->getRowsFiles(Param::$arrFilters, Param::$strPregDateTime);

$arrTotalErrors = $arrTotal;
if(isset($arrTotalErrors['Other'])) {
    unset($arrTotalErrors['Other']);
}

echo json_encode(array(
    'arrTotal' => $arrTotal,
    'arrLabels' => array_keys($arrTotal),
    'arrTotalErr' => $arrTotalErrors,
    'arrLabelsErr' => array_keys($arrTotalErrors)
));
exit;