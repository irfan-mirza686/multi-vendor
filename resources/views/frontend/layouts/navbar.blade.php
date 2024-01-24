<div class="nav-main">
    <div class="container">
        <div class="navbar navbar-light navbar-expand">
            <ul class="nav navbar-nav mega-menu">
                <!-- <li class="nav-item dropdown" data-category-id="3">
                    <a id="nav_main_category_3" href="http://secretattire.in/gowns"
                    class="nav-link dropdown-toggle nav-main-category" data-id="3"
                    data-parent-id="0" data-has-sb="0">Gowns</a>
                </li> -->
                @foreach($categories as $category)
                <li class="nav-item dropdown" data-category-id="{{(count($category->subcategories) > 0)?$category->id:''}}">
                    <a id="nav_main_category_5" href="{{$category->slug}}"
                    class="nav-link dropdown-toggle nav-main-category" data-id="{{$category->id}}"
                    data-parent-id="{{$category->parent_category}}" data-has-sb="1">{{$category->name}} </a>
                    @if($category->subcategories)
                    <div id="mega_menu_content_{{$category->id}}" class="dropdown-menu">
                        <div class="row">
                            <div class="col-8 menu-subcategories col-category-links">
                                <div class="card-columns">
                                    @foreach($category->subcategories as $subcategory)
                                    <div class="card">
                                        <div class="row">
                                            <div class="col-12">
                                                <a id="nav_main_category_8"
                                                href="{{$subcategory->slug}}"
                                                class="second-category nav-main-category"
                                                data-id="{{$subcategory['id']}}" data-parent-id="{{$subcategory['parent_category']}}"
                                                data-has-sb="0">{{$subcategory['name']}} </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                            @if($category->image)
                            <div class="col-4 col-category-images">
                                <div class="nav-category-image">
                                    <a href="javascript:void(0);">
                                        <img src="http://secretattire.in/assets/img/img_bg_product_small.png"
                                        data-src="http://secretattire.in/uploads/category/category_63fa28fc9bcc60-94125834-76205914.jpg"
                                        alt="Lehanga " class="lazyload img-fluid">
                                        <span>Lehanga </span>
                                    </a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif
                </li>
                @endforeach

            </ul>
        </div>
    </div>
</div>
