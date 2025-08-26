# Semantic Tag Cluster

*   **Plugin URI:** https://github.com/TevfikGulep/semantic-tag-cluster
*   **Yazar:** Tevfik Gülep
*   **Yazar URI:** https://oxigen.team
*   **Sürüm:** 1.0.0
*   **Lisans:** GPL-2.0+
*   **Lisans URI:** http://www.gnu.org/licenses/gpl-2.0.txt

---

## Açıklama

Semantic Tag Cluster, WordPress sitenizdeki gönderilerinize, içeriğe dayalı olarak alakalı diğer gönderilere otomatik olarak iç linkleme butonları ekleyen güçlü bir eklentidir. Bu eklenti, kullanıcı deneyimini zenginleştirmenin yanı sıra SEO performansınızı artırmak için doğal ve semantik iç linkleme ağı oluşturur. `<h1>` başlığının hemen altına veya **bir kenar çubuğu widget'ı aracılığıyla** yerleştirilebilen özelleştirilebilir butonlar sayesinde, okuyucularınız ilgili içeriklere kolayca ulaşabilir.

## Özellikler

*   **Akıllı İç Linkleme:** Sayfanın içeriğini analiz ederek, belirlediğiniz gönderi tipi ve kategorisindeki en alakalı gönderilere dinamik olarak linkler oluşturur.
*   **Tüm Gönderi Tipleriyle Uyumlu:** Yazılar, ürünler ve tüm özel gönderi tiplerinizde sorunsuz bir şekilde çalışır.
*   **Widget Desteği:** Eklentiyi kenar çubuklarınıza veya diğer widget alanlarına kolayca ekleyebilirsiniz.
*   **Esnek Ayarlar:**
    *   Butonların hangi gönderi tiplerinde görüneceğini seçebilirsiniz.
    *   İç link verilecek gönderilerin tipini ve opsiyonel olarak kategorisini belirleyebilirsiniz.
    *   Gösterilecek buton sayısını (maksimum 5) ayarlayabilirsiniz.
*   **SEO Dostu:** Buton linkleri JavaScript ile değil, doğrudan HTML çıktısı olarak oluşturulur. Bu sayede Google ve diğer arama motorları linklerinizi kolayca tarayabilir ve dizine ekleyebilir.
*   **Estetik Tasarım:** Kenarları yuvarlak, içi boş ve kenarları çizgili modern butonlar. Butonların rengi ve kenarlık rengi, sayfanızdaki `<h1>` başlığının stilini miras alarak temanızla mükemmel uyum sağlar. Sidebar widget'ı içinde kullanıldığında butonlar otomatik olarak %100 genişliğe ayarlanır.
*   **Performans Odaklı:** Minimum performans etkisiyle çalışacak şekilde tasarlanmıştır.

## Kurulum

1.  Eklentiyi bu GitHub deposundan ZIP olarak indirin.
2.  WordPress yönetici panelinize giriş yapın.
3.  `Eklentiler > Yeni Ekle > Eklenti Yükle` yolunu izleyin.
4.  İndirdiğiniz ZIP dosyasını seçip yükleyin ve ardından etkinleştirin.
5.  Eklentiyi etkinleştirdikten sonra `Ayarlar > Semantic Tag Cluster` menüsünden gerekli ayarlamaları yapın.

## Kullanım ve Yapılandırma

Eklentiyi etkinleştirdikten sonra, `Ayarlar > Semantic Tag Cluster` sayfasına giderek aşağıdaki ayarları yapabilirsiniz:

*   **Butonların Gösterileceği Gönderi Tipleri:** Butonların görünmesini istediğiniz gönderi tiplerini (örn. Yazı, Ürün, Kurs vb.) buradan seçin. **Not:** Bu ayar hem içeriğe otomatik eklenen butonlar hem de widget için geçerlidir. Widget, sadece burada seçili gönderi tiplerinin tekil sayfalarında görünecektir.
*   **İç Link Verilecek Gönderi Tipi:** Alakalı gönderileri hangi gönderi tipinden arayacağınızı belirleyin. Örneğin, "Yazı" seçerseniz, sadece yazılar arasından alaka düzeyine göre linkler oluşturulur.
*   **İç Link Verilecek Kategori (İsteğe Bağlı):** Eğer alakalı linklerin belirli bir kategori ile sınırlı olmasını istiyorsanız, buradan ilgili kategoriyi seçebilirsiniz. Boş bırakılırsa, tüm kategorilerdeki gönderiler değerlendirilir.
*   **Buton Sayısı (Maksimum 5):** Her gönderide gösterilecek maksimum buton sayısını belirleyin (1 ile 5 arası).

Ayarları kaydettikten sonra, seçili gönderi tiplerinizdeki sayfaları ziyaret ederek butonların görünümünü kontrol edebilirsiniz.

### Widget Kullanımı

Eklentiyi kenar çubuğunuzda veya diğer widget alanlarınızda kullanmak için:

1.  WordPress yönetici panelinde `Görünüm > Bileşenler` (Appearance > Widgets) sayfasına gidin.
2.  "Semantic Tag Cluster Buttons" widget'ını, kullanmak istediğiniz bir widget alanına sürükleyip bırakın.
3.  Widget'a bir başlık verebilirsiniz (isteğe bağlı).
4.  Widget'ın gösterileceği gönderi tipleri, iç link verilecek gönderi tipi/kategorisi ve buton sayısı, eklentinin ana ayarlar sayfasındaki (Ayarlar > Semantic Tag Cluster) ayarlara göre belirlenir.

## Stil Özelleştirmesi

Eklenti, butonların stilini yönetmek için `semantic-tag-cluster.css` dosyasını kullanır. Butonlar, `<h1>` etiketinin rengini ve temanızın genel stilini miras alacak şekilde tasarlanmıştır (`color: inherit; border-color: inherit;`). Temanızın `h1` rengi değiştikçe, butonlar da otomatik olarak bu renge uyum sağlayacaktır.

Sidebar widget'ı içinde kullanıldığında, butonların genişliği otomatik olarak %100 olacak şekilde ek bir CSS kuralı (`#sidebar .semantic-tag-cluster-buttons .semantic-tag-cluster-button`) eklenmiştir.

Daha fazla özelleştirme yapmak isterseniz, temanızın `style.css` dosyasına veya WordPress tema özelleştiricisindeki ek CSS alanına kendi CSS kodlarınızı ekleyerek `semantic-tag-cluster-buttons` ve `semantic-tag-cluster-button` sınıflarını hedefleyebilirsiniz.

## Ek Bilgiler

*   Eklenti, sayfanın tüm HTML çıktısını kullanarak `<h1>` etiketini arar, bu sayede temanızın `h1` başlığı içeriğin neresinde olursa olsun butonlar eklenebilir (widget kullanılmadığında).
*   Alaka düzeyi, mevcut gönderi başlığı ve içeriği ile potansiyel alakalı gönderilerin başlık ve içeriği arasındaki kelime eşleşmeleriyle hesaplanır.

## Destek

Herhangi bir sorunla karşılaşırsanız veya geliştirme önerileriniz olursa, lütfen bu GitHub deposunda bir [Issue](https://github.com/TevfikGulep/semantic-tag-cluster/issues) açmaktan çekinmeyin.

## Geliştirici

**Tevfik Gülep**
*   **Website:** [https://oxigen.team](https://oxigen.team)
*   **GitHub:** [https://github.com/TevfikGulep](https://github.com)

---

**© 2025 Tevfik Gülep. Tüm hakları saklıdır.**
