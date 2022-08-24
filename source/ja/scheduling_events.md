<!--toc=scheduling-->

# イベント

イベントの管理は、メインメニューのスケジュールセクションから行います。

レイアウト、キャンペーン、オーバーレイレイ、割り込みレイアウト、コマンドとアクションの**イベントタイプ**は、特定の日時に表示されるようにディスプレイ/ディスプレイグループに割り当てることができます。

## イベントを追加

カレンダー上の**イベントを追加する**ボタンをクリックして、イベントのスケジュールを設定します。

![Add Scheduled Event](img\schedule_event_add.png)

### イベントタイプ

ドロップダウンを使って、イベントの種類を選択します。

- **レイアウト** - 公開済みレイアウトを選択します。

- **キャンペーン** - デザインされたキャンペーンを選択します。

- **オーバーレイアウト** - [オーバーレイアウト](layouts_overlay.html)としてスケジュールするために特別に設計されたレイアウトを選択します。

- **割り込みレイアウト** - [割り込みレイアウト](layouts_interrupt.html)を選択し、指定した**声のシェア**のために、通常のスケジュールに割り込んで再生します。

- **コマンド** - 定義済みのコマンドから選択します。

- **アクション** - このイベントは、以下の**アクションタイプ**のいずれかをトリガーするために、Webhookで入ってくる**トリガーコード**をプレーヤーにリッスンさせるものです。

  **レイアウトに移動する** - トリガーされたときにプレーヤーが移動すべきレイアウトのコード識別子を入力します。

  {tip}
  このコードは、新規にレイアウトを追加するとき、またはレイアウトグリッドの行メニューからレイアウトを編集するときに入力することができます。
  {/tip}

  **コマンド** - ドロップダウンメニューから選択します。

{tip}
割り込み/コマンドとアクションイベントを除くイベントは、[今すぐスケジュール](scheduling_now.html)機能を使って追加することも可能です。
{/tip}

### ディスプレイ

ディスプレイフィールドをクリックして、イベントのコンテンツを表示するディスプレイ/ディスプレイ グループを 1 つまたは複数選択します。

### 配信時間帯

