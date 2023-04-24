<?php
namespace Elements\Bundle\ProcessManagerBundle;
use Symfony\Component\Validator\Constraints\EmailValidator;

class BundleConfiguration
{
    protected array $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * @return bool
     */
    public function getDisableShortcutMenu()
    {
        return $this->config["disableShortcutMenu"];
    }

    /**
     * @return array
     */
    public function getClassTypes(){
        $result = [];
        foreach (Enums\General::EXECUTOR_CLASS_TYPES as $type){
            $result[$type] = $this->config[$type];
        }
        return $result;
    }

    public function getAdditionalScriptExecutionUsers() : array {
        return (array)$this->config["additionalScriptExecutionUsers"];
    }

    public function getReportingEmailAddresses() : array {
        $addresses = (array)$this->config["reportingEmailAddresses"];
        return array_filter($addresses);
    }

    public function getArchiveThresholdLogs() : int {
        return (int)$this->config["archiveThresholdLogs"];
    }

    public function getRestApiUsers() : array {
        return (array)$this->config["restApiUsers"];
    }

}
