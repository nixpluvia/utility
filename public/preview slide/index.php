<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Slide</title>
    <!-- jquery plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- slick plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
</head>
<body>
<style>
    * {
        box-sizing: border-box;
    }

    body,
    ul,
    li,
    a,
    button {
        margin: 0;
        padding: 0;
        list-style: none;
        color: inherit;
        outline: none;
        border: 0;
        background-color: transparent;
    }

    button {
        cursor: pointer;
    }

    .flex {
        display: flex;
    }

    .wrap {
        width: 100%;
        height: 100vh;
        background-color: rgb(244, 244, 244);
    }

    .box1,
    .box2 {
        position: relative;
        margin: 50px;
        width: calc(50% - 100px);
        height: calc(100% - 100px);
        background-color: rgb(230, 230, 230);
    }

    .box1 {
        flex-direction: column;
    }

    /* 슬라이드 */
    .ps-content-box>ul>li {
        display: none;
        visibility: hidden;
    }

    .ps-content-box>ul>li.active {
        display: block;
        visibility: visible;
    }

    .slider-box {
        margin-top: auto;
    }

    .slider-tab-head {
        display: flex;
        justify-content: flex-end;
    }

    .slider-tab-head button {
        padding: 10px;
        background-color: rgb(200, 200, 200);
    }

    .slider-tab-head button.active {
        background-color: rgb(150, 150, 150);
        color: #ffffff;
    }

    .slider-tab-head button+button {
        margin-left: 10px;
    }

    .preview-slider {
        overflow: hidden;
    }

    .preview-slider .item {
        width: 200px;
        height: 200px;
        outline: none;
    }

    .box2>ul {
        position: relative;
        display: block;
        width: 100%;
        height: 100%;
    }

    .box2>ul>li {
        position: absolute;
        display: none;
        visibility: hidden;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .box2>ul>li.active {
        display: block;
        visibility: visible;
    }
</style>
    <div class="wrap flex">
        <div class="box1 flex">
            <div class="ps-content-box">
                <ul>
                    <li class="active" style="background-color: red;">
                        첫번째 슬라이드 텍스트 입니다
                    </li>
                    <li style="background-color: orange;">
                        두번째 슬라이드 텍스트 입니다
                    </li>
                    <li style="background-color: yellow;">
                        세번째 슬라이드 텍스트 입니다
                    </li>
                    <li style="background-color: green;">
                        네번째 슬라이드 텍스트 입니다
                    </li>
                    <li style="background-color: blue;">
                        다섯번째 슬라이드 텍스트 입니다
                    </li>
                </ul>
            </div>
            <div class="slider-box">
                <div class="slider-tab-head flex">
                    <button class="tab-head btn-tab-all active" data-tab-head="0">탭 타이틀1</button>
                    <button class="tab-head btn-tab-1" data-tab-head="1">탭 타이틀2</button>
                    <button class="tab-head btn-tab-2" data-tab-head="2">탭 타이틀3</button>
                </div>
                <div class="preview-slider" dir="rtl">
                    <div class="item" style="background-color: red;" data-slide-tab="1">Slide 1</div>
                    <div class="item" style="background-color: orange;" data-slide-tab="1">Slide 2</div>
                    <div class="item" style="background-color: yellow;" data-slide-tab="1">Slide 3</div>
                    <div class="item" style="background-color: green;" data-slide-tab="2">Slide 4</div>
                    <div class="item" style="background-color: blue;" data-slide-tab="2">Slide 5</div>
                </div>
            </div>

        </div>
        <div class="box2 ps-img-box">
            <ul>
                <li class="active" style="background-color: red;"></li>
                <li style="background-color: orange;"></li>
                <li style="background-color: yellow;"></li>
                <li style="background-color: green;"></li>
                <li style="background-color: blue;"></li>
            </ul>
        </div>
    </div>
    <script>
        function prevSlider__init() {
            // 미리보기 슬릭 슬라이더
            $(".preview-slider").slick({
                rtl: true,
                dots: false,
                arrows: false,
                infinite: false,
                slidesToShow: 3,
                slidesToScroll: 2,
                variableWidth: true
                // 반응형
                // responsive: [
                //     {
                //         breakpoint: 1024,
                //         settings: {
                //             slidesToShow: 2
                //         }
                //     },
                //     {
                //         breakpoint: 900,
                //         settings: {
                //             slidesToShow: 1
                //         }
                //     }
                // ]
            });
            // 슬라이드 아이템 클릭 이벤트
            $(".preview-slider .item").click(function () {
                var $this = $(this);
                var $sliderItems = $this.parent().find("> .item");
                var itemIndex = $this.index();

                var $contentBox = $(".ps-content-box");
                var $contents = $contentBox.find(" > ul > li");
                var $actContent = $contents.eq(itemIndex);

                var $imgBox = $(".ps-img-box");
                var $imgs = $imgBox.find(" > ul > li");
                var $actImg = $imgs.eq(itemIndex);

                $sliderItems.removeClass("active");
                $contents.removeClass("active");
                $imgs.removeClass("active");

                $this.addClass("active");
                $actContent.addClass("active");
                $actImg.addClass("active");
            });

            // 슬라이드 탭 버튼
            $(".slider-tab-head .tab-head").click(function () {
                var $this = $(this);
                var btnIndex = $this.attr('data-tab-head');
                var $btnTabs = $this.parent().find(' > button');

                $btnTabs.removeClass('active');
                $this.addClass('active');

                if (btnIndex < 1) {
                    $('.preview-slider').slick('slickUnfilter');
                } else {
                    $('.preview-slider').slick('slickUnfilter');
                    $('.preview-slider').slick("slickFilter", "[data-slide-tab=" + btnIndex + "]");
                }
            });
        }

        $(function () {
            prevSlider__init();
        });
    </script>
</body>
</html>