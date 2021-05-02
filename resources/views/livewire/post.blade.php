<article class="card mt-4 mb-4">
    <header class="card__header">
        @if(file_exists (public_path('users/'.auth()->user()->id.'.jpg')))<img src="/users/{{auth()->user()->id}}.jpg" class="img-radius" style="width: 100px" alt="User-Profile-Image">@else<img src="users/default.png" class="img-radius" alt="User-Profile-Image">@endif
        <div class="card__userinfo">
            <h2 class="card__name">{{ $post->user->name }}</h2>
        </div>
    </header>

    <div class="card__text">
        <h5 class="card__paragraph">{{ $post->body }}</h5>
        <span class="card__date">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
    </div>

    <footer class="card__footer">
        {{$howManyLiked[$post->id]}}
        @if($isliked[$post->id] == false)
            <form method="post" wire:submit.prevent="addHeart">
                <button class="bg-transparent border-0" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                    </svg>
                </button>
            </form>
        @else
            <form method="post" wire:submit.prevent="deleteHeart">
                <button class="bg-transparent border-0" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                    </svg>
                </button>
            </form>
        @endif
    </footer>
</article>
