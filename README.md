# 課題06
「アーセナル移籍情報登録」

## 課題内容（どんな作品か）
 - サッカーチーム「アーセナル」へ移籍する可能性のある選手を登録する

## 工夫した点・こだわった点
 - データベースのテーブルを「在籍選手」と「移籍の噂がある選手」の2つ作成した
 - TIMESTAMPDIFF()関数を使用して誕生日から年齢を自動取得できるようにした
 - セレクトボックスの値を送信
 - tablesorterというjQueryのプラグインを利用してソート機能を実装した
 - トークンを利用してCSRF対策
 - 簡単な更新履歴機能を実装

## 質問・疑問・残課題
 - 次回削除更新機能を実装したい
 - sum関数を使用して推定移籍価格の合計を表示
 - レンタルサーバーでアップロードを試みたものの
  ```
 　データベースに接続できませんでした。SQLSTATE[HY000] [2002] php_network_getaddresses: getaddrinfo failed: hostname nor servname provided, or not known
```
上記が表示され上手くいきませんでした。
 
## その他（感想、シェアしたいことなんでも）
アーセナル好きの「グーナー」なので、試合結果の表示など色々充実させていきたいと考えております。

## 課題のイメージ
![localhost_kadai_06_](https://user-images.githubusercontent.com/83898546/123497582-499f0300-d669-11eb-9b17-1806e8d40ca5.png)
![localhost_kadai_06_select_trf php](https://user-images.githubusercontent.com/83898546/123497588-515ea780-d669-11eb-8be6-36899b529b98.png)
