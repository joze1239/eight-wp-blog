<?php get_header(); ?>

<?php 
$post = get_post($id, $output, $filter);
$tags = get_the_tags($id);

echo "TITLE=".$post->post_title."<br />";
echo "TAGS=".implode(",", array_column($tags, "name"))."<br />";


echo "<pre>";
print_r($tags);
echo "</pre>";

echo "<pre>";
print_r($post);
echo "</pre>";

if (has_post_thumbnail()) {
	echo the_post_thumbnail();
}

?>

<?php get_footer(); ?>