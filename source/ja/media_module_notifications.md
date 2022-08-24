<!--toc=widgets-->

# お知らせ

CMSの[通知ドロワー](users_notifications.html)に作成した**メッセージ**を表示する通知ウィジェットを追加します。

## ウィジェットを追加

[ウィジェット](layouts_widgets.html)ツールバーの**通知**をクリックし、追加またはドラッグ＆ドロップする。![Notifications Widget](img\v2_media_notifications_widget.png)

追加すると、設定オプションがプロパティパネルに表示されます。

- 識別しやすいように **名前** を記入してください。
- 必要であれば、デフォルトの**期間**をオーバーライドするよう選択します。
- 通知ごとの期間か、**すべての**通知の合計期間かを選択します。

### 設定

- このウィジェットで使用するメッセージの最大通知**経過時間**を入力してください。
- ドロップダウンメニューから、オプションの**エフェクト**と、選択したエフェクトのトランジション**速度**を選択します。

### テンプレート

**テンプレート**タブをクリックすると、利用可能なテンプレートのフォーマットが表示されます。

![Notification Template](img\v3.1_media_notifications_templates.png)

#### メイン

- HTMLを入力するか、**ビジュアルエディタ**をオンにすると、インラインエディタを使用してテンプレートをフォーマットすることができます。
- 編集アイコンをクリックすると開きます。

![Notification Editor](img\v3.1_media_notifications_inline_editor.png)

- **通知ドロワー**から **Subject** と **Body** の情報を取り込むために、**スニペット** メニューからフォーマットするテキストマージフィールドが提供されています。
- **保存**ボタンをクリックします。

### データなしテンプレート

このテンプレートでは、表示すべきお知らせがないときに、空白の表示にならないようにするためのメッセージを入力することができます。

### オプションのスタイルシート

テンプレートに適用するCSSを入力します。

## アクション

このウィジェットにはアクションを付けることができます。詳しくは[対話型アクション](layouts_interactive_actions.html)のページを参照してください。