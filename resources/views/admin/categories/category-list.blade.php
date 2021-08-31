@foreach ($categories as $category)
<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center pr-0">
    <label class="mt-auto mb-auto">
      <!-- todo: show category title -->
        {{  str_repeat(' - ', $count) . ' ' . $category->title }}
    </label>
    <div>
      <!-- detail -->
      @can('category_detail')
        <a href="{{ route('category.show', ['category' => $category]) }}" class="btn btn-sm btn-primary" role="button">
            <i class="fas fa-eye"></i>
        </a>
      @endcan
      <!-- edit -->
      @can('category_update')
        <a href="{{ route('category.edit', ['category' => $category]) }}" class="btn btn-sm btn-info" role="button">
            <i class="fas fa-edit"></i>
        </a>
      @endcan
      <!-- delete -->
      @can('category_detail')
        <form class="d-inline" action="{{ route('category.destroy', ['category' => $category]) }}" role="alert" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">
            <i class="fas fa-trash"></i>
            </button>
        </form>
      @endcan
    </div>
    <!-- todo:show subcategory -->
    @if ($category->descendants && !trim(request()->get('keyword')))
        @include('admin.categories.category-list',[
            'categories' => $category->descendants,
            'count' => $count + 2
        ])
    @endif
  </li>
@endforeach
