<?php
class tx_dr2okevin_sql_cron extends tx_scheduler_Task {
    public function execute() {
        //Hier den eigentlich Task schreiben
        // SQL befehl verfügbar über $this->sql
        $starttime = microtime(true);
        $res = $GLOBALS['TYPO3_DB']->sql_query($this->sql);
        $gesamttime = microtime(true) - $starttime;
        $gesamttime = $gesamttime * 1000; //Convert s in ms
        if($res)
        {
            $log['type'] = 4; //Modules: This is the mode you may use for extensions having backend module functionality
            $log['action'] = 0; //not available
            $log['error'] = 0; //message, a notice of an action that happened.
            $log['details_nr'] = 0; //0 is a value that means the message is not supposed to be translated
            $log['details'] = str_replace('%','%%','SQL Cron: '.$this->sql.' ('.$gesamttime.' ms)'); //The log message text
            $log['data'] = NULL;
            $GLOBALS['BE_USER']->writeLog($log['type'],$log['action'],$log['error'],$log['details_nr'],$log['details'],$log['data']);

            return true;
        }
        else
        {
            $sqlerror = $GLOBALS['TYPO3_DB']->sql_error();
            $log['type'] = 4; //Modules: This is the mode you may use for extensions having backend module functionality
            $log['action'] = 0; //not available
            $log['error'] = 2; //System Error
            $log['details_nr'] = 0; //0 is a value that means the message is not supposed to be translated
            $log['details'] = str_replace('%','%%','SQL Cron error: '.$this->sql.' ('.$sqlerror.') ('.$gesamttime.' ms)'); //The log message text
            $log['data'] = NULL;
            $GLOBALS['BE_USER']->writeLog($log['type'],$log['action'],$log['error'],$log['details_nr'],$log['details'],$log['data']);

            return false;
        }
    }
    public function getAdditionalInformation() {
        return 'SQL Befehl: '.$this->sql;
    }
}
?>