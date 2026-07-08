-- ============================================================
-- Williams Pool Care: HTML Sitemap Page
-- Creates the /sitemap/ page using the page-sitemap.php template
--
-- Replace wp_61ba9426d7_ with your actual table prefix if different.
-- After running: WP Admin → Settings → Permalinks → Save Changes
-- ============================================================

INSERT INTO `wp_61ba9426d7_posts` (
    `post_author`, `post_date`, `post_date_gmt`,
    `post_content`, `post_title`, `post_excerpt`,
    `post_status`, `comment_status`, `ping_status`,
    `post_name`, `to_ping`, `pinged`,
    `post_modified`, `post_modified_gmt`,
    `post_content_filtered`, `post_parent`, `menu_order`,
    `post_type`, `comment_count`
) VALUES (
    1, NOW(), UTC_TIMESTAMP(),
    '',
    'Sitemap',
    'Complete sitemap of Williams Pool Care — all pages, services, locations, and blog posts.',
    'publish', 'closed', 'closed',
    'sitemap', '', '',
    NOW(), UTC_TIMESTAMP(),
    '', 0, 0,
    'page', 0
);

SET @sitemap_id = LAST_INSERT_ID();

UPDATE `wp_61ba9426d7_posts`
SET `guid` = CONCAT(
    (SELECT `option_value` FROM `wp_61ba9426d7_options` WHERE `option_name` = 'siteurl'),
    '/?page_id=', @sitemap_id
)
WHERE `ID` = @sitemap_id;

INSERT INTO `wp_61ba9426d7_postmeta` (`post_id`, `meta_key`, `meta_value`)
VALUES (@sitemap_id, '_wp_page_template', 'page-sitemap.php');

-- Flush permalink cache
DELETE FROM `wp_61ba9426d7_options` WHERE `option_name` = 'rewrite_rules';
