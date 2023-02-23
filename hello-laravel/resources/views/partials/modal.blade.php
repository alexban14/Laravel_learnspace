<div class="modal">
<div>{{ $content }}</div>
<div class="close button etc">...</div>
</div>

<!-- in another template -->
@include('partials.modal', [
'body' => '<p>The password you have provided is not valid. Here are the rules
for valid passwords: [...]</p><p><a href="#">...</a></p>'
])
