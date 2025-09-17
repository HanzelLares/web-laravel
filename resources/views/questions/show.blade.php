{{ $question->title }}

<p>
    {{ $question->description }}
</p>

<p>
    @foreach ($question->answers as $answer)
        <div class="border p-4 mb-4">
            <p>{{ $answer->content }}</p>
            <p class="text-sm text-gray-500">Answered by {{ $answer->user->name }} - {{ $answer->created_at->diffForHumans() }}</p>
        </div>
    @endforeach
</p>