<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="w-1/2 mx-auto mb-5">
                        <a href="{{route('admin.users.index')}}" class="px-3 py-2 bg-black text-white rounded mx-auto">Back</a>
                    </div>
                    <form class="w-1/2 mx-auto" action="{{route('admin.users.update',$user->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        {{--Name--}}
                        <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                               for="email">
                            Name
                        </label>
                        <input class="border-input bg-background mt-1 ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                               id="name"
                               type="text"
                               placeholder="Enter your name"
                               name="name"
                               value="{{old('name',$user->name)}}"
                        />
                        @if($errors->has('name'))
                            <span class="text-red-600 font-semibold"><strong>{{$errors->first('name')}}</strong></span>
                        @endif

                        {{--E-mail--}}
                        <label class="inline-block mt-5 text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                               for="email">
                            E-Mail
                        </label>
                        <input class="border-input bg-background mt-1 ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                               id="email"
                               type="email"
                               placeholder="Enter your E-mail"
                               name="email"
                               value="{{old('email',$user->email)}}"
                        />
                        @if($errors->has('email'))
                            <span class="text-red-600 font-semibold"><strong>{{$errors->first('email')}}</strong></span>
                        @endif

                        {{--Password--}}
                        <label class="inline-block mt-5 text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                               for="password">
                            Password
                        </label>
                        <input class="border-input bg-background mt-1 ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                               id="password"
                               type="password"
                               name="password"
                        />
                        @if($errors->has('password'))
                            <span class="text-red-600 font-semibold"><strong>{{$errors->first('password')}}</strong></span>
                        @endif

                        {{--Password Confirmation--}}
                        <label class="inline-block mt-5 text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                               for="password_confirmation">
                            Password Confirm
                        </label>
                        <input class="border-input bg-background mt-1 ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                               id="password_confirmation"
                               type="password"
                               name="password_confirmation"
                        />
                        @if($errors->has('password_confirmation'))
                            <span class="text-red-600 font-semibold"><strong>{{$errors->first('password_confirmation')}}</strong></span>
                        @endif

                        {{--Roles--}}
                        <label class="inline-block mt-5 text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="role">Roles</label>
                        <select class="border-input bg-background mt-1 ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="role" name="role" >
                            @foreach($roles as $role)
                                <option value="{{$role->name}}" @if($user->hasRole($role->name)) selected @endif>{{$role->name}}</option>
                           @endforeach
                        </select>

                            <!-- Login button -->
                        <button class="mt-5 ring-offset-background focus-visible:ring-ring flex h-10 w-full items-center justify-center whitespace-nowrap rounded-md bg-black px-4 mt-2 py-2 text-sm font-medium text-white transition-colors hover:bg-black/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50" type="submit">Update User</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
