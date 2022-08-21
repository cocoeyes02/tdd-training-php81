# これは何
テスト駆動開発本をPHP8.1で写経するリポジトリ。ｼｬｧｯ!

https://www.amazon.co.jp/dp/B077D2L69C

# リポジトリの見方
ソースコード自体は現在写経したところまでのソースが反映されています。

各章ごとのソースや所感、PHPで写経するときに困ったところ等を読みたい方は、[マージ済みのPR一覧](https://github.com/cocoeyes02/tdd-training-php81/pulls?q=is%3Apr+is%3Aclosed)を確認してみてください。

- [第一部：多国通貨](https://github.com/cocoeyes02/tdd-training-php81/pulls?q=is%3Apr+is%3Aclosed+label%3A%E7%AC%AC1%E9%83%A8)
- [第二部：xUnit](https://github.com/cocoeyes02/tdd-training-php81/pulls?q=is%3Apr+is%3Aclosed+label%3A%E7%AC%AC2%E9%83%A8)

# ディレクトリ構造

```text
./
 |-- app/               # アプリケーションソースコード
 |  |-- money/          # 第1部 多国通貨に関係したコード
 |  |  |-- src/         # プロダクトコード
 |  |  |-- tests/       # テストコード
 |  |  |-- Makefile      # テスト実行などコマンドをまとめたMakefile
 |  |  |-- TODO.md      # 本の中で出てきたTODOリスト
 |  |  :
 |  |-- xunit/          # 第2部 xUnitに関係したコード
 |  |  |-- src/         # テスティングフレームワークのソースコード
 |  |  |-- Makefile      # テスト実行などコマンドをまとめたMakefile
 |  |  |-- TODO.md      # 本の中で出てきたTODOリスト
 |  |  :
 |  :
 |-- docker/            # Docker イメージビルド用のファイル等が入っている
 :
```