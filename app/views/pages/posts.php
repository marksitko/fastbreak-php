<?php getHeader(); ?>

<?php $this->component('shared/notification', $data['notification']); ?>

<h1><?php echo $data['title']; ?></h1>

<form method="post">
<p>
    <label for="title">Title</label>
    <input type="text" name="title" id="title">
    <input type="hidden" name="userId" value="1">
</p>
<p>
    <label for="body">Body</label>
    <textarea name="body" id="body" cols="30" rows="10"></textarea>
</p>
<p>
    <input type="submit" value="Save Post">
</p>
</form>

<?php getFooter(); ?>