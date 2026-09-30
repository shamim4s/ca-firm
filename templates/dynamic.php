<?php
// Dynamic Page template

// $content is passed by render method implicitly, but we specifically pass 'content' as well from renderDynamic
// Actually render() extracts arrays into local scope variables.
?>

<div class="dynamic-page-content">
    <?= $content ?? '' ?>
</div>
