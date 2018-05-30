<?php

namespace WPGMZA;

class GDPRCompliance
{
	public function __construct()
	{
		add_filter('wpgmza_global_settings_tabs', array($this, 'onGlobalSettingsTabs'));
		add_filter('wpgmza_global_settings_tab_content', array($this, 'onGlobalSettingsTabContent'));
		
		add_filter('wpgmza_plugin_get_default_settings', array($this, 'onPluginGetDefaultSettings'));
		
		add_action('wp_ajax_wpgmza_gdpr_privacy_policy_notice_dismissed', array($this, 'onPrivacyPolicyNoticeDismissed'));
	}
	
	public function onPluginGetDefaultSettings($settings)
	{
		return array_merge($settings, array(
			'wpgmza_gdpr_enabled'		=> 1,
			'wpgmza_gdpr_notice'		=> apply_filters('wpgmza_gdpr_notice',
											__('I agree for my personal data, provided via submission through \'User Generated Markers\' where applicable, \'WP Google Maps\' Live Tracking app, where applicable, to be processed by {COMPANY_NAME}.
		
I agree for my personal data, provided via map API calls, to be processed by the API provider, for the purposes of geocoding (converting addresses to coordinates), reverse geocoding and generating directions.

WP Google Maps uses jQuery DataTables to display sortable, searchable tables, such as that seen in the Advanced Marker Listing and on the Map Edit Page. jQuery DataTables in certain circumstances uses a cookie to save and later recall the "state" of a given table - that is, the search term, sort column and order and current page. This data is help in local storage and retained until this is cleared manually. No libraries used by WP Google Maps transmit this information.

Some visual components of WP Google Maps use 3rd party libraries which are loaded over the network. At present the libraries are Google Maps, Open Street Map, jQuery DataTables and FontAwesome. When loading resources over a network, the 3rd party server will receive your IP address and User Agent string amongst other details. Please refer to the Privacy Policy of the respective libraries for details on how they use data and the process to exercise your rights under the GDPR regulations.

When using the User Generated Marker addon, data will be stored indefinitiely for the following purpose(s): {RETENTION_PURPOSE}'), 'wp-google-maps'),
			
			'wpgmza_gdpr_retention_purpose' => 'presenting the data you have submitted on the map.'
		));
	}
	
	public function onPrivacyPolicyNoticeDismissed()
	{
		$wpgmza_other_settings = get_option('WPGMZA_OTHER_SETTINGS');
		$wpgmza_other_settings['privacy_policy_notice_dismissed'] = true;
		
		update_option('WPGMZA_OTHER_SETTINGS', $wpgmza_other_settings);
		
		wp_send_json(array(
			'success' => 1
		));
		
		exit;
	}
	
	protected function getSettingsTabContent()
	{
		$wpgmza_other_settings = get_option('WPGMZA_OTHER_SETTINGS');
		
		$document = new DOMDocument();
		$document->loadPHPFile(plugin_dir_path(__DIR__) . 'html/gdpr-compliance-settings.html.php');
		$document->populate($wpgmza_other_settings);
		
		return $document;
	}
	
	public function getNoticeHTML($checkbox=true)
	{
		$wpgmza_other_settings = get_option('WPGMZA_OTHER_SETTINGS');
		
		if(!$wpgmza_other_settings || empty($wpgmza_other_settings['wpgmza_gdpr_notice']))
			return '';
		
		$html = $wpgmza_other_settings['wpgmza_gdpr_notice'];
		
		$company_name 			= (empty($wpgmza_other_settings['wpgmza_gdpr_company_name']) ? '' : $wpgmza_other_settings['wpgmza_gdpr_company_name']);
		$retention_period_days 	= (empty($wpgmza_other_settings['wpgmza_gdpr_retention_period_days']) ? '' : $wpgmza_other_settings['wpgmza_gdpr_retention_period_days']);
		$retention_purpose		= (empty($wpgmza_other_settings['wpgmza_gdpr_retention_purpose']) ? '' : $wpgmza_other_settings['wpgmza_gdpr_retention_purpose']);
		
		$html = preg_replace('/{COMPANY_NAME}/i', $company_name, $html);
		$html = preg_replace('/{RETENTION_PERIOD}/i', $retention_period_days, $html);
		$html = preg_replace('/{RETENTION_PURPOSE}/i', $retention_purpose, $html);
		
		if($checkbox)
			$html = '<input type="checkbox" name="wpgmza_ugm_gdpr_consent" required/> ' . $html;
		
		$html = apply_filters('wpgmza_gdpr_notice_html', $html);
		
		return $html;
	}
	
	public function getPrivacyPolicyNoticeHTML()
	{
		global $wpgmza;
		
		if(!empty($wpgmza->settings->privacy_policy_notice_dismissed))
			return '';
		
		return "
			<div id='wpgmza-gdpr-privacy-policy-notice' class='notice notice-info is-dismissible'>
				<p>" . __('In light of recent EU GDPR regulation, we strongly recommend reviewing the <a target="_blank" href="https://www.wpgmaps.com/privacy-policy">WP Google Maps Privacy Policy</a>', 'wp-google-maps') . "</p>
			</div>
			";
	}
	
	public function getConsentPromptHTML()
	{
		return '<div>' . $this->getNoticeHTML(false) . "<p class='wpgmza-centered'><button class='wpgmza-api-consent'>" . __('I agree', 'wp-google-maps') . "</button></div></p>";
	}
	
	public function onGlobalSettingsTabs($input)
	{
		return $input . "<li><a href=\"#wpgmza-gdpr-compliance\">".__("GDPR Compliance","wp-google-maps")."</a></li>";
	}
	
	public function onGlobalSettingsTabContent()
	{
		$document = $this->getSettingsTabContent();
		return $document->saveInnerBody();
	}
	
	public function onPOST()
	{
		$document = $this->getSettingsTabContent();
		$document->populate($_POST);
		
		$wpgmza_other_settings = get_option('WPGMZA_OTHER_SETTINGS');
		if(!$wpgmza_other_settings)
			$wpgmza_other_settings = array();
		
		foreach($document->querySelectorAll('input, select, textarea') as $input)
		{
			$name = $input->getAttribute('name');
			
			if(!$name)
				continue;
			
			switch($input->getAttribute('type'))
			{
				case 'checkbox':
					if($input->getValue())
						$wpgmza_other_settings[$name] = 1;
					else
						unset($wpgmza_other_settings[$name]);
					break;
				
				default:
					$wpgmza_other_settings[$name] = stripslashes( $input->getValue() );
					break;
			}
		}
		
		update_option('WPGMZA_OTHER_SETTINGS', $wpgmza_other_settings);
	}
}

$wpgmzaGDPRCompliance = new GDPRCompliance();
