@component('mail::message')
# Hello {{ $recipient->name }}

The post <strong>"{{ $post->title }}"</strong> was modified by {{ $sender->name }}.

@component('mail::button', ['url' => route('posts.show', $post)])
See updated post
@endcomponent

Grazie,<br>
{{ config('app.name') }}
@endcomponent
