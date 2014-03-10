<link rel="stylesheet" href="<?php public_path(); ?>/bootstrap/docs.min.css">
@if ($errors->any())
<div class="bs-callout bs-callout-danger error">
    <ul >
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
</div>
@endif