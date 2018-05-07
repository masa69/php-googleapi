<?php

require __DIR__ . '/../app.php';

try {
	$config = Config::get('google');
	putenv('GOOGLE_APPLICATION_CREDENTIALS=' . $config->json);

	$client = new Google_Client();
    $client->setApplicationName('Google Calendar API PHP Sample');
	$client->setScopes(Google_Service_Calendar::CALENDAR_READONLY);
	$client->useApplicationDefaultCredentials();

	$service = new Google_Service_Calendar($client);
	$events = $service->events->listEvents($config->calendarId);

	foreach ($events->getItems() as $event) {
		echo $event->getSummary() . "<hr>\n";
	}

} catch (Exception $e) {
	var_dump($e->getMessage());
}