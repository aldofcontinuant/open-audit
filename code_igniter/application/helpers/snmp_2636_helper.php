<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package Open-AudIT
 * @author Mark Unwin
 * @version 1.0.4
 * @copyright Copyright (c) 2013, Opmantek
 * @license http://www.gnu.org/licenses/agpl-3.0.html aGPL v3
 */
# Vendor Juniper
if (!function_exists('get_oid_details')) {

	function get_oid_details($details){
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.1') { $details->model = 'Juniper M40'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.2') { $details->model = 'Juniper M20'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.3') { $details->model = 'Juniper M160'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.4') { $details->model = 'Juniper M10'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.5') { $details->model = 'Juniper M5'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.6') { $details->model = 'Juniper T640'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.7') { $details->model = 'Juniper T320'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.8') { $details->model = 'Juniper M40e'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.9') { $details->model = 'Juniper M320'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.10') { $details->model = 'Juniper M7i'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.11') { $details->model = 'Juniper M10i'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.13') { $details->model = 'Juniper J2300'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.14') { $details->model = 'Juniper J4300'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.15') { $details->model = 'Juniper J6300'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.16') { $details->model = 'Juniper IRM'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.17') { $details->model = 'Juniper TX'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.18') { $details->model = 'Juniper M120'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.19') { $details->model = 'Juniper J4350'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.20') { $details->model = 'Juniper J6350'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.21') { $details->model = 'Juniper MX 960'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.22') { $details->model = 'Juniper J4320'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.23') { $details->model = 'Juniper J2320'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.24') { $details->model = 'Juniper J2350'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.25') { $details->model = 'Juniper MX 480'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.26') { $details->model = 'Juniper SRX 5800'; $details->type = 'gateway'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.27') { $details->model = 'Juniper T1600'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.28') { $details->model = 'Juniper SRX 5600'; $details->type = 'gateway'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.29') { $details->model = 'Juniper MX 240'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.30') { $details->model = 'Juniper EX 3200'; $details->type = 'switch'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.31') { $details->model = 'Juniper EX 4200'; $details->type = 'switch'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.32') { $details->model = 'Juniper EX 8208'; $details->type = 'switch'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.33') { $details->model = 'Juniper EX 8216'; $details->type = 'switch'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.34') { $details->model = 'Juniper SRX 3600'; $details->type = 'gateway'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.35') { $details->model = 'Juniper SRX 3400'; $details->type = 'gateway'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.36') { $details->model = 'Juniper SRX 210'; $details->type = 'gateway'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.37') { $details->model = 'Juniper TXP'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.38') { $details->model = 'Juniper JCS'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.39') { $details->model = 'Juniper SRX 240'; $details->type = 'gateway'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.40') { $details->model = 'Juniper SRX 650'; $details->type = 'gateway'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.41') { $details->model = 'Juniper SRX 100'; $details->type = 'gateway'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.42') { $details->model = 'Juniper LN 1000V'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.43') { $details->model = 'Juniper EX 2200'; $details->type = 'switch'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.44') { $details->model = 'Juniper EX 4500'; $details->type = 'switch'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.45') { $details->model = 'Juniper FX Series'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.46') { $details->model = 'Juniper IBM 4274M02J02M'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.47') { $details->model = 'Juniper IBM 4274M06J06M'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.48') { $details->model = 'Juniper IBM 4274M11J11M'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.49') { $details->model = 'Juniper SRX 1400'; $details->type = 'gateway'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.50') { $details->model = 'Juniper IBM 4274S58J58S'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.51') { $details->model = 'Juniper IBM 4274S56J56S'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.52') { $details->model = 'Juniper IBM 4274S36J36S'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.53') { $details->model = 'Juniper IBM 4274S34J34S'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.54') { $details->model = 'Juniper IBM 427348EJ48E'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.55') { $details->model = 'Juniper IBM 4274E08J08E'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.56') { $details->model = 'Juniper IBM 4274E16J16E'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.57') { $details->model = 'Juniper MX80'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.58') { $details->model = 'Juniper SRX 220'; $details->type = 'gateway'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.59') { $details->model = 'Juniper EXXRE'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.60') { $details->model = 'Juniper QFX Interconnect'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.61') { $details->model = 'Juniper QFX Node'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.62') { $details->model = 'Juniper QFX JVRE'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.64') { $details->model = 'Juniper SRX 110'; $details->type = 'gateway'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.65') { $details->model = 'Juniper SRX 120'; $details->type = 'gateway'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.67') { $details->model = 'Juniper MAG 6611'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.68') { $details->model = 'Juniper MAG 6610'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.71') { $details->model = 'Juniper IBM 0719J45E'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.72') { $details->model = 'Juniper IBM J08F'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.73') { $details->model = 'Juniper IBM J52F'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.75') { $details->model = 'Juniper Dell JFX3500'; $details->type = 'router'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.77') { $details->model = 'Juniper DELL JSRX3600'; $details->type = 'gateway'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.78') { $details->model = 'Juniper DELL JSRX3400'; $details->type = 'gateway'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.79') { $details->model = 'Juniper DELL JSRX1400'; $details->type = 'gateway'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.80') { $details->model = 'Juniper DELL JSRX5800'; $details->type = 'gateway'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.81') { $details->model = 'Juniper DELL JSRX5600'; $details->type = 'gateway'; }
		if ($details->snmp_oid == '1.3.6.1.4.1.2636.1.1.1.2.82') { $details->model = 'Juniper QFX Switch'; $details->type = 'switch'; }

		if ($details->snmp_version == '2') {
			# serial
			$details->serial = str_replace("STRING: ", "",@snmp2_get($details->man_ip_address, $details->snmp_community, "1.3.6.1.4.1.2636.3.1.3.0" ));
		}
	}
}
