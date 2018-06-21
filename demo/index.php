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

	if (!$lists = $events->getItems()) {
		return;
	}

	foreach ($lists as $list) {
		if (empty($list->summary)) {
			continue;
			// echo '<pre>';
			// var_dump($list);
			// echo '</pre>';
		}
		if (empty($list->start->dateTime)) {
			echo "<small><time>{$list->start->date}</time></small>";
		} else {
			$start = date('Y-m-d H:i', strtotime($list->start->dateTime));
			$end = date('Y-m-d H:i', strtotime($list->end->dateTime));
			echo "<small><time>{$start} 〜 {$end}</time></small>";
		}
		echo "<h3>{$list->summary}</h3>";
		// echo "<h3>予約済み</h3>";
		echo "<p>{$list->description}</p>";
		echo "<hr>";
		// echo '<pre>';
		// var_dump($list);
		// break;
	}

} catch (Exception $e) {
	var_dump($e->getMessage());
}