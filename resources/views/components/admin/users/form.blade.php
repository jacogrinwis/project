@csrf

<div class="flex flex-col gap-6 mb-6 lg:flex-row lg:gap-10">

    <div class="flex-1 space-y-6">

        <div>
            <label for="name" class="form-label block mb-2">Name</label>
            <input type="text" name="name" id="name" class="text-input" value="{{ old('name') ?? $user->name ?? '' }}">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div>
            <label for="email" class="form-label block mb-2">Email</label>
            <input type="email" name="email" id="email" class="text-input" value="{{ old('email') ?? $user->email ?? '' }}">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        @empty($user)
            <div>
                <label for="password" class="form-label block mb-2">Password</label>
                <input type="password" name="password" id="password" class="text-input" value="{{ old('password') }}">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div>
                <label for="password_confirmation" class="form-label block mb-2">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="text-input" value="{{ old('password_confirmation') }}">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        @endempty

    </div>

    <div class="flex-shrink space-y-4">

        <x-input-label value="Roles" class="-mb-2" />
        @foreach ($roles as $role)
            <div class="flex items-center">
                <input type="radio" name="role" id="role-radio-{{ $role->id }}" class="radio-input" value="{{ $role->id }}"
                @isset($user)
                    @if ($role->id == $user->roles->pluck('id')->first()) checked @endif
                @else
                    @if ($role->name == 'User') checked @endif
                @endisset>
                <x-input-label for="test" :value="$role->name" class="mb-0" />
            </div>
        @endforeach

    </div>

</div>

<button type="submit" class="btn-primary mr-2">
    @isset($user)
        Update
    @else
        Submit
    @endisset
</button>

{{-- @isset($user)
<form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
    @csrf
    @method('DELETE')
    <button type="submit"
        class="btn-red"
        onclick="confirm('Are you sure you want to delete this user?')">
        <i class="bi bi-trash3-fill mr-2"></i> Delete
    </button>
</form>
@endisset --}}


