<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    @if(session('success'))
        <div class="bg-green-300 text-green-600 p-5 rounded mt-5">
            {{session('success')}}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-300 text-red-600 p-5 rounded mt-5">
            @foreach(session('error') as $error)
                {{$error}}
            @endforeach
        </div>
    @endif
    @if(session('info'))
            <div class="bg-orange-300 text-orange-600 p-5 rounded mt-5">
            {{session('info')}}
        </div>
    @endif
</div>
