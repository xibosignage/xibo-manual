---
toc: "widgets"
maxHeadingLevel: 3
minHeadingLevel: 2
抜粋: "通貨ペアの為替レートを表示"
キーワード: "alpha vantage api、alpha vantage コネクタ、逆変換、基本通貨"
ペルソナ: "コンテンツ マネージャー"
---

# 通貨

**要素** を使用してレイアウト上の任意の場所に通貨ペアの為替レートを表示するか、**静的テンプレート** を選択してレイアウト/プレイリストに結果を表示します。

{feat}通貨|v4{/feat}

通貨ウィジェットは、構成された要素と静的テンプレートに取り込まれる為替レート データを取得するために、[Alpha Vantage API](https://www.alphavantage.co/) に部分的に依存しています。

{tip}
[Alpha Vantage](https://www.alphavantage.co/support/#api-key) にアクセスしてアカウントを作成し、Alpha Vantage [コネクタ](media_modules.html#content-connectors) に入力するための API キーを取得してください。
{/tip}

{nonwhite}
{cloud}
通貨モジュールは、サービスの一部として提供される API キーを使用して、**Xibo Cloud** でホストされている顧客向けに構成されています。
{/cloud}
{/nonwhite}

## 通貨要素

[レイアウト](layouts_editor.html) に通貨ウィジェットを追加するときに [要素](layouts_editor#content-data-widgets-and-elements) を選択でき、ユーザーは通貨ウィジェットのどのコンポーネントを使用するか、どこに配置できるかをより細かく制御できます。

![通貨要素](img/v4_media_modules_currencies_elements.png)

各要素には、プロパティ パネルに一連の構成オプションがあります。**通貨** には、表示したい頭字語/略語と、**構成** タブの **基本** 通貨を入力します。

追加された各要素に使用する [データ スロット](layouts_editor.html#content-data-slots) を指定して、アイテムの循環方法を制御します。[グローバル要素](layouts_editor.html#content-global-elements) を追加して図形やテキストを追加することで、データ要素をさらに補完できます。これらはすべて [要素グループ](layouts_editor.html#content-grouping-elements) にまとめることができ、構成と配置が簡単になります。

## 通貨の静的テンプレート

[静的テンプレート](layouts_editor.html#content-static-templates) は、返されるデータのレイアウトとスタイル設定方法を定義し、事前にスタイル設定されたテンプレートを使用してデータを表示する簡単な方法です。

![通貨テンプレート](img/v4_media_modules_currencies_templates.png)

プロパティ パネルのさまざまなオプションを使用して、テンプレートを構成してデザインの外観を変更できます。レイアウト/プレイリストに追加された各テンプレートの [**構成**] タブから、表示したい頭字語/略語を使用して **通貨** を入力し、**基本** 通貨を入力します。

## 概要

- 逆変換して、基本通貨を比較として使用します。

- このメディアのコンテンツは、オフライン再生用にプレーヤーによってキャッシュされます。

- 期間はアイテムごとまたはページごとに適用できます。

