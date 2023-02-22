// CSRF protection
<form action="/tasks/5" method="POST">
<?php echo csrf_field(); ?>
<!-- or: -->
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<!-- or: -->
@csrf
</form>
