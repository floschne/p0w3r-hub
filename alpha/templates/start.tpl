<?php
/*
 * Data:
 * 'text' -- Array mit Text f�r die Welcome Page
 *           Array(
 *               'Title',
 *               'Date',
 *               'Content'
 *           )
 */ 
?>
<?php if(is_array($data['text'])) { ?>
	<div class="w3-container w3-card-8 w3-center">
	    <h2><?php echo htmlspecialchars($data['text']['title']); ?></h2>
	    <p>
	    	<span><?php echo htmlspecialchars($data['text']['content']); ?></span>
	    </p>
	    <span>Written on <?php echo htmlspecialchars($data['text']['date']); ?></span>
    </div>
<?php } else { ?>
<p class="info">
    No Text available
</p>
<?php } ?>