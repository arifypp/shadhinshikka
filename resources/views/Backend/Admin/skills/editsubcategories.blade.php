@foreach ($subcategories as $sub)
    <option value="{{ $sub->id }}" @if($sub->id == $sk->id) selected @endif>{{ $parent}} -> {{ $sub->name }}</option>

    @if (count($sub->childs) > 0)
        @php
            $parents = $parent . '-> ' . $sub->name;
        @endphp
        @include('Backend.Admin.skills.editsubcategories', ['subcategories' => $sub->childs, 'parent' => $parents])
    @endif
@endforeach