---
toc: "tour"
maxHeadingLevel: 2
minHeadingLevel: 2
aliases:
- "tour_date_format"
- "tour_guides"
---

# [[PRODUCTNAME]] ユーザー マニュアル

{nonwhite}
{includeRevisions}**リビジョン: [[PRODUCTVERSION]]**{/includeRevisions}
{/nonwhite}
{white}**リビジョン: [[PRODUCTVERSION]]**{/white}

[[PRODUCTNAME]] ソフトウェアは、コンテンツが作成/アップロードされ、ディスプレイにスケジュールされる中央の **コンテンツ管理システム (CMS)** で構成されています。**プレーヤー** アプリケーションは、CMS から新しいコンテンツをダウンロードし、画面に表示するスケジュールを設定します:

![システム アーキテクチャ](img/v4_tour_system_architecture.png)

- プレーヤー アプリケーションは、各画面に接続されたハードウェア上で実行されます。
- プレーヤーは定期的に CMS に接続し、ダウンロードする必要がある新しいコンテンツや編集されたコンテンツ、スケジュールを確認します。

このユーザー ドキュメントは、コア コンセプトと CMS 機能を網羅し、[[PRODUCTNAME]] の機能をユーザーに説明して紹介するために作成されました。ページは、CMS 内でのユーザー ロールに一致する関連ドキュメントを簡単に見つけられるように、明確で整然としたセクションに分類されています。

{tip}
すべてのユーザーは、このマニュアルの **ツアー** セクションから始めることをお勧めします。これにより、ユーザーが [初回アクセス](tour_user_access.html) を行い、[CMS の操作](tour_cms_navigation.html) を開始するのに役立ちます。

{/tip}

{nonwhite}
{noncloud}

[Xibo Cloud](/hosting) でホスティングしていないユーザーは、CMS をインストールする必要があります。 Xibo の起動と実行に役立つ [インストール ガイド](/docs/setup/cms-installation-guides.html) を参照してください。

CMS とプレーヤーでサポートされているバージョンと環境の完全なリストを表示するには、[ここ](/docs/setup/supported-versions-and-environments.html) をクリックしてください。

{/noncloud}

管理者の場合は、システムのインストールとセットアップに関する詳細情報を [管理ドキュメント](/docs/setup/) から入手できます。

{cloud}
[Xibo Cloud](/docs/setup/xibo-in-the-cloud.html) でホスティングしている場合は、CMS が自動的にセットアップされます。CMS の準備が整い次第、接続の詳細が記載されたメールが送信されますので、ご確認ください。
クラウド}

このマニュアル全体を通して、主要な機能に対する**プレーヤー**と**CMS**のバージョン サポートを示す表が表示されます:

![機能カテゴリ表](img/v4_tour_feature_category_table.png)

{/nonwhite}

