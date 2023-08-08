# LaravelからSupabaseでリアルタイム変更を楽しもう

## これは何？

SupabaseのRealtime機能を使ってユーザのステータスをリアルタイムで確認可能なサンプルアプリです

### 必要なもの
- Supabaseのアカウント（無料！）
- Laravelが動く環境（無料！）
- npm（無料！）

## セットアップ

下記の手順でセットアップ出来ます

```bash
git clone git@github.com:askdkc/Realtime-SupaLaraSvelte.git
cd Realtime-SupaLaraSvelte
cp .env.example .env
composer install
npm i
```

### `.env`用設定取得

Supabaseに無料枠を作ってある前提で話を進めます

1. ログインしてDashboardにアクセス
2. New Projectで新規プロジェクトを作成(NameとPasswordは適当に)

<img width="707" alt="image" src="https://github.com/askdkc/Realtime-SupaLaraSvelte/assets/7894265/82f77f67-6c8c-4084-a325-3c90f11a558c">
