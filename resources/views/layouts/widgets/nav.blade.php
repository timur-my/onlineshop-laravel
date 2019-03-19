<div class="menu-container">
    <div class="menu">
        <ul>
            @foreach($categories as $category_1)
                @if($category_1['parent_id'] == 0)
                    <li><a href="/products/{{ $category_1['alias'] }}">{{ $category_1['title'] }}</a>
                        <ul>
                            @foreach($categories as $category_2)
                                @if($category_2['parent_id'] == $category_1['id'])
                                    <li><a href="/products/{{ $category_2['alias'] }}">{{ $category_2['title'] }}</a>
                                        <ul>
                                            @foreach($categories as $category_3)
                                                @if($category_3['parent_id'] == $category_2['id'])
                                                    <li><a href="/products/{{ $category_3['alias'] }}">{{ $category_3['title'] }}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>
