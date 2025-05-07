<div>
    <form wire:submit.prevent="search">
        {{-- <label for="search"></label>--}}
        <input
            autocapitalize="words"
            autocomplete="address-level2"
            autofocus
            id="search"
            list="cities"
            maxlength="64"
            minlength="3"
            pattern="(Chicago|Houston|New York|Raleigh|San Diego|Seattle)"
            placeholder="Raleigh"
            title="Chicago; Houston; New York; Raleigh; San Diego or Seattle"
            type="text"
            wire:model="q"
            class="rounded-full bg-white px-4 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600"
        />
        <span class="valid mx-0"></span>
        <datalist id="cities">
            <option value="Chicago"></option>
            <option value="Houston"></option>
            <option value="New York"></option>
            <option value="Raleigh"></option>
            <option value="San Diego"></option>
            <option value="Seattle"></option>
        </datalist>
    </form>

    @include('partial.weather')
</div>
