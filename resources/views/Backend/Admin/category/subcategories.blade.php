@foreach ($subcategories as $sub)
    <option value="{{ $sub->id }}">{{ $parent}} -> {{ $sub->name }}</option>

    @if (count($sub->childs) > 0)
        @php
            $parents = $parent . '-> ' . $sub->name;
        @endphp
        @include('Backend.Admin.category.subcategories', ['subcategories' => $sub->childs, 'parent' => $parents])
    @endif
@endforeach