**カスタム**/**常時**または**ユーザー**が作成した曜日をドロップダウンメニューで選択することができます。

カスタムを選択した状態で、日付ピッカーで開始/終了日時を選択します。

### レイアウト/キャンペーン

ドロップダウンメニューを使用して、スケジュールするレイアウトまたはキャンペーンを選択します。

### プレビュー

プレビューボタンをクリックすると、レイアウトやキャンペーンを別のタブで表示することができます。

{tip}
レイアウトやキャンペーンが正しく選択されていることを確認したり、合計期間などのチェックを、スケジュールを離れずに行うために使用すると便利です
{/tip}

### 表示順序

他のレイアウト／キャンペーンと同時にスケジュールされた場合、そのレイアウト／キャンペーンがローテーションで再生される順番を決定します。順番は数字の小さいものから順に並べられますので、**1と書かれたレイアウト/キャンペーン**は、**2と書かれたレイアウト/キャンペーン**よりも先に再生されることになります。

オーバーレイレイアウトの表示順序は、レイアウトリージョンがオーバーレイに適用される順序を決定し、リージョン自身のレイヤー設定を補完するものです。

{tip}
レイアウトの順序を確実にするために、**キャンペーン**内で順序付けされることをお勧めします。表示順はキャンペーン全体の再生順を決定するために使用することができます。表示順が指定されていない場合、または同じ表示順の場合、キャンペーンは交互に再生されます。

**シナリオ**

キャンペーンAは、レイアウト1、レイアウト2、レイアウト3 で構成- 表示順序：1
キャンペーンBは、レイアウト4、レイアウト5、レイアウト6で構成、表示順序：１
同時刻にスケジュールされた場合、キャンペーンは以下のように再生されます。

A - レイアウト1

B - レイアウト4

A - レイアウト2

B - レイアウト5

A - レイアウト3

B - レイアウト6

A - レイアウト1 といった具合です。

キャンペーンが次のキャンペーンに移る前に、含まれるすべてのレイアウトを再生することを保証するために、キャンペーンAは表示順序を1、キャンペーンBは表示順序を2にする必要があります。
{/tip}

### 優先度

イベントの優先度を**最高位**に設定することは、低い優先度よりも優先して表示することを意味します。
これは優先順位の低いイベントを上書きして、優先表示するために使用されます。

 {tip}
この機能は、既存のスケジュールを変更することなく、特定のイベントのスケジュールを上書きしたり、その時点で実行されているレイアウトやキャンペーンをキャンセルするために、一時的な/重要な通知を表示するのに便利です。
{/tip}

### CMSタイムで実行

選択した場合、イベントはローカルディスプレイの時間ではなく、**CMS**で決定された時間で再生されます。
{tip}
**シナリオ**
CMSタイム = GMT
ディスプレイ1 = GMT
ディスプレイ2 = GMT -4

11:00にスケジュールされたイベントで、**CMSタイムで実行**が選択されていない場合、ディスプレイ1では11:00に、ディスプレイ2では11:00に実行されます。ディスプレイ2は4時間遅れているため、これら2つのディスプレイは同時に同じコンテンツを表示しません。

**CMSタイムで実行**を選択した場合、ディスプレイ1は従来通り11:00に実行されますが、ディスプレイ2は07:00に実行されます。
{/tip}

注意  **今すぐスケジュール** 機能オプションが選択されると常にイベントが作成されます。

## リポート

イベントは、定義された間隔（1時間、1日、1週間、1ヶ月、1年）で、指定した時間まで繰り返すことができます。繰り返しのイベントを作成するには、**繰り返し**タブを使用します。ドロップダウンから繰り返しの種類を選択し、必要に応じてフォームフィールドに入力します。さらに繰り返しの頻度を指定するには、**周期** を使用します。

{tip}
例えば、「毎週**回」の場合、「周期」の欄に2を入れることで、隔週で水曜日と金曜日を繰り返すように指定することができます。
{/tip}

{tip}
**月単位** 繰り返しは、イベントの日付またはイベントが属する月の日数で決定されます。

例：2019/03/06に予定されているイベントを、毎月6日または毎月第1水曜日に繰り返すように設定できます（2019/03/06が水曜日であるため）。
{/tip}

- 定期イベントのすべてのインスタンスを完全に削除するには、フォームの下部にある **削除** ボタンをクリックします。

**個々の繰り返し**をスケジュールから削除することができます。

![Deleting Recurring Events](img\v2.3_scheduling_deleting_repeats.png)

- スケジュールから削除したい繰り返しイベントをクリックすると、**イベント編集**フォームが表示されます。

![Delete from Schedule](img\v2.3_scheduling_delete_from_schedule.png)

- **スケジュールから削除**ボタンをクリックすると、このイベントがスケジュールから削除され、すべてのディスプレイから削除されます。

{tip}
繰り返しスケジュールの個々のインスタンスを削除した後、スケジュールに修正が加えられる場合は注意が必要です。 以前削除されたインスタンスは、既存のスケジュールに対して行われた編集で再作成される可能性があります。
{/tip}

## リマインダ

リマインダのセットを作成して、 [通知ドロワー](users_notifications.html)に送信したり、選択した予定イベントの電子メールで通知することができます。

{tip}
リマインダを設定する前に、管理者がCMSの**設定**ページ、**ネットワーク**タブで**送信メール**アドレスを入力していることを確認してください。
{/tip}

![Event Reminders](img\v3_scheduling_event_reminders.png)

フィールドを追加するには、+アイコンを使用してください。
[ユーザープロファイル](users_administration.html)に設定されたメールアドレスに送信されます。

## ジオロケーション

チェックボックスをオンにすると、このイベントの位置情報が認識されます。詳細は、[ジオスケジューリング](scheduling_geolocation.html)ページをご覧ください。

## 編集/削除

カレンダー内の**イベント/アイコン**をクリックすると、フォームフィールドを編集したり、削除をクリックしてスケジュールから完全に削除することができます。

## 複製

編集フォームの下にある**複製**ボタンをクリックすると、イベントの詳細を複製し、新しいイベントに設定することができます。クリックすると、新しいフォームがロードされたことを確認するポップアップが表示され、修正を行うことができます。

{tip}
新しく読み込まれたフォームには、**複製**ボタンがありません。
{/tip}

**実行予定のレイアウト/キャンペーンがない場合は、自動的にデフォルトレイアウトが実行されます。**
