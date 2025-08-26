php
<?php
/**
 * Plugin Name: Semantic Tag Cluster
 * Plugin URI: https://github.com/TevfikGulep/semantic-tag-cluster
 * Description: İçerik odaklı alakalı yazılara iç linkleme butonları oluşturur.
 * Version: 1.0.0
 * Author: Tevfik Gülep
 * Author URI: https://oxigen.team
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// Eklenti kodları buraya gelecek

// Ayarlar sayfasını admin menüsüne ekle
add_action('admin_menu', 'stc_add_settings_page');

function stc_add_settings_page() {
    add_options_page(
        'Semantic Tag Cluster Ayarları', // Sayfa başlığı
        'Semantic Tag Cluster', // Menü başlığı
        'manage_options', // Gereken yetenek
        'semantic-tag-cluster', // Menü slug
        'stc_render_settings_page' // İçerik fonksiyonu
    );
}

// Ayarlar sayfasının içeriğini oluştur
function stc_render_settings_page() {
    ?>
    <div class="wrap">
        <h1>Semantic Tag Cluster Ayarları</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('stc_settings_group');
            do_settings_sections('semantic-tag-cluster');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Ayarları kaydetmek için gerekli alanları ve bölümleri kaydet
add_action('admin_init', 'stc_register_settings');

function stc_register_settings() {
    register_setting(
        'stc_settings_group', // Ayar grubu
        'stc_settings' // Ayar adı (veritabanında saklanacak)
    );

    add_settings_section(
        'stc_general_settings', // Bölüm ID
        'Genel Ayarlar', // Bölüm başlığı
        'stc_general_settings_section_callback', // Bölüm açıklama fonksiyonu
        'semantic-tag-cluster' // Sayfa slug
    );

    // Ayar alanlarını ekle
    add_settings_field(
        'stc_post_types', // Alan ID
        'Butonların Gösterileceği Gönderi Tipleri', // Alan başlığı
        'stc_post_types_callback', // Alan çıktı fonksiyonu
        'semantic-tag-cluster', // Sayfa slug
        'stc_general_settings' // Bölüm ID
    );

    add_settings_field(
        'stc_link_post_type',
        'İç Link Verilecek Gönderi Tipi',
        'stc_link_post_type_callback',
        'semantic-tag-cluster',
        'stc_general_settings'
    );

    add_settings_field(
        'stc_link_category',
        'İç Link Verilecek Kategori (İsteğe Bağlı)',
        'stc_link_category_callback',
        'semantic-tag-cluster',
        'stc_general_settings'
    );

    add_settings_field(
        'stc_button_count',
        'Buton Sayısı (Maksimum 5)',
        'stc_button_count_callback',
        'semantic-tag-cluster',
        'stc_general_settings'
    );
}

// Bölüm açıklama fonksiyonu
function stc_general_settings_section_callback() {
    echo '<p>Eklentinin genel ayarlarını yapılandırın.</p>';
}

// Gönderi tipleri seçimi için callback fonksiyonu
function stc_post_types_callback() {
    $options = get_option('stc_settings');
    $selected_post_types = isset($options['post_types']) ? (array) $options['post_types'] : array('post');
    $post_types = get_post_types(array('public' => true), 'objects');

    foreach ($post_types as $post_type) {
        if ($post_type->name !== 'attachment') { // Medya eklerini hariç tut
            ?>
            <label>
                <input type="checkbox" name="stc_settings[post_types][]" value="<?php echo esc_attr($post_type->name); ?>" <?php checked(in_array($post_type->name, $selected_post_types), true); ?>>
                <?php echo esc_html($post_type->labels->singular_name); ?>
            </label><br>
            <?php
        }
    }
}

// İç link verilecek gönderi tipi seçimi için callback fonksiyonu
function stc_link_post_type_callback() {
    $options = get_option('stc_settings');
    $selected_post_type = isset($options['link_post_type']) ? $options['link_post_type'] : 'post';
    $post_types = get_post_types(array('public' => true), 'objects');
    ?>
    <select name="stc_settings[link_post_type]">
        <?php
        foreach ($post_types as $post_type) {
             if ($post_type->name !== 'attachment') {
                ?>
                <option value="<?php echo esc_attr($post_type->name); ?>" <?php selected($selected_post_type, $post_type->name); ?>>
                    <?php echo esc_html($post_type->labels->singular_name); ?>
                </option>
                <?php
            }
        }
        ?>
    </select>
    <?php
}

// İç link verilecek kategori seçimi için callback fonksiyonu
function stc_link_category_callback() {
    $options = get_option('stc_settings');
    $selected_category = isset($options['link_category']) ? $options['link_category'] : '';
    $categories = get_categories();
    ?>
    <select name="stc_settings[link_category]">
        <option value="">Tüm Kategoriler</option>
        <?php
        foreach ($categories as $category) {
            ?>
            <option value="<?php echo esc_attr($category->term_id); ?>" <?php selected($selected_category, $category->term_id); ?>>
                <?php echo esc_html($category->name); ?>
            </option>
            <?php
        }
        ?>
    </select>
    <p class="description">Sadece belirli bir kategorideki yazılara iç link vermek isterseniz seçin.</p>
    <?php
}

// Buton sayısı için callback fonksiyonu
function stc_button_count_callback() {
    $options = get_option('stc_settings');
    $button_count = isset($options['button_count']) ? intval($options['button_count']) : 3;
    ?>
    <input type="number" name="stc_settings[button_count]" value="<?php echo esc_attr($button_count); ?>" min="1" max="5">
    <p class="description">Gösterilecek maksimum buton sayısı (1-5 arası).</p>
    <?php
}

// Butonları içeriğe eklemek için filtre ekle
add_filter('the_content', 'stc_add_buttons_to_content');

function stc_add_buttons_to_content($content) {
    // Eklenti ayarlarını al
    $options = get_option('stc_settings');
    $enabled_post_types = isset($options['post_types']) ? (array) $options['post_types'] : array();

    // Eğer şu anki gönderi tipi ayarlarda seçili değilse, içeriği değiştirmeden geri dön
    if (!in_array(get_post_type(), $enabled_post_types)) {
        return $content;
    }

    // Eğer içerikte h1 başlığı varsa
    if (preg_match('/<h1.*?>(.*?)<\/h1>/is', $content, $matches)) {
        $h1_tag = $matches[0];
        // H1 başlığının hemen altına butonlar için yer tutucu ekle
        $content = str_replace($h1_tag, $h1_tag . '<div class="semantic-tag-cluster-buttons"></div>', $content);
    }

    return $content;
}

// İçeriğe butonları eklemek için filtre ekle
add_filter('the_content', 'stc_add_buttons_to_content');

function stc_add_buttons_to_content($content) {
    // Eklenti ayarlarını al
    $options = get_option('stc_settings');
    $enabled_post_types = isset($options['post_types']) ? (array) $options['post_types'] : array();
    $link_post_type = isset($options['link_post_type']) ? $options['link_post_type'] : 'post';
    $link_category = isset($options['link_category']) && !empty($options['link_category']) ? intval($options['link_category']) : null;
    $button_count = isset($options['button_count']) ? intval($options['button_count']) : 3;

    // Eğer şu anki gönderi tipi ayarlarda seçili değilse, içeriği değiştirmeden geri dön
    if (!in_array(get_post_type(), $enabled_post_types)) {
        return $content;
    }

    // Şu anki gönderi ID'sini al
    $current_post_id = get_the_ID();
    if (!$current_post_id) {
        return $content;
    }

    // Alakalı yazıları bulma sorgusu için argümanlar
    $args = array(
        'post_type' => $link_post_type,
        'posts_per_page' => -1, // Tüm ilgili yazıları al, sonra alaka düzeyine göre seçeceğiz
        'post__not_in' => array($current_post_id), // Şu anki yazıyı hariç tut
        'fields' => 'ids', // Sadece ID'leri al, performansı artırır
    );

    // Eğer kategori belirlenmişse sorguya ekle
    if ($link_category) {
        $args['cat'] = $link_category;
    }

    // İlgili yazıları sorgula
    $related_posts_query = new WP_Query($args);
    $related_post_ids = $related_posts_query->posts;

    // Eğer ilgili yazı yoksa veya sadece şu anki yazı varsa geri dön
    if (empty($related_post_ids)) {
        return $content;
    }

    // Şu anki yazının içeriğini al
    $current_post = get_post($current_post_id);
    $current_content = strip_tags(strip_shortcodes($current_post->post_content . ' ' . $current_post->post_title));
    $current_content_words = array_unique(preg_split('/\s+/', mb_strtolower($current_content), -1, PREG_SPLIT_NO_EMPTY));

    // Alakalı yazıların alaka düzeylerini hesapla
    $related_posts_with_score = array();
    foreach ($related_post_ids as $post_id) {
        $post = get_post($post_id);
        $post_content = strip_tags(strip_shortcodes($post->post_content . ' ' . $post->post_title));
        $post_content_words = array_unique(preg_split('/\s+/', mb_strtolower($post_content), -1, PREG_SPLIT_NO_EMPTY));

        // Basit kelime eşleştirme ile alaka düzeyini hesapla
        $intersection = array_intersect($current_content_words, $post_content_words);
        $score = count($intersection);

        if ($score > 0) { // Alakası olanları dahil et
             $related_posts_with_score[$post_id] = $score;
        }
    }

    // Alaka düzeyine göre sırala (büyükten küçüğe)
    arsort($related_posts_with_score);

    // En alakalı yazıları seç (belirlenen sayı kadar)
    $top_related_post_ids = array_slice(array_keys($related_posts_with_score), 0, $button_count);

    // Eğer hiç alakalı yazı bulunamazsa geri dön
    if (empty($top_related_post_ids)) {
        return $content;
    }

    // Buton HTML'ini oluştur
    $buttons_html = '<div class="semantic-tag-cluster-buttons">';
    foreach ($top_related_post_ids as $post_id) {
        $post_title = get_the_title($post_id);
        $post_link = get_permalink($post_id);
        if ($post_title && $post_link) {
             $buttons_html .= '<a href="' . esc_url($post_link) . '" class="semantic-tag-cluster-button">' . esc_html($post_title) . '</a>';
        }
    }
    $buttons_html .= '</div>';

    // İçerikteki h1 başlığını bul ve butonları altına ekle
    if (preg_match('/<h1.*?>(.*?)<\/h1>/is', $content, $matches)) {
        $h1_tag = $matches[0];
        $content = str_replace($h1_tag, $h1_tag . $buttons_html, $content);
    } else {
        // Eğer h1 yoksa, içeriğin başına ekleyebiliriz (veya başka bir yere, duruma göre karar verilebilir)
        // Şimdilik h1 yoksa eklemeyelim.
    }

    return $content;
}

// CSS dosyasını yükle
add_action('wp_enqueue_scripts', 'stc_enqueue_styles');

function stc_enqueue_styles() {
    // Eklentinin CSS dosyasının URL'ini al
    $css_url = plugin_dir_url(__FILE__) . 'css/semantic-tag-cluster.css';
    wp_enqueue_style('semantic-tag-cluster-style', $css_url);
}