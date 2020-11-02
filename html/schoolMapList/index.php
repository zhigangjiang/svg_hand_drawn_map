<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>校园地图</title>
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
                    <p>福建师范大学福清分校石竹校区地图</p>
                </div>
            </div>
            <div class="weui-cell weui-cell_access">
                <div class="weui-cell__bd weui-cell_primary">
                    <p>福建师范大学福清分校石竹校区地图2</p>
                </div>
            </div>
            <div class="weui-cell weui-cell_access">
                <div class="weui-cell__bd weui-cell_primary">
                    <p>福建师范大学福清分校五马校区地图</p>
                </div>
            </div>
            <div class="weui-cell weui-cell_access">
                <div class="weui-cell__bd weui-cell_primary">
                    <p>福建师范大学福清分校五马校区地图2</p>
                </div>
            </div>
            <div class="weui-cell weui-cell_access">
                <div class="weui-cell__bd weui-cell_primary">
                    <p>示例地图</p>
                </div>
            </div>
        </div>
    </div>
    
    <?php
     include '../../phpFile/echoFoot.php';    
    ?> 
    
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
						<!--weui-panel__hd--->
                        <div class="weui-panel__hd">
                        校园地图列表
                        </div>
                        <!--weui-panel__bd--->
                        <div class="weui-panel__bd">
                        
                        <a href="../../map/example-fixed" class="weui-media-box weui-media-box_appmsg">
                                <div class="weui-media-box__hd">
                                	<img class="weui-media-box__thumb" src="../../icon/地图小图.png" alt="">                                </div>
                                <div class="weui-media-box__bd">
                                    <h4 class="weui-media-box__title">示例地图</h4>
                                    <p class="weui-media-box__desc">
                                    异地用户查看，避免偏移出<br/>
                                    福建师范大学福清分校石竹校区地图，位置固定，精度，方向会发生改变
                                    </p>
                                </div>
                                <!--其他信息-->
                                <div style="position:absolute; bottom:-3px; right:0px; ">
                                    <ul class="weui-media-box__info">
                                        <li class="weui-media-box__info__meta">jzg</li>
                                        <li class="weui-media-box__info__meta">2017.4.19</li>
                                        <li class="weui-media-box__info__meta weui-media-box__info__meta_extra">无</li>
                                    </ul>
                                </div>
                            </a>
                            
                            <a href="../../map/fjnufq-sz" class="weui-media-box weui-media-box_appmsg">
                                <div class="weui-media-box__hd">
                                    <img class="weui-media-box__thumb" src="../../icon/地图小图.png" alt="">
                                </div>
                                <div class="weui-media-box__bd">
                                    <h4 class="weui-media-box__title">福建师范大学福清分校石竹校区地图</h4>
                                    <p class="weui-media-box__desc">
                                    福建师范大学福清分校石竹校区地图
                                    福建师范大学福清分校石竹校区地图
                                    </p>
                                </div>
                                <!--其他信息-->
                                <div style="position:absolute; bottom:-3px; right:0px; ">
                                    <ul class="weui-media-box__info">
                                        <li class="weui-media-box__info__meta">jzg</li>
                                        <li class="weui-media-box__info__meta">2017.12.5</li>
                                        <li class="weui-media-box__info__meta weui-media-box__info__meta_extra">无</li>
                                    </ul>
                                </div>
                            </a>
                            
                            <a href="../../map/fjnufq-wm" class="weui-media-box weui-media-box_appmsg">
                                <div class="weui-media-box__hd">
                                	<img class="weui-media-box__thumb" src="../../icon/地图小图.png" alt="">                                </div>
                                <div class="weui-media-box__bd">
                                    <h4 class="weui-media-box__title">福建师范大学福清分校五马校区地图</h4>
                                    <p class="weui-media-box__desc">
                                    福建师范大学福清分校五马校区地图
                                    福建师范大学福清分校五马校区地图
                                    </p>
                                </div>
                                <!--其他信息-->
                                <div style="position:absolute; bottom:-3px; right:0px; ">
                                    <ul class="weui-media-box__info">
                                        <li class="weui-media-box__info__meta">jzg</li>
                                        <li class="weui-media-box__info__meta">2017.4.19</li>
                                        <li class="weui-media-box__info__meta weui-media-box__info__meta_extra">无</li>
                                    </ul>
                                </div>
                            </a>
                            
                            <a href="../../map/fjnufq-sz-pic" class="weui-media-box weui-media-box_appmsg">
                                <div class="weui-media-box__hd">
                                	<img class="weui-media-box__thumb" src="../../icon/地图小图.png" alt="">                                </div>
                                <div class="weui-media-box__bd">
                                    <h4 class="weui-media-box__title">福建师范大学福清分校石竹校区地图2</h4>
                                    <p class="weui-media-box__desc">
                                    福建师范大学福清分校石竹校区地图
                                    福建师范大学福清分校石竹校区地图(带图片，加载速度较慢)
                                    </p>
                                </div>
                                <!--其他信息-->
                                <div style="position:absolute; bottom:-3px; right:0px; ">
                                    <ul class="weui-media-box__info">
                                        <li class="weui-media-box__info__meta">jzg</li>
                                        <li class="weui-media-box__info__meta">2017.7.9</li>
                                        <li class="weui-media-box__info__meta weui-media-box__info__meta_extra">无</li>
                                    </ul>
                                </div>
                            </a>
                            <a href="../../map/fjnufq-wm-pic" class="weui-media-box weui-media-box_appmsg">
                                <div class="weui-media-box__hd">
                                	<img class="weui-media-box__thumb" src="../../icon/地图小图.png" alt="">                                </div>
                                <div class="weui-media-box__bd">
                                    <h4 class="weui-media-box__title">福建师范大学福清分校五马校区地图2</h4>
                                    <p class="weui-media-box__desc">
                                    福建师范大学福清分校五马校区地图
                                    福建师范大学福清分校五马校区地图(带图片，加载速度较慢)
                                    </p>
                                </div>
                                <!--其他信息-->
                                <div style="position:absolute; bottom:-3px; right:0px; ">
                                    <ul class="weui-media-box__info">
                                        <li class="weui-media-box__info__meta">jzg</li>
                                        <li class="weui-media-box__info__meta">2017.7.9</li>
                                        <li class="weui-media-box__info__meta weui-media-box__info__meta_extra">无</li>
                                    </ul>
                                </div>
                            </a>
                            
                            
                        </div>
                        
                       
        
                        <!--weui-panel__ft-->
                        <div class="weui-panel__ft">
                            <a href="../../map/uploadFiles/手绘地图.svg" class="weui-cell weui-cell_access weui-cell_link">
                                <div class="weui-cell__bd">查看更多</div>
                                <span class="weui-cell__ft"></span>
                            </a>    
                        </div>
                        
                        
                                        
                        

</body>
</html>
