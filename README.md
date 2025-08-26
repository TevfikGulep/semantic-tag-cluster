# Semantic Tag Cluster

*   **Plugin URI:** https://github.com/TevfikGulep/semantic-tag-cluster
*   **Yazar:** Tevfik Gülep
*   **Yazar URI:** https://oxigen.team
*   **Sürüm:** 1.0.0
*   **Lisans:** GPL-2.0+
*   **Lisans URI:** http://www.gnu.org/licenses/gpl-2.0.txt

---

## Açıklama

Semantic Tag Cluster, WordPress sitenizdeki gönderilerinize, içeriğe dayalı olarak alakalı diğer gönderilere otomatik olarak iç linkleme butonları ekleyen güçlü bir eklentidir. Bu eklenti, kullanıcı deneyimini zenginleştirmenin yanı sıra SEO performansınızı artırmak için doğal ve semantik iç linkleme ağı oluşturur. `<h1>` başlığının hemen altına yerleştirilen özelleştirilebilir butonlar sayesinde, okuyucularınız ilgili içeriklere kolayca ulaşabilir.

## Özellikler

*   **Akıllı İç Linkleme:** Sayfanın içeriğini analiz ederek, belirlediğiniz gönderi tipi ve kategorisindeki en alakalı gönderilere dinamik olarak linkler oluşturur.
*   **Tüm Gönderi Tipleriyle Uyumlu:** Yazılar, ürünler ve tüm özel gönderi tiplerinizde sorunsuz bir şekilde çalışır.
*   **Esnek Ayarlar:**
    *   Butonların hangi gönderi tiplerinde görüneceğini seçebilirsiniz.
    *   İç link verilecek gönderilerin tipini ve opsiyonel olarak kategorisini belirleyebilirsiniz.
    *   Gösterilecek buton sayısını (maksimum 5) ayarlayabilirsiniz.
*   **SEO Dostu:** Buton linkleri JavaScript ile değil, doğrudan HTML çıktısı olarak oluşturulur. Bu sayede Google ve diğer arama motorları linklerinizi kolayca tarayabilir ve dizine ekleyebilir.
*   **Estetik Tasarım:** Kenarları yuvarlak, içi boş ve kenarları çizgili modern butonlar. Butonların rengi ve kenarlık rengi, sayfanızdaki `<h1>` başlığının stilini miras alarak temanızla mükemmel uyum sağlar.
*   **Performans Odaklı:** Minimum performans etkisiyle çalışacak şekilde tasarlanmıştır.

## Kurulum

1.  Eklentiyi bu GitHub deposundan ZIP olarak indirin.
2.  WordPress yönetici panelinize giriş yapın.
3.  `Eklentiler > Yeni Ekle > Eklenti Yükle` yolunu izleyin.
4.  İndirdiğiniz ZIP dosyasını seçip yükleyin ve ardından etkinleştirin.
5.  Eklentiyi etkinleştirdikten sonra `Ayarlar > Semantic Tag Cluster` menüsünden gerekli ayarlamaları yapın.

## Kullanım ve Yapılandırma

Eklentiyi etkinleştirdikten sonra, `Ayarlar > Semantic Tag Cluster` sayfasına giderek aşağıdaki ayarları yapabilirsiniz:

*   **Butonların Gösterileceği Gönderi Tipleri:** Butonların görünmesini istediğiniz gönderi tiplerini (örn. Yazı, Ürün, Kurs vb.) buradan seçin.
*   **İç Link Verilecek Gönderi Tipi:** Alakalı gönderileri hangi gönderi tipinden arayacağınızı belirleyin. Örneğin, "Yazı" seçerseniz, sadece yazılar arasından alaka düzeyine göre linkler oluşturulur.
*   **İç Link Verilecek Kategori (İsteğe Bağlı):** Eğer alakalı linklerin belirli bir kategori ile sınırlı olmasını istiyorsanız, buradan ilgili kategoriyi seçebilirsiniz. Boş bırakılırsa, tüm kategorilerdeki gönderiler değerlendirilir.
*   **Buton Sayısı (Maksimum 5):** Her gönderide gösterilecek maksimum buton sayısını belirleyin (1 ile 5 arası).

Ayarları kaydettikten sonra, seçili gönderi tiplerinizdeki sayfaları ziyaret ederek butonların görünümünü kontrol edebilirsiniz.

## Stil Özelleştirmesi

Eklenti, butonların stilini yönetmek için `semantic-tag-cluster.css` dosyasını kullanır. Butonlar, `<h1>` etiketinin rengini ve temanızın genel stilini miras alacak şekilde tasarlanmıştır (`color: inherit; border-color: inherit;`). Temanızın `h1` rengi değiştikçe, butonlar da otomatik olarak bu renge uyum sağlayacaktır.

Daha fazla özelleştirme yapmak isterseniz, temanızın `style.css` dosyasına veya WordPress tema özelleştiricisindeki ek CSS alanına kendi CSS kodlarınızı ekleyerek `semantic-tag-cluster-buttons` ve `semantic-tag-cluster-button` sınıflarını hedefleyebilirsiniz.

## Ek Bilgiler

*   Eklenti, sayfanın tüm HTML çıktısını kullanarak `<h1>` etiketini arar, bu sayede temanızın `h1` başlığı içeriğin neresinde olursa olsun butonlar eklenebilir.
*   Alaka düzeyi, mevcut gönderi başlığı ve içeriği ile potansiyel alakalı gönderilerin başlık ve içeriği arasındaki kelime eşleşmeleriyle hesaplanır.

## Destek

Hersel sorunla karşılaşırsanız veya geliştirme önerileriniz olursa, lütfen bu GitHub deposunda bir [Issue](https://github.com/TevfikGulep/semantic-tag-cluster/issues) açmaktan çekinmeyin.

## Geliştirici

**Tevfik Gülep**
*   **Website:** [https://oxigen.team](https://oxigen.team)
*   **GitHub:** [https://github.com/TevfikGulep](https://github.com/TevfikGulep)

---

**© 2024 Tevfik Gülep. Tüm hakları saklıdır.**
