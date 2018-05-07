
## memo

* [composer](https://getcomposer.org/download/)

```bash
$ cd /path/to/project
$ mkdir bin
$ php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
$ php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
$ php composer-setup.php --install-dir=bin --filename=composer
$ php -r "unlink('composer-setup.php');"
```


* [Google Calendar API](https://developers.google.com/calendar/quickstart/php)

```bash
$ bin/composer require google/apiclient
```


## getting started

```bash
$ bin/composer composer.json install
$ cd config
$ cp client_secret.sample.json client_secret.json
$ cp config.sample.json config.json
```

* config.php の calendarId に表示させたい calendarId を記入


### Create Service Account

#### [Google Cloud Platform](https://console.cloud.google.com/)
* 「IAMと管理」→「サービスアカウント」
* サービスアカウントを作成
	* サービスアカウント名「適当に」
	* とりあえず役割「Project」→「参照者」
	* 新しい秘密鍵の提供にチェック
		* タイプ「JSON」
	* DLしたjsonファイルの中身をコピーして /config/client_secret.json にペースト
		* jsonファイルの中身の「client_email」の項目をコピー "xxxxxxxx@xxxxxxxxxxxxxxx.iam.gserviceaccount.com"


#### Google Calendar
* 表示させたいカレンダーのアカウントに移動
* 「マイカレンダー」→「表示させたいカレンダー名のメニュー」→「設定と共有」
* 「特定のユーザーとの共有」→「ユーザーを追加」
* コピーした client_email をペースト
* 権限は参照系だけの場合は閲覧権限のみでOK
