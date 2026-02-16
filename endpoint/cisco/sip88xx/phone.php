<?php
/**
 * Cisco SIP 88xx Phone File
 *
 */
class endpoint_cisco_sip88xx_phone extends endpoint_cisco_base {
	
	public $family_line = 'sip88xx';
	public $mapfields=array(
		'dateformat'=>array(
			'default'=>'D/M/YY',
			'middle-endian'=>'M/D/YA',
			'big-endian'=>'YA.M.D',
			'little-endian'=>'D/M/YY',
		),
		'tonescheme'=>array(
			'default'=>'<networkLocale>United_States</networkLocale><networkLocaleInfo><name>United_States</name><uid>64</uid><version>1.0.0.0-1</version></networkLocaleInfo>',
			'UK'=>'<networkLocale>United_Kingdom</networkLocale><networkLocaleInfo><name>United_Kingdom</name></networkLocaleInfo>',
			'US'=>'<networkLocale>United_States</networkLocale><networkLocaleInfo><name>United_States</name><uid>64</uid><version>1.0.0.0-1</version></networkLocaleInfo>',
			'RO'=>'<networkLocale>Romania</networkLocale><networkLocaleInfo><name>Romania</name></networkLocaleInfo>',
		),
		'ciscotz'=>array( 
			'default'=>'Central Standard/Daylight Time',
			'America/New_York'=>'Eastern Standard/Daylight Time',
			'America/Chicago'=>'Central Standard/Daylight Time',
			'America/Denver'=>'Mountain Standard/Daylight Time',
			'America/Los_Angeles'=>'Pacific Standard/Daylight Time',
			'Europe/London'=>'GMT Standard/Daylight Time',
			'Europe/Dublin'=>'GMT Standard/Daylight Time',
			'Europe/Paris'=>'Central Europe Standard/Daylight Time',
			'Europe/Rome'=>'Central Europe Standard/Daylight Time',
			'Europe/Berlin'=>'Central Europe Standard/Daylight Time',
			'Europe/Bucharest'=>'GTB Standard/Daylight Time',
			'Europe/Athens'=>'GTB Standard/Daylight Time',
			'Europe/Helsinki'=>'GTB Standard/Daylight Time',
			'Pacific/Auckland'=>'New Zealand Standard/Daylight Time',
		),
	);
	function prepare_for_generateconfig() {
		$this->settings['ciscotz']=$this->DateTimeZone->getName();
		parent::prepare_for_generateconfig();
		$this->config_file_replacements['$mac']=strtoupper($this->mac);
		foreach ($this->settings['line'] AS &$line) {
			if (array_key_exists('displayname',$line) && (strlen($line['displayname']) > 11)) {
				$name = explode(" ", $line['displayname']);
				$line['displayname'] = substr($name[0],0,11);
			}
		}
	}
	
}
