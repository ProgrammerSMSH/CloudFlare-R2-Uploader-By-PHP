# CloudFlare R2 Uploader By PHP

A simple PHP tool to **sync files from local `/storage` directory to Cloudflare R2**.  
Supports progress tracking, error handling, and one-click bulk upload.

---

## 🚀 Features
- Scan the local `/storage` folder automatically  
- Show total file count & size before upload  
- Check R2 connection status  
- Upload files one-by-one with progress tracking  
- Show transfer speed, percentage, and status (✅ success / ❌ error)  
- Simple web UI with terminal-style logs  

---

## 📂 Project Structure
```
│
├── storage/ # Local files to upload
├── index.html # Web UI (progress + logs)
├── file_list.php # Returns file list from /storage
├── signed_url.php # Upload handler (to R2)
├── composer.json # Dependencies
└── vendor/ # AWS SDK via Composer
```

---

## ⚡ Installation

1. **Clone the repo**
   ```bash
   git clone https://github.com/ProgrammerSMSH/CloudFlare-R2-Uploader-By-PHP.git
   cd CloudFlare-R2-Uploader-By-PHP
   ```

2. **Install dependencies**
   ```bash
   composer require aws/aws-sdk-php
   ```

3. **Configure Cloudflare R2 credentials**  
   Open `signed_url.php` and update:
   ```php
   $accountId = "YOUR_ACCOUNT_ID";
   $bucketName = "YOUR_BUCKET_NAME";
   $accessKey = "YOUR_ACCESS_KEY";
   $secretKey = "YOUR_SECRET_KEY";
   ```

4. **Add your files**  
   Put files inside the `/storage` folder.

---

## ▶️ Usage

1. Open in browser:
   ```
   https://yourdomain.com/CloudFlare-R2-Uploader-By-PHP/
   ```

2. Click **Upload Now**  
   - Scans `/storage`  
   - Checks R2 connection  
   - Starts uploading files sequentially  

3. Monitor progress in real time.

---

## 📸 Screenshot (Placeholder)

![Demo Screenshot](screenshot.png)

---

## ⚠️ Notes
- Make sure PHP has permission to read `/storage` folder  
- Works best with PHP 7.4+ and Composer installed  
- Large files depend on your server’s PHP upload and execution limits

---

## 🤖 Author

Made by [Shakib Hossain](https://shakib.me) with ❤️  

---

---

## 📜 License
MIT License - Free to use and Modify.  
