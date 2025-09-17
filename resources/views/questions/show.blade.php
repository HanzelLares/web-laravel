<x-forum.layouts.app>

<div class="border p-4 mb-4">
    <h3>
        {{ $question->title }}
    </h3>

    <p>
        {{ $question->description }}
    </p>
</div>

<p>
    @foreach ($question->answers as $answer)
        <div class="border p-4 mb-4">
            <p>{{ $answer->content }}</p>
            <p class="text-sm text-gray-500">Answered by {{ $answer->user->name }} - {{ $answer->created_at->diffForHumans() }}</p>
        </div>
    @endforeach
</p>

</x-forum.layouts.app>