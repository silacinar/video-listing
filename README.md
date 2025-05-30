# Video Yönetim Portalı

Bu proje, YouTube videolarını listeleme, ekleme, güncelleme ve silme işlemlerini yapan basit bir PHP uygulamasıdır. Kullanıcı girişi yapılmadan sisteme erişim sağlanamaz.

## 🔧 Özellikler

- Kullanıcı girişi (`user.csv` dosyası üzerinden)
- Video ekleme (`video.csv`'ye kayıt)
- Video güncelleme
- Video silme (kalıcı silme yok, is_deleted = 1 yapılır)
- YouTube video küçük görseli gösterimi
- CSV dosya yapısı: pipe (`|`) karakteri ile ayrılmış

## 📂 Dosya Yapısı

- `page1.php` → Giriş sayfası
- `page2.php` → Video listesi
- `page3.php` → Yeni video ekleme
- `page4.php` → Video güncelleme
- `delete.php` → Videoyu siler (is_deleted = 1)
- `user.csv` → Kullanıcı adı ve şifre içerir (`username|password`)
- `video.csv` → Video bilgileri (`id|link|desc|date_added|is_deleted`)

## ⏱️ Harcanan Süre

**Toplam Gerçekleşen Süre:** 9 saat

## 🖼️ Ekran Görüntüleri

### Giriş Sayfası
![login](https://github.com/user-attachments/assets/57c1f515-5404-4dcb-bd5c-c907cf84bc1a)

### Video Listesi
![list](https://github.com/user-attachments/assets/fb2c8dd4-fa70-46bc-9db6-5571e0aaec2c)


### Video Ekleme
![adding](https://github.com/user-attachments/assets/5bb451aa-f527-4633-b7dd-8914c13443ed)


### Video Güncelleme
![update](https://github.com/user-attachments/assets/7fa0da35-bc8b-4a95-a8d1-5c2ed78d8a7d)


### CSV Dosyaları
![user csv](https://github.com/user-attachments/assets/db49e06b-ffae-44d8-8833-5fcd63469d0a)
![video csv](https://github.com/user-attachments/assets/c4ee8ef0-fa36-4e9c-bb42-d50ccda7e018)