{version}
**重要:** このユーザー マニュアルでは、CMS 内のすべての [機能と共有](users_features_and_sharing.html) オプションに完全にアクセスできる [スーパー管理者](/manual/en/users_administration.html#content-super-admin-user) として、CMS の完全な概要を説明します。ユーザー アクセスに関して質問がある場合は、管理者にお問い合わせください。

{/version}

# すべての人のためのデジタル サイネージ!

[[PRODUCTNAME]] は、スキル レベルや技術的知識に関係なく、「すべての人のためのデジタル サイネージ」を基本理念とする柔軟で強力なアプリケーションを提供します。

[[PRODUCTNAME]] ソフトウェアは、次の 5 つのコア コンセプトを中心としています:

## ユーザー

[ユーザー](users_administration.html) は管理者によって CMS に追加され、安全にログインするための **ユーザー名** と **パスワード** が付与されます。

{tip}

企業環境では、[[PRODUCTNAME]] を Active Directory や ADFS などの SAML ID プロバイダーと統合することもできます。

{/tip}

[[PRODUCTNAME]] は、3 つの [ユーザー タイプ](users_administration.html#content-user-types) に加えて、[ユーザー グループ](users_groups.html) と、CMS 内のすべてのシステムおよびユーザー オブジェクトへのマルチレベルの [機能と共有](users_features_and_sharing.html) アクセスをサポートしています。

## ディスプレイ

[ディスプレイ](displays.html) は、プレーヤーから CMS への接続であり、コンテンツとスケジュール情報をグループ化します。各ディスプレイは CMS で一意に識別されるため、各ディスプレイには独自の **メディア** コンテンツ、**レイアウト** デザイン、**スケジュール** が用意され、それぞれが一意に識別された [レポート](displays_metrics.html) 統計情報とともに利用できます。

## メディア

メディアはディスプレイに表示するコンテンツで、通常は次の 2 つのカテゴリに分けられます。

- **ファイル ベースのメディア** - [ライブラリ](media_library.html) にアップロードされ保存されるメディア (画像やビデオ ファイルなど)
- **レイアウト ベースのメディア** - レイアウトに直接構成されたメディアで、関連付けられたファイルはありません (RSS フィードや天気予報など)

{tip}
[[PRODUCTNAME]] は、さまざまなソースからの動的なサードパーティ コンテンツを統合する強力な [ウィジェット](layouts_editor.html#content-widgets) を使用します。

{/tip}

## レイアウト

[レイアウト](layouts.html) は、ディスプレイに表示される完全なコンテンツ デザインです。強力な [レイアウト エディタ](layouts_editor.html) を使用すると、ユーザーは [[PRODUCTNAME]] CMS を離れることなく、目を引くコンテンツを簡単に作成できます。その後、レイアウトを [キャンペーン](layouts_campaigns.html) に追加して、スケジュール時に順番に再生することができます。

## スケジュール

[スケジュール](scheduling_events.html) は非常に柔軟で、単一のディスプレイだけでなく [ディスプレイ グループ](displays_groups.html) へのスケジュールもサポートしています。ディスプレイは、スケジュールされた新しいコンテンツを定期的にチェックし、再生前に新しいアイテムをダウンロードします。

{tip}
[デフォルト レイアウト](displays.html#content-default-layout) は、他に何もスケジュールされていない場合に表示されるようにディスプレイに割り当てる必要があります。
{/tip}

## コア ワークフロー

[[PRODUCTNAME]] では、ユーザーに 2 つの主要なワークフロー オプションが提供されます:

1. [レイアウト エディター](layouts_editor.html) からコンテンツを作成する

![ワークフロー 1](img/v4_tour_workflow_1.png)

2. **ビデオ**/**画像** ファイルまたは保存された **プレイリスト** を選択して直接 [スケジュール](scheduling_events.html#content-media-scheduling):

![ワークフロー 2](img/v4_tour_workflow_2.png)

{nonwhite}

## オープン ソース

ソフトウェアの中心は [オープン ソース](/open-source) であり、**CMS** プラットフォーム全体と **Windows プレーヤー** も含まれており、長年その状態が続いています。当社は、この状態を維持することに尽力しています。コードは、**AGPLv3 ライセンス** に従ってダウンロードして使用できます。

## コンテンツのライセンス

使用するコンテンツが著作権法に準拠していること、および独自のライセンスに記載されている方法で使用されることを確認してください。Xibo は、これらのマニュアル ページに記載されている内容を超えて、ディスプレイに表示される内容を規制する措置を講じません。

## サポート

ユーザー マニュアルに記載されている情報についてさらにサポートが必要な場合は、[トラブルシューティング](troubleshooting.html) セクションまたは [Xibo コミュニティ フォーラム](https://community.xibo.org.uk/) をご覧ください。

プロフェッショナル、ビジネス、またはエンタープライズ プランのお客様は、ヘルプ デスクの専門家にアクセスできます。サポートが必要な場合は、[マイ アカウント](https://xibosignage.com/my-account/tickets?open=true) からチケットを開いてください。

{/nonwhite}

#### 次へ...

[初めてのユーザー アクセス](tour_user_access.html)
