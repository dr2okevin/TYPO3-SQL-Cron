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
            $GLOBALS['BE_USER']->writeLog(1, 0, 0, 0, 'SQL: '.$this->sql.' ['.$gesamttime.' ms]', 'SQL Cron', $this->sql);
            #t3lib_div::sysLog('SQL: '.$this->sql, 'dr2okevin_sql_cron', '0');
            return true;
        }
        else
        {
            $error = $GLOBALS['TYPO3_DB']->sql_error();
            $GLOBALS['BE_USER']->writeLog(1, 0, 1, 0, 'SQL Fehlgeschlagen: '.$this->sql.' ['.$error.'] ['.$gesamttime.' ms]', 'SQL Cron', $this->sql);
            #t3lib_div::sysLog('SQL Fehlgeschlagen: '.$this->sql, 'dr2okevin_sql_cron', '3');
            return false;
        }
    }
    public function getAdditionalInformation() {
        return 'SQL Befehl: '.$this->sql;
    }
}
?>