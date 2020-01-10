<?php get_header(); ?>

<?php 
$post = $post = get_post();
setup_postdata($post);
$tags = get_the_tags($id);

echo "TITLE=".$post->post_title."<br />";
echo "TAGS=".implode(",", array_column($tags, "name"))."<br />";
echo "AUTHOR=".get_the_author()."<br />";

echo "<pre>";
print_r($tags);
echo "</pre>";

echo "<pre>";
print_r($post);
echo "</pre>";

if (has_post_thumbnail()) {
	echo the_post_thumbnail('large');
}

?>

<?php get_footer(); ?>