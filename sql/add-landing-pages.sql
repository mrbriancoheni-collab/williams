-- ============================================================
-- Williams Pool Care: Google Ads Landing Pages
-- Creates /local-pool-services and /local-pool-maintenance
--
-- Replace wp_61ba9426d7_ with your actual table prefix if different.
-- After running: WP Admin → Settings → Permalinks → Save Changes
-- ============================================================

-- ---- Page 1: /local-pool-services ----
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
    'Pool Cleaning Services Near Me | Professional Swimming Pool Cleaning',
    'Professional pool cleaning services in Sacramento & Fair Oaks. Affordable swimming pool cleaning from certified technicians. Call (916) 532-5561.',
    'publish', 'closed', 'closed',
    'local-pool-services', '', '',
    NOW(), UTC_TIMESTAMP(),
    '', 0, 0,
    'page', 0
);

SET @services_id = LAST_INSERT_ID();

UPDATE `wp_61ba9426d7_posts`
SET `guid` = CONCAT(
    (SELECT `option_value` FROM `wp_61ba9426d7_options` WHERE `option_name` = 'siteurl'),
    '/?page_id=', @services_id
)
WHERE `ID` = @services_id;

INSERT INTO `wp_61ba9426d7_postmeta` (`post_id`, `meta_key`, `meta_value`)
VALUES (@services_id, '_wp_page_template', 'page-local-pool-services.php');

-- ---- Page 2: /local-pool-maintenance ----
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
    'Pool Maintenance Near Me | Swimming Pool Maintenance & Pool Repair',
    'Swimming pool maintenance and pool repair services near you in Sacramento & Fair Oaks. Certified technicians, same-week service. Call (916) 532-5561.',
    'publish', 'closed', 'closed',
    'local-pool-maintenance', '', '',
    NOW(), UTC_TIMESTAMP(),
    '', 0, 0,
    'page', 0
);

SET @maintenance_id = LAST_INSERT_ID();

UPDATE `wp_61ba9426d7_posts`
SET `guid` = CONCAT(
    (SELECT `option_value` FROM `wp_61ba9426d7_options` WHERE `option_name` = 'siteurl'),
    '/?page_id=', @maintenance_id
)
WHERE `ID` = @maintenance_id;

INSERT INTO `wp_61ba9426d7_postmeta` (`post_id`, `meta_key`, `meta_value`)
VALUES (@maintenance_id, '_wp_page_template', 'page-local-pool-maintenance.php');

-- Flush permalink cache
DELETE FROM `wp_61ba9426d7_options` WHERE `option_name` = 'rewrite_rules';
