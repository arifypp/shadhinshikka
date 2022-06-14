@foreach ($subcategories as $sub)
    <a href="{{ route('category.edit', $sub->id) }}" class="badge badge-soft-danger font-size-11 m-1">{{ $sub->name }}</a>

    @if (count($sub->childs) > 0)
        @php
            $parents = $parent . '->' . $sub->name;
        @endphp
        @include('Backend.Admin.category.subcategoriestree', ['subcategories' => $sub->childs, 'parent' => $parents])
    @endif
@endforeach