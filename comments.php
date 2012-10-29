<?php /* Il template per i commenti */ ?>
<div id="comments">

	<h3 id="comments-title">
		<?php _e('Commenti', 'templatezero'); ?>
	</h3>
	
	<?php 
		$fields = array(
			'author' => '<div class="comments-fields"><input type="text" value="" id="author" name="author" placeholder="Nome..." />',
			'email' => '<input type="text" value="" id="email" name="email" placeholder="Email..." />',
			'url' => '<input type="text" value="" id="url" name="url" placeholder="WebSite..." />'
		);
		
		comment_form( array(
			'fields' => apply_filters('comment_form_default_fields', $fields),
			'comment_field' => '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Messaggio..."></textarea></div>',
			'title_reply' => '',
			'comment_notes_after' => '',
			'comment_notes_before' => '',
			'label_submit' => __('Aggiungi Idea', 'templatezero')
		)); 
	?>

	<ol class="commentlist">
		<?php 
			wp_list_comments( 
				array( 'callback' => 'tz_comment_list' ) 
			); 	
		?>
	</ol>

</div><!-- fine #comments -->
















