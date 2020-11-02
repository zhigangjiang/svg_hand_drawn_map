<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>景区地图</title>
	<?php
     include '../../phpFile/echoHead.php';    
    ?>
</head>

<body>

<div class="page">
    
    <div class="page__bd">
        <div class="weui-search-bar" id="searchBar">
            <form class="weui-search-bar__form">
                <div class="weui-search-bar__box">
                    <i class="weui-icon-search"></i>
                    <input type="search" class="weui-search-bar__input" id="searchInput" placeholder="搜索" required/>
                    <a href="javascript:" class="weui-icon-clear" id="searchClear"></a>
                </div>
                <label class="weui-search-bar__label" id="searchText">
                    <i class="weui-icon-search"></i>
                    <span>搜索</span>
                </label>
            </form>
            <a href="javascript:" class="weui-search-bar__cancel-btn" id="searchCancel">取消</a>
        </div>
        <div class="weui-cells searchbar-result" id="searchResult">
            <div class="weui-cell weui-cell_access">
                <div class="weui-cell__bd weui-cell_primary">
                    <p>福建省福清市石竹山风景区手绘地图</p>
                </div>
            </div>
            
        </div>

    </div>
    
    
    
    </div>
    <script type="text/javascript">
        $(function(){
            var $searchBar = $('#searchBar'),
                $searchResult = $('#searchResult'),
                $searchText = $('#searchText'),
                $searchInput = $('#searchInput'),
                $searchClear = $('#searchClear'),
                $searchCancel = $('#searchCancel');

            function hideSearchResult(){
                $searchResult.hide();
                $searchInput.val('');
            }
            function cancelSearch(){
                hideSearchResult();
                $searchBar.removeClass('weui-search-bar_focusing');
                $searchText.show();
            }

            $searchText.on('click', function(){
                $searchBar.addClass('weui-search-bar_focusing');
                $searchInput.focus();
            });
            $searchInput
                .on('blur', function () {
                    if(!this.value.length) cancelSearch();
                })
                .on('input', function(){
                    if(this.value.length) {
                        $searchResult.show();
                    } else {
                        $searchResult.hide();
                    }
                })
            ;
            $searchClear.on('click', function(){
                hideSearchResult();
                $searchInput.focus();
            });
            $searchCancel.on('click', function(){
                cancelSearch();
                $searchInput.blur();
            });
    		 hideSearchResult();
        });
    </script>
						<!--weui-panel__hd-->
                        <div class="weui-panel__hd">
                        景区地图列表
                        </div>
                        <!--weui-panel__bd-->
                        <div class="weui-panel__bd">
                            <a href="../../map/szsfjq-hd-my" class="weui-media-box weui-media-box_appmsg">
                                <div class="weui-media-box__hd">
                                    <img class="weui-media-box__thumb" src="../../icon/地图小图.png" alt="">
                                </div>
                                <div class="weui-media-box__bd">
                                    <h4 class="weui-media-box__title">福建省福清市石竹山风景区手绘地图</h4>
                                    <p class="weui-media-box__desc">
                                    福建省福清市石竹山风景区手绘地图(可定位)
                                    福建省福清市石竹山风景区手绘地图
                                    </p>
                                </div>
                                <!--其他信息-->
                                <div style="position:absolute; bottom:-3px; right:0px; ">
                                    <ul class="weui-media-box__info">
                                        <li class="weui-media-box__info__meta">NIUINI</li>
                                        <li class="weui-media-box__info__meta">2017.12.23</li>
                                        <li class="weui-media-box__info__meta weui-media-box__info__meta_extra">admin@niuini.com</li>
                                    </ul>
                                </div>
                            </a>
                            
                            <a href="../../map/szsfjq-hd" class="weui-media-box weui-media-box_appmsg">
                                <div class="weui-media-box__hd">
                                    <img class="weui-media-box__thumb" src="../../icon/地图小图.png" alt="">
                                </div>
                                <div class="weui-media-box__bd">
                                    <h4 class="weui-media-box__title">福建省福清市石竹山风景区手绘地图</h4>
                                    <p class="weui-media-box__desc">
                                    福建省福清市石竹山风景区手绘地图(位置固定，查看用)
                                    福建省福清市石竹山风景区手绘地图
                                    </p>
                                </div>
                                <!--其他信息-->
                                <div style="position:absolute; bottom:-3px; right:0px; ">
                                    <ul class="weui-media-box__info">
                                        <li class="weui-media-box__info__meta">NIUINI</li>
                                        <li class="weui-media-box__info__meta">2017.12.21</li>
                                        <li class="weui-media-box__info__meta weui-media-box__info__meta_extra">admin@niuini.com</li>
                                    </ul>
                                </div>
                            </a>
                            <a href="https://niuini.com/MAP/xuyon/" class="weui-media-box weui-media-box_appmsg" taget="_blank">
                                <div class="weui-media-box__hd">
                                    <img class="weui-media-box__thumb" src="../../icon/地图小图.png" alt="">
                                </div>
                                <div class="weui-media-box__bd">
                                    <h4 class="weui-media-box__title">叙永县手绘地图</h4>
                                    <p class="weui-media-box__desc">
                                    包含四川省叙永县15个景点手绘图，带语音介绍
                                    </p>
                                </div>
                                <!--其他信息-->
                                <div style="position:absolute; bottom:-3px; right:0px; ">
                                    <ul class="weui-media-box__info">
                                        <li class="weui-media-box__info__meta">JZG</li>
                                        <li class="weui-media-box__info__meta">2018.12.21</li>
                                        <li class="weui-media-box__info__meta weui-media-box__info__meta_extra">zigjiang@gmail.com</li>
                                    </ul>
                                </div>
                            </a>

                            
                            <!--weui-panel__ft-->
                        <div class="weui-panel__ft">
                            <a href="../../map/uploadFiles/手绘地图.svg" class="weui-cell weui-cell_access weui-cell_link">
                                <div class="weui-cell__bd">查看更多</div>
                                <span class="weui-cell__ft"></span>
                            </a>    
                        </div>
                        
                        
                            
                           <?php
            include '../../phpFile/echoFoot.php';
             
         ?> 

</body>
</html>
