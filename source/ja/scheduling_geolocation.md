---
toc: "scheduling"
maxHeadingLevel: 3
minHeadingLevel: 2
excerpt: "場所を認識するようにイベントをスケジュールする"
keywords: "マップ マーカー、緯度、経度"
persona: "スケジュール マネージャー、表示マネージャー"
---

# Geo Scheduling

スケジュールされたイベントは、場所を認識するように構成でき、場所がマップ ビューに表示されます。

{feat}Geo Location Scheduling|v4{/feat}

## 場所の定義

- スケジュール [イベント](scheduling_events.html) フォームから、**Geo Location** タブをクリックします。

- **Geo Schedule** ボックスにチェックを入れて、場所を有効にして定義します。

{tip}
マップを開くと、**CMS 設定** の [ディスプレイ](tour_cms_settings.html#content-displays) タブの DEFAULT_LAT と DEFAULT_LONG に入力された内容がデフォルトでマップに表示されます。
{/tip}

- マップの左上にあるボタンを使用して、ズームインとズームアウトを行います。
- 検索アイコンをクリックして、特定のエリアの詳細を入力します。

![ジオロケーション検索](img/v4_schedule_geolocation_search.png)

- マップ上にポリゴンまたは長方形のレイヤーを描画して、エリアを定義します。

![ポリゴン レイヤー](img/v4_schedule_polygon.png)

## 編集

- エリアを定義したら、編集アイコンをクリックしてマーカーをドラッグし、既存のレイヤーを調整します。
- ここにある灰色の [保存] ボタンをクリックして、編集内容を保存します。

![レイヤーの編集](img/v4_schedule_edit_layer.png)

## 削除

- 領域を削除するには、ゴミ箱アイコンを使用して削除する領域をクリックします
- 灰色の [保存] ボタンをクリックして、レイヤーの削除を保存します。

{tip}
このスケジュールを編集するには、[カレンダー](scheduling_management.html#content-calendar-view) のアイコンをクリックするか、[グリッド](scheduling_management.html#content-grid-view) ビューの行メニューを使用します。

{/tip}

