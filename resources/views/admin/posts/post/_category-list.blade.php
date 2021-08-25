<ul class="pl-1 my-1" style="list-style: none;">
    @foreach ($categories as $category)
    <li class="form-group form-check my-1">
        @if ($categoryChecked && in_array($category->id, $categoryChecked))
        <input class="form-check-input" type="checkbox" name="category[]" value="{{ $category->id }}" checked>
        @else
        <input class="form-check-input" type="checkbox" name="category[]" value="{{ $category->id }}">
        @endif
       <label class="form-check-label">
           {{ $category->title }}
       </label>
       @if ($category->descendants)
            @include('posts._category-list',[
                'categories' => $category->descendants,
                'categoryChecked' => $categoryChecked
            ])
       @endif
    </li>
    @endforeach
 </ul>
