<?php get_header(); ?>

<?php $post = get_post($id, $output, $filter);

echo "<pre>";
print_r($post);
echo "</pre>";

if (has_post_thumbnail()) {
	echo the_post_thumbnail();
}

?>

<?php get_footer(); ?>