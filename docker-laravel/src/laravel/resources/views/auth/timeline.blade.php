<html lang="ja">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>project6</title>
    </head>
    <body style="height:100%; background-color: #E6ECF0;">
        <div class="wrapper" style="margin: 0 auto; width: 50%; height: 100%; background-color: white;">
            <form action="/timeline" method="post" id="posting">
            {{ csrf_field() }}
                <div style="background-color: #E8F4FA; text-align: center;">
                    <input form="posting" type="text" name="body" style="margin: 1rem; padding: 0 1rem; width: 70%; border-radius: 6px; border: 1px solid #ccc; height: 2.3rem;" placeholder="いまどうしてる？">
                    <button type="submit" style="background-color: #f5f5f5; color: black; border-radius: 10px; padding: 0.5rem;">つぶやく</button>
                </div>
                @if($errors->first('tweet'))
                    <p style="font-size: 0.7rem; color: red; padding: 0 2rem;">※{{$errors->first('tweet')}}</p>
                @endif
            </form>
            <div class="tweet-wrapper">
                @foreach($tweets as $tweet)
                <div style="padding:2rem; border-top: solid 1px #E6ECF0; border-bottom: solid 1px #E6ECF0;">
                    <form action="{{ route('timeline.delete',['id' => $tweet->id]) }}" method="post" id="del">
                    {{ csrf_field() }}
                        <div style="display: flex; justify-content:space-around">
                            <div>{{$tweet->user->name}}</div>
                            {{ $tweet->body }}
                            <div>{{$tweet->created_at}}</div>
                            @if($tweet->user_id === Auth::id())
                            <div>
                                <button type="submit">削除</button>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
    </body>
</html>