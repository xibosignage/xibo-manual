# はじめに
ようこそ Sigmeユーザーマニュアルに
このマニュアルはXibo User Manualをベースとして、日本語の翻訳を加えたものです。
 
このリポジトリには、オリジナルの xibo マニュアル（英語）と Sigme マニュアル（日本語）のソースが含まれています。
`template/custom/sigme` ディレクトリには、いくつかの修正とカスタマイズが加えられています。
また、日本語訳のページは `source/ja/' ディレクトリに格納されています。

## サポート
- Sigme Manualに関連するすべての問題は、こちらで追跡してください: `https://github.com/SigmeSignage/sigme-manual/issues` 

## ビルド
マニュアルのビルドはgenerate.phpを実行することで行います。

Xiboのユーザーマニュアルを作成するためのビルドコマンドは以下の通りです。
```
php generate.php
```

Sigmeのユーザーマニュアルを作成するためのビルドコマンドは以下の通りです。
```
php generate.php sigme
```

### Docker
Docker を使用してマニュアルを構築することも可能で、その場合、完全なマニュアルとウェブサーバーをホストする Docker
イメージを作成することもできます。

これを行うには、次のコマンドを実行します。

```
./build.sh -t default -r xibo-manual
```

ここで、`-t`はテーマ名、`-r`はコンテナに付けるタグの名前です。
コンテナにつける名前です。

ビルドするためには、`/template/custom/<theme_name>` にテーマが存在する必要があります。
テーマはデフォルトのテーマから継承してビルドされます。
Sigmeのテーマはこのテンプレートディレクトリにあります。

# Introduction
Welcome to the Sigme User Manual.
This manual is base on the Xibo Manual and added Japanese translation.

This repository contains the source content for the original xibo manual in english and Sigme manual in Japaness. 
Some modifications and customizations are added at template/custom/sigme directory.
And, translated pages are located in `source/ja/’ directory.

## Support
Prease track all issues related  Sigme Manual here: https://github.com/SigmeSignage/sigme-manual/issues

## Building
The manual is built by running generate.php.
To create sigme user manual, the build command is
```
php generate.php sigme
```

### Docker
It is also possible to build the manual using Docker, resulting in a Docker
image which hosts the complete manual and a web server.

To do this issue the command:

```
./build.sh -t default -r xibo-manual
```

Where `-t` is your theme name and `-r` is the name with which to tag the 
container.

Themes must exist in `/template/custom/<theme_name>` to be built.
They are build using inheritance from the default theme.
Sigme theme is located this template directory.
