<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Role') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="w-1/2 mx-auto mb-5">
                        <a href="{{route('admin.roles.index')}}" class="px-3 py-2 bg-black text-white rounded mx-auto">Back</a>
                    </div>
                    <form class="w-1/2 mx-auto" action="{{route('admin.roles.update',$role->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        {{--Title--}}
                        <label class="inline-block mt-5 text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                               for="role">
                            Title
                        </label>
                        <input class="@if($errors->has('role')) border-red-600 @endif @endifborder-input bg-background mt-1 ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                               id="role"
                               type="text"
                               placeholder="Enter Title of Role"
                               name="role"
                               value="{{old('role',$role->name)}}"
                        />
                        @if($errors->has('role'))
                            <span class="text-red-600 text-[12px] font-semibold"><strong>{{$errors->first('role')}}</strong></span>
                        @endif
                        @foreach($permissions as $permission)
                            <div>
                                <input type="checkbox" value="{{$permission->id}}" @if($role->hasPermissionTo($permission->name)) checked @endif name="permissions[]" id="{{$permission->name}}">
                                <label class="inline-block mt-5 text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                       for="{{$permission->name}}">
                                    {{$permission->name}}
                                </label>
                            </div>
                        @endforeach



                        <!-- Login button -->
                        <button class="mt-5 ring-offset-background focus-visible:ring-ring flex h-10 w-full items-center justify-center whitespace-nowrap rounded-md bg-black px-4 mt-2 py-2 text-sm font-medium text-white transition-colors hover:bg-black/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50" type="submit">Update Role</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
