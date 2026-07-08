-- ============================================================
-- Williams Pool Care: Pool Repair Near Me Landing Page
-- Target keywords: "pool repair", "pool repairs",
-- [pool repairs near me]
--
-- Replace wp_61ba9426d7_ with your actual table prefix.
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
    'Pool Repair Near Me | Fast Pool Repairs in Sacramento & Fair Oaks',
    'Pool repair near you in Sacramento & Fair Oaks. Fast pool repairs for pumps, filters, heaters & more. All major brands. Flat-rate pricing. Call (916) 532-5561.',
    'publish', 'closed', 'closed',
    'pool-repair-near-me', '', '',
    NOW(), UTC_TIMESTAMP(),
    '', 0, 0,
    'page', 0
);

SET @page_id = LAST_INSERT_ID();

UPDATE `wp_61ba9426d7_posts`
SET `guid` = CONCAT(
    (SELECT `option_value` FROM `wp_61ba9426d7_options` WHERE `option_name` = 'siteurl'),
    '/?page_id=', @page_id
)
WHERE `ID` = @page_id;

INSERT INTO `wp_61ba9426d7_postmeta` (`post_id`, `meta_key`, `meta_value`)
VALUES (@page_id, '_wp_page_template', 'page-pool-repair-near-me.php');

DELETE FROM `wp_61ba9426d7_options` WHERE `option_name` = 'rewrite_rules';
