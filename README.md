# これは何
テスト駆動開発本をPHP8.1で写経するリポジトリ。ｼｬｧｯ!

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