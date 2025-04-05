<!DOCTYPE html>
<html lang="vi">

<head>
    @include('site.partials.head')
    <!-- CSS here -->
    <link rel="stylesheet" href="/site/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/site/css/font-css.css" />
    <link rel="stylesheet" href="/site/css/animate.min.css" />
    <link rel="stylesheet" href="/site/css/slick.css" />
    <link rel="stylesheet" href="/site/css/all.min.css" />
    <link rel="stylesheet" href="/site/css/nice-select.css" />
    <link rel="stylesheet" href="/site/css/magnific-popup.css" />
    <link rel="stylesheet" href="/site/css/metisMenu.css" />
    <link rel="stylesheet" href="/site/css/aos.css" />
    <link rel="stylesheet" href="/site/css/spacing.css" />
    <link rel="stylesheet" href="/site/css/main.css" />

    <script src="/site/js/jquery-3.5.1.min.js"></script>

    <script>
        (function () {
            function asyncLoad() {
                var urls = [];
                for (var i = 0; i < urls.length; i++) {
                    var s = document.createElement('script');
                    s.type = 'text/javascript';
                    s.async = true;
                    s.src = urls[i];
                    var x = document.getElementsByTagName('script')[0];
                    x.parentNode.insertBefore(s, x);
                }
            };
            window.attachEvent ? window.attachEvent('onload', asyncLoad) : window.addEventListener('load', asyncLoad, false);
        })();
    </script>

    @yield('css')
    <style>
        .invalid-feedback.error {
            color: #dc3232;
            font-size: 14px;
        }
        @media (min-width: 768px) {
            /* body {
                zoom: 0.9;
            } */
        }
    </style>

    <!-- Angular Js -->
    <script src="{{ asset('libs/angularjs/angular.js?v=222222') }}"></script>
    <script src="{{ asset('libs/angularjs/angular-resource.js') }}"></script>
    <script src="{{ asset('libs/angularjs/sortable.js') }}"></script>
    <script src="{{ asset('libs/dnd/dnd.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.9/angular-sanitize.js"></script>
    <script src="{{ asset('libs/angularjs/select.js') }}"></script>
    <script src="{{ asset('js/angular.js') }}?version={{ env('APP_VERSION', '1') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    @stack('script')
    <script>
        app.controller('AppController', function($rootScope, $scope, cartItemSync, $interval, $compile){
            $scope.currentUser = @json(Auth::user());
            $scope.isAdminClient = @json(Auth::check());

            const currentUrl = window.location.href;

            // Biên dịch lại nội dung bên trong container
            var container = angular.element(document.getElementsByClassName('item_product_main'));
            $compile(container.contents())($scope);

            var popup = angular.element(document.getElementById('popup-cart-mobile'));
            $compile(popup.contents())($scope);

            var quickView = angular.element(document.getElementById('quick-view-product'));
            $compile(quickView.contents())($scope);

            // Đặt mua hàng
            $scope.hasItemInCart = false;
            $scope.cart = cartItemSync;
            $scope.item_qty = 1;

            $scope.addToCart = function (productId, quantity = 1) {
                if (!DEFAULT_CLIENT_USER) {
                    // toastr.warning('Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng');
                    $('#modal-login-notify').modal('show');
                    return;
                }
                url = "{{route('cart.add.item', ['productId' => 'productId'])}}";
                url = url.replace('productId', productId);
                let item_qty = quantity;

                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    },
                    data: {
                        'qty': parseInt(item_qty)
                    },
                    success: function (response) {
                        if (response.success) {
                            if (response.count > 0) {
                                $scope.hasItemInCart = true;
                            }

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function () {
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);
                            toastr.success('Thao tác thành công !')
                            $scope.$applyAsync();
                        }
                    },
                    error: function () {
                        toastr.error('Thao tác thất bại !')
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }

            $scope.changeQty = function (qty, product_id) {
                updateCart(qty, product_id)
            }

            $scope.incrementQuantity = function (product) {
                product.quantity = Math.min(product.quantity + 1, 9999);
            };

            $scope.decrementQuantity = function (product) {
                product.quantity = Math.max(product.quantity - 1, 0);
            };

            function updateCart(qty, product_id) {
                jQuery.ajax({
                    type: 'POST',
                    url: "{{route('cart.update.item')}}",
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    },
                    data: {
                        product_id: product_id,
                        qty: qty
                    },
                    success: function (response) {
                        if (response.success) {
                            $scope.items = response.items;
                            $scope.total = response.total;
                            $scope.total_qty = response.count;
                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function(){
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);

                            $scope.$applyAsync();
                        }
                    },
                    error: function (e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }

            // xóa item trong giỏ
            $scope.removeItem = function (product_id) {
                jQuery.ajax({
                    type: 'GET',
                    url: "{{route('cart.remove.item')}}",
                    data: {
                        product_id: product_id
                    },
                    success: function (response) {
                        if (response.success) {
                            $scope.cart.items = response.items;
                            $scope.cart.count = Object.keys($scope.cart.items).length;
                            $scope.cart.totalCost = response.total;

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function(){
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);

                            if ($scope.cart.count == 0) {
                                $scope.hasItemInCart = false;
                            }
                            $scope.$applyAsync();
                        }
                    },
                    error: function (e) {
                        jQuery.toast.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }

            // Xem nhanh
            $scope.quickViewProduct = {};
            $scope.showQuickView = function (productId) {
                $.ajax({
                    url: "{{route('front.get-product-quick-view')}}",
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    },
                    data: {
                        product_id: productId
                    },
                    success: function (response) {
                        $('#quick-view-product .quick-view-product').html(response.html);
                        var quickView = angular.element(document.getElementById('quick-view-product'));
                        $compile(quickView.contents())($scope);
                        $scope.$applyAsync();
                    },
                    error: function (e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }

            // Search product
            jQuery('#live-search').keyup(function() {
                var keyword = jQuery(this).val();
                jQuery.ajax({
                    type: 'post',
                    url: '{{route("front.auto-search-complete")}}',
                    headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
                    data: {keyword: keyword},
                    success: function(data) {
                        jQuery('.live-search-results').html(data.html);
                    }
                })
            });

            $scope.form_vps_dat_hang = {
                your_name: '',
                your_email: '',
                your_phone: '',
                your_message: ''
            };
            $scope.errors = {};
            $scope.isLoadingFormVpsDatHang = false;

            $scope.sendFormVpsDatHang = function() {
                $scope.isLoadingFormVpsDatHang = true;
                let data = $scope.form_vps_dat_hang;
                jQuery.ajax({
                    url: '{{route("front.post-contact")}}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    },
                    data: data,
                    success: function(response) {
                        if(response.success) {
                            toastr.success('Gửi thông tin đặt hàng thành công');
                            $('#modal-vps-dat-hang').modal('hide');
                            $scope.form_vps_dat_hang = {
                                your_name: '',
                                your_email: '',
                                your_phone: '',
                                your_message: ''
                            };
                        } else {
                            toastr.error('Gửi thông tin đặt hàng thất bại');
                            $scope.errors = response.errors;
                            $scope.isLoadingFormVpsDatHang = false;
                        }
                    },
                    error: function(response) {
                        toastr.error('Gửi thông tin đặt hàng thất bại');
                        $scope.errors = response.errors;
                        $scope.isLoadingFormVpsDatHang = false;
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });
            }

        })

        app.factory('cartItemSync', function ($interval) {
            var cart = {items: null, total: null};

            cart.items = @json($cartItems);
            cart.count = {{$cartItems->sum('quantity')}};
            cart.total = {{$totalPriceCart}};

            return cart;
        });

        @if(Session::has('token'))
        localStorage.setItem('{{ env("prefix") }}-token', "{{Session::get('token')}}")
        @endif
        @if(Session::has('logout'))
        localStorage.removeItem('{{ env("prefix") }}-token');
        @endif
        var CSRF_TOKEN = "{{ csrf_token() }}";
        @if (Auth::check())
        const DEFAULT_CLIENT_USER = {
            id: "{{ Auth::user()->id }}",
            fullname: "{{ Auth::user()->name }}"
        };
        @else
        const DEFAULT_CLIENT_USER = null;
        @endif
    </script>
</head>

<body ng-app="App" ng-controller="AppController" ng-cloak>
    <div class="main-page-wrapper">
        <!-- preloader start -->
        {{-- <div id="preloader">
            <div id="ctn-preloader" class="ctn-preloader">
                <div class="icon"><img src="{{$config->favicon->path ?? ''}}" alt="" class="m-auto d-block" width="60" loading="lazy">
                </div>
                <div class="txt-loading">
                    <span data-text-preloader="V" class="letters-loading">
                        V
                    </span>
                    <span data-text-preloader="P" class="letters-loading">
                        P
                    </span>
                    <span data-text-preloader="S" class="letters-loading">
                        S
                    </span>
                    <span data-text-preloader="V" class="letters-loading">
                        V
                    </span>
                    <span data-text-preloader="N" class="letters-loading">
                        N
                    </span>
                    <span data-text-preloader="N" class="letters-loading">
                        N
                    </span>
                </div>
            </div>
        </div> --}}
        <!-- preloader end  -->
        <!-- offcanvas start  -->
        <div class="offcanvas offcanvas-top theme-bg" tabindex="-1" id="offcanvasTop">
            <div class="offcanvas-header">
                <a data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="fas fa-times search-close" id="search-close"></i>
                </a>
            </div>
            <div class="offcanvas-body">
                <!-- Fullscreen search -->
                <div class="search-wrap">
                    <form method="get">
                        <input type="search" class="main-search-input" placeholder="Search Your Keyword...">
                    </form>
                </div>
                <!-- end fullscreen search -->
            </div>
        </div>
        <!-- offcanvas end  -->
        <!-- shopping-cart-bar start -->
        <div class="cart-menu-right cart-style-1 white-bg">
            <div class="close-icon float-right">
                <a href="javascript:void(0);"><i class="fal fa-times"></i></a>
            </div>
            <div ng-if="cart.count > 0">
                <div class="dropdown-cart-products">
                    <div class="product" ng-repeat="item in cart.items">
                        <div class="product__cart-details">
                            <h5 class="product-title">
                                <a ng-href="/san-pham/<% item.attributes.slug %>.html"><% item.name %></a>
                            </h5>
                            <span class="cart-product-info">
                                <span class="cart-product-qty"><% item.quantity %></span>
                                x <% item.price | number %>đ
                            </span>
                        </div>
                        {{-- <figure class="product__image-container">
                            <a ng-href="/san-pham/<% item.attributes.slug %>.html" class="product-img">
                                <img src="assets/img/product/cart/product-01.jpg" alt="product" class="img-fluid lazyload">
                            </a>
                        </figure> --}}
                        <a href="javascript:void(0)" class="remove-btn" title="Product remove" ng-click='removeItem(item.id)'><i class="fal fa-times"></i></a>
                    </div>
                </div>
                <div class="cart-total mb-15" ng-if="cart.count > 0">
                    <span>Total</span>
                    <span class="cart-total-price"><% cart.total | number %>đ</span>
                </div>
                <div class="cart-action" ng-if="cart.count > 0">
                    <a href="{{route('orders.cart')}}" class="btn btn-primary">View Cart</a>
                    <a href="{{route('orders.cart')}}" class="btn btn-outline-primary-2"><span>Checkout</span><i
                            class="fal fa-long-arrow-right"></i></a>
                </div>
            </div>
            <div class="dropdown-cart-products text-center" ng-if="!cart.items || cart.count == 0">
                <img width="82" height="82" src="/site/images/no-cart.png?1677998172667" loading="lazy">
                <p class="text-center text-dark">Không có sản phẩm nào trong giỏ hàng của bạn</p>
            </div>
        </div>
        <div class="modal fade" id="modal-login-notify" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content modal-notify">
                    {{-- <img class="shapes__two" src="/site/images/s-pattern-2a.svg" alt="pattern two"> --}}
                    <div class="modal-header" style="justify-content: center;">
                        <h3 class="modal-title text-center" id="exampleModalLabel"><i class="fal fa-exclamation-triangle"></i> Thông báo</h3>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: #fff;"></button> --}}
                    </div>
                    <div class="modal-body">
                        <p>Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng</p>
                        <a href="{{route('front.login-client')}}" class="btn btn-redirect"><i class="bi bi-person-plus"></i> Đăng nhập</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-vps-dat-hang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content modal-notify">
                    <div class="modal-header" style="justify-content: center;">
                        <h3 class="modal-title text-center" id="exampleModalLabel"><i class="fal fa-shopping-cart"></i> ĐẶT HÀNG VPS</h3>
                    </div>
                    <div class="modal-body">
                        <form id="form-vps-dat-hang">
                            <div class="form-group">
                                <label for="name">Tên <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" ng-model="form_vps_dat_hang.your_name">
                                <div class="invalid-feedback d-block error" role="alert">
                                    <span ng-if="errors && errors.your_name">
                                        <% errors.your_name[0] %>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" ng-model="form_vps_dat_hang.your_email">
                                <div class="invalid-feedback d-block error" role="alert">
                                    <span ng-if="errors && errors.your_email">
                                        <% errors.your_email[0] %>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="phone" ng-model="form_vps_dat_hang.your_phone">
                                <div class="invalid-feedback d-block error" role="alert">
                                    <span ng-if="errors && errors.your_phone">
                                        <% errors.your_phone[0] %>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message">Nội dung đặt hàng <span class="text-danger">*</span><span class="text-muted"> (VD: Tên VPS, IP, CPU, RAM, HDD, ...)</span></label>
                                <textarea class="form-control" id="message" ng-model="form_vps_dat_hang.your_message"></textarea>
                                <div class="invalid-feedback d-block error" role="alert">
                                    <span ng-if="errors && errors.your_message">
                                        <% errors.your_message[0] %>
                                    </span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-3" ng-click="sendFormVpsDatHang()" ng-disabled="isLoadingFormVpsDatHang">
                                <i class="fal fa-paper-plane" ng-show="!isLoadingFormVpsDatHang"></i> Gửi thông tin đặt hàng
                                <i class="fa fa-spinner fa-spin" ng-show="isLoadingFormVpsDatHang"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <style>
            #modal-login-notify .modal-content.modal-notify {
                background: #0d153c;
                border: 1px solid #fff;
            }
            #modal-login-notify .modal-content.modal-notify .shapes__two {
                position: absolute;
                right: 0;
                bottom: 0;
                z-index: -1;
            }
            #modal-login-notify .btn-redirect {
                color: white;
                width: 100%;
                padding-top: 20px;
                padding-bottom: 20px;
                background: linear-gradient(93.42deg, #ff6737 0%, #ff4f13 53.12%, #ff3131 100%);
                background: -moz-gradient(93.42deg, #ff6737 0%, #ff4f13 53.12%, #ff3131 100%);
                background: -o-gradient(93.42deg, #ff6737 0%, #ff4f13 53.12%, #ff3131 100%);
                background: -ms-gradient(93.42deg, #ff6737 0%, #ff4f13 53.12%, #ff3131 100%);
                background: -webkit-gradient(93.42deg, #ff6737 0%, #ff4f13 53.12%, #ff3131 100%);
            }
        </style>
        <!-- shopping-cart-bar end -->
        @include('site.partials.header')
        @yield('content')
        @include('site.partials.footer')
    </div>
    <!--main-page-wrapper end-->
    <!-- JS here -->
    <script src="/site/js/modernizr-3.5.0.min.js"></script>
    <script src="/site/js/popper.min.js"></script>
    <script src="/site/js/bootstrap.min.js"></script>
    <script src="/site/js/jquery.meanmenu.js"></script>
    <script src="/site/js/slick.min.js"></script>
    <script src="/site/js/jquery.supermarquee.min.js"></script>
    <script src="/site/js/imagesloaded.pkgd.min.js"></script>
    <script src="/site/js/isotope.pkgd.min.js"></script>
    <script src="/site/js/jquery.magnific-popup.min.js"></script>
    <script src="/site/js/metisMenu.min.js"></script>
    <script src="/site/js/wow.min.js"></script>
    <script src="/site/js/aos.js"></script>
    <script src="/site/js/jquery.counterup.min.js"></script>
    <script src="/site/js/jquery.waypoints.min.js"></script>
    <script src="/site/js/jquery.nice-select.min.js"></script>
    <script src="/site/js/tilt.jquery.min.js"></script>
    <script src="/site/js/jquery.easypiechart.min.js"></script>
    <script src="/site/js/lenis.min.js"></script>
    <script src="/site/js/jquery-ui.js"></script>
    <!--Custom JS here -->
    <script src="/site/js/main.js"></script>
</body>

</html>
