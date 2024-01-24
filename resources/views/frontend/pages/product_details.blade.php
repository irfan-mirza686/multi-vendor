@extends('frontend.layouts.layout')
@section('content')

<?php
$prodThumbnail = getFile('products',$item->product->image);
?>
<!-- Set dynamic meta tags -->
@section('meta-title', $item->product->name )
@section('meta-description', $item->product->description)

@section('meta-image', $prodThumbnail)

<!-- Your HTML content for displaying the product goes here -->



<div class="row">
    <div class="col-12">
        <nav class="nav-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-products">
                <li class="breadcrumb-item"><a href="javascript:void(0);/">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                <!-- <li class="breadcrumb-item"><a href="http://secretattire.in/saree/iminsaree">IMinsaree</a> -->
                </li>
                <li class="breadcrumb-item active">{{$item->product->name}}</li>
            </ol>
        </nav>
    </div>

    <div class="col-12">
        <div class="product-details-container ">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6">
                    <div id="product_slider_container">

                        <div class="product-slider-container">
                            <div class="left">
                                <div class="product-slider-content">
                                    <div id="product_thumbnails_slider" class="product-thumbnails-slider">
                                        <?php
                                                    $productSlug = $baseURL .'/' . $item->product->slug;
                                                    ?>
                                        @foreach($item->product->other_images as $image)
                                        <?php

                                            $thumbnail = $baseURL . '/assets/uploads/products/' . $image['img'];
                                            ?>
                                        <div class="item">
                                            <div class="item-inner">
                                                <img src="{{$thumbnail}}" class="img-bg" alt="slider-bg">
                                                <img src="{{$thumbnail}}" data-lazy="{{$thumbnail}}"
                                                    class="img-thumbnail" alt="">
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="right">
                                <div class="product-slider-content">
                                    <div id="product_slider" class="product-slider gallery">
                                        @foreach($item->product->other_images as $image)
                                        <?php

                                            $thumbnail = $baseURL . '/assets/uploads/products/' . $image['img'];
                                            ?>
                                        <div class="item">
                                            <a href="{{$thumbnail}}" title="">
                                                <img src="{{$thumbnail}}" class="img-bg" alt="slider-bg">
                                                <img src="{{$thumbnail}}" data-lazy="{{$thumbnail}}" alt=""
                                                    class="img-product-slider">
                                            </a>
                                        </div>
                                        @endforeach

                                    </div>
                                    <div id="product-slider-nav" class="product-slider-nav">
                                        <button class="prev"><i class="icon-arrow-left"></i></button>
                                        <button class="next"><i class="icon-arrow-right"></i></button>
                                    </div>
                                </div>

                                <div class="row-custom text-center">
                                    <button class="btn btn-lg btn-video-preview" data-toggle="modal"
                                        data-target="#productVideoModal"><i class="icon-play"></i>Video</button>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="productVideoModal" role="dialog">
                            <div class="modal-dialog modal-dialog-centered modal-product-video" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"><i
                                            class="icon-close"></i></button>
                                    <div class="product-video-preview m-0">
                                        <video id="player" playsinline controls>
                                            <source
                                                src="javascript:void(0);"
                                                type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <style>
                            .product-thumbnails-slider .slick-track {
                                transform: none !important;
                            }
                        </style>

                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6">
                    <div id="response_product_details" class="product-content-details">
                        <div class="row">
                            <div class="col-12">

                                <h1 class="product-title">{{$item->product->name}}</h1>
                                <input type="hidden" value="{{$item->product->id}}" id="wholeSalerProductID">
                                <input type="hidden" value="{{$item->id}}" id="vendorProductID">
                                <div class="row-custom meta">
                                    <div class="product-details-user">
                                        By&nbsp;<a
                                            href="{{route('vendor.profile',$item->vendor->username)}}">{{$item->vendor->username}}</a>
                                    </div>
                                    <span><i class="icon-comment"></i>0</span>
                                    @if($item->review)
                                    <div class="product-details-review">
                                        <div class="rating">
                                            <?php
                                                for ($i=0; $i < $rating; $i++) { ?>
                                                    <i class="icon-star"></i>
                                               <?php } ?>

                                            <!-- <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i> -->
                                        </div> <span>({{$rating}})</span>
                                    </div>
                                    @endif
                                    <span><i class="icon-heart"></i>0</span>
                                    <span><i class="icon-eye"></i>22</span>
                                </div>
                                <div class="row-custom price">
                                    <div id="product_details_price_container" class="d-inline-block">
                                        <strong class="lbl-price">
                                            <span>PKR </span>{{$item->product->item_price}}</strong>

                                    </div>
                                </div>

                                <div class="row-custom details">
                                    <div class="item-details">
                                        <div class="left">
                                            <label>Uploaded</label>
                                        </div>
                                        <div class="right">
                                            <span>{{$item->product->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="javascript:void(0);" id="form_add_cart" method="post"
                            accept-charset="utf-8">
                            <input type="hidden" name="csrf_mds_token" value="57a84f8a9004e60e38b7085ffde1bf76" />
                            <input type="hidden" name="product_id" value="19">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row-custom product-variations">
                                        <div class="row row-product-variation item-variation">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 product-add-to-cart-container">
                                    <div class="button-container">
                                        <!-- <button type="button" class="btn btn-md btn-block btn-dark btn-product-cart"
                                            data-toggle="modal" data-target="#loginModal">Contact
                                            Seller</button> -->
                                            <button type="button" data-productName="{{$item->product->name}}" data-ProductLink="{{ route('product.details', ['vendor' => $item->vendor->username, 'product' => $item->product->slug]) }}" data-vendorPhone="{{$item->vendor->mobile}}" data-UserName="{{@Auth::user()->name ?? 'unknow user'}}" class="btn btn-md btn-block btn-dark btn-product-cart whatsAppBtn"
                                            >WhatsApp</button>
                                        </div>
                                    <div class="button-container button-container-wishlist">
                                        <a href="javascript:void(0)" class="btn-wishlist btn-add-remove-wishlist"
                                            data-product-id="19" data-reload="1"><i class="icon-heart-o"></i><span>Add
                                                to wishlist</span></a>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <!--Include social share-->

                        <div class="row-custom product-share">
                            <label>Share:</label>
                            <ul>
                                <?php
                                    $currenturl = url()->full();

                                ?>
                                <li>
                                    <a href="javascript:void(0)"
                                        onclick='window.open("https://www.facebook.com/sharer/sharer.php?u={{$currenturl}}", "Share This Post", "width=640,height=450");return false'>
                                        <i class="icon-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        onclick='window.open("https://twitter.com/share?url={{$currenturl}}&amp;text=", "Share This Post", "width=640,height=450");return false'>
                                        <i class="icon-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://api.whatsapp.com/send?text= {{$currenturl}}"
                                        target="_blank">
                                        <i class="icon-whatsapp"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        onclick='window.open("http://pinterest.com/pin/create/button/?url={{$currenturl}}&amp;media={{getFile('sliders','64f63eda2b71f1693859546.webp')}}", "Share This Post", "width=640,height=450");return false'>
                                        <i class="icon-pinterest"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        onclick='window.open("http://www.linkedin.com/shareArticle?mini=true&amp;url={{$currenturl}}", "Share This Post", "width=640,height=450");return false'>
                                        <i class="icon-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="product-description post-text-responsive">
                    <ul class="nav nav-tabs nav-tabs-horizontal" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab_description" data-toggle="tab"
                                href="#tab_description_content" role="tab" aria-controls="tab_description"
                                aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab_shipping" data-toggle="tab" href="#tab_shipping_content"
                                role="tab" aria-controls="tab_shipping" aria-selected="false"
                                onclick="load_product_shop_location_map();">Location</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab_reviews" data-toggle="tab" href="#tab_reviews_content"
                                role="tab" aria-controls="tab_reviews" aria-selected="false">Reviews&nbsp;(0)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab_comments" data-toggle="tab" href="#tab_comments_content"
                                role="tab" aria-controls="tab_comments"
                                aria-selected="false">Comments&nbsp;({{$countComments}})</a>
                        </li>
                    </ul>

                    <div id="accordion" class="tab-content">
                        <div class="tab-pane fade show active" id="tab_description_content" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <a class="card-link" data-toggle="collapse" href="#collapse_description_content">
                                        Description<i class="icon-arrow-down"></i><i class="icon-arrow-up"></i>
                                    </a>
                                </div>
                                <div id="collapse_description_content"
                                    class="collapse-description-content collapse show" data-parent="#accordion">
                                    <div class="description">
                                        <p>Sa12rd WhatsApp +91-9034828632 for bookings/enquiry &amp; more
                                            collection<br />*POCKET SAREE. ONE MIN SAREE. READY TO WEAR
                                            SAREE FOR OFFICIAL WEAR FOR INNOVATION &amp; WOMEN* *1 MIN SAREE
                                            FOR MARRIAGE OFFICE- WEAR*</p>
                                        <p>▪️Catalog : Pocket Saree Vol-5</p>
                                        <p>◾ Saree <br />▪️Saree Fabric : *Chinnon-Silk Blend*<br />▪️ Size
                                            : Free Size (30-44 Adjustables)</p>
                                        <p>◾ Blouse <br />▪️Blouse Fabric : *Banglori Silk Blouse*<br />▪️
                                            Size : Stitched(Upto-42Inch Free Size)</p>
                                        <p>◾ Pocket<br />▪️ Fabric : *Same as Saree*<br />▪️ Size :
                                            Stitched(2 Smartphones can keep together)</p>
                                    </div>
                                    <div class="row-custom text-right m-b-10">
                                        <a href="javascript:void(0)" class="text-muted link-abuse-report"
                                            data-toggle="modal" data-target="#loginModal">
                                            Report this product </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab_shipping_content" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse"
                                        href="#collapse_shipping_content"
                                        onclick="load_product_shop_location_map();">Location<i
                                            class="icon-arrow-down"></i><i class="icon-arrow-up"></i></a>
                                </div>
                                <div id="collapse_shipping_content" class="collapse-description-content collapse"
                                    data-parent="#accordion">
                                    <table class="table table-product-shipping">
                                        <tbody>
                                            <tr>
                                                <td class="td-left">Shop Location</td>
                                                <td class="td-right"><span id="span_shop_location_address"></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="product-location-map">
                                                <iframe id="iframe_shop_location_address" frameborder="0" scrolling="no"
                                                    marginheight="0" marginwidth="0"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab_reviews_content" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse"
                                        href="#collapse_reviews_content">
                                        Reviews<i class="icon-arrow-down"></i><i class="icon-arrow-up"></i>
                                    </a>
                                </div>
                                <div id="collapse_reviews_content" class="collapse-description-content collapse"
                                    data-parent="#accordion">
                                    <div id="review-result">
                                        <div class="reviews-container">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="review-total">
                                                        <label class="label-review">Reviews&nbsp;(0)</label>
                                                        @if(Auth::check())
                                                        <button type="button"
                                                            class="btn btn-default btn-custom btn-dark btn-add-review float-right"
                                                            id="addProductReview"
                                                            data-product-id="36">Add Review</button>
                                                        @endif
                                                    </div>
                                                    <p class="no-comments-found">No reviews found!</p>
                                                </div>
                                            </div>
                                        </div>

                                        @include('frontend.pages.includes.reviews')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab_comments_content" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse"
                                        href="#collapse_comments_content">
                                        Comments<i class="icon-arrow-down"></i><i class="icon-arrow-up"></i>
                                    </a>
                                </div>
                                <div id="collapse_comments_content" class="collapse-description-content collapse"
                                    data-parent="#accordion">
                                    <input type="hidden" value="5" id="product_comment_limit">
                                    <div class="comments-container">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div id="comment-result">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="comments">
                                                                <div class="row-custom row-comment-label">
                                                                    <label
                                                                        class="label-comment">Comments&nbsp;({{$countComments}})</label>
                                                                </div>

                                                                <ul class="comment-list">
                                                                    @forelse($comments as $key => $comment)
                                                                    <li>
                                                                        <div class="left">
                                                                            <a
                                                                                href="javascript:void(0);">
                                                                                <img src="http://localhost/secretattire_ecommerce/assets/img/user.png"
                                                                                    alt="admin">
                                                                            </a>
                                                                        </div>
                                                                        <div class="right">
                                                                            <div class="row-custom">
                                                                                <p class="username">
                                                                                    <a
                                                                                        href="javascript:void(0);">admin</a>
                                                                                </p>
                                                                            </div>
                                                                            <div class="row-custom comment">
                                                                                {{$comment->comment}} </div>
                                                                            <div class="row-custom">
                                                                                <span class="date">3 minutes ago</span>
                                                                                <a href="javascript:void(0)"
                                                                                    class="btn-reply"
                                                                                    onclick="show_comment_box('2');"><i
                                                                                        class="icon-reply"></i>
                                                                                    Reply</a>
                                                                                <a href="javascript:void(0)"
                                                                                    class="btn-delete-comment"
                                                                                    onclick="delete_comment('2','38','Are you sure you want to delete this comment?');">&nbsp;<i
                                                                                        class="icon-trash"></i>&nbsp;Delete</a>

                                                                            </div>
                                                                            <div id="sub_comment_form_2"
                                                                                class="row-custom row-sub-comment visible-sub-comment">
                                                                            </div>
                                                                            <div class="row-custom row-sub-comment">
                                                                                <!-- include subcomments -->
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="comments">
                                                                                            <ul class="comment-list">
                                                                                                <li>
                                                                                                    <div class="left">

                                                                                                        <img
                                                                                                            src="{{asset('assets/uploads/user.png')}}">

                                                                                                    </div>
                                                                                                    <div class="right">
                                                                                                        <div
                                                                                                            class="row-custom">
                                                                                                            <p
                                                                                                                class="username">
                                                                                                                <a
                                                                                                                    href="' comment slug'">
                                                                                                                    condition
                                                                                                                    username
                                                                                                                    ??
                                                                                                                    subcomment
                                                                                                                    name
                                                                                                                </a>
                                                                                                            </p>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="row-custom comment">
                                                                                                            here is sub
                                                                                                            comment....
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="row-custom">
                                                                                                            <span
                                                                                                                class="date">comment
                                                                                                                date</span>

                                                                                                            <a href="javascript:void(0)"
                                                                                                                class="btn-delete-comment"
                                                                                                                onclick="delete_comment('<?php echo 'id'; ?>','<?php echo 'productID'; ?>','<?php echo trans("confirm_comment"); ?>');">&nbsp;<i
                                                                                                                    class="icon-trash"></i>&nbsp;<?php echo trans("delete"); ?></a>

                                                                                                            <a href="javascript:void(0)"
                                                                                                                class="text-muted link-abuse-report float-right"
                                                                                                                data-toggle="modal"
                                                                                                                data-target="#reportCommentModal"
                                                                                                                onclick="$('#report_comment_id').val('commentID');">
                                                                                                                <?= trans("report"); ?>
                                                                                                            </a>

                                                                                                            <a href="javascript:void(0)"
                                                                                                                class="text-muted link-abuse-report float-right"
                                                                                                                data-toggle="modal"
                                                                                                                data-target="#loginModal">
                                                                                                                <?= trans("report"); ?>
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    </div>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!---- End Sub Comments------>

                                                                            </div>
                                                                    </li>
                                                                    @endforeach

                                                                </ul>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="reportCommentModal" tabindex="-1"
                                                    role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content modal-custom">
                                                            <form id="form_report_comment" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Report Comment
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal">
                                                                        <span aria-hidden="true"><i
                                                                                class="icon-close"></i>
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div id="response_form_report_comment"
                                                                            class="col-12"></div>
                                                                        <div class="col-12">
                                                                            <input type="hidden" id="report_comment_id"
                                                                                name="id" value="">
                                                                            <div class="form-group m-0">
                                                                                <label>Description</label>
                                                                                <textarea name="description"
                                                                                    class="form-control form-textarea"
                                                                                    placeholder="Briefly describe the issue you are facing"
                                                                                    minlength="5" maxlength="10000"
                                                                                    required></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit"
                                                                        class="btn btn-md btn-custom">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="col-comments-inner">
                                                    @include('show_flash_msgs')
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row-custom row-comment-label">
                                                                <label class="label-comment">Add a
                                                                    comment</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <form id="" action="{{route('add.comment')}}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="product_id"
                                                                    value="{{$item->product->id}}">
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <input type="text" name="name" id="comment_name"
                                                                            class="form-control form-input"
                                                                            placeholder="Name">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <input type="email" name="email"
                                                                            id="comment_email"
                                                                            class="form-control form-input"
                                                                            placeholder="Email Address">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <textarea name="comment" id="comment_text"
                                                                        class="form-control form-input form-textarea"
                                                                        placeholder="Comment"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit"
                                                                        class="btn btn-md btn-custom btn-dark">Submit</button>
                                                                </div>
                                                            </form>
                                                            <div id="message-comment-result"
                                                                class="message-comment-result"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="row-custom row-bn">
            <!--Include banner-->
            <!--print banner-->

        </div>
    </div>

    <div class="col-12 section section-related-products">
        <h3 class="title">You May Also Like</h3>
        <div class="row row-product">
            <!--print related posts-->
            @foreach($related_products as $product)
            <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                <div class="product-item">
                    <div class="row-custom product-multiple-image">
                        <a class="item-wishlist-button item-wishlist-enable " data-product-id="16"></a>
                        <div class="img-product-container">
                            <a href="{{ route('product.details', ['vendor' => $product->vendor['username'], 'product' => $product->product['slug']]) }}">
                                <img src="{{getFile('products',$product->product->image)}}"
                                    data-src="{{getFile('products',$product->product->image)}}"
                                    alt="{{$product->vendor['business_name']}}" class="lazyload img-fluid img-product">
                                <img src="{{getFile('products',$product->product->image)}}"
                                    data-src="{{getFile('products',$product->product->image)}}"
                                    alt="{{$product->vendor['business_name']}}"
                                    class="lazyload img-fluid img-product img-second">
                            </a>
                            <div class="product-item-options">
                                <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                    data-toggle="tooltip" data-placement="left" data-product-id="16" data-reload="0"
                                    title="Wishlist">
                                    <i class="icon-heart-o"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row-custom item-details">
                        <h3 class="product-title">
                            <a href="{{ route('product.details', ['vendor' => $product->vendor['username'], 'product' => $product->product['slug']]) }}">Ready to
                            {{$product->product['name']}}</a>
                        </h3>
                        <p class="product-user text-truncate">
                            <a href="{{$baseURL}}/profile/{{$product->vendor['username']}}">
                            {{$product->vendor['business_name']}}</a>
                        </p>
                        <div class="product-item-rating">
                            <div class="rating">
                                <i class="icon-star-o"></i>
                                <i class="icon-star-o"></i>
                                <i class="icon-star-o"></i>
                                <i class="icon-star-o"></i>
                                <i class="icon-star-o"></i>
                            </div><span class="item-wishlist"><i class="icon-heart-o"></i>0</span>
                        </div>
                        <div class="item-meta">
                            <span class="price"><span>PKR</span>{{$product->product->item_price}}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <div class="col-12">
        <div class="row-custom row-bn">
            <!--Include banner-->
            <!--print banner-->

        </div>
    </div>
</div>

<!-- Send Message Modal -->

@endsection

@section('custom-js')
<script src="{{asset('/assets/frontend/js/product_details/plyr.min.js')}}"></script>
<script src="{{asset('/assets/frontend/js/product_details/plyr.polyfilled.min.js')}}"></script>
<script src="{{asset('/assets/frontend/js/products/reviews.js')}}"></script>
<script src="{{asset('assets/frontend/js/send_whatsapp.js')}}"></script>
<script>
    const player = new Plyr('#player');
    $(document).ajaxStop(function() {
        const player = new Plyr('#player');
    });
    const audio_player = new Plyr('#audio_player');
    $(document).ajaxStop(function() {
        const player = new Plyr('#audio_player');
    });
    $(document).ready(function() {
        setTimeout(function() {
            $(".product-video-preview").css("opacity", "1");
        }, 300);
        setTimeout(function() {
            $(".product-audio-preview").css("opacity", "1");
        }, 300);
    });
</script>
@endsection
