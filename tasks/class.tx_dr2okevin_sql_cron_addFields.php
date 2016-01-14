<?php
class tx_dr2okevin_sql_cron_addFields implements tx_scheduler_AdditionalFieldProvider {
    public function getAdditionalFields(array &$taskInfo, $task, tx_scheduler_Module $parentObject) {

        if (empty($taskInfo['sql'])) {
            if($parentObject->CMD == 'edit') {
                $taskInfo['sql'] = $task->sql;
            } else {
                $taskInfo['sql'] = '';
            }
        }

        // Write the code for the field
        $fieldID = 'task_sql';
        $fieldCode = '<input type="text" name="tx_scheduler[sql]" id="' . $fieldID . '" value="' . $taskInfo['sql'] . '" size="30" />';
        $additionalFields = array();
        $additionalFields[$fieldID] = array(
            'code'     => $fieldCode,
            'label'    => 'SQL Befehl'
        );

        return $additionalFields;
    }

    public function validateAdditionalFields(array &$submittedData, tx_scheduler_Module $parentObject) {
        $submittedData['sql'] = trim($submittedData['sql']);
        if($submittedData['sql'] != '')
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function saveAdditionalFields(array $submittedData, tx_scheduler_Task $task) {
        $task->sql = $submittedData['sql'];
    }
}
?>